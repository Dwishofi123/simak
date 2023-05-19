<body style="bg-color:black;">
<? session_start();?>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
 
 
 
 
 <?
 include "koneksi.php";
$no = ($_GET['no']);


if ($_GET[action]=="approve"){
$sql = "update fotoselfie set status='Approve' where id = '$no'";
}elseif ($_GET[action]=="unapprove"){
$sql = "update fotoselfie set status='Belum Approve' where id = '$no'";
}elseif ($_GET[action]=="hapus"){ $sql = "delete from fotoselfie where id = '$no'";}



$sukse = mysql_query($sql);
?>


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
			$("#output").html("Are you kidding me?");
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
<div style="position:fixed; background-color:black; color:grey; width:100%;" align="center"><h3 ><br>FOTO SELFIE CONTROL</h3></div>
<marquee direction=up height="1000px" scrolldelay="500">
<div height="1000px" align="center" style="background-color:black; bg-color:black; color:grey;">
<?php 

$sql = mysql_query("select * from fotoselfie order by id desc limit 50");

//$gam = "img/user/Budi Anduk Solikin.png";
while($t = mysql_fetch_array($sql)){

echo "<div style=''>";
$gam = "img/selfie/".$t[nama_file];
echo "<br>Judul : $t[judul]<br>Tanggal Upload : $t[tanggal_upload]<br>Uploader : $t[uploader]<br><br><img src='$gam' width='30%'><br>Status Gambar : $t[status]<br><a href='fotoselfie_admin.php?action=hapus&no=$t[0]' style='color:orange;'>Hapus</a> &nbsp; ";
if ($t[status]=="Approve") { echo "<a href='fotoselfie_admin.php?action=unapprove&no=$t[0]' style='color:orange;'>UnApprove</a>";}else{echo "<a href='fotoselfie_admin.php?action=approve&no=$t[0]'>Approve</a><br><br>";}
echo "</div>";


}

?>
</div></marquee>



</div>
</body>