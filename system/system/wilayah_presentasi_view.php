<? session_start();
include "konek.php";

if ($_POST[id]<>"0"){ $query = mysql_query("select * from database_sekolah where marketing_pengunci='$_POST[id]'"); }else{ $query = mysql_query("select * from database_sekolah where marketing_pengunci<>''");} $x=0; while($d=mysql_fetch_row($query)) { $x=$x+1; echo $x.". ".$d[2]." - ".$d[3]." - ".$d[4]." - ".$d[5]." - ".$d[6]."<br>";}

?> 