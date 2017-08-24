<?php include("header.php"); ?>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Sipariş Listesi</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
                <li><a href="#"> Sipariş Alanı </a></li>
                <li class="active">Siparişler</li>
            </ol>
        </section>





        <?php

        echo "<h3>Siparişler</h3>
<br />";

        $query_listele = "SELECT * FROM u_siparisler order by siparis_id";
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
                    <th>Sipariş ID</th>
                    <th>Ad Soyad</th>
                    <th>Sipariş Edilen Ürün</th>
                    <th>Adres Bilgisi</th>
                    <th>Kargo Şehri</th>
                    <th>Posta Kodu</th>
                    <th>Sipariş Tarihi</th>
                    <th>Rehber İşlemleri</th>
                </tr>
                </thead>
                <tbody><?php do {

                    $sayi=$sayi+1;


                    $kalan=$sayi%2;
                    if ($kalan=='0') { $renk="#f9f9f9"; }
                    else { $renk="#ffffff";}

                $query_adsoyad= mysql_query("Select uye_adsoyad from u_uyeler where uye_tc=$row_listele[siparis_veren]");
                    $query_iller= mysql_query("Select il_adi from iller where il_id=$row_listele[siparis_il]");
                    $query_urun= mysql_query("Select urun_adi from urunler where urun_id=$row_listele[siparis_urunid]");
                    while($oku = mysql_fetch_assoc($query_adsoyad) and $il = mysql_fetch_assoc($query_iller)and $urunad = mysql_fetch_assoc($query_urun))
                {


                    ?>


                    <tr class="even gradeA">

                        <td align="center"><?php echo $row_listele['siparis_id']; ?> </td>
                        <td align="center"><?php echo $row_listele['siparis_veren']; ?>  - <?php echo $oku['uye_adsoyad'];  ?>  </td>
                        <td align="center"><?php echo $row_listele['siparis_urunid']; ?> - <?php echo $urunad['urun_adi'];  ?></td>
                        <td  align="center"><?php echo $row_listele['siparis_adres']; ?></td>
                        <td  align="center"><?php echo $row_listele['siparis_il']; ?> - <?php echo $il['il_adi']; }?> </td>
                        <td  align="center"><?php echo $row_listele['siparis_postakod']; ?></td>


                        <td><?php echo $row_listele['tarih']; ?></td>
                        <td align="center">


                            <a href="siparis-sil.php?Sil=<?php echo $row_listele['siparis_id']; ?>" class="btn btn-danger btn-sm btn-icon icon-left">
                                <i class="entypo-cancel"></i>Kaydı Sil </a>
                        </td>
                    </tr>

                <?php  } while ($row_listele = mysql_fetch_assoc($listele)); ?>
                </tbody>
                <tfoot>
                <tr class="replace-inputs">
                    <th>Sipariş ID</th>
                    <th>Ad Soyad</th>
                    <th>Sipariş Edilen Ürün</th>
                    <th>Adres Bilgisi</th>
                    <th>Kargo Şehri</th>
                    <th>Posta Kodu</th>
                    <th>Sipariş Tarihi</th>
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