<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscription extends MY_Controller {

  function index()
  {
    $this->load->helper('url');
    $this->load->model('subscription_model');

    $post = $this->input->post(NULL, TRUE);

    if($post)
    {
      if($this->subscription_model->insert($post))
      {
        $this->session->set_flashdata('success', 'Thanks so much for subscribing to the daily email!');
      }
      else
      {
        $this->session->set_flashdata('error', 'There was an error subscribing you. Please try again.');
      }

      redirect($this->uri->uri_string());
    }

    $this->load->helper(array('form', 'form_builder'));
    $this->_render('index');
  }

}