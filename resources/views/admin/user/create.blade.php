@extends('layouts.admin')
 
@section('pageSpecificStyles')

        <link rel="stylesheet" href="{!! asset('css/persian-cal/kamadatepicker.css') !!}">
        <script src="//code.jquery.com/jquery.min.js"></script>
        <script src="{!! asset('css/persian-cal/kamadatepicker.js') !!}"></script>
@stop

@section('form') 
 <div class="container m-auto col-10 form">
    <h2 class="pt-5"><i class="fas fa-user-plus p-3"></i>ایجاد کاربر</h2>
    <form class="d-block row d-flex pb-5" method="post" action="/admin/users" enctype="multipart/form-data">
        @csrf
        <div class="col-6">
                <div class="form-row">
                    <div class="col-12 mb-3"><label for="validationDefault01">نام</label><input type="text" class="form-control"
                            id="validationDefault01" placeholder="نام" name="first_name"></div>
                </div>
        
                <div class="form-row">
                <div class="col-12 mb-3"><label for="validationDefault02">نام خانوادگی</label><input type="text" class="form-control"
                            id="validationDefault02" placeholder="نام خانوادگی" name="last_name"></div>
                </div>
        
                <div class="form-row">
                <div class="col-12 mb-3"><label for="validationDefault03">ایمیل</label><input type="email" class="form-control"
                            id="validationDefault03" placeholder="ایمیل" name="email"></div>
                </div>

                <div class="form-row">
                <div class="col-12 mb-3"><label for="validationDefault04">موبایل</label><input type="text" class="form-control"
                            id="validationDefault04" placeholder="موبایل" name="phone"></div>
                </div>
        
                <div class="form-row">
                 <div class="col-12 mb-3"><label for="validationDefault01">رمز عبور</label><input type="password" class="form-control"
                            id="validationDefault01" placeholder="رمز عبور" name="password"></div>
                </div>
        
                <div class="form-row">
                 
                <div class="col-12 mb-3"><label class="col-form-label" for="validationDefault02">تکرار رمز عبور</label><input type="password" class="form-control"
                            id="validationDefault02" placeholder="تکرار رمز عبور" name="repassword"></div>
                </div>

                <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="date3" class="col-form-label">تاریخ تولد</label>
                            <input placeholder="تاریخ تولد" name="birthdate" type="text" id="date3" value="{{ old('birthdate') }}"
                                class="pdate form-control col-12 ">
                                @if ($errors->has('birthdate'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('birthdate') }}</strong>
                                </span>
                                @endif
                        </div>
                </div>
        
                <div class="form-row d-flex">
                        <div class="col-4 mb-3 ml-2"><label for="validationDefault01">وضعیت</label>
                        <select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                @foreach($userStatus as $status)
                                <option value="{{$status->id}}">{{$status->status}}</option>
                                @endforeach
                        </select>
                        </div>
                
                        <div class="col-4 mb-3 ml-2"><label for="validationDefault01">نقش</label>
                        <select name="role" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                @foreach($userRole as $role)
                                <option value="{{$role->id}}">{{$role->role}}</option>
                                @endforeach
                        </select>
                        </div>
                        <div class="col-3 mb-3 ml-2"><label for="validationDefault01">جنسیت</label>
                        <select name="gender" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            @foreach($userGender as $gender)
                            <option value="{{$gender->id}}">{{$gender->sex}}</option>
                            @endforeach
                        </select>
                        </div>
                </div>

                <div class="form-row">
                <div class="col-12 mb-3"><label for="validationDefault04">شغل</label><input type="text" class="form-control"
                            id="validationDefault04" placeholder="شغل" name="profession"></div>
                </div>
        
                <div class="form-row">
                <div class="col-12 mb-3"><label for="validationDefault04">دانشگاه محل تحصیل</label><input type="text"
                            class="form-control" id="validationDefault04" name="university" placeholder="دانشگاه محل تحصیل"></div>
                </div>  
        </div>
        <div class="col-6">
                <div class="form-row">
                        <div id="image-preview">
                                <label for="image-upload" id="image-label">عکس کاربر</label>
                                <input id="input-id" name="user_photo"  class="file" type="file" class="file" data-preview-file-type="text" >
                        </div>
                </div>
                <!-- <div class="form-row">
                        <div class="custom-file mt-5">
                        {{Form::label('user_photo', 'افزودن عکس',['class' => 'custom-file-label'])}}
                        {{Form::file('user_photo',['class' => 'custom-file-input'])}}
                        </div>
                </div> -->
        
                <div class="form-row">
                    <div class="col-12 mb-3 mt-2"><label for="validationDefault04">شهر</label><input type="text" class="form-control"
                            id="validationDefault04" name="city" placeholder="شهر"></div>
                </div>
        
                <div class="form-row">
                    <div class="col-12 mb-3"><label for="validationDefault05">خیابان</label><input type="text" class="form-control"
                            id="validationDefault05" name="street" placeholder="خیابان"></div>
                </div>
        
                <div class="form-row">
                    <div class="col-12 mb-3"><label for="validationDefault06">کوچه</label><input type="text" class="form-control"
                            id="validationDefault06" name="alley" placeholder="کوچه"></div>
                </div>
        
                <div class="form-row d-flex">     
                        <div class="col-4 mb-3"><label for="validationDefault07">پلاک</label><input type="text" class="form-control"
                        id="validationDefault07" name="plate" placeholder="پلاک"></div>       
                   
                        <div class="col-8 mb-3"><label for="validationDefault08">کد پستی</label><input type="text" class="form-control"
                                id="validationDefault08" name="postal_code" placeholder="کد پستی"></div>
                                
                </div>
                <div class="form-row mb-5">
                        <input class="col-12 btn btn-success create-btn" value="ثبت کاربر" type="submit">
                </div>                
        </div>
    </form>
</div>

@stop


@section('pageSpecificScripts')
<script src="{!! asset('js/admin-panel.js') !!}"></script>
@stop