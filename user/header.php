<?php
require_once("../veri/ayar.php");
if($_SESSION['yonet1']=="")
	{
	header("Location: login.php"); exit(); 
	}
$k_adi = $_SESSION['kadi1'];
$kullanici = mysql_query("select * from u_uyeler where uye_mail='$k_adi'");
while ($kullanici1 = mysql_fetch_row($kullanici,MYSQL_BOTH)){
$kullanici_a = $kullanici1['uye_adsoyad'];
$kullanici_foto = $kullanici1['uye_foto'];
$uye_tc = $kullanici1['uye_tc'];
$uye_mail = $kullanici1['uye_mail'];
$uyetip = $kullanici1['uye_tip'];
}
if(! $kullanici){ header("location: index.php"); exit(); }



?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="../assets/images/favicon.ico">

	<title>Neon | Dashboard</title>

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
<body class="page-body  page-fade" onLoad="show_loading_bar(100);">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

<?php include("menu.php"); ?>

	<div class="main-content">

		<div class="row">

			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">

				<ul class="user-info pull-left pull-none-xsm">

					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="../uyefoto/<?Php echo $kullanici_foto;?>" alt="" class="img-circle" width="44" />
							<?php echo $kullanici_a; ?>
						</a>

						<ul class="dropdown-menu">

							<!-- Reverse Caret -->
							<li class="caret"></li>

							<!-- Profile sub-links -->
							<li>
								<a href="profil.php">
									<i class="entypo-user"></i>
									Profili düzenle
								</a>
							</li>

							<li>
								<a href="mesajlar.php">
									<i class="entypo-mail"></i>
									Mesajlar
								</a>
							</li>



							<li>
							<?php 
if(isset($_GET['cerezsil'])){
setcookie("item", "", time()-3600);
setcookie("item[1]", "", time()-3600);
setcookie("item[2]", "", time()-3600);
setcookie("item[3]", "", time()-3600);
setcookie("item[4]", "", time()-3600);
 echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.success("Tüm çerezler başarıyla silinmiştir", "BAŞARILI");
})</script>';
header("refresh:3; url=index.php");
}

							?>
								<form name="cerezsilme" method="post" action="index.php?cerezsil">
								<button type="cerezsil" name="cerezsil"class="btn btn-danger btn-block btn-login">
								<i class="entypo-cancel"></i>
								Çerezleri Sil
															</button>
															</form>
								
							</li>
						</ul>
					</li>

				</ul>
			<ul class="user-info pull-left pull-right-xs pull-none-xsm">

					<!-- Raw Notifications -->

					<li class="notifications dropdown">
					<?php if($uyetip != "1")
					{

	echo'<a href="premium.php" class="btn btn-red btn-icon btn-lg" style="color:#fff;">
								VIP Olun
							<i class="entypo-star"></i>
							</a>';
					
						
					}
					else {
						echo '<a class="btn btn-success btn-icon btn-lg" style="color:#fff;">VIP Üye 	<i class="entypo-star"></i></a>';
						}


						
$query = mysql_query("SELECT * FROM a_premium where pre_tc = '$uye_tc'");	
$numrows = mysql_num_rows($query);

if($numrows == "1") {

 	echo '<a class="btn btn-success btn-icon btn-lg" style="color:#fff;">VIP Üye başvurusu beklemede.	<i class="entypo-star"></i></a>';

}
else
{

}


?>
						</li></ul>
					
			

			</div>


			<!-- Raw Links -->
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">

				<ul class="list-inline links-list pull-right">

					<!-- Language Selector -->
					<li class="dropdown language-selector">

						Dil: &nbsp;
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
							<img src="../assets/images/flags/flag-uk.png" width="16" height="16" />
						</a>

						<ul class="dropdown-menu pull-right">
							<li>
								<a href="#">
									<img src="../assets/images/flags/flag-de.png" width="16" height="16" />
									<span>Deutsch</span>
								</a>
							</li>
							<li class="active">
								<a href="#">
									<img src="../assets/images/flags/flag-uk.png" width="16" height="16" />
									<span>English</span>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="../assets/images/flags/flag-fr.png" width="16" height="16" />
									<span>François</span>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="../assets/images/flags/flag-al.png" width="16" height="16" />
									<span>Shqip</span>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="../assets/images/flags/flag-es.png" width="16" height="16" />
									<span>Español</span>
								</a>
							</li>
						</ul>

					</li>

					<li class="sep"></li>


					<li>
						<a href="#" data-toggle="chat" data-collapse-sidebar="1">
							<i class="entypo-chat"></i>
							Sohbet

							<span class="badge badge-success chat-notifications-badge is-hidden">0</span>
						</a>
					</li>

					<li class="sep"></li>

					<li>
						<a href="login.php?cikis">
							Güvenli Çıkış <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>

			</div>

		</div>

		<hr />
