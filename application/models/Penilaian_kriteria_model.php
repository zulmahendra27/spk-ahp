<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Penilaian_kriteria_model
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

class Penilaian_kriteria_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getAll()
  {
    return $this->db->get('penilaian_kriteria')->result();
  }

  public function insert($data)
  {
    $this->db->query('TRUNCATE TABLE penilaian_kriteria');
    return $this->db->insert_batch('penilaian_kriteria', $data);
  }

  public function update($data)
  {
    return $this->db->update_batch('penilaian_kriteria', $data, ['kriteria1', 'kriteria2']);
  }

  // ------------------------------------------------------------------------

}

/* End of file Penilaian_kriteria_model.php */
/* Location: ./application/models/Penilaian_kriteria_model.php */