<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: registration/login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: registration/login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" type="text/css" href="../styles/nav-bar.css">
    <link href="http://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/mediaStyle.css" />
    <link rel="stylesheet" href="styles/style.css" />
    
</head>
<body>
    <nav class="navbar">
        <div class="logo"><a href="index.php">BPIC</a></div>
        <div class="menu">
                <a href="index.php" class="active"><i class="fa fa-home" > Home </i></a>
                <a href="user-albums/albums.php"><i class="fa fa-folder"> Albums </i> </a>
                <a href="account/user.php"><i class="fa fa-user"> User </i></a>
        </div>
    </nav>
<div class="header">
    <h1> Galeria ta virtuala </h1>
    <p> Descopera BPIC</p>
</div>

        <div class="content">
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
            <?php  if (isset($_SESSION['username'])) : ?>
    	        <p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong>!</p>
    	        <button> <a href="index.php?logout='1'">logout</a> </button>
            <?php endif ?>
        </div>
        <div class="container searchField">
                <input type="text" placeholder="Search" class="search-field" id="searchbar"/>
                <button type="button" class="search-button" onclick="Redirect()">
                    <img src="resources/search.png" alt="">
                </button>
        </div>
        <div class="row">
        <div class="column">
            <img src="resources/1x/img1.png" alt="" style="width:100%">
            <img src="resources/1x/img9.png" alt="" style="width:100%">
            <img src="resources/1x/img8.png" alt="" style="width:100%">

        </div>
        <div class="column">
            <img src="resources/1x/img3.png" alt="" style="width:100%">
            <img src="resources/1x/img4.png" alt="" style="width:100%">
        </div>
        <div class="column">
            <img src="resources/1x/img5.png" alt="" style="width:100%">
            <img src="resources/1x/img7.png" alt="" style="width:100%">

        </div>
        <div class="column">
            <img src="resources/1x/img6.png" alt="" style="width:100%">
            <img src="resources/1x/img2.png" alt="" style="width:100%">
        </div>
    </div>
	<script src="registration/scripts/searchTag.js"></script>
    </body>
</html>