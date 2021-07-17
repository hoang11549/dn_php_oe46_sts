<?php

namespace Tests\Unit\Models;

use App\Models\Lesson;
use App\Models\Subject;
use Tests\ModelsTestCase;

class SubjectTest extends ModelsTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSubjectConfiguration()
    {
        $this->runConfigurationAssertions(new Subject(), [
            'name',
            'duration',
            'description',
        ]);
    }

    public function testSubjectHasManylessonRelationship()
    {
        $model = new Subject();

        $relation = $model->lessons();

        $this->assertHasManyRelation($relation, $model, new Lesson());
    }

    public function testSubjectBelongToManyUsersRelationship()
    {
        $model = new Subject();

        $relation = $model->users();

        $this->assertBelongsToManyRelation(
            $model,
            'user_subject.subject_id',
            'user_subject.user_id',
            $relation
        );
    }

    public function testSubjectBelongToManyCourseRelationship()
    {
        $model = new Subject();

        $relation = $model->courses();

        $this->assertBelongsToManyRelation(
            $model,
            'course_subject.subject_id',
            'course_subject.course_id',
            $relation
        );
    }
}
