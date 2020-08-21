<!-- Page content -->
<div id="page-content">
    <!-- Page Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-briefcase"></i><?php echo $page_title ?><br>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li></li>
        <li><?php echo $page_title ?></li>
        <?php if ($this->input->get('opt') == "alltnds") : ?>
            <li><a href="<?php echo base_url('tenders?opt=alltnds') ?>">All Tenders</a></li>
        <?php elseif ($this->input->get('opt') == "avltnds") : ?>
            <li><a href="<?php echo base_url('tenders?opt=avltnds') ?>">Available Tenders</a></li>
        <?php elseif ($this->input->get('opt') == "exptnds") : ?>
            <li><a href="<?php echo base_url('tenders?opt=exptnds') ?>">Closed Tenders</a></li>
        <?php elseif ($this->input->get('opt') == "sntovttnds") : ?>
            <li><a href="<?php echo base_url('tenders?opt=sntovttnds') ?>">Scheduled Overtime</a></li>
        <?php endif ?>

    </ul>
    <!-- END Page Header -->



    <!-- Tender Content -->
    <div class="row">
        <!-- Inbox Menu -->
        <div class="col-sm-4 col-lg-3">
            <!-- Menu Block -->
            <div class="block full">
                <div class="block-title clearfix">
                    <div class="block-options pull-left">
                        <a href="<?php echo base_url('tenders?opt=sms') ?>" class="btn btn-alt btn-sm btn-default"><i class="fa fa-pencil"></i> Schedule Tender</a>
                    </div>
                </div>

                <!-- Menu Content -->
                <div id="menu">
                    <ul class="nav nav-pills nav-stacked">
                        <li id="allTenders">
                            <a href="<?php echo base_url('tenders?opt=alltnds') ?>">
                                <span class="badge pull-right"><?php echo $all_tender_count ?></span>
                                <i class="fa fa-angle-right fa-fw"></i> <strong>All Tenders</strong>
                            </a>
                        </li>

                        <li id="availTenders">
                            <a href="<?php echo base_url('tenders?opt=avltnds') ?>">
                                <span class="badge pull-right"><?php echo $avail_tender_count ?></span>
                                <i class="fa fa-angle-right fa-fw"></i> <strong>Available Tenders</strong>
                            </a>
                        </li>

                        <li id="expTenders">
                            <a href="<?php echo base_url('tenders?opt=exptnds') ?>">
                                <span class="badge pull-right"><?php echo $closed_tender_count ?></span>
                                <i class="fa fa-angle-right fa-fw"></i> <strong>Closed Tenders</strong>
                            </a>
                        </li>
                        <li id="schldOvTenders">
                            <a href="<?php echo base_url('tenders?opt=schldovttnds') ?>">
                                <span class="badge pull-right"><?php echo $scheduled_tender_count ?></span>
                                <i class="fa fa-angle-right fa-fw"></i> <strong>Scheduled</strong>
                            </a>
                        </li>
                        <li id="sntOvTenders">
                            <a href="<?php echo base_url('tenders?opt=sntovttnds') ?>">
                                <span class="badge pull-right"><?php echo $sent_tender_count ?></span>
                                <i class="fa fa-angle-right fa-fw"></i> <strong>Sent</strong>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Menu Content -->
            </div>
            <!-- END Menu Block -->
        </div>
        <!-- END Inbox Menu -->

        <!-- Messages List -->
        <div class="col-sm-8 col-lg-9">
            <!-- Tender List Block -->
            <?php if ($this->input->get('opt') == "alltnds") : ?>
                <div class="block full">
                    <div class="block-title">
                        <div class="block-options pull-right">
                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen" title="View fullscreen"><i class="gi gi-fullscreen"></i></a>
                        </div>
                        <h2><strong>All </strong>Tenders</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-left"> Ref Number</th>
                                    <th class="text-left">Title</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Expiry Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if ($all_tender_data) : ?>
                                    <?php foreach ($all_tender_data as $k => $v) : ?>
                                        <tr>
                                            <td class="text-left" data-toggle="tooltip" title="Entity: <?php echo $v['tender_info']['propEntity'] ?>"><?php echo $v['tender_info']['propNumber'] ?></td>
                                            <td class="text-left" data-toggle="tooltip" title="Entity: <?php echo $v['tender_info']['propEntity'] ?>"><a href="<?php echo $v['tender_info']['propLink'] ?>" target="_blank"><?php echo $v['tender_info']['propTitle'] ?></a></td>
                                            <td class="text-center" data-toggle="tooltip" title="<?php echo $v['tender_info']['propCategoryOriginal'] ?>"><?php echo $v['tender_info']['propCategoryNew'] ?></td>
                                            <td class="text-center"><?php echo $v['tender_info']['propCloseDate'] ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ($v['tender_info']['propStatus'] == "open") :
                                                    echo '<span class="label label-info">open</span>';
                                                elseif ($v['tender_info']['propStatus'] == "closed") :
                                                    echo '<span class="label label-danger">closed</span>';
                                                endif
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <?php if ($v['tender_info']['propStatus'] == 'open' || $v['tender_info']['propStatus'] == 'closed') : ?>
                                                        <?php if ($v['tender_info']['propStatus'] == 'open') : ?>
                                                            <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a> -->
                                                            <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a> -->

                                                        <?php endif ?>
                                                        <?php if ($v['tender_info']['propStatus'] == 'closed') :  ?>

                                                        <?php endif ?>

                                                    <?php endif ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            <?php elseif ($this->input->get('opt') == "avltnds") : ?>
                <div class="block full">
                    <div class="block-title">
                        <div class="block-options pull-right">
                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen" title="View fullscreen"><i class="gi gi-fullscreen"></i></a>
                        </div>
                        <h2><strong>Available </strong>Tenders</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-left"> Ref Number</th>
                                    <th class="text-left">Title</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Expiry Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if ($avail_tender_data) : ?>
                                    <?php foreach ($avail_tender_data as $k => $v) : ?>
                                        <tr>
                                            <td class="text-left" data-toggle="tooltip" title="Entity: <?php echo $v['tender_info']['propEntity'] ?>"><?php echo $v['tender_info']['propNumber'] ?></td>
                                            <td class="text-left" data-toggle="tooltip" title="Entity: <?php echo $v['tender_info']['propEntity'] ?>"><a href="<?php echo $v['tender_info']['propLink'] ?>" target="_blank"><?php echo $v['tender_info']['propTitle'] ?></a></td>
                                            <td class="text-center" data-toggle="tooltip" title="<?php echo $v['tender_info']['propCategoryOriginal'] ?>"><?php echo $v['tender_info']['propCategoryNew'] ?></td>
                                            <td class="text-center"><?php echo $v['tender_info']['propCloseDate'] ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ($v['tender_info']['propStatus'] == "open") :
                                                    echo '<span class="label label-info">open</span>';
                                                elseif ($v['tender_info']['propStatus'] == "closed") :
                                                    echo '<span class="label label-danger">closed</span>';
                                                endif
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a> -->
                                                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a> -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            <?php elseif ($this->input->get('opt') == "exptnds") : ?>
                <div class="block full">
                    <div class="block-title">
                        <div class="block-options pull-right">
                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen" title="View fullscreen"><i class="gi gi-fullscreen"></i></a>
                        </div>
                        <h2><strong>Closed </strong>Tenders</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-left"> Ref Number</th>
                                    <th class="text-left">Title</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Expiry Date</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($closed_tender_data) : ?>
                                    <?php foreach ($closed_tender_data as $k => $v) : ?>
                                        <tr>
                                            <td class="text-left" data-toggle="tooltip" title="Entity: <?php echo $v['tender_info']['propEntity'] ?>"><?php echo $v['tender_info']['propNumber'] ?></td>
                                            <td class="text-left" data-toggle="tooltip" title="Entity: <?php echo $v['tender_info']['propEntity'] ?>"><a href="<?php echo $v['tender_info']['propLink'] ?>" target="_blank"><?php echo $v['tender_info']['propTitle'] ?></a></td>
                                            <td class="text-center" data-toggle="tooltip" title="<?php echo $v['tender_info']['propCategoryOriginal'] ?>"><?php echo $v['tender_info']['propCategoryNew'] ?></td>
                                            <td class="text-center"><?php echo $v['tender_info']['propCloseDate'] ?></td>
                                            <td class="text-center">
                                                <?php if ($v['tender_info']['propStatus'] == "open") : ?>
                                                    <span class="label label-info">open</span>
                                                <?php elseif ($v['tender_info']['propStatus'] == "closed") : ?>
                                                    <span class="label label-danger">closed</span>
                                                <?php endif ?>
                                            </td>
                                            <td></td>
                                        </tr>

                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php elseif ($this->input->get('opt') == "schldovttnds") : ?>
                <div class="block full">
                    <div class="block-title">
                        <div class="block-options pull-right">
                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen" title="View fullscreen"><i class="gi gi-fullscreen"></i></a>
                        </div>
                        <h2><strong>Scheduled </strong></h2>
                    </div>
                    <div class="table-responsive">
                        <div id="message"></div>
                        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-left"> Ref Number</th>
                                    <th class="text-left">Title</th>
                                    <th class="text-left">Content</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Expiry Date</th>
                                    <th class="text-center">Send Date</th>
                                    <th class="text-center">Send Time</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if ($scheduled_tender_data) : ?>
                                    <?php foreach ($scheduled_tender_data as $k => $v) : ?>
                                        <tr>
                                            <td class="text-left" data-toggle="tooltip" title="Entity: <?php echo $v['tender_info']['propEntity'] ?>"><?php echo $v['tender_info']['propNumber'] ?></td>
                                            <td class="text-left" data-toggle="tooltip" title="Entity: <?php echo $v['tender_info']['propEntity'] ?>"><a href="<?php echo $v['tender_info']['propLink'] ?>" target="_blank"><?php echo $v['tender_info']['propTitle'] ?></a></td>
                                            <td class="text-left"><?php echo htmlspecialchars($v['tender_info']['tend_content']) ?></td>
                                            <td class="text-center" data-toggle="tooltip" title="<?php echo $v['tender_info']['propCategoryOriginal'] ?>"><?php echo $v['tender_info']['tend_category'] ?></td>
                                            <td class="text-center"><?php echo $v['tender_info']['propCloseDate'] ?></td>
                                            <td class="text-center"><?php echo $v['tender_info']['tend_send_date'] ?></td>
                                            <td class="text-center"><?php echo $v['tender_info']['tend_send_time'] ?></td>
                                            <!-- <td class="text-center">
                                                <?php
                                                // if ($v['tender_info']['tend_status'] == "scheduled") :
                                                // echo '<span class="label label-default">scheduled</span>';
                                                // elseif ($v['tender_info']['tend_status'] == "sent") :
                                                // echo '<span class="label label-primary">sent</span>';
                                                // endif
                                                ?>
                                            </td> -->
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a type="button" data-toggle="modal" data-target="#UpdateMessageModal" onclick='updateMessage(`<?php echo  $v["tender_info"]["tid"]; ?>`);'> <i class="glyphicon glyphicon-edit"></i> Edit </a></li>
                                                        <!-- <li><a type="button" data-toggle="modal" data-target="#UpdateMessageModal" onclick='updateMessage("`<?php echo $v["tender_info"]["tid"]; ?>`")' <i class="glyphicon glyphicon-edit"></i> Edit </a></li> -->
                                                        <li><a type="button" data-toggle="modal" data-target="#deleteModal" onclick='deleteMessage(`<?php echo  $v["tender_info"]["tid"]; ?>`); '><i class="glyphicon glyphicon-trash"></i> Delete</a></li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            <?php elseif ($this->input->get('opt') == "sntovttnds") : ?>
                <div class="block full">
                    <div class="block-title">
                        <div class="block-options pull-right">
                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen" title="View fullscreen"><i class="gi gi-fullscreen"></i></a>
                        </div>
                        <h2><strong>Sent </strong>Overtime</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-left"> Ref Number</th>
                                    <th class="text-left">Title</th>
                                    <th class="text-left">Content</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Expiry Date</th>
                                    <th class="text-center">Send Date</th>
                                    <th class="text-center">Send Time</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if ($sent_tender_data) : ?>
                                    <?php foreach ($sent_tender_data as $k => $v) : ?>
                                        <tr>
                                            <td class="text-left" data-toggle="tooltip" title="Entity: <?php echo $v['tender_info']['propEntity'] ?>"><?php echo $v['tender_info']['propNumber'] ?></td>
                                            <td class="text-left" data-toggle="tooltip" title="Entity: <?php echo $v['tender_info']['propEntity'] ?>"><a href="<?php echo $v['tender_info']['propLink'] ?>" target="_blank"><?php echo $v['tender_info']['propTitle'] ?></a></td>
                                            <td class="text-left"><?php echo htmlspecialchars($v['tender_info']['tend_content']) ?></td>
                                            <td class="text-center" data-toggle="tooltip" title="<?php echo $v['tender_info']['propCategoryOriginal'] ?>"><?php echo $v['tender_info']['tend_category'] ?></td>
                                            <td class="text-center"><?php echo $v['tender_info']['propCloseDate'] ?></td>
                                            <td class="text-center"><?php echo $v['tender_info']['tend_send_date'] ?></td>
                                            <td class="text-center"><?php echo $v['tender_info']['tend_send_time'] ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ($v['tender_info']['tend_status'] == "scheduled") :
                                                    echo '<span class="label label-default">scheduled</span>';
                                                elseif ($v['tender_info']['tend_status'] == "sent") :
                                                    echo '<span class="label label-primary">sent</span>';
                                                endif
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            <?php elseif ($this->input->get('opt') == "sms") : ?>
                <div id="form">
                    <div class="block">
                        <!-- Compose SMS Title -->
                        <div class="block-title">
                            <div class="block-options pull-right">
                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen" title="View fullscreen"><i class="gi gi-fullscreen"></i></a>
                            </div>
                            <h2>Schedule <strong>Tender</strong></h2>
                        </div>
                        <!-- END Compose SMS Title -->

                        <!-- Compose SMS Content -->
                        <form action="<?= base_url('Tenders/compose') ?>" method="post" class="form-horizontal form-bordered" id="compose-tender" autocomplete="off" autofocus>

                            <div class="form-group">
                                <div id="sms-message"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-lg-2 control-label" for="tender-name">Select Tender (tender reference number)</label>
                                <div class="col-md-6 col-lg-6">
                                    <select id="tender-name" name="tender-name" class="form-control form-control-borderless select-chosen" data-placeholder="Choose tender reference number" style="width: 400px;">
                                        <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->

                                        <?php if ($avail_tender_data) : ?>
                                            <?php foreach ($avail_tender_data as $k => $v) : ?>
                                                <option value="<?php echo $v['tender_info']['propTenderID'] ?>"><?php echo $v['tender_info']['propNumber'] . " (TITLE: " . $v['tender_info']['propTitle'] . ")" ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-lg-2 control-label" for="time">Tender Category</label>
                                <div class="col-md-6 col-lg-6">
                                    <select id="category" name="category" class="form-control form-control-borderless select-chosen" data-placeholder="Choose tender category" style="width: 250px;">
                                        <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->

                                        <option value="goods">goods</option>
                                        <option value="services">services</option>
                                        <option value="works">works</option>
                                        <option value="consultancy">consultancy</option>
                                    </select>
                                </div>
                            </div>


                            <!-- the old flexible time in 24h -->
                            <!-- <div class="form-group">
                            <label class="col-md-3 col-lg-2 control-label" for="example-timepicker24">Select Time (24h)</label>
                            <div class="col-md-6 col-lg-6">
                                <div class="input-group bootstrap-timepicker">
                                    <input type="text" id="example-timepicker24" name="example-timepicker24" class="form-control input-timepicker24">
                                    <span class="input-group-btn">
                                        <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div> -->

                            <div class="form-group">
                                <label class="col-md-3 col-lg-2 control-label" for="time">Select Time</label>
                                <div class="col-md-6 col-lg-6">
                                    <select id="time" name="time" class="form-control form-control-borderless select-chosen" data-placeholder="Choose time" style="width: 250px;">
                                        <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->

                                        <option value="morning">morning</option>
                                         <option value="evening">evening</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-lg-2 control-label" for="date">Select Date</label>
                                <div class="col-md-6 col-lg-6">
                                    <input type="text" id="date" name="date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 col-lg-2 control-label" for="compose-message">Message</label>
                                <div class="col-md-8 col-lg-8">
                                    <div class="pull-left">
                                        <div id="charNum"></div>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#modal-tender-help" data-toggle="modal">
                                            <small><i class="fa fa-question fa-fw"></i> view sending format (tenders)</small>
                                        </a>
                                    </div>
                                    <textarea id="compose-message" name="compose-message" rows="12" class="form-control" placeholder="Your Tender/SMS.." onkeyup="countChars(this);"></textarea>

                                </div>
                            </div>


                            <div class="form-group form-actions">
                                <div class="col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-share"></i> Send</button>
                                </div>
                            </div>
                        </form>
                        <!-- END Compose SMS Content -->
                    </div>
                </div>
            <?php endif ?>
            <!-- END Tender List Block -->
        </div>
        <!-- END Messages List -->
    </div>
    <!-- END Inbox Content -->

    <div id="modal-tender-help" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="fa fa-question"></i> Sending Format (Tenders)</h2>
                </div>
                <!-- END Modal Header -->

                <!-- Modal Body -->
                <div class="modal-body">
                    <fieldset>
                        <legend><strong>Format</strong></legend>
                        <div class="alert alert-info alert-dismissable">
                            <ul class="fa-ul text-muted">
                                <li><i class="fa fa-check fa-li text-success"></i>(<a href="javascript:void(0)" class="alert-link">Category name</a>) eg GOODS </li>
                                <li><i class="fa fa-check fa-li text-success"></i>(<a href="javascript:void(0)" class="alert-link">Entity Name</a>) eg Bomas of Kenya </li>
                                <li><i class="fa fa-check fa-li text-success"></i>(<a href="javascript:void(0)" class="alert-link">Tender Reference Number : <sup><small>{followed by a colon}</small></sup>Tender Title</a>) eg BOK/PQ/10/2020-2022<b>:</b> PREQUALIFICATION OF SUPPLIERS 2020-2021 & 2021-2022</li>
                                <li><i class="fa fa-check fa-li text-success"></i>(<a href="javascript:void(0)" class="alert-link">Tender Link</a>) eg http://bit.ly/38I33EK (<b>NOTE:</b> use <a href="http://bit.ly" target="_blank">bit.ly</a> to convert original Tender links to short urls for sending via sms.)</li>
                                <li><i class="fa fa-check fa-li text-success"></i>(<a href="javascript:void(0)" class="alert-link">Tender Closing Date</a>) eg Closing Date: 2020-02-04 </li>
                            </ul>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><strong>Example</strong></legend>
                        <form action="javascript:void(0);" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">

                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea id="compose-message" name="compose-message" rows="12" class="form-control">GOODS
Bomas of Kenya 
BOK/PQ/10/2020-2022: PREQUALIFICATION OF SUPPLIERS 2020-2021 & 2021-2022
http://bit.ly/38I33EK
Closing Date: 2020-02-04</textarea>

                                </div>
                            </div>

                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                    <!-- <button type="submit" class="btn btn-sm btn-primary">Save Changes</button> -->
                                </div>
                            </div>
                        </form>
                    </fieldset>

                </div>
                <!-- END Modal Body -->
            </div>
        </div>
    </div>

    <!-- Modal Edit Scheduled Tender -->
    <div id="UpdateMessageModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h2 class="modal-title"> Update Scheduled Tender</h2>
                </div>
                <!-- END Modal Header -->

                <!-- Modal Body -->
                <div class="modal-body">
                    <div id="edit-tender-message"></div>
                    <fieldset>
                        <table class="table table-vcenter table-condensed table-bordered">
                            <tr>
                                <th>Ref Number</th>
                                <td>
                                    <!-- <input type="text" name="refNumber" id="refNumber"> -->
                                    <div id="refNumber"></div>
                                </td>
                            </tr>
                            <tr>
                                <th>Tender Title</th>
                                <td>
                                    <div id="TendTitle"></div>
                                </td>
                            </tr>
                            <tr>
                                <th>Tender Category</th>
                                <td>
                                    <div id="TendCat"></div>
                                </td>
                            </tr>
                            <tr>
                                <th>Tender Closing Date</th>
                                <td>
                                    <div id="TendClos"></div>
                                </td>
                            </tr>
                            <tr>
                                <th>Send Date</th>
                                <td>
                                    <div id="sendDate"></div>
                                </td>
                            </tr>
                            <tr>
                                <th>Send Time</th>
                                <td>
                                    <div id="sendTime"></div>
                                </td>
                            </tr>

                        </table>
                    </fieldset>

                    <legend><strong>Tender Message</strong></legend>
                    <fieldset>
                        <form action="<?= base_url('Tenders/updateInfo') ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" id="updateTenderForm">

                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea id="update-tender-message" name="update-tender-message" rows="12" class="form-control"></textarea>

                                </div>
                            </div>

                            <div class="form-group form-actions">
                                <div class="col-xs-12 text-right">
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </fieldset>

                </div>
                <!-- END Modal Body -->
            </div>
        </div>
    </div>

    <!-- delete scheduled message -->
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: red;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color: white;" aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color: white;">Delete Message</h4>
                </div>
                <div class="modal-body">
                    <div id="remove-messages"></div>
                    <p>Do you really want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="deleteMessageBtn">Delete</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(document).ready(function() {
            var base_url = $("#base_url").val();
            var request = $("#request").text();
            // document.getElementById("tendersNavDropdown").style.display = "none";

            $('#tendersNav').addClass('active');

            if (request == 'alltnds') {
                $('#allTenders').addClass('active');
            } else if (request == 'avltnds') {
                $('#availTenders').addClass('active');
            } else if (request == 'exptnds') {
                $('#expTenders').addClass('active');
            } else if (request == 'schldovttnds') {
                $('#schldOvTenders').addClass('active');
            } else if (request == 'sntovttnds') {
                $('#sntOvTenders').addClass('active');
            }

            $('#compose-tender').unbind('submit').bind('submit', function() {
                var form = $(this);
                var url = form.attr('action');
                var type = form.attr('method');

                $.ajax({
                    url: url,
                    type: type,
                    data: form.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            if (response.code == 02) {
                                $("#sms-message").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                    response.messages +
                                    '</div>');
                                // $("#form").load(" #form > *");
                                setTimeout(function() {
                                    window.location = '<?= base_url("tenders?opt=sms"); ?>';
                                }, 3000);
                            } else {
                                $("#sms-message").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                    response.messages +
                                    '</div>');

                                $(".form-group").removeClass('has-danger').removeClass('has-success');
                                $(".text-danger").remove();
                                // $("#form").load(" #form > *");

                                setTimeout(function() {
                                    window.location = '<?= base_url("tenders?opt=sms"); ?>';
                                }, 5000);

                                // clearMessageForm();

                                setTimeout(function() {
                                    $("#menu").load(" #menu > *");

                                }, 2000);

                            }

                        } else {
                            $.each(response.messages, function(index, value) {

                                var key = $("#" + index);

                                key.closest('.form-group')
                                    .removeClass('has-danger')
                                    .removeClass('has-success')
                                    .addClass(value.length > 0 ? 'has-danger bmd-form-group is-focused' : 'has-success')
                                    .find('.text-danger').remove();

                                key.after(value);

                            });
                        }
                    }
                });
                return false;
            });

        });


        function updateMessage(id = null) {

            if (id) {


                $(".form-group").removeClass('has-error').removeClass('has-success');
                $('.text-danger').remove();


                $.ajax({
                    url: '<?= base_url() ?>' + 'Tenders/fetchTenderData/' + id,
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {

                        $('#refNumber').html(response.refNumber);
                        $('#TendTitle').html(response.title);
                        $('#TendCat').html(response.category);
                        $('#TendClos').html(response.expiry);
                        $('#sendDate').html(response.send_date);
                        $('#sendTime').html(response.send_time);
                        $('#update-tender-message').val(response.message);



                        $("#updateTenderForm").unbind('submit').bind('submit', function() {
                            var form = $(this);
                            var url = form.attr('action');
                            var type = form.attr('method');

                            $.ajax({
                                url: url + '/' + id,
                                type: type,
                                data: form.serialize(),
                                dataType: 'json',
                                success: function(response) {
                                    if (response.success == true) {
                                        $("#edit-tender-message").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                            response.messages +
                                            '</div>');

                                        setTimeout(function() {
                                            window.location = '<?= base_url("tenders?opt=schldovttnds"); ?>';
                                        }, 3000);

                                        $('.form-group').removeClass('has-error').removeClass('has-success');
                                        $('.text-danger').remove();
                                    } else {
                                        if (response.messages instanceof Object) {
                                            $.each(response.messages, function(index, value) {
                                                var key = $("#" + index);

                                                key.closest('.form-group')
                                                    .removeClass('has-error')
                                                    .removeClass('has-success')
                                                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                                    .find('.text-danger').remove();

                                                key.after(value);

                                            });
                                        } else {
                                            $("#edit-tender-message").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                                response.messages +
                                                '</div>');
                                        }
                                    } // /else
                                } // /success
                            }); // /ajax
                            return false;
                        }); // /submit the tender information form


                    } // /success

                }); // /ajax

            } // /if 
            else {
                alert('no id');
            }
        }

        function deleteMessage(id = null) {
            if (id) {
                $("#deleteMessageBtn").unbind('click').bind('click', function() {
                    $.ajax({
                        url: '<?= base_url() ?>' + 'Tenders/remove/' + id,
                        type: 'post',
                        dataType: 'json',
                        success: function(response) {
                            if (response.success == true) {
                                $("#message").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                    response.messages +
                                    '</div>');

                                // ScheduledTable.ajax.reload(null, false);
                                $("#deleteModal").modal('hide');

                                setTimeout(function() {
                                    window.location = '<?= base_url("tenders?opt=schldovttnds"); ?>';
                                }, 3000);
                            } else {
                                $("#message").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                    response.messages +
                                    '</div>');

                                setTimeout(function() {
                                    $('#message').html('');
                                }, 5000);
                            }
                        } // /response
                    }); // /ajax
                }); // /remove teacher button clicked of the modal button
            } // /if
        }


        function clearMessageForm() {
            $('input[type="text"]').val('');
            $('input[type="email"]').val('');
            $('input[type="password"]').val('');
            $('input[type="datetime-local"]').val('');
            $('input[type="time"]').val('');
            $('textarea').val('');
            $('select').val('');
            $(".fileinput-remove-button").click();
        }

        function countChars(obj) {
            var maxLength = 160;
            var strLength = obj.value.length;
            var charRemain = (maxLength - strLength);

            if (charRemain < 0) {
                document.getElementById("charNum").innerHTML = '<span class="label label-danger">You have exceeded the limit of ' + maxLength + ' characters by ' + charRemain + ' characters</span>';
            } else {
                document.getElementById("charNum").innerHTML = '<span class="label label-success">' + charRemain + ' characters remaining </span>';
            }
        }
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
    </script>>