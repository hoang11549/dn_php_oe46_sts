<?php

namespace Tests\Unit\Models;

use App\Models\Course;
use App\Models\Report;
use App\Models\Topic;
use App\Models\User;
use Tests\ModelsTestCase;

class CourseTest extends ModelsTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCourseConfiguration()
    {
        $this->runConfigurationAssertions(new Course(), [
            'name',
            'start_date',
            'duration',
            'user_id',
            'topic_id',
            'status',
        ]);
    }

    public function testCourseBelongtoTopicRelationship()
    {
        $model = new Course();

        $relation = $model->topic();

        $this->assertBelongsToRelation($relation, $model, new Topic(), 'topic_id');
    }

    public function testCourseBelongToManyUserRelationship()
    {
        $model = new Course();

        $relation = $model->users();

        $this->assertBelongsToManyRelation(
            $model,
            'user_course.course_id',
            'user_course.user_id',
            $relation
        );
    }

    public function testCourseBelongToManySubjectRelationship()
    {
        $model = new Course();

        $relation = $model->subjects();

        $this->assertBelongsToManyRelation(
            $model,
            'course_subject.course_id',
            'course_subject.subject_id',
            $relation
        );
    }

    public function testCourseMorphOneImageRelationship()
    {
        $model = new Course();

        $relation = $model->image();

        $this->assertMorphOneRelation('imgable_type', 'imgable_id', $relation);
    }

    public function testCourseBelongtoUserRelationship()
    {
        $model = new Course();

        $relation = $model->owner();

        $this->assertBelongsToRelation($relation, $model, new User(), 'user_id');
    }

    public function testCourseHasManyReportDailyRelationship()
    {
        $model = new Course();

        $relation = $model->reportDaily();

        $this->assertHasManyRelation($relation, $model, new Report());
    }
}
