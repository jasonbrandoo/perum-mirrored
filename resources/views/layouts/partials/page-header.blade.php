<div class="page-header page-header-light">
  <div class="page-header-content">
    <div class="page-title d-flex">
      @yield('page-title')
    </div>
  </div>

  <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
      <div class="breadcrumb">
        <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
        @yield('breadcrumb')
      </div>

      <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
    </div>

    {{-- <div class="header-elements d-none">
      <div class="breadcrumb justify-content-center">
        <div class="breadcrumb-elements-item dropdown p-0">
          <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
            <i class="icon-gear mr-2"></i>
            Settings
          </a>

          <div class="dropdown-menu dropdown-menu-right">
            <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
            <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
            <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
</div>