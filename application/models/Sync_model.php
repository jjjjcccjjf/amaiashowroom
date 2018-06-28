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

  # Calls 'full' by default
  public function get($id, $function = 'full')
  {
    return $this->$function($id);
  }

  # Returns all rows on the same level
  public function full($id)
  {
    $res = $this->db->query("
    SELECT * FROM feedback
    LEFT JOIN personal_information ON feedback.personal_information_id = personal_information.id
    LEFT JOIN survey ON feedback.survey_id = survey.id
    WHERE feedback.id = {$id}
    ORDER BY feedback.id DESC")->row();

    $res->timestamp_f = date("F j, Y, g:i a", $res->timestamp);

    return $res;
  }

  # Returns an formatted version
  public function obj($id)
  {
    $feedback = $this->db->get_where('feedback', ['id' => $id])->row();

    $res = (object) [
      'personal_information' => $this->personal_information_model->getPersonalInformation($feedback->personal_information_id),
      'other_information' => $this->explodeValues($this->personal_information_model->getOtherInformation($feedback->personal_information_id))
    ];

    # Survey block
    $survey = @$this->nestSurvey($this->explodeValues($this->survey_model->get($feedback->survey_id)));
    if ($survey) {
      $res->survey = $survey;
    }
    # / Survey block

    return $res;
  }

  public function explodeValues($arr)
  {
    # We format other information for appended shits
    $exploded_arr = [];
    if ($arr) {
      foreach ($arr as $key => $value) {
        # Explode if string contains pipe symbol
        $exploded_arr[$key] = (strpos($value, '|') !== false) ? explode('|', $value) : $value;
      }
    }

    return $exploded_arr;
  }

  public function nestSurvey($arr)
  {
    $buying_experience = [];
    $site_visit_experience = [];
    $showroom_sales_office_model_unit = [];
    $product = [];
    $home_buying_decision = [];

    $survey= []; # Init

    if ($arr) {
      foreach($arr as $key => $value) {
        if(preg_match('/^be_/', $key)) {
          $buying_experience[$key] = $value;
        } elseif (preg_match('/^sve_/', $key)) {
          $site_visit_experience[$key] = $value;
        } elseif (preg_match('/^ssomu_/', $key)) {
          $showroom_sales_office_model_unit[$key] = $value;
        } elseif (preg_match('/^p_/', $key)) {
          $product[$key] = $value;
        } elseif (preg_match('/^hbd_/', $key)) {
          $home_buying_decision[$key] = $value;
        }
      }

      $survey = (object) [
        'buying_experience' => $buying_experience,
        'site_visit_experience' => $site_visit_experience,
        'showroom_sales_office_model_unit' => $showroom_sales_office_model_unit,
        'product' => $product,
        'home_buying_decision' => $home_buying_decision
      ];
    }


    return $survey;
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
