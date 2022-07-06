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
    $this->setFeatures('kriteria');

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
    $rs_kriteria = $this->kriteria->getAll();
    if ($id_kriteria == null) {
      $data = [
        'root' => 'penilaian',
        'title' => 'Pilih Kriteria Untuk Membandingkan Alternatif',
        'page' => 'kriteria_select',
        'result' => $rs_kriteria
      ];

      $this->load->view('page', $data);
    } else {
      $kriteria = $this->kriteria->getById($id_kriteria);

      if ($kriteria) {
        $this->setFeatures('alternatif', $id_kriteria);

        $data = [
          'root' => 'penilaian',
          'title' => 'Penilaian Alternatif - Kriteria ' . $kriteria[0]->nama_kriteria,
          'page' => 'penilaian_alternatif',
          'rs_kriteria' => $rs_kriteria,
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
      $rs_nilai = $this->pk->getAllKriteria();

      if ($rs_nilai) {
        $data = $this->setMatriks('kriteria', $rs_nilai);
        $data += [
          'root' => 'penilaian',
          'title' => 'Matriks Kriteria',
          'page' => 'kriteria_matriks'
        ];

        $this->load->view('page', $data);
      } else {
        echo "<script>alert('Not Found');</script>";
        echo "<script>window.location='" . base_url('penilaian/kriteria') . "';</script>";
      }
    } else {
      $kriteria = $this->kriteria->getById($id_kriteria);
      $rs_nilai = $this->pk->getAllAlternatif($id_kriteria);

      if ($kriteria && $rs_nilai) {
        $rs_kriteria = $this->kriteria->getAll();
        $data = $this->setMatriks('alternatif', $rs_nilai, $id_kriteria);
        $data += [
          'root' => 'penilaian',
          'title' => 'Matriks Alternatif - Kriteria ' . $kriteria[0]->nama_kriteria,
          'page' => 'alternatif_matriks',
          'rs_kriteria' => $rs_kriteria,
          'kriteria' => $id_kriteria,
        ];

        $this->load->view('page', $data);
      } else {
        echo "<script>alert('Not Found');</script>";
        echo "<script>window.location='" . base_url('penilaian/alternatif/' . $id_kriteria) . "';</script>";
      }
    }
  }

  private function setFeatures($jenis, $id_kriteria = null)
  {
    if (!empty($_POST)) {
      if ($jenis == 'kriteria') {
        $result = $this->kriteria->getAll();
      } else {
        $result = $this->alternatif->getAll();
      }

      if ($result) {
        $urut = 0;
        for ($x = 0; $x < (count($result) - 1); $x++) {
          for ($y = ($x + 1); $y < count($result); $y++) {
            $pilihanName = 'pilihan-' . $urut;
            $nilaiName = 'nilai-' . $urut;

            // pengambilan input dari pilihan dan nilai dari user
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

            // data table penilaian
            if ($jenis == 'kriteria') {
              $penilaian[] = [
                'kriteria1' => $result[$x]->id_kriteria,
                'kriteria2' => $result[$y]->id_kriteria,
                'nilai' => $bobot
              ];
            } else {
              $penilaian[] = [
                'id_kriteria' => $id_kriteria,
                'alternatif1' => $result[$x]->id_alternatif,
                'alternatif2' => $result[$y]->id_alternatif,
                'nilai' => $bobot
              ];
            }

            $urut++;
          }
        }

        if ($jenis == 'kriteria') {
          $this->pk->insertKriteria($penilaian);
          redirect('penilaian/matriks', 'refresh');
        } else {
          $this->pk->insertAlternatif($penilaian, $id_kriteria);
          redirect('penilaian/matriks/' . $id_kriteria, 'refresh');
        }
      }
    }
  }

  private function setMatriks($jenis, $rs_nilai, $id_kriteria = null)
  {
    if ($jenis == 'kriteria') {
      $result = $this->kriteria->getAll();
    } else {
      $result = $this->alternatif->getAll();
    }

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
            if ($jenis == 'kriteria') {
              $resultX = $result[$x]->id_kriteria;
              $resultY = $result[$y]->id_kriteria;
              $rs1 = $rs->kriteria1;
              $rs2 = $rs->kriteria2;
            } else {
              $resultX = $result[$x]->id_alternatif;
              $resultY = $result[$y]->id_alternatif;
              $rs1 = $rs->alternatif1;
              $rs2 = $rs->alternatif2;
            }

            // pengisian matriks
            if ($resultX == $rs1 && $resultY == $rs2) {
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
        }
      }

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

        // data table prioritas
        if ($jenis == 'kriteria') {
          $data_pv[] = [
            'id_kriteria' => $result[$x]->id_kriteria,
            'nilai' => round($pv[$x], 5)
          ];
        } else {
          $data_pv[] = [
            'id_kriteria' => $id_kriteria,
            'id_alternatif' => $result[$x]->id_alternatif,
            'nilai' => round($pv[$x], 5)
          ];
        }
      }

      // nilai consistency index
      $ci = ($totalEigen - count($result)) / (count($result) - 1);
      // nilai random index dari table ri
      $ri = $this->pk->getRI(count($result));
      // nilai consistency ratio. Apabila melebihi 0.1, tidak konsisten, harus mengulang penilaian berpasangan
      $cr = $ci / $ri->nilai;

      // insert into table prioritas
      if ($jenis == 'kriteria') {
        $this->pk->insertPVKriteria($data_pv);
      } else {
        $this->pk->insertPVAlternatif($data_pv, $id_kriteria);
      }

      // data yang dikembalikan ke tampilan matriks
      $data = [
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

      return $data;
    }
  }
}


/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */