<?php
	session_start();
	if(isset($_SESSION['sessuserid'])){
		header('Location:student.php');
	}
	require 'db.php';
	if(isset($_POST['login'])){
		$stmt = $pdo->prepare("SELECT * FROM tbl_user WHERE username = :username and password = :password");
		$criteria = [
			'username' => $_POST['username'],
			'password' => $_POST['password']

		];
		$stmt->execute($criteria);
		if($stmt->rowCount() > 0){
			$user = $stmt->fetch();
			$_SESSION['sessuserid'] = $user['id'];
			header('Location:student.php');
		}
		else{
			echo 'Invalid Credentials. Please try again.';
		}
	}
?>
<h3>Login Here</h3>
<form method="POST" action="">
	Username  : <input type="text" name="username"><br><br>
	Password  : <input type="password" name="password"><br><br>
	<input type="submit" name="login" value="Login">
</form>