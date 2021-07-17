<?php

namespace Tests\Unit\Models;

use App\Models\Course;
use App\Models\Image;
use Tests\ModelsTestCase;
use Illuminate\Support\Facades\Schema;

class ImageTest extends ModelsTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testImageConfiguration()
    {
        $this->runConfigurationAssertions(new Image(), [
            'imgable_type',
            'url',
            'imgable_id',
        ]);
    }
}
