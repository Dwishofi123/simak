<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? if ($_SESSION[hak_akses_public]=="true"){$hak_akses_publik="";} else {$hak_akses_publik=" and tempat_kuliah='$_SESSION[unit]'"; }  ?>

<? $tanggal=date("d/m/Y");
	$koneksi=open_connection();

	?>
	 
	 <script type=text/javascript src=../js/plugins/jquery/jquery.min.js></script>
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
</script>


	<body>
	
	
		 <form name="form1" id="form1" method="POST" action=""> Tampilkan transaksi dari tanggal  <input type="text" name="filtertanggal1" size="15" value="<?php if(empty($_POST['filtertanggal1'])){ echo $tanggal;}else{ echo $_POST['filtertanggal1']; }?>"/>
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.filtertanggal1);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a> sampai tanggal <input type="text" name="filtertanggal2" size="15" value="<?php if(empty($_POST['filtertanggal2'])){ echo $tanggal;}else{ echo $_POST['filtertanggal2']; }?>"/>
					<a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.form1.filtertanggal2);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a> <input type="submit" value="Tampilkan"></input></form>
	<div class="post">
		<div class="entry">
			
					
		
					
					<?
					
			
			//untuk menampilkan data
			?>
			<!-- TABLE -->  <div id="tab13"> <div id="divToPrint13"><p>
			<h2 align="center"><strong>Laporan Keuangan Mingguan Cabang <? echo $_SESSION[unit];?></strong></h2>
		 <div id="tables" align=left>
		 	<table class="datatable" width="100%">
			<tr>
				<th align="left">No.</th align="left"><th align="left">Tanggal</th><th align="left">Keterangan</th><th align="left">Debet</th><th align="left">Kredit</th><th align="left">Saldo</th>
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
					<td align="left"><strong><?php if($saldo_akhir!=="0"){echo  number_format($saldo_akhir,0,'.','.');}; ?></strong></td>
					<td align="left"></td>
				</tr>
				
			</table>
			
			</div>
		<!-- TABLE --> </div>
		

			

			</p>
		</div>
		
		<button id="export_13">Export ke Excel</button>
	<a onclick="PrintDiv13();" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Print"> Cetak </button></a>
	</div>
	</body>
	
	<iframe width=174 height=189 name="gToday:normal:calender/agenda.js" id="gToday:normal:calender/agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>

