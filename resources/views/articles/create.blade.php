@extends('layout')

@section('content')

    <h1 class="page-header">
        ارسال مقاله
    </h1>
    <form action="{{ route('article.store') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">عنوان مقاله : </label>
            <input type="text" name="title" class="form-control" id="title" placeholder="لطفا عنوان را وارد کنید ...">
        </div>
        <div class="form-group">
            <label for="body">متن مقاله :</label>
            <textarea class="form-control" name="body" id="body" placeholder="متن را وارد کنید" rows="7"></textarea>
        </div>
        <button type="submit" class="btn btn-default">ارسال مقاله</button>
    </form>

@endsection