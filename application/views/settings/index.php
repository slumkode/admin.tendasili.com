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

        

    </div>
    <!-- END Profile Content -->

    <script>
        $(document).ready(function() {
            var base_url = $("#base_url").val();
            var request = $("#request").text();


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