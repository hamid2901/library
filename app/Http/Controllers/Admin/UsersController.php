<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Models\UserStatus;
use App\Models\UserRole;
use App\Models\UserGender;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    // public function index(){
    //     $users = User::with(['userGender', 'userRole', 'userStatus'])->where('id', 1)->get();
    //     return view('admin.user.index')->with('users', $users);
    // }
    public function index()
    {
        $users = User::with(['userGender', 'userRole', 'userStatus'])->paginate(5);
        $userStatus = UserStatus::all();
        $userRole = UserRole::all();
        $userGender = UserGender::all();

        return view('admin.user.index')->with(['users'=> $users, 'userStatus'=> $userStatus, 'userGender'=>$userGender, 'userRole'=>$userRole]);
    }

    public function create()
    {
        $userStatus = UserStatus::all();
        $userRole = UserRole::all();
        $userGender = UserGender::all();

        return view('admin.user.create')->with(['userStatus'=> $userStatus, 'userGender'=>$userGender, 'userRole'=>$userRole]);
    }

    public function store(Request $request)
    {
       
        $photoName = time().'.'.$request->user_photo->getClientOriginalExtension();
        $request->user_photo->move(public_path('images/users_images/'), $photoName);
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status_id' => $request->input('status'),
            'role_id' => $request->input('role'),
            'sex' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'profession' => $request->input('profession'),
            'university' => $request->input('university'),
            'birthdate' => $request->input('birthdate'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'alley' => $request->input('alley'),
            'plate' => $request->input('plate'),
            'postal_code' => $request->input('postal_code'),
            'image_name' => $photoName,

        ]);
        return redirect()->back();


}

    public function edit($id)
    {
        $user = User::with(['userGender', 'userRole', 'userStatus'])->find($id);
        $userStatus = UserStatus::all();
        $userRole = UserRole::all();
        $userGender = UserGender::all();
        return view('admin.user.edit')->with(['user'=> $user, 'userStatus'=> $userStatus, 'userGender'=>$userGender, 'userRole'=>$userRole]);
    }

    public function update(Request $request, $id = null)
    {        
        $user = User::find($id);

        if($request->user_photo != null){
            if(File::exists(public_path('images/users_images/'.$user->image_name.''))) {
                File::delete(public_path('images/users_images/'.$user->image_name.''));
            }
            $photoName = time().'.'.$request->user_photo->getClientOriginalExtension();
            $request->user_photo->move(public_path('images/users_images/'), $photoName);
            $user->image_name = $photoName;
        }
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->status_id = $request->input('status');
        $user->role_id = $request->input('role');
        $user->sex = $request->input('gender');
        $user->phone = $request->input('phone');
        $user->profession = $request->input('profession');
        $user->university = $request->input('university');
        if($request->input('birthdate') != null)
        $user->birthdate = $request->input('birthdate');
        $user->city = $request->input('city');
        $user->street = $request->input('street');
        $user->alley = $request->input('alley');
        $user->plate = $request->input('plate');
        $user->postal_code = $request->input('postal_code');
        $user->updated_at = Carbon::now();

        $user->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

}