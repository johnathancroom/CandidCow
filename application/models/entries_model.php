<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Entries_model extends CI_Model {

  function __construct() {
    $this->load->database();
  }

  function get($id = null) {
    if(isset($id))
    {
      return $this->db->get_where('entries', array('id' => $id))->row_array();
    }
    else
    {
      return $this->db->get('entries')->result_array();
    }
  }

  function insert($array) {
    if($this->croomy_auth->is_logged_in())
    {
      return $this->db->insert('entries', array(
        'date' => $array['date_year'] . $array['date_month'] . $array['date_day'],
        'html' => $array['html'],
        'css' => $array['css'],
        'user_id' => $this->croomy_auth->get_user_id()
      ));
    }
    else
    {
      show_404();
    }
  }

}