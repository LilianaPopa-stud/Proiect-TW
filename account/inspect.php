<?php
$url = $_SERVER['REQUEST_URI'];         
$url_components = parse_url($url);

parse_str($url_components['query'], $params);
$_SESSION['filename'] = $params['name'];
?>

<!DOCTYPE html5>
<html lang="en">
    <head>
        <title>
            Inspect
        </title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../styles/style.css" />
        <link rel="stylesheet" href="../styles/styleUser.css" />
        <link rel="stylesheet" href="../styles/comment.css" />
        <link rel="stylesheet" href="../styles/photoUtilities.css" />
        <link rel="stylesheet" href="../styles/mediaStyle.css" />
        <link rel="stylesheet" href="styles/photoPage.css" />
        <link rel="stylesheet" href="../user-albums/styles/albums.css" />
        <link href="http://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" href="styles/inspect.css" />
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
        <div class="imageSide">
            <canvas id="myCanvas" width="600" height="500"></canvas>
        </div>
        <div class="actionSide">
            <div class="displayBtns">
                <button id="showBtn">Show tags</button>
                <button id="hideBtn">Hide tags</button>
            </div>
            <div id="actionBtns">
                <h2 id="textDiv"></h2>
                <div id="btnDiv">
                    <button class="btn" id="confirmBtn">Confirm</button>
                </div>
                <input id="tagInput" class="tag_input" type="text">
                <button class="btn" id="addTag">Add tag</button>
            </div>
        
        </div>
        <script src="scripts/inspect.js"></script>

        <script>
            init(<?php echo '"'.$_SESSION['filename'].'"'; ?>);
        </script>
        
    </body>
</html>