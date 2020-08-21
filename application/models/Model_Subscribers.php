<?php
class Model_Subscribers extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Africa/Nairobi');
    }

    ######## all subscribers ############
    public function fetchAllSubscribersData()
    {
        $sql = "SELECT * FROM subscribers";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetchAllSubscribersDataCount()
    {
        $sql = "SELECT * FROM subscribers";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    #####################################

    ######## Subscribers ##############
    public function fetchSubscribersData()
    {
        $sql = "SELECT * FROM subscribers WHERE subscriber_status='active'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetchSubscribersDataCount()
    {
        $sql = "SELECT * FROM subscribers WHERE subscriber_status='active'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    #####################################

    ######## Unsubscribers ##############
    public function fetchUnsubscribersData()
    {
        $sql = "SELECT * FROM subscribers WHERE subscriber_status='unsubscribed'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetchUnsubscribersDataCount()
    {
        $sql = "SELECT * FROM subscribers WHERE subscriber_status='unsubscribed'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    #####################################

    public function stats()
    {
        $sql = "SELECT 
                    a.service_name, 
                    a.keyword, 
                    COUNT(IF(b.subscriber_status = 'active', 1, NULL)) 'active',
                    COUNT(IF(b.subscriber_status = 'unsubscribed', 1, NULL)) 'unsubscribed'
                FROM
                    services AS a
                        JOIN
                    subscribers AS b ON a.service_name = b.service_name
                GROUP BY a.id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetchTodaySubs()
    {
        $today = date('Y-m-d');
        $sql = "SELECT * FROM subscribers WHERE left(subscriber_date, 10) = ? ORDER BY subscriber_id ASC LIMIT 10";
        $query = $this->db->query($sql, array($today));
        return $query->result_array();
    }

}
