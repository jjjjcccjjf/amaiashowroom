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

  public function registrations()
  {

    $from_date = $this->input->get('from_date') ?: $this->feedback_model->getByCreatedAt('first');
    $to_date =  $this->input->get('to_date') ?: $this->feedback_model->getByCreatedAt('last');

    $months = $this->reports_model->getRegistrationMonths($from_date, $to_date);
    $series = $this->reports_model->getRegistrationSeries($from_date, $to_date);

    $data['from_date'] = date('Y-m', strtotime($from_date));
    $data['to_date'] = date('Y-m', strtotime($to_date));

    $data['months_json'] = json_encode($months);
    $data['series_json'] = json_encode($series);

    $this->wrapper('cms/registrations', $data);
  }

  public function registrations_by_showroom()
  {
    // $this->wrapper('cms/registrations_date_range');
  }


}
