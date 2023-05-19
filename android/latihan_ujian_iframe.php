<? session_start();?>
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">

<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
 

<? include "koneksi.php";
			    $materiaktifo = mysql_query("select * from config_app_input_soal_ujian"); 
				while($j = mysql_fetch_array($materiaktifo)){ 
				$batch=$j[3];
				$periode=$j[2];
				if ($_SESSION[ps_prodi]=="PRAMUGARI"){$materiaktif="PRAMUGARI-UJIAN-".$j[2];} 
				if ($_SESSION[ps_prodi]=="STAFF PENERBANGAN"){$materiaktif="STAFF-PENERBANGAN-UJIAN-".$j[2];}
				if ($_SESSION[ps_prodi]=="AVIATION SECURITY"){$materiaktif="AVIATION-SECURITY-UJIAN-".$j[2];}
		
				} 
				
				
				if ($_SESSION['ps_prodi']=="PRAMUGARI") { if ($_SESSION['ps_kampus']=="JAKARTA"){
				$_SESSION['materiujian'] = "SPESIAL-$_SESSION[jurusan]-UJIAN-$periode";
				$materiaktif = "SPESIAL-$_SESSION[jurusan]-UJIAN-$periode";
				}}

$waktu=gmdate("H:i",time()+7*3600);
$t=explode(":",$waktu);
$jam=$t[0];
$menit=$t[1]; if ($jam > 00 and $jam <
10 ){
    if ($menit >00 and $menit<60){
    $ucapan="Selamat Pagi... ";
    } }else if ($jam >= 10 and $jam < 15 ){
    if ($menit >00 and $menit<60){
    $ucapan="Selamat Siang... ";     }
}else if ($jam >= 15 and $jam < 18 ){
    if ($menit >00 and $menit<60){
    $ucapan="Selamat Sore... ";     }
}else if ($jam >= 18 and $jam <= 24 ){
    if ($menit >00 and $menit<60){
    $ucapan="Selamat Malam... ";
    }
}else {
    $ucapan="Error";
} ?>


<div class="callout callout-warning no-margin bring-up">
           <? echo $ucapan;?> Selamat Datang di Menu Latihan Ujian Online Periode <? echo $periode;?>
 </div>

 
<? $sekarang=date("Y-m-d");
$jummsoal = mysql_query("select count(pertanyaan) from banksoal_akademik  where materi='$materiaktif' and tgl_latihan='$sekarang'"); 
	while($j = mysql_fetch_array($jummsoal)){ $jumsoal=$j[0];}  
	
	if ($jumsoal>0){ $waktupengerjaan=$jumsoal*45;?>
	
<script>
var waktunya = <? echo $waktupengerjaan;?>;
var waktu ;
var jalan = 0;
var habis = 0;
function init(){
    checkCookie()
	document.getElementById("panduan").style.display = "none";
	document.getElementById("soal").style.display = "block";
	document.getElementById("tombol_mulai").style.display = "none";
	document.getElementById("tombol_batal").style.display = "none";
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



<bodyonunload=keluar()>


<div id="panduan">

	
	


<h2>Konfirmasi Persiapan!! </h2>
	<i>
	Sebentar lagi anda akan mengikuti latihan ujian online. Apakah anda sudah yakin untuk mengikuti latihan ujian ini? 
	
	<br></i><br>
	
</div>


	 <a id="tombol_mulai" class="btn btn-success" href="#a" onclick=init()><strong>YA</strong></a> &nbsp; &nbsp;<strong><a id="tombol_batal" class="btn btn-default" href="index.php?action=ujian-online">TIDAK</a></strong>

</div>


<div id="soal" style="display:none;">




<a name="a"></a>
<h2>Selamat mengerjakan!</h2>
	
	<form action="submitnilai.php" method="POST" id="formulir">
	<ol>
	<?php
	
	
	$materi = mysql_query("select distinct(sub_materi) from banksoal_akademik  where materi='$materiaktif' ORDER BY RAND()"); 
	$no = 1;
	$a=0;
	while($p = mysql_fetch_array($materi)){
	echo "<h3>Materi ".$p[0]."</h3>";
	$soal = mysql_query("select * from banksoal_akademik where sub_materi='$p[0]' and materi='$materiaktif' ORDER BY RAND()"); 
	
	while($s = mysql_fetch_array($soal)){
	$a=$a+1;
		echo "<li><b> &nbsp;".$a." . ".$s['pertanyaan']."</b><br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='a'>A. ".$s['pilihan_a']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='b'>B. ".$s['pilihan_b']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='c'>C. ".$s['pilihan_c']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='d'>D. ".$s['pilihan_d']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='e'>E. ".$s['pilihan_e']."<br><br>\n";
		$no++;
	}}
	$jumlahsoal = $no - 1;
	echo "<input type=hidden name=jumlahsoal value=$jumlahsoal>";
	$_SESSION[materi]=$_GET[materi]; ?>
	<br>
	
	
	
	<input type=button class="btn btn-primary" value="Selesai" onclick=selesai()>
	
	<br><br><br><br><br>
	</form>


	<div style="position:fixed; float:center; width:100%; bottom: 20px; background-color:orange; align:center;"><blink><strong><font color="red" align="center">Sisa waktu pengerjaan : </font></strong></blink><font color="red">
<div id=divwaktu ></div></font></div>

 

</div>



</div>
</div>


<?}else{ echo "Mohon maaf, sepertinya hari ini tidak ada soal untuk latihan. Silakan kembali besok pagi. Terima kasih...";}?>
</body>



