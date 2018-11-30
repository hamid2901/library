<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Models\UserStatus;
use App\Models\UserRole;
use App\Models\UserGender;

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

    public function store()
    {
        $users = User::with(['userGender', 'userRole', 'userStatus'])->paginate(5);
        $userStatus = UserStatus::all();
        $userRole = UserRole::all();
        $userGender = UserGender::all();

        return view('admin.user.index')->with(['users'=> $users, 'userStatus'=> $userStatus, 'userGender'=>$userGender, 'userRole'=>$userRole]);
    }

    public function edit()
    {
        $users = User::with(['userGender', 'userRole', 'userStatus'])->paginate(5);
        $userStatus = UserStatus::all();
        $userRole = UserRole::all();
        $userGender = UserGender::all();

        return view('admin.user.index')->with(['users'=> $users, 'userStatus'=> $userStatus, 'userGender'=>$userGender, 'userRole'=>$userRole]);
    }

    public function update()
    {
        $users = User::with(['userGender', 'userRole', 'userStatus'])->paginate(5);
        $userStatus = UserStatus::all();
        $userRole = UserRole::all();
        $userGender = UserGender::all();

        return view('admin.user.index')->with(['users'=> $users, 'userStatus'=> $userStatus, 'userGender'=>$userGender, 'userRole'=>$userRole]);
    }

    public function delete()
    {
        $users = User::with(['userGender', 'userRole', 'userStatus'])->paginate(5);
        $userStatus = UserStatus::all();
        $userRole = UserRole::all();
        $userGender = UserGender::all();

        return view('admin.user.index')->with(['users'=> $users, 'userStatus'=> $userStatus, 'userGender'=>$userGender, 'userRole'=>$userRole]);
    }


}
