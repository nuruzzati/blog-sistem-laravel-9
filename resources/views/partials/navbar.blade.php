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
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" style="position: fixed;top: 0;left: 0;right: 0;z-index: 1000">
            <div class="container">
              <a class="navbar-brand" href="#"><i class="bi bi-pencil"></i> Nuzablog</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active ' : '' }}"  href="/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  {{ Request::is('posts') ? 'active' : '' }}" href="/posts">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Category</a>
                  </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                  @auth
                    <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ $greeting }}, {{ auth()->user()->username }} <i class="bi bi-person-circle"></i>
                  </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
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
                  @else
                  <li class="nav-item">
                    <a href="/login" class="nav-link  {{ Request::is('login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                  </li>
                  @endauth
                </ul>
              </div>
            </div>
          </nav>