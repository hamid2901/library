@extends('layouts.app')

@section('content')
<div id="LoginForm">
    <div class="container">
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>{{ __('ورود ادمین') }}</h2>
                    <p>ایمیل و رمز عبور خود را وارد کنید</p>
                </div>
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label style="float: right" for="exampleInputEmail1" class="text-uppercase">{{ __('ایمیل') }}</label>
                        <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                            value="{{ old('email') }}" required autofocus placeholder="ایمیل">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label style="float: right" for="exampleInputPassword1" class="text-uppercase">رمز عبور</label>
                        <input type="password" class="form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            name="password" required placeholder="رمز عبور">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="form-check-label" for="remember">
                                    {{ __('مرا به خاطرت نگه دار') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('ورود') }}
                            </button>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('فراموشی رمز عبور') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <p class="botto-text"></p>
        </div>
    </div>
</div>


@endsection