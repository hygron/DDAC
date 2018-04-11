<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition sidebar-mini-expand-feature skin-red-light">
<div class="wrapper">
	<!-- Title -->
	<header class="main-header">   
    <a href="<?php echo base_url(); ?>index.php/admin/p_admin" class="logo">
      <span class="logo-mini"><b>M</b>L</span>
      <span class="logo-lg"><b><i>Maersk Line</i></b></span>
    </a>
    <!-- /.Title -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
	  <div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<li class="messages-menu">
				<a href= "<?php echo base_url(); ?>index.php/main/logout">Logout</a>
			</li>
		</ul>
	   </div>
    </nav>
  </header>
</div>
  <!-- sidebar --> 
  <aside class="main-sidebar">
    <section class="sidebar">
       
	  <ul class="sidebar-menu" data-widget="tree">
              <li class="header" ><font size="5">Welcome, <?php echo $_SESSION['username'];?></font></li>
		<li>
          <a href="<?php echo base_url(); ?>index.php/admin/p_admin_vm">
            <i class="fa fa-ship"></i><span>Ship</span>
          </a>
        </li>
		<li>
          <a href="<?php echo base_url(); ?>index.php/admin/p_admin_im">
            <i class="fa fa-truck"></i><span>Store</span>
          </a>
        </li>
                <li>
          <a href="<?php echo base_url(); ?>index.php/admin/p_admin_sm">
            <i class="fa fa-calendar"></i><span>Schedule</span>
          </a>
        </li>
		<li>
          <a href="<?php echo base_url(); ?>index.php/admin/p_admin_um">
            <i class="fa fa-users"></i><span>Users</span>
          </a>
        </li>		
		<li>
          <a href="<?php echo base_url(); ?>index.php/admin/p_admin_a">
            <i class="fa fa-user"></i><span>Admin </span>
          </a>
        </li>
	  </ul>
    </section> 
  </aside>
  <!-- /sidebar -->
  <div class="content-wrapper">
        <div class="row">
        <div class="col-md-6">
		<form action="" method="post">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title"><b>Edit Agent</b></h3>
            </div>
            <div class="box-body">          
              <div class="form-group">
                <label>Agent ID:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-navicon"></i>
                  </div>
                  <input type="text" class="form-control" name="agent_id" value="<?php echo $agent->agent_id?>">
                </div>      
              </div>  
              <div class="form-group">
                <label>Agent Username:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" name="agent_username" value="<?php echo $agent->username?>">
                </div>      
              </div>
              <div class="form-group">
                <label>Agent Password:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-lock"></i>
                  </div>
                  <input type="text" class="form-control" name="agent_password" value="<?php echo $agent->password?>">
                </div>      
              </div>
              <div class="form-group">
                <label>Agent Full Name:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" name="agent_full_name" value="<?php echo $agent->full_name?>">
                </div>      
              </div>
              <div class="form-group">
                <label>Agent Contact:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-mobile-phone"></i>
                  </div>
                  <input type="text" class="form-control" name="agent_contact" value="<?php echo $agent->contact?>">
                </div>      
              </div>
              <div class="form-group">
                <label>Agent Address:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <input type="text" class="form-control" name="agent_address" value="<?php echo $agent->address?>">
                </div>      
              </div>			  
			  <div class="modal-footer">
			  <input type="submit" class="btn btn-flat" name="update" value="Update"/>
			  </div> 			  
            </div>
          </div>
		  </form>
		</div>
	</div>	
</div>	
  <!-- jQuery 3 -->
<script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- page script -->
</body>
</html>