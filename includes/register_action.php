<?php
include "dbconnection.php";
if(isset($_POST['btnRegister'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $psw = $_POST['psw'];
  $pswrepeat = $_POST['pswrepeat'];
  if($psw != $pswrepeat){
    echo "<script>alert('Password Not Matching!');</script>";
	echo "<script>location.href = '../register.php';</script>";
  }else{
    $sqlCheck="select * from users where username = '$username'";
    $executeCheck = mysqli_query($conn, $sqlCheck) or die (mysqli_error($conn));
    $num_rows = mysqli_num_rows($executeCheck);
    if($num_rows != 0){
      echo "<script>alert('Username already exists!');</script>";
    }else{
      $sqlRegister="insert into users(username, user_email, password, role, region) values ('$username','$email', '$psw', 'Public', '-')";
      $executeRegister = mysqli_query($conn, $sqlRegister) or die (mysqli_error($conn));
      
      if($executeRegister){
            echo "<script>alert('Register User Success!');</script>";
            echo "<script>location.href = '../login.php';</script>";
          //print "<meta http-equiv='refresh' content='0;URL=listsubjectstudent.php?id='>";
        }
        else{
          echo "<script>alert('Register User Fail!');</script>";
          echo "<script>location.href = 'signup.php';</script>";
          }
        }

    }
  }


?>