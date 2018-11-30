@extends('layouts.admin')

@section('form')
<?php var_dump($users);die; ?>

    <div class="row col-12">
        <a href="#" class="badge badge-primary p-3 m-2">Create User</a>
    </div>
    
    
    <table class="table text-center">
        <thead class="thead-light">
            <tr class="d-flex">
                <th class="col-1">number</th>
                <th class="col-1">firstname</th>
                <th class="col-2">lastname</th>
                <th class="col-3">email</th>
                <th class="col-1">status</th>
                <th class="col-2">active/disactive</th>
                <th class="col-1">edit</th>
                <th class="col-1">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="d-flex">
            <th scope="row" class="col-1">1</th>
            <td class="col-1">$user->first_name</td>
            <td class="col-2">Otto</td>
            <td class="col-3">@mdo</td>
            <td class="col-1">admin</td>
            <td class="col-2">
            <span class="switch">
                <input type="checkbox" class="switch" id="">
            </span>
            </td>
            <td class="col-1"><i class="fas fa-edit"></i></td>
            <td class="col-1"><i class="fas fa-user-times"></i></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop
