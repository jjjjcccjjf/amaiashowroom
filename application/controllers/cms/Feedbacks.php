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

    $this->per_page = $this->input->get('per_page') ?: 10;
    $this->page = $this->input->get('page') ?: 1;
    $this->from_page = $this->input->get('from_page') ?: 1;
  }

  public function index()
  {

    $from_date = $this->input->get('from_date') ? $this->input->get('from_date') : null;
    $to_date =  $this->input->get('to_date') ? $this->input->get('to_date') : null;
    $showroom = $this->input->get('showroom');

    $res = $this->sync_model->allF($from_date, $to_date, $showroom);

    $data['from_date'] = $from_date ?: null;
    $data['to_date'] = $to_date ?: null;

    $data['per_page'] = $this->per_page;
    $data['page'] = $this->page;

    $data['showroom'] = $showroom;
    $data['unique_showrooms'] = $this->feedback_model->getShowrooms();
    $data['res'] = $res;


    $data['total_pages'] = ceil(count($res = $this->sync_model->allF($from_date, $to_date, $showroom, false)) / $this->per_page);
    $data['counter'] = count($res) - (($this->page - 1)  * $this->per_page); # For counting down our table

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

    $data['per_page'] = $this->per_page;
    $data['page'] = $this->page;
    $data['from_page'] = $this->from_page;

    $data['showroom'] = $this->input->get('showroom');
    $data['from_date'] = $this->input->get('from_date');
    $data['to_date'] = $this->input->get('to_date');

    $data['res'] = $res;
    $data['questions'] = $this->sync_model->questions;
    $this->wrapper('cms/single_feedback', $data);
  }


}
