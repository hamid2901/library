<div class="navbar col-12">
  <form id="logout-form" action="{{ url('/logout') }}" method="POST">
      @csrf
  </form>
  <div class="navbar-inner d-flex flex-row-reverse">
      <ul class="nav" id="admin-nav">
        <li class="float-r"><a href="/admin/messeges"><i class="fas fa-envelope"></i></a></li>
        <li class="active float-l"><a href="/admin/profile"><i class="fas fa-user-circle"></i></a></li>
        <li class="float-r"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>
        </a></li>
      </ul>
  </div>
</div>