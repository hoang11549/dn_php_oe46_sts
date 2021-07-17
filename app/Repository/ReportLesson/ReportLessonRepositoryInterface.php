<?php

namespace App\Repository\ReportLesson;

use App\Repository\RepositoryInterface;

interface ReportLessonRepositoryInterface extends RepositoryInterface
{
    public function getwithfind($coloum, $para, $table = []);

    public function getwithAuthor($coloum, $para);
}
