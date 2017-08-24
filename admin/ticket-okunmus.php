<?php require_once('header.php'); ?>
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
         Okunmuş Mesajlar
            <small>Form üzerinden gelenler</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="#">Mesaj İşlemleri</a></li>
            <li class="active">Çöp Kutusu</li>
          </ol>
        </section>

      <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Mesajlar</h3>

			     
            </div><div class="box-body">
			      <div class="col-md-2">
              
              <div class="box box-solid">
               
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="ticketlar.php"><i class="fa fa-inbox"></i> Gelen Kutusu <span class="label label-primary pull-right"><?php
                                    $query = mysql_query("SELECT COUNT(*) FROM a_mesajlar where mesaj_durumu !=3");$say = mysql_fetch_array($query);	echo $say[0];?></span></a></li>
                        <li><a href="ticket-okunmamis.php"><i class="fa fa-envelope-o"></i> Okunmamışlar <span class="label label-primary pull-right"><?php
                                    $query = mysql_query("SELECT COUNT(*) FROM a_mesajlar where mesaj_durumu =0");$say = mysql_fetch_array($query);	echo $say[0];?></span></a></li>
                        <li><a href="ticket-okunmus.php"><i class="fa fa-file-text-o"></i> Okunmuşlar<span class="label label-primary pull-right"><?php
                                    $query = mysql_query("SELECT COUNT(*) FROM a_mesajlar where mesaj_durumu =1");$say = mysql_fetch_array($query);	echo $say[0];?></span></a></li>
                        <li><a href="ticket-silinen.php"><i class="fa fa-trash-o"></i> Silinmişler <span class="label label-primary pull-right"><?php
                                    $query = mysql_query("SELECT COUNT(*) FROM a_mesajlar where mesaj_durumu =3");$say = mysql_fetch_array($query);	echo $say[0];?></span></a></li>
                    </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              
            </div><!-- /.col --> 
			<?php
$query_listele = "SELECT * FROM a_mesajlar WHERE mesaj_durumu =1";
$listele = mysql_query($query_listele);
$row_listele = mysql_fetch_assoc($listele);
$totalRows_listele = mysql_num_rows($listele); ?>
            <div class="col-md-10"> 
			
            	<style>.dataTables_filter{float:Right;}</style>
    <?php $sayi=0; if ($totalRows_listele > 0) { // Show if recordset not empty ?>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr >
					
					  <th ><center>Gönderen</center></th>
                        <th><center>Mesaj Başlığı</center></th>
                        <th><center>Mesaj İçeriği</center></th>
						<th><center>Mesaj Tarihi</center></th>
						 <th><center>Durum</center></th>
						 <th><center>Seçenekler</center></th>
                      </tr>
                    </thead>
				
    	
                 <tbody>    <?php do { 
				
	$sayi=$sayi+1;
			$kalan=$sayi%2;
			if ($kalan=='0') { $renk="#f9f9f9"; }
			else { $renk="#ffffff";}
			
		

			?> 
			

                      <tr bgcolor=<?php echo $renk;?>>


                          <td align="center"><?php echo $row_listele['mesaj_sahibi']; ?> (<?php $sonuc1 = mysql_query("SELECT uye_adsoyad FROM u_uyeler where uye_tc = $row_listele[mesaj_sahibi]");
                              while ($satir1 = mysql_fetch_row($sonuc1)){
                                  echo $satir1[0];
                              }
                              ?>)</td>
                        <td align="center"><?php echo $row_listele['mesaj_baslik']; ?></td>
                        <td align="center"><?php echo $row_listele['mesaj_icerik']; ?></td>
						 <td align="center"><?php echo $row_listele['mesaj_tarih']; ?></td>   
                       <td align="center"><?php
$durum=$row_listele['mesaj_durumu'];
					   if($durum == '0')
{echo "<button class='btn bg-red btn-xs'><b>OKUNMAMIŞ</b></button>";}
else {echo "<button class='btn bg-green btn-xs'><b>OKUNMUŞ</b></button>";}	?></td>
                  
					 <td align="center">
                          <button type="button" class="btn btn-success btn-xs" onclick="location.href = 'ticket-oku.php?id=<?php echo $row_listele['mesaj_id']; ?>';">Oku</button>
                          <button type="button" class="btn btn-danger btn-xs" onclick="location.href = 'ticketsil.php?Sil=<?php echo $row_listele['mesaj_id']; ?>';">Sil</button>
                       </td>
                      </tr>
                   
                   <?php } while ($row_listele = mysql_fetch_assoc($listele)); ?>  </tbody>
				  
                  </table>   <?php } // Show if recordset not empty ?>
  <?php if ($totalRows_listele == 0) { // Show if recordset empty ?>
    <p><strong>Veritabanında listelenecek kayıt bulunamadı.</strong></p>
    <?php } // Show if recordset empty ?>

        </div>    </div><!-- /.box-body -->
            
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <?php include('footer.php');  ?>

      <!-- Control Sidebar -->
   

    </div><!-- ./wrapper -->

  </body>
</html>
