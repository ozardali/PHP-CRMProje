<?php require_once('header.php'); ?>
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Şifre Değiştirme Sayfası
            <small>şifrenizi değiştirin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="#"> Üye İşlemleri</a></li>
            <li class="active">Şifre Değiştirme</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Şifre değiştirme</h3>
              
            </div>
						
 <?php
			  $Duzenle = $uye_tc;
if(isset($_GET['gonder']))
{
	
$xxyeni_sifre=$_POST['yeni_sifre'];
$xxyeni_sifre2=$_POST['yeni_sifre2'];

if($xxyeni_sifre=="" | $xxyeni_sifre2=="")
{
echo '<script type="text/javascript">
   $(document).ready(function() {
  toastr.info("Lütfen tüm alanları doldurunuz.", "HATA");
})</script>';
}
else if($xxyeni_sifre!=$xxyeni_sifre2)
{
echo '<script type="text/javascript">
   $(document).ready(function() {

    toastr.error("Girdiğiniz şifreler uyuşmamaktadır.", "HATA");
})</script>';
}
else
{
echo '<script type="text/javascript">
   $(document).ready(function() {
  toastr.success("Şifreniz başarıyla değiştirildi, güvenlik için tekrar giriş yapmalısınız.", "BAŞARILI");
})</script>';
	header("refresh:3; url=login.php?cikis");
$guncelle = mysql_query("UPDATE u_uyeler SET  uye_sifre ='$xxyeni_sifre'  WHERE uye_tc = '$Duzenle'");

}
}
?>
            <form role="form" method="post" action="sifre-degistir.php?gonder">
			
            <div class="box-body"><div class="col-md-6">
           <p class="help-block">** Şifrenizi değiştirirken lütfen yeni şifrenizi unutmayacağınız bir şifre seçiniz.<br/>
		  * Büyük, küçük harf yazımına dikkat ediniz.<br/> **** ( ;,:.-_()%^&+!{}?@ ) gibi özel karakterler kullanmayınız.</p>
					<div class="form-group">
                      <label>Yeni şifreniz:</label>
                      <input type="password" name="yeni_sifre" class="form-control" value="">
                    </div>
					<div class="form-group">
                      <label>Yeni şifrenizi tekrar girin:</label>
                      <input type="password" name="yeni_sifre2" class="form-control" value="">
                    </div>
			 
			
          
			     
                <button type="submit" style="float:right"  class="btn btn-danger">Şifreyi Değiştirmeyi Onaylıyorum. <i class="fa fa-check"></i></button>
           </div>
			  </div><!-- /.box-body -->
      </form>
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <?php include('footer.php');  ?>

      <!-- Control Sidebar -->

    </div><!-- ./wrapper -->

  </body>
</html>
