<?php

namespace App\Repository\User;

use App\Repository\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function paginateUser($colum, $para);
}
