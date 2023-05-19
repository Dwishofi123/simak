<script type="text/javascript"><?php date_default_timezone_set('Asia/Jakarta'); ?></script>
<? if ($_POST[nama]<>""){
$tgl = date("Y-m-d H:i:s");
include "system/system/konek.php"; 
mysql_query("insert into pengaduan_nama_sekolah(tanggal,nama,email,nama_sma,provinsi,kabupaten,alamat_lengkap)values('$tgl','$_POST[nama]','$_POST[email]','$_POST[nama_sma]','$_POST[provinsi]','$_POST[kabupaten]','$_POST[alamat_lengkap]')");
echo " Terima kasih atas kontribusi dan pengaduan anda. <br>Pesan anda sudah kami terima dan secepatnya akan kami tindaklanjuti. Pengaduan akan kami prosses maksimal 1x24 jam. Terima kasih";

}else{?>
<h2>Pengaduan Data</h2>
<i>Tips : Sebelum melakukan pengaduan pastikan anda mengecek kembali nama sekolah yang tidak bisa anda temukan. Bisa jadi anda mencari nama sekolah tersebut di Kabupaten sementara nama sekolah tersebut terletak di Kota. Seperti contohnya anda mencari nama sekolah di Kab. Bekasi dan anda tidak bisa menemukan nama sekolah tersebut, silakan coba cari lagi data sekolah tersebut di Kota Bekasi. Dan perlu diketahui bahwa data nama-nama sekolah ini adalah data terupdate dari Dinas Pendidikan. Jadi pastikan kembali anda sudah mengecek dengan teliti nama sekolah anda.</i><br><br><br>Nama sekolah kamu belum tertera di formulir pendaftaran kami? Silakan adukan melalui form ini!<br><br><br>
<form class="pure-form pure-form-aligned" action="pengaduan15.php" method="POST">
    <fieldset>
        <div class="pure-control-group">
            <label for="nnama">Nama </label>
            <input id="nama" name="nama" type="text" placeholder="Nama Lengkap">
        </div>

        <div class="pure-control-group">
            <label for="email">Email Address (mohon diisi karna konfirmasi pengaduan akan dikirim melalui email)</label>
            <input id="email" name="email" type="text" placeholder="Email Address">
        </div>

		<div class="pure-control-group">
            <label for="nama_sma">Nama sekolah yang ingin dimasukan ke formulir pendaftaran</label>
            <input id="nama_sma" name="nama_sma" type="text" placeholder="NAMA SMA">
        </div>

		<div class="pure-control-group">
            <label for="provinsi">Provinsi Sekolah</label>
            <input id="provinsi" name="provinsi" type="text" placeholder="PROVINSI">
        </div>

				<div class="pure-control-group">
            <label for="kabupaten">Kabupaten Sekolah</label>
            <input id="kabupaten" name="kabupaten" type="text" placeholder="KABUPATEN">
        </div>

		
				<div class="pure-control-group">
            <label for="alamat_lengkap">Alamat Lengkap Sekolah</label>
            <input id="alamat_lengkap" name="alamat_lengkap" type="text" placeholder="ALAMAT LENGKAP">
        </div>

		
        <div class="pure-controls">
            <label for="cb" class="pure-checkbox">
                <input id="cb" type="checkbox"> Dengan ini saya menyatakan bertanggungjawab dengan data yang saya berikan
            </label>

            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
    </fieldset>
</form>

<?}?>