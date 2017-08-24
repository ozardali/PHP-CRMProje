<?php require_once('header.php'); ?>


<ol class="breadcrumb bc-3"> <li> <a href="index.php"><i class="fa-home"></i>Neon CRM </a> </li> <li> <a href="#">Alışveriş</a> </li> <li class="active"> <strong>Satış Sayfası</strong> </li> </ol>

<h2>Satışta Olan Ürünler</h2>
<br/>
<div class="row"> 
<?php 
$query_listele = "SELECT * FROM urunler order by urun_id";
$listele = mysql_query($query_listele);
$row_listele = mysql_fetch_assoc($listele);
$totalRows_listele = mysql_num_rows($listele); 

?>
 <?php $sayi=0; if ($totalRows_listele > 0) { // Show if recordset not empty ?>
 <?php do { 	?> 
	<div class="col-sm-3"> 
		<div class="tile-progress tile-cyan">
			<div class="tile-header"> <h3><?php echo $row_listele['urun_adi']; ?></h3>
			<span ><center><img src="../urunresim/<?php echo $row_listele['urun_resim'];?>" width="250px" height="200px"alt="" /></center></span>
				<span style="font-size:14px"><?php echo $row_listele['urun_aciklama']; ?></span>
				<span style="float:Right"><h2 style="color:#fff;">Stok:<?php echo $row_listele['urun_miktari']; ?> adet<br/>Fiyat: <?php echo $row_listele['urun_fiyati']; ?> ₺</h2></span>
			</div> <br/><br/><br/>
				<div class="tile-progressbar"><span data-fill="100%" style="width: 100%;"></span></div>
			<div class="tile-footer"> 
					<span>
					<a href="urun-detay.php?urun_id=<?php echo $row_listele['urun_id']; ?>" class="btn btn-primary">Detaylı Bilgi</a>

					</span>
			</div>    
		</div>
	</div> 
 <?php } while ($row_listele = mysql_fetch_assoc($listele)); ?> 
				   <?php mysql_free_result($listele);  ?>
    <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_listele == 0) { // Show if recordset empty ?>
    <p><strong>Veritabanında listelenecek kayıt bulunamadı</strong></p>
    <?php } // Show if recordset empty ?>




</div>
<?php include("footer.php"); ?>