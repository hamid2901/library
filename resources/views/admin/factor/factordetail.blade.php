@extends('layouts.admin')
@section('form') 
<div class="card">
    <div class="card-header">
    <div class="m-auto">شماره {{$factor->id}}</div>
        تاریخ
        <strong>{{jdate($factor->reserve_date)->format('%B %d، %Y')}}</strong>
        <span class="float-right">
                <strong>وضعیت:</strong>
        @if($factor->borrow_status == 0)
            <strong>رزرو شده</strong>
        @elseif($factor->borrow_status == 1)
            <strong>در دست مشتری</strong>
        @else
            <strong>رسید شد</strong>
        @endif
        </span>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-sm-12 float-r">
                <h6 class="mb-3">مشخصات صاحب فاکتور</h6>
                <div>
                    <strong>{{$factor->users[0]->first_name}} {{$factor->users[0]->last_name}} : نام و نام خانوادگی</strong>
                </div>
                <div>تلفن : {{$factor->users[0]->phone}}</div>
                <div>{{$factor->users[0]->city}} ، {{$factor->users[0]->street}} : آدرس</div>
            </div>
        </div>

        <div class="table-responsive-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="center">شماره</th>
                        <th>نام گتاب</th>
                        <th>شابک</th>
                        <th class="right">قیمت</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($factor->books as $book)
                    <tr>
                        <td class="center">{{$book->id}}</td>
                        <td class="left strong">{{$book->title}}</td>
                        <td class="left">{{$book->isbn}}</td>
                        <td class="right">{{$book->price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop