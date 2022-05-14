<header>
  <div class="navbar-bg"></div>
  <nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li>
          <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1" /></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title">Hello, {{ Auth::user()->name }}</div>


          <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">DigiBook</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">DB</a>
      </div>
      <ul class="sidebar-menu">
        <li class="nav-item dropdown {{ (request()->is('admin')) ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('admin') }}"><i class="fas fa-grid-2"></i> <span>Dashboard</span></a>
        </li>
        <li class="nav-item dropdown {{ (request()->is('admin/manage-books*')) ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('manage_books') }}"><i class="fas fa-book"></i> <span>Manage Books</span></a>
        </li>
        <li class="nav-item dropdown {{ (request()->is('admin/manage-categories')) ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('manage_categories') }}"><i class="fas fa-tags"></i> <span>Manage Categories</span></a>
        </li>
      </ul>
    </aside>
  </div>
</header>