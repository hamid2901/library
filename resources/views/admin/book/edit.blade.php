@extends('layouts.admin')

@section('form')
    
 <div class="container">
    <h2 class="pt-5">ویرایش کتاب</h2>
    <form class="pt-4 d-block row" method="post" action="/admin/books/{{$book->id}}" enctype="multipart/form-data">
        @csrf

       <div class="form-row d-flex justify-content-around">
            <div class="col-md-4 mb-3 mr-2">
                <label for="validationDefault01">نام کتاب</label>
                <input type="text" class="form-control" id="validationDefault01" value="{{$book->title}}" name="title">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault01">شابک</label>
                <input type="text" class="form-control" id="validationDefault01" value="{{$book->isbn}}" name="isbn">
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
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">ناشر</label>
                <select name="publisher" placeholder="{{$book->publisher->name}}" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($publishers as $publisher)
                        @if($publisher->id == $book->publisher_id)
                            <option value="{{$publisher->id}}" selected>{{$publisher->name}}</option>
                        @else
                            <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
           
            <div class="col-md-2 mb-3">
                <label for="validationDefault01">وضعیت</label>
                <select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($bookAvailabilities as $bookAvailability)
                        @if($bookAvailability->id == $book->availability_id)
                        <option value="{{$bookAvailability->id}}" selected>{{$bookAvailability->status}}</option>
                        @else
                        <option value="{{$bookAvailability->id}}">{{$bookAvailability->status}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mb-3 mr-2">
                <label for="validationDefault02">تعداد جلد</label>
                <input type="int" class="form-control" id="validationDefault02" value="{{$book->cover}}"  name="cover">
            </div>
        </div>
        <div class="form-row d-flex justify-content-around">
            <div class="col-md-1 mb-3 ml-2"><label for="validationDefault01">قطع</label>
                <select name="format" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($bookFormats as $bookFormat)
                        @if($bookFormat->id == $book->format_id)
                        <option value="{{$bookFormat->id}}" selected>{{$bookFormat->format}}</option>
                        @else
                        <option value="{{$bookFormat->id}}">{{$bookFormat->format}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault02">صفحات</label>
                <input type="int" class="form-control" id="validationDefault02" value="{{$book->pages}}" name="pages">
            </div>
            <div class="col-md-2 mb-3">
                <label for="validationDefault02">وزن</label>
                <input type="int" class="form-control" id="validationDefault02" value="{{$book->weight}}" name="weight">
            </div>
            <div class="col-md-2 mb-3 ">
                <label for="validationDefault02">قیمت</label>
                <input type="int" class="form-control" id="validationDefault02" value="{{$book->price}}" name="price">
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">تاریخ انتشار</label>
                <input type="date" class="form-control" id="validationDefault04" value="{{$book->issue_date}}" name="issue_date">
            </div>
        </div>
        <div class="form-row d-flex justify-content-around ">
            <div class="input-group input-file col-6 mb-2" name="front_photo">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-choose" type="button">Choose</button>
                </span>
                <input type="text" class="form-control" placeholder='عکس روی کتاب' />
                <span class="input-group-btn">
                    <button class="btn btn-warning btn-reset" type="button">Reset</button>
                </span>
            </div>
            <div class="input-group input-file col-6 mb-2" name="back_photo">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-choose" type="button">Choose</button>
                </span>
                <input type="text" class="form-control" placeholder='عکس پشت کتاب' />
                <span class="input-group-btn">
                    <button class="btn btn-warning btn-reset" type="button">Reset</button>
                </span>
            </div>
        </div>
        <div class="form-row d-flex justify-content-around">
            <div class="form-group mt-3 col-4 mr-3 ml-2">
                <label for="exampleFormControlTextarea1">توضیحات کتاب</label>
                <textarea class="form-control" name="description"  id="exampleFormControlTextarea1" rows="3">{{$book->description}}</textarea>
            </div>
            <input class="btn btn-success m-5" value="ثبت کتاب" type="submit">
        </div>

    </form>
</div>

@stop

@section('pageSpecificScripts')
    <!-- flot charts scripts-->
    <script src="{{ asset('js/file_input.js')}}"></script>
@stop