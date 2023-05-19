<? session_start();
if (!isset($_SESSION[ps_nodaf])){?> <script> window.location='login.php'; </script><?}?>

<br>

<meta name="robots" content="noindex">
 <meta name="googlebot" content="noindex">
 <meta name="slurp" content="noindex">
 <meta name="msnbot" content="noindex">
 
<div class="portlet-grid panel-primary"> 
    		 <div class="panel-heading">
    		      <h3 class="panel-title mdl-shadow--2dp">Tata Cara Pembayaran</h3>
    		  </div> 
    		  <div class="panel-body">
    		  	  <strong>A. PERSIAPAN</strong><br>Sebelum melakukan pembayaran biaya pendidikan, pastikan anda telah mendapatkan kode pembayaran anda. <br>Kode pembayaran anda bisa anda dapatkan di surat keputusan hasil tes seleksi masuk PSPP Penerbangan atau bisa anda dapatkan di akhir penjelasan ini.
    		  </div> 
			  <div class="panel-body">
    		  	  <strong>B. CARA PEMBAYARAN</strong><br>1. Melalui ATM<br>
				  Untuk melakukan pembayaran melalui ATM, silakan lakukan pembayaran biaya pendidikan ke rekening <strong>BRI 0098-01-002137-30-3 AN PSPP Penerbangan</strong> sesuai dengan nominal angsuran ditambah dengan  kode pembayaran anda. <br>Contoh : Anda mempunyai kode pembayaran 1234 dan Pembayaran angsuran tahap 2 sebesar Rp. 8.000.000,- maka anda harus membayarkan sebesar RP. 8.001.234,-<br><br>
				  2. Melalui Teller Bank<br>Untuk pembayaran biaya pendidikan melalui Teller Bank(tidak melalui ATM), silakan bayarkan biaya pendidikan ke rekening <strong>BRI 0098-01-002137-30-3 AN PSPP Penerbangan</strong> dengan sesuai dengan nominal dan tambahan  kode pembayaran anda. <br>Contoh : Anda mempunyai kode pembayaran 1234 dan Pembayaran angsuran tahap 2 sebesar Rp. 8.000.000,- maka anda harus membayarkan sebesar RP. 8.001.234,-. 
    		  </div> 
			  <div class="panel-body">
    		  	  <strong>C. CATATAN</strong>
				  <br>Pada saat melakukan pembayaran biaya pendidikan baik melalui ATM ataupun Teller Bank, pastikan anda telah menambahkan  kode pembayaran anda karna pembayaran dengan tanpa menyertakan kode pembayaran tidak bisa diprosses oleh system.
    		  </div> 
			  <div class="panel-body">
    		  	  <strong>D. PROSSES VALIDASI</strong>
				  <br>Prosses validasi pembayaran membutuhkan waktu paling cepat 1 minggu terhitung dari tanggal anda melakukan konfirmasikan pembayaran ke bagian keuangan kampus. Pembayaran yang sudah tervalidasi akan masuk di history pembayaran anda yang bisa anda temukan <a href="index.php?page=pembayaran">disini.</a><br> Apabila anda sudah menunggu selama 1 minggu namun data pembayaran anda belum masuk di history pembayaran, maka kami himbau agar segera melakukan konfirmasi kembali ke bagian keuangan karna pelunasan pembayaran akan berpengaruh di fasilitas pendididikan yang akan anda dapatkan.
    		  </div> 
			  <div class="panel-body">
    		  	 <strong><font color=red>PERHATIAN!!</strong><br>Segala bentuk pembayaran biaya pendidikan hanya dilayani melalui rekening resmi PSPP Penerbangan : <strong>BRI 0098-01-002137-30-3 AN PSPP Penerbangan</strong>. Pembayaran biaya apapun tanpa melalui rekening kampus, dianggap tidak sah/belum membayar.</font>
    		  </div> 
			  <div class="panel-body">
			  <? $kodepembayaran=$_SESSION[ps_nodaf]; $kdpemb=split("/",$kodepembayaran); ?>
    		  	<h3>KODE PEMBAYARAN ANDA : <strong><font color=green><u><? echo $kdpemb[0];?></u></font></strong></h3>
    		  </div> 
			  
    	</div>