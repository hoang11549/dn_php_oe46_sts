<?php

namespace Tests\Unit\Models;

use App\Models\CommentReport;
use App\Models\Lesson;
use App\Models\ReportLesson;
use App\Models\User;
use Tests\ModelsTestCase;

class ReportLessonTest extends ModelsTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testReportLessonConfiguration()
    {
        $this->runConfigurationAssertions(new ReportLesson(), [
            'title',
            'content',
            'lesson_id',
            'owner_id',
            'status',
        ]);
    }

    public function testReportLessonBelongtoLessonRelationship()
    {
        $model = new ReportLesson();

        $relation = $model->lessons();

        $this->assertBelongsToRelation($relation, $model, new Lesson(), 'lesson_id');
    }

    public function testUserBelongtoLessonRelationship()
    {
        $model = new ReportLesson();

        $relation = $model->owner();

        $this->assertBelongsToRelation($relation, $model, new User(), 'owner_id');
    }

    public function testReportLessonHasManyCommentReportRelationship()
    {
        $model = new ReportLesson();

        $relation = $model->comments();

        $this->assertHasManyRelation($relation, $model, new CommentReport(), 'report_id');
    }
}
