   <style>
    .rawr:hover {
      color: 222 !important;
      
    }
    .rawr {
      color: #222 !important;
      cursor: default;
      
    }
    .nav-logo {
      color: 222 !important;
      
    }
   </style>
   
   <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
       
          <li class="nav-item">
            <h1 class="nav-link fs-4 rawr" style="margin-top: -45px;margin-bottom: 10px;border-bottom: 1px solid #44444427;padding-bottom: 14px" aria-current="page" href="#">
              <span class="nav-logo" style="margin-bottom: 6px" data-feather="edit"></span>
              Nuzablog
        </h1>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
        </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
              <span data-feather="file-text"></span>
              My Posts
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('dashboard/profil*') ? 'active' : '' }}" href="/dashboard/profil">
              <span data-feather="user"></span>
              My Profil
            </a>
          </li>
        </ul>


        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
              <span data-feather="grid"></span>
              Post Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
              <span data-feather="users"></span>
              Users
            </a>
          </li>
        </ul>
        @endcan

      </div>
    </nav>