<?php 

session_start();
include 'connection.php';

?>

<html>
	<head>
		<title> Login systeem</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>
		<?php
			$voornaam = $_POST['voornaam'];
	    	$achternaam = $_POST['achternaam'];
	    	$wachtwoord = $_POST['wachtwoord'];
	    	$submit = $_POST['submit'];


	    	 function do_alert_created($msg) 
		    {
		        echo '<script type="text/javascript">confirm("' . $msg . '"); 
		        		location.href = "login.php"; </script>';
		    }
	    	function message($msg) 
		    {
		        echo '<script type="text/javascript">confirm("' . $msg . '"); </script>';
		    }
		   

	    	if ( isset($submit) ) { 

	    		// Check of leeg
	    		if(!empty($voornaam) && !empty($achternaam) && !empty($wachtwoord)){
	    			//Check of ww langer is dan 6 minimaal 7
	    			if(strlen($wachtwoord) <= 6){
	    				message("Uw wachtwoord is niet lang genoeg");
	    			}else{
	    				//Registratie
	    				$stmt = $dbh->prepare("INSERT INTO `logins`(voornaam, achternaam, wachtwoord) VALUES(:voornaam, :achternaam, :wachtwoord)");
		    			$stmt->bindParam(':voornaam', $voornaam, PDO::PARAM_INT);
		    			$stmt->bindParam(':achternaam', $achternaam, PDO::PARAM_INT);
		    			$stmt->bindParam(':wachtwoord', $wachtwoord, PDO::PARAM_INT);
		    			$stmt ->execute();
		    		  	do_alert_created("Je bent correct geregistreerd, je kan nu inloggen!");
	    			}
				}else{
					message("Vul alle velden in!");
				}
			}
		

		?>
			<div class="page">
					<h3>Registreer u hier</h3> 
				

				<div class="form">	
					<form method="post">
						<div class="block">
						  <label>Voornaam:</label>
						  <input class="form-control" type="text" name="voornaam" value="" placeholder="Voornaam">
						</div><br>
						<div class="block">
						<label>Achternaam:</label>
						<input class="form-control" type="text" name="achternaam" value="" placeholder="Voornaam">
						</div></br>
						<div class="block">
						<label>Wachtwoord:</label>
						<input class="form-control" type="password" name="wachtwoord" value="" placeholder="Wachtwoord">
						</div>
						<br><br>
						<input class="submit" name="submit" type="submit" value="Submit">
					</form> 
				</div>

				<div id="footer">
					<div class="link-container">
			   			<a href="login.php">Login</a> || <a href="registration.php">Registreren</a>
					</div>
				</div>
			</div>
	</body>
</html>
