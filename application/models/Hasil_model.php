<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Hasil_model
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

class Hasil_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getPVKriteria()
  {
    // $this->db->select('COUNT(id_pvk) as jumlah_pvk');
    return $this->db->get('prioritas_kriteria')->result();
  }

  public function getPVAlternatif()
  {
    return $this->db->get('prioritas_alternatif')->result();
  }

  public function getCountAlternatif()
  {
    $this->db->select('COUNT(DISTINCT(id_kriteria)) as jumlah_pva');
    return $this->db->get('prioritas_alternatif')->row();
  }

  // ------------------------------------------------------------------------

}

/* End of file Hasil_model.php */
/* Location: ./application/models/Hasil_model.php */