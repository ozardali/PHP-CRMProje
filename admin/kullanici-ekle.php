<?php include("header.php"); ?>
	<ol class="breadcrumb bc-3" >
	<li><a href="index.php"><i class="fa-home"></i>Anasayfa</a></li>
	<li class="active"><a href="#">Kullanıcı Ekleme</a></li>				
	</ol>
		<h3>Yeni Kullanıcı Kaydet</h3>
			<br />
<?php
if(isset($_GET['kaydet'])){


$bul=$_POST['phone'];
$bulunacak = array('-','(',')',' '); 
$degistir  = array('','','',''); 
 
$sonuc=str_replace($bulunacak, $degistir, $bul); 

$tcno=$_POST['tckimlik']; 
$adsoyad=$_POST['name'];
$email=$_POST['email'];
$gsmno=$sonuc;
$sifre=$_POST['password'];

 
if($adsoyad=="" | $adsoyad=="" | $gsmno==""){
 echo '<script type="text/javascript">alert("Lütfen tüm alanları doldurun");</script>';
}else{

mysql_query("insert into u_uyeler (uye_tc, uye_adsoyad, uye_mail, uye_gsm,uye_sifre) values ('$tcno','$adsoyad', '$email', '$gsmno', '$sifre')")or die(mysql_error);

   
 echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.success("Kullanıcı başarıyla kaydedilmiştir", "BAŞARILI");
})</script>';
	header("refresh:3; url=kullanicilar.php");
}
}
?>
	
		
		
		<div class="row">
			<div class="col-md-4">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Kullanıcı Bilgileri
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
			<form method="POST" role="form" action="kullanici-ekle.php?kaydet" class="form-horizontal" >
			
				
				<div class="form-steps">
					
					
					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>
								
								<input type="text" class="form-control" name="name" id="name" placeholder="Adınız Soyadınız" autocomplete="off" />
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>
								
								<input type="text" class="form-control" maxlength="11" name="tckimlik" id="name" placeholder="TC Kimlik" autocomplete="off" />
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-phone"></i>
								</div>
								
								<input type="text" class="form-control" name="phone" id="phone" placeholder="Telefon Numaranız" data-mask="phone" autocomplete="off" />
							</div>
						</div>
									
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>
								
								<input type="text" class="form-control" name="email" id="email" data-mask="email" placeholder="E-mail Adresi" autocomplete="off" />
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-lock"></i>
								</div>
								
								<input type="password" class="form-control" name="password" id="password" placeholder="Şifreniz" autocomplete="off" />
							</div>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block btn-login">
								<i class="entypo-right-open-mini"></i>
								Hesabımı Oluştur
															</button>
						</div>
						
					
					
				</div>
				
			</form>
			

</div>


</div>
</div>
<div class="col-md-8">
<div class="panel minimal">
<!-- panel head -->
<div class="panel-heading"><div class="panel-title">Yeni Kullanıcı Kaydetme</div></div>
<!-- panel body -->
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane active" id="tab1">
<p>Yeni kullanıcıyı kaydederken kullanıcı ile ilgili önemli bilgileri sisteme kaydetmeniz yeterlidir.<br/>
 Kullanıcı sisteme giriş yaptığında eksik olarak diğer bilgilerini Profil Düzenleme sayfasından kendisini yapabilmektedir. </p>
		<div class="list-group">
		<a href="#" class="list-group-item active">Profil Düzenleme</a>
		<a href="#" class="list-group-item">Profil Resmi Güncelleyebilme</a>
		<a href="#" class="list-group-item">Şehir Güncelleyebilme</a>
		<a href="#" class="list-group-item">E-posta adresi Güncelleyebilme</a>
		<a href="#" class="list-group-item">Cep Telefonu Güncelleyebilme</a>
		</div>
</div>
</div>
</div>
</div>
</div>
</div>







<?php include("footer.php"); ?>