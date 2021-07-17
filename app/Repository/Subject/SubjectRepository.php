<?php

namespace App\Repository\Subject;

use App\Models\Subject;
use App\Repository\BaseRepository;
use Carbon\Carbon;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{
    public function __construct(Subject $subject)
    {
        parent::__construct($subject);
    }

    public function startDay($listSubject, $startday)
    {
        $date = Carbon::create($startday);
        $array_day = [];
        foreach ($listSubject as $arrsbj) {
            $startSubject = $date->addDays($arrsbj->duration);
            $format = $startSubject->toDateString();
            array_push($array_day, $format);
        }

        return $array_day;
    }

    public function getDay($listSubject, $startday)
    {
        $date = Carbon::create($startday);
        $startSubject = $date->addDays($listSubject->duration);
        $format = $startSubject->toFormattedDateString();

        return $format;
    }

    public function checkdate($listSubject, $startday)
    {
        $boolean = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $checkSbj = [];
        foreach ($this->startDay($listSubject, $startday) as $value) {
            $checkdate = $boolean >= $value;
            array_push($checkSbj, $checkdate);
        }

        return $checkSbj;
    }

    public function getNested($table1, $table2)
    {
        return $this->model::with([$table1, $table2]);
    }
    public function checkComplete($checked = [])
    {
        foreach ($checked as $tick) {
            $checkSubjec = 1;
            if ($tick == 0) {
                $checkSubjec = config('training.check.dontcheck');
                break;
            }
        }
        return $checkSubjec;
    }
}
