<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends Admin_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Model_Auth');
  }

  public function login()
  {
    $this->logged_in();
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == TRUE) {

      // true case
      $username_exists = $this->Model_Auth->check_username($this->input->post('username'));

      if ($username_exists == TRUE) {
        $login = $this->Model_Auth->login($this->input->post('username'), $this->input->post('password'));

        if ($login) {

          $logged_in_sess = array(
            'id' => $login['id'],
            'username'  => $login['username'],
            'fname'    => $login['fname'],
            'lname'    => $login['lname'],
            'email'     => $login['email'],
            'logged_in' => TRUE
          );

          $this->session->set_userdata($logged_in_sess);
          redirect(base_url('dashboard'), 'refresh');
        } else {
          $this->data['errors'] = 'Incorrect username/password combination';
          $this->load->view('auth/login', $this->data);
        }
      } else {
        $this->data['errors'] = 'Username does not exists';

        $this->load->view('auth/login', $this->data);
      }
    } else {
      // false case
      $this->load->view('auth/login');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('auth/login'), 'refresh');
  }
}
