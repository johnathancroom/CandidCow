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

    $this->load->helper(array('form', 'form_builder'));
    $this->_render('index');
  }

}