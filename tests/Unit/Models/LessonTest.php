<?php

namespace Tests\Unit\Models;

use App\Models\Lesson;
use App\Models\ReportLesson;
use App\Models\Subject;
use Tests\ModelsTestCase;

class LessonTest extends ModelsTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLessonConfiguration()
    {
        $this->runConfigurationAssertions(new Lesson(), [
            'name',
            'url_document',
            'subject_id',
        ]);
    }

    public function testLessonBelongtoSubjectRelationship()
    {
        $model = new Lesson();

        $relation = $model->subject();

        $this->assertBelongsToRelation($relation, $model, new Subject(), 'subject_id');
    }

    public function testLessonHasManyReportLessonRelationship()
    {
        $model = new Lesson();

        $relation = $model->reportLesson();

        $this->assertHasManyRelation($relation, $model, new ReportLesson());
    }
}
