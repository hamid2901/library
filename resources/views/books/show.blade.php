@extends('layout')


@section('content')
<div class="col-md-8">

    <!-- Blog Post -->


    @foreach ($books as $book)

    <div class="lead"> عنوان کتاب: {{$book->title}}</div>

    <!-- Title -->
    <img class="zoom" src="{!! asset('images/book_images/'.$book->id.'/front.jpg') !!}" alt="hello">
    <img class="zoom" src="{!! asset('images/book_images/'.$book->id.'/back.jpg') !!}" alt="hello">

    <!-- Author -->
    <p class="lead">
        <p class="lead" style="font-size: 15px !important">
            دسته بندی کتاب:
            @foreach( $book->categories as $book->category )
            <a href="{{url('/books/'.$book->id.'')}}">{{$book->category->type}}</a>@if(! $loop->last )
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
    <hr>
    <!-- Post Content -->
    {!! $book->description !!}
    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        @include('layouts.errors')
        <!-- Comment -->
        @if(1)
        <h4>ارسال کامنت :</h4>
        <hr>
        <form role="form" action="/bookComments/store" method="post">
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
    @foreach($book->bookComments as $comment)
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading">{{ $comment->user->last_name }}
                <small>ارسال شده در تاریخ {{ jdate($comment->created_at)->format('%B %d، %Y') }}</small>
            </h4>
            {{ $comment->content }}
        </div>
    </div>
    @endforeach

    {{--
    <!-- Comment -->--}}
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading">علی موسوی
                <small>ارسال شده در تاریخ فرودین 1396</small>
            </h4>
            لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و
            طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه
            اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید
            {{--
            <!-- Nested Comment -->--}}
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading">حسام موسوی
                        <small>ارسال شده در تاریخ فرودین 1396</small>
                    </h4>
                    لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ،
                    صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر
                    کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید
                </div>
            </div>
            {{--
            <!-- End Nested Comment -->--}}
        </div>
    </div>
</div>
@endforeach


<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>جستجو در کتاب ها</h4>
        <form action="/books" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="word" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>دسته بندی کتاب ها</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @foreach ($categories as $category)
                    <li><a href="{{url('/books/category/'.$category->type.'')}}">{{$category->type}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <div class="well">
        <h4>ناشران</h4>
        <ul class="list-unstyled">
            @foreach ($publishers as $publisher)
            <li><a href="{{url('/books/publisher/'.$publisher->name.'')}}">{{$publisher->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- Side Widget Well -->
    <div class="well">
        <ul class="list-unstyled">
            <li><a href="{{url('/register')}}"><i class="fas fa-user-plus"></i>&nbspثبت نام</a>
            </li>
            <li><a href="{{url('/login')}}"><i class="fas fa-sign-in-alt"></i>&nbspورود</a>
            </li>
        </ul>
    </div>
</div>



@endsection