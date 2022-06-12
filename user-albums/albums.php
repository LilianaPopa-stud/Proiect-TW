<?php include('addAlbum.php') ?>

<!DOCTYPE html5>
<html lang="en">
    <head>
        <title>Albums</title>
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
        <script src="album.js">
        </script>

    </body>
</html>