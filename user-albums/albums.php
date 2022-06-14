<?php include('addAlbum.php');?>

<!DOCTYPE html5>
<html lang="en">
    <head>
        <title>Albums</title>
        <meta charset="UTF-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/mediaStyle.css">
        <link rel="stylesheet" href="styles/albums.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href="http://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar">
            <div class="logo">BPIC</div>
            <div class="menu">
                    <a href="../registration/index.php"><i class="fa fa-home" > Home </i></a>
                    <a href="albums.php" class="active"><i class="fa fa-folder"> Albums </i> </a>
                    <a href="../account/user.php"><i class="fa fa-user"> User </i></a>
            </div>
        </nav>

        <div class="wrapper">
            <div class="cover">
                <p>Album gallery</p>
            </div>
            <div class="gallery">
                <button class="album add-album" onclick="openForm()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"/></svg>
                    Add new album
                </button>

                <?php
                if(isset($_SESSION['albums'])){
                    foreach($_SESSION['albums'] as $albumName){
                        echo
                        '<a href="album.php?name='.$albumName.'"><div class="album">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M528 32H144c-26.51 0-48 21.49-48 48v256c0 26.51 21.49 48 48 48H528c26.51 0 48-21.49 48-48v-256C576 53.49 554.5 32 528 32zM223.1 96c17.68 0 32 14.33 32 32S241.7 160 223.1 160c-17.67 0-32-14.33-32-32S206.3 96 223.1 96zM494.1 311.6C491.3 316.8 485.9 320 480 320H192c-6.023 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.332-16.68l70-96C252.1 194.4 256.9 192 262 192c5.111 0 9.916 2.441 12.93 6.574l22.35 30.66l62.74-94.11C362.1 130.7 367.1 128 373.3 128c5.348 0 10.34 2.672 13.31 7.125l106.7 160C496.6 300 496.9 306.3 494.1 311.6zM456 432H120c-39.7 0-72-32.3-72-72v-240C48 106.8 37.25 96 24 96S0 106.8 0 120v240C0 426.2 53.83 480 120 480h336c13.25 0 24-10.75 24-24S469.3 432 456 432z"/></svg>
                            <div class="name">', $albumName, '</div>
                        </div></a>'
                        ;

                    }
                }
                ?>
            </div>

        </div>

        <div class="form-popup" id="newAlbumForm">
            <form method="post" action="albums.php" class="form-container">
                <?php include('../registration/errors.php'); ?>
                <h1>Add new album</h1>
                <label for="album_name">Album name</label>
                <input type="text" placeholder="Enter album name" name="album_name" required>

                <button type="submit" class="btn" name="add_album">Add album</button>
                <button type="button" class="btn" onclick="closeForm()">Close</button>
            </form>
        </div>
        <script src="scripts/album.js">
        </script>

    </body>
</html>