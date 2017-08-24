<?php require_once('header.php'); ?>
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
			Gelen Ticketlar
            <small>size gönderilen ticketlar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="#">Ticket İşlemleri</a></li>
            <li class="active">Gelen Ticketlar</li>
          </ol>
        </section>
<?php
$query_listele = "SELECT * FROM u_mesajlar where mesaj_giden='$uye_tc'";
$listele = mysql_query($query_listele);
$row_listele = mysql_fetch_assoc($listele);
$totalRows_listele = mysql_num_rows($listele); ?>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
			<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Gelen Ticket Listesi</h3>
            </div>
			
				 <div class="box-body">
					<style>.dataTables_filter{float:Right;}</style>
    <?php $sayi=0; if ($totalRows_listele > 0) { // Show if recordset not empty ?>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr >
					  
                        <th><center>Ticket Başlığı</th>
						 <th><center>Ticket İçeriği</th>
						 <th><center>İşlem</th>
                     
                      </tr>
                    </thead>

                 <tbody>    <?php do { 
				 $sayi=$sayi+1;		
				 $kalan=$sayi%2;
				 if ($kalan=='0') { $renk="#f9f9f9"; }
				else { $renk="#ffffff";}?> 
			

						<tr bgcolor=<?php echo $renk; ?>>
						<td align="center"><?php echo $row_listele['mesaj_baslik']; ?></td>
						<td align="center"><?php echo $row_listele['mesaj_icerik']; ?></td>
						<td align="center"><button type="button" class="btn btn-success btn-xs" onclick="location.href = 'mesaj-yolla.php'">Cevapla</button>
</td>
						
						</tr>
        
                   <?php } while ($row_listele = mysql_fetch_assoc($listele)); ?>  </tbody>
				 
                  </table>  <?php mysql_free_result($listele);  ?>
    <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_listele == 0) { // Show if recordset empty ?>
    <p><strong>Veritabanında mesaj kaydı bulunamadı.
	</strong></p>
    <?php } // Show if recordset empty ?>

                </div><!-- /.box-body -->
              </div><!-- /.box -->

            
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    <?php include('footer.php');  ?>

  
   
    </div><!-- ./wrapper -->


  </body>
</html>
