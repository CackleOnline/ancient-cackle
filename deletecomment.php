<?php 
    session_start();
    if(isset($_GET['comment'])){
    if($id == 3){
    
        $removesql = "DELETE FROM comments WHERE comment_id = '".$_GET['comment']."'";
    
        mysqli_query($connection, $removesql);
        header("location: index.php");
    }
    
    if($id == 2){
        header("location: /cackle/");
    }
    
    if($id == 1){
        header("location: /cackle/");
    }
    
    if($id == 0){
        header("location: /cackle/");
    }
    }
    