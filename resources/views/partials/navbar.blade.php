<nav class="navbar py-2 navbar-expand-lg navbar-light gradient" id="navbar" >
  <div class="container">    
    <a class="navbar-brand" href="/">
        <img src="/img/perhutani.png" alt="">
    </a>

      <div class="collapse navbar-collapse" >
        <ul class="nav navbar-nav ms-auto " >
          <li class="nav-item" id="nav-item-1" onmouseover="addUnderline(this.id)" onmouseleave="removeUnderline(this.id)" style="margin-right: 25px;">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/" style="font-size: 18px; font-weight: 600" >Home</a>
          </li>
          <li class="nav-item" id="nav-item-2" onmouseover="addUnderline(this.id)" onmouseleave="removeUnderline(this.id)" style="margin-right: 25px;">
            <a class="nav-link {{ Request::is('category*') ? 'active' : '' }}" href="/category" style="font-size: 18px; font-weight: 600;">Laporan</a>
          </li>
          <li class="nav-item" id="nav-item-3" onmouseover="addUnderline(this.id)" onmouseleave="removeUnderline(this.id)" >
            <a class="nav-link {{ Request::is('feedback*') ? 'active' : '' }}" href="/feedback" style="font-size: 18px; font-weight: 600">Feedback</a>
          </li>
          </ul>

        <ul class="navbar-nav ms-auto">
        @auth
        <li class="bg-success rounded nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px; font-weight: 400; color: white">
            {{ auth()->user()->name }}
          </a>
<<<<<<< HEAD
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard/laporans"><i class="bi bi-layout-text-window-reverse"></i> Dashboard </a></li>
=======
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
            <li><a class="dropdown-item" href="/dashboard/courses"><i class="bi bi-layout-text-window-reverse" ></i> Dashboard </a></li>
>>>>>>> 0ff7ba6b0bf98c4ff50ade97c9e95e636fb563e7
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
            <a class="btn btn-outline-success {{ Request::is('login*') ? 'active' : '' }}" href="/login" role="button" style="font-size: 18px; font-weight: 600">Login<i class="bi bi-box-arrow-in-right"></i></a>
          </li>
        @endauth
        </ul>
      </div>
  </div>
</nav>

<style>
  .gradient{
    background-color: #FFFFFF
  }
</style>

<script>
    function addUnderline(elementId) {
        var element = document.getElementById(elementId);
        element.style.borderBottom = "3px solid black";
    }

    function removeUnderline(elementId) {
        var element = document.getElementById(elementId);
        element.style.borderBottom = "none";
    }
</script>

<script>
  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;

  window.onscroll = function() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  };
</script>
