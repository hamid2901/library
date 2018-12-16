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

                    <a class="" href="#" data-target="#exampleModal" data-toggle="modal" data-whatever="@getbootstrap"
                        type="button">
                        </i>
                        تماس با ما
                    </a>
                </li>

            </ul>
            <ul style="float: left" class="navbar-nav">
                <!-- Authentication Links -->
                @if(!Auth::check())

                @else
                <a id="parent" class="btn btn-md btn-light text-success navbar-brand" href="{{url('/factor/cart')}}">
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

<div aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" data-toggle="tooltip" title="Exit" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">
                    <i class="far fa-envelope"></i>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="contact-title">
                            ما را دنبال کنید...
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 icons-container">
                                <ul class="text-center icon-list">
                                    <a href="">
                                        <li id="facebook-circle">
                                            <span>
                                                <i class="fab text-primary fa-linkedin-in fa-2x"></i>
                                            </span>
                                        </li>
                                    </a>
                                    <a href="">
                                        <li id="twitter-circle">
                                            <span>
                                                <i style="color: rgb(51, 51, 51)" class="fab fa-github fa-2x twitter-icon"></i>
                                            </span>
                                        </li>
                                    </a>
                                    <a href="">
                                        <li id="youtube-circle">
                                            <span>
                                                <i class="fab text-danger fa-instagram fa-2x youtube-icon"></i>
                                            </span>
                                        </li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 box-separator">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <div class="col-sm-5 line-separator">
                                        </div>
                                        <div class="col-sm-2 icon-separator">
                                        </div>
                                        <div class="col-sm-5 line-separator">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <form method="post" action="{{url('/contact')}}" class="form-horizontal">
                            @csrf
                            @if (Auth::check())
                            <input class="form-control" name="email" value="{{Auth::user()->email}}" style="display:none"
                                type="email">
                            @else
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon">
                                            <i aria-hidden="true" class="far fa-envelope fa-fw"></i>
                                        </span>
                                        <input name="email" class="form-control" placeholder="Email address" type="email">
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon">
                                            <i aria-hidden="true" class="fa fa-question fa-fw">
                                            </i>
                                        </span>
                                        <input name="subject" class="form-control" placeholder="موضوع" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon">
                                            <i aria-hidden="true" class="fas fa-pen fa-fw"></i>
                                        </span>
                                        <textarea name="content" class="form-control" rows="3">
                                            </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 col-sm-offset-3">
                                    <div class="input-group margin-bottom-sm">
                                        <button class="btn btn-primary " id="btn-send-message" type="submit">
                                            ارسال پیام
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>