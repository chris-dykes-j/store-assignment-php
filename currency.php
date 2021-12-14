
<!DOCTYPE html>
<html>
<head>
	<title>Currency Converter</title>
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
	<div id="convert-currency" class="middle">
	<form method="post" action="currency.php">
		<h2>Amount to Convert</h2>
		<input type="number" name="number-in" step=".01" placeholder="$0.00" required="required">
		<h2>Initial Currency</h2>
		<fieldset>
			<input type="radio" value="cad" name="start" required="required">
			<label for="cad">Canadian Dollar </label>
			<img src="images\canada.png" height="25px" width="25px"><br>
			<input type="radio" value="usd" name="start"> 
			<label for="usd">United States Dollar </label>
			<img src="images\usa.png" height="25px" width="25px"><br>
			<input type="radio" value="eur" name="start">
			<label for="eur">Euro (European Union) </label>
			<img src="images\europe.png" height="25px" width="25px"><br>
			<input type="radio" value="gbp" name="start">
			<label for="gbp">Pound Sterling (United Kingdom) </label>
			<img src="images\uk.png" height="25px" width="25px"><br>
			<input type="radio" value="cny" name="start">
			<label for="cny">Yuan (People's Republic of China) </label>
			<img src="images\china.png" height="25px" width="25px"><br>
		</fieldset>
		<br>
		<h2>Final Currency</h2>
		<fieldset>
			<input type="radio" value="cad" name="end" required="required"> 
			<label for="cad">Canadian Dollar </label>
			<img src="images\canada.png" height="25px" width="25px"><br>
			<input type="radio" value="usd" name="end"> 
			<label for="usd">United States Dollar </label>
			<img src="images\usa.png" height="25px" width="25px"><br>
			<input type="radio" value="eur" name="end"> 
			<label for="eur">Euro (European Union) </label>
			<img src="images\europe.png" height="25px" width="25px"><br>
			<input type="radio" value="gbp" name="end">
			<label for="gbp">Pound Sterling (United Kingdom) </label>
			<img src="images\uk.png" height="25px" width="25px"><br> 
			<input type="radio" value="cny" name="end">
			<label for="cny">Yuan (People's Republic of China) </label> 
			<img src="images\china.png" height="25px" width="25px"><br>
		</fieldset>
		<br>
		<input type="submit" value="Convert Currency" class="button">
	</form>
	<?php
	    // I retrieved values from xe.com's currency converter. I stuck to two decimal points for simplicity's sake.
        function assignConversionRate($initial, $final) {
            $rate = 0;
            if ($initial == $final) {
                $rate = 1;
            }
            elseif ($initial == "cad") {
                switch ($final) {
                    case "usd":
                        $rate = 0.79;
                        break;
                    case "eur":
                        $rate = 0.66;
                        break;
                    case "gbp":
                        $rate = 0.57;
                        break;
                    case "cny":
                        $rate = 5.15;
                        break;
                }
            } elseif ($initial == "usd") {
                switch ($final) {
                    case "cad":
                        $rate = 1.26;
                        break;
                    case "eur":
                        $rate = 0.84;
                        break;
                    case "gbp":
                        $rate = 0.72;
                        break;
                    case "cny":
                        $rate = 6.50;
                        break;
                }
            } elseif ($initial == "eur") {
                switch ($final) {
                    case "cad":
                        $rate = 1.50;
                        break;
                    case "usd":
                        $rate = 1.19;
                        break;
                    case "gbp":
                        $rate = 0.86;
                        break;
                    case "cny":
                        $rate = 7.75;
                        break;
                }
            } elseif ($initial == "gbp") {
                switch ($final) {
                    case "cad":
                        $rate = 1.75;
                        break;
                    case "usd":
                        $rate = 1.39;
                        break;
                    case "eur":
                        $rate = 1.17;
                        break;
                    case "cny":
                        $rate = 9.06;
                        break;
                }
            } elseif ($initial == "cny") {
                switch ($final) {
                    case "cad":
                        $rate = 0.19;
                        break;
                    case "usd":
                        $rate = 0.15;
                        break;
                    case "eur":
                        $rate = 0.13;
                        break;
                    case "gbp":
                        $rate = 0.11;
                        break;
                }
            }
            return $rate;
        }
        
        function assignFinalValue($initial, $rate) {
            $finalValue = $initial * $rate;
            $finalValue = number_format($finalValue, 2);
            return $finalValue;
        }
        
        function assignFlag($type, $amount) {
            if ($type == "cad")
                echo "\$$amount " . '<img src="images\canada.png" height="25px" width="25px">';
            elseif ($type == "usd")
                echo "\$$amount " . '<img src="images\usa.png" height="25px" width="25px">';
            elseif ($type == "eur")
                echo "&euro;$amount " . '<img src="images\europe.png" height="25px" width="25px">';
            elseif ($type == "gbp")
                echo "&pound;$amount " . '<img src="images\uk.png" height="25px" width="25px">';
            elseif ($type == "cny")
                echo "CN&yen;$amount" . '<img src="images\china.png" height="25px" width="25px">';
            elseif ($type == null)
                echo "$0.00";
        }
        
        function displayResult($initialValue, $initialType, $finalValue, $finalType) {
            echo "<h2>Result</h2>";
            echo "Initial Amount: ";
            assignFlag($initialType, $initialValue);
            echo "<br>Final Amount: ";
            assignFlag($finalType, $finalValue);
        }
        
        $initialValue = number_format($_POST["number-in"] ?? null, 2) ?? null;
        $initialType = $_POST["start"] ?? null;
        $finalType = $_POST["end"] ?? null;
        
        $rate = assignConversionRate($initialType, $finalType);
        $finalValue = assignFinalValue($initialValue, $rate);
        displayResult($initialValue, $initialType, $finalValue, $finalType);

    ?>
	</div>
</body>
</html>