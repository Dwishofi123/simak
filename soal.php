<? session_start();
include  "system/system/konek.php";
?>


 <tr>
 <td class="welcome" valign="top" align="left">
 
 
<div class="back_albums grid_8" > 

<div>

<?php

$waktu=gmdate("H:i",time()+7*3600);
$t=explode(":",$waktu);
$jam=$t[0];
$menit=$t[1]; if ($jam > 00 and $jam <
10 ){
    if ($menit >00 and $menit<60){
    $ucapan="Selamat Pagi";
    } }else if ($jam >= 10 and $jam < 15 ){
    if ($menit >00 and $menit<60){
    $ucapan="Selamat
Siang";     }
}else if ($jam >= 15 and $jam < 18 ){
    if ($menit >00 and $menit<60){
    $ucapan="Selamat Sore";     }
}else if ($jam >= 18 and $jam <= 24 ){
    if ($menit >00 and $menit<60){
    $ucapan="Selamat Malam";
    }
}else {
    $ucapan="Error";
} ?>



<script>
var waktunya = 3600;
var waktu ;
var jalan = 0;
var habis = 0;
function init(){
    checkCookie()
	document.getElementById("panduan").style.display = "none";
	document.getElementById("soal").style.display = "block";
	document.getElementById("tombol_mulai").style.display = "none";
    mulai();
}
function keluar(){
    if(habis==0){
        setCookie('waktux',waktu,365);
    }else{
        setCookie('waktux',0,-1);
    }
}
function mulai(){
    jam = Math.floor(waktu/3600);
    sisa = waktu%3600;
    menit = Math.floor(sisa/60);
    sisa2 = sisa%60
    detik = sisa2%60;
    if(detik<10){
        detikx = "0"+detik;
    }else{
        detikx = detik;
    }
    if(menit<10){
        menitx = "0"+menit;
    }else{
        menitx = menit;
    }
    if(jam<10){
        jamx = "0"+jam;
    }else{
        jamx = jam;
    }
    document.getElementById("divwaktu").innerHTML = jamx+":"+menitx+":"+detikx;
    waktu --;
    if(waktu>0){
        t = setTimeout("mulai()",1000);
        jalan = 1;
    }else{
        if(jalan==1){
            clearTimeout(t);
        }
        habis = 1;
        document.getElementById("formulir").submit();
    }
}
function selesai(){
    document.getElementById("formulir").submit();
}
function getCookie(c_name){
    if (document.cookie.length>0){
        c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1){
            c_start=c_start + c_name.length+1;
            c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return "";
}

function setCookie(c_name,value,expiredays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

function checkCookie(){
    waktuy=getCookie('waktux');
    if (waktuy!=null && waktuy!=""){
        waktu = waktuy;
    }else{
        waktu = waktunya;
        setCookie('waktux',waktunya,7);
    }
}

</script>
</header>


<bodyonunload=keluar()>
<? $query = mysql_query("SELECT * from siswa where id=$_SESSION[idpendaftaran]"); 
while($b=mysql_fetch_row($query)){
$status_p=$b[76];
$status_pe=$b[76];
$tanggal_ujian=$b[8];
$hasil_tes=$b[68];
}

if ($status_p=='sudah'){$satus="style='display:none;'"; }
if ($status_p=='allow'){ $status_pe='sudah diizinkan'; }
?>


<div id="panduan" <? echo $satus; ?>>
	<p>
	
	


	<br><h2>Selamat Datang di Tes Masuk PSPP Penerbangan</h2>
	<i><br>
	Anda akan melakukan tes online PSPP Penerbangan sebagai syarat masuk pendidikan penerbangan. Tes online berisi 85 soal. terdiri dari 30 soal Pengetahuan Umum, 30 soal Psikotes dan 25 soal bahasa Inggris.Soal dikerjakan dalam <blink><strong><font color="red">60 menit</font></strong></blink>. Sistem hanya akan membaca jumlah nilai benar yang anda pilih.<br><br>
	Anda hanya dapat melakukan 1 kali ujian online. Setelah anda mendapat nilai pada tes ini, anda tidak dapat mengulang kembali soal-soal yang sudah anda kerjakan.<br><br>
	Ingat, anda hanya diberi waktu 60 menit untuk mengerjakan soal.Apabila anda belum siap, anda dapat kembali di lain waktu untuk mengikuti tes online ini.<br><br>Waktu mulai berjalan setelah anda menekan tombol 'MULAI'.<br>
	Setelah anda benar-benar sudah siap, silakan tekan tombol 'MULAI' dan kami harap anda segera mengisi pertanyaan-pertanyaan yang sudah kami siapkan. 
	
	<br></i><br>
	
</div>


	<? echo "Anda ".$status_pe." melakukan ujian. "; if ($status_p=="sudah"){?> <strong>Anda sudah mengikuti tes online pada tanggal <? echo $tanggal_ujian;?>. </strong> <br><br>Berikut hasil tes online anda :<br><? echo $hasil_tes;?><?} else {?>  <a id="tombol_mulai" href="#a" onclick=init()><strong>MULAI >></strong></a><br><?}?>

</div>


<div id="soal" style="display:none;" class="form_pendaftaran">


<div style="padding-left:32px; padding-right:32px;">
<? if ($status_p=="allow"){?> <!-- jika status ujian diizinkan sama admin, so... lanjut.... -->

<div style="position: fixed;     bottom: 0;    width: 40%; background-color:red;"><blink><strong><font color="yellow">Sisa waktu mengerjakan : </font></strong></blink><font color="yellow">
<div id=divwaktu ></div></font></div>

<a name="a"></a>
<h2>Selamat mengerjakan!</h2>
	

<br><i>Pilih jawaban yang menurut anda benar.Tekan tombol selesai apabila anda sudah selesai mengerjakan. sistem secara otomatis akan menutup dan menghitung hasil ujian anda setelah waktu yang diberikan telah habis.</i><br>
	<form action="isinilai.php?id=<? echo $_SESSION[idpendaftaran];?>" method=post id=formulir>
	<ol>
	<?php
	
	$soal = mysql_query("SELECT * FROM banksoal ") or die(mysql_error());
	$no = 1;
	$a=0;
	while($s = mysql_fetch_array($soal)){
	$a=$a+1;
		echo "<li><b> &nbsp;".$g." ".$s['pertanyaan']."</b><br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='a'>A. ".$s['pilihan_a']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='b'>B. ".$s['pilihan_b']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='c'>C. ".$s['pilihan_c']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='d'>D. ".$s['pilihan_d']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='e'>E. ".$s['pilihan_e']."<br><br>\n";
		$no++;
	}
	$jumlahsoal = $no - 1;
	echo "<input type=hidden name=jumlahsoal value=$jumlahsoal>";
	?>
	<br>
	<br><br>
	
	</ol>
	
	
	<input type=button value=Selesai onclick=selesai() class="button">
	

	</form><br><br><br>
*tekan tombol submit apabila anda sudah selesai mengerjakan. sistem secara otomatis akan menutup dan menghitung hasil ujian anda setelah waktu yang diberikan telah habis.


<? } else {?> <br>
Mohon maaf, anda belum dapat mengikuti ujian online. Syarat mengikuti ujian online adalah anda harus melengkapi syarat administrasi yaitu anda harus membayar biaya pendaftaran sebesar 300rb yang dapat dibayarkan langsung ke Kampus PSPP terdekat ataupun dapat juga melalui transfer 
                  ke akun Rekening  PSPP Penerbangan di Bank BRI 0098-01-002137-30-3 an PSPP Penerbangan. <br><br>
				 Setelah melakukan transfer, mohon konfirmasi pembayaran ke Panitia Pendaftaran PSPP yang sebelumnya sudah anda hubungi<br><br>
				 Anda bisa mengikuti tes online ini setelah sistem berhasil meng-autentifikasi pembayaran anda.<br><br>
				 <br><br><br>
				 
				 
<? }?>
</div>


</div></div>

</div></div>
</td></tr>
