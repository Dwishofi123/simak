<?php
session_start();
if(empty($_POST['soal']))
	{
		echo "<script>window.location='index.php';</script>";
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
				$cek = mysql_query("SELECT * FROM banksoal_akademik WHERE soalid=$key");
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
			$angkatan=mysql_real_escape_string($_GET[angkatan]);
			$materiujian=$_GET[materiujian];
			$tanggal= date("Y-m-d");
			//AWAL SCRIPT UNTUK MENAMPILKAN BIODATA SISWA PENDAFTAR
			$kueridatasiswa = mysql_query("select * from profil_siswa where ps_nodaf = '$_GET[nodaf]'");
			$cetakdatasiswa = mysql_fetch_array($kueridatasiswa);
			//AKHIR SCRIPT UNTUK MENAMPILKAN BIODATA SISWA PENDAFTAR
			$_SESSION['hasil_ujian'] = " Benar = $benar <br> Salah = $salah <br> Tidak Jawab = $tidakjawab <br> Jumlah Soal = $jumlah <br> <strong> Nilai Anda : $nilai dari total nilai 100 yg seharusnya dapat anda peroleh.</strong>";
			$ceknilai = mysql_query("insert into nilai_akademik(nama,materi,nilai,ket_nilai,jurusan,kampus,tanggal_ujian,nodaf,angkatan)values('$cetakdatasiswa[ps_nama]','$materiujian',$nilai,'$_SESSION[hasil_ujian]','$cetakdatasiswa[ps_prodi]','$cetakdatasiswa[ps_kampus]','$tanggal','$_GET[nodaf]','$angkatan')");	
			$periodeuji="ps_uji".$_GET[periode];
			$tguji="ps_tguji".$_GET[periode];
			mysql_query("update profil_siswa set $periodeuji='$nilai', $tguji='$tanggal' where ps_nodaf='$_SESSION[ps_nodaf]'");
			
				echo "<script>window.location='index.php?page=nilaiujianonline&periode=$_GET[periode]';</script>";
			
		}
	}
	?>