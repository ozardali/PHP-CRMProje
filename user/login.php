<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon CRM Sistemleri" />
	<meta name="author" content="" />

	<link rel="icon" href="../assets/images/favicon.ico">

	<title>Neon | CRM Kullanıcı Giriş Sayfası</title>

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
<body class="page-body login-page login-form-fall" >


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
			
			<p class="description">Sayın kullanıcı, panele ulaşmak için giriş yapmalısınız!</p>
			
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
function GetIP(){
	if(getenv("HTTP_CLIENT_IP")) {
 		$ip = getenv("HTTP_CLIENT_IP");
 	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 		$ip = getenv("HTTP_X_FORWARDED_FOR");
 		if (strstr($ip, ',')) {
 			$tmp = explode (',', $ip);
 			$ip = trim($tmp[0]);
 		}
 	} else {
 	$ip = getenv("REMOTE_ADDR");
 	}
	return $ip;
}
$ip_adresi = GetIP();



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
	
	$bak=mysql_fetch_object(mysql_query("select * from u_uyeler where uye_mail='$kullanici' and uye_sifre='$sif' "));
	
	if($bak){
		$_SESSION['giris1']=1;
		$_SESSION['kadi1']= $_POST['username'];
		$_SESSION['yonet1']=4;
		echo "<center><p class='login-content'>Bilgiler doğru, giriş yapılıyor<br/></p>
<img src='../assets/images/loading@2x.gif'/></center>";

mysql_query("insert into u_girislog (giris_yapan,giris_ip,giris_durum) values ('$kullanici','$ip_adresi','1')")or die(mysql_error);
		header("refresh:2; url=index.php");

		exit();
	}
	else {
mysql_query("insert into u_girislog (giris_yapan,giris_ip,giris_durum) values ('$kullanici','$ip_adresi','0')")or die(mysql_error);
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
			header("Location: login.php");
			exit();
}
if(@$_SESSION['giris']==1){ 
		header("Location: index.php");
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
				
			
				
			</form>
			
			<div class="login-bottom-links">
				
				<a href="sifremi-unuttum.php" class="link"><i class="entypo-key"></i> Şifremi Unuttum?</a> - 	 <a href="../register.php" class="link"> <i class="entypo-user-add"></i> Hesap Oluştur</a>
				
				
				<br />
				
				<br />
				
				<a href="#">Hizmet Şartları</a>  - <a href="#">Gizlilik Sözleşmesi</a>
				
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