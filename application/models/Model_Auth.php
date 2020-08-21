<?php
class Model_Auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /* 
		This function checks if the email exists in the database
	*/
    public function check_username($username)
    {
        if ($username) {
            $sql = 'SELECT * FROM users WHERE username = ?';
            $query = $this->db->query($sql, array($username));
            $result = $query->num_rows();
            return ($result == 1) ? true : false;
        }

        return false;
    }

    /* 
		This function checks if the email and password matches with the database
	*/
    public function login($username, $password)
    {
        if ($username && $password) {
            $active = 'active';
            $sql = "SELECT * FROM users WHERE username = ? AND status = ?";
            $query = $this->db->query($sql, array($username, $active));

            if ($query->num_rows() == 1) {
                $result = $query->row_array();

                // $hash_password = password_verify($password, $result['password']);


                if (md5($password) == $result['password']) {
                    return $result;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
}
