<div class="navbar col-12">
  <div class="navbar-inner">
      <form id="logout-form" action="{{ url('/logout') }}" method="POST">
          @csrf
      </form>
      <ul class="nav" id="admin-nav">
        <li class="float-r"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            خروج
        </a></li>
        <li class="float-r"><a href="/admin/messeges">پیام ها</a></li>
        <li class="active float-l"><a href="/admin/profile">پروفایل</a></li>
      </ul>
  </div>
</div>