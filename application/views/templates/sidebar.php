<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="<?php echo base_url('/dashboard') ?>" class="sidebar-brand">
                <span class="sidebar-nav-mini-hide"><strong>Tend</strong>Asili</span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="#">
                        <!-- <img src="<?php echo base_url('assets/proui/img/placeholders/avatars/avatar.jpg') ?>" alt="avatar"> -->
                        <img src="https://www.tendasili.com/wp-content/uploads/2020/07/tendasili-logo.png" alt="avatar">
                        
                    </a>
                </div>
                <div class="sidebar-user-name"><?php echo $userData['username'] ?></div>
                <div class="sidebar-user-links">
                    <a href="<?php echo base_url('profile') ?>" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                    <!-- <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a> -->
                    <a href="<?php echo base_url('settings') ?>" data-toggle="tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>
                    <a href="<?php echo base_url('auth/logout') ?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                </div>
            </div>
            <!-- END User Info -->

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a id="dashboardNav" href="<?php echo base_url('dashboard') ?>"><i class="fa fa-desktop sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                </li>

                <!-- Old SMS Nav -->
                <!-- <li>
                    <a id="smsNav" href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-envelope-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">SMS</span></a>
                    <ul id="smsNavDropdown" style="display: none;">
                        <li>
                            <a id="composeNav" href="<?php echo base_url('sms/compose') ?>">Compose message</a>
                        </li>
                        <li>
                            <a id="outboxNav" href="<?php echo base_url('sms/outbox') ?>">Outbox</a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li>
                    <a id="smsNav" href="<?php echo base_url('sms?opt=sms') ?>"><i class="fa fa-envelope-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">SMS</span></a>
                </li> -->

                <!-- Old Tenders Nav -->
                <!-- <li>
                    <a id="tendersNav" href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-briefcase sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Tenders</span></a>
                    <ul id="tendersNavDropdown" style="display: none;">
                        <li>
                            <a id="availableNav" href="<?php echo base_url('tenders/available') ?>">Available</a>
                        </li>
                        <li>
                            <a id="expiredNav" href="<?php echo base_url('tenders/expired') ?>">Expired</a>
                        </li>
                    </ul>
                </li> -->

                <li>
                    <a id="tendersNav" href="<?php echo base_url('tenders?opt=schldovttnds') ?>"><i class="gi gi-briefcase sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Tenders</span></a>
                </li>

                <li>
                    <a id="subscribersNav" href="<?php echo base_url('subscribers?opt=subd') ?>"><i class="fa fa-users sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Subscribers</span></a>
                </li>

                <!-- Settings link to implemented soon -->
                <!-- <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-wrench sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Settings</span></a>
                    <ul style="display: none;">
                        <li>
                            <a id="dashboardNav" href="<?php echo base_url('dashboard') ?>"><span class="sidebar-nav-mini-hide">Profile</span></a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>Users</a>
                            <ul style="display: none;">
                                <li>
                                    <a href="#">Change system theme</a>
                                </li>
                                <li>
                                    <a href="#">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->