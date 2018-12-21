@extends('layouts.admin')

@section('form')
    
   
<div class="container">
   
    <table class="table table-bordered mt-5">
        <thead class="thead-dark">
            <tr>
                <th class="">شناسه فاکتور</th>
                <th class="">نام کاربر</th>
                <th class="">تاریخ رزرو</th>
                <th class="">تاریخ امانت</th>
                <th class="">مدت</th>
                <th class="">وضعیت امانت</th>
               
                <th class="">ویرایش</th>
                <th class="">حذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach($factors as $factor)
            <tr>
                <th scope="row" class="">{{$factor->id}}</th>
            
                <td class="">{{$factor->users[0]->last_name}}</td>
                <td class="">{{$factor->reserve_date}}</td>
                <td class="">{{$factor->borrow_date}}</td>
                <td class="">{{$factor->duraiton}}</td>
                <td class="">{{$factor->borrow_status}}</td>
               
                <td class=""><a href="/admin/factors/{{$factor->id}}/edit"><i class="fas fa-edit"></i></a></td>
                <td class=""><a href="/admin/factors/{{$factor->id}}/delete"><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div style="text-align:center;">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    {{$factors->links()}}
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Pager -->

@stop