<?php

namespace App\Repository\Topic;

use App\Models\Topic;
use App\Repository\BaseRepository;

class TopicRepository extends BaseRepository implements TopicRepositoryInterface
{
    public function __construct(Topic $topic)
    {
        parent::__construct($topic);
    }
}
