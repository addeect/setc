<?php
include_once("koneksi/conn.php");
ob_start();
session_start();
 
$username = $_POST['username'];
$namauser = $_POST['namauser'];
$password = $_POST['password'];
 
// $conn = mysql_connect('localhost', 'root', '');
// mysql_select_db('login', $conn);
 
$username = mysql_real_escape_string($username);
$query = "select user.id_user 'username', user.password 'password', user.namauser 'namauser', user.jenis_user 'Role' from user where user.id_user='$username' and user.password='$password'";
 
$result = mysql_query($query);
//$loggedinuser = $result->fields[0];
$userData = mysql_fetch_array($result, MYSQL_ASSOC);
$num_rows = mysql_num_rows($result);
if($num_rows > 0) // User found. 

			{
				session_start();
				$_SESSION['login'] = "1";
				if($userData['Role'] == 1)
				{
					$_SESSION['sess_username'] = $userData['username'];
					$_SESSION['sess_namauser'] = $userData['namauser'];
								
					$_SESSION['sess_role'] = 'Operator';
					
					header ("Location: beranda2.php");
				}
				else if($userData['Role'] == 2)
				{
					$_SESSION['sess_username'] = $userData['username'];
					$_SESSION['sess_namauser'] = $userData['namauser'];
									
					$_SESSION['sess_role'] = 'Admin';
					
					header ("Location: beranda.php");
				}
				
				
				else if($userData['Role'] == 3)
				{
					$_SESSION['sess_username'] = $userData['username'];
					$_SESSION['sess_namauser'] = $userData['namauser'];
					$_SESSION['sess_role'] = 'Manajemen';
					header ("Location: beranda1.php");
				}
				
			}
			else
			{
				$errorMessage = "Invalid Login";
				session_start();
				$_SESSION['login'] = '';
				header ("Location: index.html");
				
			}
// {
    // header('Location: login.html');
// }
 // else{ // Redirect to home page after successful login.
	// session_regenerate_id();
	// $_SESSION['sess_user_id'] = $userData['id'];
	// $_SESSION['sess_username'] = $userData['username'];
	// session_write_close();
	// header('Location: home.php');
// }
// $userData = mysql_fetch_array($result, MYSQL_ASSOC);
// $hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
 
// if($hash != $userData['password']) // Incorrect password. So, redirect to login_form again.
// {
    // header('Location: login.html');
// }else{ // Redirect to home page after successful login.
	// session_regenerate_id();
	// $_SESSION['sess_user_id'] = $userData['id'];
	// $_SESSION['sess_username'] = $userData['username'];
	// session_write_close();
	// header('Location: home.php');
// }
?>