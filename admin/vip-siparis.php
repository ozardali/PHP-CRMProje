<?php include("header.php"); ?>

<ol class="breadcrumb bc-3"> <li> <a href="index.php"><i class="fa-home"></i>Neon CRM </a> </li> <li> <a href="#">VIP ÜYELİK</a> </li> <li class="active"> <strong>Vip Üyelik Sipariş Sayfası</strong> </li> </ol>

	<div class="row">
			<div class="col-md-6">
			
	
							
<?php

echo "<h3>Vip Üyelik Siparişleri</h3>
<br />";

$query_listele = "SELECT * FROM a_premium order by id";
$listele = mysql_query($query_listele);
$row_listele = mysql_fetch_assoc($listele);
$totalRows_listele = mysql_num_rows($listele); 

if(isset($_GET['Onayla'])){

   $gelenid = $_GET['Onayla'];
$onayla = mysql_query("delete from a_premium where id ='$gelenid'"); 

$guncelle = mysql_query("UPDATE u_uyeler SET uye_tip = '1'  WHERE uye_tc = '$row_listele[pre_tc]'");

 echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.success("Sipariş Onaylanmıştır", "BAŞARILI");
})</script>';
header("refresh:2; url=vip-siparis.php");
}
if(isset($_GET['Reddet'])){
	$gelenid2 = $_GET['Reddet'];
$onayla2 = mysql_query("delete from a_premium where id ='$gelenid2'"); 
$iptalet = mysql_query("UPDATE u_uyeler SET uye_tip = '0'  WHERE uye_tc = '$row_listele[pre_tc]'");
 echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.error("Sipariş İptal Edilmiştir.", "BAŞARISIZ");
})</script>';
header("refresh:2; url=vip-siparis.php");
}

?>
<style>.dataTables_filter{float:Right;}</style>
    <?php $sayi=0; if ($totalRows_listele > 0) { // Show if recordset not empty ?>
		<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			var $table3 = jQuery("#table-3");
			
			var table3 = $table3.DataTable( {
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Hepsi"]]
			} );
			
			// Initalize Select Dropdown after DataTables is created
			$table3.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
			
			// Setup - add a text input to each footer cell
			$( '#table-3 tfoot th' ).each( function () {
				var title = $('#table-3 thead th').eq( $(this).index() ).text();
				$(this).html( '<input type="text" class="form-control" placeholder="' + title + ' Alanında Ara" /> ' );
			} );
			
			// Apply the search
			table3.columns().every( function () {
				var that = this;
			
				$( 'input', this.footer() ).on( 'keyup change', function () {
					if ( that.search() !== this.value ) {
						that
							.search( this.value )
							.draw();
					}
				} );
			} );
		} );
		</script>
		
		<table class="table table-bordered datatable" id="table-3">
			<thead>
				<tr class="replace-inputs">
					<th>Sipariş No</th>
					<th>Siparişi Veren</th>
					<th>Sipariş Tarihi</th>
				<th>Sipariş İşlem</th>
				</tr>
			</thead>
			<tbody><?php do { 
				
	$sayi=$sayi+1;
			$kalan=$sayi%2;
			if ($kalan=='0') { $renk="#f9f9f9"; }
			else { $renk="#ffffff";}
			
$query_adsoyad= mysql_query("Select uye_adsoyad from u_uyeler where uye_tc=$row_listele[pre_tc]"); 
while($oku = mysql_fetch_assoc($query_adsoyad))
    {
			?> 
	
			
			
					<tr class="even gradeA">
				
					<td align="center"><?php echo $row_listele['id']; ?></td>
					<td><?php echo $row_listele['pre_tc']; ?> - <?php echo $oku['uye_adsoyad']; } ?></td>
				
					<td><?php echo $row_listele['tarih']; ?></td>
					<td>
				
					<a href="vip-siparis.php?Onayla=<?php echo $row_listele['id']; ?>" class="btn btn-success btn-sm btn-icon icon-left">
						<i class="entypo-check"></i>Onayla
						</a>
					<a href="vip-siparis.php?Reddet=<?php echo $row_listele['id']; ?>" class="btn btn-danger btn-sm btn-icon icon-left">
						<i class="entypo-cancel"></i>İptal Et
						</a>
					</td>
				
				</tr>
	
				<?php } while ($row_listele = mysql_fetch_assoc($listele)); ?> 
			</tbody>
			<tfoot>
					<tr class="replace-inputs">
					<th>Sipariş Numara</th>
					<th>Siparişi Veren Kullanıcı</th>
					<th>Sipariş Tarihi</th>
				<th>Kullanıcı İşlemleri</th>
				</tr>
			</tfoot>
		</table> <?php mysql_free_result($listele);  ?>
    <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_listele == 0) { // Show if recordset empty ?>
    <p><strong>Veritabanında listelenecek kayıt bulunamadı</strong></p>
    <?php } // Show if recordset empty ?>
						
		
		<br />
		
			
			</div>	<br />	<br />	<br />
			<div class="col-md-6">
<div class="panel minimal">
<!-- panel head -->
<div class="panel-heading"><div class="panel-title">Vip Üyelikler Hakkında</div></div>
<!-- panel body -->
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane active" id="tab1">
<p>Üye paneli üzerinden sipariş talebinde bulunan üyenize bu arayüz üzerinden VIP onayı verebilirsiniz.<br/>VIP onayını vermeniz durumunda, site üyesi VIP özellik olan Rehber Yönetimini kullanabilecek ve  telefon kayıtlarını gerçekleştirebilecektir. </p>
		<div class="list-group">
		<a href="#" class="list-group-item active">VIP Üyelik Özellikleri</a>
		<a href="#" class="list-group-item">Rehber Yönetim Paneline Erişim</a>
		<a href="#" class="list-group-item">Özel VIP Üye Rütbesine Sahip Olma</a>
		<a href="#" class="list-group-item">Duyurularda SMS ile Bilgi Alabilme</a>
		<a href="#" class="list-group-item">1 Yıl Boyunca Kullanım</a>
		</div>
</div>
</div>
</div>
</div>
</div>
	</div>
    <!-- Imported scripts on this page -->
    <script src="../assets/js/datatables/datatables.js"></script>
    <script src="../assets/js/select2/select2.min.js"></script>
<?php include("footer.php"); ?>