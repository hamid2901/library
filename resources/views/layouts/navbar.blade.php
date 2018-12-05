<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">سامانه کتابخانه</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{url('/books')}}">کتاب ها</a>
                </li>
                <li>
                    <a href="{{url('/news')}}">اخبار</a>
                </li>
                <li>
                    <a href="{{url('/articles')}}">مقالات</a>
                </li>
                <li>
                    <a href="{{url('/contact')}}">تماس با ما</a>
                </li>
                <li>

  
                </li>

            </ul>
            <ul style="float: left" class="navbar-nav">
                <!-- Authentication Links -->
                @if(!Auth::check())

                @else
                <a id="parent" class="btn btn-md btn-light text-success navbar-brand" href="{{url('/factor/cart')}}"
                    onclick="event.preventDefault(); document.getElementById('factor-form').submit();">
                    <form id="factor-form" action="{{url('/factor/cart')}}" method="POST" style="display: none;">
                        @csrf
                        <input value="{!! Auth::user()->id !!}" name="user_id" type="text">
                    </form>
                    <span id="child">سبد رزرو&nbsp<i class="text-success fas fa-cart-arrow-down"></i></span>
                    <span id="child">

                        {{\Cart::session(Auth::user()->id)->getTotalQuantity()}}
                    </span>
                </a>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>