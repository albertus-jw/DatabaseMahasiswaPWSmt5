<?php

include "konfig.php";
include "index.php";
$conn = new mysqli($server,$username,$password,$dbname);

//menerima posting dari hmm.php
$nama=$_POST['nama'];
$nim=$_POST['nim'];
$angkatan=$_POST['angkatan'];
$prodi=$_POST['prodi'];
$fakultas=$_POST['fakultas'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];

$sql="SELECT * FROM biodata WHERE nama LIKE '%$nama%'";
$sql="SELECT * FROM biodata WHERE nim LIKE '%$nim%'";
$sql="SELECT * FROM biodata WHERE angkatan LIKE '%$angkatan%'";
$sql="SELECT * FROM biodata WHERE prodi LIKE '%$prodi%'";
$sql="SELECT * FROM biodata WHERE fakultas LIKE '%$fakultas%'";
$sql="SELECT * FROM biodata WHERE alamat LIKE '%$alamat%'";
$sql="SELECT * FROM biodata WHERE telp LIKE '%$telp%'";

$hasil=$conn->query($sql);
if($hasil->num_rows>0){

echo"<h2>Tabel Mahasiswa Yang Dicari</h2>";
echo "<table border=1><tr>
<th>Nama</th>
<th>NIM</th>
<th>Prodi</th>
<th>Fakultas</th>
<th>Angkatan</th>
<th>Alamat</th>
<th>No Telepon</th>
</tr>";

//$data untuk menampung hasil
//hasil fetch_assoc() itu utk meminta array ditaroh di data
//while -> perulangan, utk ngecek masih ada tabel yg bisa ditambahin, ya ditambahin sm querynya
while($data=$hasil->fetch_assoc()){
  echo "<tr>
  <td>$data[nama]</td>
  <td>$data[nim]</td>
  <td>$data[angkatan]</td>
  <td>$data[prodi]</td>
  <td>$data[fakultas]</td>
  <td>$data[alamat]</td>
  <td>$data[telp]</td>
  </tr>";
     }
}
echo "</table>";


?>