@extends('layout')

@section('content')

@include('news.sidebar')

<div class="col-md-8 ">

    <h1 class="page-header">
        اخبار
    </h1>

    <!-- First Blog Post -->
    @foreach( $news as $new )
    {{-- {{dd($new)}} --}}
    <div style="margin-bottom:10px" class="col-md-12 bg-light card">
        <h2>
            عنوان: <a href="{{url('/news/'.$new->id.'')}}">{{ $new->title }}</a>
        </h2>
        <p class="lead">
            {{-- ارسال شده توسط {{$new->user->first_name}}{{$new->user->last_name}} --}}
        </p>
        <p><i class="far fa-clock"></i>&nbsp;</span>&nbspارسال شده در تاریخ {{ jdate($new->created_at)->format(' %d
            %B،
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


    <!-- Pager -->
    <div style="text-align:center;">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    {{$news->links()}}
                </li>
            </ul>
        </nav>
    </div>
</div>



@endsection