<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? if ($_SESSION[hak_akses_public]=="true"){$hak_akses_publik="";} else {$hak_akses_publik=" and tempat_kuliah='$_SESSION[unit]'"; }  ?>


<script type="text/javascript">
$(document).ready(function() {
 $("#export_13").click(function() {
     window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#divToPrint13').html()));     
 });
}); 

function PrintDiv13() {    
           var divToPrint = document.getElementById('divToPrint13');
           var popupWin = window.open('', '_blank', 'width=842,height=595');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }

	function filterExport(id) {
		var kampus = document.getElementById('combo_kampus').value;
		var jurusan = document.getElementById('combo_jurusan').value;
		var bayar = document.getElementById('combo_siswa_bayar').value;
		var diterima = document.getElementById('combo_siswa_diterima').value;
		var interview = document.getElementById('combo_interview').value;
		var daftar_ulang = document.getElementById('combo_daftar_ulang').value;
		var marketing = document.getElementById('combo_marketing').value;
		var diseleksi = document.getElementById('combo_siswa_diseleksi').value;
		var ck_jurusan = document.getElementById("check_jurusan").value;
		$('#tables').html("<img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font>");
		jQuery.ajax({
			url: "system/export_custom_table.php?kampus="+kampus+"&jurusan="+jurusan+"&bayar="+bayar+"&diterima="+diterima+"&interview="+interview+"&daftar_ulang="+daftar_ulang+"&marketing="+marketing+"&diseleksi="+diseleksi+"&ck_jurusan="+ck_jurusan,
			data:'id='+id,
			type: "POST",
			success:function(data){$('#tables').html(data);}
		});
	}
	filterExport(1);
	

	
	
	


    </script>
	
	
	
 <div class="col-md-10"> <div class="head bg-default bg-light-ltr np"> 
 <div class="head bg-default bg-light"> <h2>Export Excel Custom </h2> </div> 				 
 <div class="block"> <div class="head bg-default bg-light-ltr np"> <ul class="nav nav-tabs pull-left"> <li class="active"> &nbsp; Berikan tanda checklist pada fields yang akan di-export</li> </ul> </div> <div class="content tab-content bg-dot50">

 <div class="tab-pane active">
 <div class="col-md-5"><select  name="combo_kampus" id="combo_kampus" ><option onClick="filterExport(1)">Semua Kampus</option><option onClick="filterExport(1)" >PSPP Lampung</option><option onClick="filterExport(1)" >PSPP Jakarta</option><option onClick="filterExport(1)" >PSPP Yogyakarta</option></select></div>
  <div class="col-md-5"><select  name="combo_jurusan" id="combo_jurusan" ><? $query = mysql_query("select distinct(jurusan) from siswa"); while($b=mysql_fetch_row($query)) {?><option onClick="filterExport(1)"><? echo $b[0];?></option><?}?></select></div>
  <div class="col-md-5"><select  name="combo_siswa_bayar" id="combo_siswa_bayar" ><option onClick="filterExport(1)">Siswa Sudah Membayar Biaya Pendaftaran</option><option onClick="filterExport(1)" >Siswa Belum Membayar Biaya Pendaftaran</option><option onClick="filterExport(1)" >Semua Siswa Sudah Mendaftar</option></select></div>
  <div class="col-md-5"><select  name="combo_siswa_diseleksi" id="combo_siswa_diseleksi" ><option onClick="filterExport(1)" >Siswa Sudah & Belum Diseleksi</option><option onClick="filterExport(1)">Siswa Sudah Diseleksi</option><option onClick="filterExport(1)" >Siswa Belum Diseleksi</option></select></div>
 <div class="col-md-5"><select  name="combo_siswa_diterima" id="combo_siswa_diterima" ><option onClick="filterExport(1)">Siswa Diterima</option><option onClick="filterExport(1)" >Siswa Tidak Diterima</option><option onClick="filterExport(1)" >Semua Siswa Belum & Sudah Diterima</option></select></div>
   <div class="col-md-5"><select  name="combo_interview" id="combo_interview" ><option onClick="filterExport(1)">Siswa Sudah Interview</option><option onClick="filterExport(1)" >Siswa Belum Interview</option><option onClick="filterExport(1)" >Semua Siswa Belum & Sudah Interview</option></select></div>
<div class="col-md-5"><select  name="combo_daftar_ulang" id="combo_daftar_ulang" onClick="filterExport(1)"><option >Siswa Sudah Daftar Ulang</option><option onClick="filterExport(1)" >Siswa Belum Daftar Ulang</option><option onClick="filterExport(1)" >Siswa Mengundurkan Diri</option><option onClick="filterExport(1)" >Semua Siswa Belum & Sudah Daftar Ulang</option></select></div>
<div class="col-md-5"><select  name="combo_marketing" id="combo_marketing" ><option onClick="filterExport(1)">Semua Marketing | All</option><? $query = mysql_query("SELECT pegawai.ID, pegawai.nama FROM pegawai where pegawai.status_pegawai='Aktif' order by nama asc"); while($b=mysql_fetch_row($query)) {?><option onClick="filterExport(1)"><? echo $b[1]." | ".$b[0];?></option> <?}?></select><br></div>
 
	  <div class=btn-group>
<br>
   </div>
   
 
 <div class="block"> <div class="header"> <h2>Pilih data siswa yang akan ditampilkan </h2> </div> 
 <div class="content controls"> 
 <div class="form-row">
 <div class="col-md-12"> 
 
 <div class="checkbox-inline"> <label><div class="checkers"><span><input id="check_jurusan" type="checkbox" checked="checked"></span></div> Jurusan</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="kampus" type="checkbox" checked="checked"></span></div> Pilihan Kampus</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="nama" type="checkbox" checked="checked"></span></div> Nama Lengkap</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="nama_panggilan" type="checkbox"></span></div> Nama Panggilan</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="agama" type="checkbox"></span></div> Agama</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="suku" type="checkbox"></span></div> Suku</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="jenis_kelamin" type="checkbox"></span></div> Jenis Kelamin</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="ttl" type="checkbox"></span></div> TTL</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="usia" type="checkbox"></span></div> Usia</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="tinggi_badan" type="checkbox"></span></div> Tinggi Badan</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="berat_badan" type="checkbox"></span></div> Berat Badan</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="hobi" type="checkbox"></span></div> Hobi</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="golongan_darah" type="checkbox"></span></div> Golongan Darah</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="ukuran_sepatu" type="checkbox"></span></div> Ukuran Sepatu</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="ukuran_baju" type="checkbox"></span></div> Ukuran Baju</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="sumber_informasi" type="checkbox"></span></div> Sumber Informasi</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="motivasi_masuk" type="checkbox"></span></div> Motivasi Masuk </label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="alamat" type="checkbox"></span></div> Alamat</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="hp" type="checkbox"></span></div> No. HP</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="hp_ortu" type="checkbox"></span></div> No. HP Ortu</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="pendidikan_terakhir" type="checkbox"></span></div> Pendidikan Terakhir</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="nama_sma" type="checkbox"></span></div> Nama SMA/Universitas</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="alamat_sekolah" type="checkbox"></span></div> Alamat Sekolah</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="pendidikan_formal" type="checkbox"></span></div> Pendidikan Formal Lainnya</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="kursus" type="checkbox"></span></div> Kursus</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="email" type="checkbox"></span></div> Email</label> </div>
 <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> BBM</label> </div>

 
 </div>  
 </div> 
 </div> </div> 
 
 
 
  <div class="block"> <div class="header"> <h2>Data Pembayaran </h2> </div> 
 <div class="content controls"> 
 <div class="form-row">
 <div class="col-md-12"> 
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Pendaftaran</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Interview</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Daftar Ulang</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Nominal Daftar Ulang</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Angsuran 2</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Angsuran 2</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Angsuran 3</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Angsuran 3</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Angsuran 4</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Angsuran 4</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Angsuran 5</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Angsuran 5</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Angsuran 6</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Angsuran 6</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Angsuran 7</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Angsuran 7</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Angsuran 8</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Angsuran 8</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Angsuran 9</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Angsuran 9</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Angsuran 10</label> </div>
  <div class="checkbox-inline"> <label><div class="checkers"><span><input name="bbm" type="checkbox"></span></div> Tanggal Angsuran 10</label> </div>
 
  </div>  
 </div> 
 </div> </div> 

 
 	   <div class=btn-group>
   <!--<a href=#tambah_data onClick='BoxTambah()' data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Tambah data baru"> Tambah</button></a>-->
   <a href="#filter_export" onClick="filterExport(1)" ><button data-loading-text="Loading..."  id="fat-btn" class="btn btn-default btn-default tip"  data-original-title="Refresh">Tampilkan / Refresh</button> </a> 
	<a  href="javascript:void(0);" id="export_13" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Export to Excel"> Export ke Excel</button></a>
	<a onclick="PrintDiv13();" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Print"> Cetak </button></a>
	
   </div>
  
   <br><br>
		<!-- TABLE -->  <div id="tab13"> <div id="divToPrint13"><p>
		 <div id="tables" align=center><img src='img/big_loading.gif'/><font color=white> <br>Loading... Mohon tunggu..</font></div>
		<!-- TABLE --> </div>
 
 </p> </div></div>
 </div> </div>
  </div> 
 </div> 

