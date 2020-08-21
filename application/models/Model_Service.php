<?php

class Model_Service extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetchAllServiceData($serviceId = null)
    {
        if ($serviceId) {
            $sql = "SELECT * FROM services WHERE id = ?";
            $query = $this->db->query($sql, array($serviceId));
            return $query->row_array();
        }

        $sql = "SELECT * FROM services";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetchAllServiceDataCount()
    {
        $sql = "SELECT * FROM services";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}
