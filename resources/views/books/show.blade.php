@extends('layout')


@section('content')
<div class="col-md-8">

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{ $news->title }}</h1>

    <!-- Author -->
    <p class="lead">
        ارسال شده توسط <a href="index.php"></a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> ارسال شده در تاریخ  {{  jdate($news->created_at)->format('%B %d، %Y') }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="../images/{{$news->title}}.jpg" alt="">

    <hr>

    <!-- Post Content -->
    {!! $news->content !!}
    <hr>

    <!-- Blog Comments -->

        <!-- Comments Form -->
    <div class="well">
        @include('layouts.errors')
                <!-- Comment -->
        @if(1)
            <h4>ارسال کامنت :</h4>
            <hr>
            <form role="form" action="{{ route('newsComment.store' , ['news' => $news->slug ]) }}" method="post">
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

    {{-- <!-- Posted Comments -->
    @foreach($comments as $comment)
        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->name }}
                    <small>ارسال شده در تاریخ  {{  jdate($news->created_at)->format('%B %d، %Y') }}</small>
                </h4>
                {{ $comment->body }}
            </div>
        </div>
    @endforeach --}}

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
</div>

<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>جستجو در کتاب ها</h4>
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

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>دسته بندی کتاب ها</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">ادبیات</a>
                    </li>
                    <li><a href="#">جغرافیا و تاریخ</a>
                    </li>
                    <li><a href="#">دین</a>
                    </li>
                    <li><a href="#">زبان</a>
                    </li>
                    <li><a href="#">علوم اجتماعی</a>
                    </li>
                    <li><a href="#">علوم طبیعی و ریاضیات</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">علوم کاربردی</a>
                    </li>
                    <li><a href="#">فلسفه و روانشناسی</a>
                    </li>
                    <li><a href="#">کتاب اصلی درسی و کمک درسی</a>
                    </li>
                    <li><a href="#">کلیات</a>
                    </li>
                    <li><a href="#">هنرها</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
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