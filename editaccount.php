<?php

include "index.php";
include "konfig.php";

$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$confirm=$_POST['confirmnewpass'];
$level=$_POST['level'];

$conn = new mysqli($server, $username, $password, $dbname);

$oldpass=md5($oldpass);

$hasil = $conn->query("SELECT password FROM user WHERE password='$oldpass'");


	if($hasil->num_rows>0){
		
		if($confirm==$newpass){
			$newpass=md5($newpass);
			$username=$_SESSION['username'];
			$hasil=$conn->query("UPDATE user SET password='$newpass' WHERE username='$username'");
			if($hasil){
				
				echo"Password berhasil diubah";
		
			}else{
				
				echo"Password gagal diubah";
			}
		}else{
		
			echo"Konfirmasi Password Tidak Cocok";
		}
		
	}else{
	
		echo"Password lama tidak cocok";
	}
	
	session_destroy();
	echo"<h2>Berhasil</h2>";
	echo"<a href=login.php>Kembali ke Login</a>";



?>