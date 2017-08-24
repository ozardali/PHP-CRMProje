<?php include("header.php"); ?>
<ol class="breadcrumb bc-3" ><li><a href="index.php"><i class="fa-home"></i>Anasayfa</a></li><li class="active"><a href="#">Kullanıcılar</a></li></ol>

	
		<div class="row">
<div class="col-md-12"><a href='kullanici-ekle.php' style="float:right;" class='btn btn-success btn-sm btn-icon icon-left'>
							<i class='entypo-plus'></i>
						Yeni Kullanıcı Ekle
						</a>
<?php

 if(isset($_GET['tip']))
 {
	$tip = $_GET['tip'];
}
else {

	$tip = "0";
}
if($tip == "1")
{

echo "<h3><i class='entypo-star'></i> VIP Kullanıcı Listesi</h3>
<br />";

$query_listele = "SELECT * FROM u_uyeler  where uye_tip = '1'  ORDER BY uye_id ASC";
$listele = mysql_query($query_listele);
$row_listele = mysql_fetch_assoc($listele);
$totalRows_listele = mysql_num_rows($listele); 
}

else {

echo "<h3>Kullanıcı Listesi</h3>
<br />";

$query_listele = "SELECT * FROM u_uyeler ORDER BY uye_id ASC";
$listele = mysql_query($query_listele);
$row_listele = mysql_fetch_assoc($listele);
$totalRows_listele = mysql_num_rows($listele); 

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
					<th>TC Kimlik No</th>
					<th>Ad Soyad</th>
					<th>E-Mail Adresi</th>
					<th>GSM Numarası</th>
					<th>Kayıt Tarihi</th>
					<th>Kullanıcı İşlemleri</th>
				</tr>
			</thead>
			<tbody><?php do { 
				
	$sayi=$sayi+1;
			$kalan=$sayi%2;
			if ($kalan=='0') { $renk="#f9f9f9"; }
			else { $renk="#ffffff";}
			


			?> 
	
			
			
					<tr class="even gradeA">
				
					<td><?php echo $row_listele['uye_tc']; ?></td>
					<td><img src="../uyefoto/<?Php echo $row_listele['uye_foto'];?>" title="<?php echo $row_listele['uye_adsoyad']; ?>"alt="<?php echo $row_listele['uye_adsoyad']; ?>" class="img-square" width="30" /> <?php echo $row_listele['uye_adsoyad']; ?></td>
					<td><?php echo $row_listele['uye_mail']; ?></td>
					<td><?php echo $row_listele['uye_gsm']; ?></td>
					<td><?php echo $row_listele['uye_kayittarih']; ?></td>
					<td width="265">
					<a href="k-sil.php?Sil=<?php echo $row_listele['uye_tc']; ?>" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>Kullanıcıyı Sil</a>
							<a href="kullanici-duzenle.php?Duzenle=<?php echo $row_listele['uye_tc']; ?>" class="btn btn-info btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>Kullanıcıyı Düzenle</a>
							</td>
						
					
				
				</tr>
	
				<?php } while ($row_listele = mysql_fetch_assoc($listele)); ?> 
			</tbody>
			<tfoot>
				<tr>
					<th>TC Kimlik No</th>
					<th>Ad Soyad</th>
					<th>E-Mail Adresi</th>
					<th>GSM Numarası</th>
					<th>Kayıt Tarihi</th>
					<th>Kullanıcı İşlemleri</th>
				</tr>
			</tfoot>
		</table> <?php mysql_free_result($listele);  ?>
    <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_listele == 0) { // Show if recordset empty ?>
    <p><strong>Veritabanında listelenecek kayıt bulunamadı</strong></p>
    <?php } // Show if recordset empty ?>
						
		
		<br />
		


</div>
		</div>

    <!-- Imported scripts on this page -->
    <script src="../assets/js/datatables/datatables.js"></script>
    <script src="../assets/js/select2/select2.min.js"></script>
				<?php include("footer.php"); ?>