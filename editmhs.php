<?php
include "index.php";
include "konfig.php";
$conn = new mysqli($server,$username,$password,$dbname);

//Mengambil ID yang di GET 
$id=$_GET['id'];

echo "id yang di GET adalah : $id <br>";

//Membuat Query Hapus
//$sql="SELECT * FROM biodata WHERE id=$id";


//Query Execute
//$hasil=$conn->query($sql);


?>