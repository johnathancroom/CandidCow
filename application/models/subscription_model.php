<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscription_model extends CI_Model {
  function __construct() {
    $this->load->database();
  }

  function get($email = NULL)
  {
    if(isset($email))
    {
      return $this->db->get_where('subscriptions', array('email' => $email))->row_array();
    }
    else
    {
      return $this->db->get('subscriptions')->result_array();
    }
  }

  function insert($array)
  {
    $email = $this->get($array['email']);

    if(empty($email))
    {
      return $this->db->insert('subscriptions', array(
        'email' => $array['email'],
        'created_at' => date('Y-m-d H:i:s')
      ));
    }
    else
    {
      # Don’t show error on duplicate email entry
      return true;
    }
  }
}