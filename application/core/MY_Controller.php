<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  function _render($view, $data = array()) {
    $this->load->helper('url');
    $this->load->library('template');

    # Get user information
    if($this->croomy_auth->is_logged_in())
    {
      $data['user'] = $this->croomy_auth->get_user_array();
    }

    # Get flashdata information
    $data['flashdata'] = array(
      'error' => $this->session->flashdata('error'),
      'alert' => $this->session->flashdata('alert'),
      'notice' => $this->session->flashdata('notice')
    );

    $this->template->build($this->router->fetch_class() . '/' . $view, $data);
  }

  function _require_login() {
    $this->load->helper('url');

    if(!$this->croomy_auth->is_logged_in())
    {
      $this->session->set_flashdata('error', 'You must be logged in to view that page.');
      redirect('auth/login');
    }
  }
}