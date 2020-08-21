<?php
class Model_Profile extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fetchUserData($userId = null)
	{
		if ($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}
	}

	public function updateProfile($userId = null)
	{
		if ($userId) {
			$update_data = array(
				'username' => $this->input->post('username'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email')
			);

			$this->db->where('id', $userId);
			$status = $this->db->update('users', $update_data);
			return ($status == true ? true : false);
		}
	}

	public function validate_current_password($password = null, $userId = null)
	{
		if($password && $userId) {			
			$password = md5($this->input->post('currentPassword'));									
			// $password = $this->input->post('currentPassword');									
			// $password = $this->input->post('currentPassword');

			$sql = "SELECT * FROM users WHERE password = ? AND id = ?";
			$query = $this->db->query($sql, array($password, $userId));
			$result = $query->row_array();
			
			return ($query->num_rows() === 1 ? true : false);			
		}	
		else {
			return false;
		}
	} // /validate username function

	public function changePassword($userId = null)
	{
		if ($userId) {
			$password = md5($this->input->post('newPassword'));
			$update_data = array(
				'password' => $password
			);

			$this->db->where('id', $userId);
			$status = $this->db->update('users', $update_data);
			return ($status == true ? true : false);
		}
	}
}
