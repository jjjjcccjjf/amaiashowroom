<?php

class Thankyou extends \Restserver\Libraries\REST_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index_get()
  {
    $ty = $this->db->from('thankyou')->limit(1)->get()->row();
    $response = [
        'heading' => $ty->heading,
        'body' => $ty->content
    ];
    $this->response($response,200);
  }
}