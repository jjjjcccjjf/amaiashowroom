<?php

class Showrooms extends \Restserver\Libraries\REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('api/options_model', 'options_model');
  }

  public function index_get()
  {
    $showrooms = [];
    $showrooms[] = $this->options_model->getProjects('house_and_lot');
    $showrooms[] = $this->options_model->getProjects('low_rise');
    $showrooms[] = $this->options_model->getProjects('high_rise');

    $res = array_merge(...$showrooms); # array unpack operator
    $res = array_unique($res);
    sort($res);
    $this->response($res, 200);
  }

}
