<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CI Real-Time Notification</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url('assets/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="<?php echo base_url('assets/AdminLTE.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url('assets/skin-blue.css'); ?>" rel="stylesheet" type="text/css"/>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="skin-blue layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="../../index2.html" class="navbar-brand"><b>Real-Time Notification</b> Example</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Link</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right" id="notif_container">
                        <li class="dropdown notifications-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notif_anchor">
                                <i class="fa fa-bell-o"></i>
                                <span id="notif_count" class="label label-danger">0</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu" id="notif_ul">
                                        <!-- <li>
                                          <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                          </a>
                                        </li>    -->
                                        <!--  AJAX call soon -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="<?php echo base_url('site/notif_all'); ?>">View all</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    CodeIgniter Real-Time Push Notification
                    <small>Example</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Buat Notifikasi Baru</h3>
                    </div>
                    <form role="form" id="form_notif">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Notif Info</label>
                                <input type="text" class="form-control" name="message" id="input_message"
                                       placeholder="Enter Message" required="">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" id="form_submit">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </section><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.0
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All
            rights reserved.
        </div><!-- /.container -->
    </footer>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url('assets/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/app.min.js'); ?>" type="text/javascript"></script>
<!-- file js utama -->
<script src="<?php echo base_url('assets/main.js'); ?>" type="text/javascript"></script>
<!-- file js untuk testing -->
<script src="<?php echo base_url('assets/test.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        window.setInterval(function () {
            notificationStream(
                1 // id user yang sedang login
            );
        }, 1000);
    });
</script>
</body>
</html>