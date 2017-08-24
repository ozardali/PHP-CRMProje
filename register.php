<?php require_once('veri/ayar.php'); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="admin/assets/images/favicon.ico">

	<title>Neon CRM | Kayıt Sayfası</title>

	<link rel="stylesheet" href="admin/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="admin/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="admin/assets/css/neon-core.css">
	<link rel="stylesheet" href="admin/assets/css/neon-theme.css">
	<link rel="stylesheet" href="admin/assets/css/neon-forms.css">
	<link rel="stylesheet" href="admin/assets/css/custom.css">

	<script src="admin/assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-form-fall" >


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>
	
<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="index.php" class="logo">
				<img src="admin/assets/images/logo@2x.png" width="120" alt="" />
			</a>
			
			<p class="description">Hemen ücretsiz hesabınızı 30 saniyede oluşturun!</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
					
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

    echo '<script type="text/javascript">alert("'.$adsoyad.' başarıyla kayıt edildi, giriş yapabilirsiniz.");</script>';
	header("refresh:1; url=user/login.php");
}
}
?>
			<form method="POST" role="form" action="register.php?kaydet" class="form-horizontal" >
			
				
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
								
								<input type="text" class="form-control" name="tckimlik" id="name" placeholder="TC Kimlik" autocomplete="off" />
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
			
			
			<div class="login-bottom-links">
				
				<a href="user" class="link">
					<i class="entypo-lock"></i>
					Giriş Sayfasına Dön
				</a>
				
				<br />
				
				<a href="#">Hizmet Şartları</a>  - <a href="#">Gizlilik Sözleşmesi</a>
				
			</div>
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom scripts (common) -->
	<script src="admin/assets/js/gsap/TweenMax.min.js"></script>
	<script src="admin/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="admin/assets/js/bootstrap.js"></script>
	<script src="admin/assets/js/joinable.js"></script>
	<script src="admin/assets/js/resizeable.js"></script>
	<script src="admin/assets/js/neon-api.js"></script>
	<script src="admin/assets/js/jquery.validate.min.js"></script>
	<script src="admin/assets/js/neon-register.js"></script>
	<script src="admin/assets/js/jquery.inputmask.bundle.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="admin/assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="admin/assets/js/neon-demo.js"></script>

</body>
</html>