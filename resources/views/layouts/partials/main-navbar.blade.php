<div class="navbar navbar-expand-md navbar-dark bg-blue-600 navbar-static">
<div class="navbar-brand">
  <a href="/" class="d-inline-block">
    <img src="/img/sarigriya.png" alt="">
  </a>
  <a href="/" class="text-dark"><h1 class="d-inline ml-2 font-weight-bold">Sari Griya</h1></a>
</div>

<div class="d-md-none">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
    <i class="icon-tree5"></i>
  </button>
  <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
    <i class="icon-paragraph-justify3"></i>
  </button>
</div>

<div class="collapse navbar-collapse" id="navbar-mobile">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
        {{-- <i class="icon-paragraph-justify3"></i> --}}
      </a>
    </li>
  </ul>

  <ul class="navbar-nav ml-md-auto">
    <li class="nav-item">
      <a href="{{ route('logout') }}" class="navbar-nav-link">
        <i class="icon-switch2"></i>
        <span class="d-md-none ml-2">Logout</span>
      </a>
    </li>
  </ul>
</div>
</div>