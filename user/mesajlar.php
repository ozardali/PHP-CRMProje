<?php require_once('header.php'); ?>
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              Ticketlarım
            <small>Yolladığım Tüm Ticketlar</small>
          </h1>
         <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="#">Ticket İşlemleri</a></li>
            <li class="active">Ticketlarım</li>
          </ol>
        </section>
<?php
$query_listele = "SELECT * FROM a_mesajlar where mesaj_sahibi='$uye_tc'";
$listele = mysql_query($query_listele);
$row_listele = mysql_fetch_assoc($listele);
$totalRows_listele = mysql_num_rows($listele); ?>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
			<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Ticketlar Listesi</h3>
            </div>
			
				 <div class="box-body">
				  <p>Ticketlar fonksiyonları ilerleyen zamanda arttırılacaktır. Şu anda sadece gönderilmiş ticketları görüntüleyebilirsiniz.</p>
			<style>.dataTables_filter{float:Right;}</style>
    <?php $sayi=0; if ($totalRows_listele > 0) { // Show if recordset not empty ?>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr >
					  
                        <th><center>Ticket Başlığı</th>
						 <th><center>Ticket İçeriği</th>
                     
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
						
						</tr>
        
                   <?php } while ($row_listele = mysql_fetch_assoc($listele)); ?>  </tbody>
				 
                  </table>  <?php mysql_free_result($listele);  ?>
    <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_listele == 0) { // Show if recordset empty ?>
    <p><strong>Veritabanında göndermiş olduğunuz bir mesaj kaydı bulunamadı.<br/><br/>
	Yeni mesaj göndermek istiyorsanız, <a href="mesaj-yolla.php">buraya</a> tıklayın.</strong></p>
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
