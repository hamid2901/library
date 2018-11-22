<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/users') }}"><i class="icon-ghost"></i> <span class="nav-link-text">{{ trans('admin.user.title') }}</span></a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/books') }}"><i class="icon-diamond"></i> <span class="nav-link-text">{{ trans('admin.book.title') }}</span></a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/articles') }}"><i class="icon-graduation"></i> <span class="nav-link-text">{{ trans('admin.article.title') }}</span></a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/authors') }}"><i class="icon-umbrella"></i> <span class="nav-link-text">{{ trans('admin.author.title') }}</span></a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/categories') }}"><i class="icon-star"></i> <span class="nav-link-text">{{ trans('admin.category.title') }}</span></a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/factors') }}"><i class="icon-drop"></i> <span class="nav-link-text">{{ trans('admin.factor.title') }}</span></a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/messages') }}"><i class="icon-book-open"></i> <span class="nav-link-text">{{ trans('admin.message.title') }}</span></a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/news') }}"><i class="icon-flag"></i> <span class="nav-link-text">{{ trans('admin.news.title') }}</span></a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/book-comments') }}"><i class="icon-flag"></i> <span class="nav-link-text">{{ trans('admin.book-comment.title') }}</span></a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/news-comments') }}"><i class="icon-drop"></i> <span class="nav-link-text">{{ trans('admin.news-comment.title') }}</span></a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/publishers') }}"><i class="icon-globe"></i> <span class="nav-link-text">{{ trans('admin.publisher.title') }}</span></a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            {{--<li class="nav-title">E-shop</li>--}}
            {{--<li class="nav-item"><a class="nav-link" href="#"><i class="icon-basket"></i> Orders</a></li>--}}
            {{--<li class="nav-item"><a class="nav-link" href="#"><i class="icon-grid"></i> Products</a></li>--}}
            {{--<li class="nav-item"><a class="nav-link" href="#"><i class="icon-people"></i> Customers</a></li>--}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="icon-settings"></i> <span class="nav-link-text">{{ __('Configuration') }}</span></a></li>--}}
            <li class="sidebar-collapse">
                <i class="fa fa-angle-double-left"></i>
                <i class="fa fa-angle-double-right"></i>
            </li>
        </ul>
    </nav>
</div>