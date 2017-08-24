<?php require_once('header.php'); ?>
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
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Rehber Yönetimi
                <small>VIP Özel*</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
                <li><a href="#"> Rehber Yönetimi </a></li>
                <li class="active">Rehberim</li>
            </ol>
        </section>




        <a href="rehber-ekle.php" style="float:right;" class="btn btn-success btn-sm btn-icon icon-left">
            <i class="entypo-plus"></i>
            Rehbere Kayıt Ekle
        </a>
            <?php
            $say = 0;
            echo "<h3>Rehberim</h3>
<br />";

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


            <br />


        </div>


    <script src="../assets/js/datatables/datatables.js"></script>
    <script src="../assets/js/select2/select2.min.js"></script>
<?php include("footer.php"); ?>