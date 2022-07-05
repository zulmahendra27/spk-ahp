<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Penilaian_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Penilaian_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getAllKriteria()
  {
    return $this->db->get('penilaian_kriteria')->result();
  }

  public function getAllAlternatif($id_kriteria)
  {
    return $this->db->get_where('penilaian_alternatif', ['id_kriteria' => $id_kriteria])->result();
  }

  public function getRI($n)
  {
    return $this->db->get_where('ri', ['jumlah' => $n])->row();
  }

  public function insertKriteria($data)
  {
    $this->db->query('TRUNCATE TABLE penilaian_kriteria');
    return $this->db->insert_batch('penilaian_kriteria', $data);
  }

  public function insertAlternatif($data, $id_kriteria)
  {
    $this->db->delete('penilaian_alternatif', ['id_kriteria' => $id_kriteria]);
    return $this->db->insert_batch('penilaian_alternatif', $data);
  }

  // ------------------------------------------------------------------------

}

/* End of file Penilaian_model.php */
/* Location: ./application/models/Penilaian_model.php */