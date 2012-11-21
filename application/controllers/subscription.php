<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscription extends MY_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('subscription_model');
    $this->load->helper(array('url', 'form', 'form_builder'));
  }

  function index()
  {
    $post = $this->input->post(NULL, TRUE);

    if($post)
    {
      if($this->subscription_model->insert($post['email']))
      {
        $this->session->set_flashdata('success', 'Thanks so much for subscribing to the daily email!');

        # Follow up email for good measure
        $this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'croomy_auth'), $this->config->item('website_name', 'croomy_auth'));
        $this->email->reply_to($this->config->item('webmaster_email', 'croomy_auth'), $this->config->item('website_name', 'croomy_auth'));
        $this->email->to($post['email']);
        $this->email->subject('Thanks for Subscribing');
        $this->email->message($this->load->view('email/subscription/hello', NULL, TRUE));
        $this->email->send();
      }
      else
      {
        $this->session->set_flashdata('error', 'There was an error subscribing you. Please try again.');
      }

      redirect($this->uri->uri_string());
    }

    $data['form'] = $this->_render('_form', NULL, FALSE);
    $this->_render('index', $data);
  }

  function cancel()
  {
    $post = $this->input->post(NULL, TRUE);

    if($post)
    {
      if($this->subscription_model->unsubscribe($post['email']))
      {
        $this->session->set_flashdata('success', 'You have been unsubscribed from future emails. See ya!');
      }
      else
      {
        $this->session->set_flashdata('error', 'Something went wrong. Please try again');
      }

      redirect($this->uri->uri_string());
    }

    $data['form'] = $this->_render('_form', NULL, FALSE);
    $this->_render('cancel', $data);
  }

}