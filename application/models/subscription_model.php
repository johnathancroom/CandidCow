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

  function insert($email)
  {
    $exists = $this->get($email);

    if(empty($exists))
    {
      return $this->db->insert('subscriptions', array(
        'email' => $email,
        'created_at' => date('Y-m-d H:i:s')
      ));
    }
    else
    {
      # Resubscribe
      if(!$exists['active'])
      {
        return $this->db->where('email', $email)->update('subscriptions', array('active' => 1));
      }

      # Don’t show error on duplicate email entry
      return true;
    }
  }

  function unsubscribe($email)
  {
    return $this->db->where('email', $email)->update('subscriptions', array('active' => 0));
  }
}