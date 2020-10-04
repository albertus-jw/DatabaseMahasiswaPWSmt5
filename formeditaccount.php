<?php


echo"<h2>Edit Akun Mahasiswa</h2>";
echo "<form method=post action=editaccount.php><table border=0>";

echo "<tr><td>Password Lama</td><td>: <input type=password name=oldpass> </td></tr>";
echo "<tr><td>Password Baru</td><td>: <input type=password name=newpass> </td></tr>";
echo "<tr><td>Konfirmasi Password</td><td>: <input type=password name=confirmnewpass> </td></tr>";
echo "<tr><td>Level</td><td>: <input type=text name=level> </td></tr>";


echo "<tr><td><input type=submit value=Input></td></tr>"; 

echo "</table></form>";
	
?>