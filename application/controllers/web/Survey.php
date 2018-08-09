<?php

class Survey extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('feedback_model');

        
    }

    public function index()
    {
        $token = $this->input->get('token');

        //get feedback object by token
        $feedback = $this->feedback_model->getByToken($token);
        // check if survey is empty
        if(!$this->feedback_model->hasSurvey($feedback->id)){
            //
        
        }else{
            die('you have already taken the survey!');
        }


    }
}