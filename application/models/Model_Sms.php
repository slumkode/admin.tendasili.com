<?php

class Model_Sms extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetchAllOutboxData()
    {
        $sql = "SELECT * FROM cdr";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetchAllOutboxDataCount()
    {
        $sql = "SELECT * FROM cdr";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}