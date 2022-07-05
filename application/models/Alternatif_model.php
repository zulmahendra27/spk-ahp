<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Alternatif_model
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

class Alternatif_model extends CI_Model
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
    return $this->db->get('alternatif')->result();
  }

  public function getById($id)
  {
    return $this->db->get_where('alternatif', ['id_alternatif' => $id])->result();
  }

  public function insert($data)
  {
    return $this->db->insert('alternatif', $data);
  }

  public function update($data, $id)
  {
    return $this->db->update('alternatif', $data, ['id_alternatif' => $id]);
  }

  public function delete($id)
  {
    return $this->db->delete('alternatif', ['id_alternatif' => $id]);
  }

  // ------------------------------------------------------------------------

}

/* End of file Alternatif_model.php */
/* Location: ./application/models/Alternatif_model.php */