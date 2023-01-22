<style>
  .gradient{
    background-image: linear-gradient(#F2FAF4, #FDFEFD)
  }

</style>
<nav class="navbar navbar-expand-lg navbar-light gradient" >
{{-- style="background-color: #2DB854;"> --}}
    <div class="container">    
    <a class="navbar-brand" href="/">
        <img src="/img/perhutani.png" alt="" length="100" height="60" class="d-inline-block align-text-top">
    </a>
      {{-- <a class="navbar-brand" href="/">Aerofood e-Learning</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/" >Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('category*') ? 'active' : '' }}" href="/category" >Laporan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('feedback*') ? 'active' : '' }}" href="/feedback" >Feedback</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard/laporans"><i class="bi bi-layout-text-window-reverse"></i> Dashboard </a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="bi bi-box-arrow-right"></i> Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
        @else
          <li class="nav-item">
            <a class="btn btn-outline-primary {{ Request::is('login*') ? 'active' : '' }}" href="/login" role="button">Login<i class="bi bi-box-arrow-in-right"></i></a>
          </li>
        @endauth
        </ul>
      </div>
    </div>
  </nav>