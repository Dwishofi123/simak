<? session_start();
include "../system/system/konek.php"; 


if ($_SESSION[info-from]==""){
$_SESSION[bebas]="no"; $_SESSION[pemilik_domain]=""; $URL_REF = parse_url($_SERVER['HTTP_REFERER']); $URL_REF_HOST= $URL_REF['host'];
if ($URL_REF_HOST=="pspp-integrated.com"){ }else{

$query = mysql_query("select * from domain where domain='$URL_REF_HOST'");	while($b=mysql_fetch_row($query)){$pemilik=$b[2];  $status=$b[3]; $ec = mysql_query("select nama from pegawai where id='$pemilik'");	while($c=mysql_fetch_row($ec)){ $_SESSION[pemilik_domain]=$c[0]; $_SESSION[info-from]=$URL_REF_HOST;}}
if ($_SESSION[pemilik_domain]==""){}else{$_SESSION[bebas]="yes";}
}}



if ($status=="BLOCK"){ echo "<div style='text-align:center;'><br><br><br><br>Mohon maaf, domain $URL_REF_HOST <br>atas nama pemilik $_SESSION[pemilik_domain] <br> saat ini sedang terblokir dari sistem pendaftaran. <br><br>Kami himbau kepada pemilik domain <br>agar segera memperbarui konten web agar sesuai dengan persyaratan pemasaran. <br><br>Dan bagi anda calon pendaftar, anda tidak perlu khawatir karna <br>pendaftaran anda akan tetap kami layani seperti pendaftar lain. <br><br>";?>

<div id="pesan"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
var url = "http://pspp-integrated.com/index.php?&id=111111&from=<? echo $_SESSION[info-from];?>&read=formulir-pendaftaran-online-pspp.html"; // url tujuan
            var count = 61; // dalam detik
            function countDown() {
                if (count > 0) {
                    count--;
                    var waktu = count + 1;
                    $('#pesan').html('Formulir pendaftaran anda akan  muncul  dalam ' + waktu + ' detik.<br><br>Mohon tunggu...');
                    setTimeout("countDown()", 1000);
                } else {
                    window.location.href = url;
                }
            }
            countDown();
        </script>
<? echo "</div>";} else{



 if ($_SESSION[bebas]=="yes"){
?>

Mohon tunggu..<br><br>
Detecting... <br>http://<? echo $URL_REF_HOST;?> (<? echo $_SESSION[pemilik_domain];?>)...<br>
<script language="javascript" type="text/javascript">
setTimeout("location.href = '../index.php?&id=111111&from=<? echo $_SESSION[info-from];?>&read=formulir-pendaftaran-online-pspp.html';", 1000);
</script>
<?}else{?>
Mohon tunggu..<br><br>
Detecting... <br>http://<? echo $URL_REF_HOST;?> (Marketing NOT FOUND!)...<br>
<script language="javascript" type="text/javascript">
setTimeout("location.href = '../index.php';", 1000);
</script>

<?}?>
<?}?>