<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Admin_core_controller {

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

  }

  public function registrations_by_date_range()
  {
    $this->wrapper('cms/registrations_date_range');
  }

  public function registrations_by_showroom()
  {
    // $this->wrapper('cms/registrations_date_range');
  }


}
