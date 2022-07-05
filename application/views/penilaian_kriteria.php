<div class="card">
  <div class="card-header">
    <strong class="card-title"><?= $title; ?></strong>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <form method="post">
          <table class="table text-center">
            <thead>
              <tr>
                <th colspan="2">Kriteria A</th>
                <th colspan="2">Kriteria B</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>

              <?php if (count($result) > 1) : $urut = 0;
                for ($x = 0; $x < (count($result) - 1); $x++) :
                  for ($y = ($x + 1); $y < count($result); $y++) :
                    $nilai = 1;
                    if ($result_nilai) :
                      foreach ($result_nilai as $rs) :
                        if ($rs->kriteria1 == $result[$x]->id_kriteria && $rs->kriteria2 == $result[$y]->id_kriteria) :
                          $nilai = $rs->nilai;
                        endif;
                      endforeach;
                    endif;
              ?>

              <tr class="justify-content-center">
                <td><?= $result[$x]->nama_kriteria ?></td>

                <td><input type="radio" name="pilihan-<?= $urut ?>" value="1" class="form-check-input"
                    <?= $nilai >= 1 ? 'checked' : '' ?>></td>

                <td><input type="radio" name="pilihan-<?= $urut ?>" value="2" class="form-check-input"
                    <?= $nilai < 1 ? 'checked' : '' ?>></td>

                <td><?= $result[$y]->nama_kriteria ?></td>

                <td><input type="text" name="nilai-<?= $urut ?>" required
                    value="<?= ($nilai >= 1 ? $nilai : (round(1 / $nilai))); ?>" class="form-control form-control-sm">
                </td>
              </tr>

              <?php $urut++;
                  endfor;
                endfor;
              else : ?>

              <tr>
                <th colspan="5">-- Tidak ada kriteria yang bisa dibandingkan --</th>
              </tr>

              <?php endif; ?>

            </tbody>
          </table>
          <button type="submit" class="btn btn-sm btn-info float-right">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>