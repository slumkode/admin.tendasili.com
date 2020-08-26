  <!-- Page content -->
  <div id="page-content">
      <!-- Page Header -->
      <div class="content-header">
          <div class="header-section">
              <h1>
                  <i class="fa fa-users"></i></i><?php echo $page_title ?><br>
              </h1>
          </div>
      </div>
      <ul class="breadcrumb breadcrumb-top">
          <li></li>
          <li><?php echo $page_title ?></li>
          <?php if ($this->input->get('opt') == "allsubs") : ?>
              <li><a href="<?php echo base_url('subscribers?opt=allsubs') ?>">All Subscribers</a></li>
          <?php elseif ($this->input->get('opt') == "subd") : ?>
              <li><a href="<?php echo base_url('subscribers?opt=subd') ?>">Subscribed</a></li>
          <?php elseif ($this->input->get('opt') == "usubd") : ?>
              <li><a href="<?php echo base_url('subscribers?opt=usubd') ?>">Unsubscribed</a></li>
          <?php endif ?>

      </ul>
      <!-- END Page Header -->



      <!-- Tender Content -->
      <div class="row">
          <!-- Inbox Menu -->
          <div class="col-sm-4 col-lg-3">
              <!-- Menu Block -->
              <div class="block full">
                  <!-- Menu Content -->
                  <ul class="nav nav-pills nav-stacked">
                      <li id="allSubscribers">
                          <a href="<?php echo base_url('subscribers?opt=allsubs') ?>">
                              <span class="badge pull-right"><?php echo $all_subscribers_count ?></span>
                              <i class="fa fa-angle-right fa-fw"></i> <strong>All Subscribers</strong>
                          </a>
                      </li>

                      <li id="aSubscribers">
                          <a href="<?php echo base_url('subscribers?opt=subd') ?>">
                              <span class="badge pull-right"><?php echo $subscribers_count ?></span>
                              <i class="fa fa-angle-right fa-fw"></i> <strong>Subscribed</strong>
                          </a>
                      </li>

                      <li id="uSubscribers">
                          <a href="<?php echo base_url('subscribers?opt=usubd') ?>">
                              <span class="badge pull-right"><?php echo $unsubscribers_count ?></span>
                              <i class="fa fa-angle-right fa-fw"></i> <strong>Unsubscribed</strong>
                          </a>
                      </li>

                  </ul>
                  <!-- END Menu Content -->
              </div>
              <!-- END Menu Block -->
          </div>
          <!-- END Inbox Menu -->

          <!-- Messages List -->
          <div class="col-sm-8 col-lg-9">
              <!-- Tender List Block -->
              <?php if ($this->input->get('opt') == "allsubs") : ?>
                  <div class="block full">
                      <div class="block-title">
                          <div class="block-options pull-right">
                              <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen" title="View fullscreen"><i class="gi gi-fullscreen"></i></a>
                          </div>
                          <h2><strong>All </strong>Subscribers</h2>
                      </div>
                      <div class="table-responsive">
                          <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th class="text-center">Number</th>
                                      <th class="text-center">Status</th>
                                      <th class="text-center">Subscription Date</th>
                                      <th class="text-center">Shortcode</th>
                                      <th class="text-center">keyword</th>
                                      <!-- <td>Action</td> -->
                                  </tr>
                              </thead>

                              <tbody>
                                  <?php if ($all_subscribers_data) : ?>
                                      <?php foreach ($all_subscribers_data as $k => $v) : ?>
                                          <tr>
                                              <td><?php echo $v['subscribers_info']['subscriber_id'] ?></td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['subscriber_msisdn'] ?></td>
                                              <td class="text-center">
                                                  <?php
                                                    if ($v['subscribers_info']['subscriber_status'] == "active") :
                                                        echo '<span class="label label-primary">subscribed</span>';
                                                    elseif ($v['subscribers_info']['subscriber_status'] == "unsubscribed") :
                                                        echo '<span class="label label-danger">unsubscribed</span>';
                                                    endif
                                                    ?>
                                              </td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['subscriber_date'] ?></td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['shortcode'] ?></td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['keyword'] ?></td>
                                          </tr>
                                      <?php endforeach ?>
                                  <?php endif ?>
                              </tbody>

                          </table>
                      </div>
                  </div>
              <?php elseif ($this->input->get('opt') == "subd") : ?>
                  <div class="block full">
                      <div class="block-title">
                          <div class="block-options pull-right">
                              <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen" title="View fullscreen"><i class="gi gi-fullscreen"></i></a>
                          </div>
                          <h2><strong>Subscribed </strong></h2>
                      </div>
                      <div class="table-responsive">
                          <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th class="text-center">Number</th>
                                      <th class="text-center">Status</th>
                                      <th class="text-center">Subscription Date</th>
                                      <th class="text-center">Shortcode</th>
                                      <th class="text-center">keyword</th>
                                      <!-- <td>Action</td> -->
                                  </tr>
                              </thead>

                              <tbody>
                                  <?php if ($subscribers_data) : ?>
                                      <?php foreach ($subscribers_data as $k => $v) : ?>
                                          <tr>
                                              <td><?php echo $v['subscribers_info']['subscriber_id'] ?></td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['subscriber_msisdn'] ?></td>
                                              <td class="text-center">
                                                  <?php
                                                    if ($v['subscribers_info']['subscriber_status'] == "active") :
                                                        echo '<span class="label label-primary">subscribed</span>';
                                                    elseif ($v['subscribers_info']['subscriber_status'] == "unsubscribed") :
                                                        echo '<span class="label label-danger">unsubscribed</span>';
                                                    endif
                                                    ?>
                                              </td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['subscriber_date'] ?></td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['shortcode'] ?></td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['keyword'] ?></td>
                                          </tr>
                                      <?php endforeach ?>
                                  <?php endif ?>
                              </tbody>

                          </table>
                      </div>
                  </div>
              <?php elseif ($this->input->get('opt') == "usubd") : ?>
                  <div class="block full">
                      <div class="block-title">
                          <div class="block-options pull-right">
                              <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen" title="View fullscreen"><i class="gi gi-fullscreen"></i></a>
                          </div>
                          <h2><strong>Unsubscribed </strong></h2>
                      </div>
                      <div class="table-responsive">
                          <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                              <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th class="text-center">Number</th>
                                      <th class="text-center">Status</th>
                                      <th class="text-center">Subscription Date</th>
                                      <th class="text-center">Shortcode</th>
                                      <th class="text-center">keyword</th>
                                      <!-- <td>Action</td> -->
                                  </tr>
                              </thead>

                              <tbody>
                                  <?php if ($unsubscribers_data) : ?>
                                      <?php foreach ($unsubscribers_data as $k => $v) : ?>
                                          <tr>
                                              <td><?php echo $v['subscribers_info']['subscriber_id'] ?></td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['subscriber_msisdn'] ?></td>
                                              <td class="text-center">
                                                  <?php
                                                    if ($v['subscribers_info']['subscriber_status'] == "active") :
                                                        echo '<span class="label label-primary">subscribed</span>';
                                                    elseif ($v['subscribers_info']['subscriber_status'] == "unsubscribed") :
                                                        echo '<span class="label label-danger">unsubscribed</span>';
                                                    endif
                                                    ?>
                                              </td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['subscriber_date'] ?></td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['shortcode'] ?></td>
                                              <td class="text-center"><?php echo $v['subscribers_info']['keyword'] ?></td>
                                          </tr>
                                      <?php endforeach ?>
                                  <?php endif ?>
                              </tbody>

                          </table>
                      </div>
                  </div>
              <?php endif ?>
              <!-- END Tender List Block -->
          </div>
          <!-- END Messages List -->
      </div>
      <!-- END Inbox Content -->

      <script>
          $(document).ready(function() {
              var base_url = $("#base_url").val();
              var request = $("#request").text();
              // document.getElementById("tendersNavDropdown").style.display = "none";

              $('#subscribersNav').addClass('active');

              if (request == 'allsubs') {
                  $('#allSubscribers').addClass('active');
              } else if (request == 'subd') {
                  $('#aSubscribers').addClass('active');
              } else if (request == 'usubd') {
                  $('#uSubscribers').addClass('active');
              }

          });
      </script>
      <!-- Load and execute javascript code used only in this page -->
      <script src="<?php echo base_url('assets/proui/js/pages/tablesDatatables.js') ?>"></script>
      <script>
          $(function() {
              TablesDatatables.init();
          });
      </script>

      <script src="<?php echo base_url('assets/proui/js/pages/readyInbox.js') ?>"></script>
      <script>
          $(function() {
              ReadyInbox.init();
          });
      </script>