<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
<? session_start();
 
 if (empty($_SESSION[ps_nodaf])){echo "<script>window.location='login.php'; </script>";}else{include "koneksi.php";
 
include "koneksi.php";

 
 ?>
 
 
 <meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Ujian Online</h3>
    		  </div> 
<div class="panel-body">

<?php 
if($_SESSION['ps_prodi'] == "STAFF PENERBANGAN")
{
	$_SESSION['jurusan'] = "STAFF-PENERBANGAN";
}
else if($_SESSION['ps_prodi'] == "PRAMUGARI")
{
	$_SESSION['jurusan'] = "PRAMUGARI";
}
else if($_SESSION['ps_prodi'] == "AVIATION SECURITY")
{
	$_SESSION['jurusan'] = "AVIATION-SECURITY";
}


if($_GET['periode'] == 1)
{
	
	$bperiode = 2;
}


else if ($_GET['periode'] == 2)
{

	$bperiode = 3 ;
}
else if ($_GET['periode'] == 3)
{
	$bperiode = 4 ;
}


$_SESSION['materiujian'] = "$_SESSION[jurusan]-UJIAN-$_GET[periode]";

if ($_SESSION['ps_prodi']=="PRAMUGARI") { if ($_SESSION['ps_kampus']=="JAKARTA"){
$_SESSION['materiujian'] = "SPESIAL-$_SESSION[jurusan]-UJIAN-$_GET[periode]";
}}





//echo $_SESSION['materiujian'];
//AWAL QUERY UNTUK MENCARI JUMLAH BIAYA PENDIDIKAN 
$kueribipend = mysql_query("select sum(nominal) as jumlah from biaya_pendidikan where jurusan = '$_SESSION[ps_prodi]' and pembayaran_ke <= $bperiode");
$cetakbpend = mysql_fetch_array($kueribipend);
$biayapendidikan = "$cetakbpend[jumlah]";
//AKHIR QUERY UNTUK MENCARI JUMLAH BIAYA PENDIDIKAN 

//AWAL QUERY UNTUK MENCARI JUMLAH BIAYA PENDIDIKAN 
$kueribsiswa = mysql_query("select sum(by_nom) as jumlah from bayar_detail where by_nodaf = '$_SESSION[ps_nodaf]'");
$cetakbsiswa = mysql_fetch_array($kueribsiswa);
$jumlahpembayaran = "$cetakbsiswa[jumlah]";
//AKHIR QUERY UNTUK MENJULAH JUMLAH BIAYA PENDIDIKAN 

if($jumlahpembayaran < $biayapendidikan)
//if($totalbiayasiswa < $totalbiayasiswa)
{
	echo "<script>alert('Mohon maaf anda belum bisa mengikuti ujian online, karena alasan angsuran biaya pendidikan yang belum terselesaikan! Silakan hubungi tim support! Terima kasih');window.location='index.php';</script>";
}
else
{
	$kueriujian = mysql_query("select * from nilai_akademik where nodaf = '$_SESSION[ps_nodaf]' and materi = '$_SESSION[materiujian]'");
	$cekujian = mysql_num_rows($kueriujian);
	$cetakujian = mysql_fetch_array($kueriujian);
	
	if($cekujian > 0)
	{
		echo "Anda sudah mengikuti ujian $_SESSION[materiujian] pada $cetakujian[tanggal_ujian]. Berikut hasil ujian online anda : <br> $cetakujian[ket_nilai]";
	}
	else
	{
	
	
	$tanggal= date("Y-m-d");
	$aa = mysql_query("select * from config_app_input_soal_ujian"); 
	while ($tampilkan = mysql_fetch_array($aa)){ $tanggal_ujian=$tampilkan[tanggal_ujian];}

	if ($tanggal<>$tanggal_ujian){  echo "Mohon maaf, ujian online hanya dapat diikuti pada saat tanggal ujian berlangsung. Ujian online akademik berikutnya dapat diikuti pada $tanggal_ujian, hari ini tanggal $tanggal. Terima kasih.";} else{

		
	if(@$_GET['tes'] == 'mulai')
				{
					?><script>
					var waktunya = 3600;
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
					</header>
					<bodyonunload=keluar()>
					<div id="panduan">
					<h3>Konfirmasi Persiapan!! </h3>
	
	Sebentar lagi anda akan mengikuti ujian online dengan materi <strong><?php echo $_SESSION['materiujian'];?></strong>. Apakah anda sudah yakin untuk mengikuti tes ini? 
	
	<br><br></div>
					<a id="tombol_mulai" class="btn btn-success" href="#a" onclick=init()><strong>YA</strong></a> &nbsp; &nbsp;<strong><a id="tombol_batal" class="btn btn-default" href="?page=ujianonline&periode=<?php echo $_GET['periode'];?>">TIDAK</a></strong>
					<div id="soal" style="display:none;">

					<a name="a"></a>
										Selamat mengerjakan..<br>
										Pilih jawaban yang menurut anda benar.Tekan tombol submit apabila anda sudah selesai mengerjakan. sistem secara otomatis akan menutup dan menghitung hasil ujian anda setelah waktu yang diberikan telah habis.<br><br>
						<form action="submit_nilai.php?periode=<? echo $_GET[periode];?>&nodaf=<?php echo $_SESSION['ps_nodaf'];?>&materiujian=<?php echo $_SESSION['materiujian'];?>&angkatan=<? echo $_SESSION[ps_ang];?>" method=POST enctype="multipart/form-data" id=formulir width="100%">
						<ol>
						<?php
						
						$soal = mysql_query("select * from banksoal_akademik where materi ='$_SESSION[materiujian]' order by rand()"); 
						$no = 1;
						$a=0;
						while($s = mysql_fetch_array($soal)){
						$a=$a+1;
							echo "<li><b> &nbsp; ".$s['pertanyaan']."</b><br>\n";
							echo "<input type=radio name=soal[".$s['soalid']."] value='a'>A. ".$s['pilihan_a']."<br>\n";
							echo "<input type=radio name=soal[".$s['soalid']."] value='b'>B. ".$s['pilihan_b']."<br>\n";
							echo "<input type=radio name=soal[".$s['soalid']."] value='c'>C. ".$s['pilihan_c']."<br>\n";
							echo "<input type=radio name=soal[".$s['soalid']."] value='d'>D. ".$s['pilihan_d']."<br>\n";
							echo "<input type=radio name=soal[".$s['soalid']."] value='e'>E. ".$s['pilihan_e']."<br><br>\n";
							$no++;
						}
						
						if ($a==0){echo "<br><i><font color=red>Mohon maaf, belum ada soal yang dapat anda kerjakan untuk periode ujian ini. Silakan tunggu jadwal ujiannya. Terima kasih</font></i><br><br><br>";}

						
						$jumlahsoal = $no - 1;
						echo "<input type=hidden name=jumlahsoal value=$jumlahsoal>";
						//$_SESSION['materi']=$_GET['materi']; 
						?><br>
						<input type=submit class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary left" value="Submit / Selesai" onclick=selesai() <? if ($a==0){echo "style='display:none;'";}?>><br><Br><Br>
						</form>	<div <? if ($a==0){echo "style='display:none;'";}?>>*tekan tombol submit apabila anda sudah selesai mengerjakan. sistem secara otomatis akan menutup dan menghitung hasil ujian anda setelah waktu yang diberikan telah habis.</div>
						
						<div style="padding-left:0px; padding-right:0px; <? if ($a==0){echo "display:none;";}?>" >
					<div style="position:fixed; float:center; width:80%; bottom: 0px; background-color:orange;"><blink><strong><font color="red" align="center">Sisa waktu mengerjakan : </font></strong></blink><font color="red">
					<div id=divwaktu ></div></font></div></div>
					</div><?php 
				}
				else
				{ 
					?>
	
	Selamat datang di halaman ujian online  akademik PSPP Penerbangan.Kerjakan soal ini dengan tenang dan perhatikan batas waktu pengerjaan. <br><br>Anda hanya diberi waktu 60 menit untuk mengerjakan soal-soal yg tersedia. Gunakan waktu sebaik-baiknya. Setelah waktu habis, anda sudah tidak dapat mengikuti ujian online dan nilai anda akan diprosses secara otomatis oleh sistem. <br><br>
	Jika anda sudah memahami peraturan ini, tekan tombol <b>MULAI</b> untuk memulai ujian online. Terima kasih 
	
	<br><br> <a href="?page=ujianonline&periode=<?php echo $_GET['periode'];?>&tes=mulai"><font color=blue size=4><b> MULAI>></b></font></a><br><br><br><br><br>
					<?php
				}
}}
}
				
?>
    	</div>
		</div>
		</div>
		</div>
		
<?}?>	
