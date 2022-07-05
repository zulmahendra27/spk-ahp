<?php if ($result) : ?>
<div class="card">
  <div class="card-header">
    <strong class="card-title"><?= $title; ?></strong>
  </div>
  <div class="card-body">
    <form method="post">
      <div class="row form-group">
        <div class="col-lg-2">
          <label for="kode_alternatif" class="form-control-label">Kode Alternatif</label>
        </div>
        <div class="col-lg-4">
          <input type="text" id="kode_alternatif" name="kode_alternatif" class="form-control"
            value="<?= set_value('kode_alternatif', $result[0]->kode_alternatif); ?>">
          <?= form_error('kode_alternatif', '<small class="form-text text-danger">', '</small>'); ?>
        </div>
      </div>

      <div class="row form-group">
        <div class="col-lg-2">
          <label for="nama_alternatif" class="form-control-label">Nama Alternatif</label>
        </div>
        <div class="col-lg-4">
          <input type="text" id="nama_alternatif" name="nama_alternatif" class="form-control"
            value="<?= set_value('nama_alternatif', $result[0]->nama_alternatif); ?>">
          <?= form_error('nama_alternatif', '<small class="form-text text-danger">', '</small>'); ?>
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
<?php else : ?>
<script>
alert('Tidak ada data dengan ID yang dimaksud');
window.location = "<?= base_url('alternatif'); ?>";
</script>
<?php endif; ?>