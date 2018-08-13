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
    $data = json_decode(file_get_contents('php://input')); # We're getting from a raw post data

    log_message('error', file_get_contents('php://input')); # For debugging purposes

    unset($data->personal_information->other_information->purpose_of_visit_buyer);
    unset($data->personal_information->other_information->purpose_of_visit_non_buyer);
    unset($data->personal_information->other_information->source);
    unset($data->personal_information->other_information->budget);
    unset($data->personal_information->other_information->primary_interest);
    unset($data->personal_information->other_information->secondary_interest);
    unset($data->personal_information->other_information->primary_amenities);
    unset($data->personal_information->other_information->secondary_amenities);

    # Check if the timestamp exists in the feedback table
    # Replace it if it exists
    if($this->feedback_model->checkTsExists($data->meta->timestamp)){
      $this->feedback_model->deleteByTimestamp($data->meta->timestamp);
    }
    $last_id = $this->sync_model->add($data);
    $res = $this->feedback_model->get($last_id);
    $this->response($res, 201);
  }

}
