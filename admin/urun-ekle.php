<?php include("header.php"); ?>
	<ol class="breadcrumb bc-3" >
	<li><a href="index.php"><i class="fa-home"></i>Anasayfa</a></li>
	<li class="active"><a href="#">Sipariş Modülü</a></li>
	</ol>
		<h3>Yeni Ürün Ekle</h3>
			<br />
<?php
if(isset($_GET['kaydet'])){


    $fnm = $_FILES["resim"]["name"];
    $dst="../urunresim/".$fnm;

    move_uploaded_file($_FILES["resim"]["tmp_name"],$dst);

$urunadi=$_POST['urunadi'];
$urunaciklama=$_POST['urunaciklama'];
$urunmiktar=$_POST['urunmiktar'];
$urunfiyat=$_POST['urunfiyat'];

 
if($urunadi=="" | $urunfiyat=="" | $urunaciklama==""){
 echo '<script type="text/javascript">alert("Lütfen tüm alanları doldurun");</script>';
}else{

mysql_query("insert into urunler (urun_adi, urun_aciklama, urun_miktari, urun_fiyati,urun_resim) values ('$urunadi','$urunaciklama', '$urunmiktar', '$urunfiyat', '$fnm')")or die(mysql_error);

   
 echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.success("Ürün başarıyla kaydedilmiştir", "BAŞARILI");
})</script>';
	header("refresh:3; url=urunler.php");
}
}
?>
	
		
		
		<div class="row">
			<div class="col-md-6">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Ürün Bilgileri
						</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>

							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
                        <form role="form" method="post" action="urun-ekle.php?kaydet" class="form-horizontal" enctype="multipart/form-data" >
			
				
				<div class="form-steps">
					
					
					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-list"></i>
								</div>
								
								<input type="text" class="form-control" name="urunadi" id="urunadi" placeholder="Ürün Adı" autocomplete="off" />
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-list"></i>
								</div>

                                <textarea class="form-control" name="urunaciklama" placeholder="Ürün Açıklaması" rows="3"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-plus"></i>
								</div>
								
								<input type="text" class="form-control" name="urunmiktar" id="urunmiktar" placeholder="Ürün Miktarı" autocomplete="off" />
							</div>
						</div>
									
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-credit-card"></i>
								</div>
								
								<input type="text" class="form-control" name="urunfiyat" id="urunfiyat" placeholder="Ürün Fiyatı" autocomplete="off" />
							</div>
						</div>

                    <div class="form-group">
                       <input class="form-control file2 inline btn btn-default"  data-label="<i class='entypo-picture'></i>  Ürüne Resim Ekle"  type="file" name="resim">

                    </div>


                    <script type="text/javascript">
                        function showAjaxModal()
                        {
                            jQuery('#modal-7').modal('show', {backdrop: 'static'});

                        }
                    </script>


						
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block btn-login">
								<i class="entypo-basket"></i>
								Ürün Ekle
															</button>
						</div>
						
					
					
				</div>
				
			</form>
			

</div>


</div>
</div>
<div class="col-md-6">
<div class="panel minimal">
<!-- panel head -->
<div class="panel-heading"><div class="panel-title">Yeni Ürün Ekleme</div></div>
<!-- panel body -->
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane active" id="tab1">
<p>Yeni ürün kaydederken ürün ile ilgili önemli bilgilerin tamamını sisteme kaydetmeniz gereklidir.<br/>
 </p>
		<div class="list-group">
		<a href="#" class="list-group-item active">Ürün Ekleme Detayları</a>
		<a href="#" class="list-group-item">Ürün Adı</a>
		<a href="#" class="list-group-item">Ürün Açıklaması</a>
		<a href="#" class="list-group-item">Ürünün Miktarı</a>
		<a href="#" class="list-group-item">Ürünün Adet Fiyatı</a>
		<a href="#" class="list-group-item">Ürünün Görseli</a>
		</div>
</div>
</div>
</div>
</div>
</div>
</div>







<?php include("footer.php"); ?>