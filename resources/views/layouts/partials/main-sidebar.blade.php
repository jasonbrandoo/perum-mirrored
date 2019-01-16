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
      <ul class="nav nav-sidebar" data-nav-type="accordion">
        <!-- Main -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="icon-home4"></i>
            <span>
              Dashboard
            </span>
          </a>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-office"></i> <span>Company</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Themes">
            <li class="nav-item"><a href="{{ route('company.index') }}" class="nav-link"><i class="icon-list"></i>Company List</a></li>            
          </ul>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-users4"></i> <span>Customer</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
            <li class="nav-item"><a href="{{ route('customer.create') }}" class="nav-link"><i class="icon-plus2"></i>New Customer</a></li>
          </ul>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-home7"></i> <span>Kavling</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
            <li class="nav-item"><a href="{{ route('kavling.index') }}" class="nav-link"><i class="icon-list"></i>Kavling List</a></li>
          </ul>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-checkmark"></i> <span>Payment Method</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
            <li class="nav-item"><a href="{{ route('payment.index') }}" class="nav-link"><i class="icon-list"></i>Payment Method List</a></li>
          </ul>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-coin-dollar"></i> <span>Price</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
            <li class="nav-item"><a href="{{ route('price.index') }}" class="nav-link"><i class="icon-list"></i>Price List</a></li>
          </ul>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-envelop2"></i> <span>Referensi SP</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
            <li class="nav-item"><a href="{{ route('referensi.index') }}" class="nav-link"><i class="icon-list"></i>Referensi List</a></li>
          </ul>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-users2"></i> <span>Role</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
            <li class="nav-item"><a href="{{ route('role.index') }}" class="nav-link"><i class="icon-list"></i> Role List</a></li>
          </ul>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-home5"></i> <span>Rumah</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
            <li class="nav-item"><a href="{{ route('rumah.index') }}" class="nav-link"><i class="icon-list"></i>Rumah List</a></li>
          </ul>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-user-tie"></i> <span>Sales</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
            <li class="nav-item"><a href="{{ route('sales.index') }}" class="nav-link"><i class="icon-list"></i>Sales List</a></li>
          </ul>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-cash"></i> <span>Transaction</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Layouts">
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">AJB</a>
              <ul class="nav nav-group-sub">
                  <li class="nav-item"><a href="{{ route('transaction.ajb.create') }}" class="nav-link"><i class="icon-plus2"></i>Create New AJB</a></li>
                  <li class="nav-item"><a href="{{ route('transaction.ajb.realization') }}" class="nav-link"><i class="icon-plus2"></i>Realisasi AJB</a></li>
                  <li class="nav-item"><a href="{{ route('transaction.ajb.disbursement') }}" class="nav-link"><i class="icon-plus2"></i>Pencairan</a></li>
                  <li class="nav-item"><a href="{{ route('transaction.ajb.index') }}" class="nav-link"><i class="icon-plus2"></i>AJB List</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">Berkas</a>
              <ul class="nav nav-group-sub">
                  <li class="nav-item"><a href="{{ route('transaction.berkas.index') }}" class="nav-link"><i class="icon-list"></i>Berkas List</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">Komisi Akad</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{ route('transaction.komisi-akad.index') }}" class="nav-link"><i class="icon-list"></i>Komisi Akad List</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">Komisi Eksternal</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{ route('transaction.komisi-eksternal.index') }}" class="nav-link"><i class="icon-list"></i>Komisi Eksternal List</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">Kwitansi</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{ route('transaction.kwitansi.index') }}" class="nav-link"><i class="icon-list"></i>Kuitansi List</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">Legal</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{ route('transaction.legal.index') }}" class="nav-link"><i class="icon-list"></i>Legalitas List</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">LPA</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{ route('transaction.lpa.index') }}" class="nav-link"><i class="icon-list"></i>LPA List</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">MOU</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{ route('transaction.mou.index') }}" class="nav-link"><i class="icon-list"></i>MOU List</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">Pembatalan SP</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{ route('transaction.pembatalan.index') }}" class="nav-link"><i class="icon-list"></i>Pembatalan SP List</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">SPK</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{ route('transaction.spk.index') }}" class="nav-link"><i class="icon-list"></i>SPK List</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">Surat Pesanan</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{ route('transaction.surat-pesanan.index') }}" class="nav-link"><i class="icon-list"></i>Surat List</a></li>
              </ul>
            </li>
            {{--  --}}
            <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link">Wawancara</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="{{ route('transaction.wawancara.index') }}" class="nav-link"><i class="icon-list"></i>Wawancara List</a></li>
              </ul>
            </li>
          </ul>
        </li>
        {{--  --}}
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-user"></i> <span>User</span></a>
          <ul class="nav nav-group-sub" data-submenu-title="Starter kit">
            <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link"><i class="icon-list"></i>User List</a></li>
          </ul>
        </li>
        <!-- /main -->
      </ul>
    </div>
    <!-- /main navigation -->
  </div>
  <!-- /sidebar content -->
</div>