@extends('layouts.admin')

@section('form')
    
 <div class="container">
    <h2 class="pt-5">ویرایش مقاله</h2>
    <form class="pt-4 d-block row" method="post" action="/admin/articles/{{$article->id}}" enctype="multipart/form-data">
        @csrf

       <div class="form-row d-flex justify-content-around">
            <div class="col-md-4 mb-3 mr-2">
                <label for="validationDefault01">نام مقاله</label>
                <input type="text" class="form-control" id="validationDefault01" value="{{$article->title}}" name="title">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault03">نویسنده یا مترجم</label>
                <select name="role" class="custom-select" id="inlineFormCustomSelect">
                    @foreach($authorRoles as $authorRole)
                        <option value="{{$authorRole->id}}">{{$authorRole->role}}</option>
                    @endforeach    
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-10 mb-3">
                <label for="validationDefault02">نویسنده</label>
                <div class="col-12 float-r ml-5">
                    @foreach($authors as $author)
                            @if(in_array($author->last_name, $currentAuthor))
                                <input type="checkbox" class="mr-2"  name="author[]" value="{{$author->id}}" checked="checked">
                                <label for="{{$author->id}}">{{$author->last_name,$author->first_name}}</label>
                                @else
                                <input type="checkbox" class="mr-2"  name="author[]" value="{{$author->id}}">
                                <label for="{{$author->id}}">{{$author->last_name,$author->first_name}}</label>
                            @endif
                    @endforeach    
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-10 mb-3">
                <label for="validationDefault02">ژانر</label>
                <div class="col-12 float-r ml-5">
                @foreach($categories as $category)
                    @if(in_array($category->type, $currentCategory))   
                        <label for="{{$category->id}}">{{$category->type}}</label>
                        <input type="checkbox" class="ml-2" name="category[]" value="{{$category->id}}" checked="checked">
                    @else
                        <label for="{{$category->id}}">{{$category->type}}</label>
                        <input type="checkbox" class="ml-2" name="category[]" value="{{$category->id}}">
                    @endif
                    @endforeach    
                </div>
            </div>
        </div>
        <div class="form-row d-flex justify-content-around">
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">تاریخ انتشار</label>
                <input type="date" class="form-control" id="validationDefault04" value="{{$article->publish_date}}" name="publish_date">
            </div>
        </div>
        <div class="form-row d-flex justify-content-around ">
            <div class="input-group input-file col-6 mb-2" name="article_file">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-choose" type="button">Choose</button>
                </span>
                <input type="text" class="form-control" placeholder='فایل مقاله' />
                <span class="input-group-btn">
                    <button class="btn btn-warning btn-reset" type="button">Reset</button>
                </span>
            </div>
        </div>
        <div class="form-row d-flex justify-content-around">
            <div class="form-group mt-3 col-4 mr-3 ml-2">
                <label for="exampleFormControlTextarea1">توضیحات مقاله</label>
                <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3">{{$article->description}}</textarea>
            </div>
            <input class="btn btn-success m-5" value="ثبت مقاله" type="submit">
        </div>

    </form>
</div>

@stop

@section('pageSpecificScripts')
    <!-- flot charts scripts-->
    <script src="{{ asset('js/file_input.js')}}"></script>
@stop