@extends('layouts.admin')

@section('form')
    
   
<div class="container">
   
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="">شناسه فاکتور</th>
                <th class="">نام کاربر</th>
                <th class="">تاریخ رزرو</th>
                <th class="">تاریخ امانت</th>
                <th class="">مدت</th>
                <th class="">وضعیت</th>
               
                <th class="">ویرایش</th>
                <th class="">حذف</th>
            </tr>
        </thead>
        <tbody>
            @foreach($factors as $factor)
            <tr>
                <th scope="row" class="">{{$book->id}}</th>
                <td class="">{{$book->title}}</td>
                <td class="">
                  @foreach( $book->categories as $book->category )
                     {{$book->category->type}}
                  @if(! $loop->last )
                     ،
                  @endif
                  @endforeach
               </td>
               <td class="">
                  @foreach( $book->authors as $book->author )
                     {{$book->author->last_name}}
                  @endforeach
               </td>
              
                <td class="">{{$book->bookFormat->format}}</td>
                <td class="">{{$book->price}}</td>
               
                <td class=""><a href="/admin/books/{{$book->id}}/edit"><i class="fas fa-edit"></i></a></td>
                <td class=""><a href="/admin/books/{{$book->id}}/delete"><i class="fas fa-trash"></i></a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div style="text-align:center;">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    {{$books->links()}}
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Pager -->

@stop