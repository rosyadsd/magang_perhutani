<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet">

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar" style="color: green">
    <div class="position-sticky mb-3 sidebar-sticky" >
      <img src="/img/logo-white perhutani.png" class="logo" alt="" length="80" height="40" class="logo-white">
      <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
        <span style="color:white;">Administrator</span>
      </h4>
      <ul class="nav flex-column">
        <li class="list">
          <a class="nav-link {{ Request::is('dashboard') ? '' : ''}}"  aria-current="page" href="/dashboard">
            <span data-feather="grid" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="list">
          <a class="nav-link {{ Request::is('dashboard/laporans*') ? '' : ''}}" aria-current="page" href="/dashboard/laporans">
            <span data-feather="book-open" class="align-text-bottom"></span>
            Laporan
          </a>
        </li>    
        <li class="list">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? '' : ''}}" href="/dashboard/categories">
            <span data-feather="layers" class="align-text-bottom"></span>
            Kategori
          </a>
        </li>
        <li class="list">
          <a class="nav-link {{ Request::is('dashboard/bkphs*') ? '' : ''}}" href="/dashboard/bkphs">
            <span data-feather="map" class="align-text-bottom"></span>
            BKPH
          </a>
        </li>
        
        
      </ul>

      @can('superadmin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Super Administrator</span>
      </h6>
      <ul class="nav flex-column">
        <li class="list">
          <a class="nav-link {{ Request::is('dashboard/users*') ? '' : ''}}" href="/dashboard/users">
            <span data-feather="users" class="align-text-bottom"></span>
            Administrator List
          </a>
        </li>
      </ul> 
      @endcan
      <h1 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <spans style="color:white">Profile</spans>
      </h1>
      <ul class="nav flex-column">
        <li class="list">
          <a class="nav-link {{ Request::is('dashboard/changepassword*') ? '' : ''}}" href="/dashboard/changepassword">
            <span data-feather="settings" class="align-text-bottom"></span>
            Change Password
          </a>
        </li>
        <li class="list">
          <a class="nav-link {{ Request::is('/') ? '' : ''}}"  aria-current="page" href="/">
            <span data-feather="arrow-right" class="align-text-bottom"></span>
            Kembali ke halaman User
          </a>
        </li>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>  
        <br>
        <li class="list">
          <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="nav-link bg-transparent border-0 text-danger">
                  <span data-feather="log-out" class="align-text-bottom logout"></span> 
                  Logout
              </button>
            </form>
        </li>
      </ul>
    </div>

    <script>
      let list = document.querySelectorAll('.list');
      for (let i=0; 1<list.lenght; i++){
        list[i].onclick = function(){
          let j = 0;
          while(j < list.length){
            list[j++].className = 'list';
          }
          list[i].className = 'list '; 
        }
      }
    </script>



  </nav>
