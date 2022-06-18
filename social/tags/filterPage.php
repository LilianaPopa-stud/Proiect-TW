<?php
include_once 'fetchFilters.php';
    $url = $_SERVER['REQUEST_URI'];         
    $url_components = parse_url($url);

    parse_str($url_components['query'], $params);
    if($params['name'] == "")
        $filter = array();
    else $filter = explode(' ', $params['name']);
?>
<!DOCTYPE html5>
<html lang="en">
    <head>
        <title>Explore</title>
        <meta charset="UTF-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
	    <link rel="stylesheet" type="text/css" href="../styles/nav-bar.css">
        <link href="http://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../styles/mediaStyle.css" />
        <link rel="stylesheet" href="../../styles/style.css" />
        <link rel="stylesheet" href="../../user-albums/styles/album.css" />
    </head>
    <body>
        <nav class="navbar">
            <div class="logo">BPIC</div>
            <div class="menu">
                <a href="../../index.php" class="active"><i class="fa fa-home" > Home </i></a>
                <a href="../../user-albums/albums.php"><i class="fa fa-folder"> Albums </i> </a>
                <a href="../../account/user.php"><i class="fa fa-user"> User </i></a>
            </div>
        </nav>
        <div class="header">
            <h1> <?php 
                if(count($filter) == 0)
                    echo "You're not looking for anything...";
                else{
                    foreach($filter as $flt)
                    {
                        echo '#'.$flt.' ';
                    }
                }
             ?></h1>
        </div>
        <div class="wrapper">
        <div class="photo-gallery">
        <?php 
        if(count($filter) == 0) echo "Nothing found :(";
        else{
                $x = get_tagPhotos($filter);
                if(count($x) == 0) echo "<h1>Nothing found :/</h1>";
                foreach($x as $photo)
                {
                    $cardType = "";
                    $imgsize_arr = getimagesize('../../images/user-photos1/'.$photo->get_filename());
                    $img_width = $imgsize_arr[0];
                    $img_height = $imgsize_arr[1];
                    if($img_width > 5000)
                        $cardType = "card-wide";
                    else if($img_height > 3500)
                    {
                        $cardType = "card-tall";
                    }
                    $edits = $photo->get_edits(); 
                    if($edits == "unedited")
                        $edits = "";
                    //echo "Image width: ".$img_width."<br/>Image height:".$img_height;
                    echo '<div class="card '.$cardType.'" >';
                    echo '<a href = "../../account/photo.php?name='.$photo->get_filename().'&action=none&param=none">
                            <img src="../../images/user-photos1/'.$photo->get_filename().'" alt="'.$photo->get_filename().'"
                            style="filter:'.$edits.';">></a>';
                    echo '</div>';
                }}?>
            </div>
            </div>
    </body>

</html>