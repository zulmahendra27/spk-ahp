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
            <li><i class="fa fa-bars"></i><a href="<?= base_url('penilaian/kriteria'); ?>">Antar Kriteria</a></li>
            <li><i class="fa fa-user"></i><a href="<?= base_url('penilaian/alternatif'); ?>">Antar Alternatif</a></li>
          </ul>
        </li>

        <h3 class="menu-title">Hasil</h3><!-- /.menu-title -->

        <li class="<?= $root == 'hasil' ? 'active' : ''; ?>">
          <a href="<?= base_url('hasil'); ?>"> <i class="menu-icon fa fa-gears"></i>Hasil</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</aside>