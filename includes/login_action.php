<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Virtual Gift4U.com</title>
</head>
<body>

<?php
include ("dbconnection.php");
session_start();
if(isset($_POST['btnLogin'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

            $sqlUser = "select * from users where username = '$username' AND password = '$password'";
            $executeUser = mysqli_query($conn, $sqlUser) or die (mysqli_error($conn));
                if (mysqli_num_rows ($executeUser) >= 1){
                    $dataUser = mysqli_fetch_assoc($executeUser);
                    $_SESSION["username"] = $dataUser['username'];
		            $_SESSION["user_id"] = $dataUser['user_id'];
					$_SESSION["role"] = $dataUser['role'];
                    if($dataUser['role']=="Staff"){
                        echo "<script>alert('login success');</script>";
                        print '<meta http-equiv="refresh" content="0;URL=../staff/staff_dashboard.php">';
                    }else if($dataUser['role']=="Public"){
                        echo "<script>alert('login success');</script>";
		                print '<meta http-equiv="refresh" content="0;URL=../homepage1.php">';
                    }else if($dataUser['role']=="Admin"){
                        echo "<script>alert('login success');</script>";
		                print '<meta http-equiv="refresh" content="0;URL=../admin/admin_dashboard.php">';
                    }
                }else{
                    echo "<script>alert('login fail');</script>";
                    print '<meta http-equiv="refresh" content="0;URL=../login.php">';
                }
			
			}
?>

</body>
</html>