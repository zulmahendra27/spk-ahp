<div class="card">
  <div class="card-header">
    <strong class="card-title"><?= $title; ?></strong>
  </div>
  <div class="card-body">
    <form method="post">
      <div class="row form-group">
        <div class="col-lg-2">
          <label for="kode_kriteria" class="form-control-label">Kode Kriteria</label>
        </div>
        <div class="col-lg-4">
          <input type="text" id="kode_kriteria" name="kode_kriteria" class="form-control"
            value="<?= set_value('kode_kriteria'); ?>">
          <?= form_error('kode_kriteria', '<small class="form-text text-danger">', '</small>'); ?>
        </div>
      </div>

      <div class="row form-group">
        <div class="col-lg-2">
          <label for="nama_kriteria" class="form-control-label">Nama Kriteria</label>
        </div>
        <div class="col-lg-4">
          <input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control"
            value="<?= set_value('nama_kriteria'); ?>">
          <?= form_error('nama_kriteria', '<small class="form-text text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="row form-group justify-content-end">
        <div class="col-lg-10">
          <button type="submit" class="btn btn-info">Submit Data</button>
        </div>
      </div>

    </form>
  </div>
</div>