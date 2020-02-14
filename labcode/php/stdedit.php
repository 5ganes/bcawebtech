<?php
	session_start();
	if(!isset($_SESSION['sessuserid'])){
		header('Location:login.php');
	}
	require 'db.php';
	if (isset($_GET['eid'])) {
		$eid = $_GET['eid'];
		$student = $pdo->query("SELECT * FROM tbl_student WHERE id = '$eid'");
		$student = $student->fetch();
	}

	if(isset($_POST['update'])){
		extract($_POST);
		$check = $pdo->query("UPDATE tbl_student SET name = '$name', faculty = '$faculty', 
			birthdate =  '$birthdate', email = '$email' WHERE id = '$id'");
		if($check == true)
			header('Location:student.php?msg=Updated successfully');
		else
			echo 'Not updated';
	}
?>

<h2>Edit Student Details</h2>
<form method="POST" action="">
	<input type="hidden" name="id" value="<?php echo $student['id']?>">
	Enter Name :
	<input type="text" name="name" value="<?php echo $student['name']?>"><br><br>
	Select Faculty :
	<select name="faculty">
		<option value="Science">Science</option>
		<option value="Management" <?php if($student['faculty']=='Management')echo 'selected';?>>Management</option>
		<option value="Humanities" <?php if($student['faculty']=='Humanities')echo 'selected';?>>Humanities</option>
	</select><br><br>
	Enter Birth Date :
	<input type="date" name="birthdate" value="<?php echo $student['birthdate']?>"><br><br>
	Enter email : 
	<input type="text" name="email" value="<?php echo $student['email']?>"><br><br>
	<input type="submit" name="update" value="Update">
</form>