@extends('layout')


@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{ $article->title }}</h1>

    <!-- Author -->
    <p class="lead">
        ارسال شده توسط <a href="index.php">{{ $article->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> ارسال شده در تاریخ  {{  jdate($article->created_at)->format('%B %d، %Y') }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="http://placehold.it/900x300" alt="">

    <hr>

    <!-- Post Content -->
    {!! $article->body !!}
    <hr>

    <!-- Blog Comments -->

        <!-- Comments Form -->
    <div class="well">
        @include('layouts.errors')
                <!-- Comment -->
        @if(auth()->check())
            <h4>ارسال کامنت :</h4>
            <hr>
            <form role="form" action="{{ route('comment.store' , ['article' => $article->slug ]) }}" method="post">
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

    <!-- Posted Comments -->
    @foreach($comments as $comment)
        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->name }}
                    <small>ارسال شده در تاریخ  {{  jdate($article->created_at)->format('%B %d، %Y') }}</small>
                </h4>
                {{ $comment->body }}
            </div>
        </div>
    @endforeach

    {{--<!-- Comment -->--}}
    {{--<div class="media">--}}
        {{--<div class="media-body">--}}
            {{--<h4 class="media-heading">علی موسوی--}}
                {{--<small>ارسال شده در تاریخ  فرودین 1396</small>--}}
            {{--</h4>--}}
            {{--لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید--}}
            {{--<!-- Nested Comment -->--}}
            {{--<div class="media">--}}
                {{--<div class="media-body">--}}
                    {{--<h4 class="media-heading">حسام موسوی--}}
                        {{--<small>ارسال شده در تاریخ  فرودین 1396</small>--}}
                    {{--</h4>--}}
                    {{--لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- End Nested Comment -->--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection