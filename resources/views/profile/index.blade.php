@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="profile-card-4 z-depth-3">
                <div class="card">
                    <div class="card-body card-image text-center bg-primary rounded-top">
                        <div class="user-box">
                            <img class=" zoom" style="" src={{asset('images/users_images/'.Auth::user()->image_name.'')}}
                                alt="بدون عکس">
                        </div>
                        <h5 class="mb-1 text-white">{{Auth::user()->first_name}}&nbsp{{Auth::user()->last_name}}</h5>
                        <h6 class="text-light">{{Auth::user()->profession}}</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group shadow-none">
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fa fa-phone-square"></i>
                                </div>
                                <div class="list-details">
                                    <small>شماره تماس</small>
                                    <span>{{Auth::user()->phone}}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="list-details">
                                    <small>آدرس ایمیل</small>
                                    <span>{{Auth::user()->email}}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="list-details">
                                    <small>آدرس محل زندگی</small>
                                    <span>{{Auth::user()->city}}،&nbsp{{Auth::user()->street}}،&nbspکوچه&nbsp{{Auth::user()->alley}}،&nbspپلاک&nbsp{{Auth::user()->plate}}</span>
                                </div>
                            </li>
                        </ul>
                        <div class="row text-center">
                            <div class="col-md-4 p-2">
                                <h4 class="mb-1 line-height-5">
                                    <?php $i = 0; $j = 0; $k = 0; ?>
                                    @foreach ($userFactors as $userFactor)
                                    @foreach ($userFactor->factors as $factor)
                                    @if ($factor->borrow_status == 0)
                                    <?php $i++ ?>
                                    @endif
                                    @endforeach
                                    @endforeach
                                    {{$i}}
                                </h4>
                                <small class="mb-0 font-weight-bold">رزروها</small>
                            </div>
                            <div class="col-md-4 p-2">
                                <h4 class="mb-1 line-height-5">
                                    @foreach ($userFactors as $userFactor)
                                    @foreach ($userFactor->factors as $factor)
                                    @if ($factor->borrow_status == 1)
                                    <?php $j++ ?>
                                    @endif
                                    @endforeach
                                    @endforeach
                                    {{$j}}
                                </h4>
                                <small class="mb-0 font-weight-bold">امانات</small>
                            </div>
                            <div class="col-md-4 p-2">
                                <h4 class="mb-1 line-height-5">
                                    @foreach ($userNews as $userNew)
                                    @foreach ($userNew->newsComments as $comments)
                                    <?php $k++ ?>
                                    @endforeach
                                    @endforeach

                                    @foreach ($userBooks as $userBook)
                                    @foreach ($userBook->BookComments as $comments)
                                    <?php $k++ ?>
                                    @endforeach
                                    @endforeach
                                    {{$k}}
                                </h4>
                                <small class="mb-0 font-weight-bold">کامنت ها</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center" style="margin-top: 20px">
                        <a href="javascript:void()" class="btn-social btn-facebook waves-effect waves-light m-1"><i
                                class="fab social-icon fa-facebook-square"></i></a>
                        <a href="javascript:void()" class="btn-social btn-google-plus waves-effect waves-light m-1"><i
                                class="fab social-icon  fa-google-plus-square"></i></a>
                        <a href="javascript:void()" class="list-inline-item btn-social btn-behance waves-effect waves-light"><i
                                class="fab social-icon fa-linkedin"></i></i></a>
                        <a href="javascript:void()" class="list-inline-item btn-social btn-dribbble waves-effect waves-light"><i
                                class="fab social-icon fa-github-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card z-depth-3">
                <div class="card-body">
                    <ul class="nav nav-pills nav-pills-primary">
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active show"><i
                                    class="icon-user"></i> <span class="hidden-xs">پروفایل</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="btn btn-large nav-link"><i
                                    class="icon-envelope-open"></i> <span class="hidden-xs">پیام ها و کامنت ها</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#reserved" data-toggle="pill" class="nav-link"><i
                                    class="icon-note"></i> <span class="hidden-xs">لیست رزرو شده ها</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#borrowed" data-toggle="pill" class="nav-link"><i
                                    class="icon-note"></i> <span class="hidden-xs">لیست امانات</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i
                                    class="icon-note"></i> <span class="hidden-xs">ویرایش</span></a>
                        </li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane active show" id="profile">
                            <h5 class="mb-3">پروفایل کاربر</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>درباره</h4>
                                    <p>
                                        {{Auth::user()->profession}}
                                    </p>
                                    <h4>علاقه مندی ها</h4>
                                    <p>
                                        مطالعه، بازی های کامپیوتری، شنا، فوتبال و پینگ پنگ
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h6>دسته بندی کتاب های مورد علاقه شما</h6>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">علم و هنر</a>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">تاریخ و جغرافیا</a>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">ادبیات</a>
                                    <a href="javascript:void();" class="badge badge-dark badge-pill">ورزشی</a>
                                    <hr>
                                    <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 بازدید کتاب</span>
                                    <span class="badge badge-success"><i class="fas fa-fist-raised"></i>
                                        <?php $j = 0 ?>
                                        @foreach($userFactors as $userFactor)
                                        @foreach ($userFactor->factors as $factor)
                                        @if ($factor->borrow_status == 1)
                                        <?php $j++ ?>
                                        @endif
                                        @endforeach
                                        @endforeach
                                        {{$j}} امانت</span>
                                    <span class="badge badge-primary"><i class="fas fa-clock"></i> 0 تاخیر</span>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span>
                                        فعالیت های اخیر</h5>
                                    <table class="table table-hover table-striped">
                                        <tbody>
                                            {{-- {{dd($factors)}} --}}
                                            @foreach ($userFactors as $userFactor)
                                            @foreach ($userFactor->factors as $factor)
                                            @foreach ($factor->books as $book)
                                            <tr>
                                                @if ($factor->borrow_status == 1)
                                                <td>
                                                    <a href="{{url('/books/'.$book->id.'')}}"><span class="float-right font-weight-bold"></span>
                                                        امانت گرفتن کتاب {{$book->title}}<br>تاریخ&nbsp{{jDate($factor->created_at)->format('%d
                                                        %B %Y')}}</a>
                                                </td>
                                                @else
                                                <td>
                                                    <a href="{{url('/books/'.$book->id.'')}}"><span class="float-right font-weight-bold"></span>
                                                        رزرو کتاب {{$book->title}}<br>تاریخ&nbsp{{jDate($factor->created_at)->format('%d
                                                        %B %Y')}}</a>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                            @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                        <div class="tab-pane" id="messages">
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <div class="alert-icon">
                                    <i class="icon-info"></i>
                                </div>
                                <div class="alert-message">
                                    <span><strong>توجه!&nbsp</strong>شما اخیراً کتاب خود را به کتابخانه تحویل نداده اید</span>
                                </div>
                            </div>
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @foreach ($userNews as $userNew)
                                    @foreach ($userNew->newsComments as $comments)
                                    <tr>
                                        {{-- {{dd($comments)}} --}}
                                        <td>
                                            <a href="{{url('/news/'.$comments->news_id.'')}}"><span class="float-right font-weight-bold"></span>
                                                {{$comments->content}}<br>ارسال شده در
                                                تاریخ&nbsp{{jDate($comments->created_at)->format('%d %B %Y')}}</a>
                                        </td>
                                        <td>
                                            <a href="{{url('/news/deleteComment')}}" onclick="event.preventDefault();
                                                document.getElementById('deleteNewsComment{{$comments->id}}-form').submit();">
                                                <i style="color: red;" class="fas fa-trash-alt"></i>{{$comments->id}}</a>
                                            <form id="deleteNewsComment{{$comments->id}}-form" action="{{url('/news/deleteComment')}}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                <input type="text" value="{{$comments->id}}" name="comment" style="display: none;">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                    @foreach ($userBooks as $userBook)
                                    @foreach ($userBook->bookComments as $comments)
                                    <tr>
                                        {{-- {{dd($comments)}} --}}
                                        <td>
                                            <a href="{{url('/books/'.$comments->book_id.'')}}"><span class="float-right font-weight-bold"></span>
                                                {{$comments->content}}<br>ارسال شده در
                                                تاریخ&nbsp{{jDate($comments->created_at)->format('%d %B %Y')}}</a>
                                        </td>
                                        <td>
                                            <a href="{{url('/books/deleteComment')}}" onclick="event.preventDefault();
                                                        document.getElementById('deleteBookComment{{$comments->id}}-form').submit();">
                                                <i style="color: red;" class="fas fa-trash-alt"></i>{{$comments->id}}</a>
                                            <form id="deleteBookComment{{$comments->id}}-form" action="{{url('/books/deleteComment')}}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                <input type="text" value="{{$comments->id}}" name="comment" style="display: none;">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="reserved">
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <div class="alert-icon">
                                    <i class="icon-info"></i>
                                </div>
                                <div class="alert-message">
                                    <span><strong>توجه!&nbsp</strong>آقای دهقانی خوب هستید شما؟؟ لیست کتاب های رزرو شده
                                        است اینجا</span>
                                </div>
                            </div>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>عنوان کتاب</th>
                                        <th>شابک کتاب</th>
                                        <th>تاریخ رزرو</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($factorUser->factors as $factor)
                                    @foreach ($factor->books as $book)
                                    @if ($factor->borrow_status == 0)
                                    <tr>
                                        <td>
                                            <a href="{{url('/books/'.$book->id.'')}}">
                                                {{$book->title}} </a>
                                        </td>
                                        <td>
                                            <a href="{{url('/books/'.$book->id.'')}}">
                                                {{$book->isbn}} </a>
                                        </td>
                                        <td>
                                            {{jDate($factor->reserve_date)->format('%d %B %y')}}
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="borrowed">
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <div class="alert-icon">
                                    <i class="icon-info"></i>
                                </div>
                                <div class="alert-message">
                                    <span><strong>توجه!&nbsp</strong>آقای دهقانی خوب هستید شما؟؟ لیست کتاب های امانت
                                        گرفته شده توسط شما است
                                        است اینجا</span>
                                </div>
                            </div>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>عنوان کتاب</th>
                                        <th>شابک کتاب</th>
                                        <th>تاریخ رزرو</th>
                                        <th>تاریخ امانت</th>
                                        <th>مهلت امانت</th>
                                        <th>تاریخ بازگشت</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($factorUser->factors as $factor)
                                    @foreach ($factor->books as $book)
                                    @if ($factor->borrow_status == 1)
                                    <tr>
                                        <td>
                                            <a href="{{url('/books/'.$book->id.'')}}">
                                                {{$book->title}} </a>
                                        </td>
                                        <td>
                                            <a href="{{url('/books/'.$book->id.'')}}">
                                                {{$book->isbn}} </a>
                                        </td>
                                        <td>
                                            {{jDate($factor->reserve_date)->format('%d %B %y')}}
                                        </td>
                                        <td>
                                            {{jDate($factor->borrow_date)->format('%d %B %y')}}
                                        </td>
                                        <td>
                                            {{jdate(strtotime($factor->duration,
                                            strtotime($factor->borrow_date)))->format(' %d %B %y')}}
                                        </td>
                                        <td>

                                            @if($factor->return_date != null)
                                            <a href="{{url('/books/'.$book->id.'')}}">
                                                {{
                                                jDate($factor->return_date)->format('%d %B %y')
                                                }}</a>
                                            @else
                                            پس داده نشده
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="edit">
                            <form method="post" action="/profile/{{Auth::user()->id}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">نام</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="first_name" type="text" value="{{Auth::user()->first_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">نام خانوادگی</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="last_name" type="text" value="{{Auth::user()->last_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">عکس پروفایل</label>
                                    <div class="col-lg-9 custom-file">
                                        {{Form::label('user_photo', 'تغییر عکس یا افزودن',['class' =>
                                        'custom-file-label'])}}
                                        {{Form::file('user_photo',['class' => 'custom-file-input'])}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">شماره تماس</label>
                                    <div class="col-lg-3">
                                        <input class="form-control" name="phone" type="text" value="{{Auth::user()->phone}}"
                                            placeholder="موبایل">
                                    </div>
                                    <label class="col-lg-1 col-form-label form-control-label">تاریخ تولد</label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control" disabled value="{{jDate($user->birthdate)->format('Y-m-d')}}"
                                            id="validationDefault04" placeholder="تاریخ تولد">
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="date" class="form-control" value="{{$user->birthdate}}" id="validationDefault05"
                                            placeholder="تاریخ تولد" name="birthdate">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">آدرس</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="city" type="text" value="{{Auth::user()->city}}"
                                            placeholder="شهر">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-3">
                                        <input class="form-control" name="street" type="text" value="{{Auth::user()->street}}"
                                            placeholder="خیابان">
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" name="alley" type="text" value="{{Auth::user()->alley}}"
                                            placeholder="کوچه">
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" name="plate" type="text" value="{{Auth::user()->plate}}"
                                            placeholder="پلاک">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">شغل</label>
                                    <div class="col-lg-3">
                                        <input class="form-control" name="profession" type="text" value="{{Auth::user()->profession}}">
                                    </div>
                                    <label class="col-lg-3 col-form-label form-control-label">دانشگاه محل تحصیل</label>

                                    <div class="col-lg-3">
                                        <input class="form-control" name="university" type="text" value="{{Auth::user()->university}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رمز عبور</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="password" type="password" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">تأیید رمز عبور</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="repassword" type="password" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="انصراف">
                                        <input type="submit" class="btn btn-primary" value="اعمال تغییرات">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection