
<?php

$conn = mysqli_connect("localhost","root","","login");

$sql1 = "SELECT * FROM posts ORDER BY post_id DESC ;";
$sqlthing = mysqli_query($conn, $sql1);
$postnum = $_GET['post'];
$sqltt = "SELECT * FROM posts WHERE post_id = '".$postnum."';";
$thingqq = mysqli_query($conn, $sqltt);
$qqq = mysqli_fetch_array($thingqq);
if(isset($qqq['post_id'])){
    $sqlq = "SELECT * FROM posts WHERE post_id = '".$postnum."';";
    $thingq = mysqli_query($conn, $sqlq);
    $thing12345 = mysqli_fetch_array($thingq);

    echo "<div>";
$doot = mysqli_query($conn, $sqlq);

//$thing1 = mysqli_fetch_array($sqlr);
$res = mysqli_fetch_array($doot);
$poster = $res['posters_id'];
$sqlr = "SELECT uname, verified FROM users WHERE id = '".$poster."';";
$doot1 = mysqli_query($conn, $sqlr);
$doot3 = mysqli_fetch_array($doot1);
    $verified1 = $doot3['verified'];
    if($verified1 == 1){
        echo "
        <div class='postdiv'>
        <div class='postinfo'>
        <span class='name1 verification-badge'><span class='name'>" . $doot3['user_name'] . "</span><img src='https://beta.cackle.cc/checkmark.svg' ></span>

        ";
    }
    else{
        echo "<div class='postdiv'><div class='postinfo'>";
        echo "<span class='name1'>".$doot3['uname']."</span>";
    }
    echo '<meta content="'.$thing12345['title'] .'" property="og:title">

<meta content="'.$thing12345['description'].' " property="og:description">

<meta content="'.$doot3['uname'].' • cackle.cc • '.$thing12345['post_time'].'" property="og:site_name">

<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="cackle.cc" />
<meta name="twitter:title" content="'.$doot3['uname'].'"• cackle.cc" />
<meta name="twitter:description" content="'.$thing12345['description'].'" />
';
    echo "<div class='time'>".$thing12345['post_time']."</div>";
    echo "<div class='title'>".$thing12345['title']."</div></div>";
    echo "<p class='desc'>".$thing12345['description']."</p>";
    ?>
    </div>
    </div>
    <?php
    include("inc/comments.php");
}
elseif(!isset($qqq['post_id']) and $_GET['post'] !== null){
    echo "<h3>We could not find what you are looking for.</h3>";
}
else{


    echo "<h1 class='th'><b> Recent posts</b></h1>";
        while($res = mysqli_fetch_array($sqlthing))
        {

            $img = $res['img'];
            echo "<div>";
            $poster = $res['posters_id'];
            $sqlr11 = "SELECT uname, verified FROM users WHERE id = '$poster' ;";
            $posterid = mysqli_query($conn, $sqlr11);
            $thing1 = mysqli_fetch_array($posterid);
            $verified1 = $thing1['verified'];
            if($verified1 == 1){
                echo "
                <div class='postdiv'>
                <div class='postinfo'>
                <span class='name1 verification-badge'><span class='name'>" . $thing1['uname'] . "</span><img src='https://cackle.cc/checkmark.svg' ></span>

                ";
            }
            else{
                echo "<div class='postdiv'><div class='postinfo'>";
                echo "<span class='name1'>".$thing1['uname']."</span>";
            }

            echo "<div class='time'>".$res['post_time']."</div>";
            echo "<div class='title'><a href='?post=".$res['post_id']."'>".$res['title']."</a></div></div>";
            echo "<p class='desc'>".$res['description']."</p></div></div>";

        }


}

        ?>
