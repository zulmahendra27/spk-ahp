<div class="card">
  <div class="card-header">
    <strong class="card-title"><?= $title; ?></strong>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <?= $html ?>
    </table>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <strong class="card-title">Rangking</strong>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Rangking</th>
          <th>Nama Alternatif</th>
          <th>Nilai</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;
        foreach ($rangking as $rs) : ?>
        <tr class="<?= $i == 1 ? 'table-success font-weight-bold' : '' ?>">
          <td><?= $i ?></td>
          <td><?= $rs['alternatif'] ?></td>
          <td><?= $rs['nilai'] ?></td>
        </tr>
        <?php $i++;
        endforeach; ?>
      </tbody>
    </table>
  </div>
</div>