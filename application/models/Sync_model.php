<?php

class Sync_model extends Crud_model
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('feedback_model', 'feedback_model');
    $this->load->model('personal_information_model', 'personal_information_model');
    $this->load->model('survey_model', 'survey_model');
  }

  public function all()
  {
    $query_result = $this->db->query('
    SELECT * FROM feedback
    LEFT JOIN personal_information ON feedback.personal_information_id = personal_information.id
    LEFT JOIN survey ON feedback.survey_id = survey.id
    ORDER BY feedback.id DESC')->result();

    $res = [];
    # Format our whole result
    foreach ($query_result as $key => $value) {
      $value->timestamp_f = date("F j, Y, g:i a", $value->timestamp);
      $res[] =  $value;
    }

    return $res;
  }

  public function add($data)
  {
    # insert to personal_information and to survey first
    $personal_information_id = $this->personal_information_model->add($data->personal_information);
    $survey_id = $this->survey_model->add($data->survey);

    # then try to add to feedback table
    return $this->feedback_model->add([
      'timestamp' => $data->meta->timestamp,
      'personal_information_id' => $personal_information_id,
      'survey_id' => $survey_id,
      'showroom' => $data->meta->showroom
    ]);
  }

}
