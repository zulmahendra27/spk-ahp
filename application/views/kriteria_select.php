<div class="card">
  <div class="card-header">
    <strong class="card-title"><?= $title ?></strong>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama kriteria</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            foreach ($result as $rs) : ?>
            <tr>
              <td><?= $i ?></td>
              <td><a href="<?= base_url('penilaian/alternatif/' . $rs->id_kriteria) ?>"
                  class="text-info font-weight-bold"><?= $rs->nama_kriteria ?></a>
              </td>
            </tr>
            <?php $i++;
            endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>