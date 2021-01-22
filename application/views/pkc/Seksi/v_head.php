<?php 
     header("Cache-Control: private, max-age=10800, pre-check=10800");
     header("Pragma: private");
     header("Expires: " . date(DATE_RFC822,strtotime("+2 day")));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo base_url() . 'assets/assets-pkc/img/logogram3.png' ?>">
    <link rel="apple-touch-icon" sizes="76x76" type="image/png" href="<?php echo base_url() . 'assets/assets-pkc/img/logogram3.png' ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        SiJanet | Aplikasi Jaminan Elektronik
    </title>
    <!-- CSS Files -->
    <!-- prim 00a6ff info #9c27b0 xx #ff6993 -->
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/pkc/bower_components/font-awesome/css/font-awesome.min.css' ?>">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/pkc/dist/css/bootstrap-table.min.css' ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/pkc/bower_components/Ionicons/css/ionicons.min.css' ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/pkc/bower_components/select2/dist/css/select2.min.css' ?>">



    <!-- Material Dashboard -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/assets-pkc/css/material-dashboard.min.css' ?>">
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="azure" data-background-color="black" data-image="<?php echo base_url() . 'assets/assets-pkc/img/sidebar-1.jpg' ?>">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
        Tip 2: you can also add an image using data-image tag
    -->
            <style>
                img {
                    -webkit-filter: drop-shadow(1px 1px 0 #00a6ff) drop-shadow(1px 1px 0 #00a6ff);
                    filter: drop-shadow(1px 1px 0 #00a6ff) drop-shadow(1px 1px 0 #00a6ff);
                }
            </style>
            <div class="logo">
                <a href="<?php echo site_url('pelaksana') ?>" class="simple-text logo-mini">
                    <img src="<?php echo base_url() . 'assets/assets-pkc/img/logogram2.png' ?>" style="height: 30px" />
                </a>
                <a href="<?php echo site_url('pelaksana') ?>" class="simple-text logo-normal">
                    <img src="<?php echo base_url() . 'assets/assets-pkc/img/logotype2.png' ?>" style="height: 30px" />
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?php echo base_url() . 'assets/assets-pkc/img/default-avatar.png' ?>" />
                    </div>
                    <div class="user-info">
                        <a class="username">
                            <span>
                            <?php echo $this->session->userdata('nama'); ?>
                            </span>
                        </a>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item <?php if ($this->uri->segment(2) == "") {
                                            echo 'active';
                                        } ?>">
                        <a class="nav-link" href="<?php echo site_url('seksi') ?>">
                            <i class="material-icons">widgets</i>
                            <p> Dashboard </p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == "list_jaminan") {
                                            echo 'active';
                                        } ?>">
                        <a class="nav-link" href="<?php echo site_url('seksi/list_jaminan') ?>">
                            <i class="material-icons">assignment</i>
                            <p> Surat Persetujuan </p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == "monitoring") {
                                            echo 'active';
                                        } ?>">
                        <a class="nav-link" href="<?php echo site_url('seksi/monitoring') ?>">
                            <i class="material-icons">find_in_page</i>
                            <p> Monitoring Jaminan </p>
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
                        <a class="navbar-brand" style="color:white"><?php if ($this->uri->segment(2) == "") {
                                                                        echo 'Dashboard';
                                                                    } elseif ($this->uri->segment(2) == "list_jaminan") {
                                                                        echo 'List Jaminan';
                                                                    } else {
                                                                        echo 'Monitoring Jaminan';
                                                                    } ?></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <!-- <a class="dropdown-item" href="#">Settings</a> -->
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a href="<?php echo site_url('login/logout') ?>" class="dropdown-item">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <style>
input[type="date"] {
    position: relative;
}

/* create a new arrow, because we are going to mess up the native one
see "List of symbols" below if you want another, you could also try to add a font-awesome icon.. */
input[type="date"]:after {
    content: "\25BC"; 
    color: #555;
    padding: 0 5px;
}

/* change color of symbol on hover */
input[type="date"]:hover:after {
    color: #bf1400;
}

/* make the native arrow invisible and stretch it over the whole field so you can click anywhere in the input field to trigger the native datepicker*/
input[type="date"]::-webkit-calendar-picker-indicator {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: auto;
    height: auto;
    color: transparent;
    background: transparent;
}

/* adjust increase/decrease button */
input[type="date"]::-webkit-inner-spin-button {
    z-index: 1;
}

 /* adjust clear button */
 input[type="date"]::-webkit-clear-button {
     z-index: 1;
 }
            </style>