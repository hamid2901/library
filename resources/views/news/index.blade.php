@extends('layout')

@section('content')
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
        <p><i class="far fa-clock"></i>&nbsp;</span>&nbspارسال شده در تاریخ {{ jdate($new->created_at)->format(' %d %B،
            %Y') }}</p>
        <hr>
        <img class="img-responsive" src="{!! asset('images/news_images/'.$new->id.'/first.jpg') !!}" alt="hello">
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
<div class="col-md-4">

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