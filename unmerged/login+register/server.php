<?php
session_start();

$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "帳號未填寫 😂"); }
  if (empty($email)) { array_push($errors, "信箱忘了填 😂"); }
  if (empty($password_1)) { array_push($errors, "密碼忘了填 😂"); }
  if ($password_1 != $password_2) {
	array_push($errors, "密碼不一致，請確認！😭");
  }

  // check the database to make sure 
  // not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "這個帳號已經註冊過 😅");
    }

    if ($user['email'] === $email) {
      array_push($errors, "這個信箱已經註冊過 😅");
    }
  }

  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "登入成功！😎";
  	header('location: index.php');
  }
}