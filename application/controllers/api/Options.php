<?php

class Options extends \Restserver\Libraries\REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('api/options_model', 'options_model');
  }

  public function index_get()
  {
    $this->all_get();
  }

  public function all_get()
  {
    $res = $this->options_model->all();
    $this->response($res, 200);
  }

}
