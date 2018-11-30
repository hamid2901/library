<!DOCTYPE html>
<html>

<head>
    @include('includes.head')
</head>

<body>
    <div class="container d-flex col-12 m-0 p-0">

        <div class="main col-10 m-0 p-0">

            <header class="row col-12 m-0 p-0">
                @include('includes.header')
            </header>

            <div class="content col-12 m-0 p-0">
                @yield('form')
            </div>

        </div>

        <div class="rightside col-2 m-0 p-0">
            @include('includes.sidebar')
        </div>

    </div>
    @include('includes.footer')

</body>

</html>