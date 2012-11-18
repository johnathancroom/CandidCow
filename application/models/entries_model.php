<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Entries_model extends CI_Model {

  function __construct() {
    $this->load->database();
  }

  function get($id = null) {
    if(isset($id))
    {
      $entry = $this->db->get_where('entries', array('id' => $id))->row_array();
      $entry = $this->_post_retrieve($entry);

      return $entry;
    }
    else
    {
      $entries = $this->db->get('entries')->result_array();
      foreach($entries as &$entry)
      {
        $entry = $this->_post_retrieve($entry);
      }
      return $entries;
    }
  }

  function insert($array) {
    if($this->croomy_auth->is_logged_in())
    {
      return $this->db->insert('entries', $this->_prepare_columns($array));
    }
    else
    {
      show_404();
    }
  }

  function update($id, $array) {
    if($this->croomy_auth->is_logged_in())
    {
      return $this->db->where('id', $id)->update('entries', $this->_prepare_columns($array));
    }
    else
    {
      show_404();
    }
  }

  function delete($id) {
    if($this->croomy_auth->is_logged_in())
    {
      return $this->db->delete('entries', array('id' => $id));
    }
    else
    {
      show_404();
    }
  }

  function _post_retrieve($entry) {
    $explode = explode('-', $entry['date']);
    $entry['date_pieces'] = array(
      'year' => $explode[0],
      'month' => $explode[1],
      'day' => $explode[2]
    );

    return $entry;
  }

  function _prepare_columns($array) {
    return array(
      'date' => $array['date_year'] . '-' . $array['date_month'] . '-' . $array['date_day'],
      'html' => $array['html'],
      'css' => $array['css'],
      'user_id' => $this->croomy_auth->get_user_id()
    );
  }

}