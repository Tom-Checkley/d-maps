<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
	$tel = trim($_POST["tel"]);
	$message = trim($_POST["message"]);

	if ($name == "" OR $email == "" OR $tel == "" OR $message == "") {
		echo "You must specify a value for name, email address, telephone number and message.";
		exit;
	}

	foreach ($_POST as $value) {
		if(stripos($value, 'Content-Type:') !== FALSE) {
			echo "There was a problem with the information you entered.";
			exit;
		}
	}

	if ($_POST["address"] != "") {
		echo "Your form submission has an error.";
		exit;
	}

	require_once("inc/phpmailer/class.phpmailer.php");
	$mail = new PHPMailer();

	if (!$mail->ValidateAddress($email)){
		echo "You must specify a valid email address.";
		exit;
	}

	$email_body = "";
	$email_body = $email_body . "Name: " . $name . "<br>";
	$email_body = $email_body . "Email: " . $email . "<br>";
	$email_body = $email_body . "Tel: " . $tel . "<br>";
	$email_body = $email_body . "Message: " . $message;



	$mail->SetFrom($email,$name);

	$address = "tom_checkley@hotmail.com";
	$mail->AddAddress($address, "Tom Checkley");

	$mail->Subject = "Contact from D-Maps Website from " . $name;

	// $mail->AltBody = "To veiw the message please use an HTML compatible email veiwer";

	$mail->MsgHTML($email_body);


	if(!$mail->Send()) {
		echo "There was a problem sending the email: " . $mail->ErrorInfo;
	}


	header("Location: contact.php?status=thanks");
	exit;
}
?>

<?php 
$title = "Contact";
$section = "contact";
include('inc/header.php'); 
?>

<div class="contact">
	<main class="grid">

		<?php if (isset($_GET["status"]) AND $_GET["status"] == "thanks") { ?>
			<p>Thanks for the email! I&rsquo;ll be in touch.</p>
		<?php } else { ?>
			
			<div class="row">
				<div class="contact__content sm-grid__col--12 md-grid__col--8 md-offset__col--0 lg-grid__col--8 lg-offset__col--2">
					<h1>Contact</h1>
					<p>
						Please feel free to contact me via email. You can also keep up to date with what I'm up to on Facebook. Just follow the links below.
					</p>
				</div>
			</div>

			<div class="row--fixed-height">
				<div class="contact__content sm-grid__col--12 md-grid__col--6 md-offset__col--0 lg-grid__col--4 lg-offset__col--2">
					<img src="img/thumbs/portrait.jpg">
					<ul class="buttons">
						<li>
							<a href="mailto:dave.sheds@gmail.com"><span class="lsf-icon mail"></span>dave.sheds@gmail.com</a>
						</li>
						<li>
							<a href="https://www.facebook.com/dave.warmart?fref=ts"><span class="lsf-icon facebook"></span>Like on Facebook</a>
						</li>
						<li>
							<a href="#cv" class="cv-button">Track Record</a>
						</li>
					</ul>
				</div>

				<div class="contact__content sm-grid__col--12 md-grid__col--6 md-offset__col--0 lg-grid__col--4 lg-offset__col--0">
					<div class="map-holder">
						<div id="map_canvas"></div>
						<img src="http://maps.googleapis.com/maps/api/staticmap?center=BS2+9RH&amp;zoom=16&amp;scale=false&amp;size=600x400&amp;maptype=roadmap&amp;format=png&amp;visual_refresh=true&amp;markers=size:small%7Ccolor:0xff0000%7Clabel:1%7CBS2+9RH" alt="Google Map of BS2 9RH">
					</div>
				</div>

				<!-- <div class="contact__content sm-grid__col--12 md-grid__col--8 md-offset__col--2 lg-grid__col--4 lg-offset__col--0">
					<form method="post" action="contact.php">
						<label for="name">Name</label>
						<input id="name" name="name" type="name" placeholder="Name">

						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="Email">

						<label for="tel">Phone Number</label>
						<input id="tel" name="tel" type="tel" placeholder="Phone number">

						<label for="message">Message</label>
						<textarea id="message" name="message" value="message" placeholder="Message"></textarea>

						<div style="display: none;">
							<label for="address">Address</label>
							<p>If you are a human please leave the address entry blank.</p>
							<input id="address" name="address" type="address" placeholder="address">
						</div>

						<input name="submit" type="submit" value="Send">
					</form>
				</div>
			</div> -->
			
			<!-- <aside id="cv">
				<button><span class="lsf-icon close"></span></button>
				<h2>Track Record</h2>
				<ul>
					<li>
						Graduated Leeds Polytechnic 3D design 1975.
					</li>
					<li>
						Winner, R.S.A. Bursary (medals section) Competition.
					</li>
					<li>
						Selected, British Crafts' Council - “Craftsman of Quality”.
					</li>
					<li>
						Elected, Fellow Royal Society of Arts 1978.
					</li>
					<li>
						One-man show, Arnolfini Bristol 1980.
					</li>
					<li>
						Design Advisor, Sri Lanka National Design Centre 1987-93.
					</li>
					<li>
						PGCE (Design and Technology) 1994.
					</li>
					<li>
						"WarmArt" radiators workshop / test-rig 2001-3.
					</li>
					<li>
						"Paintworks" - carpenter and site sculpture 2004-8.
					</li>
					<li>
						"A-Z of Sheds" - research, illustration and mapping of Transit Sheds.
					</li>
				</ul>
				<h2>
					Current work
				</h2>
				<ul>
					<li>
						Maps, stencils and relief-printing (2D paper/textile), card models (3D).
					</li>
				</ul>
			</aside> -->

		<?php } ?>
	</main>
</div>

<?php include('inc/footer.php'); ?>