<?php

class Admin_model extends Admin_core_model
{
  public function __construct()
  {
    parent::__construct();
    $this->table = 'admin';
  }

  public function all()
  {
    if ($this->session->id && $this->session->role == 'administrator') {
      $this->db->where("id != {$this->session->id}");
    }

    return $this->db->get($this->table)->result();
  }

  public function add($data)
  {
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    return $this->db->insert($this->table, $data);
  }

  public function update($id, $data)
  {
    if ($data['password']) {
      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    } else {
      unset($data['password']);
    }

    $this->db->where('id', $id);
    return $this->db->update($this->table, $data);
  }

}
