<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  function _render($view, $data = array(), $layout = TRUE, $auto_find = TRUE) {
    $this->load->helper('url');
    $this->load->library('template');
    $this->load->model('entries_model');

    # Get user information
    if($this->croomy_auth->is_logged_in())
    {
      $data['user'] = $this->croomy_auth->get_user_array();
    }

    # Get flashdata information
    $data['flashdata'] = array(
      'error' => $this->session->flashdata('error'),
      'alert' => $this->session->flashdata('alert'),
      'notice' => $this->session->flashdata('notice'),
      'success' => $this->session->flashdata('success')
    );

    # Get logo color
    $data['logo_color'] = $this->entries_model->logo_color();

    if($layout)
    {
      if($auto_find)
      {
        return $this->template->build($this->router->fetch_directory() . $this->router->fetch_class() . '/' . $view, $data);
      }
      else
      {
        return $this->template->build($view, $data);
      }
    }
    else
    {
      if($auto_find)
      {
        return $this->template->load_view($this->router->fetch_directory() . $this->router->fetch_class() . '/' . $view, $data);
      }
      else
      {
        return $this->template->load_view($view, $data);
      }
    }
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