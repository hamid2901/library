@extends('layouts.app')

@section('content')
<section class="register-block">
    <div class="container continer">
        <div class="row">
            <div class="col-md-6 login-sec">
                <h2 class="text-center">{{ __('ثبت نام') }}</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group col-md-6">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام') }}</label>

                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name" class="col-md-12 col-form-label text-md-right">{{ __(' نام خانوادگی') }}</label>

                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                            name="last_name" value="{{ old('last_name') }}" required autofocus>

                        @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4 text-md-center offset-md-2">
                        <label for="gender" class="col-md-12 col-form-label text-md-right">{{ __('جنسیت') }}</label>

                        <div id="gender offset-md-1">
                            <input checked type="radio" id="male" name="sex" value="1">
                            <label for="male">مرد</label>

                            <input type="radio" id="female" name="sex" value="2">
                            <label for="female">زن</label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">

                        <div class="">
                            <label for="date3" class="col-md-12 col-form-label text-md-right">{{ __('تاریخ تولد') }}</label>
                            <input placeholder="تاریخ تولد" name="birthdate" type="text" id="date3" value="{{ old('birthdate') }}"
                                class="pdate form-control col-md-11">
                                @if ($errors->has('birthdate'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('birthdate') }}</strong>
                        </span>
                        @endif
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label style="float: right" for="exampleInputEmail1" class="text-uppercase">{{ __('ایمیل')
                            }}</label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email') }}" required autofocus placeholder="ایمیل">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label style="float: right" for="phone" class="text-uppercase">{{ __('تلفن') }}</label>
                        <input type="text" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                            name="phone" value="{{ old('phone') }}" autofocus placeholder="تلفن">
                        @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label style="float: right" for="profession" class="text-uppercase">{{ __('شغل') }}</label>
                        <input type="text" id="profession" class="form-control{{ $errors->has('profession') ? ' is-invalid' : '' }}"
                            name="profession" value="{{ old('profession') }}" autofocus placeholder="شغل">
                        @if ($errors->has('profession'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('profession') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label style="float: right" for="university" class="text-uppercase">{{ __('دانشگاه محل
                            تحصیل')
                            }}</label>
                        <input type="text" id="university" class="form-control{{ $errors->has('university') ? ' is-invalid' : '' }}"
                            name="university" value="{{ old('university') }}" autofocus placeholder="دانشگاه محل تحصیل">
                        @if ($errors->has('university'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label style="float: right" for="city" class="text-uppercase">{{ __('شهر')
                            }}</label>
                        <input type="text" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                            name="city" value="{{ old('city') }}" autofocus placeholder="شهر">
                        @if ($errors->has('city'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label style="float: right" for="street" class="text-uppercase">{{ __('خیابان')
                            }}</label>
                        <input type="text" id="street" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}"
                            name="street" value="{{ old('street') }}" autofocus placeholder="خیابان">
                        @if ($errors->has('street'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('street') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label style="float: right" for="alley" class="text-uppercase">{{ __('کوچه')
                            }}</label>
                        <input type="text" id="alley" class="form-control{{ $errors->has('alley') ? ' is-invalid' : '' }}"
                            name="alley" value="{{ old('alley') }}" autofocus placeholder="کوچه">
                        @if ($errors->has('alley'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('alley') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label style="float: right" for="plate" class="text-uppercase">{{ __('پلاک')
                            }}</label>
                        <input type="text" id="plate" class="form-control{{ $errors->has('plate') ? ' is-invalid' : '' }}"
                            name="plate" value="{{ old('plate') }}" autofocus placeholder="پلاک">
                        @if ($errors->has('plate'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('plate') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6 offset-md-6">
                        <label style="float: right" for="postal_code" class="text-uppercase">{{ __('کد پستی')
                            }}</label>
                        <input type="text" id="postal_code" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}"
                            name="postal_code" value="{{ old('postal_code') }}" autofocus placeholder="کد پستی">
                        @if ($errors->has('postal_code'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('postal_code') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label style="float: right" for="password" class="col-form-label text-md-right">{{ __('رمز
                            عبور') }}</label>

                        <div class="">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label style="float: right" for="password-confirm" class="col-form-label text-md-right">{{
                            __('تأیید رمز عبور') }}</label>

                        <div class="">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('ثبت نام') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-6 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="{{asset('images/slide4.jpeg')}}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2>سامانه کتابخانه</h2>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                                        و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                        کاربردی می باشد.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset('images/slide3.jpeg')}}" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2>سامانه کتابخانه</h2>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                                        و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                        کاربردی می باشد.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection