<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>

<? clearstatcache();  // hapus cookie tmp img
if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>

<? $aidi=$_SESSION['id_login'];  
if ($_GET[action]=="simpan"){
mysql_query("update pegawai set nama='$_GET[nama]', hp='$_GET[hp]',alamat='$_GET[alamat]',tgl_lahir='$_GET[tanggal_lahir]',tempat_lahir='$_GET[tempat_lahir]',jenis_kelamin='$_GET[jenis_kelamin]',agama='$_GET[agama]',email='$_GET[email]' where id='$_SESSION[id_login]'");
echo "Data berhasil diperbarui!";}else{

?>
<script>
function Simpan(){
var nama = document.getElementById('nama').value;
var email = document.getElementById('email').value;
var hp = document.getElementById('hp').value;
var jenis_kelamin = document.getElementById('jenis_kelamin').value;
var tempat_lahir = document.getElementById('tempat_lahir').value;
var tanggal_lahir = document.getElementById('tanggal_lahir').value;
var agama = document.getElementById('agama').value;
var alamat = document.getElementById('alamat').value;
$.colorbox({iframe:true, width:"30%", height:"20%", href: "system/biodata.php?action=simpan&nama="+nama+"&email="+email+"&hp="+hp+"&jenis_kelamin="+jenis_kelamin+"&tempat_lahir="+tempat_lahir+"&tanggal_lahir="+tanggal_lahir+"&agama="+agama+"&alamat="+alamat});}



</script>
<form action="system/submit_update_pegawai.php" method="post">
<div class=col-md-10> 
<div class="block block-drop-shadow"> <div class="header"> <h2>Biodata Diri</h2> </div> 
 <div class="modal modal-draggable modal-white" id=modal_ajax tabindex=-1 role=dialog aria-hidden=true> <div class=modal-dialog> <div class=modal-content> <div class=modal-header> <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button> <h4 class=modal-title></h4> </div> <div class="modal-body clearfix np"> </div> </div> </div> </div>
 

	


<div class="content controls"> 

<?$query = mysql_query("select * from pegawai where id='$aidi' "); while($b=mysql_fetch_row($query)){?>

 <div class="form-row"> <div class="col-md-3">NIP :</div> <div class="col-md-9"> <input class="form-control" value="<? echo $b[1];?>" type="text" name="nip" readonly="readonly"> </div> </div> 
 <div class="form-row"> <div class="col-md-3">Nama Lengkap :</div> <div class="col-md-9"> <input class="form-control" value="<? echo $b[3];?>" type="text" name="nama" id="nama"> </div> </div> 
 

 <div class="form-row"> <div class="col-md-3">HP <i>(Isikan 1 Nomor HP Saja)</i>:</div> <div class="col-md-9"> <input class="form-control" value="<? echo $b[8];?>" type="text" name="hp" id="hp"> </div> </div> 
  <div class="form-row"> <div class="col-md-3">BBM <i>(Diisi pin yang aktif)</i>:</div> <div class="col-md-9"> <input class="form-control" value="<? echo $b[15];?>" type="text" name="email" id="email"> </div> </div> 
  
 <div class="form-row"> <div class="col-md-3">Jenis Kelamin:</div> <div class="col-md-9">  <input class="form-control" value="<? echo $b[7];?>" type="text" name="jenis_kelamin"id="jenis_kelamin">  </div> </div> 
  <div class="form-row"> <div class="col-md-3">Tempat Lahir:</div> <div class="col-md-9"> <input class="form-control" value="<? echo $b[6];?>" type="text" name="tempat_lahir" id="tempat_lahir"> </div> </div> 
 <div class="form-row"> <div class="col-md-3">Tanggal Lahir:</div> <div class="col-md-9"> <input class="form-control" value="<? echo $b[5];?>" type="text" name="tanggal_lahir" id="tanggal_lahir"> </div> </div>


 <div class="form-row"> <div class="col-md-3">Agama:</div> <div class="col-md-9"> <input class="form-control" value="<? echo $b[13];?>" type="text" name="agama" id="agama"> </div> </div> 

  <div class="form-row"> <div class="col-md-3">Alamat :</div> <div class="col-md-9"> <input class="form-control" value="<? echo $b[4];?>" type="text" name="alamat" id="alamat"> </div> </div> 
   <div class="form-row"> <div class="col-md-3">Jabatan:</div> <div class="col-md-9"> <input class="form-control" value="<? echo $b[10];?>" type="text" name="jabatan" readonly="readonly"> </div> </div> 

  <div class="form-row"> <div class="col-md-3">Unit Kerja:</div> <div class="col-md-9"> <input   class="form-control" value="<? echo $b[14];?>" type="text" name="unit"  readonly="readonly"> </div> </div> 
      <div class="form-row"> <div class="col-md-3">Status Pegawai:</div> <div class="col-md-9"> <input   class="form-control" value="<? echo $b[9];?>" type="text" name="status_pegawai"  readonly="readonly"> </div> </div> 
	      <div class="form-row"> <div class="col-md-3">ID Absen:</div> <div class="col-md-9"> <input   class="form-control" value="<? echo $b[11];?>" type="text" name="id_absen"  readonly="readonly"> </div> </div> 
<?}?>

 </div>
 
 
 
 

 
 
 
 <div class="footer tar"> <button type="button" onClick='Simpan()' class="btn btn-default btn-clean">Simpan</button> </div> </div></div>
</form>



<?}?>


 
 