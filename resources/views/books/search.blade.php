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
            <p>{{$book->description}}</p>
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

    <!-- Blog Search Well -->
    <div class="well">
        <h4>جستجو در کتاب ها</h4>
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