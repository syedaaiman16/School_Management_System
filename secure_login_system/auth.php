<?php
session_start();
include 'db_conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];
	$stmt1 = $conn->prepare("SELECT users.*, student.* FROM users JOIN student ON student.S_ID = users.id WHERE users.email=?");
	$stmt1->execute([$email]);
	$stmt2 = $conn->prepare("SELECT users.*, teacher.* FROM users JOIN teacher ON teacher.T_ID = users.id WHERE users.email=?");
	$stmt2->execute([$email]);

	if (empty($email)) {
		header("Location: login.php?error=Email is required");
	} else if (empty($password)) {
		header("Location: login.php?error=Password is required&email=$email");
	} else if ($email == "mahnoormalik@gmail.com" && $password == "Malik123") {
		$sql = "SELECT * FROM admin";
		$res = $conn->query($sql);

		if ($res->rowCount() > 0) {
			// output data of each row
			$user = $res->fetch();

			$_SESSION['user_stat'] = "admin";
			$_SESSION['user_id'] = 901;
			$_SESSION['user_email'] = $email;
			$_SESSION['user_full_name'] = $user['A_FNAME'] . ' ' . $user['A_LNAME'];
			header("Location: ../admindashboard/index.php");
		} else {
			header("Location: login.php?error=Incorect Admin Email or Password&email=$email");
		}
	} 
	else if (($stmt2->rowCount() === 1)) {
		// $_SESSION['user_stat'] = "teacher";
		$redirect = '../teacherdashboard/index.php';
		$user = $stmt2->fetch();
		echo print_r($user);

		$user_id = $user['id'];
		$user_email = $user['email'];
		$user_password = $user['password'];
		$user_full_name = $user['full_name'];

		if ($email === $user_email) {
			if (password_verify($password, $user_password)) {
				$_SESSION['user_stat'] = "teacher";
				$_SESSION['user_id'] = $user_id;
				$_SESSION['user_email'] = $user_email;
				$_SESSION['user_full_name'] = $user_full_name;
				header("Location: " . $redirect);
			} else {
				header("Location: login.php?error=Incorect User name or password&email=$email");
			}
		} else {
			header("Location: login.php?error=Incorect User name or password&email=$email");
		}
	}
	else if ($stmt1->rowCount() === 1) {
		// $_SESSION['user_stat'] = "student";
		$redirect = '../studentdashboard/index.php';
		$user = $stmt1->fetch();
		echo print_r($user);
		$user_id = $user['id'];
		$user_email = $user['email'];
		$user_password = $user['password'];
		$user_full_name = $user['full_name'];

		if ($email === $user_email) {
			if (password_verify($password, $user_password)) {
				$_SESSION['user_stat'] = "student";
				$_SESSION['user_id'] = $user_id;
				$_SESSION['user_email'] = $user_email;
				$_SESSION['user_full_name'] = $user_full_name;
				header("Location: " . $redirect);
			} else {
				header("Location: login.php?error=Incorect User name or password&email=$email");
			}
		} else {
			header("Location: login.php?error=Incorect User name or password&email=$email");
		}
	}
	

			
}
