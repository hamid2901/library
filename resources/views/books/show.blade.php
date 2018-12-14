@extends('layout')

@section('content')

@include('books.sidebar')
<div class="col-md-8">

    @foreach ($books as $book)
    <div class="lead">
        <h4></h4>
    </div>
    @include('layouts.errors')
    <div class="lead"> عنوان کتاب: {{$book->title}}</div>

    <!-- Title -->
    <img class="zoom" src="{!! asset('images/book_images/'.$book->id.'/front.jpg') !!}" alt="hello">
    <img class="zoom" src="{!! asset('images/book_images/'.$book->id.'/back.jpg') !!}" alt="hello">
    <div style="float:left" class="row">

        @if($book->availability_id == 1)
        @if(Auth::check())
        @if(Cart::session(Auth::user()->id)->get($book->id) != null)
        @else
        <form action="/factor/{{$book->id}}/addToCart" method="POST">
            {{ csrf_field() }}
            <button id="" value='{!! Auth::user()->id !!}' name="factor" style="" class="btn btn-primary">اضافه کردن به
                سبد رزرو&nbsp<i class="fas fa-cart-plus text-light"></i></button>
        </form>
        @endif
        @else
        <a class="btn btn-primary">اضافه کردن به سبد رزرو&nbsp<i class="fas fa-plus-square"></i></a>
        <span>&nbsp برای رزرو باید عضو سایت باشید.</span>
        @endif
        @else
        @if($book->availability_id == 2)
        <a class="btn btn-danger disabled">کتاب خارج از دسترس است. &nbsp</a>
        @else
        @if($book->availability_id == 3)
        <a class="btn btn-danger disabled">کتاب در دست امانت است&nbsp</a>

        @else
        @if($book->availability_id == 4)
        @if(Cart::session(Auth::user()->id)->get($book->id) != null)
        <form action="/factor/{{$book->id}}/removeFromCart" method="POST">
            {{ csrf_field() }}

            <button id="" value='{!! Auth::user()->id !!}' name="factor" style="" class="btn btn-danger">حذف کردن از
                سبد رزرو&nbsp<i class="far fa-trash-alt"></i></button>
        </form>
        @else
        <a class="btn btn-warning disabled">کتاب رزرو شده است.&nbsp</a>
        @endif
        @endif
        @endif
        @endif
        @endif

    </div>
    <!-- Author -->
    <p class="lead">
        <p class="lead" style="font-size: 15px !important">
            دسته بندی کتاب:
            @foreach( $book->categories as $book->category )
            <a href="{{url('/books/category/'.$book->category->type.'')}}">{{$book->category->type}}</a>@if(!
            $loop->last )
            ،
            @endif
            @endforeach
        </p>
    </p>
    <p class="lead" style="font-size: 15px !important">
        ناشر:
        {{$book->publisher->name}}
        <br>
        سال انتشار:
        {{jdate($book->issue_date)->format('%B %Y') }}
        <br>
        جلد:
        {{$book->cover}}
        <br>
        تعداد صفحات:
        {{$book->pages}}
        <br>
        شابک:
        {{$book->isbn}}
        <br>
        قطع کتاب:
        {{$book->bookFormat->format}}
        <br>
        وزن:
        {{$book->weight}}
        <br>
        قیمت:
        {{$book->price}}
        <br>

        نویسندگان:
        @foreach( $book->authors as $book->author )
        @if ($book->author->role_id == 1)
        {{$book->author->first_name}}&nbsp{{$book->author->last_name}}
        @if(! $loop->last )
        ،
        @endif
        @endif


        @endforeach
        @foreach( $book->authors as $book->author )
        @if ($book->author->role_id == 2)
        {{$book->author->first_name}}&nbsp{{$book->author->last_name}}
        <span style="font-size:10px">(مترجم)</span>
        @if(! $loop->last )
        ،
        @endif
        @endif

        @endforeach
    </p>
    توضیحات:
    <!-- Post Content -->
    {!! $book->description !!}
    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <!-- Comment -->
        @if(Auth::check())
        <h4>ارسال کامنت :</h4>
        <hr>
        <form role="form" action='/books/{{$book->id}}/comment/{{ Auth::id() }}' method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="title">متن : </label>
                <textarea class="form-control" name="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
        @else
        <a href="/register">برای ارسال کامنت حتما باید عضو وبسایت باشید</a>
        @endif

    </div>

    <hr>
    <!-- Posted Comments -->
    @foreach($comments as $comment)
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading"><img class="" style="float:left; width:60px; height: 60px; padding-left: 15px"
                    src={{asset('images/users_images/'.$comment->user->image_name.'')}} alt="بدون عکس"> {{
                $comment->user->first_name }}&nbsp{{ $comment->user->last_name }}
                {{-- {{dd(jdate($comment->created_at)->format('%d %B %Y'))}} --}}
                <small>ارسال شده در {{ jdate($comment->created_at)->format('%d %B %Y') }}</small>
            </h4>
            {{ $comment->content }}
        </div>
    </div>
    @endforeach
</div>
@endforeach






@endsection