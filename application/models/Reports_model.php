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
   * @param  [type] $from_date Y-m-d string
   * @param  [type] $to_date   Y-m-d string
   * @return [type]             [description]
   */
  public function getRegistrationMonths($from_date, $to_date)
  {
    $start    = (new DateTime($from_date))->modify('first day of this month');
    $end      = (new DateTime($to_date))->modify('first day of next month');
    $interval = DateInterval::createFromDateString('1 month');
    $period   = new DatePeriod($start, $interval, $end);

    $months = [];
    foreach ($period as $dt) {
      $months[] = $dt->format("Y-M");
    }

    return $months;
  }

  public function getRegistrationSeries($from_date, $to_date)
  {
    /**/$showrooms = $this->feedback_model->getShowrooms();

    /**/$months = $this->reports_model->getRegistrationMonths($from_date, $to_date);

    /**/$series = [];

    foreach ($showrooms as $key => $value) {
      $series[] = (object) [
        'name' => $value->showroom,
        'data' => []
      ];
    }

    $feedbacks = $this->feedback_model->all();

    foreach ($months as $ymkey => $ym) { # check each month
      foreach ($showrooms as $skey => $s) {
        $temp = 0;
        $fs = $this->db->get_where('feedback', ['showroom' => $s->showroom])->result();
        foreach ($fs as $key => $ss) { # here increment our count
          if (date('Y-M', strtotime($ss->created_at)) == $ym) {
            $temp++;
          }
        }

        foreach ($series as $series_k => $series_v) {
          if($series_v->name == $s->showroom) { # here we set the data
            $series[$series_k]->data[] = $temp;
            break; # we break coz we only need to set this once
          }
        }

        # praise the synchronous PHP gods, oh lord, this will be
        # so difficult in javascript
      }
    }

    return $series;
  }

}
