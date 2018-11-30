@extends('layouts.admin')

@section('form')



<div class="container">
    <div class="row col-12">
        <a href="admin/users/create" class="badge badge-primary p-3 m-2">ایجاد کاربر</a>
    </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
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
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        @foreach($userStatus as $status)
                        <option value="{{$status->id}}" @if ($user->status_id === $status->id)
                            selected
                            @endif >{{$status->status}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        @foreach($userRole as $role)
                        <option value="{{$role->id}}" @if ($user->role_id === $role->id)
                            selected
                            @endif >{{$role->role}}</option>
                        @endforeach
                    </select>
                </td>
            <td class=""><a href="/admin/users/{{$user->id}}/edit"><i class="fas fa-edit"></i></a></td>
                <td class=""><a href=""><i class="fas fa-user-times"></i></a></td>
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