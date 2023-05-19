<? session_start();
include "konek.php";
if ($_POST[namadomain]==""){?>
<form action="tambah_data_domain.php?id=<?echo $_GET[id];?>&action=<? if ($_GET[id]==""){echo "tambah";}else{echo "edit";}?>" method="POST">
Nama Domain : <input type="text"  name="namadomain" id="namadomain" value="<? $query = mysql_query("select * from domain where id='$_GET[id]'"); while($b=mysql_fetch_row($query)) { echo $b[1];}?>"></input> <input type="submit" value="Simpan"></input> <br><br>
#PERHATIAN :  Tidak diperkenankan menambahkan alamat domain menggunakan "www" dan "http://" atau "http://www." Contoh domain yang diharapkan : namadomain.dom
<br>
</form>
<?}else{
$domain="";
$query = mysql_query("select domain,pemilik from domain where domain ='$_POST[namadomain]'"); while($b=mysql_fetch_row($query)) {$domain=$b[0]; $pemilik=$b[1];}
$query = mysql_query("select nama from pegawai where id='$pemilik'"); while($b=mysql_fetch_row($query)) {$marketing=$b[0];}
if ($domain==$_POST[namadomain]){
echo "<font color='red'>Maaf, domain ".$domain." sudah digunakan oleh ".$marketing.". Terima kasih</font>";}else{


if ($_GET[action]=="tambah"){ $query = mysql_query("insert into domain (domain,pemilik)values('$_POST[namadomain]','$_SESSION[id_login]')"); } else { $query = mysql_query("update domain set domain='$_POST[namadomain]' where id='$_GET[id]'");}
echo "Domain $_POST[namadomain] tersimpan di list domain anda!";}}
?>