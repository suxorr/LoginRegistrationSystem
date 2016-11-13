<?php
require_once 'core/init.php';

$user = new User();
if($user->isLoggedIn()){
	
?>
	<p>Hello <a href="#" style="text-decoration: none"><?php echo escape($user->data()->username) ;?></a></p>
	<ul>
		<li>
			<a href="logout.php">Log out</a>
		</li>
	</ul>
<?php
}else{
	echo '<p>You need to <a href="login.php">Log  in</a> or <a href="register.php">Register</a></p>';
}