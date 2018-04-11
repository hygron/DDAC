 <?php  
 $connect = mysqli_connect("dddac-tp038206.mysql.database.azure.com", "tp038206@ddac-tp038206", "Admin123", "db_admin");  
 $sql = "SELECT * FROM agent";  
 $result = mysqli_query($connect, $sql);
 $sql2 = "SELECT * FROM customer";
 $result2 = mysqli_query($connect, $sql2);
 ?>
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
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
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
  <!-- Agent Table -->
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>Agent List</b></h3>					  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php if($this->uri->segment(2) == "fail_insert3"){
					echo '<p class="text-danger">Fail to add Agent</p>';
				}?>	
				<?php if($this->uri->segment(2) == "inserted3"){
					echo '<p class="text-success">Successfully added Agent</p>';
				}?>	
				<?php if($this->uri->segment(2) == "deleted3"){
					echo '<p class="text-success">Successfully delete record</p>';
				}?>				
              <table id="status" class="table table-condensed table-striped">
                <thead>
                <tr>
				  <th> ID</th>
                  <th> Username</th>
				  <th> Password</th>
                  <th> Full Name</th>
				  <th>Contact Number</th>            
				  <th>Address</th>
				  <th>Edit</th>
				  <th>Delete</th>				  
                </tr>
                </thead>
                <tbody>
				<?php if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
				?>				
                <tr>
                    <td><?php echo $row["agent_id"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["password"]; ?></td>
                    <td><?php echo $row["full_name"]; ?></td>
                    <td><?php echo $row["contact"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><a href="<?php echo base_url(); ?>index.php/admin/update_agent/<?php echo $row["agent_id"]; ?>"> Edit</a></td>
                    <td><button type="button" class="btn btn-block btn-xs delete_agent" id="<?php echo $row["agent_id"]; ?>"> Delete</button></td>
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
			</div>
          <div class="box">
            <div class="box-header">
                <h3 class="box-title"><b>Customer List</b></h3>					  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php if($this->uri->segment(2) == "fail_insert4"){
					echo '<p class="text-danger">Fail to add Customer</p>';
				}?>	
				<?php if($this->uri->segment(2) == "inserted4"){
					echo '<p class="text-success">Successfully added Customer</p>';
				}?>	
				<?php if($this->uri->segment(2) == "deleted4"){
					echo '<p class="text-success">Successfully delete record</p>';
				}?>				
              <table id="status1" class="table table-condensed table-striped">
                <thead>
                <tr>
				  <th> ID</th>
                  <th> Full Name</th>
				  <th> Contact Number</th>
                  <th> Email</th>
				  <th> Address</th>
				  <th>Register Person</th>
				  <th>Edit</th>
				  <th>Delete</th>				  
                </tr>
                </thead>
                <tbody>
				<?php if(mysqli_num_rows($result2) > 0){
					while($row = mysqli_fetch_array($result2)){
				?>						
                <tr>
                    <td><?php echo $row["customer_id"]; ?></td>
                    <td><?php echo $row["customer_name"]; ?></td>
                    <td><?php echo $row["customer_contact"]; ?></td>
                    <td><?php echo $row["customer_email"]; ?></td>
                    <td><?php echo $row["customer_address"]; ?></td>
                    <td><?php echo $row["register_agent"]; ?></td>
                    <td><a href="<?php echo base_url(); ?>index.php/admin/update_customer/<?php echo $row["customer_id"]; ?>"> Edit</a></td>
                    <td><button type="button" class="btn btn-block btn-xs delete_customer" id="<?php echo $row["customer_id"]; ?>"> Delete</button></td>
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
			  	<button type="button" class="btn btn-file btn-sm" data-toggle="modal" data-target="#myModal1">
                                    <i class="fa fa-plus-circle"></i> <b>New</b>
				</button>
			  </div>
            </div>
            <!-- /.box-body -->
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
 <!-- /.content -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>New Agent</b></h4>
      </div>
      <div class="modal-body">
	  <form method="post" action="<?php echo base_url()?>index.php/admin/form_validation3">
        <div class="form-group">
            <span class="input-group-addon">Username</span>
            <input type="text" class="form-control" name="agent_username" placeholder="Agent Username">			
        </div>	
        <div class="form-group">
            <span class="input-group-addon">Password</span>
            <input type="text" class="form-control" name="agent_password" placeholder="Agent Password">			
        </div>
        <div class="form-group">
            <span class="input-group-addon">Full Name</span>
            <input type="text" class="form-control" name="agent_full_name" placeholder="Agent Full Name">			
        </div>
        <div class="form-group">
            <span class="input-group-addon">Contact Number</span>
            <input type="text" class="form-control" name="agent_contact" placeholder="Agent Contact Number">			
        </div>
        <div class="form-group">
            <span class="input-group-addon">Address</span>
            <input type="text" class="form-control" name="agent_address" placeholder="Agent Address">			
        </div>		
      </div>	  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="insert" value="Insert"/>
      </div>
	  </form>
    </div>
  </div>
</div>
 <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><b>New Customer</b></h4>
      </div>
      <div class="modal-body">
	  <form method="post" action="<?php echo base_url()?>index.php/admin/form_validation4">
        <div class="form-group">
            <span class="input-group-addon">Full Name</span>
            <input type="text" class="form-control" name="customer_name" placeholder="Customer Full Name">			
        </div>	
        <div class="form-group">
            <span class="input-group-addon">Contact Number</span>
            <input type="text" class="form-control" name="customer_contact" placeholder="Customer Contact Number">			
        </div>
        <div class="form-group">
            <span class="input-group-addon">Email</span>
            <input type="text" class="form-control" name="customer_email" placeholder="Customer Email">			
        </div>
        <div class="form-group">
            <span class="input-group-addon">Address</span>
            <input type="text" class="form-control" name="customer_address" placeholder="Customer Address">			
        </div>	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<input type="hidden" name="register_agent" value="<?php echo $_SESSION['username'];?>">
        <input type="submit" class="btn btn-primary" name="insert" value="Insert"/>
      </div>
	  </form>
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
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#status').DataTable()
	$('#status1').DataTable()
  })
  $(document).ready(function(){
	  $('.delete_agent').click(function(){
		  var id = $(this).attr("id");
		  if(confirm("Are you sure you want to delete this record?")){
			window.location="<?php echo base_url(); ?>index.php/admin/delete_agent/"+id;
		  }else{
			return false; 
		  }
	  });
  });
  $(document).ready(function(){
	  $('.delete_customer').click(function(){
		  var id = $(this).attr("id");
		  if(confirm("Are you sure you want to delete this record?")){
			window.location="<?php echo base_url(); ?>index.php/admin/delete_customer/"+id;
		  }else{
			return false; 
		  }
	  });
  });  
</script>
</body>
</html>