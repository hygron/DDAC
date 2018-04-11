<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" href="<?php echo base_url()."bower_components/bootstrap/dist/css/bootstrap.css" ?>" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url()."dist/css/AdminLTE.min.css"; ?>" type="text/css"/>
		<style>
			.loginbox{
				margin: 250px auto;
				width: 500px;
                                height: auto;
				position: relative;
				border-radius: 10px;
				background: #ffffff;
			}
			body{
                                
				background-color: rgb(0,0,50);
                                
			}
		</style>
	</head>
	<body>
		  <!-- Horizontal Form -->
          <div class="box box-info loginbox">
            <div class="box-header with-border">
              <h3 style="text-align:center; font-family:verdana; font-size:25px; color:blue;"><b>Maerks Line</b></h3></br>
            
            </div>
            <!-- /.box-header -->
			<?php echo validation_errors('<div class="alert alert-danger">','</div>')?>
            <!-- form start -->
            <form class="form-control-static " method="POST" action="">
              <div class="box-body ">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                  
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="Username">					
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="insert" class="btn btn-github pull-right" value="Login">Login</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
	</body>
</html>