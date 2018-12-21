@extends('layouts.admin')
 @section('form') 
 <div class="container">
    <h2 class="pt-5">ویرایش کاربر</h2>
    <p><img class="row zoom rounding d-block" style="float:left; width:100px; height: 100px" src={{asset('images/users_images/'.$user->image_name.'')}} alt=""></p>
    <script type='text/javascript'>
        $('.zoo-item').ZooMove();
    </script>
    <form class="pt-4 d-block row" method="post" action="/admin/users/{{$user->id}}" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationDefault01">نام</label>
                <input type="text" class="form-control" id="validationDefault01" placeholder="نام" value="{{$user->first_name}}" name="first_name"></div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault02">نام خانوادگی</label>
                <input type="text" class="form-control" id="validationDefault02" placeholder="نام خانوادگی" value="{{$user->last_name}}" name="last_name"></div>
            <div class="col-md-4 mb-3">
                <label for="validationDefault03">ایمیل</label>
                <input type="email" class="form-control" id="validationDefault03" placeholder="ایمیل" value="{{$user->email}}" name="email">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-1 mb-3"><label for="validationDefault01">وضعیت</label>
                <select name="status" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($userStatus as $status)
                    <option value="{{$status->id}}" @if ($user->status_id === $status->id) selected @endif >{{$status->status}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 mb-3"><label for="validationDefault01">نقش</label>
                <select name="role" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($userRole as $role)
                    <option value="{{$role->id}}" @if ($user->role_id === $role->id)
                        selected
                        @endif >{{$role->role}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 mb-3"><label for="validationDefault01">جنسیت</label>
                <select name="gender" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    @foreach($userGender as $gender)
                    <option value="{{$gender->id}}" @if ($user->sex === $gender->id)
                        selected
                        @endif >{{$gender->sex}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 mb-3"><label for="validationDefault04">موبایل</label><input type="text" class="form-control"
                    id="validationDefault04" value="{{$user->phone}}" placeholder="موبایل" name="phone"></div>
            <div class="col-md-1 mb-3"><label for="validationDefault04">شغل</label><input type="text" class="form-control"
                    id="validationDefault04" value="{{$user->profession}}" placeholder="شغل" name="profession"></div>
            <div class="col-md-2 mb-3"><label for="validationDefault04">دانشگاه محل تحصیل</label><input type="text"
                    class="form-control" value="{{$user->university}}" id="validationDefault04" name="university"
                    placeholder="دانشگاه محل تحصیل"></div>
            <div class="col-md-2 mb-3"><label for="validationDefault04">تاریخ تولد</label><input type="text" class="form-control"
                    disabled value="{{jDate($user->birthdate)->format('Y-m-d')}}" id="validationDefault04" placeholder="تاریخ تولد"></div>
            <div class="col-md-2 mb-3"><label for="validationDefault04">ویرایش تاریخ تولد</label><input type="date"
                    class="form-control" value="{{$user->birthdate}}" id="validationDefault04" placeholder="تاریخ تولد"
                    name="birthdate"></div>
        </div>
        <div class="form-row">
            <div class="col-md-2 mb-3"><label for="validationDefault04">شهر</label><input type="text" class="form-control"
                    id="validationDefault04" value="{{$user->city}}" name="city" placeholder="شهر"></div>
            <div class="col-md-3 mb-3"><label for="validationDefault05">خیابان</label><input type="text" class="form-control"
                    id="validationDefault05" value="{{$user->street}}" name="street" placeholder="خیابان"></div>
            <div class="col-md-2 mb-3"><label for="validationDefault06">کوچه</label><input type="text" class="form-control"
                    id="validationDefault06" value="{{$user->alley}}" name="alley" placeholder="کوچه"></div>
            <div class="col-md-2 mb-3"><label for="validationDefault07">پلاک</label><input type="text" class="form-control"
                    id="validationDefault07" value="{{$user->plate}}" name="plate" placeholder="پلاک"></div>
            <div class="col-md-3 mb-3"><label for="validationDefault08">کد پستی</label><input type="text" class="form-control"
                    id="validationDefault08" value="{{$user->postal_code}}" name="postal_code" placeholder="کد پستی"></div>
        </div>

        <div class="custom-file mt-3">
            {{Form::file('user_photo',['class' => 'custom-file-input'])}}
        </div>

        <input class="btn btn-warning mt-4" value="اعمال ویرایش" type="submit">
    </form>
</div>@stop