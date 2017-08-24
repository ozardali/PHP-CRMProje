<?php include ("header.php"); ?>
     <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Profil Düzenleme
            <small>Bilgilerinizi buradan düzenleyebilirsiniz</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="#">Kullanıcı İşlemleri</a></li>
            <li class="active">Bilgi Güncelleme</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bilgilerim</h3>
            
            </div>
      <?php

      if($_POST){
          echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.success("Bilgileriniz başarıyla güncellenmiştir", "BAŞARILI");
})</script>';
          header("refresh:1; url=profil-duzenle.php");
          $guncelle = mysql_query("UPDATE a_admin SET name_surname = '$_POST[admin_name]', admin_mail = '$_POST[admin_mail]', admin_gsm = '$_POST[admin_gsm]'  WHERE admin_kadi = '$k_adi'");}
      $al = mysql_query("SELECT * FROM a_admin WHERE admin_kadi = '$k_adi'");
    $al = mysql_fetch_object($al);
    
?>
       <form role="form" method="post" >
            <div class="box-body">
      <div class="form-group">
                      <label>Ad Soyad</label>
                      <input type="text" name="admin_name" class="form-control" value="<?php echo $al->name_surname; ?>">
                    </div>
     <div class="form-group">
                      <label>GSM Numaranız</label>
                      <input type="text" name="admin_gsm" class="form-control" value="<?php echo $al->admin_gsm; ?>">
                    </div>
                      <div class="form-group">
                      <label>E-Mail Adresi</label>
                      <input type="text" name="admin_mail" class="form-control" value="<?php echo $al->admin_mail ?>">
                    </div>
                <div class="form-group">
                      <label>Şifreniz (Şifrenizi değiştirmek için <a style="color:red;text-decoration:underline" href="sifre-degistir.php">buraya</b></a> tıklayın. )</label>
                      <input type="text" name="admin_sifre" class="form-control" value="<?php echo $al->admin_sifre; ?>" disabled>
                    </div>
              
      
       <div class="box-footer">
                <button type="submit"  class="btn btn-primary">Düzenlemeyi Kaydet</button>
            </div><!-- /.box-footer-->
      
            </div><!-- /.box-body --></form>
         
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <?php include('footer.php');  ?>

