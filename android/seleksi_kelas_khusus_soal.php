<? session_start();

include "koneksi.php";
if (!isset($_SESSION[ps_nodaf])){ ?> <script> window.location='login.php'; </script><?}?>
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
  <link rel="stylesheet" href="css/style22.css">
  
  <? if ($_POST[pwdlogin]<>""){ // cek pasword tes seleksi
				$sqlni=mysql_query("select * from pwd_tes_seleksi_kelas_khusus where NODAF='$_SESSION[ps_nodaf]' and PASSWORD='$_POST[pwdlogin]'"); 
				$c=0;
				while($data = mysql_fetch_array($sqlni)) { $c=$c+1; }
				if ($c==1){$_SESSION[akses_tes_seleksi]="allow";}else{$_SESSION[akses_tes_seleksi]="locked";}}?>
				
  
  <!-- REDIRECT KE PAGE NILAI JIKA SUDAH PERNAH IKUTI TES SELEKSI -->
  <? $sqlni=mysql_query("select * from nilai_tes_seleksi_kelas_khusus where nodaf='$_SESSION[ps_nodaf]'"); 
				$c=0;
				while($data = mysql_fetch_array($sqlni)) { $c=$c+1; $pesan="Anda sudah mengikuti seleksi kelas khusus. Berikut hasil tes seleksi anda :<br><br>Tanggal tes : $data[tanggal_tes]<br>Nilai $data[ket_nilai]";}
				
				if ($c==1) { echo "<script>window.location='index.php?page=nilai-seleksi-kelas-khusus';</script>";}?>
				
  
  <!-- MAKSIMAL SOAL 60 gaes....!-->
  
 <script>
var waktunya = 2700;
var waktu ;
var jalan = 0;
var habis = 0;
function init(){
    checkCookie()
    document.getElementById("bukansoal").style.display = "none";
	document.getElementById("bukansoalbutton").style.display = "block";
	document.getElementById("waktumengerjakan").style.display = "block";
	document.getElementById("divselesai").style.display = "block";
	
	
	document.getElementById("soal1").style.display = "block";
	document.getElementById("soal2").style.display = "block";
	document.getElementById("soal3").style.display = "block";
	document.getElementById("soal4").style.display = "block";
	document.getElementById("soal5").style.display = "block";
	document.getElementById("soal6").style.display = "block";
	document.getElementById("soal7").style.display = "block";
	document.getElementById("soal8").style.display = "block";
	document.getElementById("soal9").style.display = "block";
	document.getElementById("soal10").style.display = "block";
	
	document.getElementById("soal11").style.display = "block";
	document.getElementById("soal12").style.display = "block";
	document.getElementById("soal13").style.display = "block";
	document.getElementById("soal14").style.display = "block";
	document.getElementById("soal15").style.display = "block";
	document.getElementById("soal16").style.display = "block";
	document.getElementById("soal17").style.display = "block";
	document.getElementById("soal18").style.display = "block";
	document.getElementById("soal19").style.display = "block";
	document.getElementById("soal20").style.display = "block";
	
	
	document.getElementById("soal21").style.display = "block";
	document.getElementById("soal22").style.display = "block";
	document.getElementById("soal23").style.display = "block";
	document.getElementById("soal24").style.display = "block";
	document.getElementById("soal25").style.display = "block";
	document.getElementById("soal26").style.display = "block";
	document.getElementById("soal27").style.display = "block";
	document.getElementById("soal28").style.display = "block";
	document.getElementById("soal29").style.display = "block";
	document.getElementById("soal30").style.display = "block";
	
	document.getElementById("soal31").style.display = "block";
	document.getElementById("soal32").style.display = "block";
	document.getElementById("soal33").style.display = "block";
	document.getElementById("soal34").style.display = "block";
	document.getElementById("soal35").style.display = "block";
	document.getElementById("soal36").style.display = "block";
	document.getElementById("soal37").style.display = "block";
	document.getElementById("soal38").style.display = "block";
	document.getElementById("soal39").style.display = "block";
	document.getElementById("soal40").style.display = "block";
	
	document.getElementById("soal41").style.display = "block";
	document.getElementById("soal42").style.display = "block";
	document.getElementById("soal43").style.display = "block";
	document.getElementById("soal44").style.display = "block";
	document.getElementById("soal45").style.display = "block";
	document.getElementById("soal46").style.display = "block";
	document.getElementById("soal47").style.display = "block";
	document.getElementById("soal48").style.display = "block";
	document.getElementById("soal49").style.display = "block";
	document.getElementById("soal50").style.display = "block";
	
	document.getElementById("soal51").style.display = "block";
	document.getElementById("soal52").style.display = "block";
	document.getElementById("soal53").style.display = "block";
	document.getElementById("soal54").style.display = "block";
	document.getElementById("soal55").style.display = "block";
	document.getElementById("soal56").style.display = "block";
	document.getElementById("soal57").style.display = "block";
	document.getElementById("soal58").style.display = "block";
	document.getElementById("soal59").style.display = "block";
	document.getElementById("soal60").style.display = "block";
		
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

<div class="portlet-grid panel-primary"> 

	

  
<div class="card" align="left" style="align:left;">
  <div class="products">
  
  
  
      <div class="product active" product-id="1" <? if ($_SESSION[akses_tes_seleksi]=="allow"){echo "style='display:none;'";}?>>
      <h1 class="title">Welcome..</h1>
      <p class="description">Selamat datang di Tes Seleksi Kelas Khusus. Silakan masukkan password :<br><br>
	  <form action="" method="POST"><input type="text" name="pwdlogin"></input><br><br><input type=submit value="SUBMIT"></input></form></p>
    </div>
	
		<form action="submit_nilai_tes_kelas_khusus.php" method="POST" id="formulir">

	<div class="product <? if ($_SESSION[akses_tes_seleksi]=="allow"){echo "active";}?> product-id="1">
      
      <h1 class="title">Welcome..</h1>
      <p class="description">Sebentar lagi anda akan mengikuti tes seleksi kelas khusus PSPP Penerbangan. Pastikan anda membaca semua petunjuk dengan seksama. Klik tombol next untuk membaca petunjuk berikutnya..</p>
    </div>

    <div class="product" product-id="1">
     
      <h1 class="title">Batas waktu</h1>
      <p class="description">Anda akan mengerjakan soal tes seleksi sejumlah 60 soal dengan waktu 45 menit. Apabila waktu sudah habis, sistem secara otomatis akan menutup halaman ini dan mulai menghitung nilai anda.</p>
    </div>
    <div class="product" product-id="1"> 
      <h1 class="title">Berdoa</h1>
      <p class="description">Berdoalah sebelum mengerjakan tes seleksi ini, semoga anda mendapatkan hasil terbaik. Amin...<br><br>
	  Tekan tombol next untuk mulai mengikuti tes seleksi.</p>
    </div>
	
	
	<div class="product" product-id="1"> 
      <h1 class="title">Data Peserta</h1>
      <p class="description">Silakan lengkapi data berikut ini :<br>
	  <? 	//AWAL SCRIPT UNTUK MENAMPILKAN BIODATA SISWA PENDAFTAR
			$kueridatasiswa = mysql_query("select * from profil_siswa where ps_nodaf = '$_SESSION[ps_nodaf]'");
			$cetakdatasiswa = mysql_fetch_array($kueridatasiswa);?>
	  <label>NAMA</label><input type="text" name="nama" id="nama" readonly=readonly class="mdl-textfield__input" value="<? echo $cetakdatasiswa[ps_nama];?>"></input>
	  <label>NO. INDUK</label><input type="text" name="induk" id="induk" readonly=readonly  class="mdl-textfield__input" value="<? echo $cetakdatasiswa[ps_induk];?>"></input>
	  <label>NODAF</label><input type="text" name="nodaf" id="nodaf"  readonly=readonly  class="mdl-textfield__input" value="<? echo $cetakdatasiswa[ps_nodaf];?>"></input>
	  <label>JURUSAN</label><input type="text" name="jurusan" readonly=readonly  id="jurusan" class="mdl-textfield__input" value="<? echo $cetakdatasiswa[ps_prodi];?>"></input>
	  <label>ANGKATAN</label><input type="text" name="angkatan" readonly=readonly  id="angkatan" class="mdl-textfield__input" value="<? echo $cetakdatasiswa[ps_ang];?>"></input>
	  <label>KAMPUS</label><input type="text" name="kampus" readonly=readonly  id="kampus" class="mdl-textfield__input" value="<? echo $cetakdatasiswa[ps_kampus];?>"></input>
	  <label color=red><font color="red">NO. HP *</font></label><input type="text" name="hp" id="hp" class="mdl-textfield__input"></input>

	<input name="cek1" id="cek1" type="checkbox" onclick=init()>dengan ini saya menyatakan bahwa saya siap untuk mengikuti tes seleksi kelas khusus.</input>
	  </p>
    </div>
	
	
	<div class="product" product-id="1" > 
	  <h1 class="title">Seleksi Kelas Khusus </h1>
      <p class="description" id="bukansoal" style="display:block;">Anda belum menyatakan setuju untuk mengikuti tes seleksi kelas khusus. Silakan ulangi proses dari depan. <a href="index.php?page=seleksi-kelas-khusus">Klik disini</a> untuk mengulangi.
	  <div id="bukansoalbutton" style="display:none;">Waktu sudah mulai berjalan dan soal-soal tes akan segera ditampilkan. Segera tekan tombol next untuk memulai...</div>
	  </p>


    </div>
	
	
<?php
	INCLUDE "koneksi.php"; 
	$soal = mysql_query("SELECT * FROM banksoal_tes_seleksi_kelas_khusus order by rand()"); 
	$no = 0;
	$a=0;
	while($s = mysql_fetch_array($soal)){
	$a=$a+1;?>
	<div class="product" product-id="1" id="soal<? echo $a;?>" style="display:none;"> 
      <h1 class="title">Seleksi Kelas Khusus </h1>
      <p class="description"><? echo "<strong>".$a.".</strong> ".$s['pertanyaan'];?><br>
	 <? echo "<input type=radio name=soal[".$s['soalid']."] value='a'>A. ".$s['pilihan_a']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='b'>B. ".$s['pilihan_b']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='c'>C. ".$s['pilihan_c']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='d'>D. ".$s['pilihan_d']."<br>\n";
		$no=$no+1;
	?>
	  </p>
	  
    </div>
<?} $jumlahsoal = $no;
	echo "<input type=hidden name=jumlahsoal value=$jumlahsoal>";?>	



	<div class="product" product-id="1" id="divselesai" style="display:none;" onmouseover="document.getElementById('footer').style.display = 'none';" > 
	  <h1 class="title">Seleksi Kelas Khusus </h1>
      <p >Selamat, anda sudah mengerjakan 60 soal yang ada. Selanjutnya silakan klik tombol selesai untuk mengakhiri tes.
	  </p>
	  <a class="btn" id="ok" onclick=selesai() href="#" ripple="" ripple-color="#666666" >Selesai</a><br><br><br><br><br>


    </div>
	
	
	
   
  </div>
  <div id="waktumengerjakan" style="display:none;">Sisa waktu mengerjakan : <div id=divwaktu ></div></div>
  <div class="footer" id="footer" <? if ($_SESSION[akses_tes_seleksi]<>"allow"){ echo "style='display:none;'";}?>><a class="btn" id="prev" href="#" ripple="#C4C8CB" ripple-color="#C4C8CB" color="grey">Prev</a><a class="btn" id="next" href="#" ripple="" ripple-color="#666666" >Next</a></div>
  
  
  <br><br><br><br><br><br><br><br><br><br><br><br>
</div>

</form>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

	  
			  
			  
			  
			  
			  
			  
			  
</div>
</div>

