<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
        <span>Administrator</span>
      </h6>

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/courses*') ? 'active' : ''}}" aria-current="page" href="/dashboard/courses">
            <span data-feather="book-open" class="align-text-bottom"></span>
            Courses
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : ''}}" href="/dashboard/categories">
            <span data-feather="layers" class="align-text-bottom"></span>
            Categories
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/feedbacks*') ? 'active' : ''}}" href="/dashboard/feedbacks">
            <span data-feather="message-circle" class="align-text-bottom"></span>
            Feedback
          </a>
        </li>
      </ul>

      @can('superadmin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Super Administrator</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : ''}}" href="/dashboard/users">
            <span data-feather="users" class="align-text-bottom"></span>
            Administrator List
          </a>
        </li>
      </ul> 
      @endcan

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Profile</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/changepassword*') ? 'active' : ''}}" href="/dashboard/changepassword">
            <span data-feather="settings" class="align-text-bottom"></span>
            Change Password
          </a>
        </li>
        <li class="nav-item">
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
  </nav>