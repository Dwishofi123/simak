<?php 

include "konek.php";
?>		
  <?php 

if(empty ($_GET['kampus'])){

}
else{
	 $kampus = $_GET['kampus'];
	 $nama = $_GET['siswa'];
	 $prodi = $_GET['prodi'];
	 $sqle = "select distinct(mata_kuliah) as makul from akademik_absensi_siswa WHERE ps_nama = '$nama' and kampus = '$kampus' and prodi = '$prodi'";
 $jm = "select count(mata_kuliah) as jumlah from akademik_absensi_siswa WHERE ps_nama = '$nama' and kampus = '$kampus' and prodi = '$prodi' ";
?>

  <?PHP $matakul = mysql_query("$sqle");
$hit = mysql_num_rows($matakul);
  if($hit == "0"){
	  echo "Tidak ada data";
  }
  else{
	  ?>
	  <table><tr><th>Matakuliah</th><th>Keidak Hadiran</th></tr>
	  <?php
	 while($tamp = mysql_fetch_array($matakul)){ $ketidak = mysql_query("select count(mata_kuliah) as jumlah from akademik_absensi_siswa WHERE ps_nama = '$nama' and kampus = '$kampus' and prodi = '$prodi' and mata_kuliah = '$tamp[makul]'");
  while($cetak = mysql_fetch_array($ketidak)){ echo "<tr><td>".$tamp['makul']."</td><td>".$cetak['jumlah']."</td></tr>"; } } ?></table>

  <?php
	 }

 
  }
 ?>

