<?php
  $UserName = $_POST['UserName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $conn = new mysqli('localhost','root','','cregs');
  if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
  } else {
    $stmt = $conn->prepare("insert into contents(UserName,email, password) values(?, ?, ?)");
    $stmt->bind_param("sss", $UserName, $email, $password);
    $execval = $stmt->execute();
    echo $execval;
    echo " Registration successfull...";
    $stmt->close();
    $conn->close();
  }
?>