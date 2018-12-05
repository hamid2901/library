@extends('layout')

@section('content')
<div class="col-md-8">

    <h1 class="page-header">
        کتاب ها
    </h1>
    @foreach ($searchedBooks as $searchedBook)
    @foreach ($searchedBook->books as $book)

    <div style="margin-bottom:5px" class="col-md-12 bg-light card">
        <div class="col-md-3" style="padding: 5px">
            <img class="img-responsive zoom" src="{!! asset('images/book_images/'.$book->id.'/front.jpg') !!}" alt="hello">
        </div>
        <script type='text/javascript'>
            $('.zoo-item').ZooMove();
        </script>
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
            <p class="description">{{$book->description}}</p>
            <a class="btn btn-primary" href="{{url('/books/'.$book->id.'')}}">مشاهده اطلاعات کتاب &nbsp<i class="fas fa-chevron-circle-left"></i></a>
        </div>
    </div>

    <!-- Pager -->

    @endforeach
    @endforeach

    <div style="text-align:center;">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    {{-- {{$book->links()}} --}}
                </li>
                </li>
            </ul>
        </nav>
    </div>

</div>

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
                <li><a href="{{url('/logout')}}"><i class="fas fa-sign-out-alt"></i>&nbspخروج از حساب کاربری</a>
                </li>
                @endif
            </ul>
        </div>
        <!-- Blog Search Well -->
        <div class="well">
            <h4>جستجو در خبرها</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
            <!-- /.input-group -->
        </div>
    



@endsection