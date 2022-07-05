<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Kriteria
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

class Kriteria extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kriteria_model', 'kriteria');
  }

  public function index()
  {
    $data = [
      'root' => 'kriteria',
      'title' => 'Kriteria',
      'page' => 'kriteria',
      'result' => $this->kriteria->getAll()
    ];

    $this->load->view('page', $data);
  }

  public function add()
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('kode_kriteria', 'Kode_kriteria', 'trim|required|min_length[3]');
      $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'trim|required');

      if ($this->form_validation->run()) {
        $kode = $this->input->post('kode_kriteria', true);
        $nama = $this->input->post('nama_kriteria', true);

        $data = [
          'kode_kriteria' => $kode,
          'nama_kriteria' => $nama
        ];

        $result = $this->kriteria->insert($data);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Success!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('kriteria', 'refresh');
      }
    }

    $data = [
      'root' => 'kriteria',
      'title' => 'Tambah Kriteria',
      'page' => 'kriteria_add'
    ];

    $this->load->view('page', $data);
  }

  public function edit($id)
  {
    if (!empty($_POST)) {
      $this->form_validation->set_rules('kode_kriteria', 'Kode_kriteria', 'trim|required|min_length[3]');
      $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'trim|required');

      if ($this->form_validation->run()) {
        $kode = $this->input->post('kode_kriteria', true);
        $nama = $this->input->post('nama_kriteria', true);

        $data = [
          'kode_kriteria' => $kode,
          'nama_kriteria' => $nama
        ];

        $result = $this->kriteria->update($data, $id);

        if ($result) {
          $this->session->set_flashdata('alt', 'success');
          $this->session->set_flashdata('msg', 'Success!');
        } else {
          $this->session->set_flashdata('alt', 'danger');
          $this->session->set_flashdata('msg', 'Gagal!');
        }

        redirect('kriteria', 'refresh');
      }
    }

    $data = [
      'root' => 'kriteria',
      'title' => 'Edit Kriteria',
      'page' => 'kriteria_edit',
      'result' => $this->kriteria->getById($id)
    ];

    $this->load->view('page', $data);
  }

  public function delete($id)
  {
    $result = $this->kriteria->delete($id);

    if ($result) {
      $this->session->set_flashdata('alt', 'success');
      $this->session->set_flashdata('msg', 'Success!');
    } else {
      $this->session->set_flashdata('alt', 'danger');
      $this->session->set_flashdata('msg', 'Gagal!');
    }

    redirect('kriteria', 'refresh');
  }
}


/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */