<div class="card">
  <div class="card-header">
    <strong class="card-title"><?= $title; ?></strong>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <table class="table">
          <thead>
            <tr>
              <th colspan="2">Kriteria A</th>
              <th colspan="2">Kriteria B</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($result) > 1) : foreach ($result as $rs) : ?>
            <?php endforeach;
            else : ?>
            <?php endif; ?>
            <tr>
              <th>-- Tidak ada kriteria yang bisa dibandingkan --</th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>