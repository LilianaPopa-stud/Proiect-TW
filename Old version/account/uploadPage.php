<?php include('actions/upload.php') ?>
<!DOCTYPE html5>

<html lang="en">
    <head>
        <title>Upload image</title>
    </head>
    <body>
        <form action="actions/uploadPage.php" method="post" enctype="multipart/form-data">
            <?php include('../registration/errors.php'); ?>
            <label for="file"> <i class="fa fa-plus"></i> Upload </label>
            <input type="file" name="image"/>
            <input type="submit" name="submit" value="Upload">
        </form>  
    </body>

</html>