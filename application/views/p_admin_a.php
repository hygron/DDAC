<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
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
  <!-- Content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Admin List</b></h3>					  
            </div>
            <!-- /.box-header -->
            <div class="box-body">															
				<?php if($this->uri->segment(2) == "fail_insert"){
					echo '<p class="text-danger">Fail to add Admin</p>';
				}?>	
				<?php if($this->uri->segment(2) == "inserted"){
					echo '<p class="text-success">Successfully added Admin</p>';
				}?>	
				<?php if($this->uri->segment(2) == "deleted"){
					echo '<p class="text-success">Successfully delete record</p>';
				}?>					
              <table id="status" class="table table-condensed table-striped">
                <thead>
                <tr>
                  <th>ID</th>
				  <th>Username</th>
                  <th>Password</th>
				  <th>Edit</th>
				  <th>Delete</th>
                </tr>
                </thead>				
                <tbody>
				<?php if($fetch_data->num_rows() > 0){
					foreach($fetch_data->result() as $row){				
				?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->username; ?></td>
                    <td><?php echo $row->password; ?></td>
                    <td><a href="<?php echo base_url(); ?>index.php/admin/update/<?php echo $row->id; ?>"> Edit</a></td>
                    <td><button type="button" class="btn btn-block btn-xs delete_data" id="<?php echo $row->id; ?>"> Delete</button></td>
                </tr>
				<?php }
					}else{?>
                <tr>
                  <td>No data found</td>
                </tr>
				<?php }?>				
                </tbody>
              </table>
			  <div class="box-body">
			  	<button type="button" class="btn btn-file btn-sm" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-plus-circle"></i> <b>New</b>
				</button>
			  </div>			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->		  
    </section>
    <!-- /.content -->
  </div>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>New Admin</b></h4>
      </div>
      <div class="modal-body">
	  <form method="post" action="<?php echo base_url()?>index.php/admin/form_validation">	  
        <div class="form-group">
            <span class="input-group-addon">Username</span>
            <input type="text" class="form-control" name="a_username" placeholder="Username">
        </div>
		<br>
        <div class="form-group">
            <span class="input-group-addon">Password</span>
            <input type="text" class="form-control" name="a_password" placeholder="Password">
        </div>
		<br>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="insert" value="Insert"/>
	  </form>
      </div>
    </div>
  </div>
</div>  
<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#status').DataTable()
  });
  $(document).ready(function(){
	  $('.delete_data').click(function(){
		  var id = $(this).attr("id");
		  if(confirm("Are you sure you want to delete this record?")){
			window.location="<?php echo base_url(); ?>index.php/admin/delete_data/"+id;
		  }else{
			return false; 
		  }
	  });
  });
</script>
</body>
</html>