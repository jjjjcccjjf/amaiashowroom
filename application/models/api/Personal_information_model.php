<?php

class Personal_information_model extends Crud_model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'personal_information';

  }

  public function add($data)
  {
    $personal_information_arr = (array) $data->personal_information;

    $other_information_arr = [];
    foreach ($data->other_information as $key => $value) {
      # implode the variable with pipe symbol | if it is an array
      $other_information_arr[$key] = is_array($value) ? implode('|', $value) : $value;
    }

    $data = array_merge($personal_information_arr, $other_information_arr);
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

}
