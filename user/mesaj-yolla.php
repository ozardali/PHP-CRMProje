<?php require_once('header.php'); ?>
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              Ticket Gönder
            <small>Ticket Gönderin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="#">Ticket İşlemleri</a></li>
            <li class="active">Ticket Yolla</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Ticket Gönderme</h3>

            </div>
			
			
<?php
if(isset($_GET['gonder'])){

$msj_sahibi=$uye_tc;
$msj_baslik=$_POST['msj_baslik'];
$msj_icerik=$_POST['msj_icerik'];
 
if($msj_baslik=="" | $msj_icerik==""){
 echo '<script type="text/javascript">alert("Lütfen tüm alanları doldurun");</script>';
}else{

mysql_query("insert into a_mesajlar (mesaj_sahibi, mesaj_baslik, mesaj_icerik) values ('$msj_sahibi','$msj_baslik','$msj_icerik')")or die(mysql_error);

    echo '<script type="text/javascript">
   $(document).ready(function() {
  toastr.success("Ticket başarıyla gönderildi.", "BAŞARILI");
})</script>';
	header("refresh:2; url=mesajlar.php");
}
}
?>
	<form role="form" method="post" action="mesaj-yolla.php?gonder">
            <div class="box-body">
           <!-- text input -->
					 <div class="form-group">
                      <label>Ticket Başlığı</label>
                      <input type="text" name="msj_baslik" class="form-control" placeholder="Ticket Başlığı">
                    </div>
               <div class="form-group">
                  <label>Ticket İçeriği</label>
                  <textarea class="form-control" name="msj_icerik" rows="3" placeholder="İçerik ..."></textarea>
                </div>
            <div class="box-footer">
             <button type="submit" class="btn btn-primary">Ticket Yolla</button>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
  </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <?php include('footer.php');  ?>

      <!-- Control Sidebar -->
   
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->


  </body>
</html>
