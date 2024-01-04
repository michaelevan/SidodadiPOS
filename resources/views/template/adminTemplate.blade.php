<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{url("../assets/images/favicon.png")}}"/>
    <link href="{{url("assets/libs/flot/css/float-chart.css")}}" rel="stylesheet" />
    <link href="{{url("../dist/css/style.min.css")}}" rel="stylesheet" />
</head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="{{url('/admin')}}">
              <!-- Logo icon -->
              <b class="logo-icon ps-2">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                  src="../assets/images/logo-icon.png"
                  alt="homepage"
                  class="light-logo"
                  width="25"
                />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text ms-2" style="color: red; font-size: 20pt">
                <!-- dark Logo text -->
                Sidodadi
              </span>
            </a>
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a
                  class="nav-link sidebartoggler waves-effect waves-light"
                  href="javascript:void(0)"
                  data-sidebartype="mini-sidebar"
                  ><i class="mdi mdi-menu font-24"></i
                ></a>
              </li>
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->
              <li class="nav-item search-box">
                <a
                  class="nav-link waves-effect waves-dark"
                  href="javascript:void(0)"
                  ><i class="mdi mdi-magnify fs-4"></i
                ></a>
                <form class="app-search position-absolute">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search &amp; enter"
                  />
                  <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                </form>
              </li>
            </ul>
            <div class="ps-4 p-10">
            <a href="{{url('/logout')}}" class="btn btn-sm btn-success btn-rounded text-white">
                <i class="mdi mdi-logout"></i>&nbsp;&nbsp;Logout
            </a>
            </div>
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item">
                    <a
                      class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{url('/admin/dashboard')}}"
                      aria-expanded="false"
                      ><i class="mdi mdi-view-dashboard"></i
                      ><span class="hide-menu">Dashboard</span></a
                    >
                </li>
                <li class="sidebar-item">
                    <a
                      class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{url('/admin/barang')}}"
                      aria-expanded="false"
                      ><i class="mdi mdi-archive"></i
                      ><span class="hide-menu">Barang</span>
                      @if ($countStok > 0)
                        <span class="bg-danger" style="margin-left: 5%; width: 12.5%; border-radius: 50%; text-align: center">{{ $countStok }}</span>
                      @endif
                    </a>
                </li>
                <li class="sidebar-item">
                    <a
                      class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{url('/admin/user')}}"
                      aria-expanded="false"
                      ><i class="mdi mdi-account"></i
                      ><span class="hide-menu">Pegawai</span></a
                    >
                </li>
                {{-- <li class="sidebar-item">
                    <a
                      class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{url('/admin/satuan')}}"
                      aria-expanded="false"
                      ><i class="mdi mdi-scale-balance"></i
                      ><span class="hide-menu">Satuan</span></a
                    >
                </li> --}}
                <li class="sidebar-item">
                    <a
                      class="sidebar-link waves-effect waves-dark sidebar-link"
                      href="{{url('/admin/supplier')}}"
                      aria-expanded="false"
                      ><i class="mdi mdi-account-multiple-plus"></i
                      ><span class="hide-menu">Supplier</span></a
                    >
                </li>
                <li class="sidebar-item">
                    <a
                      class="sidebar-link has-arrow waves-effect waves-dark"
                      href="{{url('/admin/laporan')}}"
                      aria-expanded="false"
                      ><i class="mdi mdi-clipboard-text"></i
                      ><span class="hide-menu">Laporan</span></a
                    >
                    <ul aria-expanded="false" class="collapse first-level">
                      <li class="sidebar-item">
                        <a href="{{url('/admin/laporanPembelian')}}" class="sidebar-link"
                          ><i class="mdi mdi-note-outline"></i
                          ><span class="hide-menu"> Laporan Pembelian </span></a
                        >
                      </li>
                      <li class="sidebar-item">
                        <a href="{{url('/admin/laporanPenjualan')}}" class="sidebar-link"
                          ><i class="mdi mdi-note-plus"></i
                          ><span class="hide-menu"> Laporan Penjualan </span></a
                        >
                      </li>
                      <li class="sidebar-item">
                        <a href="{{url('/admin/laporanReturPembelian')}}" class="sidebar-link"
                          ><i class="mdi mdi-note"></i
                          ><span class="hide-menu"> Laporan Retur Pembelian </span></a
                        >
                      </li>
                      <li class="sidebar-item">
                        <a href="{{url('/admin/laporanPersediaanBarang')}}" class="sidebar-link"
                          ><i class="mdi mdi-note-text"></i
                          ><span class="hide-menu"> Laporan Persediaan Barang </span></a
                        >
                      </li>
                      <li class="sidebar-item">
                        <a href="{{url('/admin/laporanPembayaranHutang')}}" class="sidebar-link"
                          ><i class="mdi mdi-note-multiple"></i
                          ><span class="hide-menu">Laporan Pembayaran Hutang</span></a
                        >
                      </li>
                      <li class="sidebar-item">
                        <a href="{{url('/admin/laporanSaldoHutang')}}" class="sidebar-link"
                          ><i class="mdi mdi-note-multiple"></i
                          ><span class="hide-menu">Laporan Saldo Hutang</span></a
                        >
                      </li>
                    </ul>
                  </li>
            </ul>
        </ul>
          </nav>
        </div>
      </aside>
      <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                @yield("content");
            </div>
        </div>
        <footer class="footer text-center">
            &copy;Reserved by Toko Sidodadi
        </footer>
      </div>
    </div>
    <script src="{{url('../assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{url('../assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{url('../dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{url('../dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{url('../dist/js/custom.min.js')}}"></script>
    <script src="{{url('../assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script>
        $("#zero_config").DataTable();
      </script>
    <script src="{{url('../assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{url('../assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{url('../assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{url('../assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{url('../assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{url('../assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{url('../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{url('../dist/js/pages/chart/chart-page-init.js')}}"></script>
  </body>
</html>
