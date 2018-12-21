@extends('layout')

@section('content')

@include('articles.sidebar')

<div class="col-md-8">

    <h1 class="page-header">
        مقالات
    </h1>
    @foreach ($searchedArticles as $searchedArticle)
    @foreach ($searchedArticle->articles as $article)

    <div style="margin-bottom:5px" class="col-md-12 bg-light card">
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
            <p class="description">توضیحات: {{$article->description}}</p>
            <a class="btn btn-primary" href="{{url('/articles/'.$article->id.'')}}">مشاهده اطلاعات مقاله و
                دانلود&nbsp<i class="fas fa-chevron-circle-left"></i></a>
        </div>
    </div>

<!-- Pager -->

@endforeach
@endforeach

<div style="text-align:center;">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                {{-- {{$article->links()}} --}}
            </li>
            </li>
        </ul>
    </nav>
</div>

</div>





@endsection