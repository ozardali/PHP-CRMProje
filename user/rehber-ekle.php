<?php include("header.php"); ?>
<?php if($uyetip !=1)
{

    echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.error("Bu sayfaya girişe yetkili değilsiniz.", "HATA");
})</script>';
    header("refresh:1; url=index.php");
    ?>
    <style>
        .content-wrapper{
            visibility: hidden;}
    </style>
    <?php

}
?>
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


    $adsoyad=$_POST['name'];
    $email=$_POST['email'];
    $gsmno=$sonuc;



 
if($adsoyad=="" | $adsoyad=="" | $gsmno==""){
 echo '<script type="text/javascript">alert("Lütfen tüm alanları doldurun");</script>';
}else{

mysql_query("insert into u_rehber (rehber_tc, rehber_adsoyad, rehber_gsm, rehber_mail) values ('$uye_tc','$adsoyad', '$gsmno','$email')")or die(mysql_error);

   
 echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.success("Kullanıcı  başarıyla kaydedilmiştir", "BAŞARILI");
})</script>';
	header("refresh:3; url=rehber-ekle.php");
}
}
?>


    <div class="col-md-12">

			<div class="col-md-4">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Rehber Kayıt
						</div>
						
						<div class="panel-options">
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>

							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
			<form method="POST" role="form" action="rehber-ekle.php?kaydet" class="form-horizontal" >
			
				
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
							<button type="submit" class="btn btn-success btn-block btn-login">
								<i class="entypo-right-open-mini"></i>
								Rehbere Ekle
															</button>
						</div>
						
					
					
				</div>
				
			</form>
			

</div>


</div>
</div>
<div class="col-md-8">
    <?php
    $say = 0;

    $query_listele = "SELECT * FROM u_rehber where rehber_tc = $uye_tc order by id";
    $listele = mysql_query($query_listele);
    $row_listele = mysql_fetch_assoc($listele);
    $totalRows_listele = mysql_num_rows($listele);

    ?>
    <style>.dataTables_filter{float:Right;}</style>
    <?php $sayi=0; if ($totalRows_listele > 0) { // Show if recordset not empty ?>
        <script type="text/javascript">
            jQuery( document ).ready( function( $ ) {
                var $table3 = jQuery("#table-3");

                var table3 = $table3.DataTable( {
                    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Hepsi"]]
                } );

                // Initalize Select Dropdown after DataTables is created
                $table3.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                    minimumResultsForSearch: -1
                });

                // Setup - add a text input to each footer cell
                $( '#table-3 tfoot th' ).each( function () {
                    var title = $('#table-3 thead th').eq( $(this).index() ).text();
                    $(this).html( '<input type="text" class="form-control" placeholder="' + title + ' Ara" /> ' );
                } );

                // Apply the search
                table3.columns().every( function () {
                    var that = this;

                    $( 'input', this.footer() ).on( 'keyup change', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            } );
        </script>

        <table class="table table-bordered datatable" id="table-3">
            <thead>
            <tr class="replace-inputs">
                <th>Rehber Sıra</th>
                <th>Ad Soyad</th>
                <th>E-Mail Adresi</th>
                <th>GSM Numarası</th>
                <th>Kayıt Tarihi</th>
                <th>Rehber İşlemleri</th>
            </tr>
            </thead>
            <tbody><?php do {

                $sayi=$sayi+1;

                $say = $say+1;
                $kalan=$sayi%2;
                if ($kalan=='0') { $renk="#f9f9f9"; }
                else { $renk="#ffffff";}



                ?>


                <tr class="even gradeA">

                    <td align="center"><?php echo $say; ?></td>
                    <td align="center"><?php echo $row_listele['rehber_adsoyad']; ?> </td>
                    <td align="center"><?php echo $row_listele['rehber_mail']; ?></td>
                    <td  align="center"><?php echo $row_listele['rehber_gsm']; ?></td>


                    <td><?php echo $row_listele['rehber_tarih']; ?></td>
                    <td align="center">

                        <a href="rehber-sil.php?Sil=<?php echo $row_listele['id']; ?>" class="btn btn-danger btn-sm btn-icon icon-left">
                            <i class="entypo-cancel"></i>Kaydı Sil </a>
                    </td>
                </tr>

            <?php } while ($row_listele = mysql_fetch_assoc($listele)); ?>
            </tbody>
            <tfoot>
            <tr class="replace-inputs">
                <th>Rehber Sıra</th>
                <th>Ad Soyad</th>
                <th>E-Mail Adresi</th>
                <th>GSM Numarası</th>
                <th>Kayıt Tarihi</th>
                <th>Rehber İşlemleri</th>
            </tr>
            </tfoot>
        </table> <?php mysql_free_result($listele);  ?>
    <?php } // Show if recordset not empty ?>
    <?php if ($totalRows_listele == 0) { // Show if recordset empty ?>
        <p><strong>Veritabanında listelenecek kayıt bulunamadı</strong></p>
    <?php } // Show if recordset empty ?>


</div>


            <script src="../assets/js/datatables/datatables.js"></script>
            <script src="../assets/js/select2/select2.min.js"></script>



</div>







<?php include("footer.php"); ?>