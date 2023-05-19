<? session_start();?>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>
<link href="style/style.css" rel="stylesheet" type="text/css">
<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
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
			$("#output").html("<font color=red>Anda belum memilih foto!</font>");
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



<div id="upload-wrapper">
<div align="center">

<script>
function validateForm() {

	var angsuran = document.forms["MyUploadForm"]["judul"].value;
    if (angsuran == null || angsuran == "") {
        alert("Mohon maaf, judul harus diisi!");
        return false;
    }
}
</script>
			


<form action="processuploadfotoselfie.php" onSubmit="return false" method="post" enctype="multipart/form-data" id="MyUploadForm">
Judul Foto  Selfie <input type="text" name="judul" id="judul">
<br><br>
<input name="ImageFile" id="imageInput" type="file" />
<input type="submit"  id="submit-btn" value="Upload" onclick="return validateForm()"/>
<img src="images/1ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
</form>

<span class="">Gambar yang diizinkan : Jpeg, Jpg, Png and Gif. | Ukuran maksimal 1 MB</span>
<div id="progressbox" style="display:none;"><div id="progressbar"></div ><div id="statustxt">0%</div></div>
<div id="output"></div>

<br><br>

<?php 
include "koneksi.php";
$sql = mysql_query("select * from fotoselfie where uploader = '$_SESSION[ps_nama] Jurusan $_SESSION[ps_prodi] $_SESSION[ps_kampus]' order by id desc");

//$gam = "img/user/Budi Anduk Solikin.png";
while($t = mysql_fetch_array($sql)){
$gam = "img/selfie/".$t[nama_file];
echo "<table ><tr><td><img src='$gam' width='50px' height='50px'></td><td><TABLE><TR><td>Judul</td><td>$t[judul]</td></tr><tr><TD>Tanggal Upload</TD><td> $t[tanggal_upload]</td></TR><tr><td><a href='hapus_foto_selfie.php?no=$t[0]'>Hapus</a></td></tr></TABLE></td></tr></table>";
}

?>
</div>



</div>