<?php session_start();

if ($_SESSION[status_login]=="aktif"){
$nama=$_SESSION[nama];
$asal_sekolah=$_SESSION[asal_sekolah];
$id_pendaftaran=$_SESSION[idpendaftaran];
$my_img = imagecreate( 400, 400 );
$background = imagecolorallocate( $my_img, 0, 0, 255 );
$text_colour = imagecolorallocate( $my_img, 255, 255, 0 );
$line_colour = imagecolorallocate( $my_img, 128, 255, 0 );
imagestring( $my_img, 6, 30, 15, "Tanda Bukti Pendaftaran Online",$text_colour );
imagestring( $my_img, 4, 30, 55, "Terima kasih anda telah melakukan",$text_colour );
imagestring( $my_img, 4, 30, 70, "Pendaftaran Online di Website Resmi",$text_colour );
imagestring( $my_img, 4, 30, 85, "PSPP Penerbangan",$text_colour );
imagestring( $my_img, 4, 30, 120, "Biodata Online",$text_colour );
imagestring( $my_img, 4, 30, 140, "Nama : ".$nama,$text_colour );
imagestring( $my_img, 4, 30, 160, "Asal Sekolah : ".$asal_sekolah,$text_colour );
imagestring( $my_img, 4, 30, 180, "Nomor ID Pendaftaran : ".$id_pendaftaran,$text_colour );

imagestring( $my_img, 4, 30, 220, "Cetak tanda bukti pendaftaran ini ",$text_colour );
imagestring( $my_img, 4, 30, 240, "dan tunjukan pada saat daftar ulang",$text_colour );
imagestring( $my_img, 4, 30, 260, "di kampus",$text_colour );
imagestring( $my_img, 4, 30, 300, "PSPP Penerbangan",$text_colour );
imagestring( $my_img, 4, 30, 320, "The Gate Of A Bright Future",$text_colour );
imagestring( $my_img, 4, 30, 340, "www.pspp-integrated.com",$text_colour );


imagesetthickness ( $my_img, 5 );
imageline( $my_img, 30, 40, 310, 40, $line_colour );

header( "Content-type: image/png" );
imagepng( $my_img );
imagecolordeallocate( $line_color );
imagecolordeallocate( $text_color );
imagecolordeallocate( $background );
imagedestroy( $my_img );

}
?>  


<form>
<input type="button" value="Print this page" onClick="window.print()">
</form>
