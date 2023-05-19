<? session_start();


if (!empty($_POST[tanggapan])){
include "koneksi.php";
$tanggal=date("Y-m-d H:i:s"); 
mysql_query("insert into kritik_dan_saran(tanggal,user,uraian,unit)values('$tanggal','$_SESSION[ps_nama] - $_SESSION[ps_prodi] - PSPP $_SESSION[ps_kampus]','$_POST[tanggapan]','PSPP MOBILE SPECIAL POPUP')"); ?>
<script>
alert("Terima kasih atas kepedulian anda dengan memberikan kritik dan saran kepada kami. Kritik dan saran yang membangun adalah harapan kami. Kritik dan saran telah kami terima dan akan segera kami tindaklanjuti.");
window.location = "index.php";
</script>
<?}?>	
	

	
	<style>
.black_overlay {
  display: none;
  position: absolute;
  top: 0%;
  left: 0%;
  width: 100%;
  height: 100%;
  background-color: black;
  z-index: 1001;
  -moz-opacity: 0.8;
  opacity: .30;
  filter: alpha(opacity=80);
}
.white_content {
  display: none;
  position: absolute;
  color:black;
  top: 10%;
  left: 8%;
  width: 75%;
  height: 75%;
  padding: 10px;
  border: 5px solid grey;
  background-color: white;
  z-index: 1002;
  overflow: auto;
}
</style>
	
	
<script>
function validateForm() {

	var tanggapane = document.forms["myForm"]["tanggapan"].value;
    if (tanggapane == null || tanggapane == "" || tanggapane == "Masukkan tanggapan anda disini!") {
        alert("Mohon Tulis Tanggapan Terlebih Dahulu!");
        return false;
    }
}
	
</script>

					  
					   <p STYLE="COLOR:WHITE;">Mohon masukkan kritik dan saran anda <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'" id="pop" name="pop">disini</a>
  </p>
  
  
    <div id="light" class="white_content">Hallo, bagaimana kabarnya? Semoga selalu semangat dalam menggapai cita-cita ya.. <br><br>Perkenankan kami dari <strong>KANTOR PUSAT</strong> ingin mendengarkan aspirasi dari seluruh siswa-i PSPP penerbangan.. <br>Mohon berikan kami kritik dan saran maupun tanggapan anda terhadap Fasilitas Pendidikan di PSPP, Pelayanan Manajemen maupun hal-hal lainnya yang ingin anda sampaikan kepada kami. <br><br>Kritik dan saran yang membangun adalah harapan kami.<Br><br><i> Untuk menjaga kerahasiaan, nama anda kami sembunyikan..</i>
	
	<br><br>
	<form action="popup.php" method="POST" name="myForm" id="myForm" onsubmit="return validateForm()">
	Nama : {disembunyikan - tidak ada yang tau}<br>
	Jurusan : {disembunyikan - tidak ada yang tau}<br>
	Kampus : {disembunyikan - tidak ada yang tau}<br>
	Tanggapan : <br><textarea rows="4" cols="25" name="tanggapan" id="tanggapan">Masukkan tanggapan anda disini!</textarea><br>
	<br>
	<input type="submit" value="Sampaikan Tanggapan" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary"> 
	</form>
	
	<!--<a href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a> -->
  </div>
  <div id="fade" class="black_overlay"></div>
  
  