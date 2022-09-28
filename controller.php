<?php

require 'model.php';
//Registration request is handled by this block
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
 //
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];

 $verification_code = register($name, $email, $password);
 if ($verification_code === -1) {
  echo json_encode(['status' => 'Something went wrong']);
 } else {
  sendMail($email, $verification_code);
  echo json_encode(['status' => 'Thanks for registering, please activate your account via email']);
 }
 exit();
}




//Login request is handled by this block
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
 //
 $name = $_POST['name'];
 $password = $_POST['password'];
 $status = login($name, $password);
 if ($status === 0) {
  //
  echo json_encode(['status' => 'Welcome $name. you have been logged in']);
 } elseif ($status === 0) {
  //
  echo json_encode(['status' => 'Hi $name. you have not verified your email']);
 } else {
  //
  echo json_encode(['status' => 'You are not registered']);
 }
 exit();
}




//Login request is handled by this block
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
 //

}