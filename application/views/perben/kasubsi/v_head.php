<?php 
     header("Cache-Control: private, max-age=10800, pre-check=10800");
     header("Pragma: private");
     header("Expires: " . date(DATE_RFC822,strtotime("+2 day")));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/logogram2.png')?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url().'assets/assets/css/material-dashboard-green.min.css?v=2.1.0'; ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url().'assets/assets/demo/demo.css'; ?>" rel="stylesheet" />

</head>

<body class="">
  <!-- Extra details for Live View on GitHub Pages -->

  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="black" data-image="<?php echo base_url().'assets/assets/img/sidebar-1.jpg'; ?>">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="<?php echo site_url('perbenkasubsi') ?>" class="simple-text logo-mini">
          <img src="<?php echo base_url('assets/images/logogram2.png')?>" style="height: 30px"/>
        </a>
        <a href="<?php echo site_url('perbenkasubsi') ?>" class="simple-text logo-normal">
          <img src="<?php echo base_url('assets/images/logotype2.png')?>" style="height: 30px"/>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?php echo base_url('assets/assets/img/faces/avatar.jpg')?>"/>
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <?php echo $this->session->userdata('nama'); ?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> NIP </span>
                    <span class="sidebar-normal"> <?php echo $this->session->userdata('nip'); ?> </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> JAB </span>
                    <span class="sidebar-normal"> <?php echo $this->session->userdata('jabatan'); ?> </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item active ">
            <a class="nav-link" href="<?php echo site_url('perbenkasubsi') ?>">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">search</i>
              <p> Menu Penelitian
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo site_url('perbenkasubsi/list_jaminan_cb') ?>">
                    <span class="sidebar-mini"> CB </span>
                    <span class="sidebar-normal"> Jaminan Customs Bond </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo site_url('perbenkasubsi/list_jaminan_tn') ?>">
                    <span class="sidebar-mini"> TN </span>
                    <span class="sidebar-normal"> Jaminan Tunai </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo site_url('perbenkasubsi/list_jaminan_bg') ?>">
                    <span class="sidebar-mini"> BG </span>
                    <span class="sidebar-normal"> Bank Garansi </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo site_url('perbenkasubsi/list_jaminan_ln') ?>">
                    <span class="sidebar-mini"> LN </span>
                    <span class="sidebar-normal"> Jaminan Lainnya </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo site_url('perbenkasubsi/list_penarikan_jaminan') ?>">
                    <span class="sidebar-mini"> PN </span>
                    <span class="sidebar-normal"> Penarikan Jaminan </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo site_url('perbenkasubsi/list_konfirmasi') ?>">
              <i class="material-icons">assignment_turned_in</i>
              <p> Konfirmasi Jaminan </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
              <i class="material-icons">folder</i>
              <p> Data
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="componentsExamples">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo site_url('perbenkasubsi/list_ebpj') ?>">
                    <span class="sidebar-mini"> BPJ </span>
                    <span class="sidebar-normal"> Data e-BPJ </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo site_url('perbenkasubsi/list_penarikan') ?>">
                    <span class="sidebar-mini"> PN </span>
                    <span class="sidebar-normal"> Data Penarikan </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo site_url('perbenkasubsi/list_penolakan') ?>">
                    <span class="sidebar-mini"> TL </span>
                    <span class="sidebar-normal"> Data Penolakan </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo site_url('perbenkasubsi/list_jaminan') ?>">
                    <span class="sidebar-mini"> JM </span>
                    <span class="sidebar-normal"> Data Jaminan </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo site_url('perbenkasubsi/list_jatuh_tempo') ?>">
              <i class="material-icons">find_in_page</i>
              <p> Monitoring </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo site_url('perbenkasubsi/laporan') ?>">
              <i class="material-icons">event_note</i>
              <p> Laporan </p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="<?php echo site_url('perbenkasubsi') ?>">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="<?php echo site_url('perbenkasubsi') ?>" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?php echo site_url('perbenkasubsi/setting') ?>">Setting</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo site_url('login/logout') ?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->