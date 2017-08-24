<?php require_once('header.php'); 
error_reporting(0);

   $Sil = $_GET['Sil'];
 $rsilme = mysql_query("delete from u_uyeler where uye_tc ='$Sil'"); ?>
   <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"><?php
 if($rsilme){
	echo '<script>alert("Silme başarıyla tamamlandı.!")</script>';
header("refresh:1; url=kullanicilar.php");
}

else{
echo '<script>alert("Silme tamamlanamadı!")</script>';
header("refresh:1; url=kullanicilar.php");
}
 ?>