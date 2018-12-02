@extends('layout')


@section('content')
<div class="col-md-8">
    <!-- Blog Post -->

    @foreach ($news as $new)
    <!-- Title -->
    <h1>{{ $new->title }}</h1>

    <img class="zoom" src={!! asset('images/news_images/'.$new->id.'/first.jpg') !!} alt="">
    <img class="zoom" src={!! asset('images/news_images/'.$new->id.'/second.jpg') !!} alt="">
    <img class="zoom" src={!! asset('images/news_images/'.$new->id.'/third.png') !!} alt="">
    <!-- Author -->
    <p class="lead">
        ارسال شده توسط <a href="index.php"></a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> ارسال شده در تاریخ {{ jdate($new->created_at)->format('%B %d،%Y')
        }}</p>

    <hr>

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
        @if(1)
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
            <h4 class="media-heading">{{ $comment->user->first_name }}&nbsp{{ $comment->user->last_name }}
                <small>ارسال شده در تاریخ {{ jdate($comment->created_at)->format('%B %d، %Y') }}</small>
            </h4>
            {{ $comment->content }}
        </div>
    </div>
    @endforeach
</div>
@endforeach

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