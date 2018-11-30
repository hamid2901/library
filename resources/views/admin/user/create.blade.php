@extends('layouts.admin') @section('form') <div class="container">
    <h2 class="pt-5">ایجاد کاربر جدید</h2>
    <form class="pt-4" method="post" action="/admin/users">
        <div class="form-row">
            <div class="col-md-4 mb-3"><label for="validationDefault01">نام</label><input type="text" class="form-control"
                    id="validationDefault01" placeholder="نام" value="" required></div>
            <div class="col-md-4 mb-3"><label for="validationDefault02">نام خانوادگی</label><input type="text" class="form-control"
                    id="validationDefault02" placeholder="نام خانوادگی" value="" required></div>
            <div class="col-md-4 mb-3"><label for="validationDefault03">ایمیل</label><input type="email" class="form-control"
                    id="validationDefault03" placeholder="ایمیل" value="" required></div>
        </div>
        <div class="form-row">
            <div class="col-md-1 mb-3"><label for="validationDefault01">وضعیت</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($userStatus as $status)
                    <option value="{{$status->id}}">{{$status->status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 mb-3"><label for="validationDefault01">نقش</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($userRole as $role)
                    <option value="{{$role->id}}">{{$role->role}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 mb-3"><label for="validationDefault01">جنسیت</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($userGender as $gender)
                    <option value="{{$gender->id}}">{{$gender->sex}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mb-3"><label for="validationDefault04">موبایل</label><input type="text" class="form-control"
                    id="validationDefault04" placeholder="موبایل" required></div>
            <div class="col-md-2 mb-3"><label for="validationDefault04">شغل</label><input type="text" class="form-control"
                    id="validationDefault04" placeholder="شغل"></div>
            <div class="col-md-2 mb-3"><label for="validationDefault04">دانشگاه محل تحصیل</label><input type="text"
                    class="form-control" id="validationDefault04" placeholder="دانشگاه محل تحصیل"></div>
            <div class="col-md-3 mb-3"><label for="validationDefault04">تاریخ تولد</label><input type="date" class="form-control"
                    id="validationDefault04" placeholder="تاریخ تولد"></div>


        </div>
        <div class="form-row">
            <div class="col-md-2 mb-3"><label for="validationDefault04">شهر</label><input type="text" class="form-control"
                    id="validationDefault04" placeholder="شهر" ></div>
            <div class="col-md-3 mb-3"><label for="validationDefault05">خیابان</label><input type="text" class="form-control"
                    id="validationDefault05" placeholder="خیابان" ></div>
            <div class="col-md-2 mb-3"><label for="validationDefault06">کوچه</label><input type="text" class="form-control"
                    id="validationDefault06" placeholder="کوچه" ></div>
            <div class="col-md-2 mb-3"><label for="validationDefault07">پلاک</label><input type="text" class="form-control"
                    id="validationDefault07" placeholder="پلاک" ></div>
            <div class="col-md-3 mb-3"><label for="validationDefault08">کد پستی</label><input type="text" class="form-control"
                    id="validationDefault08" placeholder="کد پستی" ></div>
        </div>
        <div class="custom-file mt-3">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">انتخاب عکس</label>
        </div>

        <input class="btn btn-primary mt-4" value="ثبت" type="submit">
    </form>
</div>@stop