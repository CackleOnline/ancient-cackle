<?php
$con18 = mysqli_connect('localhost', 'root', '', 'login');

$user = $_GET['user'];

$userjuiced = mysqli_escape_string($con18, $user);

$userfixed = filter_var($userjuiced, FILTER_SANITIZE_STRING);

$query1 = "SELECT * FROM users WHERE uname = '".$userfixed."';";

$query2 = mysqli_query($con18, $query1);

$q = mysqli_fetch_array($query2);

$id = $q['id'];

if($q['uname'] === null){
    echo "<h3>We could not find what you are looking for.</h3>";
}
else{
echo "<h1>".$userfixed ?>'s Recent Posts</h1>
<?php

$query3 = "SELECT * FROM posts WHERE posters_id = '".$id."' ORDER BY post_id DESC ;";

$query4 = mysqli_query($con18, $query3);


while($res = mysqli_fetch_array($query4)){
            echo "<div>";
            echo "<div class='postdiv'><div class='postinfo'>";
            echo "<span class='name1'>".$q['uname']."</span>";
            echo "<div class='time'>".$res['post_time']."</div>";
            echo "<div class='title'><a href='/?post=".$res['post_id']."'>".$res['title']."</a></div></div>";
            echo "<p class='desc'>".$res['description']."</p></div>";
        sleep(0.9);
        }
}