<!-- partial:partials/_horizontal-navbar.html -->
<div class="container-scroller">

<div class="horizontal-menu">
    <nav class="navbar top-navbar col-lg-12 col-12 p-0">
      <div class="container-fluid">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
          <ul class="navbar-nav navbar-nav-left">
            <li class="nav-item ml-0 mr-5 d-lg-flex d-none">
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell mx-0"></i>
                <span class="count bg-success">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <p class="mb-0 font-weight-normal float-left dropdown-header">Notifikasi</p>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-information mx-0"></i>
                      </div>
                  </div>
                  <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Pembayaran</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        baru saja
                      </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-information mx-0"></i>
                      </div>
                  </div>
                  <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Pembayaran</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        3 menit lalu
                      </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-information mx-0"></i>
                      </div>
                  </div>
                  <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal">Pembayaran</h6>
                      <p class="font-weight-light small-text mb-0 text-muted">
                        5 menit lalu
                      </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item nav-search d-none d-lg-block ml-3">
              <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="search">
                      <i class="mdi mdi-magnify"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="cari..." aria-label="search" aria-describedby="search">
              </div>
            </li>	
          </ul>
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('Dashboard/images/logo.svg') }}" alt="logo"/></a>
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
          </div>
          <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <span class="nav-profile-name">Johnson</span>
                  <span class="online-status"></span>
                  <img src="{{ asset('Dashboard/images/faces/face28.png') }} " alt="profile"/>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item">
                      <i class="mdi mdi-settings text-primary"></i>
                      Pengaturan
                    </a>
                    <a class="dropdown-item">
                      <i class="mdi mdi-logout text-primary"></i>
                      Keluar
                    </a>
                </div>
              </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </div>
    </nav>
    <nav class="bottom-navbar">
      <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <i class="mdi mdi-file-document-box menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="mdi mdi-account-multiple menu-icon"></i>
                  <span class="menu-title">Data Siswa</span>
                  <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Data Orang Tua</span>
                <i class="menu-arrow"></i>
              </a>
          </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="mdi mdi-file-multiple menu-icon"></i>
                  <span class="menu-title">Form Pembayaran </span>
                  <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                  <span class="menu-title">Data Pembayaran</span>
                  <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="docs/documentation.html" class="nav-link">
                  <i class="mdi mdi-file menu-icon"></i>
                  <span class="menu-title">Laporan Pembayaran</span></a>
            </li>
          </ul>
      </div>
    </nav>
  </div>
</div>
