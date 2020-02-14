<?php
	session_start();
	if(!isset($_SESSION['sessuserid'])){
		header('Location:login.php');
	}
	require 'db.php';
	require 'functions.php';
	if(isset($_POST['save'])){
		unset($_POST['save']);
		$err = '';
		// if(empty($_POST['name'])) $err .= '<p>Please Enter name</p>';
		// if(empty($_POST['birthdate'])) $err .= '<p>Please Enter birth date</p>';
		// if(empty($_POST['email'])) $err .= '<p>Please Enter email</p>';
		if(empty($err)){
			$result = insert('tbl_student', $_POST);
			if ($result == true) echo 'Student record inserted';
			else echo 'Not inserted';
		}
		else{
			echo $err;
		}
	}
	if(isset($_GET['did'])){
		$id = $_GET['did'];
		$pdo->query("DELETE FROM tbl_student WHERE id = '$id");
		echo 'Student deleted';
	}
?>
<h2>Enter Student Details</h2>
<form method="POST" action="">
	Enter Name : <input type="text" name="name"><br><br>
	Select Faculty :
	<select name="faculty">
		<option value="Science">Science</option>
		<option value="Management">Management</option>
		<option value="Humanities">Humanities</option>
	</select><br><br>
	Enter Birth Date : <input type="date" name="birthdate"><br><br>
	Enter email : <input type="text" name="email"><br><br>
	<input type="submit" name="save" value="Save">
</form>

<h2>Student List</h2>
<table border="2">
	<tr>
		<th>Name</th>
		<th>Faculty</th>
		<th>Birth Date</th>
		<th>Email</th>
		<th>Action</th>
	</tr>
	<?php
	$studentList = $pdo->query("SELECT *FROM tbl_student");
	foreach ($studentList as $student) {?>
		<tr>
			<td><?php echo $student['name']?></td>
			<td><?php echo $student['faculty']?></td>
			<td><?php echo $student['birthdate']?></td>
			<td><?php echo $student['email']?></td>
			<td>
				<a href="stdedit.php?eid=<?php echo $student['id'];?>">Edit</a> |
				<a href="student.php?did=<?php echo $student['id'];?>">Delete</a>
			</td>
		</tr>
	<?php }
	?>
</table>

<a href="logout.php">Logout</a>





