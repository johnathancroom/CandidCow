<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

  function index()
  {
    $this->_render('index');
  }

}