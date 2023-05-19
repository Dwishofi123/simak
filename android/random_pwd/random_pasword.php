<?php


include "../koneksi.php";
$query = mysql_query("select * from profil_siswa where ps_ang like '%JUNI 2017%' and ps_pwduji1 is null order by ps_no desc "); 
echo "RANDOM PWD UNTUK KELAS JUNI 2017";
while($b=mysql_fetch_row($query)){


//SET PASWORD UJIAN 1
$text = '2345789ABCDEFGHJKLMNPQRSTUVWXYZ2345789';
$panj = 5;
$txtl = strlen($text)-1;
$result = '';
for($i=1; $i<=$panj; $i++){
 $result .= $text[rand(0, $txtl)];
}

mysql_query("update profil_siswa set ps_pwduji1='$result' where ps_no='$b[0]'");


//SET PASWORD UJIAN 2
$text = '2345789ABCDEFGHJKLMNPQRSTUVWXYZ2345789';
$panj = 5;
$txtl = strlen($text)-1;
$result = '';
for($i=1; $i<=$panj; $i++){
 $result .= $text[rand(0, $txtl)];
}
mysql_query("update profil_siswa set ps_pwduji2='$result' where ps_no='$b[0]'");


//SET PASWORD UJIAN 3
$text = '2345789ABCDEFGHJKLMNPQRSTUVWXYZ2345789';
$panj = 5;
$txtl = strlen($text)-1;
$result = '';
for($i=1; $i<=$panj; $i++){
 $result .= $text[rand(0, $txtl)];
}
mysql_query("update profil_siswa set ps_pwduji3='$result' where ps_no='$b[0]'");


//SET PASWORD UJIAN 4
$text = '2345789ABCDEFGHJKLMNPQRSTUVWXYZ2345789';
$panj = 5;
$txtl = strlen($text)-1;
$result = '';
for($i=1; $i<=$panj; $i++){
 $result .= $text[rand(0, $txtl)];
}
mysql_query("update profil_siswa set ps_pwduji4='$result' where ps_no='$b[0]'");



echo "update profil_siswa set ps_pwduji1='$result' where ps_no='$b[0]'<br>";

}
?>