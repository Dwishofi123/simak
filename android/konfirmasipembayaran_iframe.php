<? session_start();?>
 
	
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>
<link href="style/style.css" rel="stylesheet" type="text/css">
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 <style>
html {
    background-color: #f1f4f5;
    font-weight: 300;
    color: rgba(0,0,0,.54);
}
html, body {
	font-family: "Roboto";
	font-weight: 300;
}
</style>
<script type="text/javascript">
$(document).ready(function() { 

	var progressbox     = $('#progressbox');
	var progressbar     = $('#progressbar');
	var statustxt       = $('#statustxt');
	var completed       = '0%';
	
	var options = { 
			target:   '#output',   // target element(s) to be updated with server response 
			beforeSubmit:  beforeSubmit,  // pre-submit callback 
			uploadProgress: OnProgress,
			success:       afterSuccess,  // post-submit callback 
			resetForm: true        // reset the form after successful submit 
		}; 
		
	 $('#MyUploadForm').submit(function() { 
			$(this).ajaxSubmit(options);  			
			// return false to prevent standard browser submit and page navigation 
			return false; 
		});
	
//when upload progresses	
function OnProgress(event, position, total, percentComplete)
{
	//Progress bar
	progressbar.width(percentComplete + '%') //update progressbar percent complete
	statustxt.html(percentComplete + '%'); //update status text
	if(percentComplete>50)
		{
			statustxt.css('color','#fff'); //change status text to white after 50%
		}
}

//after succesful upload
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{

		if( !$('#imageInput').val()) //check empty input filed
		{
			$("#output").html("<font color=red>Anda belum memilih foto tanda bukti pembayaran untuk di upload!</font>");
			return false
		}
		
		var fsize = $('#imageInput')[0].files[0].size; //get file size
		var ftype = $('#imageInput')[0].files[0].type; // get file type
		
		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>1048576) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}
		
		//Progress bar
		progressbox.show(); //show progressbar
		progressbar.width(completed); //initial value 0% of progressbar
		statustxt.html(completed); //set status text
		statustxt.css('color','#000'); //initial color of status text

				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

}); 

</script>


Untuk konfirmasi pembayaran, silakan isi lengkap form dibawah ini :<br><br>

<div id="upload-wrapperaaaaaaaaaaaaaaa">
<div align="center">

<script>
function validateForm() {

	var angsuran = document.forms["MyUploadForm"]["angsuran"].value;
    if (angsuran == null || angsuran == "") {
        alert("Sepertinya jatah konfirmasi pembayaran anda melalui aplikasi ini sudah habis. Silakan lakukan konfirmasi pembayaran langsung melalui bagian keuangan. Terima kasih");
        return false;
    }

	var tanggal = document.forms["MyUploadForm"]["tanggal"].value;
    if (tanggal == null || tanggal == "") {
        alert("Silakan masukkan tanggal transfer!");
        return false;
    }

	var nominal = document.forms["MyUploadForm"]["nominal"].value;
    if (nominal == null || nominal == "") {
        alert("Nominal pembayaran tidak boleh kosong!");
        return false;
    }

	var pemilikrekening = document.forms["MyUploadForm"]["pemilikrekening"].value;
    if (pemilikrekening == null || pemilikrekening == "") {
        alert("Nama pemilik rekening wajib diisi dengan benar!");
        return false;
    }	

	}
</script>

			


<form action="processuploadkonfirmasipembayaran.php" method="post" enctype="multipart/form-data" id="MyUploadForm" name="MyUploadForm" >
<table >
<tr><td>Pilih Angsuran </td><td> 
<select name="angsuran" id="angsuran">
<option value="0" disabled="disabled">Daftar Ulang</option>

<?include "koneksi.php";
$sql = mysql_query("select count(id) as id from konfirmasi_pembayaran where nama = '$_SESSION[ps_nama]' and jurusan='$_SESSION[ps_prodi]' and kampus='$_SESSION[ps_kampus]'");

while($t = mysql_fetch_array($sql)){$jumcount=$t[id];}


if ($jumcount==0){echo"<option value='1'>Angsuran 1</option><option value='2'>Angsuran 2</option><option value='3'>Angsuran 3</option><option value='4'>Angsuran 4</option>";}

if ($jumcount==1){echo"<option value='1' disabled='disabled'>Angsuran 1</option><option value='2'>Angsuran 2</option><option value='3'>Angsuran 3</option><option value='4'>Angsuran 4</option>";}

elseif ($jumcount==2){echo"<option value='1' disabled='disabled'>Angsuran 1</option><option value='2' disabled='disabled'>Angsuran 2</option><option value='3'>Angsuran 3</option><option value='4'>Angsuran 4</option>";}

elseif ($jumcount==3){echo"<option value='1' disabled='disabled'>Angsuran 1</option><option value='2' disabled='disabled'>Angsuran 2</option><option value='3' disabled='disabled'>Angsuran 3</option><option value='4'>Angsuran 4</option>";}

elseif ($jumcount>3){echo"<option value='1' disabled='disabled'>Angsuran 1</option><option value='2' disabled='disabled'>Angsuran 2</option><option value='3' disabled='disabled'>Angsuran 3</option><option value='4' disabled='disabled'>Angsuran 4</option>";}?>





</select> </td></tr>
<tr><td>Tanggal_Transfer  </td><td><input type="text" name="tanggal" id="tanggal" placeholder="Wajib Diisi!" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}"></td></tr>
<tr><td>Nominal Transfer  </td><td><input type="text" name="nominal" id="nominal" placeholder="Wajib Diisi!" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}" ></td></tr>
<tr><td>Nama Pemilik Rekening  </td><td><input type="text" name="pemilikrekening" id="pemilikrekening" placeholder="Wajib Diisi!" class="input_field" onfocus="this.placeholder = '' " onBlur="javascript:{this.value = this.value.toUpperCase();}"></td></tr>
<tr><td> Tanda Bukti Transfer</td><td>
<input name="ImageFile" id="imageInput" type="file" />
<input type="submit"  id="submit-btn" value="Upload" onclick="return validateForm()" />
<img src="images/1ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/></td></tr>
</table>
</form>

<span class="">Anda hanya diberikan kesempatan 4x konfirmasi pembayaran. Mohon berhati-hati dalam melakukan konfirmasi pembayaran. </span>
<div id="progressbox" style="display:none;"><div id="progressbar"></div ><div id="statustxt">0%</div></div>
<div id="output"></div>

<br><br>



<?php 
include "koneksi.php";
$sql = mysql_query("select * from konfirmasi_pembayaran where nama = '$_SESSION[ps_nama]' and jurusan='$_SESSION[ps_prodi]' and kampus='$_SESSION[ps_kampus]' order by id desc");

//$gam = "img/user/Budi Anduk Solikin.png";
while($t = mysql_fetch_array($sql)){
$gam = "img/tanda bukti transfer/".$t[nama_file];
echo "<img src='$gam' width='50px' height='50px'><br>
<strong>Konfirmasi Pembayaran Angsuran $t[angsuran] </strong><br> 

Tanggal Transfer : $t[tanggal_transfer] <br>
Nominal : $t[nominal] <br>
Nama Pemilik Rekening $t[nama_pentransfer] <br>
Dikonfirmasikan pada $t[tanggal_upload]<br><br><br>";
}

?>


</div>
		
		


		
		
		
		
		
		
		
		
		

		