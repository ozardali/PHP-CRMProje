<?php require_once('header.php'); ?>
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
              Ticket Yaz
            <small>Üyelere ticket yollayın</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="#">Ticket İşlemleri</a></li>
            <li class="active">Ticket Yaz</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Ticket Yaz</h3>

            </div>
        
<?php
if(isset($_GET['gonder'])){

$msj_giden = $_POST['msj_uye'];
$msj_baslik=$_POST['msj_baslik'];
$msj_icerik=$_POST['msj_icerik'];
 
if($msj_baslik=="" | $msj_icerik==""){
 echo '<script type="text/javascript">alert("Lütfen tüm alanları doldurun");</script>';
}else{

mysql_query("insert into u_mesajlar (mesaj_giden, mesaj_baslik, mesaj_icerik) values ('$msj_giden','$msj_baslik','$msj_icerik')")or die(mysql_error);

    echo '<script type="text/javascript">alert("'.$msj_baslik.' başlıklı mesajınız başarıyla gönderildi.");</script>';
	header("refresh:1; url=ticket-yaz.php");
}
}
?>

	<form role="form" method="post" action="ticket-yaz.php?gonder">
            <div class="box-body">
			<div class="form-group">
                  <label>Gönderilecek Üye Seçin</label>
                   <select class="form-control" name="msj_uye">
  
   <?php $sonuc = mysql_query("SELECT uye_adsoyad, uye_tc FROM u_uyeler");
while ($satir = mysql_fetch_row($sonuc,MYSQL_BOTH)){
   echo '<option value="'.$satir[uye_tc].'">'.$satir[uye_adsoyad].'</option>';
}
?>
</select>
                </div>
           <!-- text input -->
					 <div class="form-group">
                      <label>Ticket Başlığı</label>
                      <input type="text" name="msj_baslik" class="form-control" placeholder="Ticket Başlığı">
                    </div>
               <div class="form-group">
                  <label>Mesajınız</label>
                  <textarea class="form-control" name="msj_icerik" rows="3" placeholder="Mesajınız ..."></textarea>
                </div>
            <div class="box-footer">
             <button type="submit" class="btn btn-primary">Ticket Yolla</button>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
  </form>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <?php include('footer.php');  ?>


    </div><!-- ./wrapper -->

  </body>
</html>
