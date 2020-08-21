  <!-- Page content -->
  <div id="page-content">
      <!-- Page Header -->
      <div class="content-header">
          <div class="header-section">
              <h1>
                  <i class="fa fa-desktop"></i></i><?php echo $page_title ?><br>
              </h1>
          </div>
      </div>
      <ul class="breadcrumb breadcrumb-top">
          <li></li>
          <li><?php echo $page_title ?></li>
      </ul>
      <!-- END Page Header -->

      <div class="row">
          <div class="col-md-12 col-xs-12 col-lg-12">
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
                                              <small><strong><?php echo $subscribers_count ?></strong> of <?php echo $all_subscribers_count ?></small>
                                          </h3>
                                      </div>
                                  </a>
                                  <!-- END Widget -->
                              </h3>
                          </div>
                          <div class="col-xs-6 col-lg-6">
                              <h3>
                                  <!-- Widget -->
                                  <a href="<?php echo base_url('subscribers?opt=usubd') ?>" class="widget widget-hover-effect1 themed-background-dark">
                                      <div class="widget-simple">
                                          <div class="widget-icon pull-left themed-background-white animation-fadeIn">
                                              <i class="fa fa-user-times text-danger"></i>
                                          </div>
                                          <h3 class="widget-content text-right animation-pullDown">
                                              <span class="text-danger">Un<strong>subscribed</strong></span><br>
                                              <small><strong><?php echo $unsubscribers_count ?></strong> of <?php echo $all_subscribers_count ?></small>
                                          </h3>
                                      </div>
                                  </a>
                                  <!-- END Widget -->
                              </h3>
                          </div>
                      </div>

                      <div class="row">
                          <div class=" col-xs-12 col-lg-12">
                              <table class="table table-borderless table-striped table-vcenter table-bordered">
                                  <thead>
                                      <tr width='100%'>
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
                                                  <td class="text-left"><small><?php echo $v['subscribers_info']['service_name'] ?></small></td>
                                                  <td class="text-center"><small><?php echo $v['subscribers_info']['keyword'] ?></small></td>
                                                  <td class="text-center"><small><a href="javascript:void(0)"><?php echo $v['subscribers_info']['active'] ?></a></small></td>
                                                  <td class="text-center"><small><a href="javascript:void(0)"><?php echo $v['subscribers_info']['unsubscribed'] ?></a></small></td>
                                              <?php endforeach ?>
                                          <?php endif ?>

                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- END Your Plan Widget -->
          </div>

      </div>
      <div class="row">
          <div class="col-md-12 col-xs-12 col-lg-12">
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
      </div>



      <script>
          $(document).ready(function() {
              $('#dashboardNav').addClass('active');
          });
      </script>