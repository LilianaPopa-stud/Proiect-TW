<?php
$filename = $_POST['filename'];

$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
$query = "SELECT * FROM tags WHERE filename='".$filename."'";
$response = "";
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0){
    while($file = mysqli_fetch_assoc($result)){
            $response .= $file['tag'].",";
            $response .= $file['x'].",";
            $response .= $file['y'].";";
    }
}
echo $response;
?>