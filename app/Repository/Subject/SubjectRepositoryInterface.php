<?php

namespace App\Repository\Subject;

use App\Repository\RepositoryInterface;

interface SubjectRepositoryInterface extends RepositoryInterface
{
    public function startDay($listSubject, $day);
    public function checkdate($listSubject, $startday);
    public function getDay($listSubject, $startday);
}
