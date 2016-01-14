<html>
<head>
	<meta charset="UTF-8">

	<title>D-Maps | <?php echo " " . $title; ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="author" content="Tom Checkley">
	<meta name="keywords" content="Maps Bristol Art">
	<meta name="description" content="">

	<link href='https://fonts.googleapis.com/css?family=Forum|Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.min.css">

	<script type="text/javascript" src="js/app.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARjaqEo1IE9MoRch_FDvSQkA7DizARjlw"></script>

	<link rel="shortcut icon" href="img/logo.ico" type="image/ico" />


	<script> 
		var $buoop = {c:2}; 
		function $buo_f(){ 
		 var e = document.createElement("script"); 
		 e.src = "//browser-update.org/update.min.js"; 
		 document.body.appendChild(e);
		};
		try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
		catch(e){window.attachEvent("onload", $buo_f)}
	</script> 
</head>

<body>
	<div class="underlay"></div>
	<div class="wrapper">
		<header class="header">
			<hgroup>
				<div class="header__logo">
					<img src="img/thumbs/logo.jpg">
				</div>
				<h1>D-Maps</h1>
			</hgroup>
			<nav>
				<ul>
					<li>
						<a href="index.php" class="<?php if($section == "index") {echo "active";} ?>">Here</a>
					</li>
					<li>
						<a href="there.php" class="<?php if($section == "there") {echo "active";} ?>">There</a>
					</li>
					<li>
						<a href="maps.php" class="<?php if($section == "maps") {echo "active";} ?>">Maps</a>
					</li>
					<li>
						<a href="contact.php" class="<?php if($section == "contact") {echo "active";} ?>">Contact</a>
					</li>
				</ul>
			</nav>
		</header>