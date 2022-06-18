<?php 
include('server.php');
require_once('../config.php'); ?>
<!DOCTYPE html>
<html>
	<head>
  		<title>Sign up</title>
		  <meta charset="UTF-8" />
		  <link rel="stylesheet" type="text/css" href="styles/signup.css">
	</head>
	<body>
  		<div class="header">
  			<h2>Signup</h2>
  		</div>
	
  		<div class="split-screen">
  			<div class="left">
       			 <img class="ilustration" src="flame-photographing.png">
        		<section class="copy">       
            		<h1>BPIC</h1>
            		<p>The perfect gallery</p>
        		</section>
    		</div>
			 <div class="right">
  				<form method="post" action="signup.php">
  					<?php include('errors.php'); ?>
  					<div class="input-group">
  	  					<label>Username</label>
  	  					<input type="text" name="username" value="<?php echo $username; ?>">
  					</div>
  					<div class="input-group">
  	  					<label>Email</label>
  	  					<input type="email" name="email" value="<?php echo $email; ?>">
  					</div>
  					<div class="input-group">
  	  					<label>Password</label>
  	  					<input type="password" name="password_1">
  					</div>
  					<div class="input-group">
  	  					<label>Confirm password</label>
  	  					<input type="password" name="password_2">
  					</div>
  					<div class="input-group">
  			  			<button type="submit" class="btn" name="reg_user">Register</button>
  					</div>
					<button onclick="window.location = '<?php echo $login_url;?>'" type="button" class="btn btn-danger">Signup with Google</button>
  					<p>
  						Already a member? <a href="login.php">Sign in</a>
  					</p>
					<p class="credits"> &#169; Illustration by 
						<a href="https://icons8.com/illustrations/author/eEbrZFlkyZbD">Anna Antipina</a> 
						from <a href="https://icons8.com/illustrations">Ouch!</a>
					</p>
  				</form>
			</div>	
		</div>
	</body>
</html>