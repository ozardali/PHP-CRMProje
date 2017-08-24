<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="../assets/images/favicon.ico">

	<title>Neon | CRM Admin Giriş Sayfası</title>

	<link rel="stylesheet" href="../assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="../assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/neon-core.css">
	<link rel="stylesheet" href="../assets/css/neon-theme.css">
	<link rel="stylesheet" href="../assets/css/neon-forms.css">
	<link rel="stylesheet" href="../assets/css/custom.css">

	<script src="../assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>


<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="../" class="logo">
				<img src="../assets/images/logo@2x.png" width="120" alt="" />
			</a>
			
			<p class="description">Sayın yetkili, panele ulaşmak için giriş yapmalısınız!</p>
			
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

	<?php	require_once '../veri/ayar.php';

if(!isset($_SESSION))
{
session_start();
}

ob_start();
if(isset($_POST['gir'])){

	$sif  = $_POST['password'];
	$sif = mysql_real_escape_string($sif);
	$sifre = md5($sif);
	$kull = $_POST['username'];
	$kullanici = mysql_real_escape_string($kull);

		if($sif=="" and $kullanici==""){
		echo '<script>alert("Boş alan bırakmayın !");location.href="login.php";</script>';
				exit();	
	}
	
	$bak=mysql_fetch_object(mysql_query("select * from a_admin where admin_kadi='$kullanici' and admin_sifre='$sifre' "));
	
	if($bak){
		$_SESSION['giris']=1;
		$_SESSION['kadi']= $_POST['username'];
		$_SESSION['yonet']=4;
		echo "<center><p class='login-content'>Bilgiler doğru, giriş yapılıyor<br/></p>
<img src='../assets/images/loading@2x.gif'/></center>";
		header("refresh:2; url=index.php");
		exit();
	}
	else {
				echo '<script>alert("Böyle bir kullanıcı kaydı bulunmamaktadır !");location.href="login.php";</script>';
				exit();	
	}
	
exit();}

if(isset($_GET['cikis'])){

			$_SESSION['giris']='';
			$_SESSION['yonet']='';	
			$_SESSION['kadi']='';
			$_SESSION['status']='';			
			session_destroy();
			header("location: login.php");
			exit();
}
if(@$_SESSION['giris']==1){ 
		header("location: index.php");
exit(); }

?>
	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
			</div>
			
			<form method="post" role="form" id="form_login">
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="username" id="username" placeholder="Kullanıcı Adı" autocomplete="off" />
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="password" id="password" placeholder="Şifre" autocomplete="off" />
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" name="gir" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Giriş Yap
					</button>
				</div>
				
				<!-- Implemented in v1.1.4 -->
				<div class="form-group">
					<em>- ya da -</em>
				</div>
				
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left facebook-button">
						Facebook ile oturum açın
						<i class="entypo-facebook"></i>
					</button>
					
				</div>
				
				<!-- 
				
				You can also use other social network buttons
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left twitter-button">
						Login with Twitter
						<i class="entypo-twitter"></i>
					</button>
					
				</div>
				
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">
						Login with Google+
						<i class="entypo-gplus"></i>
					</button>
					
				</div> -->
				
			</form>
			
			
			<div class="login-bottom-links">
				
				<a href="extra-forgot-password.html" class="link">Şifremi Unuttum?</a>
				
				<br />
				
				<a href="#">Hizmet Şartları</a>  - <a href="#">Gizlilik Politikası</a>
				
			</div>
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom scripts (common) -->
	<script src="../assets/js/gsap/TweenMax.min.js"></script>
	<script src="../assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/joinable.js"></script>
	<script src="../assets/js/resizeable.js"></script>
	<script src="../assets/js/neon-api.js"></script>
	<script src="../assets/js/jquery.validate.min.js"></script>
	<script src="../assets/js/neon-login.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="../assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="../assets/js/neon-demo.js"></script>

</body>
</html>