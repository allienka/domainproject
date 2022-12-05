<?php
include('./logindata/session.php'); 
echo '
<header class="header-main">
	<div class="header-sub">
		<h1><a href="#">Domain<span>.fi</span></a></h1>
		<nav>
			<a href="index.php" >Home</a>
			<a href="#" class="selected"> welcome :';
			 echo $_SESSION["first_name"]; 
echo '</a>
       <a class="logout"href="./logindata/logout.php" >LogOut</a>
		</nav>
	</div>
</header>
';
?>
