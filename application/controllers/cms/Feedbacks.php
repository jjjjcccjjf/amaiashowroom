<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedbacks extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('feedback_model');
    $this->load->model('personal_information_model');
    $this->load->model('survey_model');
    $this->load->model('sync_model');
  }

  public function index()
  {
    $res = $this->sync_model->all();
    $data['res'] = $res;
    $this->wrapper('cms/feedbacks', $data);
  }

  /**
   * single page for feedback
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function single($id)
  {
    $res = $this->sync_model->get($id, 'obj'); # Calls a different version of get
    $data['res'] = $res;
    $this->wrapper('cms/single_feedback', $data);
  }


}
