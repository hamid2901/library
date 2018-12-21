@extends('layouts.admin')

@section('pageSpecificStyles')

        <link rel="stylesheet" href="{!! asset('css/persian-cal/kamadatepicker.css') !!}">
        <script src="//code.jquery.com/jquery.min.js"></script>
        <script src="{!! asset('css/persian-cal/kamadatepicker.js') !!}"></script>
@stop

@section('form') 
 <div class="container m-auto col-10 form">
    <h2 class="pt-5"><i class="fas fa-user-edit p-3"></i>ویرایش کاربر</h2>
    <form class="pt-4 d-block row d-flex" method="post" action="/admin/users/{{$user->id}}" enctype="multipart/form-data">
        @csrf
        <div class="col-6">
                <div class="form-row">
                    <div class="col-12 mb-3">
                        <label for="validationDefault01">نام</label>
                        <input type="text" class="form-control" id="validationDefault01" placeholder="نام" value="{{$user->first_name}}" name="first_name">
                    </div>
                </div>
          
        
                <div class="form-row">
                    <div class="col-12 mb-3">
                        <label for="validationDefault02">نام خانوادگی</label>
                        <input type="text" class="form-control" id="validationDefault02" placeholder="نام خانوادگی" value="{{$user->last_name}}" name="last_name"></div>
                </div>
        
                <div class="form-row">  
                    <div class="col-12 mb-3">
                        <label for="validationDefault03">ایمیل</label>
                        <input type="email" class="form-control" id="validationDefault03" placeholder="ایمیل" value="{{$user->email}}" name="email">
                    </div>
                </div>

                <div class="form-row">
                <div class="col-12 mb-3"><label for="validationDefault04">موبایل</label><input type="text" class="form-control"
                    id="validationDefault04" value="{{$user->phone}}" placeholder="موبایل" name="phone"></div>
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
                    <label for="validationDefault04">تاریخ تولد</label>
                    <input class="form-control" placeholder="تاریخ تولد" name="birthdate" value="{{$user->birthdate}}" type="text" id="date3" >
                   
                    </div>
                </div>
        
                <div class="form-row d-flex">
                    <div class="col-4 mb-3"><label for="validationDefault01">وضعیت</label>
                        <select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            @foreach($userStatus as $status)
                            <option value="{{$status->id}}" @if ($user->status_id === $status->id) selected @endif >{{$status->status}}
                                </option>
                            @endforeach
                        </select>
                     </div>
                
                        <div class="col-4 mb-3 ml-2"><label for="validationDefault01">نقش</label>
                        <select name="role" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            @foreach($userRole as $role)
                            <option value="{{$role->id}}" @if ($user->role_id === $role->id)
                                selected
                                @endif >{{$role->role}}
                            </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-3 mb-3 ml-2"><label for="validationDefault01">جنسیت</label>
                        <select name="gender" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            @foreach($userGender as $gender)
                            <option value="{{$gender->id}}" @if ($user->sex === $gender->id)
                                selected
                                @endif >{{$gender->sex}}</option>
                            @endforeach
                        </select>
                        </div>
                </div>

                <div class="form-row">
                <div class="col-12 mb-3"><label for="validationDefault04">شغل</label><input type="text" class="form-control"
                    id="validationDefault04" value="{{$user->profession}}" placeholder="شغل" name="profession"></div>
                </div>
        
                <div class="form-row">
                <div class="col-12 mb-3"><label for="validationDefault04">دانشگاه محل تحصیل</label><input type="text"
                    class="form-control" value="{{$user->university}}" id="validationDefault04" name="university"
                    placeholder="دانشگاه محل تحصیل"></div>
                </div>  
        </div>
        <div class="col-6">
                <div class="form-row">
                        <div id="image-preview">
                                <label for="image-upload" id="image-label">ویرایش عکس</label>
                                <input id="input-id" name="user_photo" value="{!! asset('images/users-images/$users->image_name') !!}" class="file" type="file" class="file" data-preview-file-type="text" >
                        </div>
                </div>
        
                <div class="form-row">
                <div class="col-12 mb-3 mt-2"><label for="validationDefault04">شهر</label><input type="text" class="form-control"
                    id="validationDefault04" value="{{$user->city}}" name="city" placeholder="شهر"></div>
            
                </div>
        
                <div class="form-row">
                <div class="col-12 mb-3"><label for="validationDefault05">خیابان</label><input type="text" class="form-control"
                    id="validationDefault05" value="{{$user->street}}" name="street" placeholder="خیابان"></div>
                </div>
        
                <div class="form-row">
                <div class="col-12 mb-3"><label for="validationDefault06">کوچه</label><input type="text" class="form-control"
                    id="validationDefault06" value="{{$user->alley}}" name="alley" placeholder="کوچه"></div>
                </div>
        
                <div class="form-row d-flex">     
                    <div class="col-4 mb-3"><label for="validationDefault07">پلاک</label><input type="text" class="form-control"
                    id="validationDefault07" value="{{$user->plate}}" name="plate" placeholder="پلاک"></div>
                    <div class="col-8 mb-3"><label for="validationDefault08">کد پستی</label><input type="text" class="form-control"
                    id="validationDefault08" value="{{$user->postal_code}}" name="postal_code" placeholder="کد پستی"></div>
                                
                </div>
                <div class="form-row mb-5">
                        <input class="col-12 btn btn-success create-btn" value="ثبت ویرایش" type="submit">
                </div>                
        </div>
    </form>
</div>

@stop


@section('pageSpecificScripts')

<script src="{!! asset('js/admin-panel.js') !!}"></script>

@stop
 
 
 