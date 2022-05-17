<header>
  <div class="navbar-bg"></div>
  <nav class="navbar navbar-expand-lg main-navbar">
    <a href="{{ route('home') }}" class="navbar-brand sidebar-gone-hide">DigiBook</a>
    <div class="navbar-nav">
      <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    </div>
    <div class="nav-collapse">
      <ul class="navbar-nav">
        <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
          <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item {{ (request()->is('category*')) ? 'active' : '' }}">
          <a href="{{ route('category_book') }}" class="nav-link">Category</a>
        </li>
        <li class="nav-item {{ (request()->is('about*')) ? 'active' : '' }}">
          <a href="{{ route('about') }}" class="nav-link">About</a>
        </li>
      </ul>
    </div>
    <form action="/search" class="form-inline ml-auto">
      <ul class="navbar-nav">
        <li>
          <a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
        </li>
      </ul>
      <div class="search-element">
        <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search"
          data-width="250" />
        <button class="btn" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </form>
  </nav>

  <nav class="navbar sidebar-gone-show navbar-secondary">
    <ul class="navbar-nav">
      <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item {{ (request()->is('category*')) ? 'active' : '' }}">
        <a href="{{ route('category_book') }}" class="nav-link">Category</a>
      </li>
      <li class="nav-item {{ (request()->is('about*')) ? 'active' : '' }}">
        <a href="{{ route('about') }}" class="nav-link">About</a>
      </li>
    </ul>
  </nav>
</header>