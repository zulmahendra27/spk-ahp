<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Hasil
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

class Hasil extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Hasil_model', 'hasil');
    $this->load->model('Kriteria_model', 'kriteria');
    $this->load->model('Alternatif_model', 'alternatif');
  }

  public function index()
  {
    $kriteria = $this->kriteria->getAll();
    $alternatif = $this->alternatif->getAll();
    $pv_kriteria = $this->hasil->getPVKriteria();
    $pv_alternatif = $this->hasil->getPVAlternatif();
    $jumlah_pvk = count($pv_kriteria);
    $jumlah_pva = $this->hasil->getCountAlternatif();
    $html = '';

    if (count($kriteria) == $jumlah_pvk && count($kriteria) == $jumlah_pva->jumlah_pva) {
      // view tabel nilai prioritas kriteria dan alternatif
      $html .= "<tr><th>Kriteria</th><th>Prioritas Kriteria</th>";

      foreach ($alternatif as $rs) {
        $html .= "<th>" . $rs->nama_alternatif . "</th>";
      }

      $html .= "</tr>";

      for ($x = 0; $x < count($kriteria); $x++) {
        $html .= "<tr><th>" . $kriteria[$x]->nama_kriteria . "</th>";

        foreach ($pv_kriteria as $pv_k) {
          if ($kriteria[$x]->id_kriteria == $pv_k->id_kriteria) {
            $html .= "<td>" . $pv_k->nilai . "</td>";
          }
        }

        for ($y = 0; $y < count($alternatif); $y++) {
          foreach ($pv_alternatif as $pv_a) {
            if ($kriteria[$x]->id_kriteria == $pv_a->id_kriteria && $alternatif[$y]->id_alternatif == $pv_a->id_alternatif) {
              $html .= "<td>" . $pv_a->nilai . "</td>";
            }
          }
        }

        $html .= "</tr>";
      }


      // penentuan nilai akhir dan rangking
      foreach ($pv_kriteria as $pv_k) {
        // if ($rs_k->id_kriteria == $pv_k->id_kriteria) {
        $nilai_pvk[] = $pv_k->nilai;
        // $nilai[$x] += ($nilai_pvk * $nilai_pva);
        // }


        // foreach ($kriteria as $rs_k) {
        // echo "<pre>";
        // print_r($nilai_pva);
        // echo "</pre>";
        // }
      }

      foreach ($alternatif as $x => $rs_a) {
        $nilai[$x] = 0;
        // foreach ($kriteria as $y => $rs_k) {
        foreach ($pv_alternatif as $pv_a) {
          if ($pv_a->id_alternatif == $rs_a->id_alternatif) {
            $nilai_pva[$x][] = $pv_a->nilai;
            // echo "<pre>";
            // print_r($nilai_pva);
            // echo "</pre>";
          }
        }

        // die;



        for ($i = 0; $i < count($kriteria); $i++) {
          $nilai[$x] += ($nilai_pvk[$i] * $nilai_pva[$x][$i]);
        }
        // echo "<br>";
        // die;
        // }

        // echo "<pre>";
        // print_r($nilai_pvk);
        // echo "</pre>";

        $rangking[] = [
          'alternatif' => $rs_a->nama_alternatif,
          'nilai' => $nilai[$x]
        ];
      }


      // rsort($nilai);
      $keys = array_column($rangking, 'nilai');
      array_multisort($keys, SORT_DESC, $rangking);

      // echo "<pre>";
      // print_r($rangking);
      // echo "</pre>";

      $data = [
        'root' => 'hasil',
        'title' => 'Hasil Perhitungan',
        'page' => 'hasil',
        'html' => $html,
        'rangking' => $rangking
      ];

      $this->load->view('page', $data);
    } else {
      echo "<script>alert('Perbandingan Berpasangan Belum Lengkap. Mohon Lengkapi Terlebih Dahulu');</script>";
      echo "<script>window.location = '" . base_url('dashboard ') . "';</script>";
    }
  }
}


    /* End of file Hasil.php */
    /* Location: ./application/controllers/Hasil.php */