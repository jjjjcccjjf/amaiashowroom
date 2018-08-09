<?php

class Options extends \Restserver\Libraries\REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('options_model');
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

  public function password_post()
  {
    # check to see if the send plaintext password matches our password
    if ($this->input->post('password') === getenv('API_ADMIN_PASSWORD')) {
      $this->response(['message' => 'Password matched', 'code' => 'password_matched'], 200);
    } else {
      $this->response(['message' => 'Password mismatch', 'code' => 'password_mismatch'], 200);
    }
  }

}
