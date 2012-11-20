<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Archives extends MY_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('entries_model');
  }

  function index()
  {
    $data['entries'] = $this->entries_model->get();
    $this->_render('index', $data);
  }

  function show($id = NULL)
  {
    if(isset($id))
    {
      $data['display_entry'] = $this->entries_model->get($id);

      if(!empty($data['display_entry']))
      {
        $this->_render('home/index', $data, TRUE, FALSE);
      }
      else
      {
        show_404();
      }
    }
    else
    {
      show_404();
    }
  }

}