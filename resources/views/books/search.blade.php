@extends('layout')

@section('content')
<!-- Blog Sidebar Widgets Column -->
@include('books.sidebar')

<div class="col-md-8">

    <h1 class="page-header">
        کتاب ها
    </h1>
    @foreach ($searchedBooks as $searchedBook)
    @foreach ($searchedBook->books as $book)
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




@endsection