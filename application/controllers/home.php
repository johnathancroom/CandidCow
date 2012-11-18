<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

  function index()
  {
    $this->load->model('entries_model');

    $data['display_entry'] = $this->entries_model->today();
    $this->_render('index', $data);
  }

}