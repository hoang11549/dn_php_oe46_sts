<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->integer('lesson_id');
            $table->integer('owner_id');
            $table->boolean('status')->default(config('training.check.dontCheck'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_lessons');
    }
}
