<div style="visibility:hidden; height:0px;"><? session_start();?></div><? include "konek.php";?>
<? if($_SESSION[status_login]<>"true"){?> <script type="text/JavaScript">setTimeout(function () { window.location.href = "login.php"; }, 1); </script><? }?>
<? include "pikachu.php";?>
<? $tanggal=date("Y-m-d H:i:s");
include "konek.php";
//print_r($_POST); exit();
if(isset($_POST)&& !empty($_POST)){
    if(isset($_POST['ID'])&& $_POST['ID']!=''){
	 $marketing=explode(" | ", $_POST['Marketing']);
         $sql="update siswa set Tempat_Kuliah='".$_POST['Tempat_Kuliah']."' ,"
                 . "Jurusan='".$_POST['Jurusan']."',Nama='".$_POST['Nama']."' ,"
                 . "nama_panggilan='".$_POST['nama_panggilan']."',Asal_Sekolah='".$_POST['Asal_Sekolah']."' "
                . ",agama ='".$_POST['agama']."',suku ='".$_POST['suku']."',jenis_kelamin='".$_POST['jenis_kelamin']."' "
                 . ",ttl='".$_POST['ttl']."' ,hoby='".$_POST['hoby']."' ,golongan_darah='".$_POST['golongan_darah']."' ,"
                 . "ukuran_sepatu ='".$_POST['ukuran_sepatu']."'"
                . ",ukuran_baju ='".$_POST['ukuran_baju']."',Alamat='".$_POST['Alamat']."' ,Kontak_Person='".$_POST['Kontak_Person']."'"
                 . " ,No_Telp='".$_POST['No_Telp']."' ,Marketing='".$marketing[1]."' where ID=".$_POST['ID'];
				 
       // echo $sql; exit();
	    $uraian=str_replace("'","",$sql);
		mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] meng-$uraian')");
		
		
        if(mysql_query($sql)){?>
		 <script type="text/JavaScript">
		setTimeout(function () {
		   window.location.href = "edit_data_psb.php?submit=sukses&id=<? echo $_POST['ID'];?>"; //will redirect to your blog page (an ex: blog.html)
		}, 1); //will call the function after 1 secs.
		</script>
		<?
        }else{?>
		 <script type="text/JavaScript">
		setTimeout(function () {
		   window.location.href = "edit_data_psb.php?submit=gagal&id=<? echo $_POST['ID'];?>"; //will redirect to your blog page (an ex: blog.html)
		}, 1); //will call the function after 1 secs.
		</script>
		<?
          
        }
    }else{
	include 'konek.php';
	$query = mysql_query("SELECT max(number) from temp_register where reg='PSPP-14'"); while($b=mysql_fetch_row($query)) { $new_reg=$b[0]+1;  $temp_new_reg=$b[0]+1; $jum=strlen($new_reg); if ($jum==1){ $new_reg="00".$new_reg;} elseif ( $jum==2) { $new_reg="0".$new_reg;}}
	$marketing=explode(" | ", $_POST['Marketing']);
        $sql="insert into siswa (No_Reg,Tempat_Kuliah ,Jurusan,Nama ,nama_panggilan,Asal_Sekolah "
                . ",agama ,suku ,jenis_kelamin ,ttl ,hoby ,golongan_darah ,ukuran_sepatu "
                . ",ukuran_baju ,Alamat ,Kontak_Person ,No_Telp ,Marketing,Status_daftarulang,"
                . "status_validasi,input_dari,Tgl_pendaftaran)"
                . "values ('PSPP-14-".$new_reg."','".$_POST['Tempat_Kuliah']."','".$_POST['Jurusan']."',"
                . "'".$_POST['Nama']."',"
                . "'".$_POST['nama_panggilan']."','".$_POST['Asal_Sekolah']."',"
                . "'".$_POST['agama']."',"
                . "'".$_POST['suku']."','".$_POST['jenis_kelamin']."',"
                . "'".$_POST['ttl']."','".$_POST['hoby']."',"
                . "'".$_POST['golongan_darah']."','".$_POST['ukuran_sepatu']."',"
                . "'".$_POST['ukuran_baju']."','".$_POST['Alamat']."',"
                . "'".$_POST['Kontak_Person']."','".$_POST['No_Telp']."',"
                . "'".$marketing[1]."','NO','NO','$_SESSION[unit]',now())";
		//echo $sql; exit();
		$asal_sekolah=$_POST['Asal_Sekolah'];
		$uraian=str_replace("'","",$sql);
		mysql_query("insert into tbl_log(datetime,uraian)value('$tanggal','$_SESSION[nama_login] meng-$uraian')");
		mysql_query("insert into temp_register(reg,number,name)value('PSPP-14','$temp_new_reg','$_POST[Nama]')");
		
		
		$tanggal=date("Y-m-d H:i:s");
		// insert recent update
		mysql_query("insert into recent_update(datetime,keterangan,tujuan)values('$tanggal','Hari ini $_POST[Nama] $asal_sekolah sebagai salah satu siswa dari $marketing[0] telah melakukan pendaftaran dikampus $_SESSION[unit].','marketing')");
		

	   // kirim pesan ke marketing
		 $que = mysql_query("SELECT hp from pegawai where status_pegawai='Aktif' and jabatan='Marketing'"); while($s=mysql_fetch_row($que)) {
		mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('$s[0]','Hari ini $_POST[Nama] $asal_sekolah sebagai salah satu siswa dari $marketing[0] telah melakukan pendaftaran dikampus $_SESSION[unit]. Terima kasih. Info:www.e-sids-clouds.net','Info pendaftaran Siswa ke All Marketing','Online')");
		}	   
	   
	   // kirim pesan ke nomor khusus
		 $que = mysql_query("SELECT tujuan from nomor_khusus"); while($s=mysql_fetch_row($que)) {
		mysql_query("insert into sms_traffic(tujuan,pesan,jenis_sms,unit)value('$s[0]','Hari ini $_POST[Nama] $asal_sekolah sebagai salah satu siswa dari $marketing[0] telah melakukan pendaftaran dikampus $_SESSION[unit]. Terima kasih. Info:www.e-sids-clouds.net','Info pendaftaran Siswa ke Nomor Khusus','Online')");
		}
		
		
        
        if(mysql_query($sql)){?>
		<h1>Data Berhasil Disimpan!</h1>
		<?
        }else{?>
		 <script type="text/JavaScript">
		setTimeout(function () {
		   window.location.href = "edit_data_psb.php?submit=gagal&id=<? echo $new_reg;?>"; //will redirect to your blog page (an ex: blog.html)
		}, 1); //will call the function after 1 secs.
		</script>
		<?
          
        }
         
    }
}
?>