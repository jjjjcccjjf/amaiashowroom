<?php

class Reports_model extends Crud_model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'crud';
    $this->load->model('feedback_model');
  }

  /**
   * [getRegistrationMonths description]
   * @param  [type] $start_date Y-m-d string
   * @param  [type] $end_date   Y-m-d string
   * @return [type]             [description]
   */
  public function getRegistrationMonths($start_date, $end_date)
  {
    $start    = (new DateTime($start_date))->modify('first day of this month');
    $end      = (new DateTime($end_date))->modify('first day of next month');
    $interval = DateInterval::createFromDateString('1 month');
    $period   = new DatePeriod($start, $interval, $end);

    $months = [];
    foreach ($period as $dt) {
      $months[] = $dt->format("Y-M");
    }

    return $months;
  }

}
