<?php require_once('header.php'); ?>


<ol class="breadcrumb bc-3"> <li> <a href="index.php"><i class="fa-home"></i>Neon CRM </a> </li> <li> <a href="#">Kullanıcı</a> </li> <li class="active"> <strong>Ziyaretçi Defteri</strong> </li> </ol>

	<div class="row"> <div class="col-md-12">
<div class="jumbotron"> <h2>Ziyaretçi Defteri</h2>
<p>Merhaba! Bu sayfadan bizimle ilgili görüşlerinizi herkesin okuyabileceği şekilde paylaşabilirsiniz..</p>

		
			

<?php
 
// mesaj isimli Textarea etiketine birşeyler yazılıp form gönderildiyse...
 
if (isset($_POST["mesaj"]))
{
	// Dosya yoksa oluşur ve eklemek üzere aç...
	$dosya = fopen("veriler.txt","a");
	// Gelen mesajı dosyaya yaz...
	fwrite($dosya,$_POST["mesaj"]);
	// Veriler dosyada yanyana yapışmasın ve okunduğunda düzgün görüntülenebilsin diye
	// mesajın ardından <br> etiketini ve satır sonu karakterlerini
    // (\r\n karakterleri) yaz...
	fwrite($dosya,"<br/>--------------<br/>\r\n");
	// Dosyayı kapat. Başkaları da kullanabilsin...
	fclose($dosya);
}
 
?>



<form method="POST" action="ziyaretci-defteri.php">

  <div class="form-group">
                                    <div class="col-sm-4">
                  <textarea name="mesaj" class="form-control autogrow" id="field-ta" placeholder="Buraya projenizi anlatan bir metin yazınız.." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 48px;"></textarea>
                                    </div>
                                </div>
	<input class="btn btn-green" type="submit" />
</form>

<br/><br/>
                      <h2> Sizden Gelen Mesajlar</h2> <br/><br/>
                  
<?php
// mesajlar.txt isimli dosya varsa içeriğini oku ve yaz. Hiç mesaj yazılmamışsa bu isimli
// bir dosya mevcut olmayacağından ve mevcut olmayan bir dosyayı okumaya çalışmak da hata
// ortaya çıkaracağından bu yol tercih ediliyor...
if (file_exists("veriler.txt"))
{
	// Dosyayı okumak üzere aç...
 
	$dosya = fopen("veriler.txt","r");
 
	// Dosyanın sonuna gelinmediği sürece.... (feof, dosyanın sonuna gelindiyse true
    // döndürür. Dosyanın sonuna gelinmediyse false döndürür. !false yani dosyanın
    // sonuna gelinmediğinde !feof(..) true olacağından while döngüsü içindekiler
    // dosyanın sonuna gelinmediği sürece tekrar edilecektir).
 
	while (!feof($dosya))
		{
			// Dosyadan 4096 bayt veya bir satır oku...
			$okunanveri = fgets($dosya, 4096);
 
			// Okuduğunu yaz...
			echo $okunanveri;
		}
	// Dosyayı kapat...	
	fclose($dosya);
}
?>
 


</div>

</div></div>


<?php include("footer.php"); ?>