<?php

namespace App\Repository\User;

use App\Models\Image;
use App\Models\User;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $find = $this->model->where($colum, $para)->paginate(config('training.paginate_course'));
        } catch (ModelNotFoundException $exception) {
            Log::debug("Id not found");

            return false;
        }

        return $find;
    }
    public function handleImgAva(Request $request, $UserID, $nameImage)
    {

        $CoursImg = $request->file($nameImage);
        $path = 'assets/images/user/';
        $name = $CoursImg->getClientOriginalName();
        $storedPath = $CoursImg->move($path, $name);
        $avatar = User::find($UserID);
        $avatar->image->url = $path . $name;
        $update = DB::table('images')->where('id', $avatar->image->id)->update(['url' => $path . $name]);
    }
}
