<?php

	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);

	$signupEmailError = "";
	$signupPasswordError = "";
	$signupTelephoneError = "";
	$signupUsernameError = "";
	
	//kas on olemas
	if (isset ($_POST["signupEmail"])) {
		
		//oli olemas, vajutati nuppu
		if (empty ($_POST["signupEmail"])) {
		
		//oli tõesti tühi
		$signupEmailError = "See väli on kohustuslik";
		
		}
			
	
	}
	$loginEmailError = "";
	
	//kas on olemas
	if (isset ($_POST["loginEmail"])) {
		
		//oli olemas, vajutati nuppu
		if (empty ($_POST["loginEmail"])) {
		
		//oli tõesti tühi
		$loginEmailError = "See väli on kohustuslik";
		
		}
			
	
	}
		$signupPasswordError = "";
	
	//kas on olemas
	if (isset ($_POST["signupPassword"])) {
		
		//oli olemas, vajutati nuppu
		if (empty ($_POST["signupPassword"])) {
		
		//oli tõesti tühi
		$signupPasswordError = "See väli on kohustuslik";
		
		} else {
			
			//oli midagi, mitte tühi
			
			//kas pikkus vähemalt 8
			if (strlen ($_POST["signupPassword"]) < 8) {
				
				$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki pikk";
				
			}
			
		}
			
	
	}
	if (isset ($_POST["signupUsername"])) {
		
		//Sisestati kasutajanimi
		if (empty ($_POST["signupUsername"])) {
		
		//Kasutajanimi jäi sisestamata
		$signupUsernameError = "See väli on kohustuslik";
		
		} else {
			
			
			if (strlen ($_POST["signupUsername"]) < 6) {
				
				$signupUsernameError = "Kasutajanimi peab olema vähemalt 6 tähemärki";
			}	
			
		}
			
	
	}
	if (isset ($_POST["signupTelephone"])) {
		
		//Sisestati telefoni nr
		if (empty ($_POST["signupTelephone"])) {
		
		//Telefoni nr-it ei sisestatud
		$signupTelephoneError = "See väli on kohustuslik";
		
		}
				
	}
?>








<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise leht</title>
	</head>
	<body>

		<h1>Logi Sisse</h1>
	
		<form method="POST">
			<label>E-post</label><br>
			<input name="loginEmail" type="email">
			
			<br><br>
			<label>Parool</label><br>
			<input name="loginPassword" type="password">
			
			<br><br>
			
			<input type="submit" value="Logi Sisse" >
		
		</form>

	</body>
</html>



<h1>Loo Kasutaja</h1>
	

	
		
	<html>
		
			<form method="POST">
		
			<label>Kasutajanimi</label><br>
			<input name="signupUsername" type="text"> <?php echo $signupUsernameError; ?>
			
			<br><br>
			<label>E-post</label><br>
			<input name="signupEmail" type="email"> <?php echo $signupEmailError; ?>
			
			<br><br>
			
			<input type="radio" name="gender" value="male" checked> Mees<br>
			<input type="radio" name="gender" value="female"> Naine<br>
			<input type="radio" name="gender" value="other"> Muu<br><br>
			
			<label>Parool</label><br>
			<input name="signupPassword" type="password"> <?php echo $signupPasswordError; ?>
			
			<br><br>
			<label>Telefon</label><br>
			<input name="signupTelephone" type="tel"> <?php echo $signupTelephoneError; ?>
			
			<br><br>
			
			<input type="submit" value="Loo Kasutaja" >
			
			
		
		</form>
	
	</body>
</html>