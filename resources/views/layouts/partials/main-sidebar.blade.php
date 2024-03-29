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
        @hasanyrole(config('roles'))
        <li class="nav-item nav-item-submenu">

          @can('read')
          <a href="#" class="nav-link"><i class="icon-database"></i><span>Master</span></a>
          @endcan

          <ul class="nav nav-group-sub" data-submenu-title="Layouts">

            @can('read')
            <li class="nav-item"><a href="{{ route('rumah.index') }}" class="nav-link">Tipe Rumah</a></li>
            @endcan

            @can('read')
            <li class="nav-item"><a href="{{ route('price.index') }}" class="nav-link">Price</a></li>
            @endcan

            @can('read')
            <li class="nav-item"><a href="{{ route('kavling.index') }}" class="nav-link"></i>Kavling</a></li>
            @endcan

            @can('read')
            <li class="nav-item"><a href="{{ route('company.index') }}" class="nav-link">Company</a></li>
            @endcan

            @can('read')
            <li class="nav-item"><a href="{{ route('customer.index') }}" class="nav-link">Customer</a></li>
            @endcan

            @can('read')
            <li class="nav-item"><a href="{{ route('payment.index') }}" class="nav-link">Payment Method</a></li>
            @endcan

            @can('read')
            <li class="nav-item"><a href="{{ route('referensi.index') }}" class="nav-link">Referensi</a></li>
            @endcan

            <li class="nav-item nav-item-submenu">

              @can('read')
              <a href="#" class="nav-link"><span>User</span></a>
              @endcan

              <ul class="nav nav-group-sub" data-submenu-title="Layouts">

                @can('read')
                <a href="{{ route('users.index') }}" class="nav-link nav-item-submenu">User</a>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('role.index') }}" class="nav-link">Role</a></li>
                @endcan

              </ul>
            </li>

            @can('read')
            <li class="nav-item"><a href="{{ route('sales.index') }}" class="nav-link">Sales</a></li>
            @endcan
            
          </ul>
        </li>
        @endhasanyrole

        @hasanyrole(config('roles'))
        <li class="nav-item nav-item-submenu">

          @can('read')
          <a href="#" class="nav-link"><i class="icon-cash"></i> <span>Transaction</span></a>
          @endcan

          <ul class="nav nav-group-sub" data-submenu-title="Layouts">
            <li class="nav-item nav-item-submenu">

              @can('read')
              <a href="#" class="nav-link">Surat Pesanan</a>
              @endcan

              <ul class="nav nav-group-sub">

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.surat-pesanan.index') }}" class="nav-link">Surat Pesanan</a></li>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.pembatalan.index') }}" class="nav-link">Pembatalan SP</a></li>
                @endcan
                
              </ul>
            </li>

            @can('read')
            <li class="nav-item"><a href="{{ route('transaction.kwitansi.index') }}" class="nav-link">Kuitansi</a></li>
            @endcan

            @can('read')
            <li class="nav-item"><a href="{{ route('transaction.berkas.index') }}" class="nav-link">Berkas</a></li>
            @endcan

            
            <li class="nav-item nav-item-submenu">

              @can('read')
              <a href="#" class="nav-link">Wawancara</a>
              @endcan

              <ul class="nav nav-group-sub">

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.wawancara.create') }}" class="nav-link">Permohonan Wawancara</a></li>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.realisasi.create') }}" class="nav-link">Realisasi Wawancara</a></li>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.keputusan.create') }}" class="nav-link">Keputusan Wawancara</a></li>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.wawancara.index') }}" class="nav-link">Wawancara</a></li>
                @endcan

              </ul>
            </li>

            @can('read')
            <li class="nav-item"><a href="{{ route('transaction.lpa.index') }}" class="nav-link">LPA</a></li>
            @endcan

            <li class="nav-item nav-item-submenu">

              @can('read')
              <a href="#" class="nav-link">Akad Kredit / Akta Jual Beli</a>
              @endcan

              <ul class="nav nav-group-sub">
                
                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.ajb.create') }}" class="nav-link">Create New AJB</a></li>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.ajb.realization') }}" class="nav-link">Realisasi AJB</a></li>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.ajb.disbursement') }}" class="nav-link">Pencairan</a></li>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.ajb.index') }}" class="nav-link">AJB</a></li>
                @endcan
                
              </ul>
            </li>

            @can('read')
            <li class="nav-item"><a href="{{ route('transaction.legal.index') }}" class="nav-link">Legalitas</a></li>
            @endcan

            @can('read')
            <li class="nav-item"><a href="{{ route('transaction.komisi-akad.index') }}" class="nav-link">Komisi Akad</a></li>
            @endcan

            @can('read')
            <li class="nav-item"><a href="{{ route('transaction.komisi-eksternal.index') }}" class="nav-link">Komisi Eksternal</a></li>
            @endcan

            @can('read')
            <li class="nav-item"><a href="{{ route('transaction.mou.index') }}" class="nav-link">MOU</a></li>
            @endcan

            @can('read')
            <li class="nav-item"><a href="{{ route('transaction.spk.index') }}" class="nav-link">SPK</a></li>
            @endcan

          </ul>
        </li>
        @endhasanyrole

        @hasanyrole(config('roles'))
        <li class="nav-item nav-item-submenu">

          @can('read')
          <a href="#" class="nav-link"><i class="icon-book3"></i><span>Report</span></a>
          @endcan

          <ul class="nav nav-group-sub">
            <li class="nav-item nav-item-submenu">
              
              @can('read')
              <a href="#" class="nav-link">Report Penjualan</a>
              @endcan

              <ul class="nav nav-group-sub">

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.report.penjualan') }}" class="nav-link">Penjualan</a></li>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.report.sales') }}" class="nav-link">Penjualan per sales</a></li>
                @endcan

              </ul>
            </li>

            @can('read')
            <li class="nav-item"><a href="{{ route('transaction.report.pembatalan') }}" class="nav-link">Pembatalan</a></li>
            @endcan
            
            <li class="nav-item nav-item-submenu">

              @can('read')
              <a href="#" class="nav-link">Piutang dan Penerimaan</a>
              @endcan

              <ul class="nav nav-group-sub">

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.report.piutang_detail') }}" class="nav-link">Piutang (detail)</a></li>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.report.piutang_summary') }}" class="nav-link">Piutang (summary)</a></li>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.report.penerimaan') }}" class="nav-link">Penerimaan atau pembayaran</a></li>
                @endcan

              </ul>
            </li>
            <li class="nav-item nav-item-submenu">

              @can('read')
              <a href="#" class="nav-link">Kavling</a>
              @endcan

              <ul class="nav nav-group-sub">

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.report.kavling_unsold') }}" class="nav-link">Kavling belum terjual</a></li>
                @endcan

                @can('read')
                <li class="nav-item"><a href="{{ route('transaction.report.kavling_status') }}" class="nav-link">Status kavling</a></li>
                @endcan

              </ul>
            </li>
          </ul>
        </li>
        @endhasanyrole

        @hasanyrole(config('roles'))
        <li class="nav-item">
          
          @can('read')
          <a href="{{ route('setting.index') }}" class="nav-link"><i class="icon-gear"></i><span>Setting</span></a>
          @endcan

        </li>
        @endhasanyrole

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link"><i class="icon-cross"></i><span>Log Out</span></a>
        </li>
        <!-- /main -->
      </ul>
    </div>
    <!-- /main navigation -->
  </div>
  <!-- /sidebar content -->
</div>