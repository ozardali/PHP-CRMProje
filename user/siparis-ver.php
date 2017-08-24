<?php require_once('header.php'); ?>

<ol class="breadcrumb bc-3"> <li> <a href="index.php"><i class="fa-home"></i>Neon CRM </a> </li> <li> <a href="#">Sipariş İşlemi</a> </li> <li class="active"> <strong>Sipariş Sayfası</strong> </li> </ol>

		<div class="row">
			<div class="col-md-12">
                <div class="panel-heading">
                    <div class="panel-title">
                        Sipariş Sayfası
                    </div>


                </div>
                <table id="example2" class="table table-bordered table-hover">
                    <?php
                    $d=0;
                    if(is_array($_COOKIE['item']))
                    {
                        $d=$d+1;
                    }
                    if($d==0)
                    {
                        echo "Sepette veri bulunamadı.";
                        echo "<br><br><br><br>";
                    }
                    else
                    {
                    ?>
                    <thead>
                    <tr >
                        <th><center>Ürün Kodu</th>
                        <th><center>Ürün Resmi</th>
                        <th><center>Ürün Adı</th>
                        <th><center>Birim Fiyat</th>
                        <th><center>Sepetteki Miktar</th>
                        <th><center>Toplam Fiyat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($_COOKIE['item'] as $name1 => $value)
                    {
                        $values11=explode("__",$value);
                        ?>
                        <tr style="font-size:18px">
                            <td align="center" >
                                <?php echo $values11[0];?>
                            </td>
                            <td  align="center">

                                <img src="../urunresim/<?php echo $values11[1];?>" alt="" width="100" height="50px">
                            </td>
                            <td  align="center">
                                <h4><a href=""><?php echo $values11[2];?></a></h4>
                            </td>
                            <td  align="center">
                                <p><?php echo $values11[3];?> ₺</p>
                            </td>
                            <td  align="center">
                                <input class="form-control" type="text" name="quantity" value="<?php echo $values11[4];?>" autocomplete="off" size="2" disabled>
                            </td>
                            <td align="center">
                                <p class="cart_total_price"><?php echo $values11[5];?> ₺</p>
                            </td>
                        </tr>
                        <?php
                    }

                    ?>
                    </tbody>
                </table>
                <div style="float:right" class="">
                    Toplam Ücret:
                    <?php
                    }
                    $tot=0;
                    foreach($_COOKIE['item'] as $name1=> $value)
                    {
                        $values11=explode("__",$value);
                        $tot=$tot+$values11[5];
                    }
                    if($tot==0)
                    {
                    }
                    else{
                        echo '<button type="button" class="btn btn-gold">'.$tot.' ₺ </button>';}
                    ?>
                </div>
            </div>

            <?php
            if($tot==0)
            {

            }
            $al	= mysql_query("SELECT * FROM iller");
            $al	= mysql_fetch_object($al);
            ?>
                <?php
                if(isset($_GET['kaydet'])){

                    $urunid=$values11[0];
                    $siparis_adres=$_POST['siparis_adres'];
                    $siparis_il=$_POST['siparis_il'];
                    $siparis_postakod=$_POST['siparis_postakod'];



                    if($siparis_adres=="" | $siparis_postakod==""){
                        echo '<script type="text/javascript">alert("Lütfen tüm alanları doldurun");</script>';
                    }else{

                        mysql_query("insert into u_siparisler (siparis_veren, siparis_urunid, siparis_adres,siparis_il,siparis_postakod) values ('$uye_tc','$urunid', '$siparis_adres', '$siparis_il'
  , '$siparis_postakod')")or die(mysql_error);


                        echo '<script type="text/javascript">
   $(document).ready(function() {
    toastr.success("Sipariş başarıyla gönderilmiştir", "BAŞARILI");
})</script>';
                        setcookie("item", "", time()-3600);
                        setcookie("item[1]", "", time()-3600);
                        setcookie("item[2]", "", time()-3600);
                        setcookie("item[3]", "", time()-3600);
                        setcookie("item[4]", "", time()-3600);
                        header("refresh:3; url=satis.php");
                    }
                }
                ?>

                <div class="panel panel-primary" data-collapsed="0">



                    <div class="panel-body">

                        <form role="form" method="post" action="siparis-ver.php?kaydet" class="form-horizontal form-groups-bordered">

                                <div class="form-group">
                                    <label for="field-2" class="col-sm-3 control-label">Siparişi Veren </label>

                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="field-2" placeholder="<?Php echo $uye_tc;?> - <?php echo $kullanici_a; ?>" disabled="">
                                    </div>
                                </div>


                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label">Siparişi İl </label>
                                <div class="col-sm-5">
                                <select class="form-control" name="siparis_il">
                             <?php $sonuc = mysql_query("SELECT * FROM iller");
                                    while ($satir = mysql_fetch_row($sonuc)){
                                        echo '<option value="'.$satir[0].'">'.$satir[1].'</option>';
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">Posta Kodu</label>

                                <div class="col-sm-5">
                                    <input type="text" name="siparis_postakod" class="form-control" id="field-1" placeholder="Posta kodunuz ">
                                </div>
                            </div>

  <div class="form-group">
                                    <label for="field-ta" class="col-sm-3 control-label">Sipariş Adresi</label>

                                    <div class="col-sm-5">
                                        <textarea name="siparis_adres" class="form-control autogrow" id="field-ta" placeholder="Buraya projenizi anlatan bir metin yazınız.." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 48px;"></textarea>
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



            </div>

<?php include("footer.php"); ?>