<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Entries extends MY_Controller {

  function __construct() {
    parent::__construct();
    $this->_require_login();

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
        $this->session->set_flashdata('success', 'Entry successfully created.');
        redirect('entries');
      }
    }

    $this->load->helper(array('form', 'form_builder'));
    $data['form'] = $this->_render('_form', array('new_entry_date' => $this->entries_model->new_entry_date()), FALSE);
    $this->_render('create', $data);
  }

  function edit($id = NULL) {
    if(isset($id))
    {
      if($post = $this->input->post(NULL, TRUE))
      {
        if($this->entries_model->update($id, $post))
        {
          $this->session->set_flashdata('success', 'Entry successfully saved.');
          redirect('entries');
        }
      }

      $entry = $this->entries_model->get($id);
      if(empty($entry))
      {
        show_404();
      }

      $this->load->helper(array('form', 'form_builder'));
      $data['form'] = $this->_render('_form', array('entry' => $entry), FALSE);
      $this->_render('edit', $data);
    }
    else
    {
      show_404();
    }
  }

  function preview($id = NULL) {
    if(isset($id))
    {
      $data['display_entry'] = $this->entries_model->get($id);
      if(empty($data['display_entry']))
      {
        show_404();
      }

      $this->_render('home/index', $data, TRUE, FALSE);
    }
    else
    {
      show_404();
    }
  }

  function delete($id = NULL) {
    if(isset($id))
    {
      if($post = $this->input->post(NULL, TRUE))
      {
        if($this->entries_model->delete($id))
        {
          $this->session->set_flashdata('success', 'Entry successfully deleted.');
          redirect('entries');
        }
      }

      $entry = $this->entries_model->get($id);
      if(empty($entry))
      {
        show_404();
      }

      $this->load->helper(array('form', 'form_builder'));
      $this->_render('delete', array('entry' => $entry));
    }
    else
    {
      show_404();
    }
  }

}