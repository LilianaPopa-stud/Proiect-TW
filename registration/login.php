<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
	<head>
  		<title>Registration system PHP and MySQL</title>
  		<link rel="stylesheet" type="text/css" href="styles/login.css">
	</head>
	<body>
		<div class="header">
  			<h2>Login</h2>
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
				<!--
				<section class="copy">
					<h2>Welcome back!</h2>
				</section>
				-->
				<form method="post" action="login.php">
  					<?php include('errors.php'); ?>
  					<div class="input-group">
  						<label>Username</label>
  						<input type="text" name="username" >
  					</div>
  					<div class="input-group">
  						<label>Password</label>
  						<input type="password" name="password">
  					</div>
  					<div class="input-group">
  						<button type="submit" class="btn" name="login_user">Login</button>
  					</div>
  					<p>
  						Not yet a member? <a href="signup.php">Sign up</a>
  					</p>
					<p class="credits"> &#169; Illustration by <a href="https://icons8.com/illustrations/author/eEbrZFlkyZbD">Anna Antipina</a> from <a href="https://icons8.com/illustrations">Ouch!</a></p>
  				</form>
			</div>
		</div>  
	</body>
</html>