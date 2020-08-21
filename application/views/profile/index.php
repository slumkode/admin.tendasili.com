<!-- Page content -->
<div id="page-content">
    <!-- Page Header -->


    <!-- END Page Header -->


    <div class="content-header content-header-media">
        <div class="header-section">
            <img src="<?php echo base_url('assets/proui/img/placeholders/avatars/avatar2.jpg') ?>" alt="Avatar" class="pull-right img-circle">
            <h1><?php echo $userData['fname'] . " " . $userData['lname'] ?> <br><small><?php echo $userData['email'] ?></small></h1>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="<?php echo base_url('assets/proui/img/placeholders/headers/profile_header.jpg') ?>" alt="header image" class="animation-pulseSlow">
    </div>

    <ul class="breadcrumb breadcrumb-top">
        <li></li>
        <li><?php echo $page_title ?></li>
    </ul>
    <!-- Profile Content -->
    <div class="row">

        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen" title="View fullscreen"><i class="gi gi-fullscreen"></i></a>
                    </div>
                    <h2><strong>Edit</strong> Profile</h2>
                </div>

                <fieldset>
                    <form action="<?php echo base_url('profile/updateProfile') ?>" id="updateProfileForm" method="post" class="form-horizontal form-bordered">

                        <div class="col-md-6 col-md-offset-3">
                            <legend>
                                <i class="fa fa-pencil fa-fw pull-left"></i>
                                <strong>Vital Info</strong>
                            </legend>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div id="update-profile-message"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="username">Username</label>
                            <div class="col-md-6">
                                <input type="text" id="username" name="username" class="form-control" value="<?php echo $userData['username']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">Email</label>
                            <div class="col-md-6">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email.." value="<?php echo $userData['email'] ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="fname">First Name</label>
                            <div class="col-md-6">
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter First Name.." value="<?php echo $userData['fname'] ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="lname">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter Last Name.." value="<?php echo $userData['lname'] ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="pull-right ">
                                    <button type="submit" class="btn btn-sm btn-primary"> Update Profile</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </fieldset>

                <fieldset>
                    <form action="<?php echo base_url('profile/changePassword') ?>" id="changePasswordForm" method="post" class="form-horizontal form-bordered">
                        <div class="col-md-6 col-md-offset-3">
                            <legend>
                                <i class="fa fa-asterisk fa-fw pull-left"></i>
                                <strong>Change Password</strong>
                            </legend>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div id="update-password-message"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="currentPassword">Current Password</label>
                            <div class="col-md-6">
                                <input type="password" id="currentPassword" name="currentPassword" class="form-control" lcfirst autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="newPassword">New Password</label>
                            <div class="col-md-6">
                                <input type="password" id="newPassword" name="newPassword" class="form-control" lcfirst autocomplete="off">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="confirmPassword">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" lcfirst autocomplete="off">

                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="pull-right ">
                                    <button type="submit" class="btn btn-sm btn-primary"> Change Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </fieldset>

            </div>
        </div>

    </div>
    <!-- END Profile Content -->

    <script>
        $(document).ready(function() {
            var base_url = $("#base_url").val();
            var request = $("#request").text();


        });
        $('#updateProfileForm').unbind('submit').bind('submit', function() {
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
                        $("#update-profile-message").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            response.messages +
                            '</div>');

                        $(".form-group").removeClass('has-danger').removeClass('has-success');
                        $(".text-danger").remove();
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
                } // success
            }); // ajax
            return false;
        });

        $('#changePasswordForm').unbind('submit').bind('submit', function() {
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
                        $("#update-password-message").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            response.messages +
                            '</div>');

                        $(".form-group").removeClass('has-danger').removeClass('has-success');
                        $(".text-danger").remove();
                        clearPasswordForm();

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

        function clearForm() {
            $('input[type="text"]').val('');
            $('input[type="email"]').val('');
            $('input[type="password"]').val('');
            $('select').val('');
            $(".fileinput-remove-button").click();
        }

        function clearPasswordForm() {
            $('input[type="password"]').val('');
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
    </script>