<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends Admin_Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        parent::__construct();
    }
}

class Admin_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Africa/Nairobi');
        $this->load->library('session');
        $this->load->model('Model_Profile');


        if (empty($this->session->userdata('logged_in'))) {
            $session_data = array('logged_in' => FALSE);
            $this->session->set_userdata($session_data);
        } else {
            $user_id = $this->session->userdata('id');
        }
    }

    public function logged_in()
    {
        $session_data = $this->session->userdata();
        if ($session_data['logged_in'] == TRUE) {
            redirect(base_url('dashboard'), 'refresh');
        }
    }

    public function not_logged_in()
    {
        $session_data = $this->session->userdata();
        if ($session_data['logged_in'] == FALSE) {
            redirect(base_url('auth/login'), 'refresh');
        }
    }


    public function render_template($page = null, $data = array())
    {
        $this->not_logged_in();
        $userId = $this->session->userdata('id');
        $data['userData'] = $this->Model_Profile->fetchUserData($userId);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
    }
}
