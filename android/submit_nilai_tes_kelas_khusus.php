<?php
session_start();
if(empty($_POST['soal']))
	{
		echo "<script>window.location='index.php?page=seleksi-kelas-khusus-soal';</script>";
	}
	else
	{
		include "koneksi.php";
		$benar = 0;
		$salah = 0;
		$jumlahsoal=$_POST['jumlahsoal'];
		if($_POST['soal'])
		{
			foreach($_POST['soal'] as $key => $value)
			{
				$cek = mysql_query("SELECT * FROM banksoal_tes_seleksi_kelas_khusus WHERE soalid=$key");
				while($c = mysql_fetch_array($cek))
				{
					$jawaban = $c['jawaban'];
				}
				if($value==$jawaban)
				{
					$benar++;
				}
				else
				{
					$salah++;
				}
			}
			$jumlah = $_POST['jumlahsoal'];
			$tidakjawab = $jumlah - $benar - $salah;
			$nilai=round(($benar/$jumlahsoal)*100,2); 
			$angkatan=mysql_real_escape_string($_POST[angkatan]);
			$tanggal= date("Y-m-d");


			$_SESSION['hasil_ujian'] = " Benar = $benar <br> Salah = $salah <br> Tidak Jawab = $tidakjawab <br> Jumlah Soal = $jumlah <br> ";
			$ceknilai = mysql_query("insert into nilai_tes_seleksi_kelas_khusus(nama,materi,nilai,ket_nilai,kampus,tanggal_tes,nodaf,hp,angkatan,jurusan)values('$_POST[nama]','TES SELEKSI KELAS KHUSUS',$nilai,'$_SESSION[hasil_ujian]','$_POST[kampus]','$tanggal','$_POST[nodaf]','$_POST[hp]','$angkatan','$_POST[jurusan]')");	
			
			
			echo "Processing... <meta http-equiv='refresh' content='1;url=index.php?page=nilai-seleksi-kelas-khusus'/>";


			
			
		}
	}
	?>