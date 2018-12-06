@extends('layouts.admin')
 @section('form') 

 <div class="container">
    <h2 class="pt-5">ایجاد کاربر جدید</h2>
    <form class="pt-4 d-block row" method="post" action="/admin/users" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="col-md-4 mb-3"><label for="validationDefault01">نام</label><input type="text" class="form-control"
                    id="validationDefault01" placeholder="نام" name="first_name"></div>
            <div class="col-md-4 mb-3"><label for="validationDefault02">نام خانوادگی</label><input type="text" class="form-control"
                    id="validationDefault02" placeholder="نام خانوادگی" name="last_name"></div>
            <div class="col-md-4 mb-3"><label for="validationDefault03">ایمیل</label><input type="email" class="form-control"
                    id="validationDefault03" placeholder="ایمیل" name="email"></div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3"><label for="validationDefault01">رمز عبور</label><input type="password" class="form-control"
                    id="validationDefault01" placeholder="رمز عبور" name="password"></div>
            <div class="col-md-6 mb-3"><label for="validationDefault02">تکرار رمز عبور</label><input type="password" class="form-control"
                    id="validationDefault02" placeholder="تکرار رمز عبور" name="repassword"></div>
        </div>
        <div class="form-row">
            <div class="col-md-1 mb-3"><label for="validationDefault01">وضعیت</label>
                <select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($userStatus as $status)
                    <option value="{{$status->id}}">{{$status->status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 mb-3"><label for="validationDefault01">نقش</label>
                <select name="role" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($userRole as $role)
                    <option value="{{$role->id}}">{{$role->role}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 mb-3"><label for="validationDefault01">جنسیت</label>
                <select name="gender" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($userGender as $gender)
                    <option value="{{$gender->id}}">{{$gender->sex}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 mb-3"><label for="validationDefault04">موبایل</label><input type="text" class="form-control"
                    id="validationDefault04" placeholder="موبایل" name="phone"></div>
            <div class="col-md-2 mb-3"><label for="validationDefault04">شغل</label><input type="text" class="form-control"
                    id="validationDefault04" placeholder="شغل" name="profession"></div>
            <div class="col-md-2 mb-3"><label for="validationDefault04">دانشگاه محل تحصیل</label><input type="text"
                    class="form-control" id="validationDefault04" name="university" placeholder="دانشگاه محل تحصیل"></div>
            <div class="col-md-3 mb-3"><label for="validationDefault04">ویرایش تاریخ تولد</label><input type="date"
                    class="form-control" id="validationDefault04" placeholder="تاریخ تولد" name="birthdate"></div>
        </div>
        <div class="form-row">
            <div class="col-md-2 mb-3"><label for="validationDefault04">شهر</label><input type="text" class="form-control"
                    id="validationDefault04" name="city" placeholder="شهر"></div>
            <div class="col-md-3 mb-3"><label for="validationDefault05">خیابان</label><input type="text" class="form-control"
                    id="validationDefault05" name="street" placeholder="خیابان"></div>
            <div class="col-md-2 mb-3"><label for="validationDefault06">کوچه</label><input type="text" class="form-control"
                    id="validationDefault06" name="alley" placeholder="کوچه"></div>
            <div class="col-md-2 mb-3"><label for="validationDefault07">پلاک</label><input type="text" class="form-control"
                    id="validationDefault07" name="plate" placeholder="پلاک"></div>
            <div class="col-md-3 mb-3"><label for="validationDefault08">کد پستی</label><input type="text" class="form-control"
                    id="validationDefault08" name="postal_code" placeholder="کد پستی"></div>
        </div>

        <div class="custom-file mt-3">
            {{Form::label('user_photo', 'افزودن عکس',['class' => 'custom-file-label'])}}
            {{Form::file('user_photo',['class' => 'custom-file-input'])}}
        </div>

        <input class="btn btn-success mt-4" value="ثبت کاربر" type="submit">
    </form>
</div>


@stop