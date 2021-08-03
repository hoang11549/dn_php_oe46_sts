<?php

namespace Tests\Unit\Models;

use App\Models\Course;
use App\Models\Topic;
use Tests\ModelsTestCase;

class TopicTest extends ModelsTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testTopicConfiguration()
    {
        $this->runConfigurationAssertions(new Topic(), [
            'name',
            'description',
        ]);
    }

    public function testLessonHasManyReportLessonRelationship()
    {
        $model = new Topic();

        $relation = $model->courses();

        $this->assertHasManyRelation($relation, $model, new Course());
    }
}
