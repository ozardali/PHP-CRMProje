<?php require_once('ust.php'); 
error_reporting(0);

   $Sil = $_GET['Sil'];
 $rsilme = mysql_query("UPDATE a_mesajlar SET mesaj_durumu='3' where mesaj_id ='$Sil'"); ?>
   <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"><?php
 if($rsilme){
echo "<center>Mesaj başarıyla silinmiştir. Listeleme sayfasına yönlendiriliyorsunuz.<br/><br/>
<img src='../dist/img/guncelleniyor.gif'/></center>";
header("refresh:2; url=ticketlar.php");
}

else{
echo "<center>Bir sorunla karşılaşıldı! Listeleme sayfasına yönlendiriliyorsunuz.
<br/><br/>
<img src='../dist/img/guncelleniyor.gif'/></center>";
header("refresh:2; url=ticketlar.php");
}
 ?>