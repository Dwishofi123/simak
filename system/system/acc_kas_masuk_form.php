<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? if ($_SESSION[hak_akses_public]=="true"){$hak_akses_publik="";} else {$hak_akses_publik=" and tempat_kuliah='$_SESSION[unit]'"; }  ?>

<? if ($_POST[tanggal_transaksi]==""){ $_SESSION[tanggal_transaksi]=date("d/m/Y");} else{$_SESSION[tanggal_transaksi]=$_POST[tanggal_transaksi];}
$tanggal=$_SESSION[tanggal_transaksi];
	
	
	
	$koneksi=open_connection();

	?>

<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript" src="jquery.js"></script>
	<script>
	function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggestdebet.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}
	
	function fill(thisValue) {
		$('#country').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 100);
	}
	
	function fill2(thisValue) {
		$('#kode').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 100);
	}
	</script>
	
	
	
	<script>
	function suggestkredit(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggestkredit.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}
	
	function fillkredit(thisValue) {
		$('#countrykredit').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 100);
	}
	
	function fill2kredit(thisValue) {
		$('#kodekredit').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 100);
	}
	</script>
	
	
	<style>
	#result {
		height:20px;
		font-size:12px;
		font-family:Arial, Helvetica, sans-serif;
		color:#333;
		padding:5px;
		margin-bottom:10px;
		background-color:#FFFF99;
	}
	#country{
		padding:3px;
		border:1px #CCC solid;
		font-size:12px;
	}
	.suggestionsBox {
		position: absolute;
		left: 0px;
		top:40px;
		margin: 26px 0px 0px 0px;
		width: 200px;
		padding:0px;
		background-color:#999999;
		border-top: 3px solid #999999;
		color: #fff;
	}
	.suggestionList {
		margin: 0px;
		padding: 0px;
	}
	.suggestionList ul li {
		list-style:none;
		margin: 0px;
		padding: 6px;
		border-bottom:1px dotted #666;
		cursor: pointer;
	}
	.suggestionList ul li:hover {
		background-color: #FC3;
		color:#000;
	}
	ul {
		font-family:Arial, Helvetica, sans-serif;
		font-size:11px;
		color:#FFF;
		padding:0;
		margin:0;
	}
	
	.load{
	background-image:url(loader.gif);
	background-position:right;
	background-repeat:no-repeat;
	}
	
	#suggest {
		position:relative;
	}
	</style>




	<body onLoad="document.postform.elements['keterangan_transaksi'].focus();">
	<div class="post">
		<div class="entry">
			<h2 align="center"><strong>Jurnal Kas Masuk <? echo $_SESSION[unit];?></strong></h2>
						Form ini digunakan oleh cabang untuk menginput kas masuk di keuangan cabang. <br>Perkiraan sisi debet dan kredit sudah disetting oleh sistem dan tidak bisa diganti <br> Masukkan laporan kas masuk setiap hari karna setelah anda menekan tombol simpan pada form ini, <br>aplikasi akan mengirimkan sms informasi pengeluaran keuangan cabang ke accounting pusat.
			<p>
			<?php 
			//jurnal baru. cari nomor paling besar yaitu nomor jurnal terakhir 
			$jurnal_umum=mysql_fetch_array(mysql_query("SELECT max(nomor_jurnal) FROM jurnal_umum ORDER BY tanggal_selesai DESC"));
			$nomor_jurnal=$jurnal_umum[0]+1;
			$kode_transaksi="BU/".$nomor_jurnal;
			?>

			
			<form action="?page=./transaksi/umum" method="post" name="postform">
			  <table width="80%" border="0">
                <tr>
                  <td width="211">Nomor Bukti</td>
                  <td colspan="2">
				  <input type="hidden" name="kode_bukti" value="<?php echo $kode_transaksi;?>">
				  <input type="text" disabled="disabled" value="<?php echo $kode_transaksi;?>" size="15"/>
				  </td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td colspan="2"><input type="text" name="tanggal_transaksi" size="15" value="<?php echo $tanggal;?>"/>
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_transaksi);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
				</td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td colspan="2"><input type="text" value="<?php if(isset($_POST['keterangan_transaksi'])){ echo $_POST['keterangan_transaksi']; }?>" name="keterangan_transaksi" size="45"/></td>
                </tr>
                <tr>
                  <td>Jumlah (Rp)</td>
                  <td colspan="2"><input type="text" name="jumlah_dk" size="15"/></td>
                </tr>
                <tr style="visibility:hidden;">
                  <td>Kode Rekening Perkiraan Sisi Debet</td>
                  <td width="107">
				  <div id="suggest">
					   <input type="text" onKeyUp="suggest(this.value);" name="kode_rekening" readonly=readonly  onBlur="fill2();" id="kode" size="15" value=<? $querya=mysql_query("select kode_rekening,nama_rekening from tabel_master where nama_rekening like 'Kas Cabang $_SESSION[unit]'");
			while($rowa=mysql_fetch_array($querya)){ $koderekeningx=$rowa[0]; $namarekeningx=$rowa[1];} echo $koderekeningx; ?>> 
					   <div class="suggestionsBox" id="suggestions" style="display: none;"> <img src="arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
					   <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
					   </div>
				  </div>
				  </td>
                  <td width="203" align="left"><input type="text" disabled="disabled" name="nama_rekening" onBlur="fill();" id="country"   value=<? echo $namarekeningx;?> size="30"/></td>
                </tr>
				
				<tr style="visibility:hidden;" >
                  <td>Kode Rekening Perkiraan Sisi Kredit</td>
                  <td width="107">
				  <div id="suggest">
					   <input type="text" onKeyUp="suggestkredit(this.value);" name="kode_rekeningkredit" readonly=readonly onBlur="fill2kredit();" id="kodekredit"  
					   value="112.01"/> 
					   <div class="suggestionsBox2" id="suggestions2" style="display: none;"> <img src="arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
					   <div class="suggestionList2" id="suggestionsList2"> &nbsp; </div>
					   </div>
				  </div>
				  </td>
                  <td width="203" align="left"><input type="text" disabled="disabled" name="nama_rekeningkredit" onBlur="fillkredit();" id="countrykredit" value="Kas Di Bank (Kas Besar)"/></td>
                </tr>

                <tr>
                  <td><input type="submit" value="Simpan" name="simpan"></td>
                  <td colspan="2">&nbsp;</td>
                </tr>
              </table>
			</form>
			<br />
			
			
			<?php
			//untuk menyimpan transaksi
			if(isset($_POST['simpan'])){
		
				$kode_transaksi=$_POST['kode_bukti'];
				$tanggal_transaksi=$_POST['tanggal_transaksi'];
				$keterangan_transaksi=ucwords($_POST['keterangan_transaksi']);
				$koderekeningkredit=$_POST['kode_rekeningkredit'];
				$kode_rekeningdebet=$_POST['kode_rekening'];
				

				$jumlah_dk=ucwords($_POST['jumlah_dk']);
				

				//insert debet
				$query=mysql_query("insert into tabel_transaksi(kode_transaksi,kode_rekening,tanggal_transaksi, jenis_transaksi, keterangan_transaksi,debet,id_admin,unit)
									values('$kode_transaksi','$kode_rekeningdebet','$tanggal_transaksi','Bukti Umum','$keterangan_transaksi','$jumlah_dk','$_SESSION[id_login]','$_SESSION[unit]')");
				//insert kredit		
				$query=mysql_query("insert into tabel_transaksi(kode_transaksi,kode_rekening,tanggal_transaksi, jenis_transaksi, keterangan_transaksi,kredit,id_admin,unit)
									values('$kode_transaksi','$koderekeningkredit','$tanggal_transaksi','Bukti Umum','$keterangan_transaksi','$jumlah_dk','$_SESSION[id_login]','$_SESSION[unit]')");
									
									
				//insert ke jurnal kas kecil
				mysql_query("insert into jurnal_kas_kecil(kode_transaksi,tanggal_transaksi,uraian,debet,kredit,id_admin,unit,laporan_by_email)values('$kode_transaksi','$tanggal_transaksi','$keterangan_transaksi','$jumlah_dk','','$_SESSION[id_login]','$_SESSION[unit]','')");
				
				
				//insert ke jurnal umum
				$kode_transaksi=$_POST['kode_bukti'];
				$tanggal_selesai=$_POST['tanggal_transaksi'];
				
				
				$query=mysql_query("insert into jurnal_umum(nomor_jurnal,kode_transaksi,tanggal_selesai,unit,id_admin) values('$nomor_jurnal','$kode_transaksi','$tanggal_selesai','$_SESSION[unit]','$_SESSION[id_login]')");
				
				
				//kirim sms ke pak iwan & pak paulus 087809885054
				
				 $nominaltransaksi="Rp.".number_format($jumlah_dk,0,'.','.').",-";
				 //mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)values('087899371972','$tanggal_transaksi Transaksi Keuangan ($_SESSION[nama_login]/$_SESSION[unit]) $keterangan_transaksi $nominaltransaksi','SMS Transaksi Jurnal Harian','Online')"); 
				 
				
				 
				 $tanggal=date("Y-m-d H:i:s");
				 mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] menambah transaksi keuangan : $kode_transaksi, $keterangan_transaksi, $nominaltransaksi')");
				
											
				if($query){
					//echo "berhasil";
					?><script language="javascript">document.location.href="?page=./transaksi/umum&tanggal_transaksi=<? echo $tanggal_transaksi;?>"</script><?php
				
				}else{
					echo mysql_error();
				}
				
			
			}else{
				unset($_POST['simpan']);
			}
			
			//untuk menyelesaikan transaksi
			if(isset($_POST['selesai'])){

									
				if($query){
					?><script language="javascript">document.location.href="?page=./transaksi/umum&tanggal_transaksi=<? echo $tanggal_transaksi;?>"</script><?php
				}else{
					echo mysql_error();
				}
				
			
			}else{
				unset($_POST['selesai']);
			}
			
			
			//untuk mendecode url yang di enrypsi
			//$var=decode($_SERVER['REQUEST_URI']);
	
			if(isset($_GET['mode']) && isset($_GET['kode_transaksi'])){
			
				//pecahkan nilai array
				$mode=$_GET['mode'];
				$kode_transaksi=$_GET['kode_transaksi'];
				
				if($mode=='delete'){
					$query=mysql_query("delete from tabel_transaksi where kode_transaksi='$kode_transaksi'");
					$query=mysql_query("delete from jurnal_kas_kecil where kode_transaksi='$kode_transaksi'");
					$tanggal=date("Y-m-d H:i:s");
					mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] menghapus transaksi keuangan dengan kode transaksi $kode_transaksi')");
					
				}
				
			}
						?> <form name="form1" id="form1" method="POST" action=""> Tampilkan transaksi dari tanggal  <input type="text" name="filtertanggal1" size="15" value="<?php if(empty($_POST['filtertanggal1'])){ echo $tanggal;}else{ echo $_POST['filtertanggal1']; }?>"/>
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.filtertanggal1);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a> sampai tanggal <input type="text" name="filtertanggal2" size="15" value="<?php if(empty($_POST['filtertanggal2'])){ echo $tanggal;}else{ echo $_POST['filtertanggal2']; }?>"/>
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.filtertanggal2);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a> <input type="submit" value="Tampilkan"></input></form>
					
					<?
					
			
			//untuk menampilkan data
			?>
			<!-- TABLE -->  <div id="tab13"> <div id="divToPrint13"><p>
		 <div id="tables" align=left>
		 	<table class="datatable" width="100%">
			<tr>
				<th align="left">No.</th align="left"><th align="left">Tanggal</th><th align="left">Keterangan</th><th align="left">Debet</th><th align="left">Kredit</th><th align="left">Saldo</th><th align="left">Action</th>
			</tr>
			
			
			<?php
			$koneksi=open_connection();
			$a=0;
			$saldo=0;
			$saldo_akhir=0;
			
			if(isset($_POST['filtertanggal1'])){
			$query=mysql_query("select * from jurnal_kas_kecil where id_admin='$_SESSION[id_login]' and tanggal_transaksi between '$_POST[filtertanggal1]' and '$_POST[filtertanggal2]'");
			}else{
			$query=mysql_query("select * from jurnal_kas_kecil where id_admin='$_SESSION[id_login]' and tanggal_transaksi='$tanggal'");}
			
			
			while($row=mysql_fetch_array($query)){ $a=$a+1; $debet=$row['debet']; $kredit=$row['kredit']; $saldo=$debet-$kredit; $saldo_akhir=$saldo_akhir+$saldo; $kode_transaksi=$row['kode_transaksi'];
							
				
				?>
				<tr>
					<td align="left"><?php echo $a;?></td>
					<td align="left"><?php echo $row['tanggal_transaksi'];?></td>
					<td align="left"><?php echo $row['uraian'];?></td>
					<td align="left"><?php if($debet!=="0"){echo number_format($debet,0,'.','.');}; ?></td>
					<td align="left"><?php if($kredit!=="0"){echo number_format($kredit,0,'.','.');}; ?></td>
					<td align="left"><?php if($saldo_akhir!=="0"){echo number_format($saldo_akhir,0,'.','.');}; ?></td>
					<td align="left"><a href="?page=transaksiumum&mode=delete&kode_transaksi=<?php echo $kode_transaksi; ?>" onClick="return confirm('Apakah Anda yakin?')">hapus</a></td>
				</tr>
				<?php
			}
			?>
			<tr>
					<td align="left"></td>
					<td align="left"></td>
					<td align="left"><strong>SALDO KAS</strong></td>
					<td align="left"></td>
					<td align="left"></td>
					<td align="left"><strong><?php if($saldo_akhir!=="0"){echo number_format($saldo_akhir,0,'.','.');}; ?></strong></td>
					<td align="left"></td>
				</tr>
				
			</table>
			
			</div>
		<!-- TABLE --> </div>

			

			</p>
		</div>
	</div>
	</body>
	
	<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>

