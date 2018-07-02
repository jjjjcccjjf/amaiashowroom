<?php

class Feedback_model extends Crud_model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'feedback'; # change this to the model's corresponding table

  }

  /**
  * check if existing via timestamp
  * @param  [type] $timestamp [description]
  * @return [type]            [description]
  */
  public function checkTsExists($timestamp)
  {
    return $this->db->get_where($this->table, ['timestamp' => $timestamp])->row();
  }

  public function deleteByTimestamp($timestamp)
  {
    $this->db->where('timestamp', $timestamp);
    return $this->db->delete($this->table);
  }

}
