<?php

namespace Tests\Unit\Models;

use App\Models\Course;
use App\Models\Report;
use App\Models\User;
use PHPUnit\Framework\TestCase;
use Tests\ModelsTestCase;

class ReportTest extends ModelsTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testReportConfiguration()
    {
        $this->runConfigurationAssertions(new Report(), [
            'title',
            'description',
            'problem',
            'data_time',
            'user_id',
            'course_id'
        ]);
    }

    public function testReportBelongtoOwnerRelationship()
    {
        $model = new Report();

        $relation = $model->owner();

        $this->assertBelongsToRelation($relation, $model, new User(), 'user_id');
    }

    public function testReportBelongtocourseRelationship()
    {
        $model = new Report();

        $relation = $model->course();

        $this->assertBelongsToRelation($relation, $model, new Course(), 'course_id');
    }
}
