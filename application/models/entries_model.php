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
      $entries = $this->db->order_by('date DESC')->get('entries')->result_array();
      foreach($entries as &$entry)
      {
        $entry = $this->_post_retrieve($entry);
      }
      return $entries;
    }
  }

  function archives() {
    $entries = $this->db->order_by('date DESC')->get_where('entries', array('date <=' => date('Y-m-d')))->result_array();
    foreach($entries as &$entry)
    {
      $entry = $this->_post_retrieve($entry);
    }
    return $entries;
  }

  function today() {
    $entry = $this->db->get_where('entries', array('date' => date('Y-m-d')))->row_array();
    $entry = $this->_post_retrieve($entry);

    return $entry;
  }

  function logo_color() {
    $logo_colors = array('#e35858', '#52a594', '#7870c3', '#528e4c', '#f29632', '#588e96', '#b26592');
    $number_of_entries = $this->db->where(array('date <=' => date('Y-m-d')))->from('entries')->count_all_results();

    return $logo_colors[$number_of_entries % 7];
  }

  function new_entry_date()
  {
    $last_entry = $this->db->order_by('date DESC')->limit(1)->get('entries')->row_array();

    return strtotime($last_entry['date'])+3600*24;
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
    if(isset($entry['date']))
    {
      $explode = explode('-', $entry['date']);
      $entry['date_pieces'] = array(
        'year' => $explode[0],
        'month' => $explode[1],
        'day' => $explode[2]
      );
    }

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