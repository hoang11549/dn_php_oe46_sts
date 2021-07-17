<?php

namespace App\Repository\DailyReport;

use App\Models\Report;
use App\Repository\BaseRepository;

class DailyReportrepository extends BaseRepository implements DailyReportRepositoryInterface
{
    public function __construct(Report $report)
    {
        parent::__construct($report);
    }
}
