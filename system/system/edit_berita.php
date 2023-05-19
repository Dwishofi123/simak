<? session_start();?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<? include "konek.php";  $tanggal=date("Y-m-d H:i:s");?>

<?if ($_GET[action]=="edit"){
mysql_query("update content set content='$_POST[berita]', judul='$_POST[judul]' where id='$_GET[id]'");
echo "<font color='red'><b>Berita berhasil diperbarui!</b></font>";
}elseif ($_GET[action]=="tambah"){
mysql_query("insert into content(content,judul,grup,pub)values('$_POST[berita]. <br><br>~by $_SESSION[nama_login]','$_POST[judul]','berita','true')");
echo "<font color='red'><b>Berita baru berhasil ditambah!</b></font>";
} else{?>


<script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script src="../js/jquery.classyedit.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.classyedit.css" />


<script type="text/javascript">
function PrintDiv11() {    
           var divToPrint = document.getElementById('divToPrint11');
           var popupWin = window.open('', '_blank', 'width=842,height=595');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>
 
<style> 
inputs:-webkit-input-placeholder { 
    color:    #b5b5b5; 
} 
 
inputs-moz-placeholder { 
    color:    #b5b5b5; 
} 
 
 .inputs  { 
 width:470px; 
padding: 5px 5px; 
font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 

font-size: 12px; 
color: #9D9E9E; 
text-shadow: 1px 1px 0 rgba(256, 256, 256, 1.0); 
background: #FFF; 
border: 1px solid #FFF; 
border-radius: 5px; 
box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
-moz-box-shadow: inset 0 1px 3px rgba(0,0,0,0.50); 
-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.50); 
} 
.inputs:focus { 
   background: #DFE9EC; 
color: #414848; 
box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.25); 
-webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25); 
    outline:0; 
} 
  .inputs:hover   { 
background: #DFE9EC; 
color: #414848; 
} 
</style> 


 
  <script>
$(document).ready(function() {
$(".classy-editor").ClassyEdit();
 });
 </script> 


 <form action="edit_berita.php<? if($_GET[id]<>""){ echo "?id=".$_GET[id]."?&action=edit";}else{echo "?&action=tambah";}?>" method="POST" >
 <div class="modal-body clearfix" id="divToPrint11"> <div class="content controls"> 
 <div class="form-row"> <div class="col-md-3"><h2>Judul Berita <input style="font-size:20px;" size="100" type="text" name="judul" id="judul" value="<? $query = mysql_query("SELECT * from content where id='$_GET[id]'"); while($b=mysql_fetch_array($query)) 
 { echo $b[judul]; $berita=$b[content];}?>"></input></h2></div>  </div> 
  <div class="form-row">   <div class="col-md-9"><textarea class="classy-editor" name="berita" ><? echo $berita; ?></textarea></div> </div>
  
 </div> </div> 
<br>
 <div class=modal-footer>  <button type=submit class="btn btn-success btn-clean">Simpan</button> <button type=button class="btn btn-success btn-clean" onClick=PrintDiv11()>Cetak</button></div> 
 
 </form>
 <br><i><font color="red">Catatan : Dilarang keras memasang kontak person pada artikel disini agar terciptanya sistem promosi online yang fairplay. Pastikan artikel yang anda tulis adalah artikel yang layak untuk dikonsumni khalayak umum dan bisa dipertanggungjawabkan. Pastikan artikel yang anda tulis tidak mengandung unsur sara / fitnah. Pastikan artikel anda aman dan tidak membahayakan anda serta kampus PSPP Penerbangan dikemudian hari. Terima kasih. Selamat menulis..</font></i>

 <?}?>
 

