<div class="card">
  <div class="card-header">
    <strong class="card-title">Matriks Perbandingan Berpasangan</strong>
  </div>
  <div class="card-body">
    <table class="table table-bordered">

      <tr>
        <th>Kriteria</th>

        <?php if ($result) : foreach ($result as $rs) : ?>

        <th><?= $rs->nama_kriteria ?></th>

        <?php endforeach;
        endif; ?>
      </tr>

      <?php if ($result) : for ($x = 0; $x < count($result); $x++) : ?>

      <tr>
        <th><?= $result[$x]->nama_kriteria ?></th>

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

<div class="card">
  <div class="card-header">
    <strong class="card-title">Matriks Nilai Kriteria</strong>
  </div>
  <div class="card-body">
    <table class="table table-bordered">

      <tr>
        <th>Kriteria</th>

        <?php if ($result) : foreach ($result as $rs) : ?>

        <th><?= $rs->nama_kriteria ?></th>

        <?php endforeach;
        endif; ?>

        <th>Jumlah</th>
        <th>Prioritas</th>
        <th>Nilai Eigen</th>
      </tr>

      <?php if ($result) : for ($x = 0; $x < count($result); $x++) : ?>

      <tr>
        <th><?= $result[$x]->nama_kriteria ?></th>

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