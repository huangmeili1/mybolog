<meta charset="utf-8" />
<?php
	session_start();
	@$_SESSION['managemo'];
	@$_SESSION['spec'];
	unset($_SESSION['adminid']);
	unset($_SESSION['adminname']);
	unset($_SESSION['spec']);
	session_destroy();
	header('Location:managelogin.php');
?>