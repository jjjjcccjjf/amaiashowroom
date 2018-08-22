
<?php

class Token extends \Restserver\Libraries\REST_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('feedback_model');
    $this->load->model('personal_information_model');
  }

  public function check_get()
  {
    $token = $this->input->get('t');
    
    $feedback = $this->feedback_model->getByToken($token);
      if($token == null || $feedback == null){
        $this->response(['message' => 'unknown token'], 400);
        die();
      }
    if($this->feedback_model->hasSurvey($feedback->id)){
        $this->response(['message' => 'user has already taken the survey'], 400);
        die();
    }
    
    $personalinfo = $this->personal_information_model->getPersonalInformation($feedback->personal_information_id);
    
    $fields = ['is_current_buyer',
    'purpose_of_visit_buyer',
    'purpose_of_visit_non_buyer',
    'source',
    'budget',
    'primary_interest',
    'secondary_interest',
    'primary_amenities',
    'secondary_amenities'];

    $res = [
      'personal_information' => [
        'personal_information' => []
      ]
    ];
    foreach($personalinfo as $field=>$val){
      if(!in_array($field,$fields)){
        $res['personal_information']['personal_information'][$field] = $val;
      }else{
        $res['personal_information']['other_information'][$field] = $val;
      }
    }

    $metafields = ['timestamp','showroom'];
    foreach($feedback as $field=>$val){
      if(in_array($field,$metafields)){
        $res['meta'][$field] = $val;
      }
    }

    $this->response($res, 200);
  }

}
