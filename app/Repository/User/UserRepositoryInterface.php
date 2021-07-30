<?php

namespace App\Repository\User;

use App\Repository\RepositoryInterface;
use Illuminate\Http\Request;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function paginateUser($colum, $para);

    public function handleImgAva(Request $request, $UserID, $nameImage);

    public function search($request, $coloum);
}
