<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>سامانه کتابخانه</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('css/fontiran.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="{!! asset('css/blog-home.css') !!}" rel="stylesheet">

    <!--  Bootstrap-RTL -->
    <link href="{!! asset('css/bootstrap-rtl.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/profile.css') !!}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{!! asset('css/persian-cal/kamadatepicker.css') !!}">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="{!! asset('css/persian-cal/kamadatepicker.js') !!}"></script>
</head>

<body>

    @include('layouts.navbar')
    <!-- Page Content -->
    <div class="container">

        <div class="row">


            @yield('content')


        </div>
        <!-- /.row -->
        <hr>

        <!-- Footer -->
        @include('layouts.footer')

    </div>
    <!-- /.container -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    @yield('scripts')
    @include('layouts.footer-script')
    <script type='text/javascript'>
        $('.zoo-item').ZooMove();
    </script>
    <script>
        $(document).ready(function () {
            $('.zoom').hover(function () {
                $(this).addClass('transition');
            }, function () {
                $(this).removeClass('transition');
            });
        });
        // $(document).ready(function () {
        //     $('#table_id').DataTable();
        // });
    </script>
    <script>
        kamaDatepicker('date3', {
            nextButtonIcon: "timeir_next.png",
            previousButtonIcon: "timeir_prev.png",
            forceFarsiDigits: true,
            markToday: true,
            markHolidays: true,
            highlightSelectedDay: true,
            sync: true
        });

        // for testing sync functionallity
        $("#date2").val("1311/10/01");
    </script>

</body>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
            '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>

</html>