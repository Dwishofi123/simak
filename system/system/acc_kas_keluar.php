<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php"; $tanggal=date("d/m/Y");?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? if ($_SESSION[hak_akses_public]=="true"){$hak_akses_publik="";} else {$hak_akses_publik=" and tempat_kuliah='$_SESSION[unit]'"; }  ?>
<? 
$query = mysql_query("SELECT * from config"); while($b=mysql_fetch_row($query)) {$psb_aktif="and jurusan like '%$b[1]%' "; $text_psb_aktif=$b[1];}?>

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


	function BoxTambah(){
        $.colorbox({iframe:true, width:"89%", height:"90%", href: "system/acc_kas_keluar_form.php"});
      }
	
    </script>
	
	
	
 <div class="col-md-10"> <div class="head bg-default bg-light-ltr np"> 
	 <div class="head bg-default bg-light"> <h2>Jurnal Kas Keluar <? echo $_SESSION[unit];?></h2> </div> 			 
 <div class="block"> <div class="head bg-default bg-light-ltr np"> <ul class="nav nav-tabs pull-left"> 
 <li class="active"><a href="#tab13" onClick='getPage(34)' data-toggle="tab"><i class="icon-css3"></i> Kas Keluar</a></li> 
 <li><a href="#tab13" onClick='getPage(35)' data-toggle="tab"><i class="icon-css3"></i> Kas Masuk</a></li> 
 <li><a href="#tab13" onClick='AccLaporanMingguan(1)' data-toggle="tab"><i class="icon-css3"></i> Export Laporan Mingguan</a></li> 
 </ul> </div> <div class="content tab-content bg-dot50">

 <div class="tab-pane active">

	   <div class=btn-group>
   <a href=#tambah_jurnal onClick='BoxTambah()' data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Tambah data baru"> Tambah Transaksi Kas Keluar</button></a>
   <a href="#" onClick='getPage(34)' ><button data-loading-text="Loading..."  id="fat-btn" class="btn btn-default btn-clean tip"  data-original-title="Refresh">Refresh</button> </a> 
	<a onclick="PrintDiv13();" data-toggle=modal ><button class="btn btn-default btn-clean tip"  data-original-title="Print"> Cetak </button></a>	
	<br><br>

	
   </div>
 
		<!-- TABLE -->  <div id="tab13"> <div id="divToPrint13"><p>
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
			
			$query=mysql_query("select * from jurnal_kas_kecil where id_admin='$_SESSION[id_login]' and tanggal_transaksi='$tanggal'");
			while($row=mysql_fetch_array($query)){ $a=$a+1; $debet=$row['debet']; $kredit=$row['kredit']; $saldo=$debet-$kredit; $saldo_akhir=$saldo_akhir+$saldo;
							
				
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
					<td align="left"><strong><?php if($saldo_akhir!=="0"){echo number_format($saldo_akhir,0,'.','.');}; ?></strong></td>
					
				</tr>

			</table>
			
			</div>
		<!-- TABLE --> </div>
		
		
 
 </p> </div></div>
 </div> </div>
  </div> 
 </div> 

