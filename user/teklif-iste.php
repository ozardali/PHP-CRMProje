<?php require_once('header.php'); ?>


<ol class="breadcrumb bc-3"> <li> <a href="index.php"><i class="fa-home"></i>Neon CRM </a> </li> <li> <a href="#">Kullanıcı</a> </li> <li class="active"> <strong>Teklif İste</strong> </li> </ol>


<?php
if(isset($_GET['kaydet'])){



$projead=$_POST['projead'];
$projeicerik=$_POST['projeicerik'];

 
if($projead=="" | $projeicerik==""){
 echo '<script type="text/javascript">alert("Lütfen tüm alanları doldurun");</script>';
}else{

mysql_query("insert into a_teklif (proje_sahip, proje_ad, proje_icerik) values ('$uye_tc','$projead', '$projeicerik')")or die(mysql_error);

   
 echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.success("Teklif başarıyla gönderilmiştir", "BAŞARILI");
})</script>';
	header("refresh:3; url=teklif-iste.php");
}
}
?>
	
<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Teklif Formu
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
						
						<form role="form" method="post" action="teklif-iste.php?kaydet" class="form-horizontal form-groups-bordered">
							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label">Teklif Sahibi</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-2" placeholder="<?Php echo $uye_tc;?>" disabled="">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Proje Adı</label>
								
								<div class="col-sm-5">
									<input type="text" name="projead" class="form-control" id="field-1" placeholder="Buraya proje adını yazınız">
								</div>
							</div>
							
					
							
					
							
							<div class="form-group">
								<label for="field-ta" class="col-sm-3 control-label">Proje hakkında bilgi verin:</label>
								
								<div class="col-sm-5">
									<textarea name="projeicerik" class="form-control autogrow" id="field-ta" placeholder="Buraya projenizi anlatan bir metin yazınız.." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 48px;"></textarea>
								</div>
							</div>
						
						
					
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" name="kaydet" class="btn btn-default">İstek Gönder</button>
								</div>
							</div>
						</form>
						
					</div>
				
				</div>


<?php include("footer.php"); ?>