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
    $this->load->model('reports_model');

  }

  public function index()
  {

  }

  public function registrations($start_date = null, $end_date = null)
  {

    $start_date = $start_date ?: $this->feedback_model->getByCreatedAt('first');
    $end_date =  $end_date ?: $this->feedback_model->getByCreatedAt('last');

    $months = $this->reports_model->getRegistrationMonths($start_date, $end_date);
    $series = $this->reports_model->getRegistrationSeries($start_date, $end_date);

    $data['months_json'] = json_encode($months);
    $data['series_json'] = json_encode($series);

    $this->wrapper('cms/registrations_date_range', $data);
  }

  public function registrations_by_showroom()
  {
    // $this->wrapper('cms/registrations_date_range');
  }


}
