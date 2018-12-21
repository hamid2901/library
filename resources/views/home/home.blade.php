@extends('layout')

@section('content')
<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
    {{--
    <!-- Blog Search Well -->
    <div class="well">
        <h4>جستجو</h4>
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
    </div> --}}
    <!-- Side Widget Well -->
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
</div>
<div class="col-md-8">

    <h1 class="page-header">
        آخرین کتاب ها
    </h1>

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
            @if ($book->availability_id == 1)
                <a style="float:left" class="btn disabled btn-success"> کتاب در دسترس است.&nbsp</a>
            @else
            @if ($book->availability_id == 2)
                <a style="float:left" class="btn disabled btn-danger"> کتاب در دسترس نیست.&nbsp</a>
            @else
            @if ($book->availability_id == 3)
                <a style="float:left" class="btn disabled btn-warning"> کتاب در دست امانت است.&nbsp</a>
                @else
            @if ($book->availability_id == 4)
                <a style="float:left" class="btn disabled btn-danger"> کتاب رزرو شده است.&nbsp</a>
            @endif
            @endif
            @endif
            @endif

        </div>
    </div>
    @endforeach
    <hr>

    <h1 class="page-header">
        آخرین اخبار
    </h1>

    <!-- First Blog Post -->
    @foreach( $news as $new )
    {{-- {{dd($news)}} --}}
    <div style="margin-bottom:10px" class="col-md-12 bg-light card">
        <h2>
            عنوان: <a href="{{url('/news/'.$new->id.'')}}">{{ $new->title }}</a>
        </h2>
        <p class="lead">
            ارسال شده توسط {{$new->user->first_name}}{{$new->user->last_name}}
        </p>
        <p><i class="far fa-clock"></i>&nbsp;</span>&nbspارسال شده در تاریخ {{ jdate($new->created_at)->format(' %d %B،
            %Y') }}</p>
        <hr>
        <img class="img-responsive" src="{!! asset('images/news_images/first/'.$new->image_dir.'.jpg') !!}" alt="hello">
        <hr>
        <p class="description">توضیحات: {!! $new->content !!}</p>
        <a class="btn btn-primary" href="{{url('/news/'.$new->id.'')}}">ادامه مطلب &nbsp<i class="fas fa-chevron-circle-left"></i></a>
    </div>


    @if(! $loop->last )
    <hr>
    @endif

    @endforeach
    <hr>
    <h1 class="page-header">
        آخرین مقالات
    </h1>

    <!-- First Blog Post -->
    @foreach( $articles as $article )
    <div style="margin-bottom:10px" class="col-md-12 bg-light card">
        <div class="col-md-3" style="padding: 5px">
            <img class="img-responsive zoom" src="{!! asset('images/article_images/images/'.$article->article_filename.'.jpg') !!}"
                alt="hello">
        </div>
        <script type='text/javascript'>
            $('.zoo-item').ZooMove();
        </script>
        <div class="col-md-9">
            <h3>
                <a href="{{url('/articles/'.$article->id.'')}}">{{ $article->title }}</a>
            </h3>
            <p class="lead" style="font-size: 15px !important">
                دسته بندی مقاله:
                @foreach( $article->categories as $article->category )
                <a href="{{url('/articles/'.$article->id.'')}}">{{$article->category->type}}</a>@if(! $loop->last )
                ،
                @endif
                @endforeach
            </p>
            <p class="lead" style="font-size: 15px !important">
                سال انتشار:
                {{jdate($article->publish_date)->format('%B %Y') }}
                <br>
                نویسندگان:
                @foreach( $article->authors as $article->author )
                @if ($article->author->role_id == 1)
                {{$article->author->first_name}}&nbsp{{$article->author->last_name}}
                @if(! $loop->last )
                ،
                @endif
                @endif

                @endforeach

                @foreach( $article->authors as $article->author )
                @if ($article->author->role_id == 2)
                {{$article->author->first_name}}&nbsp{{$article->author->last_name}}
                <span style="font-size:10px">(مترجم)</span>
                @if(! $loop->last )
                ،
                @endif
                @endif

                @endforeach
            </p>
            <p class="description">توضیحات: {{$article->description}}</p>
            <a class="btn btn-primary" href="{{url('/articles/'.$article->id.'')}}">مشاهده اطلاعات مقاله و دانلود &nbsp<i
                    class="fas fa-chevron-circle-left"></i></a>
        </div>
    </div>
    @endforeach

</div>


@endsection