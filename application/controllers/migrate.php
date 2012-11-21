<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends MY_Controller {

  function index()
  {
    $this->load->library('migration');

    if(!$this->migration->current())
    {
      show_error($this->migration->error_string());
    }
  }

}