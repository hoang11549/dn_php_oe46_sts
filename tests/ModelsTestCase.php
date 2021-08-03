<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Tests\TestCase;

abstract class ModelsTestCase extends TestCase
{
    /**
     * @param Model $model
     * @param array $fillable
     * @param array $guarded
     * @param array $hidden
     * @param array $visible
     * @param array $casts
     * @param array $dates
     * @param string $collectionClass
     * @param null $table
     * @param string $primaryKey
     * @param null $connection
     *
     * - `$fillable` -> `getFillable()`
     * - `$guarded` -> `getGuarded()`
     * - `$table` -> `getTable()`
     * - `$primaryKey` -> `getKeyName()`
     * - `$connection` -> `getConnectionName()`: in case multiple connections exist.
     * - `$hidden` -> `getHidden()`
     * - `$visible` -> `getVisible()`
     * - `$casts` -> `getCasts()`: note that method appends incrementing key.
     * - `$dates` -> `getDates()`: note that method appends `[static::CREATED_AT, static::UPDATED_AT]`.
     * - `newCollection()`: assert collection is exact type. Use `assertEquals` on `get_class()
     * ` result, but not `assertInstanceOf`.
     */
    protected function runConfigurationAssertions(
        Model $model,
        $fillable = [],
        $guarded = ['*'],
        $visible = [],
        $dates = ['created_at', 'updated_at'],
        $collectionClass = Collection::class,
        $table = null,
        $primaryKey = 'id',
        $connection = null
    ) {
        $this->assertEquals($fillable, $model->getFillable());
        $this->assertEquals($guarded, $model->getGuarded());
        $this->assertEquals($visible, $model->getVisible());
        $this->assertEquals($dates, $model->getDates());
        $this->assertEquals($primaryKey, $model->getKeyName());

        $c = $model->newCollection();
        $this->assertEquals($collectionClass, get_class($c));
        $this->assertInstanceOf(Collection::class, $c);

        if ($connection !== null) {
            $this->assertEquals($connection, $model->getConnectionName());
        }

        if ($table !== null) {
            $this->assertEquals($table, $model->getTable());
        }
    }

    /**
     * @param HasMany $relation
     * @param Model $model
     * @param Model $related
     * @param string $key
     * @param string $parent
     * @param \Closure $queryCheck
     *
     * - `getQuery()`: assert query has not been modified or modified properly.
     * - `getForeignKey()`: any `HasOneOrMany` or `BelongsTo` relation,
     *  but key type differs (see documentaiton).
     * - `getQualifiedParentKeyName()`: in case of `HasOneOrMany` relation, there is no `getLocalKey()`
     * method, so this one should be asserted.
     */
    protected function assertHasManyRelation(
        $relation,
        Model $model,
        Model $related,
        $key = null,
        $parent = null,
        \Closure $queryCheck = null
    ) {
        $this->assertInstanceOf(HasMany::class, $relation);

        if (!is_null($queryCheck)) {
            $queryCheck->bindTo($this);
            $queryCheck($relation->getQuery(), $model, $relation);
        }

        if (is_null($key)) {
            $key = $model->getForeignKey();
        }

        $this->assertEquals($key, $relation->getForeignKeyName());

        if (is_null($parent)) {
            $parent = $model->getKeyName();
        }

        $this->assertEquals($model->getTable() . '.' . $parent, $relation->getQualifiedParentKeyName());
    }

    /**
     * @param BelongsTo $relation
     * @param Model $model
     * @param Model $related
     * @param string $key
     * @param string $owner
     * @param \Closure $queryCheck
     *
     * - `getQuery()`: assert query has not been modified or modified properly.
     * - `getForeignKey()`: any `HasOneOrMany` or `BelongsTo` relation, but key type differs (see documentaiton).
     * - `getOwnerKey()`: `BelongsTo` relation and its extendings.
     */
    protected function assertBelongsToRelation(
        $relation,
        Model $model,
        Model $related,
        $key,
        $owner = null,
        \Closure $queryCheck = null
    ) {
        $this->assertInstanceOf(BelongsTo::class, $relation);

        if (!is_null($queryCheck)) {
            $queryCheck->bindTo($this);
            $queryCheck($relation->getQuery(), $model, $relation);
        }

        $this->assertEquals($key, $relation->getForeignKeyName());

        if (is_null($owner)) {
            $owner = $related->getKeyName();
        }

        $this->assertEquals($owner, $relation->getOwnerKeyName());
    }

    protected function assertBelongsToManyRelation(Model $model, $foreignKey, $relateKey, $relation)
    {
        $this->assertInstanceOf(BelongsToMany::class, $relation);

        $this->assertEquals($foreignKey, $relation->getQualifiedForeignPivotKeyName());

        $this->assertEquals($relateKey, $relation->getQualifiedRelatedPivotKeyName());
    }


    protected function assertMorphOneRelation($type, $id, $relation)
    {
        $this->assertInstanceOf(MorphOne::class, $relation);

        $this->assertEquals($type, $relation->getMorphType());

        $this->assertEquals($id, $relation->getForeignKeyName());
    }
}
