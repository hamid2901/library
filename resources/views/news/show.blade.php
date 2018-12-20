@extends('layout')


@section('content')

@include('news.sidebar')

<div class="col-md-8">
    <!-- Blog Post -->

    @foreach ($news as $new)
    <!-- Title -->
    <h1>{{ $new->title }}</h1>

    <img style="height:200px; width: 300px" class="zoom" src="{!! asset('images/news_images/first/'.$new->image_dir.'.jpg') !!}" alt="hello">
    <img style="height:200px; width: 300px" class="zoom" src="{!! asset('images/news_images/second/'.$new->image_dir.'.jpg') !!}" alt="hello">
    <!-- Author -->
    <p class="lead">
        ارسال شده توسط {{$new->user->last_name}}&nbsp;{{$new->user->first_name}}
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> ارسال شده در تاریخ {{ jdate($new->created_at)->format('%B
        %d،%Y')
        }}</p>

    <!-- Preview Image -->
    <script type='text/javascript'>
        $('.zoo-item').ZooMove();
    </script>
    <hr>

    <!-- Post Content -->
    {!! $new->content !!}
    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        @include('layouts.errors')
        <!-- Comment -->
        @if(Auth::check())
        <h4>ارسال کامنت :</h4>
        <hr>
        <form role="form" action='/news/{{$new->id}}/comment/{{ Auth::id() }}' method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="title">متن : </label>
                <textarea class="form-control" name="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">ارسال</button>
        </form>
        @else
        <a href="/register">برای ارسال کامنت حتما باید عضو وبسایت باشید</a>
        @endif

    </div>

    <hr>

    @foreach($comments as $comment)
    <div class="media">
            <div class="media-body">
                <h4 class="media-heading">
                    @if ($comment->user->image_name != null)
                    <img class="" style="float:left; width:60px; height: 60px; padding-left: 15px" src={{asset('images/users_images/'.$comment->user->image_name.'')}}
                        alt="بدون عکس">
                    @else
                    <img class="" style="float:left; width:60px; height: 60px; padding-left: 15px" src={{asset('images/users_images/default.jpg')}}
                        alt="بدون عکس">
                    @endif
                    {{
                    $comment->user->first_name }}&nbsp{{ $comment->user->last_name }}
                    {{-- {{dd(jdate($comment->created_at)->format('%d %B %Y'))}} --}}
                    <small>ارسال شده در {{ jdate($comment->created_at)->format('%d %B %Y') }}</small>
                </h4>
                {{ $comment->content }}
            </div>
        </div>
    @endforeach
</div>
@endforeach

@endsection