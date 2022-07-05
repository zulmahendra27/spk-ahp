<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
        aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="./">
        <h5>SPK - AHP</h5>
      </a>
      <a class="navbar-brand hidden" href="./">
        <h6>AHP</h5>
      </a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="<?= $root == 'dashboard' ? 'active' : ''; ?>">
          <a href="<?= base_url(); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
        </li>

        <h3 class="menu-title">Main Features</h3><!-- /.menu-title -->

        <li class="<?= $root == 'kriteria' ? 'active' : ''; ?>">
          <a href="<?= base_url('kriteria'); ?>"> <i class="menu-icon fa fa-th"></i>Kriteria</a>
        </li>

        <li class="<?= $root == 'alternatif' ? 'active' : ''; ?>">
          <a href="<?= base_url('alternatif'); ?>"> <i class="menu-icon fa fa-users"></i>Alternatif</a>
        </li>

        <h3 class="menu-title">Penilaian</h3><!-- /.menu-title -->

        <li class="menu-item-has-children dropdown <?= $root == 'penilaian' ? 'active' : ''; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="menu-icon fa fa-bookmark"></i>Penilaian
          </a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-bars"></i><a href="<?= base_url('penilaiankriteria'); ?>">Antar Kriteria</a></li>
            <li><i class="fa fa-user"></i><a href="<?= base_url('penilaianalternatif'); ?>">Antar Alternatif</a></li>
          </ul>
        </li>

        <li class="menu-item-has-children dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
              class="menu-icon fa fa-laptop"></i>Components</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
            <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
          </ul>
        </li>
        <li class="menu-item-has-children active dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
              class="menu-icon fa fa-table"></i>Tables</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
            <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
          </ul>
        </li>
        <li class="menu-item-has-children dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
              class="menu-icon fa fa-th"></i>Forms</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="menu-icon fa fa-th"></i><a href="forms-basic.html">Basic Form</a></li>
            <li><i class="menu-icon fa fa-th"></i><a href="forms-advanced.html">Advanced Form</a></li>
          </ul>
        </li>

        <h3 class="menu-title">Icons</h3><!-- /.menu-title -->

        <li class="menu-item-has-children dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
              class="menu-icon fa fa-tasks"></i>Icons</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font Awesome</a></li>
            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
          </ul>
        </li>
        <li>
          <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
        </li>
        <li class="menu-item-has-children dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
              class="menu-icon fa fa-bar-chart"></i>Charts</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
            <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
          </ul>
        </li>

        <li class="menu-item-has-children dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
              class="menu-icon fa fa-area-chart"></i>Maps</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
          </ul>
        </li>
        <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
        <li class="menu-item-has-children dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
              class="menu-icon fa fa-glass"></i>Pages</a>
          <ul class="sub-menu children dropdown-menu">
            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</aside>