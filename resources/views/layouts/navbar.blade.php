<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Laravel7</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{ request()->is('/')  ?  'active' : ''  }}">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ request()->is('contact')  ?  'active' : '' }}">
          <a class="nav-link" href="contact">Contact</a>
        </li>
        <li class="nav-item {{ request()->is('about')  ?  'active' : '' }}">
          <a class="nav-link" href="about">About</a>
        </li>
        <li class="nav-item {{ request()->is('posts')  ?  'active' : '' }}">
          <a class="nav-link" href="posts">Posts</a>
        </li>
        <li class="nav-item {{ request()->is('login')  ?  'active' : '' }}">
          <a class="nav-link" href="login">Login</a>
        </li>
      </ul>
    </div>
  </div>
  </nav>