<?php

	require("../../config.php");
 
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
		
	$signupEmailError = "";
	$signupEmail = "";
	
	//kas on üldse olemas
	if (isset ($_POST["signupEmail"])) {
		
		// oli olemas, ehk keegi vajutas nuppu
		// kas oli tühi
		if (empty ($_POST["signupEmail"])) {
			
			//oli tõesti tühi
			$signupEmailError = "See väli on kohustuslik";
			
		} else {
				
			// kõik korras, email ei ole tühi ja on olemas
			$signupEmail = $_POST["signupEmail"];
		}
		
	}
	
	$signupPasswordError = "";
	
	//kas on üldse olemas
	if (isset ($_POST["signupPassword"])) {
		
		// oli olemas, ehk keegi vajutas nuppu
		// kas oli tühi
		if (empty ($_POST["signupPassword"])) {
			
			//oli tõesti tühi
			$signupPasswordError = "See väli on kohustuslik";
			
		} else {
			
			// oli midagi, ei olnud tühi
			
			// kas pikkus vähemalt 8
			if (strlen ($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Parool peab olema vähemalt 8 tm pikk";
				
			}
			
		}
		
	}
	
	
	$gender = "";
	if(isset($_POST["gender"])) {
		if(!empty($_POST["gender"])){
			
			//on olemas ja ei ole tühi
			$gender = $_POST["gender"];
		}
	}
	
	if ( isset($_POST["signupEmail"]) &&
		 isset($_POST["signupPassword"]) &&
		 $signupEmailError == "" &&
		 empty($signupPasswordError)
		) {
				
		 //ühtegi viga ei ole, kõik vajalik on olemas
		 echo "salvestan....";
		 echo "email ".$signupEmail."<br>";
		 echo "parool ".$_POST["signupPassword"]."<br>";
		 
		 $password = hash("sha512", $_POST["signupPassword"]);
		 
		 echo "räsi ".$password."<br>";
		 
		 //ühendus
		 $database = "if16_kliiva";
		 $mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
		 
		 $stmt = $mysqli->prepare("INSERT INTO user_sample(email, password) VALUES (?, ?)");
		 
		 // s - string
		 // i - int
		 // d - decimal/double
		 $stmt->bind_param("ss", $signupEmail, $password);
		 
		 //täida käsku
		 if ( $stmt->execute() ) {
			 
			 echo "salvestamine õnnestus";
			 
		 } else {
			 
			 echo "ERROR";
			 
		 }
		 
	}
			$signupTelError = "";
	
	if (isset ($_POST["signupTel"])) {
		
		// oli olemas, ehk keegi vajutas nuppu
		// kas oli tühi
		if (empty ($_POST["signupTel"])) {
			
			//oli tõesti tühi
			$signupTelError = "See väli on kohustuslik";
			
		} else {
				
			// kõik korras, email ei ole tühi ja on olemas
			$signupTel = $_POST["signupTel"];
		}
		
	}
	
	
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise leht</title>
	</head>
	<body>

		<h1>Logi sisse</h1>
		
		<form method="POST">
			
			<label>E-post</label><br>
			<input name="loginEmail" type="email">
			
			<br><br>
			
			<label>Parool</label><br>
			<input name="loginPassword" type="password">
						
			<br><br>
			
			<input type="submit">
		
		</form>
		
		<h1>Loo kasutaja</h1>
		
		<form method="POST">
			
			<label>E-post</label><br>
			<input name="signupEmail" type="email" value="<?php echo $signupEmail; ?>" > <?php echo $signupEmailError; ?>
			
			<br><br>
			<label>Parool</label><br>
			<input name="signupPassword" type="password"> <?php echo $signupPasswordError; ?>
						
			<br><br>
			
			<?php if ($gender == "male") { ?>
				<input type="radio" name="gender" value="male" checked > Mees<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="male"> Mees<br>
			<?php } ?>
			
			<?php if ($gender == "female") { ?>
				<input type="radio" name="gender" value="female" checked > Naine<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="female"> Naine<br>
			<?php } ?>
			
			<?php if ($gender == "other") { ?>
				<input type="radio" name="gender" value="other" checked > Muu<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="other"> Muu<br>
			<?php } ?>
			
			<br><br>
			
			<label>Telefon</label><br>
			<input name="signupTel" type="tel"> <?php echo $signupTelError; ?>
			
			<br><br>
			
			<input type="submit" value="Loo kasutaja">
		
		</form>

	</body>
</html>