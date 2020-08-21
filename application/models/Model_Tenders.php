<?php
class Model_Tenders extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    ########### all / each tender detail ##########################
    public function fetchTenderData($tenderId = null)
    {
        if ($tenderId) {
            $sql = "SELECT * FROM tenders WHERE id = ?";
            $query = $this->db->query($sql, array($tenderId));
            return $query->row_array();
        }
        $sql = "SELECT * FROM tenders";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetchTenderDataCount()
    {
        $sql = "SELECT * FROM tenders";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    ################################################################

    ######## available / open tenders ###############################
    public function fetchAvailTenderData($tenderId = null)
    {
        if ($tenderId) {
            $sql = "SELECT * FROM tenders WHERE id = ? AND propStatus='open'";
            $query = $this->db->query($sql, array($tenderId));
            return $query->row_array();
        }
        $sql = "SELECT * FROM tenders WHERE propStatus='open'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetchAvailTenderDataCount()
    {
        $sql = "SELECT * FROM tenders WHERE propStatus='open'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    ###################################################################


    ######## expired / closed tenders ###############################
    public function fetchClosedTenderData($tenderId = null)
    {
        if ($tenderId) {
            $sql = "SELECT * FROM tenders WHERE id = ? AND propStatus='closed'";
            $query = $this->db->query($sql, array($tenderId));
            return $query->row_array();
        }
        $sql = "SELECT * FROM tenders WHERE propStatus='closed'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetchClosedTenderDataCount()
    {
        $sql = "SELECT * FROM tenders WHERE propStatus='closed'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    ###################################################################

    ######## scheduled tenders ###############################
    public function fetchScheduledTenderData($tenderId = null)
    {
        if ($tenderId) {
            $sql = "SELECT a.tend_content as message,a.tend_category as category,a.tend_expiry_date as expiry, a.tend_send_date as send_date, a.tend_send_time as send_time , b.propNumber as refNumber,b.propTitle as title FROM tender_schedule a JOIN tenders b ON (a.tend_id = b.propTenderID) WHERE tend_status='scheduled' and a.id=?";
            $query = $this->db->query($sql, array($tenderId));
            return $query->row_array();
        }
        $sql = "SELECT a.id as tid,a.tend_content,a.tend_category,a.tend_expiry_date,a.tend_send_date,a.tend_send_time, b.* FROM tender_schedule a JOIN tenders b ON (a.tend_id = b.propTenderID) WHERE tend_status='scheduled'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetchScheduledTenderDataCount()
    {
        $sql = "SELECT a.*, b.* FROM tender_schedule a JOIN tenders b ON (a.tend_id = b.propTenderID) WHERE tend_status='scheduled'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    ###################################################################

    ######## sent overtime tenders ###############################
    public function fetchSentTenderData()
    {
        $sql = "SELECT a.*, b.* FROM tender_schedule a JOIN tenders b ON (a.tend_id = b.propTenderID) WHERE tend_status='sent'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function fetchSentTenderDataCount()
    {
        $sql = "SELECT a.*, b.* FROM tender_schedule a JOIN tenders b ON (a.tend_id = b.propTenderID) WHERE tend_status='sent'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    ###################################################################

    public function Check_scheduledTender($send_date, $send_time, $category)
    {
        if ($send_date && $send_time) {
            $sql = "SELECT * FROM tender_schedule WHERE tend_status='scheduled' AND tend_send_date=? AND tend_send_time=? AND tend_category=?";
            $query = $this->db->query($sql, array($send_date, $send_time, $category));
            $result = $query->num_rows();
            return ($result == 1) ? false : true;
        }
        return true;
    }

    public function getTenderDetails($tend_id = null)
    {
        if ($tend_id) {
            $sql = "SELECT * FROM tenders WHERE propTenderID=?";
            $query = $this->db->query($sql, array($tend_id));
            return  $query->result_array();
        }
    }

    public function compose()
    {
        $tenderRefNo    = $this->input->post('tender-name');
        $data = $this->getTenderDetails($tenderRefNo);
        foreach ($data as $dt) {
            $tend_category = $dt['propCategoryNew'];
            $tend_expiry_date = $dt['propCloseDate'];
        }
        $time           = $this->input->post('time');
        $date           = $this->input->post('date');
        $message        = $this->input->post('compose-message');

        if ($tend_category == 'works') {
            if ($this->Check_scheduledTender($date, $time, 'works') != false) {
                // if (!empty($message)) {
                $message_data = array(
                    'tend_id'               => $tenderRefNo,
                    'tend_send_date'        => $date,
                    'tend_send_time'        => $time,
                    'tend_content'          => $message,
                    'tend_category'         => $tend_category,
                    'tend_expiry_date'      => $tend_expiry_date

                );
                $status = $this->db->insert('tender_schedule', $message_data);
                // }
            } else {
                $status = false;
            }
        }

        if ($tend_category == 'goods') {
            if ($this->Check_scheduledTender($date, $time, 'goods') != false) {
                // if (!empty($message)) {
                $message_data = array(
                    'tend_id'               => $tenderRefNo,
                    'tend_send_date'        => $date,
                    'tend_send_time'        => $time,
                    'tend_content'          => $message,
                    'tend_category'         => $tend_category,
                    'tend_expiry_date'      => $tend_expiry_date

                );
                $status = $this->db->insert('tender_schedule', $message_data);
                // }
            } else {
                $status = false;
            }
        }

        if ($tend_category == 'services') {
            if ($this->Check_scheduledTender($date, $time, 'services') != false) {
                // if (!empty($message)) {
                $message_data = array(
                    'tend_id'               => $tenderRefNo,
                    'tend_send_date'        => $date,
                    'tend_send_time'        => $time,
                    'tend_content'          => $message,
                    'tend_category'         => $tend_category,
                    'tend_expiry_date'      => $tend_expiry_date

                );
                $status = $this->db->insert('tender_schedule', $message_data);
                // }
            } else {
                $status = false;
            }
        }

        if ($tend_category == 'consultancy') {
            if ($this->Check_scheduledTender($date, $time, 'consultancy') != false) {
                // if (!empty($message)) {
                $message_data = array(
                    'tend_id'               => $tenderRefNo,
                    'tend_send_date'        => $date,
                    'tend_send_time'        => $time,
                    'tend_content'          => $message,
                    'tend_category'         => $tend_category,
                    'tend_expiry_date'      => $tend_expiry_date

                );
                $status = $this->db->insert('tender_schedule', $message_data);
                // }
            } else {
                $status = false;
            }
        }
        return ($status == true ? true : false);
    }

    public function updateInfo($tenderId = null)
    {
        if ($tenderId) {
            $update_data = array(
                'tend_content' => $this->input->post('update-tender-message')
            );

            $this->db->where('id', $tenderId);
            $query = $this->db->update('tender_schedule', $update_data);

            return ($query === true ? true : false);
        }
    }

    public function remove($tenderId = null)
	{
		if ($tenderId) {
			$this->db->where('id', $tenderId);
			$result = $this->db->delete('tender_schedule');
			return ($result === true ? true : false);
		} // /if
	}
}
