@extends('layout')

@section('content')

@include('books.sidebar')

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
            <p class="description">توضیحات: {{$book->description}}</p>
            <a class="btn btn-primary" href="{{url('/books/'.$book->id.'')}}">مشاهده اطلاعات کتاب &nbsp<i class="fas fa-chevron-circle-left"></i></a>
            <div style="float:left">
                
                
                    تاریخ امانت گرفتن:   {{jdate($factor->borrow_date)->format(' %d %B %y')}} 
                    <br>
                    مهلت امانت تا تاریخ: {{jdate(strtotime($factor->duration, strtotime($factor->borrow_date)))->format(' %d %B %y')}} 
                    <br>

                    {{-- {{date_diff((date_create('now')) , new DateTime((strtotime($factor->duration, strtotime($factor->borrow_date)))))}} روز مهلت تا برگرداندن کتاب --}}

            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Blog Sidebar Widgets Column -->



@endsection