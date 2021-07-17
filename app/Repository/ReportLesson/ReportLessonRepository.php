<?php

namespace App\Repository\ReportLesson;

use App\Models\ReportLesson;
use App\Repository\BaseRepository;
use Carbon\Carbon;

class ReportLessonRepository extends BaseRepository implements ReportLessonRepositoryInterface
{
    public function __construct(ReportLesson $reportLesson)
    {
        parent::__construct($reportLesson);
    }

    public function getwithfind($coloum, $para, $table = [])
    {
        return $this->model::with($table)->where($coloum, $para)->get();
    }

    public function getwithAuthor($coloum, $para)
    {
        return $this->model->where([$coloum => $para]);
    }
}
