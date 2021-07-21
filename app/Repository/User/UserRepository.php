<?php

namespace App\Repository\User;

use App\Models\User;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
    public function paginateUser($colum, $para)
    {
        try {
            $find = $this->model->where($colum, $para)->paginate(3);
        } catch (ModelNotFoundException $exception) {
            Log::debug("Id not found");

            return false;
        }

        return $find;
    }
}
