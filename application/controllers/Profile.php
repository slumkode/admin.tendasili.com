<?php
class Profile extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Profile');
        $this->data['page_title'] = 'Profile';
    }

    public function index()
    {
        $userId = $this->session->userdata('id');
        $this->data['userData'] = $this->Model_Profile->fetchUserData($userId);
        $this->render_template('profile/index', $this->data);
    }

    public function updateProfile()
    {
        $userId = $this->session->userdata('id');

        $validator = array('success' => false, 'messages' => array());

        $validate_data = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'fname',
                'label' => 'First Name',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run() === true) {
            $update = $this->Model_Profile->updateProfile($userId);
            if ($update === true) {
                $validator['success'] = true;
                $validator['messages'] = "Profile Successfully Updated";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Error while inserting the information into the database";
            }
        } else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        } // /else

        echo json_encode($validator);
    }

    public function changePassword()
    {
        $userId = $this->session->userdata('id');

        $validator = array('success' => false, 'messages' => array());

        $validate_data = array(
            array(
                'field' => 'currentPassword',
                'label' => 'Current Password',
                'rules' => 'required|callback_validate_current_password'
            ),
            array(
                'field' => 'newPassword',
                'label' => 'Password',
                'rules' => 'required|matches[confirmPassword]'
            ),
            array(
                'field' => 'confirmPassword',
                'label' => 'Confirm Password',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run() === true) {
            $update = $this->Model_Profile->changePassword($userId);
            if ($update === true) {
                $validator['success'] = true;
                $validator['messages'] = "Password Successfully Updated";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Error while inserting the information into the database";
            }
        } else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        } // /else

        echo json_encode($validator);
    }

    public function validate_current_password()
    {
        $userId = $this->session->userdata('id');
        $validate = $this->Model_Profile->validate_current_password($this->input->post('currentPassword'), $userId);

        if ($validate === true) {
            return true;
        } else {
            $this->form_validation->set_message('validate_current_password', 'The {field} is incorrect');
            return false;
        } // /else	
    }
}
