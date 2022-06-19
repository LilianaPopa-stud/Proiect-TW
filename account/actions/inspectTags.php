<?php
$url = $_SERVER['REQUEST_URI'];         
$url_components = parse_url($url);

parse_str($url_components['query'], $params);
$filename = $params['name'];
if($params['action'] == "add")
    addInspectTag($filename, $params['tag'], $params['x'], $params['y']);
else if($params['action'] == "fetch")
    echo "fetch";

function addInspectTag($filename, $tag, $x, $y)
{
    $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
    $query = "INSERT INTO tags(filename, tag, x, y)
            VALUES ('$filename',
            '$tag', '$x', '$y')";
    mysqli_query($db, $query);
    header('Location: ../inspect.php?name='.$filename);
}
?>