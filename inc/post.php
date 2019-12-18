<?php
if($_GET['post'] !== null){
    echo'';
}
if($_SESSION['login_state'] == 0){
 echo "";
}
else{
  if(isset($_POST['post'])){
  $connn = mysqli_connect("localhost","root","","login");

  $id = mysqli_real_escape_string($connn, $_SESSION['id']);
  $title = mysqli_real_escape_string($connn, $_POST['title']);
  $text = mysqli_real_escape_string($connn, $_POST['description']);
if($_SESSION['login_state'] == 0){
    echo "you need to be signed in to do this";
}
if(empty($title)){
    echo "you forgot to fill in the title";
}
if(empty($text)){
    echo "you forgot to fill in the description";
}
if(!empty($text) and !empty($title) and $_SESSION['login_state'] == 1 ){

    $idsan = filter_var($id, FILTER_SANITIZE_STRING);
    $titlesan = filter_var($title, FILTER_SANITIZE_STRING);
    $textsan = filter_var($text, FILTER_SANITIZE_STRING);
    $idsan = filter_var($postid, FILTER_SANITIZE_STRING);
    $sqllll = "INSERT INTO posts (title, description, img, posters_id) VALUES ('".$titlesan."', '".$textsan."','".$img2."', '".$id."')";
    mysqli_query($connn, $sqllll);
}}

if($_GET['post'] == null){

?>
<div class="postdiv postform">
<form action="index.php" method="post" enctype="multipart/form-data">
    <input class="titlebox" type="text" name="title" placeholder="Title">
    <br>
    <textarea class="descbox" name="description" placeholder="description"></textarea>
    <br>
    <button class="sendbtn" type="submit" name="post">Send</button>
</form>
</div>
<?php } }?>
