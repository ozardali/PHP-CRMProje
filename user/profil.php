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
            <li class="active">Bilgilerim</li>
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


 
      
			  $Duzenle = $uye_tc;
			
if(isset($_GET['kaydet']))
{


 echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.success("Bilgileriniz başarıyla güncellenmiştir", "BAŞARILI");
})</script>';
 header("refresh:3; url=profil.php");

$guncelle = mysql_query("UPDATE u_uyeler SET uye_adsoyad = '$_POST[uye_adsoyad]', uye_mail = '$_POST[uye_mail]', uye_gsm = '$_POST[uye_gsm]', uye_il = '$_POST[uye_il]'  WHERE uye_tc = '$Duzenle'");}
	if(isset($Duzenle)) {
	$al	= mysql_query("SELECT * FROM u_uyeler WHERE uye_tc = '$Duzenle'");
		$al	= mysql_fetch_object($al);
		
?>
            <form role="form" method="post" action="profil.php?kaydet">
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
					
			
				<?php $uye_il = $al->uye_il; 
				?>
					<div class="form-group">
                      <label>Üye İl</label>
                      <select class="form-control" name="uye_il">
   <?php $sonuc1 = mysql_query("SELECT * FROM iller where il_id =$uye_il");
while ($satir1 = mysql_fetch_row($sonuc1)){
   echo '<option value="'.$satir1[0].'">'.$satir1[1].'</option>';
}
?></option>
   <?php $sonuc = mysql_query("SELECT * FROM iller");
while ($satir = mysql_fetch_row($sonuc)){
   echo '<option value="'.$satir[0].'">'.$satir[1].'</option>';
}
?>
</select>

                    </div>
				    <div class="form-group">
                  <label>Şifre Güncelleme (Şifrenizi değiştirmek için <a style="color:red" href="sifre-degistir.php">buraya</a> tıklayın. )</label>
                  <input type="password" class="form-control" value="<?php echo $al->uye_sifre; ?>" disabled="">
                </div>
                </form><?php } ?>
           <div class="form-group">
                  <label><a href="javascript:;" onclick="showAjaxModal();" class="btn btn-default">Resim Değiştir</a></label>
               
                </div>


          <script type="text/javascript">
function showAjaxModal()
{
jQuery('#modal-7').modal('show', {backdrop: 'static'});

}
</script>


<?php 
if(isset($_GET['resim']))
{
   if(isset($_FILES['resim']))
        {

          copy($_FILES['resim']['tmp_name'] , '../uyefoto/'.$_FILES['resim']['name']);

        }

$resimi = $_FILES['resim']['name'];

echo '<script type="text/javascript">
   $(document).ready(function() {toastr.success("Fotoğrafınız başarıyla değiştirilmiştir", "BAŞARILI");})</script>';
header("refresh:3; url=profil.php");

$guncelle2 = mysql_query("UPDATE u_uyeler SET uye_foto = '$resimi'  WHERE uye_tc = '$Duzenle'");
}
?>
  
  <!-- Modal 7 (Ajax Modal)-->
  <div class="modal fade" id="modal-7">
 <form role="form" method="post" action="profil.php?resim" enctype="multipart/form-data">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Resim Yükleme</h4>
        </div>
        
        <div class="modal-body">
        
         Lütfen resminizi seçiniz

          <input class="form-control file2 inline btn btn-primary"  data-label="<i class='glyphicon glyphicon-file'></i> Gözat" style="left: -8.25px; top: 19.5px;" type="file" name="resim">
          
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
          <button type="submit" class="btn btn-info">Resmi Değiştir</button>
        </div>
      </div>
    </div>
       </form>

  </div>

                    <div class="box-footer">
                <button type="submit" class="btn btn-primary">Düzenlemeyi Kaydet</button>
            </div><!-- /.box-footer-->
			
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



    <?php include('footer.php');  ?>

   
  </body>
</html>