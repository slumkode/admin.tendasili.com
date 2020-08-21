<?php

class Sms extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Sms');
        $this->load->model('Model_Service');
    }

    public function index()
    {
        $this->data['page_title'] = 'SMS';

        ######## all outbox ############
        $outbox_data = $this->Model_Sms->fetchAllOutboxData();
        $outbox_data_count = $this->Model_Sms->fetchAllOutboxDataCount();

        $result_all = array();

        foreach ($outbox_data as $k => $v) {
            $result_all[$k]['outbox_info'] = $v;
        }
        $this->data['outbox_data'] = $result_all;
        $this->data['outbox_data_count'] = $outbox_data_count;
        ##################################


        ######## all services ############
        $service_data = $this->Model_Service->fetchAllServiceData();
        $service_data_count = $this->Model_Service->fetchAllServiceDataCount();

        $result_all = array();

        foreach ($service_data as $k => $v) {
            $result_all[$k]['service_info'] = $v;
        }
        $this->data['service_data'] = $result_all;
        $this->data['service_data_count'] = $service_data_count;
        ##################################

        $this->render_template('sms/index', $this->data);
    }

    public function outbox()
    {
        $this->data['page_title'] = 'SMS Outbox';

        $this->render_template('sms/outbox', $this->data);
    }

    public function compose()
    {
        $this->data['page_title'] = 'Compose SMS';

        $this->render_template('sms/compose', $this->data);
    }
}
