<?php

namespace App\Repository\Subject;

use App\Models\Subject;
use App\Repository\BaseRepository;

class SubjectRepository extends BaseRepository implements SubjectRepositoryInterface
{
    public function __construct(Subject $subject)
    {
        parent::__construct($subject);
    }
}
