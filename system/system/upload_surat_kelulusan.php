<? session_start();
$_SESSION[idpendaftaran]=$_GET[id];?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		

		<!-- Google web fonts -->
		<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />

		<!-- The main CSS file -->
		
	</head>

	<body>

		<form id="upload" method="post" action="upload_surat_kelulusan_action.php" enctype="multipart/form-data">
			<div id="drope">
				<input type="file" name="upl"  accept="*.pdf" />
			</div>

			<ul>
				<!-- The file uploads will be shown here -->
			</ul>

		</form>

		<br><br>#Pastikan file surat pengumuman yang anda upload adalah file PDF. Sistem tidak akan membaca file hasil upload berupa JPG atau PNG atau lainnya. Untuk mengecek apakah surat atas nama siswa ini sudah pernah di upload atau belum, silakan <a href="../../uploads/surat/surat-<? echo $_GET[id];?>.pdf" target="_blank">klik disini</a>.
        
		<!-- JavaScript Includes -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="../../assets/js/jquery.knob.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="../../assets/js/jquery.ui.widget.js"></script>
		<script src="../../assets/js/jquery.iframe-transport.js"></script>
		<script src="../../assets/js/jquery.fileupload.js"></script>
		
		<!-- Our main JS file -->
		<script src="../../assets/js/script.js"></script>


	</body>
</html>