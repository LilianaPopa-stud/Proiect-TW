<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
	<head>
  		<title>Login</title>
		<meta charset="UTF-8" />
		<meta content="width=device-width, initial-scale=1" name="viewport" />
  		<link rel="stylesheet" type="text/css" href="styles/login_signup.css">
		<link rel="stylesheet" type="text/css" href="../styles/style.css">
		<link rel="stylesheet" type="text/css" href="../styles/mediaStyle.css">
		<link href="http://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
    	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="header">
  			<h2>Login</h2>
			<h3>Welcome back!</h3>
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
  						<button type="submit" class="btn regBtn" name="login_user"><span>Login</span></button>
						<button onclick="window.location = '<?php echo $login_url;?>'" type="button" class="btn googleBtn"><span>Login with Google</span></button>
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