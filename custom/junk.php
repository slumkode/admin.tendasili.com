<div class="col-md-6">
    <!-- Latest Subscribers Block -->
    <div class="block">
        <!-- Latest Subscribers Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="<?php echo base_url('subscribers?opt=allsubs') ?>" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Show All"><i class="fa fa-eye"></i></a>
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen" title="View fullscreen"><i class="gi gi-fullscreen"></i></a>
            </div>
            <h2><strong>Today's</strong> Subscription Activity <small><small> (latest 10)</small></small></h2>
        </div>
        <!-- END Latest Subscribers Title -->

        <!-- Latest Subscribers Content -->
        <table class="table table-borderless table-striped table-vcenter table-bordered">
            <tbody>
                <?php if ($today_subscribers_data) : ?>
                    <?php foreach ($today_subscribers_data as $k => $v) : ?>
                        <tr>
                            <td class="text-center"><strong><?php echo $v['subscribers_info']['subscriber_msisdn'] ?></strong></td>
                            <td class="text-center"><?php echo $v['subscribers_info']['shortcode'] ?></td>
                            <td class="hidden-xs"><?php echo $v['subscribers_info']['service_name'] ?></td>
                            <td class="text-center"><strong><?php echo $v['subscribers_info']['keyword'] ?></strong></td>
                            <?php if ($v['subscribers_info']['subscriber_status'] == "active") : ?>
                                <td class="text-right"><a href="<?php echo base_url('subscribers?opt=subd') ?>"><span class="label label-success"><?php echo $v['subscribers_info']['subscriber_status'] ?></span></a></td>
                            <?php elseif ($v['subscribers_info']['subscriber_status'] == "unsubscribed") : ?>
                                <td class="text-right"><a href="<?php echo base_url('subscribers?opt=usubd') ?>"><span class="label label-danger"><?php echo $v['subscribers_info']['subscriber_status'] ?></span></a></td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>







            </tbody>
        </table>
        <!-- END Latest Subscribers Content -->
    </div>
    <!-- END Latest Subscribers Block -->
</div>