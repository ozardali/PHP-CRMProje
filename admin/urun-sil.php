<?php require_once('header.php'); 
error_reporting(0);

   $Sil = $_GET['Sil'];
 $rsilme = mysql_query("delete from urunler where urun_id ='$Sil'"); ?>
   <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header"><?php
 if($rsilme){
	echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.success("Ürün  başarıyla silindi", "BAŞARILI");
})</script>';
header("refresh:1; url=urunler.php");
}

else{
echo '<script>alert("Silme tamamlanamadı!")</script>';
header("refresh:1; url=urunler.php");
}
 ?>
	
<ol class="breadcrumb bc-3"> <li> <a href="index.php"><i class="fa-home"></i>Neon CRM </a> </li></ol>


<div class="jumbotron"> <h1>Siliniyor</h1>
<p>İşlem tamamlanıyor..</p>
</p> <p> <br> </p><div class="btn btn-primary btn-lg">Güncel Versiyon: <strong>v2.0</strong></div> <p></p> </div>
		<div class="row">
			
			<div class="col-md-12">
			


			</div>


			</div>
 <?php include("footer.php"); ?>