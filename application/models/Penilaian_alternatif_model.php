<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Penilaian_alternatif_model
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

class Penilaian_alternatif_model extends CI_Model
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
    return $this->db->get('penilaian_alternatif')->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file Penilaian_alternatif_model.php */
/* Location: ./application/models/Penilaian_alternatif_model.php */