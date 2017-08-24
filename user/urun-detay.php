<?php require_once('header.php'); ?>


<ol class="breadcrumb bc-3"> <li> <a href="index.php"><i class="fa-home"></i>Neon CRM </a> </li> <li> <a href="satis.php">Ürün Satış</a> </li> <li class="active"> <strong>Ürün Detay Sayfası</strong> </li> </ol>

<?php

	  $id = $_GET['urun_id']; 		


$value = 'ilkdeger';
setcookie("item", $value);


if (isset($_POST["submit1"]))
{
	$d=0;
	if(is_array($_COOKIE['item'])) // çerez olup olmadığını kontrol etmek için 
	{
		foreach($_COOKIE['item'] as $name => $value) // çerezleri saymak için
		{
			$d=$d+1;
						
		}
		$d=$d+1;
	}
	else{
		$d=$d+1;	
	}		
		$res3=mysql_query("select * from urunler where urun_id=$id"); // veritabanından veri çekmek için
	while($row3=mysql_fetch_array($res3))
	{
		$pid=$row3["urun_id"];
		$img=$row3["urun_resim"];
		$nm=$row3["urun_adi"];
		$price=$row3["urun_fiyati"];
		$qty="1";
		$total=$price*$qty;
	}
	if(is_array($_COOKIE['item'])) 
	{
		foreach($_COOKIE['item'] as $name1 => $value) 
		{
			$values11=explode("__",$value);
			$found=0;
			if($pid==$values11[0])
			{
				$found=$found+1;
				$qty=$values11[4]+1;
				
				$tb_qty;
				$res=mysql_query("select * from urunler where urun_id=$pid");
				while($row=mysql_fetch_array($res))
				{
					$tb_qty=$row["urun_miktari"];					
				}
				
				if($tb_qty<$qty)
				{
					
					?>
					<script type="text/javascript"> 
					alert("Verilen sipariş miktarı stoklarda mevcut değildir.");
					</script>
					
					
					<?php
				}
				else{
				$total=$values11[3]*$qty;
				setcookie("item[$name1]",$pid."__".$img."__".$nm."__".$price."__".$qty."__".$total,time()+1800);		
			}
			}
						
		}
		if($found==0){
			
			$tb_qty;
				$res=mysql_query("select * from urunler where urun_id=$pid");
				while($row=mysql_fetch_array($res))
				{
					$tb_qty=$row["urun_miktari"];					
				}
				
				if($tb_qty<$qty)
				{
					
					?>
					<script type="text/javascript"> 
					alert("Verilen sipariş miktarı stoklarda mevcut değildir.");
					</script>
					
					
					<?php
				}
				else{
		setcookie("item[$d]",$pid."__".$img."__".$nm."__".$price."__".$qty."__".$total,time()+1800);	
				}
	}
	}
	else
	{
		$tb_qty;
				$res=mysql_query("select * from urunler where urun_id=$pid");
				while($row=mysql_fetch_array($res))
				{
					$tb_qty=$row["urun_miktari"];					
				}
				
				if($tb_qty<$qty)
				{
				
					?>
					<script type="text/javascript"> 
					alert("Verilen sipariş miktarı stoklarda mevcut değildir.");
					</script>
					
					
					<?php
				}
				else{
		setcookie("item[$d]",$pid."__".$img."__".$nm."__".$price."__".$qty."__".$total,time()+1800);	
				}
	}
		
}

	
			
				$res=mysql_query("select * from urunler where urun_id=$id");
				while($row=mysql_fetch_array($res)){			

				?>
			
			  <div class="row">
			  <form name="form1" action="" method="post"> 
		<div class="col-sm-3"> 
		<div class="tile-progress tile-cyan">
			<div class="tile-header"> <h3><?php echo $row["urun_adi"];?></h3>
                <span ><center><img src="../urunresim/<?php echo $row["urun_resim"];?>" width="250px" height="200px"alt="" /></center></span>
                <span style="font-size:14px"><?php echo $row["urun_aciklama"];?></span>
				<span style="float:Right"><h2 style="color:#fff;">Stok:<?php echo $row["urun_miktari"]; ?> adet<br/>Fiyat: 
				<?php echo $row["urun_fiyati"]; ?> ₺</h2></span>
			</div> <br/><br/><br/>
				<div class="tile-progressbar"><span data-fill="100%" style="width: 100%;"></span></div>
			<div class="tile-footer">  
					<span>
					
					<button type="submit" name="submit1" class="btn btn-gold">Sepete Ekle</button>
					</span>
			</div>    
		</div>
	</div> </form>


</div>			
				<?php } ?>

<?php include("footer.php"); ?>