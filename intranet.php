<?php include "indexcss.php"; 
	include "intranetcss.php";	?>
<!DOCTYPE html>
<html>
<head>
	<title>Intranet</title>
	<meta charset="utf-8">
</head>
<body>
	<?php include "header.php"; ?>

	<div class="intranet">
		<h1 style="color: #cf1717">Service intranet (accès réservé)</h1>
		<form action="intranetaccueil.php">
			<div>
				<label for="email">Entrer votre email</label>
				<input type="text" name="email">
			</div>
			<div>
				<label for="email">Votre mot de passe</label>
				<input type="password" name="password">
			</div>
			<div>
				<button type="submit" name="submit" class="button">Se connecter</button>
			</div>
		</form>
	</div>
<?php include "footer.php"; ?>
</body>
</html>