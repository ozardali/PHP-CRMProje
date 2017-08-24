<?php require_once('header.php');


error_reporting(0);
?>

<ol class="breadcrumb bc-3"> <li> <a href="index.php"><i class="fa-home"></i>Neon CRM </a> </li> <li> <a href="#">Kullanıcı</a> </li> <li class="active"> <strong>Giriş Sayfası</strong> </li> </ol>


    <section class="content">
    <div class="row">

    <div class="col-xs-12">
    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Sepetim</h3>
    </div>

    <div class="box-body">

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
        <div class="col-md-1" style="float:right">
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
                header("refresh:1; url=sepet.php");
            }


            echo '<form name="cerezsilme" method="post" action="sepet.php?cerezsil">
								<button type="cerezsil" name="cerezsil"class="btn btn-danger btn-block btn-login">
								<i class="entypo-cancel"></i>
								Çerezleri Sil
															</button>
															</form><br/>';
            ?></div>
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
    else{
        echo '	<center> <a href="siparis-ver.php"> <button type="button" class="btn btn-green"><i class="entypo-basket"></i> Satın Al</button>	</a>	</center>';
    }




?>




<?php include("footer.php"); ?>