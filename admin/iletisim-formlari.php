<?php include("header.php"); ?>

					<ol class="breadcrumb bc-3" >
								<li>
						<a href="index.php"><i class="fa-home"></i>Anasayfa</a>
					</li>
						<li class="active">
		
									<a href="#">İletişim Formları</a>
							</li>
					
							</ol>
					
	
		
		
		<h3>İletişim Sayfasından Gönderilenler</h3>
			<?php
$query_listele = "SELECT * FROM a_iletisim order by id";
$listele = mysql_query($query_listele);
$row_listele = mysql_fetch_assoc($listele);
$totalRows_listele = mysql_num_rows($listele); ?>
<style>.dataTables_filter{float:Right;}</style>
    <?php $sayi=0; if ($totalRows_listele > 0) { // Show if recordset not empty ?>
		<table class="table table-bordered table-striped datatable" id="table-2">
			<thead>
				<tr>
					<th>
						<div class="checkbox checkbox-replace">
							<input type="checkbox" id="chk-1">
						</div>
					</th>
					<th>Gönderici Ad Soyad</th>
					<th>Gönderici Email</th>
					<th>Gönderici Mesajı</th>
					<th>İşlemler</th>
				</tr>
			</thead>
			
			<tbody><?php do { 
				
	$sayi=$sayi+1;
			$kalan=$sayi%2;
			if ($kalan=='0') { $renk="#f9f9f9"; }
			else { $renk="#ffffff";}
			


			?> 
			
				<tr>
					<td>
						<div class="checkbox checkbox-replace">
							<input type="checkbox" id="chk-1">
						</div>
					</td>
					<td><?php echo $row_listele['name']; ?></td>
					<td><?php echo $row_listele['email']; ?></td>
					<td><?php echo $row_listele['message']; ?></td>
					<td>

						<a href="i-sil.php?Sil=<?php echo $row_listele['id']; ?>" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Mesajı Sil
						</a>
						
					
					</td>
				</tr>
				
				<?php } while ($row_listele = mysql_fetch_assoc($listele)); ?>  </tbody>
				   
                  </table>  <?php mysql_free_result($listele);  ?>
    <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_listele == 0) { // Show if recordset empty ?>
    <p><strong>Veritabanında listelenecek kayıt bulunamadı</strong></p>
    <?php } // Show if recordset empty ?>
						
			
			
				
			</tbody>
		</table>
		

				
				
				<?php include("footer.php"); ?>