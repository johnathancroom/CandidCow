<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Entries extends MY_Controller {

  function __construct() {
    parent::__construct();

    $this->load->model('entries_model');
    $this->load->helper('url');
  }

  function index() {
    $data['entries'] = $this->entries_model->get();

    $this->_render('index', $data);
  }

  function create() {
    $post = $this->input->post(NULL, TRUE);

    if($post)
    {
      if($this->entries_model->insert($post))
      {
        $this->session->set_flashdata('notice', 'Entry successfully created.');
        redirect('admin/entries');
      }
    }

    $this->load->helper(array('form', 'form_builder'));
    $data['form'] = $this->_render('_form', NULL, FALSE);
    $this->_render('create', $data);
  }

}