<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Alternatif
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

class Alternatif extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Alternatif_model', 'alternatif');
  }

  public function index()
  {
    $data = [
      'root' => 'alternatif',
      'title' => 'Alternatif',
      'page' => 'alternatif',
      'result' => $this->alternatif->getAll()
    ];

    $this->load->view('page', $data);
  }

  public function add()
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('kode_alternatif', 'Kode_alternatif', 'trim|required|min_length[3]');
      $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'trim|required');

      if ($this->form_validation->run()) {
        $kode = $this->input->post('kode_alternatif', true);
        $nama = $this->input->post('nama_alternatif', true);

        $data = [
          'kode_alternatif' => $kode,
          'nama_alternatif' => $nama
        ];

        $result = $this->alternatif->insert($data);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Success!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('alternatif', 'refresh');
      }
    }

    $data = [
      'root' => 'alternatif',
      'title' => 'Tambah Alternatif',
      'page' => 'alternatif_add'
    ];

    $this->load->view('page', $data);
  }

  public function edit($id)
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('kode_alternatif', 'Kode_alternatif', 'trim|required|min_length[3]');
      $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'trim|required');

      if ($this->form_validation->run()) {
        $kode = $this->input->post('kode_alternatif', true);
        $nama = $this->input->post('nama_alternatif', true);

        $data = [
          'kode_alternatif' => $kode,
          'nama_alternatif' => $nama
        ];

        $result = $this->alternatif->update($data, $id);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Success!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('alternatif', 'refresh');
      }
    }

    $data = [
      'root' => 'alternatif',
      'title' => 'Edit Alternatif',
      'page' => 'alternatif_edit',
      'result' => $this->alternatif->getById($id)
    ];

    $this->load->view('page', $data);
  }

  public function delete($id)
  {
    $result = $this->alternatif->delete($id);

    if ($result) {
      $this->session->set_flashdata('alt', 'success');
      $this->session->set_flashdata('msg', 'Success!');
    } else {
      $this->session->set_flashdata('alt', 'danger');
      $this->session->set_flashdata('msg', 'Gagal!');
    }

    redirect('alternatif', 'refresh');
  }
}


/* End of file Alternatif.php */
/* Location: ./application/controllers/Alternatif.php */