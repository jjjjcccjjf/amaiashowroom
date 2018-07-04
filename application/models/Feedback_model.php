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
    $res = $this->db->get_where($this->table, ['timestamp' => $timestamp])->row();
    $this->db->reset_query();

    # delete from personal information table
    $this->db->where('id', $res->personal_information_id);
    $this->db->delete('personal_information');
    $this->db->reset_query();

    # delete from survey table
    $this->db->where('id', $res->survey_id);
    $this->db->delete('survey');
    $this->db->reset_query();

    # finally, delete from
    $this->db->where('timestamp', $timestamp);
    return $this->db->delete($this->table);
  }

  /**
   * get first or last record
   * @param  [type] $arg [description]
   * @return [type]      [description]
   */
  public function getByCreatedAt($arg)
  {
    switch ($arg) {
      case 'last':
      $this->db->order_by('created_at', 'DESC');
      break;

      case 'first':
      $this->db->order_by('created_at', 'ASC');
      break;
      default:
    }

    $this->db->limit(1);
    return @date('Y-m-d', strtotime($this->db->get($this->table)->row()->created_at));

  }

  public function getShowrooms()
  {
    $this->db->distinct();
    $this->db->select('showroom');
    $res = $this->db->get($this->table)->result();

    return $res;
  }

}
