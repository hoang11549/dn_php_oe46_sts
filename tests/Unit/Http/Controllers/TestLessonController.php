<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\LessonController;
use App\Models\Lesson;
use App\Repository\Lesson\LessonRepositoryInterface;
use App\Repository\Subject\SubjectRepositoryInterface;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\ParameterBag;
use Mockery;
use Tests\TestCase;

class TestLessonController extends TestCase
{
    protected $lessonMock;
    protected $lesson;
    protected $subjectMock;
    protected $userMock;
    protected $controller;
    public function setUp(): void
    {
        parent::setUp();

        $this->lessonMock = Mockery::mock(LessonRepositoryInterface::class);
        $this->subjectMock = Mockery::mock(SubjectRepositoryInterface::class);
        $this->userMock = Mockery::mock(UserRepositoryInterface::class);
        $this->lesson = Mockery::mock(Lesson::class);

        $this->controller = new LessonController(
            $this->app->instance(SubjectRepositoryInterface::class, $this->subjectMock),
            $this->app->instance(LessonRepositoryInterface::class, $this->lessonMock),
            $this->app->instance(UserRepositoryInterface::class, $this->userMock),
        );
    }


    public function tearDown(): void
    {
        Mockery::close();

        parent::tearDown();
    }

    public function testShowCreateLesson()
    {

        $this->subjectMock
            ->shouldReceive('getAll')
            ->once()
            ->andReturn(new Collection);



        $result = $this->controller->create();

        $data = $result->getData();

        $this->assertEquals('pages.suppervisor.createLesson', $result->getName());

        $this->assertArrayHasKey('subject', $data);
    }

    public function testShowIndexLesson()
    {

        $this->lessonMock
            ->shouldReceive('getWith')
            ->once()
            ->andReturn(new Collection);

        $result = $this->controller->index();

        $data = $result->getData();

        $this->assertEquals('pages.suppervisor.listLesson', $result->getName());

        $this->assertArrayHasKey('lesson', $data);
    }

    public function testCreateLesson()
    {

        $this->lessonMock
            ->shouldReceive('create')
            ->once()
            ->andReturn(new Collection);

        $data = [
            "name"  =>  'abc',
            "subject_id" => 1,
            "url_document" => 'abc',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $result = $this->controller->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $result);

        $this->assertEquals(route('lesson.index'), $result->headers->get('Location'));
    }

    public function testEditLesson()
    {
        $this->lessonMock
            ->shouldReceive('findOrFail')
            ->once()
            ->andReturn(new Collection);
        $this->subjectMock
            ->shouldReceive('getAll')
            ->once()
            ->andReturn(new Collection);
        $result = $this->controller->edit($this->lesson);
        $data = $result->getData();

        $this->assertEquals('pages.suppervisor.editLesson', $result->getName());
        $this->assertArrayHasKey('lesson', $data);
        $this->assertArrayHasKey('subject', $data);
    }
    public function testUpdateLesson()
    {
        $this->lessonMock
            ->shouldReceive('update')
            ->once()
            ->andReturn(new Collection);
        $data = [
            "name"  =>  'abc',
            "subject_id" => 1,
            "url_document" => 'abc.asdasdas',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $result = $this->controller->update($request, $this->lesson);

        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('lesson.index'), $result->headers->get('Location'));
    }
}
