<?php include("header.php"); ?>
	
<section class="contact-container">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-sm-7 sep">
				
				<h4>Bağı koparmayın, bize bir e-mail atın!</h4>
				
				<p>
					Her konuda bize e-mail yazmaktan çekinmeyin!
				</p>
				<?php
if(isset($_GET['gonder'])){

$name = $_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
 
if($name=="" | $email=="" | $message ==""){
 echo '<script type="text/javascript">alert("Lütfen tüm alanları doldurun");</script>';
}else{

mysql_query("insert into a_iletisim (name, email, message) values ('$name','$email','$message')")or die(mysql_error);

    echo '<script type="text/javascript">alert("'.$name.' mesajınız başarıyla gönderildi.");</script>';
	header("refresh:1; url=contact.php");
}
}
?>
				<form class="contact-form" role="form" method="post" action="contact.php?gonder">
					
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="İsim:" />
					</div>
					
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="E-mail:" />
					</div>
					
					<div class="form-group">
						<textarea class="form-control" name="message" placeholder="Mesaj:" rows="6"></textarea>
					</div>
					
					<div class="form-group text-right">
						<button class="btn btn-primary" name="gonder" type="submit">Gönder</button>
					</div>
					
				</form>
				
			</div>
			
			<div class="col-sm-offset-1 col-sm-4">
				
				<div class="info-entry">
					
					<h4>Adres</h4>
					
					<p>
						Yıldız Teknik Üniversitesi <br />
					BÖTE <br />
						
						<br />
						<br />
						
						<strong>Çalışma Saatlerimiz:</strong>
						<br />
						08:00 - 17:00 <br />
						Haftaiçi hergün 
						<br />
						<br />
					</p>
					
				</div>
				
				<div class="info-entry">
					
					<h4>İletişim</h4>
					
					<p>
						gokselozardali@gmail.com <br />
					furkanbelikirik@gmail.com <br />
					</p>
					
					<ul class="social-networks">
						<li>
							<a href="#">
								<i class="entypo-instagram"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="entypo-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="entypo-facebook"></i>
							</a>
						</li>
					</ul>
				
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</section>	
<?php include("footer.php"); ?>