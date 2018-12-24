@extends('layouts.admin')

@section('form')



<div class="container">
    <div class="row col-12">
        <a href="/admin/users/create" class="badge badge-primary p-3 m-2">ایجاد کاربر</a>
    </div>
    <table class="table table-bordered" id="users_table">
     <thead >
            <tr>
                <th class="">شناسه</th>
                <th class="">نام</th>
                <th class="">نام خانوادگی</th>
                <th class="">جنسیت</th>
                <th class="">ایمیل</th>
                <th class="">وضعیت</th>
                <th class="">نقش</th>
                <th class="">ویرایش</th>
                <th class="">حذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row" class="">{{$user->id}}</th>
                <td class="">{{$user->first_name}}</td>
                <td class="">{{$user->last_name}}</td>
                <td>
                    @foreach($userGender as $gender)
                    @if ($user->sex === $gender->id)
                    {{$gender->sex}}
                    @endif
                    @endforeach
                </td>
                <td class="">{{$user->email}}</td>

                <td>
                    @foreach($userStatus as $status)

                    @if ($user->status_id === $status->id)
                    {{$status->status}}
                    @endif @endforeach

                </td>
                <td>
                    @foreach($userRole as $role)
                    @if ($user->role_id === $role->id)
                    {{$role->role}}
                    @endif
                    @endforeach
                </td>
                <td class=""><a href="/admin/users/{{$user->id}}/edit"><i class="fas fa-edit"></i></a></td>
                <td class=""><a href="/admin/users/{{$user->id}}/delete"><i class="fas fa-user-times"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div style="text-align:center;">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    {{$users->links()}}
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Pager -->

@stop

@section('pageSpecificScripts')
   
@stop
