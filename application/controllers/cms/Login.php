<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('login_model');
  }

  public function index()
  {
    $this->login();
  }

  public function login()
  {
    if (isset($this->session->role)) {
      redirect('cms/admin');
    } else {
      $this->load->view('cms/login');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('cms/login');
    die();
  }

  public function attempt() # attempt to login
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $res = $this->login_model->getByEmail($email);
    if($res && password_verify($password, $res->password)){
      $this->session->set_userdata(['role' => 'administrator', 'id' => $res->id, 'name' => $res->name]);
      redirect('cms/admin');
    } else {
      $this->session->set_flashdata('login_msg', ['message' => 'Incorrect email or password', 'color' => 'red']);
      redirect('cms/login');
    }

  }


}
