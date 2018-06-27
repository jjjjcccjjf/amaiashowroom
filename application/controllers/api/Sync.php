<?php

class Sync extends \Restserver\Libraries\REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('feedback_model');
    $this->load->model('personal_information_model');
    $this->load->model('survey_model');
    $this->load->model('sync_model');
  }

  public function index_get()
  {

  }

  public function index_post()
  {
    $data = json_decode($this->input->raw_input_stream); # We're getting from a raw post data

    # Check if the timestamp exists in the feedback table
    if($this->feedback_model->checkTsExists($data->meta->timestamp) && false){
      # if timestamp exists in the database
      # update
    } else {
      $last_id = $this->sync_model->add($data);
      $res = $this->feedback_model->get($last_id);
      $this->response($res, 201);
    }
  }

}
