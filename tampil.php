
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
error_reporting (0);
//5. membuat query untuk menampilkan
 $sql="SELECT * FROM biodata"; //menampilkan data dalam tabel biodata

//6.menjalankan query untuk manmpilkan
    $hasil=$conn->query($sql);
    if($hasil->num_rows>0){
//7. menampilkan data tiap baris
      if (isset($_POST['hapus'])){
        $conn->query("delete from biodata where ID ='$_POST[hapus]'");
        echo "<script>location.replace(document.referrer)</script>";
      }

      if (($_GET['ID']!='')){
        $view=$conn->query("select * from biodata where ID ='$_GET[ID]'");
        $data2=$view->fetch_assoc();
        echo $data2['nama'];
      }
      if(isset($_POST['edit'])){
        $conn->query("update biodata set 
                        nama='$_POST[nama]',
                        nim='$_POST[nim]',
                        angkatan='$_POST[angkatan]',
                        prodi='$_POST[prodi]',
                        fakultas='$_POST[fakultas]',
                        alamat='$_POST[alamat]',
                        telp='$_POST[telp]' 
                        where ID='$_GET[ID]'
                    ");
        echo "<script>location.replace(document.referrer)</script>";
      }

      if(isset($_POST['add'])){
        $conn->query("insert into biodata (nama, nim, angkatan, prodi, fakultas, alamat, telp) values ('$_POST[addnama]','$_POST[addnim]','$_POST[addangkatan]','$_POST[addprodi]','$_POST[addfakultas]','$_POST[addalamat]','$_POST[addtelp]')");
        echo "<script>location.replace(document.referrer)</script>";
      }
?>
<form method=post><table border=0>
<table border=1>
<tr>
<th>Nama</th>
<th>Nim</th>
<th>Angkatan</th>
<th>Prodi</th>
<th>Fakultas</th>
<th>Alamat</th>
<th>No. Telp</th>
<th>Action</th>
<th>Edit</th>
</tr>
<tr>
<th><input type='text' name='addnama'></th>
<th><input type='text' name='addnim'></th>
<th><input type='text' name='addangkatan'></th>
<th><input type='text' name='addprodi'></th>
<th><input type='text' name='addfakultas'></th>
<th><input type='text' name='addalamat'></th>
<th><input type='text' name='addtelp'></th>
<th colspan=2><button type='submit' name='add'>Add</th>
</tr>
<?php
    while($data=$hasil->fetch_assoc()){
  echo "<tr>
  <td>$data[nama]</td>
  <td>$data[nim]</td>
  <td>$data[angkatan]</td>
  <td>$data[prodi]</td>
  <td>$data[fakultas]</td>
  <td>$data[alamat]</td>
  <td>$data[telp]</td>
  <td><button type='submit' name='hapus' value='$data[ID]'>Hapus</button></td>
  <td><a href=?ID=$data[ID]>Home</a></td>
  </tr>";
     }
    echo "</table>";
 }
 ?>
</form>

<?php
echo "<form method=post ><table border=0>";
echo "<tr><td>Nama </td><td>: <input type=text name=nama value='$data2[nama]'> </td></tr>";
echo "<tr><td>NIM </td><td>: <input type=text name=nim value='$data2[nim]'> </td></tr>";
echo "<tr><td>Angkatan </td><td>: <input type=text name=angkatan value='$data2[angkatan]'> </td></tr>";
echo "<tr><td>Jurusan </td><td>: <input type=text name=prodi value='$data2[prodi]'> </td></tr>";
echo "<tr><td>Fakultas </td><td>: <input type=text name=fakultas value='$data2[fakultas]'> </td></tr>";
echo "<tr><td>Alamat </td><td>: <input type=text name=alamat value='$data2[alamat]'> </td></tr>";
echo "<tr><td>No.Telp </td><td>: <input type=text name=telp value='$data2[telp]'> </td></tr>";
echo "<tr><td><input type=submit name=edit></td></tr>"; //tombol login
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