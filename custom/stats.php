<?php

date_default_timezone_set('Africa/Nairobi');
$this->load->helper('url');

function main_con()
{
    // Connect To Database
    $db_host        = 'localhost';
    $db_username    = 'timon';
    $db_password    = 'Preach13@29Qt!_';

    // main database (tenda)
    $db_tenda = 'tenda';

    $charset = 'utf8mb4';

    $dsn_tenda  = "mysql:host=$db_host;dbname=$db_tenda;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAME'utf8mb4'"
    ];

    // Main connection (tenda)
    $main_dbh = new PDO($dsn_tenda, $db_username, $db_password, $options);

    return $main_dbh;
}

######## all subscribers ############
function fetchAllSubscribersData()
{
    $query = "SELECT * FROM subscribers";
    $stmt = main_con()->prepare($query);
    return $stmt->execute();

    $result_array = array();
    while ($row = $stmt->fetch()) {
        $subscriber_id      = $row['subscriber_id'];
        $subscriber_msisdn  = $row['subscriber_msisdn'];
        $subscriber_status  = $row['subscriber_status'];
        $subscriber_date    = $row['subscriber_date'];
        $subscriber_join_date = $row['subscriber_join_date'];
        $subscriber_join_status = $row['subscriber_join_status'];
        $smscid = $row['smscid'];
        $shortcode = $row['shortcode'];
        $service_name = $row['service_name'];
        $keyword = $row['keyword'];

        $arr = array(
            "subscriber_id"           => $subscriber_id,
            "subscriber_msisdn"       => $subscriber_msisdn,
            "subscriber_status"       => $subscriber_status,
            "subscriber_date"         => $subscriber_date,
            "subscriber_join_date"    => $subscriber_join_date,
            "subscriber_join_status"  => $subscriber_join_status,
            "smscid"                  => $smscid,
            "shortcode"               => $shortcode,
            "service_name"            => $service_name,
            "keyword"                 => $keyword
        );
        array_push($result_array, $arr);
    }
    return $result_array;
}
function fetchAllSubscribersDataCount()
{
    $query = "SELECT * FROM subscribers";
    $stmt = main_con()->prepare($query);
    $stmt->execute();
    return $stmt->rowCount();
}
#####################################

######## all subscribers ############
$all_subscribers_data = fetchAllSubscribersData();
$all_subscribers_count = fetchAllSubscribersDataCount();

$result_all = array();
foreach ($all_subscribers_data as $k => $v) {
    $result_all[$k]['subscribers_info'] = $v;
}

##################################

?>

<div class="col-md-6">
    <!-- Your Plan Widget -->
    <div class="widget">
        <div class="widget-extra themed-background">
            <h3 class="widget-content-light">
                <!-- Taifa <strong>Mobile</strong> -->
                <strong class="text-white">Subscribers</strong>
                <small></small>
            </h3>
        </div>
        <div class="widget-extra-full">
            <div class="row">
                <div class="col-xs-6 col-lg-6">
                    <h3>
                        <!-- Widget -->
                        <a href="<?php echo base_url('subscribers?opt=subd') ?>" class="widget widget-hover-effect1 themed-background-dark">
                            <div class="widget-simple">
                                <div class="widget-icon pull-left themed-background-white animation-fadeIn">
                                    <i class="fa fa-group text-primary"></i>
                                </div>
                                <h3 class="widget-content text-right animation-pullDown">
                                    <strong>Subscribed</strong><br>
                                    <small><strong><?php echo "" ?></strong> of <?php echo $all_subscribers_count ?></small>
                                </h3>
                            </div>
                        </a>
                        <!-- END Widget -->
                    </h3>
                </div>
                <!-- <div class="col-xs-6 col-lg-6">
                    <h3> -->
                        <!-- Widget -->
                        <!-- <a href="<?php echo base_url('subscribers?opt=usubd') ?>" class="widget widget-hover-effect1 themed-background-dark">
                            <div class="widget-simple">
                                <div class="widget-icon pull-left themed-background-white animation-fadeIn">
                                    <i class="fa fa-user-times text-danger"></i>
                                </div>
                                <h3 class="widget-content text-right animation-pullDown">
                                    <span class="text-danger">Un<strong>subscribed</strong></span><br>
                                    <small><strong><?php echo $unsubscribers_count ?></strong> of <?php echo $all_subscribers_count ?></small>
                                </h3>
                            </div>
                        </a> -->
                        <!-- END Widget -->
                    <!-- </h3>
                </div> -->
            </div>

            <!-- <div class="row">
                <table class="table table-borderless table-striped table-vcenter table-bordered">
                    <thead>
                        <tr>
                            <th class="text-left"><strong><small>service name</small></strong></th>
                            <th class="text-center"><strong><small>keyword</small></strong></th>
                            <th class="text-center"><strong><small># of subscribed</small></strong></th>
                            <th class="text-center"><strong><small># of unsubscribed</small></strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($stats_subscribers_data) : ?>
                            <?php foreach ($stats_subscribers_data as $k => $v) : ?>
                                <tr>
                                    <td class="text-left" style="width: 100px;"><small><?php echo $v['subscribers_info']['service_name'] ?></small></td>
                                    <td class="text-center"><small><?php echo $v['subscribers_info']['keyword'] ?></small></td>
                                    <td class="text-center"><small><a href="javascript:void(0)"><?php echo $v['subscribers_info']['active'] ?></a></small></td>
                                    <td class="text-center"><small><a href="javascript:void(0)"><?php echo $v['subscribers_info']['unsubscribed'] ?></a></small></td>
                                <?php endforeach ?>
                            <?php endif ?>

                    </tbody>
                </table>
            </div> -->
        </div>
    </div>
    <!-- END Your Plan Widget -->
</div>
