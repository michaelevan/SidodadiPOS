<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Home</title>
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/images/favicon.png"/>
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <link href="../dist/css/style.min.css" rel="stylesheet" />
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
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">

          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">

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
      <div style="padding: 5%">
        <div class="row">
    <div hidden>{{$countStok}}</div>

            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <a href="{{url('/admin/dashboard')}}">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-view-dashboard"></i>
                        </h1>
                        <h6 class="text-white">Dashboard</h6>
                    </div>
                </a>
            </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-5 col-xlg-3">
            <div class="card card-hover">
                <a href="{{url('/admin/barang')}}">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-archive"></i>
                        </h1>
                        <h6 class="text-white">Barang</h6>
                    </div>
                </a>
            </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <a href="{{url('/admin/user')}}">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-account"></i>
                        </h1>
                        <h6 class="text-white">Pegawai</h6>
                    </div>
                </a>
            </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <a href="{{url('/admin/satuan')}}">
                    <div class="box bg-secondary text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-scale-balance"></i>
                        </h1>
                    <h6 class="text-white">Satuan</h6>
                    </div>
                </a>
            </div>
            </div>
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card card-hover">
                    <a href="{{url('/admin/supplier')}}">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </h1>
                        <h6 class="text-white">Supplier</h6>
                        </div>
                    </a>
                </div>
                </div>
            <div class="col-md-6 col-lg-5 col-xlg-3">
                <div class="card card-hover">
                    <a href="{{url('/admin/laporanPembelian')}}">
                        <div class="box bg-info text-center">
                        <h1 class="font-light text-white">
                        <i class="mdi mdi-clipboard-text"></i>
                        </h1>
                        <h6 class="text-white">Laporan</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <footer class="footer text-center">
            &copy;Reserved by Toko Sidodadi
        </footer>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../assets/libs/flot/excanvas.js"></script>
    <script src="../assets/libs/flot/jquery.flot.js"></script>
    <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../dist/js/pages/chart/chart-page-init.js"></script>
  </body>
</html>
