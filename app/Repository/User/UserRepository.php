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
    public function search($request, $coloum)
    {
        $output = '';
        $users = DB::table('users')->where($coloum, 'LIKE', '%' . $request->search . '%')->get();
        if ($users) {
            foreach ($users as $key => $user) {
                if ($user->status == config('training.check.active')) {
                    $status = 'Active';
                } else {
                    $status = 'freetime';
                }
                $output .= '<tr>
                    <td>' . $user->role . '</td>
                    <td>' . $user->name . '</td>
                    <td>' . $status . '</td>' .
                    '<td><a href="user/' . $user->id . '" ><i class="fas fa-eye"></i></a></td>
                    <td>
                        <form action="user/' . $user->id . '"
                            method=POST>
                                ' . csrf_field() . '
                    ' . method_field('DELETE') . ' 
                                <button type="submit" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                        </form>
                    </td>
                    </tr>';
            }
        }

        return Response($output);
    }
}
