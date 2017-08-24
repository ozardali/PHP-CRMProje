<?php include("header.php"); ?>
<ol class="breadcrumb bc-3" ><li><a href="index.php"><i class="fa-home"></i>Anasayfa</a></li><li class="active"><a href="#">Satış Modülü</a></li></ol>

	
		<div class="row">
<div class="col-md-12"><a href='urun-ekle.php' style="float:right;" class='btn btn-success btn-sm btn-icon icon-left'>
							<i class='entypo-plus'></i>
						Yeni Ürün Ekle
						</a>
<?php



echo "<h3>Kayıtlı Ürün Listesi</h3>
<br />";

$query_listele = "SELECT * FROM urunler order by urun_id";
$listele = mysql_query($query_listele);
$row_listele = mysql_fetch_assoc($listele);
$totalRows_listele = mysql_num_rows($listele); 


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
				$(this).html( '<input type="text" class="form-control" placeholder="' + title + ' Ara" /> ' );
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
					<th>Ürün No</th>
					<th>Ürün Adı</th>
					<th>Ürün Açıklama</th>
					<th>Ürün Miktarı</th>
					<th>Ürün Fiyatı</th>
					<th>Ürün Resmi</th>
					<th>Ürün İşlemleri</th>
				</tr>
			</thead>
			<tbody><?php do { 
				
	$sayi=$sayi+1;
			$kalan=$sayi%2;
			if ($kalan=='0') { $renk="#f9f9f9"; }
			else { $renk="#ffffff";}
			


			?> 
	
			
			
					<tr class="even gradeA">
				
					<td align="center"><?php echo $row_listele['urun_id']; ?></td>
					<td align="center" align="center"><?php echo $row_listele['urun_adi']; ?></td>
					<td align="center" align="center" align="center"><?php echo $row_listele['urun_aciklama']; ?></td>
					<td align="center" align="center" align="center" align="center"><?php echo $row_listele['urun_miktari']; ?> adet</td>
					<td align="center" align="center" align="center" align="center" align="center"><?php echo $row_listele['urun_fiyati']; ?> ₺</td>
					<td align="center"><img src="../urunresim/<?php echo $row_listele['urun_resim']; ?>" title="<?php echo $row_listele['urun_adi']; ?>"alt="<?php echo $row_listele['urun_adi']; ?>" class="img-square" width="45px" height="30px" /> </td>
					<td align="center" width="265">
					<a href="urun-sil.php?Sil=<?php echo $row_listele['urun_id']; ?>" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>Ürünü Sistemden Sil</a>

							</td>
						
					
				
				</tr>
	
				<?php } while ($row_listele = mysql_fetch_assoc($listele)); ?> 
			</tbody>
			<tfoot>
				<tr>
				<th>Ürün No</th>
					<th>Ürün Adı</th>
					<th>Ürün Açıklama</th>
					<th>Ürün Miktarı</th>
					<th>Ürün Fiyatı</th>
					<th>Ürün Resmi</th>
					<th>Ürün İşlemleri</th>

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