<?php
include('config/db.php');

if(isset($_POST['register'])){
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];
    $pwordr = $_POST['pwordr'];
    
    $unamec = filter_var($uname, FILTER_SANITIZE_STRING);
    $pwordc = filter_var($pword, FILTER_SANITIZE_STRING);
    $pwordrc = filter_var($pwordr, FILTER_SANITIZE_STRING);
    
    $uname1 = mysqli_escape_string($con, $unamec);
    $pword1 = mysqli_escape_string($con, $pwordc);
    $pwordr1 = mysqli_escape_string($con, $pwordrc);
    if(!empty($uname1) or !empty($pword1) or !empty($pwordr1)){
        if($pword1 === $pwordr1){
            $sql = "SELECT * FROM users WHERE uname = '$uname1' ;";
            $query = mysqli_query($con, $sql);
            $res = mysqli_fetch_array($query);
            $options = [
                'cost' => 12,
            ];
            $pword_hash = password_hash($pword1, PASSWORD_BCRYPT, $options);
            if(!isset($res['uname'])){
                $urlthing = preg_split("[/]", $_SERVER['HTTP_REFERER']);
                if($urlthing[2] === "localhost"){
                $insertq = "INSERT INTO users (uname, pword_hash, verified, perms) VALUES ('$uname1', '$pword_hash', 0, 1);";
                mysqli_query($con, $insertq);
                echo "your account has been created!";
                }
            }
            else{
                echo "this username is taken.";
            }
        }
        else{
            echo "please repeat your password.";
        }
    }
    else{
        echo "you left a field empty.";
    }
}