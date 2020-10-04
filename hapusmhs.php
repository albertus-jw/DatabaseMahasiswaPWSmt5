<?php
include "index.php";
include "konfig.php";
$conn = new mysqli($server,$username,$password,$dbname);

//Mengambil ID yang di GET 
$id=$_GET['id'];

echo "id yang di GET adalah : $id <br>";

//Membuat Query Hapus
$sql="DELETE FROM biodata WHERE id=$id";

//Query Execute
$hasil=$conn->query($sql);

//mysqli_($conn, $sql);
if($conn->query($sql)===TRUE)echo "hapus berhasil";
else echo "hapus gagal";



?>