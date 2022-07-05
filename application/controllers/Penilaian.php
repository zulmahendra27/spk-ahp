<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Penilaian
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Penilaian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kriteria_model', 'kriteria');
    $this->load->model('Alternatif_model', 'alternatif');
    $this->load->model('Penilaian_model', 'pk');
  }

  public function kriteria()
  {
    $result = $this->pk->getAllKriteria();

    if (!empty($_POST)) {
      $result = $this->kriteria->getAll();

      if ($result) {
        $urut = 0;
        for ($x = 0; $x < (count($result) - 1); $x++) {
          for ($y = ($x + 1); $y < count($result); $y++) {
            $pilihanName = 'pilihan-' . $urut;
            $nilaiName = 'nilai-' . $urut;

            $pilihan = $this->input->post($pilihanName, true);
            $nilai = $this->input->post($nilaiName, true);

            if ($pilihan == 1) {
              $bobot = round(intval($nilai), 5);
            } else {
              $bobot = round(1 / intval($nilai), 5);
            }

            if ($bobot == null) {
              $bobot = 1;
            }

            $penKriteria[] = [
              'kriteria1' => $result[$x]->id_kriteria,
              'kriteria2' => $result[$y]->id_kriteria,
              'nilai' => $bobot
            ];

            // $post[] = $pilihan;

            $urut++;
          }
        }

        $rs = $this->pk->insertKriteria($penKriteria);

        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";

        // echo "<pre>";
        // print_r($penKriteria);
        // echo "</pre>";

        redirect('penilaian/kriteria', 'refresh');
      }
    }

    $data = [
      'root' => 'penilaian',
      'title' => 'Penilaian Kriteria',
      'page' => 'penilaian_kriteria',
      'result' => $this->kriteria->getAll(),
      'result_nilai' => $this->pk->getAllKriteria()
    ];

    $this->load->view('page', $data);
  }

  public function alternatif($id_kriteria = null)
  {
    if ($id_kriteria == null) {
      $data = [
        'root' => 'penilaian',
        'title' => 'Pilih Kriteria Untuk Membandingkan Alternatif',
        'page' => 'kriteria_select',
        'result' => $this->kriteria->getAll()
      ];

      $this->load->view('page', $data);
    } else {
      $kriteria = $this->kriteria->getById($id_kriteria);
      // $result = $this->pk->getAllAlternatif($id_kriteria);

      if ($kriteria) {
        if (!empty($_POST)) {
          $result = $this->alternatif->getAll();

          if ($result) {
            $urut = 0;
            for ($x = 0; $x < (count($result) - 1); $x++) {
              for ($y = ($x + 1); $y < count($result); $y++) {
                $pilihanName = 'pilihan-' . $urut;
                $nilaiName = 'nilai-' . $urut;

                $pilihan = $this->input->post($pilihanName, true);
                $nilai = $this->input->post($nilaiName, true);

                if ($pilihan == 1) {
                  $bobot = round(intval($nilai), 5);
                } else {
                  $bobot = round(1 / intval($nilai), 5);
                }

                if ($bobot == null) {
                  $bobot = 1;
                }

                $penAlternatif[] = [
                  'id_kriteria' => $id_kriteria,
                  'alternatif1' => $result[$x]->id_alternatif,
                  'alternatif2' => $result[$y]->id_alternatif,
                  'nilai' => $bobot
                ];

                // $post[] = $pilihan;

                $urut++;
              }
            }

            $rs = $this->pk->insertAlternatif($penAlternatif, $id_kriteria);

            // echo "<pre>";
            // print_r($post);
            // echo "</pre>";

            // echo "<pre>";
            // print_r($penKriteria);
            // echo "</pre>";

            redirect('penilaian/alternatif/' . $id_kriteria, 'refresh');
          }
        }

        $data = [
          'root' => 'penilaian',
          'title' => 'Penilaian Alternatif - Kriteria ' . $kriteria[0]->nama_kriteria,
          'page' => 'penilaian_alternatif',
          'kriteria' => $id_kriteria,
          'result' => $this->alternatif->getAll(),
          'result_nilai' => $this->pk->getAllAlternatif($id_kriteria)
        ];

        $this->load->view('page', $data);
      } else {
        echo "<script>alert('Not Found');</script>";
        echo "<script>window.location='" . base_url('penilaian/alternatif') . "';</script>";
      }
    }
  }

  public function matriks($id_kriteria = null)
  {
    if ($id_kriteria == null) {
      $result = $this->kriteria->getAll();
      $rs_nilai = $this->pk->getAllKriteria();
      $matriks = array();

      if ($result) {
        $jmlmpb = array();
        $jmlmnk = array();
        $totalEigen = 0;

        for ($x = 0; $x < count($result); $x++) {
          // inisialisasi jumlah tiap kolom dan baris kriteria
          $jmlmpb[$x] = 0;
          $jmlmnk[$x] = 0;

          for ($y = 0; $y < count($result); $y++) {
            foreach ($rs_nilai as $rs) {
              if ($result[$x]->id_kriteria == $rs->kriteria1 && $result[$y]->id_kriteria == $rs->kriteria2) {
                if ($rs->nilai >= 1) {
                  $matriks[$x][$y] = $rs->nilai;
                  $matriks[$y][$x] = round((1 / $rs->nilai), 5);
                } else {
                  $matriks[$x][$y] = round($rs->nilai, 5);
                  $matriks[$y][$x] = round((1 / $rs->nilai));
                }
              }
            }

            // diagonal bernilai 1
            if ($x == $y) {
              $matriks[$x][$y] = 1;
            }

            // menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
            // $value = $matriks[$x][$y];
            // $jmlmpb[$y] += $value;

            // menghitung jumlah pada baris kriteria tabel nilai kriteria
            // $matrikb[$x][$y] = $matriks[$x][$y] / $jmlmpb[$y];
            // $value = $matrikb[$x][$y];
            // $jmlmnk[$x] += $value;
          }
        }

        // inisialisasi jumlah tiap kolom dan baris kriteria
        // $jmlmpb = array();
        // $jmlmnk = array();
        // for ($x = 0; $x < count($result); $x++) {
        //   $jmlmpb[$x] = 0;
        //   $jmlmnk[$x] = 0;
        // }

        // menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
        for ($x = 0; $x < count($result); $x++) {
          for ($y = 0; $y < count($result); $y++) {
            $value = $matriks[$x][$y];
            $jmlmpb[$y] += $value;
          }
        }

        // menghitung jumlah pada baris kriteria tabel nilai kriteria
        // matriksb merupakan matrik yang telah dinormalisasi
        for ($x = 0; $x < count($result); $x++) {
          for ($y = 0; $y < count($result); $y++) {
            $matriksb[$x][$y] = $matriks[$x][$y] / $jmlmpb[$y];
            $value = $matriksb[$x][$y];
            $jmlmnk[$x] += $value;
          }

          // nilai priority vektor
          $pv[$x] = $jmlmnk[$x] / count($result);

          // nilai eigen
          $eigen[$x] = $jmlmpb[$x] * $pv[$x];
          $totalEigen += $eigen[$x];
        }

        $ci = ($totalEigen - count($result)) / (count($result) - 1);
        $ri = $this->pk->getRI(count($result));
        $cr = $ci / $ri->nilai;
      }

      // echo "<pre>";
      // print_r($cr);
      // echo "</pre>";

      $data = [
        'root' => 'penilaian',
        'title' => 'Matriks Kriteria',
        'page' => 'kriteria_matriks',
        'result' => $result,
        'matriks' => $matriks,
        'normalisasi' => $matriksb,
        'prioritas' => $pv,
        'eigen' => $eigen,
        'total_eigen' => $totalEigen,
        'ci' => $ci,
        'cr' => $cr,
        'jmlmpb' => $jmlmpb,
        'jmlmnk' => $jmlmnk
      ];

      $this->load->view('page', $data);
    } else {
      $result = $this->alternatif->getAll();
      $kriteria = $this->kriteria->getById($id_kriteria);
      $rs_nilai = $this->pk->getAllAlternatif($id_kriteria);
      if ($kriteria && $rs_nilai) {
        $matriks = array();

        if ($result) {
          $jmlmpb = array();
          $jmlmnk = array();
          $totalEigen = 0;

          for ($x = 0; $x < count($result); $x++) {
            // inisialisasi jumlah tiap kolom dan baris kriteria
            $jmlmpb[$x] = 0;
            $jmlmnk[$x] = 0;

            for ($y = 0; $y < count($result); $y++) {
              foreach ($rs_nilai as $rs) {
                if ($result[$x]->id_alternatif == $rs->alternatif1 && $result[$y]->id_alternatif == $rs->alternatif2) {
                  if ($rs->nilai >= 1) {
                    $matriks[$x][$y] = $rs->nilai;
                    $matriks[$y][$x] = round((1 / $rs->nilai), 5);
                  } else {
                    $matriks[$x][$y] = round($rs->nilai, 5);
                    $matriks[$y][$x] = round((1 / $rs->nilai));
                  }
                }
              }

              // diagonal bernilai 1
              if ($x == $y) {
                $matriks[$x][$y] = 1;
              }

              // menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
              // $value = $matriks[$x][$y];
              // $jmlmpb[$y] += $value;

              // menghitung jumlah pada baris kriteria tabel nilai kriteria
              // $matrikb[$x][$y] = $matriks[$x][$y] / $jmlmpb[$y];
              // $value = $matrikb[$x][$y];
              // $jmlmnk[$x] += $value;
            }
          }

          // inisialisasi jumlah tiap kolom dan baris kriteria
          // $jmlmpb = array();
          // $jmlmnk = array();
          // for ($x = 0; $x < count($result); $x++) {
          //   $jmlmpb[$x] = 0;
          //   $jmlmnk[$x] = 0;
          // }

          // menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
          for ($x = 0; $x < count($result); $x++) {
            for ($y = 0; $y < count($result); $y++) {
              $value = $matriks[$x][$y];
              $jmlmpb[$y] += $value;
            }
          }

          // menghitung jumlah pada baris kriteria tabel nilai kriteria
          // matriksb merupakan matrik yang telah dinormalisasi
          for ($x = 0; $x < count($result); $x++) {
            for ($y = 0; $y < count($result); $y++) {
              $matriksb[$x][$y] = $matriks[$x][$y] / $jmlmpb[$y];
              $value = $matriksb[$x][$y];
              $jmlmnk[$x] += $value;
            }

            // nilai priority vektor
            $pv[$x] = $jmlmnk[$x] / count($result);

            // nilai eigen
            $eigen[$x] = $jmlmpb[$x] * $pv[$x];
            $totalEigen += $eigen[$x];
          }

          $ci = ($totalEigen - count($result)) / (count($result) - 1);
          $ri = $this->pk->getRI(count($result));
          $cr = $ci / $ri->nilai;
        }
      } else {
        echo "<script>alert('Not Found');</script>";
        echo "<script>window.location='" . base_url('penilaian/alternatif/' . $id_kriteria) . "';</script>";
      }

      // echo "<pre>";
      // print_r($cr);
      // echo "</pre>";

      $data = [
        'root' => 'penilaian',
        'title' => 'Matriks Alternatif - Kriteria ' . $kriteria[0]->nama_kriteria,
        'page' => 'alternatif_matriks',
        'result' => $result,
        'matriks' => $matriks,
        'normalisasi' => $matriksb,
        'prioritas' => $pv,
        'eigen' => $eigen,
        'total_eigen' => $totalEigen,
        'ci' => $ci,
        'cr' => $cr,
        'jmlmpb' => $jmlmpb,
        'jmlmnk' => $jmlmnk
      ];

      $this->load->view('page', $data);
    }
  }

  public function matriksalternatif()
  {
    $result = $this->kriteria->getAll();
    $rs_nilai = $this->pk->getAllAlternatif();
    $matriks = array();

    if ($result) {
      $jmlmpb = array();
      $jmlmnk = array();
      $totalEigen = 0;

      for ($x = 0; $x < count($result); $x++) {
        // inisialisasi jumlah tiap kolom dan baris kriteria
        $jmlmpb[$x] = 0;
        $jmlmnk[$x] = 0;

        for ($y = 0; $y < count($result); $y++) {
          foreach ($rs_nilai as $rs) {
            if ($result[$x]->id_kriteria == $rs->kriteria1 && $result[$y]->id_kriteria == $rs->kriteria2) {
              if ($rs->nilai >= 1) {
                $matriks[$x][$y] = $rs->nilai;
                $matriks[$y][$x] = round((1 / $rs->nilai), 5);
              } else {
                $matriks[$x][$y] = round($rs->nilai, 5);
                $matriks[$y][$x] = round((1 / $rs->nilai));
              }
            }
          }

          // diagonal bernilai 1
          if ($x == $y) {
            $matriks[$x][$y] = 1;
          }

          // menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
          // $value = $matriks[$x][$y];
          // $jmlmpb[$y] += $value;

          // menghitung jumlah pada baris kriteria tabel nilai kriteria
          // $matrikb[$x][$y] = $matriks[$x][$y] / $jmlmpb[$y];
          // $value = $matrikb[$x][$y];
          // $jmlmnk[$x] += $value;
        }
      }

      // inisialisasi jumlah tiap kolom dan baris kriteria
      // $jmlmpb = array();
      // $jmlmnk = array();
      // for ($x = 0; $x < count($result); $x++) {
      //   $jmlmpb[$x] = 0;
      //   $jmlmnk[$x] = 0;
      // }

      // menghitung jumlah pada kolom kriteria tabel perbandingan berpasangan
      for ($x = 0; $x < count($result); $x++) {
        for ($y = 0; $y < count($result); $y++) {
          $value = $matriks[$x][$y];
          $jmlmpb[$y] += $value;
        }
      }

      // menghitung jumlah pada baris kriteria tabel nilai kriteria
      // matriksb merupakan matrik yang telah dinormalisasi
      for ($x = 0; $x < count($result); $x++) {
        for ($y = 0; $y < count($result); $y++) {
          $matriksb[$x][$y] = $matriks[$x][$y] / $jmlmpb[$y];
          $value = $matriksb[$x][$y];
          $jmlmnk[$x] += $value;
        }

        // nilai priority vektor
        $pv[$x] = $jmlmnk[$x] / count($result);

        // nilai eigen
        $eigen[$x] = $jmlmpb[$x] * $pv[$x];
        $totalEigen += $eigen[$x];
      }

      $ci = ($totalEigen - count($result)) / (count($result) - 1);
      $ri = $this->pk->getRI(count($result));
      $cr = $ci / $ri->nilai;
    }

    // echo "<pre>";
    // print_r($cr);
    // echo "</pre>";

    $data = [
      'root' => 'penilaian',
      'title' => 'Matriks Kriteria',
      'page' => 'kriteria_matriks',
      'result' => $result,
      'matriks' => $matriks,
      'normalisasi' => $matriksb,
      'prioritas' => $pv,
      'eigen' => $eigen,
      'total_eigen' => $totalEigen,
      'ci' => $ci,
      'cr' => $cr,
      'jmlmpb' => $jmlmpb,
      'jmlmnk' => $jmlmnk
    ];

    $this->load->view('page', $data);
  }

  private function bandingKriteria()
  {
    $result = $this->kriteria->getAll();

    if (count($result) > 1) {
      foreach ($result as $rs) {
        # code...
      }
    }
  }
}


/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */