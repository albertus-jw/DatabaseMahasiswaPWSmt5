<?php
    session_start();
    include "konfig.php";
    $conn = new mysqli($server,$username,$password,$dbname);

    //echo "$_SESSION[uname] $_SESSION[pass]";
    if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
        $sql = "SELECT * FROM user WHERE username='$_SESSION[username]'";
        $hasil=$conn->query($sql);
        if($hasil->num_rows>0){
            while($data=$hasil->fetch_assoc()){
                if($data['password']==$_SESSION['password']){
//---------------------copy kan program di sini

include 'menu.php';

//2. mengecek koneksi
if($conn)echo "<br>Koneksi Berhasil</br>";
else echo "<br> Koneksi Gagal</br>";


//5. membuat query untuk menampilkan
 $sql="SELECT * FROM biodata"; //menampilkan data dalam tabel biodata

//6.menjalankan query untuk manmpilkan
    if (isset($_POST['input'])){

      $nama=$_POST['nama'];
      $nim=$_POST['nim'];
      $angkatan=$_POST['angkatan'];
      $prodi=$_POST['prodi'];
      $fakultas=$_POST['fakultas'];
      $alamat=$_POST['alamat'];
      $telp=$_POST['telp'];

    $conn->query("INSERT INTO biodata(nama,nim, angkatan, prodi, fakultas, alamat, telp) values ('$nama', '$nim', '$angkatan', '$prodi', '$fakultas', '$alamat', '$telp')");
    
  }


    //if($hasil->num_rows>0){
//7. menampilkan data tiap baris
    echo "<table border=1><tr><th>Nama</th><th>Nim</th><th>Angkatan</th><th>Prodi</th><th>Fakultas</th><th>Alamat</th><th>No. Telp</th></tr>";
  $hasil = $conn->query("select * from biodata");
    while($data=$hasil->fetch_assoc()){
  echo "<tr><td>".$data['nama']."</td><td>".$data['nim']."</td><td>".$data['angkatan']."</td><td>".$data['prodi']."</td><td>".$data['fakultas']."</td><td>".$data['alamat']."</td><td>".$data['telp']."</td></tr>";
     }
    echo "</table>";
// }

                    
     
     
//--------------------sampai sini

                } else{
                    echo "password salah";
                }
            }
        }
        else { 
            echo "username tidak ditemukan";
        }
    } else include 'login.php';
    
?>