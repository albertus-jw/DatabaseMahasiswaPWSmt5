<?php
include 'menu.php';

$uname=$_POST['uname'];
$pass=$_POST['pass'];
$newname=$_POST['newname'];
$md5_pass=md5($pass);

echo "$newname / $uname / $pass";

$server = 'localhost';
$dbname = 'datamhs';
$username = 'root';
$password = '';


$conn = new mysqli($server,$username,$password,$dbname);
if($conn)echo "<br>Koneksi Berhasil</br>";
else echo "<br> Koneksi Gagal</br>";
//5. membuat query untuk menampilkan

$sql="INSERT INTO user (username, password, nama) values ('$uname', '$md5_pass', '$newname')";

//4. menjalankan query
$hasil=mysqli_query($conn,$sql);

//5.mengecek apakah query berhasil
if($hasil===TRUE) echo "<br><h2>Insert berhasil</h2>";
else echo "<br><h2>Insert gagal</h2>";
    

?>