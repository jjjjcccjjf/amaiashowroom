
<?php

class Token extends \Restserver\Libraries\REST_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('feedback_model');
  }

  public function check_get()
  {
    $token = $this->input->get('t');
    if($token == null){
      die('token not defined');
    }
    $feedback = $this->feedback_model->getByToken($token);
    if($this->feedback_model->hasSurvey($feedback->id)){
      die('true');
    }
    die('false');
  }

}
