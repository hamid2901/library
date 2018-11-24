@extends('layout')

@section('content')

    <h1 class="page-header">
        اخبار 
    </h1>

    <!-- First Blog Post -->
    @foreach( $news as $new )

        <div>
            <h2>
                عنوان: <a href="{{url('/news/'.$new->id.'')}}">{{ $new->title }}</a>
            </h2>
            <p class="lead">
                ارسال شده توسط {{$new->user->firs_tname}}{{$new->user->last_name}}
            </p>
            <p><i class="far fa-clock"></i>&nbsp;</span>&nbspارسال شده در تاریخ  {{  jdate($new->created_at)->format(' %d %B، %Y') }}</p>
            <hr>
            <img class="img-responsive" src="../images/{{$new->title}}.jpg" alt="hello">
            <hr>
            <p>{!! $new->content !!}</p>
        <a class="btn btn-primary" href="{{url('/news/'.$new->id.'')}}">ادامه  مطلب &nbsp<i class="fas fa-chevron-circle-left"></i></a>
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
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

@endsection