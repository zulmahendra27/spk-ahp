<div class="card">
  <div class="card-header">
    <strong class="card-title"><?= $title; ?></strong>
    <a href="<?= base_url('penilaian/matriks/' . $kriteria) ?>" class="btn btn-sm btn-info float-right">Lihat
      Matriks</a>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <form method="post">
          <table class="table text-center">
            <thead>
              <tr>
                <th colspan="2">Alternatif A</th>
                <th colspan="2">Alternatif B</th>
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
                        if ($rs->alternatif1 == $result[$x]->id_alternatif && $rs->alternatif2 == $result[$y]->id_alternatif) :
                          $nilai = $rs->nilai;
                        endif;
                      endforeach;
                    endif;
              ?>

              <tr class="justify-content-center">
                <td><?= $result[$x]->nama_alternatif ?></td>

                <td><input type="radio" name="pilihan-<?= $urut ?>" value="1" class="form-check-input"
                    <?= $nilai >= 1 ? 'checked' : '' ?>></td>

                <td><input type="radio" name="pilihan-<?= $urut ?>" value="2" class="form-check-input"
                    <?= $nilai < 1 ? 'checked' : '' ?>></td>

                <td><?= $result[$y]->nama_alternatif ?></td>

                <td><input type="text" name="nilai-<?= $urut ?>" required
                    value="<?= ($nilai >= 1 ? $nilai : (round(1 / $nilai))); ?>" class="form-control form-control-sm">
                </td>
              </tr>

              <?php $urut++;
                  endfor;
                endfor;
              else : ?>

              <tr>
                <th colspan="5">-- Tidak ada alternatif yang bisa dibandingkan --</th>
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