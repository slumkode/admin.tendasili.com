<?php

class Tenders extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Tenders');
    }

    public function index()
    {
        $this->data['page_title'] = 'Tenders';

        ######## all tenders ############
        $all_tender_data = $this->Model_Tenders->fetchTenderData();
        $all_tender_count = $this->Model_Tenders->fetchTenderDataCount();

        $result_all = array();

        foreach ($all_tender_data as $k => $v) {
            $result_all[$k]['tender_info'] = $v;
        }
        $this->data['all_tender_data'] = $result_all;
        $this->data['all_tender_count'] = $all_tender_count;
        ##################################

        ######## available /open tenders ############
        $avail_tender_data = $this->Model_Tenders->fetchAvailTenderData();
        $avail_tender_count = $this->Model_Tenders->fetchAvailTenderDataCount();

        $result_avail = array();

        foreach ($avail_tender_data as $k => $v) {
            $result_avail[$k]['tender_info'] = $v;
        }
        $this->data['avail_tender_data'] = $result_avail;
        $this->data['avail_tender_count'] = $avail_tender_count;
        ##################################

        ######## expired /closed tenders ############
        $closed_tender_data = $this->Model_Tenders->fetchClosedTenderData();
        $closed_tender_count = $this->Model_Tenders->fetchClosedTenderDataCount();

        $result_closed = array();

        foreach ($closed_tender_data as $k => $v) {
            $result_closed[$k]['tender_info'] = $v;
        }
        $this->data['closed_tender_data'] = $result_closed;
        $this->data['closed_tender_count'] = $closed_tender_count;
        ##################################

        ######## sent overtime tenders ############
        $sent_tender_data = $this->Model_Tenders->fetchSentTenderData();
        $sent_tender_count = $this->Model_Tenders->fetchSentTenderDataCount();

        $result_sent = array();

        foreach ($sent_tender_data as $k => $v) {
            $result_sent[$k]['tender_info'] = $v;
        }
        $this->data['sent_tender_data'] = $result_sent;
        $this->data['sent_tender_count'] = $sent_tender_count;
        ##################################

        ######## scheduled tenders ############
        $scheduled_tender_data = $this->Model_Tenders->fetchScheduledTenderData();
        $scheduled_tender_count = $this->Model_Tenders->fetchScheduledTenderDataCount();

        $result_scheduled = array();

        foreach ($scheduled_tender_data as $k => $v) {
            $result_scheduled[$k]['tender_info'] = $v;
        }
        $this->data['scheduled_tender_data'] = $result_scheduled;
        $this->data['scheduled_tender_count'] = $scheduled_tender_count;
        ##################################

        ######## sent overtime tenders ############
        $sent_tender_data = $this->Model_Tenders->fetchSentTenderData();
        $sent_tender_count = $this->Model_Tenders->fetchSentTenderDataCount();

        $result_sent = array();

        foreach ($sent_tender_data as $k => $v) {
            $result_sent[$k]['tender_info'] = $v;
        }
        $this->data['sent_tender_data'] = $result_sent;
        $this->data['sent_tender_count'] = $sent_tender_count;
        ##################################

        $this->render_template('tenders/index', $this->data);
    }

    public function compose()
    {
        $validator = array('success' => false, 'messages' => array());
        $validate_data = array(
            array(
                'field' => 'tender-name',
                'label' => 'Tender Reference Number',
                'rules' => 'required',
                'errors' => array(
                    'required'      => 'Please choose a specific %s.'
                )
            ),
            array(
                'field' => 'category',
                'label' => 'Category',
                'rules' => 'required',
                'errors' => array(
                    'required'      => 'Please choose a %s.'
                )
            ),
            array(
                'field' => 'time',
                'label' => 'Time',
                'rules' => 'required',
                'errors' => array(
                    'required'      => 'Please choose your preferred sending %s.'
                )
            ),
            array(
                'field' => 'date',
                'label' => 'Date',
                'rules' => 'required',
                'errors' => array(
                    'required'      => 'Please choose your preferred sending %s.'
                )
            ),
            array(
                'field' => 'compose-message',
                'label' => 'Message',
                'rules' => 'required',
                'errors' => array(
                    'required'      => "You can't send an empty %s."
                )
            )
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run() == TRUE) {
            $tenderRefNo    = $this->input->post('tender-name');
            $time           = $this->input->post('time');
            $date           = $this->input->post('date');
            $message        = $this->input->post('compose-message');


            // check for scheduled tenders
            // $check_scheduled_tender = $this->Model_Tenders->Check_scheduledTender($date, $time);

            /**
             * check for the day first
             * Then determine if the time is legit for scheduling the tender
             * if the time has passed then return false
             * Else proceed to check if the tender slotted time is available or not
             */
            $today = date('Y-m-d');

            // validate for today
            if ($date == $today) {
                if ($time == 'morning' && date('H') < 05) {
                    $createTender = $this->Model_Tenders->compose();

                    if ($createTender == true) {
                        $validator['success'] = true;
                        $validator['messages'] = "Successfully added";
                    } else {
                        $validator['success'] = true;
                        $validator['messages'] = "Error while inserting the information into the database";
                        $validator['code']     = 02;
                    }
                } else if ($time == 'evening' && date('H') < 17) {
                    $createTender = $this->Model_Tenders->compose();

                    if ($createTender == true) {
                        $validator['success'] = true;
                        $validator['messages'] = "Successfully added";
                    } else {
                        $validator['success'] = true;
                        $validator['messages'] = "Error while inserting the information into the database";
                        $validator['code']     = 02;
                    }
                } else {
                    $validator = ['success' => true, 'code' => 02, 'messages' => $time . ' has already passed'];
                }
            }
            // validate future scheduled dates
            else if ($date > $today) {
                if ($time == 'morning') {
                    $createTender = $this->Model_Tenders->compose();

                    if ($createTender == true) {
                        $validator['success'] = true;
                        $validator['messages'] = "Successfully added";
                    } else {
                        $validator['success'] = true;
                        $validator['messages'] = "Error while inserting the information into the database";
                        $validator['code']     = 02;
                    }
                }

                if ($time == 'evening') {
                    $createTender = $this->Model_Tenders->compose();

                    if ($createTender == true) {
                        $validator['success'] = true;
                        $validator['messages'] = "Successfully added";
                    } else {
                        $validator['success'] = true;
                        $validator['messages'] = "Error while inserting the information into the database";
                        $validator['code']     = 02;
                    }
                }
            }
            // return false if scheduling a passed date
            else {
                $validator = ['success' => true, 'code' => 02, 'messages' => 'The date: ' . $date . ' has already passed'];
            }

            // The data will be inserted if the $message data array is not empty
            if (!empty($message_data)) {
                $validator = ['success' => true, 'messages' => print_r($message_data, true)];
            }
        } else {
            // false case
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        } //else
        echo json_encode($validator);
    }

    public function fetchTenderData($tenderId = null)
    {
        if ($tenderId) {
            $tender_data = $this->Model_Tenders->fetchScheduledTenderData($tenderId);
        }
        echo json_encode($tender_data);
    }

    public function updateInfo($tenderId = null)
    {
        if ($tenderId) {

            $validator = array('success' => false, 'messages' => array(), 'sectionData' => array());

            $validate_data = array(
                array(
                    'field' => 'update-tender-message',
                    'label' => 'Tender Message',
                    'rules' => 'required'
                )
            );

            $this->form_validation->set_rules($validate_data);
            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            if ($this->form_validation->run() === true) {
                $updateInfo = $this->Model_Tenders->updateInfo($tenderId);
                if ($updateInfo == true) {
                    $validator['success'] = true;
                    $validator['messages'] = "Tender Message successfully updated";
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = "Error while updating the information in the database";
                }
            } else {
                $validator['success'] = false;
                foreach ($_POST as $key => $value) {
                    $validator['messages'][$key] = form_error($key);
                }
            } // /else

            echo json_encode($validator);
        }
    }

    public function remove($tenderId = null)
    {
        $validator = array('success' => false, 'messages' => array());

        if ($tenderId) {
            $remove = $this->Model_Tenders->remove($tenderId);
            if ($remove) {
                $validator['success'] = true;
                $validator['messages'] = "Successfully Removed";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Error while removing the information";
            } // /else
        } // /if

        echo json_encode($validator);
    }
}
