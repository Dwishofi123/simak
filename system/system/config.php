<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? clearstatcache();  // hapus cookie tmp img
if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>

<? $aidi=$_SESSION['id_login'];  ?>



<div class="row"> <div class="col-md-5"> 


<script type="text/javascript" src="js/jquery.form.min.js"></script>

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
			$("#output").html("Mohon maaf layanan ini belum bisa dimanfaatkan, terima kasih.");
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
<link href="css/style.css" rel="stylesheet" type="text/css">


<div class="block block-drop-shadow"> 
<form action="system/processupload.php" onSubmit="return false" method="post" enctype="multipart/form-data" id="MyUploadForm">
<div class="head bg-dot30 npb"> <h2>Pengaturan Gambar Profil</h2> 
<div class="pull-right"> 
<button class="btn btn-default btn-clean" type="submit"  id="submit-btn">Upload</button> 
</div> 
</div> 
<div class="head bg-dot30 np tac"> <img src="img/user/thumb_<? echo $_SESSION[id_login];?>.jpg" class="img-thumbnail img-circle"> </div> 
<div class="content controls"> 
<div class="form-row"> <div class="col-md-12"> 
<div class="input-group file"> 
<input class="form-control" placeholder="img/example/user/anda.jpg" type="text"> 
<input name="ImageFile" id="imageInput" type="file" > <span class="input-group-btn"> <button class="btn" type="button" >Browse</button> </span>
<img src="img/loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
 
</div> </div> </div> 
<div class="form-row"> 
<div id="upload-wrapper">
<div id="progressbox" style="display:none;"><div id="progressbar"></div ><div id="statustxt">0%</div></div>
<div id="output"></div>
</div> 
</div>
</div> 
</form>
</div> 


<script>
function GantiPassword(){
var pwd_baru=document.getElementById("password_baru").value;
var pwd_lama=document.getElementById("password_lama").value;
$.colorbox({iframe:true, width:"40%", height:"20%", href: "system/submit_ganti_password.php?password_lama="+pwd_lama+"&password_baru="+pwd_baru});}

</script>

<form action="#" method="post" id="pwd" name="pwd">
<div class="block block-drop-shadow">
 <div class="header"> <h2>Ubah Password</h2> </div> 
 <div class="content controls"> 
 <div class="form-row"> <div class="col-md-12"> <input class="form-control" placeholder="Password Lama" type="password" id="password_lama"> </div> </div> 
 <div class="form-row"> <div class="col-md-12"> <input class="form-control" placeholder="Password Baru" type="password" id="password_baru"> </div> </div>
 <div class="form-row"> <div class="col-md-12"> <input class="form-control" placeholder="Password Baru" type="password"  id="konfirm_password_baru"> </div> </div>
 </div>
 <div class="footer tar">
 <button class="btn btn-default btn-clean" type=button onClick='GantiPassword()'>Konfirmasi</button></div> </div> 
 </form>
 
 
 
 </div> </div>