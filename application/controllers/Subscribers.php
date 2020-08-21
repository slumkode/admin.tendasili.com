<?php

class Subscribers extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Subscribers');
    }

    public function index()
    {
        $this->data['page_title'] = 'Subscribers';

        ######## all subscribers ############
        $all_subscribers_data = $this->Model_Subscribers->fetchAllSubscribersData();
        $all_subscribers_count = $this->Model_Subscribers->fetchAllSubscribersDataCount();

        $result_all = array();

        foreach ($all_subscribers_data as $k => $v) {
            $result_all[$k]['subscribers_info'] = $v;
        }
        $this->data['all_subscribers_data'] = $result_all;
        $this->data['all_subscribers_count'] = $all_subscribers_count;
        ##################################

        ######## Subscribers ##############
        $subscribers_data = $this->Model_Subscribers->fetchSubscribersData();
        $subscribers_count = $this->Model_Subscribers->fetchSubscribersDataCount();

        $result_all = array();

        foreach ($subscribers_data as $k => $v) {
            $result_all[$k]['subscribers_info'] = $v;
        }
        $this->data['subscribers_data'] = $result_all;
        $this->data['subscribers_count'] = $subscribers_count;
        ##################################

         ######## Unsubscribers ##############
         $unsubscribers_data = $this->Model_Subscribers->fetchUnsubscribersData();
         $unsubscribers_count = $this->Model_Subscribers->fetchUnsubscribersDataCount();
 
         $result_all = array();
 
         foreach ($unsubscribers_data as $k => $v) {
             $result_all[$k]['subscribers_info'] = $v;
         }
         $this->data['unsubscribers_data'] = $result_all;
         $this->data['unsubscribers_count'] = $unsubscribers_count;
         ##################################

        $this->render_template('subscribers/index', $this->data);
    }


    // public function fetch_tenda()
    // {
    //     $fetch_tenda = $this->Model_Tenders->fetch_tenda();

    //     $result = array('data' => array());

    //     foreach ($fetch_tenda as $key => $value) {
    //         $tendaNumber   = $value['tendaNumber'];
    //         $tenderDescription         = $value['tenderDescription'];

    //         $tenderDocument      = $value['tenderDocument'];
    //         $additionalInfo        = $value['additionalInfo'];
    //         $tenderCloseDate        = $value['tenderCloseDate'];

    //         $result['data'][$key] = array(
    //             $tendaNumber,
    //             $tenderDescription,
    //             $tenderDocument,
    //             $additionalInfo,
    //             $tenderCloseDate
    //         );
    //     }
    //     echo json_encode($result);
    // }
}
