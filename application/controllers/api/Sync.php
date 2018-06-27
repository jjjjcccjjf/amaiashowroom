<?php

class Sync extends \Restserver\Libraries\REST_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('api/feedback_model', 'feedback_model');
    $this->load->model('api/personal_information_model', 'personal_information_model');
    $this->load->model('api/survey_model', 'survey_model');
    $this->load->model('api/sync_model', 'sync_model');
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
      $res = $this->sync_model->add($data);
      $this->response($res, 201);
    }
  }

}
