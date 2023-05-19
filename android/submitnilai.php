<? session_start();?>

<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">


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


				

$benar = 0;
$salah = 0;
$jumlahsoal=$_POST['jumlahsoal'];
if($_POST['soal']){
foreach($_POST['soal'] as $key => $value){
    $cek = mysql_query("SELECT * FROM banksoal_akademik WHERE soalid=$key");
    while($c = mysql_fetch_array($cek)){
        $jawaban = $c['jawaban'];
    }
    if($value==$jawaban){
        $benar++;
    }else{
        $salah++;
    }
}
$jumlah = $_POST['jumlahsoal'];
$tidakjawab = $jumlah - $benar - $salah;
$nilai=round(($benar/$jumlahsoal)*10,2); 
?>

<?

}

	$tanggal= date("F j, y, g:i a");
	
	echo "<h3>LATIHAN UJIAN SELESAI!<br>BERIKUT NILAI ANDA :</h3><br>Benar = $benar<br>Salah =$salah<br>Tidak Jawab = $tidakjawab<br>Jumlah Soal : $jumlahsoal <br><br><strong>Nilai Anda : $nilai </strong> ( jumlah soal / jawaban benar )";
			
	?>
<br><br><br><br>Berikut jawaban dari soal-soal yang telah anda kerjakan :<br><br><br>

<?php
	
	
	$materi = mysql_query("select distinct(sub_materi) from banksoal_akademik  where materi='$materiaktif' ORDER BY RAND()"); 
	$no = 1;
	$a=0;
	while($p = mysql_fetch_array($materi)){
	echo "<h3>Materi ".$p[0]."</h3>";
	$soal = mysql_query("select * from banksoal_akademik where sub_materi='$p[0]' and materi='$materiaktif'  ORDER BY RAND()"); 
	
	while($s = mysql_fetch_array($soal)){
	$a=$a+1;
	$jawaban=strtoupper($s['jawaban']);
		echo "<li><b> &nbsp;".$a." . ".$s['pertanyaan']."</b><br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='a'>A. ".$s['pilihan_a']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='b'>B. ".$s['pilihan_b']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='c'>C. ".$s['pilihan_c']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='d'>D. ".$s['pilihan_d']."<br>\n";
		echo "<input type=radio name=soal[".$s['soalid']."] value='e'>E. ".$s['pilihan_e']."<br>
		<font color='green'>Jawaban Benar : ".$jawaban."</font><br><br>\n";
		$no++;
	}}
	$jumlahsoal = $no - 1;
	echo "<input type=hidden name=jumlahsoal value=$jumlahsoal>";
	$_SESSION[materi]=$_GET[materi]; ?>
	<br>
	<strong>SEMOGA BERMANFAAT..<br>
	Terus Belajar dan Kembangkan Kemampuan diri...<br><br>SEMANGAT..!!!!</strong>

