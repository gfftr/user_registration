<?php
$conn = new mysqli('localhost:3306', 'root', 'root', 'email_verification_db');

if ($conn->connect_errno) {
 echo json_encode(['status' => $conn->connect_error]);
 exit();
}

// user registration function
function register($name, $email, $password)
{
 global $conn;
 $verification_code = generate_code();
 $stmt = $conn->prepare("insert into users (name, email, password, verification_code) values(?,?,?,?)");
 $stmt->bind_param('ssss', $name, $email, $password, $verification_code);
 $stmt->execute();
 if ($stmt->num_rows > 0) {
  $status = $verification_code;
 } else {
  $status = -1;
  $stmt->close();
  return $status;
 }
}

//login function
function login($name, $password)
{
}

// verification code generation function
function generate_code()
{
 return bin2hex(openssl_random_pseudo_bytes(20));
}