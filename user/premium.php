<?php require_once('header.php'); ?>
<div class="row">
			
			<div class="col-md-12">
			
				<div class="panel minimal minimal-gray">
					
					<div class="panel-heading">
						<div class="panel-title"><h4>VIP Kullanıcı Nedir?</h4></div>
					
					</div>
					
					<div class="panel-body">
						
						<div class="tab-content">
							<div class="tab-pane active" id="profile-1">
								<strong>CRM Rehber Sistemi VIP Kullanıcılara Sunulan Bir Servistir.</strong>
				
								<p>Siz de rehberinizi CRM sistemi üzerinde saklamak istiyorsanız "VIP Kullanıcı" olmalısınız.<br/>
								Hemen aşağıdan sipariş verin ve bu özellikten faydalanmaya başlayın. Üstelik kısa bir süreliğine 2ay ücretsiz kullanma imkanıyla!</p>
							</div>
							
						
						</div>
						
					</div>
					
				</div>
<div class="col-sm-4"></div>
						<div class="col-sm-4">
			
				<div class="tile-block tile-plum">
					
					<div class="tile-header">
						<i class="glyphicon glyphicon-star"></i>
						
						<a href="#">
							VIP Kullanıcı
							<span>Hemen VIP Olun!</span>
						</a>
					</div>
					
					<div class="tile-content">
					
						<p>VIP Kullanıcı ayrıcalıklarından faydalanmak için satın alın..</p>
						
						<ul style="list-style: none;">
						<li><i class="glyphicon glyphicon-check"></i> 1 Yıl VIP Üyelik</li>
						<li><i class="glyphicon glyphicon-check"></i> Yıldız İkonu</li>
						<li><i class="glyphicon glyphicon-check"></i> Rehber Modülünü Kullanabilme</li>
						</ul>
					</div>
				
			
				<div class="tile-title tile-red">
					
					<div class="icon">
						<i class="glyphicon glyphicon-star"></i>
					</div>
					
					<div class="title">
						<h3>Yıllık Sadece 100TL</h3>
						<p>Yıllık alımlarda 2 ay bizden!</p>
					</div>
				</div>

<?php
if(isset($_GET['kaydet'])){


 
mysql_query("insert into a_premium (pre_tc) values ('$uye_tc')")or die(mysql_error);

   
 echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.info("VIP İsteğiniz başarıyla gönderilmiştir.", "BAŞARILI");
})</script>';
	header("refresh:3; url=premium.php");
}

?>
					<form role="form" method="post" action="premium.php?kaydet" class="form-horizontal form-groups-bordered">
					<div class="tile-footer">

						<button type="submit" name="kaydet" class="btn btn-block">Satın Al</button>
					</div>
					</form>
				</div>

				<div class="col-sm-4"></div>
				
			</div>				
			</div>



			</div>









<?php include("footer.php"); ?>