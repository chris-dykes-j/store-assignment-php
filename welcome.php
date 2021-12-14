
<!DOCTYPE html>
<html>
<head>
	<title>A Warm Welcome</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="favicon.ico">
</head>
<body>
	<div class="navigate">
        <a href="index.php">Home</a>
        <div class="drop">
            <a class="drop-button" href="#">Products</a>
            <div class="drop-content">
                <a href="currency.php">Currency Exchange</a>
                <a href="#">Service Two</a>
            </div>
        </div>
        <div class="drop">
            <a class="drop-button" href="contact.html">Contact Us</a>
            <div class="drop-content">
                <a href="#"><img src=images\france2.png class="country"> Contactez-nous</a>
                <a href="#"><img src=images\germany2.png class="country"> Kontaktiere Uns</a>
                <a href="#"><img src=images\japan2.png class="country"> お問い合わせ</a>
            </div>
        </div>
        <a href="aboutme.html">About</a>
    </div>
	<div class="top">
		<h1>A Warm Welcome to You!</h1>
		<p>
		<?php
            $firstName = $_GET["firstName"] ?? null;
            $lastName = $_GET["lastName"] ?? null;
            if ($firstName && $lastName)
                echo "Howdy $firstName $lastName!";
            elseif ($firstName && !$lastName)
                echo "Howdy $firstName!";
            elseif (!$firstName && $lastName)
                echo "Howdy $lastName!";
            else
                echo "Howdy no names!";
        ?>
    	</p>
	</div>
</body>
</html>