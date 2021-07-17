<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Controllers\ReportLessonController;
use App\Models\ReportLesson;
use App\Repository\ReportLesson\ReportLessonRepositoryInterface;
use Mockery;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

class TestReportLessonController extends TestCase
{
    protected $reportLessonMock;
    protected $reportLesson;
    protected $controller;

    public function setUp(): void
    {
        parent::setUp();
        $this->reportLessonMock = Mockery::mock(ReportLessonRepositoryInterface::class);
        $this->reportLesson = Mockery::mock(ReportLesson::class);
        $this->controller = new ReportLessonController(
            $this->app->instance(ReportLessonRepositoryInterface::class, $this->reportLessonMock),
        );
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function testIndexReportLesson()
    {
        $this->reportLessonMock
            ->shouldReceive('findWhere')
            ->once()
            ->andReturn(new Collection);
        $result = $this->controller->index();
        $data = $result->getData();
        $this->assertIsArray($data);
        $this->assertEquals('pages.suppervisor.listReportLesson', $result->getName());
        $this->assertArrayHasKey('listReport', $data);
    }

    public function testCreateReportLesson()
    {
        $this->reportLessonMock
            ->shouldReceive()
            ->once()
            ->andReturn(new Collection);
        $request = new Request;
        $request->headers->set('content-type', 'application/json');
        $data = [
            'lessonId' => 1,
            'date' => '2020-10-10',
            'idSubject' => 1,
        ];
        $request->setJson(new ParameterBag($data));
        $result = $this->controller->create($request);
        $data = $result->getData();
        $this->assertEquals('pages.trainee.reportLesson', $result->getName());
        $this->assertArrayHasKey('lessonId', $data);
        $this->assertArrayHasKey('date', $data);
        $this->assertArrayHasKey('idSubject', $data);
    }

    public function testShowReportLesson()
    {
        $this->reportLessonMock
            ->shouldReceive('findOrFail')
            ->once()
            ->andReturn(new Collection);
        $result = $this->controller->show($this->reportLesson);
        $data = $result->getData();
        $this->assertEquals('pages.suppervisor.detailReport', $result->getName());
        $this->assertArrayHasKey('report', $data);
    }
}
