<?php
class Settings extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Profile');
        $this->data['page_title'] = 'Settings';
    }

    public function index()
    {
        $userId = $this->session->userdata('id');
        $this->data['userData'] = $this->Model_Profile->fetchUserData($userId);
        $this->render_template('settings/index', $this->data);
    }


}
