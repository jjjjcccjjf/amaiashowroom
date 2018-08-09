<?php

class Survey_model extends Crud_model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'survey';

  }


  public function add($data)
  {
    $other_arr = array_merge(
      (array) $data->buying_experience,
      (array) $data->site_visit_experience,
      (array) $data->showroom_sales_office_model_unit,
      (array) $data->product
    );

    $home_buying_decision_arr = [];
    foreach ($data->home_buying_decision as $key => $value) {
      # implode the variable with pipe symbol | if it is an array
      $home_buying_decision_arr[$key] = is_array($value) ? implode('|', $value) : $value;
    }

    $data = array_merge($other_arr, $home_buying_decision_arr);

    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }


}
