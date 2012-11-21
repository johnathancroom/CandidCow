<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscription extends MY_Controller {

  function index()
  {
    $this->load->helper(array('form', 'form_builder'));
    $this->_render('index');
  }

}