<?php
$sql1 = "SELECT * FROM likes where post_id = ".$_GET['post']." liker_id = ".$_SESSION['id']." ";
$gg2 = mysqli_query($con, $sql);
$gg3 = mysqli_fetch_array($gg2);
if(!isset($gg3)){
    if(isset($_POST['like'])){
        $qq = "INSERT INTO likes (post_id, liker_id) VALUES (".$_GET['post'].", ".$_SESSION['id'].");";
        mysqli_query($con, $qq);
    }
}
else{
    if(isset($_POST['like'])){
        $qq = "DELETE FROM likes WHERE post_id = ".$_GET['post']."  ;";
        mysqli_query($con, $qq);
    }
}