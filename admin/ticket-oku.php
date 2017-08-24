<?php require_once('header.php'); ?>
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Ticketlar
            <small>Bu sayfadan ticketları okuyabilirsiniz.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="ticketlar.php">Ticketlar</a></li>
            <li class="active">Ticket Oku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<div class="row">
            <div class="col-md-3">
              
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Klasörler</h3>

                </div>
                <div class="box-body no-padding" style="display: block;">
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
			  $Duzenle = $_GET['id']; 
			  $al	= mysql_query("SELECT * FROM a_mesajlar WHERE mesaj_id = '$Duzenle'");
			  $guncelle = mysql_query("UPDATE a_mesajlar SET mesaj_durumu ='1'  WHERE mesaj_id = '$Duzenle'");
	
		$al	= mysql_fetch_object($al);
			  ?>
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Konu: <?php echo $al->mesaj_baslik; ?></h3>

                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-read-info"> <?php $no = $al->mesaj_sahibi; ?>
                    <h3>Yazan: <?php echo $al->mesaj_sahibi; ?> (<?php $sonuc1 = mysql_query("SELECT uye_adsoyad FROM u_uyeler where uye_tc =$no");
while ($satir1 = mysql_fetch_row($sonuc1)){
   echo $satir1[0];
}
?>)</h3>
                   <span class="mailbox-read-time pull-right"><?php echo $al->mesaj_tarih; ?></span></h5>
				
                  </div><!-- /.mailbox-read-info -->
                
                  <div class="mailbox-read-message">
                   <p><?php echo $al->mesaj_icerik; ?><br></p>
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->
               
                <div class="box-footer">
			 <button class="btn btn-default" onclick="yazdir()"><i class="fa fa-print"></i> Yazdır</button>
			 <button class="btn btn-default" onclick="location.href = 'ticketsil.php?Sil=<?php echo $al->mesaj_id; ?>';"><i class="fa fa-trash-o"></i> Sil</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <?php include('footer.php');  ?>
<script>
function yazdir() {
    window.print();
}
</script>


    </div><!-- ./wrapper -->


  </body>
</html>
