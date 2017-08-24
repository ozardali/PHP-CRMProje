<?php require_once('header.php'); ?>
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Bilgi Güncelleme
            <small>bilgilerinizi düzenleyin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="#"> Kullanıcı İşlemleri</a></li>
            <li class="active">Kullanıcı Düzenle</li>
          </ol>
        </section>

          <section class="content">

              <!-- Default box -->
              <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Üye Düzenleme</h3>

                  </div>
                  <?php
                  $Duzenle = $_GET['Duzenle'];

                  if($_POST){
                      echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.success("Bilgileriniz başarıyla güncellenmiştir", "BAŞARILI");
})</script>';
                      header("refresh:1; url=kullanicilar.php");
                      $guncelle = mysql_query("UPDATE u_uyeler SET uye_adsoyad = '$_POST[uye_adsoyad]', uye_mail = '$_POST[uye_mail]', uye_gsm = '$_POST[uye_gsm]'  WHERE uye_tc = '$Duzenle'");}
                  if(isset($Duzenle)) {
                      $al	= mysql_query("SELECT * FROM u_uyeler WHERE uye_tc = '$Duzenle'");
                      $al	= mysql_fetch_object($al);

                      ?>

                      <form role="form" method="post" >
                      <div class="box-body">
                          <!-- text input -->
                          <!-- text input -->

                          <div class="form-group">
                              <label>Adı Soyadı</label>
                              <input type="text" name="uye_adsoyad" class="form-control" value="<?php echo $al->uye_adsoyad; ?>">
                          </div>
                          <div class="form-group">
                              <label>E-Mail Adresi</label>
                              <input type="text" name="uye_mail" class="form-control" value="<?php echo $al->uye_mail ?>">
                          </div>
                          <div class="form-group">
                              <label>Telefon Numarası</label> <small>Lütfen numarayı "0" koymadan yazınız.</small>
                              <input type="text" maxlength="10" name="uye_gsm" class="form-control" value="<?php echo $al->uye_gsm; ?>">
                          </div>


                          <div class="box-footer">
                              <button type="submit"  class="btn btn-primary">Düzenlemeyi Kaydet</button>
                          </div><!-- /.box-footer-->

                      </div><!-- /.box-body --></form><?php } ?>


              </div><!-- /.box -->

          </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



    <?php include('footer.php');  ?>

   
  </body>
</html>