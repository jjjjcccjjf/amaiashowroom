<?php

class Reports extends \Restserver\Libraries\REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('feedback_model');
    $this->load->model('survey_model');
    $this->load->model('personal_information_model');
    $this->load->model('reports_model');
  }

  public function index_get()
  {
  }

  public function registration_months_get()
  {
    $start_date = $this->feedback_model->getByCreatedAt('first');
    $end_date = $this->feedback_model->getByCreatedAt('last');
    $res = $this->reports_model->getRegistrationMonths($start_date, $end_date);
    $this->response($res, 200);
  }

  public function password_post()
  {
    # check to see if the sent plaintext password matches our password
    if ($this->input->post('password') === getenv('API_ADMIN_PASSWORD')) {
      $this->response(['message' => 'Password matched', 'code' => 'password_matched'], 200);
    } else {
      $this->response(['message' => 'Password mismatch', 'code' => 'password_mismatch'], 200);
    }
  }

}
