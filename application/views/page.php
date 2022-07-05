<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- <link rel="stylesheet" href="<?php /* base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') */ ?>"> -->
  <link rel="stylesheet" href="<?= base_url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/themify-icons/css/themify-icons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/flag-icon-css/css/flag-icon.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/selectFX/css/cs-skin-elastic.css') ?>">

  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
  <!-- Left Panel -->

  <?php include 'sidebar.php'; ?>

  <!-- /#left-panel -->

  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

      <div class="header-menu">

        <div class="col-sm-12">
          <div class="user-area dropdown float-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
            </a>

            <div class="user-menu dropdown-menu">
              <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a>
            </div>
          </div>

        </div>
      </div>

    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1><?= $title; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content mt-3">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">

            <?php include $page . '.php'; ?>

          </div>
        </div>
      </div><!-- .animated -->
    </div><!-- .content -->


  </div><!-- /#right-panel -->

  <!-- Right Panel -->


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>

  <!-- <script src="<?php /* base_url('assets/vendors/jquery/dist/jquery.min.js') */ ?>"></script> -->
  <!-- <script src="<?php /* base_url('assets/vendors/popper.js/dist/umd/popper.min.js') */ ?>"></script> -->
  <!-- <script src="<?php /* base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js') */ ?>"></script> -->
  <script src="<?= base_url('assets/js/main.js') ?>"></script>


</body>

</html>