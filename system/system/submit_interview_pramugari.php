<?php 
session_start();
$id = "$_POST[idnya]";include "konek.php";
date_default_timezone_set("Asia/Jakarta");
$tgls = date('Y-m-d H:i:s');
$dukungan_ortu = "$_POST[dukungan_ortu]";
$biaya_pendidikan = "$_POST[biaya_pendidikan]";
$nama_ortu = "$_POST[nama_ortu]";
$alamat = "$_POST[alamat]";
$kode_pos = "$_POST[kode_pos]";
$pengetahuan = "$_POST[pengetahuan]";
$etika = "$_POST[etika]";
$kemampuan_khusus = "$_POST[kemampuan_khusus]";
$berbicara = "$_POST[berbicara]";
$komunikasi = "$_POST[komunikasi]";
$performance = "$_POST[performance]";

$dijanjikan = "$_POST[dijanjikan]";
$status = "$_POST[status]";
$diterima_jurusan = "$_POST[diterima_jurusan]";
$diterima_kampus = "$_POST[diterima_kampus]";
$diterima_angkatan = "$_POST[diterima_angkatan]";
$marketing = "$_POST[marketing]";
$jalur_interview = "$_POST[jalur_interview]";
$catatan = "$_POST[catatan]";




//$_SESSION['jilbab'] = "$_POST[jilbab]";

$query_siswa = mysql_query("select * from siswa where ID = '$id'");
$cetak_siswa = mysql_fetch_array($query_siswa);
$jilbab = "$cetak_siswa[jilbab]";
$id_siswa = "$_POST[idnya]";


$tgl_inteview = date('Y-m-d');
$nama = "$_POST[nama]";
$tempat_lahir = "$_POST[tempat_lahir]";
$tgl_lahir = "$_POST[tgl_lahir]";
$email = "$_POST[email]";
$ukuran_baju = "$_POST[ukuran_baju]";
$ukuran_sepatu = "$_POST[ukuran_sepatu]";
$asal_sekolah = "$_POST[asal_sekolah]";
$kota_sekolah = "$_POST[kota_sekolah]";
$berat_badan = "$_POST[berat_badan]";
$tinggi_badan = "$_POST[tinggi_badan]";
//$ini = "&nama_ortu=$nama_ortu&tgl_lahir=$tgl_lahir&biaya_pendidikan=$biaya_pendidikan&kode_pos=$kode_pos&pengetahuan=$pengetahuan&etika=$etika&kemampuan_khusus=$kemampuan_khusus&berbicara=$berbicara&komunikasi=$komunikasi&performance=$performance&dijanjikan=$dijanjikan&status=$status&diterima_jurusan=$diterima_jurusan&diterima_kampus=$diterima_kampus&diterima_angkatan=$diterima_angkatan&jalur_interview=$jalur_interview&catatan=$catatan&jilbab=$jilbab&nama=$nama&tempat_lahir=$tempat_lahir&tgl_lahir=$tgl_lahir&email=$email&ukuran_baju=$ukuran_baju&ukuran_sepatu=$ukuran_sepatu&asal_sekolah=$asal_sekolah&kota_sekolah=$kota_sekolah&berat_badan=$berat_badan&tinggi_badan=$tinggi_badan";

//ceknomor
$query_interview= mysql_query("select max(id) as nomor from interview");
$arai_inter = mysql_fetch_array($query_interview);
$iki = "$arai_inter[nomor]";
$nomorinter = $iki + 1;

$gigi = "$_POST[gigi]";$mata = "$_POST[mata]";$bahu = "$_POST[bahu]";$tangan = "$_POST[tangan]";$bekas_luka = "$_POST[bekas_luka]";$berenang = "$_POST[berenang]";$bertato = "$_POST[bertato]";$bentuk_kaki = "$_POST[bentuk_kaki]";$ketinggian = "$_POST[ketinggian]";$jenis_kulit = "$_POST[jenis_kulit]";$wajah = "$_POST[wajah]";$penyakit_bawaan = "$_POST[penyakit_bawaan]";$pindah_jurusan = "$_POST[pindah_jurusan]";$catatan_khusus_pramugari = "$_POST[catatan_khusus_pramugari]";
	
	
	



$ini = "&nama_ortu=$nama_ortu&tgl_lahir=$tgl_lahir&biaya_pendidikan=$biaya_pendidikan&kode_pos=$kode_pos&pengetahuan=$pengetahuan&etika=$etika&kemampuan_khusus=$kemampuan_khusus&berbicara=$berbicara&komunikasi=$komunikasi&performance=$performance&dijanjikan=$dijanjikan&status=$status&diterima_jurusan=$diterima_jurusan&diterima_kampus=$diterima_kampus&diterima_angkatan=$diterima_angkatan&jalur_interview=$jalur_interview&catatan=$catatan&jilbab=$jilbab&nama=$nama&tempat_lahir=$tempat_lahir&tgl_lahir=$tgl_lahir&email=$email&ukuran_baju=$ukuran_baju&ukuran_sepatu=$ukuran_sepatu&asal_sekolah=$asal_sekolah&kota_sekolah=$kota_sekolah&berat_badan=$berat_badan&tinggi_badan=$tinggi_badan&gigi=$gigi&mata=$mata&bahu=$bahu&tangan=$tangan&bekas_luka=$bekas_luka&berenang=$berenang&bertato=$bertato&bentuk_kaki=$bentuk_kaki&ketinggian=$ketinggian&jenis_kulit=$jenis_kulit&wajah=$wajah&penyakit_bawaan=$penyakit_bawaan&pindah_jurusan=$pindah_jurusan&catatan_khusus_pramugari=$catatan_khusus_pramugari";

$kueri_interview = mysql_query("insert into interview (
id,interview_by,tgl_interview,kampus,angkatan,id_siswa,nama,tempat_lahir,tgl_lahir,email,ukuran_baju,ukuran_sepatu,asal_sekolah,kota_sekolah,jilbab,dukungan_ortu,biaya_pendidikan,nama_ortu,alamat,kode_pos,pengetahuan,etika,kemampuan_khusus,speaking_ability,communication_skills,performance,berat_badan,tinggi_badan,dijanjikan_kerja,status,diterima_jurusan,marketing,jalur_interview,catatan_interview,tempat_interview

,gigi,mata,bahu,tangan,bekas_luka,berenang,bertato_permanen,bentuk_kaki,takut_ketinggian,jenis_kulit,wajah,penyakit_bawaan,kesanggupan_pindah_jurusan	,catatan_khusus_pramugari	
	
) values (
'$nomorinter','$_SESSION[nama_login]','$tgl_inteview','$diterima_kampus','$diterima_angkatan','$id_siswa','$nama','$tempat_lahir','$tgl_lahir','$email','$ukuran_baju','$ukuran_sepatu','$asal_sekolah','$kota_sekolah','$jilbab','$dukungan_ortu','$biaya_pendidikan','$nama_ortu','$alamat','$kode_pos','$pengetahuan','$etika','$kemampuan_khusus','$berbicara','$komunikasi','$performance','$berat_badan','$tinggi_badan','$dijanjikan','$status','$diterima_jurusan','$marketing','$jalur_interview','$catatan','$_SESSION[unit]'

,'$gigi','$mata','$bahu','$tangan','$bekas_luka','$berenang','$bertato','$bentuk_kaki','$ketinggian','$jenis_kulit','$wajah','$penyakit_bawaan','$pindah_jurusan','$catatan_khusus_pramugari'
	

)") or die("".mysql_error());
	IF($kueri_interview==true)
	{
		mysql_query("insert into tbl_log (ID,datetime,uraian) VALUES ('','$tgls','$_SESSION[nama_login] menginterview siswa atas nama  $nama Asal sekolah $asal_sekolah dengan status interview $status')");
		$jurusan_siswa = "$diterima_jurusan ($diterima_angkatan)";
		$_SESSION['nama_login'];
		mysql_query("update siswa set 
		Nama = '$nama',
		tempat_lahir = '$tempat_lahir',
		tanggal_lahir = '$tempat_lahir',
		email = '$email',
		ukuran_baju = '$ukuran_baju',
		ukuran_sepatu = '$ukuran_sepatu',
		Asal_Sekolah = '$asal_sekolah',
		kota_sekolah = '$kota_sekolah',
		jilbab = '$jilbab',
		nama_ortu = '$nama_ortu',
		Alamat = '$alamat',
		berat_badan = '$berat_badan',
		tinggi_badan = '$tinggi_badan',
		Jurusan = '$jurusan_siswa' ,id_interview = '$nomorinter' , interview_by = '$_SESSION[nama_login]', tgl_interview = '$tgl_inteview', Tempat_Kuliah = '$diterima_kampus' where ID = '$id_siswa'");
		echo "<script>alert('Data Berhasil disimpan');window.location='form_interview_pramugari.php?id=$id&cetak=true&nomor_inter=$nomorinter&dukungan_ortu=$dukungan_ortu$ini';</script>";

	}
	else
	{
		
		echo "<script>alert('Data gagal disimpan');window.location='form_interview_pramugari.php?id=$id&dukungan_ortu=$dukungan_ortu$ini';</script>";

	}
	?>