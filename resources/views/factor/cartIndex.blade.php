@extends('layout')

@section('content')
<div class="col-md-4">
        @if (empty($books[0]))
        @else
        <div class="well">
            <form action="/factor/submitCart" method="POST">
                {{ csrf_field() }}
                <button id="" value='{!! Auth::user()->id !!}' name="user" style="" class="btn btn-lg btn-success">
                    تایید رزرو
                    &nbsp<i class="fas fa-check-circle"></i></button>
            </form>
        </div>
        @endif
    
        <div class="well">
            <ul class="list-unstyled">
                    @if(!Auth::check())
                    <li><a href="{{url('/register')}}"><i class="fas fa-user-plus"></i>&nbspثبت نام</a>
                    </li>
                    <li><a href="{{url('/login')}}"><i class="fas fa-sign-in-alt"></i>&nbspورود</a>
                    </li>
                    @else 
                    @if (Auth::user()->role_id == 1)
                    <li>
                            <p>
                                <img class="row zoom rounding d-block" style="float:left; width:60px; height: 60px; padding-left: 15px" src={{asset('images/users_images/'.Auth::user()->image_name.'')}}
                                    alt="بدون عکس">
                            </p>
                        </li>
                        <li>سلام&nbsp{{ Auth::user()->first_name }}&nbsp{{ Auth::user()->last_name }}&nbspعزیز</li>
                        <li>شما به عنوان مدیر وارد شده اید.</li>
    
                        <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-user-circle"></i>&nbspداشبورد مدیر </a>
                        </li>
                        <li><a href="{{ url('logout/') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt"></i>&nbspخروج از حساب مدیریت</a>
            
                            <form id="logout-form" action="{{ url('logout/') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                    <li>
                        <p>
                            <img class="row zoom rounding d-block" style="float:left; width:60px; height: 60px; padding-left: 15px" src={{asset('images/users_images/'.Auth::user()->image_name.'')}}
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
    
<div class="col-md-8">

    <h1 class="page-header">
    {{$item}} {!! Auth::user()->first_name !!}&nbsp{!! Auth::user()->last_name !!}
    </h1>
    @if (empty($books[0]))
    <i style="font-size:50px; align: center" class="far fa-smile-wink"></i>
    <h2>{{$message}}</h2>
    @endif
    <!-- First Blog Post -->
    @foreach( $books as $book )

    <div style="margin-bottom:10px" class="col-md-12 bg-light card">
        <div class="col-md-3" style="padding: 5px">
            <img class="img-responsive zoom" src="{!! asset('images/book_images/front/'.$book->image_dir.'') !!}" alt="hello">
        </div>
        <div class="col-md-9">
            <h3>
                <a href="{{url('/books/'.$book->id.'')}}">{{ $book->title }}</a>
            </h3>
            <p class="lead" style="font-size: 15px !important">
                دسته بندی کتاب:
                @foreach( $book->categories as $book->category )
                <a href="{{url('/books/'.$book->id.'')}}">{{$book->category->type}}</a>@if(! $loop->last )
                ،
                @endif
                @endforeach
            </p>
            <p class="lead" style="font-size: 15px !important">
                ناشر:
                {{$book->publisher->name}}
                <br>
                سال انتشار:
                {{jdate($book->issue_date)->format('%B %Y') }}
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
            <p class="description">توضیحات: {{$book->description}}</p>
            <a class="btn btn-primary" href="{{url('/books/'.$book->id.'')}}">مشاهده اطلاعات کتاب &nbsp<i class="fas fa-chevron-circle-left"></i></a>
            <div style="float:left">
                @if(Cart::session(Auth::user()->id)->get($book->id) != null)
                <form action="/factor/{{$book->id}}/removeFromCart" method="POST">
                    {{ csrf_field() }}

                    <button id="" value='{!! Auth::user()->id !!}' name="factor" style="" class="btn btn-danger">حذف
                        کردن
                        از
                        سبد رزرو&nbsp<i class="fas fa-cart-plus text-light"></i></button>
                </form>
                @else
                <form action="/factor/{{$book->id}}/addToCart" method="POST">
                    {{ csrf_field() }}

                    <button id="" value='{!! Auth::user()->id !!}' name="factor" style="" class="btn btn-primary">اضافه
                        کردن به
                        سبد رزرو&nbsp<i class="fas fa-cart-plus text-light"></i></button>
                </form>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection