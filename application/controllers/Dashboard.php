<?php

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Subscribers');
    }

    public function index()
    {
        $this->data['page_title'] = 'Home';

        ######## subscribers stats ############
        $stats_subscribers_data = $this->Model_Subscribers->stats();

        $result_all = array();

        foreach ($stats_subscribers_data as $k => $v) {
            $result_all[$k]['subscribers_info'] = $v;
        }
        $this->data['stats_subscribers_data'] = $result_all;

        ######## today's subscribers ############
        $today_subscribers_data = $this->Model_Subscribers->fetchTodaySubs();

        $result_all1 = array();

        foreach ($today_subscribers_data as $k => $v) {
            $result_all1[$k]['subscribers_info'] = $v;
        }
        $this->data['today_subscribers_data'] = $result_all1;

        ######## all subscribers ############
        $all_subscribers_count = $this->Model_Subscribers->fetchAllSubscribersDataCount();
        $this->data['all_subscribers_count'] = $all_subscribers_count;

        ######## Subscribers ##############
        $subscribers_count = $this->Model_Subscribers->fetchSubscribersDataCount();
        $this->data['subscribers_count'] = $subscribers_count;

        ######## Unsubscribers ##############
        $unsubscribers_count = $this->Model_Subscribers->fetchUnsubscribersDataCount();
        $this->data['unsubscribers_count'] = $unsubscribers_count;

        $this->render_template('dashboard', $this->data);
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
