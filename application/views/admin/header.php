<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Replace</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/admin/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/admin/css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<script type="text/javascript">
  var base_url = '<?php echo base_url(); ?>';
</script>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <label for="" style="color:black;">Replace</label>
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="<?php echo base_url(); ?>assets/plugins/admin/images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello,Admin <?php echo $this->session->userdata('user_nama'); ?></span>
              <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>assets/plugins/admin/images/faces/face1.jpg" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item mt-2">
                Manage Accounts
              </a>
              <a class="dropdown-item">
                Change Password
              </a>
              <a class="dropdown-item">
                Check Inbox
              </a>
              <a class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo base_url(); ?>assets/plugins/admin/images/faces/face1.jpg" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $this->session->userdata('user_nama'); ?></p>
                  <div>
                    <small class="designation text-muted">Admin</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button class="btn btn-success btn-block">Selamat Datang
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>admin">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Master</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/assets">Assets</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                </li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>transaksi">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Transaksi</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/font-awesome.html">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                </li>
              </ul>
            </div>
          </li> -->
        </ul>
      </nav>
