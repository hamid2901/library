@component('mail::message')
# Introduction

{{ $user->name }} : نظر شما با موفقیت ارسال شد

@component('mail::button', ['url' => 'http://roocket.ir'])
ورود به سایت
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
