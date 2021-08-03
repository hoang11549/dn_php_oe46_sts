<?php

namespace Tests\Unit\Models;

use App\Models\CommentReport;
use App\Models\ReportLesson;
use App\Models\User;
use PHPUnit\Framework\TestCase;
use Tests\ModelsTestCase;

class CommentTest extends ModelsTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCommentConfiguration()
    {
        $this->runConfigurationAssertions(new CommentReport(), [
            'report_id',
            'user_id',
            'content',
            'comment_parent_id',
        ]);
    }

    public function testCommentBelongtoUserRelationship()
    {
        $model = new CommentReport();

        $relation = $model->user();

        $this->assertBelongsToRelation($relation, $model, new User(), 'user_id');
    }

    public function testCommentBelongtReportRelationship()
    {
        $model = new CommentReport();

        $relation = $model->report();

        $this->assertBelongsToRelation($relation, $model, new ReportLesson(), 'report_id');
    }

    public function testCommentHasManyReplyRelationship()
    {
        $model = new CommentReport();

        $relation = $model->replies();

        $this->assertHasManyRelation($relation, $model, new CommentReport(), 'comment_parent_id');
    }
}
