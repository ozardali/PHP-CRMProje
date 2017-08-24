<?php require_once("header.php"); ?>
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
              <h3 class="box-title">Şifre Değiştirme</h3>
            
            </div>
						
 <?php
			  $Duzenle = $k_adi;
if(isset($_GET['gonder'])){
	
$xxyeni_sifre=$_POST['yeni_sifre'];
$xxyeni_sifre2=$_POST['yeni_sifre2'];

if($xxyeni_sifre=="" | $xxyeni_sifre2==""){
echo '<script type="text/javascript">alert("Lütfen tüm alanları doldurun");</script>';}
else if($xxyeni_sifre!=$xxyeni_sifre2){
 echo '<script type="text/javascript">alert("Girdiğiniz şifreleri uyuşmamaktadır.");</script>';
}else{
$xxyeni_sifre = md5($xxyeni_sifre);
 echo '<script type="text/javascript">alert("Şifreniz başarıyla değiştirilmiştir. Güvenlik sebebiyle tekrar giriş yapmalısınız.");</script>';
	header("refresh:1; url=login.php?cikis");
$guncelle = mysql_query("UPDATE a_admin SET  admin_sifre ='$xxyeni_sifre'  WHERE admin_kadi = '$Duzenle'");}
}
?>
            <form role="form" method="post" action="sifre-degistir.php?gonder">
			
            <div class="box-body"><div class="col-md-6">
           <p class="help-block"><br/>** Şifrenizi değiştirirken lütfen yeni şifrenizi unutmayacağınız bir şifre seçiniz.<br/>
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

    <?php include("footer.php");  ?>

