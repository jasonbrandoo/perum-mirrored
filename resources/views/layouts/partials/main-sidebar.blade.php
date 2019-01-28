<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
  <!-- Sidebar mobile toggler -->
  <div class="sidebar-mobile-toggler text-center">
    <a href="#" class="sidebar-mobile-main-toggle">
      <i class="icon-arrow-left8"></i>
    </a>
    <span class="font-weight-semibold">Navigation</span>
    <a href="#" class="sidebar-mobile-expand">
      <i class="icon-screen-full"></i>
      <i class="icon-screen-normal"></i>
    </a>
  </div>
  <!-- /sidebar mobile toggler -->
  <!-- Sidebar content -->
  <div class="sidebar-content">
    <!-- Main navigation -->
    <div class="card card-sidebar-mobile">
      <ul class="nav nav-sidebar text-nowrap" data-nav-type="accordion">
        <!-- Main -->
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-database"></i><span>Master</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Layouts">
            {{--  --}}
            <li class="nav-item"><a href="{{ route('company.index') }}" class="nav-link"><i class="icon-office"></i>Company</a></li>            
            {{--  --}}
            <li class="nav-item"><a href="{{ route('customer.index') }}" class="nav-link"><i class="icon-users"></i>Customer</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('kavling.index') }}" class="nav-link"><i class="icon-home7"></i></i>Kavling</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('payment.index') }}" class="nav-link"><i class="icon-checkmark"></i>Payment Method</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('price.index') }}" class="nav-link"><i class="icon-coin-dollar"></i>Price</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('referensi.index') }}" class="nav-link"><i class="icon-envelop2"></i>Referensi</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('role.index') }}" class="nav-link"><i class="icon-users2"></i>Role</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('rumah.index') }}" class="nav-link"><i class="icon-home5"></i>Rumah</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('sales.index') }}" class="nav-link"><i class="icon-user-tie"></i>Sales</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link"><i class="icon-user"></i>User</a></li>
          </ul>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-cash"></i> <span>Transaction</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Layouts">
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">AJB</a>
              <ul class="nav nav-group-sub">
                  <li class="nav-item"><a href="{{ route('transaction.ajb.create') }}" class="nav-link">Create New AJB</a></li>
                  <li class="nav-item"><a href="{{ route('transaction.ajb.realization') }}" class="nav-link">Realisasi AJB</a></li>
                  <li class="nav-item"><a href="{{ route('transaction.ajb.disbursement') }}" class="nav-link">Pencairan</a></li>
                  <li class="nav-item"><a href="{{ route('transaction.ajb.index') }}" class="nav-link">AJB</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('transaction.berkas.index') }}" class="nav-link">Berkas</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('transaction.komisi-akad.index') }}" class="nav-link">Komisi Akad</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('transaction.komisi-eksternal.index') }}" class="nav-link">Komisi Eksternal</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('transaction.kwitansi.index') }}" class="nav-link">Kuitansi</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('transaction.legal.index') }}" class="nav-link">Legalitas</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('transaction.lpa.index') }}" class="nav-link">LPA</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('transaction.mou.index') }}" class="nav-link">MOU</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('transaction.pembatalan.index') }}" class="nav-link">Pembatalan SP</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('transaction.spk.index') }}" class="nav-link">SPK</a></li>
            {{--  --}}
            <li class="nav-item"><a href="{{ route('transaction.surat-pesanan.index') }}" class="nav-link">Surat</a></li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">Wawancara</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{ route('transaction.wawancara.create') }}" class="nav-link">Permohonan Wawancara</a></li>
                <li class="nav-item"><a href="{{ route('transaction.realisasi.create') }}" class="nav-link">Realisasi Wawancara</a></li>
                <li class="nav-item"><a href="{{ route('transaction.keputusan.create') }}" class="nav-link">Keputusan Wawancara</a></li>
                <li class="nav-item"><a href="{{ route('transaction.wawancara.index') }}" class="nav-link">Wawancara</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- /main -->
      </ul>
    </div>
    <!-- /main navigation -->
  </div>
  <!-- /sidebar content -->
</div>