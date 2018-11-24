@extends('layout')

@section('content')

    <h1 class="page-header">
        مقالات سایت
    </h1>

    <!-- First Blog Post -->
    @foreach( $news as $new )

        <div>
            <h2>
                <a href="#">{{ $new->title }}</a>
            </h2>
            <p class="lead">
                ارسال شده توسط <a href="index.php">حسام موسوی</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>ارسال شده در تاریخ  فرودین 1396</p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>{!! $new->content !!}</p>
            <a class="btn btn-primary" href="#">ادامه  مطلب <span class="glyphicon glyphicon-chevron-left"></span></a>
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