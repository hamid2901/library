<div class="col-md-4">
        <div class="well">
            <ul class="list-unstyled">
                @if(!Auth::check())
                <li><a href="{{url('/register')}}"><i class="fas fa-user-plus"></i>&nbspثبت نام</a>
                </li>
                <li><a href="{{url('/login')}}"><i class="fas fa-sign-in-alt"></i>&nbspورود</a>
                </li>
                @else
                <li>
                    <p>
                        <img class="row zoom d-block" style="float:left; width:60px; height: 60px; padding-left: 15px" src={{asset('images/users_images/'.Auth::user()->image_name.'')}}
                            alt="بدون عکس">
                    </p>
                </li>
                <li>سلام&nbsp{{ Auth::user()->first_name }}&nbsp{{ Auth::user()->last_name }}&nbspعزیز</li>
                <li><a href="{{url('/factor/reserved')}}" onclick="event.preventDefault();
                                document.getElementById('reserved-form').submit();"><i
                            class="fas fa-book"></i>&nbsp لیست کتاب های رزرو شده</a>
                    <form id="reserved-form" action="{{url('/factor/reserved')}}" method="POST" style="display: none;">
                        @csrf
                        <input value="{!! Auth::user()->id !!}" name="user_id" type="text">
                    </form>
                </li>
                <li><a href="{{url('/factor/borrowed')}}" onclick="event.preventDefault();
                                document.getElementById('borrowed-form').submit();"><i
                            class="fas fa-book-reader"></i>&nbspلیست کتاب های امانت گرفته
                        شده</a>
    
    
                    <form id="borrowed-form" action="{{url('/factor/borrowed')}}" method="POST" style="display: none;">
                        @csrf
                        <input value="{!! Auth::user()->id !!}" name="user_id" type="text">
                    </form>
                </li>
                <li><a href="{{url('/profile')}}"><i class="fas fa-user-circle"></i>&nbspمشاهده پروفایل</a>
                </li>
                <li><a href="{{url('/logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i
                            class="fas fa-sign-out-alt"></i>&nbspخروج از حساب کاربری</a>
    
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endif
            </ul>
        </div>
        <!-- Blog Search Well -->
        <div class="well">
            <h4>جستجو در کتاب ها</h4>
            <form action="/books" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" name="word" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.input-group -->
        </div>
    
        <!-- Blog Categories Well -->
        <div class="well">
            <h4>دسته بندی کتاب ها</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                        <li><a href="{{url('/books/category/'.$category->type.'')}}">{{$category->type}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <div class="well">
            <h4>ناشران</h4>
            <ul class="list-unstyled">
                @foreach ($publishers as $publisher)
                <li><a href="{{url('/books/publisher/'.$publisher->name.'')}}">{{$publisher->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- Side Widget Well -->
    
    
    </div>