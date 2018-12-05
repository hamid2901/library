@extends('layout')


@section('content')
<div class="col-md-8">

    <!-- Blog Post -->


    @foreach ($books as $book)

    <div class="lead"> عنوان کتاب: {{$book->title}}</div>

    <!-- Title -->
    <img class="zoom" src="{!! asset('images/book_images/'.$book->id.'/front.jpg') !!}" alt="hello">
    <img class="zoom" src="{!! asset('images/book_images/'.$book->id.'/back.jpg') !!}" alt="hello">
    <div style="float:left" class="row">
        @if(Auth::check())
        @if(Cart::session(Auth::user()->id)->get($book->id) != null)
        <form action="/factor/{{$book->id}}/removeFromCart" method="POST">
            {{ csrf_field() }}

            <button id="" value='{!! Auth::user()->id !!}' name="factor" style="" class="btn btn-danger">حذف کردن از
                سبد رزرو&nbsp<i class="fas fa-cart-plus text-light"></i></button>
        </form>
        @else
        <form action="/factor/{{$book->id}}/addToCart" method="POST">
            {{ csrf_field() }}

            <button id="" value='{!! Auth::user()->id !!}' name="factor" style="" class="btn btn-primary">اضافه کردن به
                سبد رزرو&nbsp<i class="fas fa-cart-plus text-light"></i></button>
        </form>
        @endif

        @else
        <a class="btn btn-primary">اضافه کردن به سبد رزرو&nbsp<i class="fas fa-plus-square"></i></a>
        <span>&nbsp برای رزرو کتاب باید عضو سایت باشید.</span>
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
        @include('layouts.errors')
        <!-- Comment -->
        @if(1)
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
            <h4 class="media-heading">{{ $comment->user->first_name }}&nbsp{{ $comment->user->last_name }}
                <small>ارسال شده در تاریخ {{ jdate($comment->created_at)->format('%B %d، %Y') }}</small>
            </h4>
            {{ $comment->content }}
        </div>
    </div>
    @endforeach

    {{--
    <!-- Comment -->--}}
    {{-- <div class="media">
        <div class="media-body">
            <h4 class="media-heading">علی موسوی
                <small>ارسال شده در تاریخ فرودین 1396</small>
            </h4>
            لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و
            طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه
            اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید
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
        </div>
    </div> --}}
</div>
@endforeach


<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
    <div class="well">
        <ul class="list-unstyled">
            @if(!Auth::check())
            <li><a href="{{url('/register')}}"><i class="fas fa-user-plus"></i>&nbspثبت نام</a>
            </li>
            <li><a href="{{url('/login')}}"><i class="fas fa-sign-in-alt"></i>&nbspورود</a>
            </li>
            @else
            <li>
                <p>
                    <img class="row zoom d-block" style="float:left; width:60px; height: 60px; padding-left: 15px" src={{asset('images/users_images/'.Auth::user()->image_name.'')}}
                        alt="بدون عکس">
                </p>
            </li>
            <li>سلام&nbsp{{ Auth::user()->first_name }}&nbsp{{ Auth::user()->last_name }}&nbspعزیز</li>
            <li><a href="{{url('/factor/reserved')}}" onclick="event.preventDefault();
                            document.getElementById('reserved-form').submit();"><i
                        class="fas fa-book"></i>&nbsp لیست کتاب های رزرو شده</a>
                <form id="reserved-form" action="{{url('/factor/reserved')}}" method="POST" style="display: none;">
                    @csrf
                    <input value="{!! Auth::user()->id !!}" name="user_id" type="text">
                </form>
            </li>
            <li><a href="{{url('/factor/borrowed')}}" onclick="event.preventDefault();
                            document.getElementById('borrowed-form').submit();"><i
                        class="fas fa-book-reader"></i>&nbspلیست کتاب های امانت گرفته
                    شده</a>


                <form id="borrowed-form" action="{{url('/factor/borrowed')}}" method="POST" style="display: none;">
                    @csrf
                    <input value="{!! Auth::user()->id !!}" name="user_id" type="text">
                </form>
            </li>
            <li><a href="{{url('/profile')}}"><i class="fas fa-user-circle"></i>&nbspمشاهده پروفایل</a>
            </li>
            <li><a href="{{url('/logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                        class="fas fa-sign-out-alt"></i>&nbspخروج از حساب کاربری</a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endif
        </ul>
    </div>
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


</div>



@endsection