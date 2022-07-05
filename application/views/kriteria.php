<?php if ($this->session->flashdata('msg')) : ?>
<div class="alert alert-<?= $this->session->flashdata('alt'); ?>" role="alert">
  <?= $this->session->flashdata('msg'); ?>
</div>
<?php endif; ?>

<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-lg-8">
        <strong class="card-title"><?= $title; ?></strong>
      </div>
      <div class="col-lg-4">
        <a href="<?= base_url('kriteria/add'); ?>" class="float-right btn btn-sm btn-success">Tambah</a>
      </div>
    </div>
  </div>

  <div class="card-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode Kriteria</th>
          <th scope="col">Nama Kriteria</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result) : $i = 1;
          foreach ($result as $rs) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $rs->kode_kriteria; ?></td>
          <td><?= $rs->nama_kriteria; ?></td>
          <td>
            <a href="<?= base_url('kriteria/edit/' . $rs->id_kriteria); ?>">
              <span class="badge badge-primary">Edit</span>
            </a>
            <a href="<?= base_url('kriteria/delete/' . $rs->id_kriteria); ?>" onclick="return confirm('Hapus data?')">
              <span class="badge badge-danger">Hapus</span>
            </a>
          </td>
        </tr>
        <?php $i++;
          endforeach;
        else : ?>
        <tr>
          <td class="text-center" colspan="4">-- Tidak ada data --</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>