@extends('layout')


@section('content')

<!-- Blog Sidebar Widgets Column -->
@include('articles.sidebar')

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
    @if(Auth::check())
    <a class="btn btn-primary" href="{{url('/articles/'.$article->id.'/downloading')}}">دانلود مقاله&nbsp<i class="fas fa-download"></i></a>
    @else
    <a class="btn btn-primary">دانلود مقاله&nbsp<i class="fas fa-download"></i></a>
    <span>&nbspبرای دانلود مقاله باید عضو سایت باشید.</span>
    @endif
</div>
@endforeach



@endsection