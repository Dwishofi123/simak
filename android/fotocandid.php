<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
<?PHP session_start();
include "koneksi.php";
$pathfoto = "img/candid/";  //DIREKTORI FOLDER FOTO CANDID
if (empty($_SESSION[ps_nodaf])){echo "<script>window.location='login.php'; </script>";} 
?>

<?php include "koneksi.php"; ?>

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<div class="portlet-grid panel-primary" > 
    		 <div class="panel-heading" >
			 
 <script>
 	function val() {
			
		var nama = document.forms["fotpcandid"]["nama"].value;
		if (nama == null || nama == "") {
			alert("Nama Objek tidak boleh kosong");
			return false;
		}
		var foto = document.forms["fotpcandid"]["foto"].value;
		if (foto == null || foto == "") {
			alert("Foto Candid tidak boleh kosong");
			return false;
		}
		var penjelasan = document.forms["fotpcandid"]["penjelasan"].value;
		if (penjelasan == null || penjelasan == "") {
			alert("Penjelasan  tidak boleh kosong");
			return false;
		}
		
		return (true);
	}
</script>
    		      <h3 class="panel-title mdl-shadow--2dp" >Berburu Foto Candid</h3>
    		  </div> 
			  
			 
			  
    		  <div class="panel-body" ><center>
    		  	Hay... Salam HANGAT dari Kantor Pusat PSPP Penerbangan. <br>
				Untuk meningkatkan kualitas pelayanan Kampus PSPP Penerbangan, jadilah MATA-MATA kami!
				<br><br>
				<strong>~~ Foto Candid ~~</strong><br>
				Foto candid adalah suatu tekhnik pengambilan gambar yang menggunakan kamera pada objek hidup tanpa diketahui oleh objek tersebut. Objek tidak menyadari bahwa dia sedang diambil gambarnya. Dalam hal ini anda dapat membantu meningkatkan kualitas pelayanan Kampus PSPP dengan memberitahukan kepada kami (Kantor Pusat) apabila ada salah satu crew kami yang kurang baik dalam pelayanan baik dalam berpenampilan maupun bersikap. <br>Kirimkan hasil perburuan foto candid anda kepada kami melalui fasilitas dibawah ini :<br><br>
				
				
				<form action="processuploadfotocandid.php" name='fotpcandid' onsubmit="return val()" enctype="multipart/form-data" method="post" >
				Nama pengirim :  <br><input type=text name="pengirim"  value="Disembunyikan" disabled style="text-align:center;"/> <br>
				Nama Objek/Target : <br><input type=text name="nama" style="text-align:center;"/> <br>
				Penjelasan singkat kenapa anda mengirimkan foto ini :<br><textarea name="penjelasan"></textarea><br>
				
				Foto Candid :<br><input type="file" name="foto"><br>
				
				<br><br>
				<input type="submit" value="Kirimkan!" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary center">
				</form>
				<?php 
				$kuericandid= mysql_query("select * from candid where nodaf = '$_SESSION[ps_nodaf]' order by id desc");
				$cek = mysql_num_rows($kuericandid);
				if($cek > 0)
				{
					?>
			
				<table class="altrowstable">
				<tr><td>No</td><td>Nama Foto</td><td>Foto Candid</td><td>Tanggal Kirim</td></tr>
				<?php
				echo "Anda sudah melakukan $cek pengiriman foto candid <br>Dibawah ini history kiriman foto candid anda :<br><br>";
				$no = 1;
				while($cetak = mysql_fetch_array($kuericandid))
				{
					echo "<tr><td>$no</td><td>$cetak[objek]</td><td><img id='myImg' src='$pathfoto$cetak[file]' height='30px' width='30px'></td><td>$cetak[tanggal_kirim]</td></tr>";
					$no++;
					?>
				

					<?php
				}
				;?>
				
				</table>
				
				<?php } ?>
				
			</center>
			 </div> 
			
			  
			
			  
    	</div>