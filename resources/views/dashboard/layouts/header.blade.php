  @php
date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu sesuai dengan kebutuhan Anda
$currentHour = (int) date('G');
$greeting = '';

if ($currentHour >= 5 && $currentHour < 12) {
    $greeting = 'Good morning';
} elseif ($currentHour >= 12 && $currentHour < 18) {
    $greeting = 'Good afternoon';
} else {
    $greeting = 'Good evening';
}

@endphp


  {{-- TAMPILAN DESKTOP --}}
  
  <style>
    /* Menampilkan menu sebagai hamburger menu hanya di layar mobile */
@media screen and (max-width: 767px) {
    /* Menampilkan tombol hamburger */
  #headers {
    display: none
  }
}

  </style>
  
  
  <header id="headers" class="p-3 mb-3 border-bottom bg-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-center" style="gap: 150px">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <p class="text-white">.</p>
        </ul>

        <form class="col-lg-auto mb-3 mb-lg-0 me-lg-3">
         <div class="">.</div>
        </form>

        <div class="dropdown text-end">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if (auth()->user()->image)
                    <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="{{ auth()->user()->username }}" width="32" height="32" class="rounded-circle mx-1">
                @else
                    <img src="https://www.triwiga.co.id/foto/noimage.png" alt="{{ auth()->user()->username }}" width="32" height="32" class="rounded-circle mx-1">
                @endif
                {{ $greeting }}, {{ auth()->user()->username }} <i class="bi bi-person-circle"></i>
            </a>

          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="/posts">Go to all post</a></li>
            <li><a class="dropdown-item" href="/dashboard/profil">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                  <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-in-right"></i> Logout
                            </button>
                          </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>




















{{-- KHUSUS TAMPILAN MOBILE--}}
  <header class=" mb-3 border-bottom ">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


        <style>
          .hilang {
            display: none;
          }

       
          @media screen and (max-width: 768px) {
    
            .hilang {
            display: block;
        }

           .search-awal {
            display: none;
          }

}
        </style>



<nav class="hilang navbar navbar-expand-lg bg-body-tertiary col-12">
  <div class="container-fluid" style="gap: 100xp">
    <a class="text-decoration-none fs-3 text-dark" href="#"><span class="mb-2" style="margin-right: 5px" data-feather="edit"></span>Nuzablog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' :  '' }}" aria-current="page" href="/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' :  '' }}" href="/dashboard/posts" >My Posts</a>
        </li>
      </ul>

        <div class="dropdown text-end">
        <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle mx-1">  {{ $greeting }}, {{ auth()->user()->username }} <i class="bi bi-person-circle"> </i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/posts"><i class="bi bi-layout-text-sidebar-reverse"></i> All Post</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-layout-text-sidebar-reverse"></i>My Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                          <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-in-right"></i> Logout
                            </button>
                          </form>
                        </li>
                      </ul>
                    </li>
                    
                </ul>
        </div>
    </div>
  </div>
</nav>





      
      </div>
    </div>
  </header>