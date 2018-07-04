<?php

class Personal_information_model extends Crud_model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'personal_information';

    $this->load->model('sync_model');
  }

  public function getPersonalInformation($id)
  {
    $fields = ['name',
    'gender',
    'age',
    'civil_status',
    'occupation',
    'current_residence',
    'work_location',
    'email_address',
    'mobile_number',
    'how_many_guests'];

    $select_str = implode(', ', $fields);
    return $this->getSpFields($id, $select_str);
  }

  public function getOtherInformation($id)
  {
    $fields = ['is_current_buyer',
    'purpose_of_visit_buyer',
    'purpose_of_visit_non_buyer',
    'source',
    'budget',
    'primary_interest',
    'secondary_interest',
    'primary_amenities',
    'secondary_amenities'];

    $select_str = implode(', ', $fields);
    return $this->getSpFields($id, $select_str);
  }


  /**
  * get specified fields
  * @param  [type] $select_str [description]
  * @return [type]             [description]
  */
  function getSpFields($id, $select_str)
  {
    $this->db->select($select_str);
    return $this->db->get_where($this->table, ['id' => $id])->row();
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

  /**
   * unpack nested arrays(strings) into one big redundant array
   * @param  [type] $projects [description]
   * @return [type]           [description]
   */
  public function spreadArray($projects)
  {
    $res = [];

    foreach ($projects as $key => $value) {
      $value = (strpos($value, '|') !== false) ? explode('|', $value) : $value;
      if (is_array($value)) {
        $res = array_merge($value, $res);
      } else {
        $res[] = $value;
      }
    }

    return $res;
  }

  public function getTableField($field)
  {
    $this->db->select($field);
    $rows = $this->db->get($this->table)->result();
    $res = [];
    foreach ($rows as $key => $value) {
      $res[] = $value->$field;
    }

    return $res;
  }

  public function createInterestsObject($projects, $interests, $label)
  {
    $res = (object) [
      'name' => $label,
      'data' => []
    ];

    foreach ($projects as $k_pr => $project) {
      $temp = 0;
      foreach ($interests as $k_in => $interest) {
        if ($interest == $project) {
          $temp++;
        }
      }

      $res->data[] = $temp;
    }

    return $res;
  }

}
