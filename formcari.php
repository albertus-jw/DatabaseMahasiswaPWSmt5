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

//membuat form
echo "<h2>Mencari Data Mahasiswa</h2>"; 
echo "<form method=post action=carimhs.php><table border=0>";
echo "<tr><td>Nama </td><td>: <input type=text name=nama> </td></tr>";
echo "<tr><td>NIM </td><td>: <input type=text name=nim> </td></tr>";
echo "<tr><td>Angkatan </td><td>: <input type=text name=angkatan> </td></tr>";
echo "<tr><td>Jurusan </td><td>: <input type=text name=prodi> </td></tr>";
echo "<tr><td>Fakultas </td><td>: <input type=text name=fakultas> </td></tr>";
echo "<tr><td>Alamat </td><td>: <input type=text name=alamat> </td></tr>";
echo "<tr><td>No. Telp </td><td>: <input type=text name=telp> </td></tr>";
echo "<tr><td><input type=submit value=Cari></td></tr>"; //tombol login
echo "</table></form>";

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