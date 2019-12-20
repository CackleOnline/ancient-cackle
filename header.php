<?php

include("config/db.php");

session_start();

if ($_SESSION['login_state'] === 1) {?>
<div class="nav">
<a class="navlink" href="/cackle/">Home</a>
<a  class="navlink userbtn" href="/cackle/logout/">Logout</a>
</div>
<?php
} else { ?>
<div class="nav">
<a class="navlink" href="/cackle/">Home</a>
<a class="navlink userbtn" href="/cackle/login/">Login</a>
</div>
<?php } ?>