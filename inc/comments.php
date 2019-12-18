<?php
if($_SESSION['login_state'] == 0){
    echo "<a href='login.php'>Login</a> to post a comment.";
}
else{
?>
<div class="postdiv postform">
<form action="" method="post" enctype="multipart/form-data">
    <textarea class="descbox" name="description" placeholder="Comment"></textarea>
    <br>
    <button class="sendbtn" type="submit">Send</button>
</form>
</div>

<?php
}
$con = mysqli_connect("localhost","root","","login");
$id1 = mysqli_real_escape_string($con, $_SESSION['id']);
$text1 = mysqli_real_escape_string($con, $_POST['description']);
$postid1 = mysqli_real_escape_string($con, $_GET['post']);


if(empty($text1)){
    echo "";
}
else{
    $idsan = filter_var($id1, FILTER_SANITIZE_STRING);
    $textsan = filter_var($text1, FILTER_SANITIZE_STRING);
    $idsan1 = filter_var($postid1, FILTER_SANITIZE_STRING);
    $test = "INSERT INTO comments (post_id, poster_id, description, post_time) VALUES ('".$idsan1."', '".$idsan."', '".$textsan."', '')";
    $query1 = mysqli_query($con, $test);
}
$sql1234567 = "SELECT * FROM comments WHERE post_id = '".$_GET['post']."' ORDER BY comment_id DESC;";
$query = mysqli_query($con, $sql1234567);
while($res = mysqli_fetch_array($query))
        {

            $user = "SELECT uname FROM users WHERE id = ".$res['poster_id'].";";
            $comquery2 = mysqli_query($con, $user);
            $res02 = mysqli_fetch_array($comquery2);
            echo "<div class='postdiv'>";
            echo "<div class='padding'>Commented by <a href='http://localhost/cackle/users/?user=".$res02['uname']."'>".$res02['uname']."</a></div>";
            echo "<p class='padding'>".$res['description']."</p></div>".include('commentmod.php');
        }
        ?>
