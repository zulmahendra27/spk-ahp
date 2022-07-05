<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Kriteria_model
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

class Kriteria_model extends CI_Model
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
    return $this->db->get('kriteria')->result();
  }

  public function getById($id)
  {
    return $this->db->get_where('kriteria', ['id_kriteria' => $id])->result();
  }

  public function insert($data)
  {
    return $this->db->insert('kriteria', $data);
  }

  public function update($data, $id)
  {
    return $this->db->update('kriteria', $data, ['id_kriteria' => $id]);
  }

  public function delete($id)
  {
    return $this->db->delete('kriteria', ['id_kriteria' => $id]);
  }

  // ------------------------------------------------------------------------

}

/* End of file Kriteria_model.php */
/* Location: ./application/models/Kriteria_model.php */