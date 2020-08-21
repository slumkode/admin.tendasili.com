<!-- Main Container -->
<div id="main-container">
    <!-- Header -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
    <header class="navbar navbar-inverse">
        <!-- Left Header Navigation -->
        <ul class="nav navbar-nav-custom">
            <!-- Main Sidebar Toggle Button -->
            <li>
                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                    <i class="fa fa-bars fa-fw"></i>
                </a>
            </li>
            <!-- END Main Sidebar Toggle Button -->

        </ul>
        <!-- END Left Header Navigation -->


        <!-- Right Header Navigation -->
        <ul class="nav navbar-nav-custom pull-right">

            <!-- User Dropdown -->

            <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url('assets/proui/img/placeholders/avatars/avatar.jpg') ?>" alt="avatar"> <i class="fa fa-angle-down"></i>
                    <!-- <img src="https://www.tendasili.com/wp-content/uploads/2020/07/tendasili-logo.png" alt="avatar"> <i class="fa fa-angle-down"></i> -->
                </a>
                <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                    <li class="dropdown-header text-center"><?php echo $userData['fname']." ".$userData['lname'] ?></li>
                    <li>
                        <a href="<?php echo base_url('profile') ?>">
                            <i class="fa fa-user fa-fw pull-right"></i>
                            Profile
                        </a>
                        <a href="<?php echo base_url('settings') ?>">
                            <i class="fa fa-cog fa-fw pull-right"></i>
                            Settings
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo base_url('auth/logout') ?>">
                            <i class="fa fa-power-off fa-fw pull-right"></i>
                            Log out
                        </a>
                    </li>

                </ul>
            </li>
            <!-- END User Dropdown -->
        </ul>
        <!-- END Right Header Navigation -->
    </header>
    <!-- END Header -->