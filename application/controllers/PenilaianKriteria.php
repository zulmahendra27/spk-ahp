<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller PenilaianKriteria
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

class PenilaianKriteria extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kriteria_model', 'kriteria');
  }

  public function index()
  {
    $data = [
      'root' => 'penilaian',
      'title' => 'Penilaian Kriteria',
      'page' => 'penilaian_kriteria',
      'result' => $this->kriteria->getAll()
    ];

    $this->load->view('page', $data);
  }
}


/* End of file PenilaianKriteria.php */
/* Location: ./application/controllers/PenilaianKriteria.php */