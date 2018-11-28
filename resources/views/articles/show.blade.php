@extends('layout')


@section('content')
<div class="col-md-8">

    <!-- Blog Post -->
    {{--
    {{$articles->title}}
    {{dd($articles)}} --}}

    @foreach ($articles as $article)

    <div class="lead"> عنوان مقاله: {{$article->title}}</div>

    <!-- Title -->
    <img class="zoom" src="{!! asset('images/article_images/'.$article->id.'/front.jpg') !!}" alt="hello">
    <img class="zoom" src="{!! asset('images/article_images/'.$article->id.'/back.jpg') !!}" alt="hello">

    <!-- Author -->
    <p class="lead">
        <p class="lead" style="font-size: 15px !important">
            دسته بندی مقاله:
            @foreach( $article->categories as $article->category )
            <a href="{{url('/articles/'.$article->id.'')}}">{{$article->category->type}}</a>@if(! $loop->last )
            ،
            @endif
            @endforeach
        </p>
    </p>
    <p class="lead" style="font-size: 15px !important">
        سال انتشار:
        {{jdate($article->issue_date)->format('%B %Y') }}
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
    توضیحات:
    <!-- Post Content -->
    {!! $article->description !!}
    <hr>

    <a class="btn btn-primary" href="{{url('/articles/'.$article->id.'/downloading')}}">دانلود مقاله&nbsp<i class="fas fa-download"></i></a>
    
</div>
@endforeach


<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>جستجو در مقالات</h4>
        <form action="/articles" method="POST" role="search">
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
        <h4>دسته بندی مقالات</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @foreach ($categories as $category)
                    <li><a href="{{url('/articles/category/'.$category->type.'')}}">{{$category->type}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
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