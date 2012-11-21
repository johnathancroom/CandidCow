<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscription extends MY_Controller {

  function index()
  {
    $this->load->model('subscription_model');

    $post = $this->input->post(NULL, TRUE);

    if($post)
    {

    }

    $this->load->helper(array('form', 'form_builder'));
    $this->_render('index');
  }

}