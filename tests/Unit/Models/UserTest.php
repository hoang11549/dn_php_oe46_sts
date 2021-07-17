<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\ModelsTestCase;

class UserTest extends ModelsTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUserConfiguration()
    {
        $this->runConfigurationAssertions(new User(), [
            'name',
            'email',
            'password',
            'role',
            'age',
            'address',
            'status',
        ]);
    }

    public function testUserHasManyReportRelationship()
    {
        $model = new User();

        $relation = $model->reports();

        $this->assertHasManyRelation($relation, $model, new User());
    }

    public function testUserBelongToManySubjectRelationship()
    {
        $model = new User();

        $relation = $model->subjects();

        $this->assertBelongsToManyRelation(
            $model,
            'user_subject.user_id',
            'user_subject.subject_id',
            $relation
        );
    }

    public function testUserBelongToManyCourseRelationship()
    {
        $model = new User();

        $relation = $model->courses();

        $this->assertBelongsToManyRelation(
            $model,
            'user_course.user_id',
            'user_course.course_id',
            $relation
        );
    }

    public function testUserHasManyCourseRelationship()
    {
        $model = new User();

        $relation = $model->course();

        $this->assertHasManyRelation($relation, $model, new User());
    }

    public function testUserMorphOneImageRelationship()
    {
        $model = new User();

        $relation = $model->image();

        $this->assertMorphOneRelation('imgable_type', 'imgable_id', $relation);
    }

    public function testUserHasManyReportLessonRelationship()
    {
        $model = new User();

        $relation = $model->reportLesson();

        $this->assertHasManyRelation($relation, $model, new User());
    }
}
