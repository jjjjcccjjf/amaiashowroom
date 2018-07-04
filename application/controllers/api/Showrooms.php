<?php

class Showrooms extends \Restserver\Libraries\REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('options_model');
  }

  public function index_get()
  {
    $res = $this->options_model->getAllProjects();
    $this->response($res, 200);
  }

}
