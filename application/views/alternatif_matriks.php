<div class="card">
  <div class="card-header">
    <strong class="card-title">Matriks Perbandingan Berpasangan</strong>
    <div class="float-right">
      <?php foreach ($rs_kriteria as $rs) : if ($rs->id_kriteria == ($kriteria - 1)) : ?>
      <a href="<?= base_url('penilaian/matriks/' . ($kriteria - 1)) ?>" class="btn btn-sm btn-warning">Previous</a>
      <?php endif;
        if ($rs->id_kriteria == ($kriteria + 1)) : ?>
      <a href="<?= base_url('penilaian/matriks/' . ($kriteria + 1)) ?>" class="btn btn-sm btn-warning">Next</a>
      <?php endif;
      endforeach; ?>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered">

      <tr>
        <th>Alternatif</th>

        <?php if ($result) : foreach ($result as $rs) : ?>

        <th><?= $rs->nama_alternatif ?></th>

        <?php endforeach;
        endif; ?>
      </tr>

      <?php if ($result) : for ($x = 0; $x < count($result); $x++) : ?>

      <tr>
        <th><?= $result[$x]->nama_alternatif ?></th>

        <?php for ($y = 0; $y < count($result); $y++) : ?>

        <td><?= $matriks[$x][$y] ?></td>

        <?php endfor; ?>
      </tr>

      <?php endfor; ?>

      <tr>
        <th>Total</th>

        <?php for ($x = 0; $x < count($result); $x++) : ?>

        <th><?= round($jmlmpb[$x], 5) ?></th>

        <?php endfor; ?>
      </tr>

      <?php endif; ?>

    </table>
  </div>
</div>

<?php if ($cr >= 0.1) : ?>
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
  <div class="row align-items-center">
    <div class="col-lg-1 text-center">
      <span class="badge badge-pill badge-danger">Danger!!!</span>
    </div>
    <div class="col-lg-11">
      Nilai "Consistency Ratio" melebihi 0.1.
      <div class="text-danger text-sm">Mohon input ulang nilai perbandingan</div>
    </div>
  </div>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>

<div class="card">
  <div class="card-header">
    <strong class="card-title">Matriks Nilai Alternatif</strong>
  </div>
  <div class="card-body">
    <table class="table table-bordered">

      <tr>
        <th>Alternatif</th>

        <?php if ($result) : foreach ($result as $rs) : ?>

        <th><?= $rs->nama_alternatif ?></th>

        <?php endforeach;
        endif; ?>

        <th>Jumlah</th>
        <th>Prioritas</th>
        <th>Nilai Eigen</th>
      </tr>

      <?php if ($result) : for ($x = 0; $x < count($result); $x++) : ?>

      <tr>
        <th><?= $result[$x]->nama_alternatif ?></th>

        <?php for ($y = 0; $y < count($result); $y++) : ?>

        <td><?= round($normalisasi[$x][$y], 5) ?></td>

        <?php endfor; ?>

        <td><?= round($jmlmnk[$x], 5) ?></td>
        <td><?= round($prioritas[$x], 5) ?></td>
        <td><?= round($eigen[$x], 5) ?></td>

      </tr>

      <?php endfor; ?>

      <tr>
        <th colspan="<?= 3 + count($result) ?>">Total Eigen / Lambda Max</th>
        <th><?= round($total_eigen, 5) ?></th>
      </tr>
      <tr>
        <th colspan="<?= 3 + count($result) ?>">Consistency Index</th>
        <th><?= round($ci, 5) ?></th>
      </tr>
      <tr>
        <th colspan="<?= 3 + count($result) ?>">Consistency Ratio</th>
        <th><?= round($cr, 5) ?></th>
      </tr>

      <?php endif; ?>

    </table>
  </div>
</div>