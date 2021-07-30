<?php

namespace App\Http\Controllers;

use App\Http\Request\ValidatorUser;
use App\Http\Requests\RegisterRequest;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('check-role')) {
            $users = $this->userRepository->listPaginate(config('training.paginate_course'));

            return view('pages.suppervisor.users.listUser', compact('users'));
        } else {
            $arrayHome = [];
            $arrayHome = $this->trainee->homeTrainee();

            return view('pages.trainee.home', compact('arrayHome'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        return view('pages.trainee.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->userRepository->findOrFail($id);
        if (Gate::allows('check-role')) {
            $editData =
                [
                    "name" => $request->name,
                    "age" => $request->age,
                    "address" => $request->address,
                    "role" => $request->role,
                ];
        } else {
            $editData = [
                "name" => $request->name,
                "age" => $request->age,
                "address" => $request->address,
            ];
        }
        $courses = $this->userRepository->update($id, $editData);
        if ($request->has('avatar')) {
            $updateImage = $this->userRepository->handleImgAva($request, $id, 'avatar');
        }

        return redirect()->route('user.show', ['user' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->userRepository->delete($id)) {
            return redirect()->route('user.index');
        }

        return back()->withError('notDelete');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            return $this->userRepository->search($request, 'name');
        }

        return back()->withError('notDelete');
    }
}
