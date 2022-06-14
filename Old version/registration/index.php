<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../styles/nav-bar.css">
    <link href="http://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/mediaStyle.css" />
    <link rel="stylesheet" href="../styles/style.css" />
    
</head>
<body>
    <nav class="navbar">
        <div class="logo">BPIC</div>
        <div class="menu">
                <a href="index.php" class="active"><i class="fa fa-home" > Home </i></a>
                <a href="../user-albums/albums.php"><i class="fa fa-folder"> Albums </i> </a>
                <a href="../account/user.php"><i class="fa fa-user"> User </i></a>
        </div>
    </nav>
<div class="header">
    <h1> Galeria ta virtuala </h1>
    <p> Descopera BPIC</p>
</div>
<div class="content">
  	<!-- notification message -->
  	    <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
      	        <h3>
                     <?php 
          	            echo $_SESSION['success']; 
          	            unset($_SESSION['success']);
                    ?>
      	        </h3>
            </div>
  	    <?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
    	    <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	    <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
        <?php endif ?>
        </div>
		
    </body>
</html>