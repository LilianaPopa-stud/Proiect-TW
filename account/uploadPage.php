<?php include('actions/upload.php') ?>
<!DOCTYPE html5>

<html lang="en">
    <head>
        <title>Upload image</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../styles/style.css" />
        <link rel="stylesheet" href="../styles/styleUser.css" />
        <link rel="stylesheet" href="../styles/comment.css" />
        <link rel="stylesheet" href="../styles/photoUtilities.css" />
        <link rel="stylesheet" href="../styles/mediaStyle.css" />
        <link href="http://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    </head>
    <body>
        <nav class="navbar">
            <div class="logo">BPIC</div>
            <div class="menu">
                <a href="../index.php"><i class="fa fa-home"> Home </i></a>
                <a href="../user-albums/albums.php"><i class="fa fa-folder"> Albums </i> </a>
                <a href="user.php" class="active"><i class="fa fa-user"> User </i></a>
            </div>
        </nav>
        <form action="uploadPage.php" method="post" enctype="multipart/form-data">
            <?php include('../registration/errors.php'); ?>
            <label for="file"> <i class="fa fa-plus"></i> Upload </label>
            <input type="file" name="image"/>
            <input type="submit" name="submit" value="Upload">
        </form>  
    </body>

</html>