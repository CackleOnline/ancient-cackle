<?php
include('header.php');

$connection = mysqli_connect('localhost', 'root', '', 'login');

$sqll = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";

$query2 = mysqli_query($connection, $sqll);

$q = mysqli_fetch_array($query2);

$id = $q['perms'];
if(isset($_GET['post'])){
if($id == 3){

    $removesql = "DELETE FROM posts WHERE post_id = '".$_GET['post']."'";

    mysqli_query($connection, $removesql);
    header("location: index.php");
}

if($id == 2){
    header("location: index.php");
}

if($id == 1){
    header("location: index.php");
}

if($id == 0){
    header("location: index.php");
}
}