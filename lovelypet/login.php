<!DOCTYPE html>
<html lang="en">
<?php include 'header.php' ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/dist/css/adminlte.css">
    <style>
      body{
        background-image: url("./assets/dist/img/BGpets01.jpg");
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Lovely Pet Shop</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body" >
        <p class="login-box-msg" style="font-size: 1.3em">Sign in</p>
  
        <form action="" id="login-form">
          <p style="font-size: 1em">User name / Email</p> 
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" required placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <p style="font-size: 1em">Password</p> 
          <div class="input-group mb-3">
            
            <input type="password" class="form-control" name="password" required placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember" style="font-size: smaller; margin-bottom: 1.7rem; font-weight:10;">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col"  >
              <button type="submit" class="btn btn-primary btn-block" style="align-items: center; margin-bottom: 1.7rem;">Sign In</button>
            </div>
            <!-- /.col -->
         
        </form>
        <hr>
        <p class="mb-0" style="text-align: center; font-size: smaller; margin-top: 1.4rem;">
          <a href="signup.php" class="text-center" style="color: rgb(151, 151, 151);">Create Account</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
<!-- /.login-box -->
<script>
	$(document).ready(function(){
		$('#login-form').submit(function(e){
		e.preventDefault()
		start_load()
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
				end_load();

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					end_load();
				}
			}
		})
	})
	})
</script>
<?php include 'footer.php' ?>

</body>
</html>
