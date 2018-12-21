<!DOCTYPE html>
<html>

<head>
    @include('includes.head')

    @yield('pageSpecificStyles') 
</head>

<body>
    <div class="container d-flex col-12 m-0 p-0">
        
        <div class="col-2 m-0 p-0">
            @include('includes.sidebar')
        </div>
        <div class="main col-10 m-0 p-0">
            
            <header class="row col-12 m-0 p-0">
                @include('includes.header')
            </header>

            <div class="content col-12 m-0 p-0">
                @yield('form')
            </div>
            
        </div>


    </div>
    @include('includes.footer')
    <script>
    kamaDatepicker('date3', { 
    nextButtonIcon: "../css/persian-cal/timeir_next.png"
    , previousButtonIcon: "../css/persian-cal/timeir_prev.png"
    , forceFarsiDigits: true
    , markToday: true
    , markHolidays: true
    , highlightSelectedDay: true
    , sync: true
  });
  </script>

</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>           
    @yield('pageSpecificScripts') 
</html>