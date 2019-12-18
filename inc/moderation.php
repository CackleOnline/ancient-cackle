<?php

$sqll = "SELECT * FROM users WHERE user_id = '".$_SESSION['id']."'";

$query2 = mysqli_query($conn, $sqll);

$q = mysqli_fetch_array($query2);

$id = $q['perms'];


if($id == 3){
    echo "<a href='deletepost.php?post=".$_GET['post']."'>Delete this post</a>";
}

if($id == 2){
    echo "";
}

if($id == 1){
    echo "";
}

if($id == 0){
    echo "";
}