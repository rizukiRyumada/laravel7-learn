<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Laravel 8</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('about') ? ' active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('contact') ? ' active' : '' }}" href="/contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('login') ? ' active' : '' }}" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link{{ request()->is('post') ? ' active' : '' }}" href="/post">Post</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
