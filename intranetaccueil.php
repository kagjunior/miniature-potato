<?php include "indexcss.php";  include "model.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil sur intranet</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<?php include "header.php"; ?>
	<div>
		<h1 style="text-align: center; margin-top: 30px; color: #cf1717">Voici la liste de mes articles</h1>
	</div>

	<div class="container">
		<?php 

        $pdo = new PDO('mysql:host=localhost;dbname=news','root','root');
        $sth = "SELECT * FROM articles";
        $req = $pdo->prepare($sth);
        $req->execute();
        $resultat = $req->fetchAll();
    ?>
    
      
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titre</th>
				<th>Description</th>
				<th>Opérations</th>
			</tr>
		</thead>
    <?php foreach ($resultat as $value): ?>
		<tbody>
			<tr>
				<td><?= $value['id_article']; ?></td>
				<td><?= $value['titre']; ?></td>
				<td><?= $value['description']; ?></td>
				<td><a href="intranetaccueil.php?modifier=<?php echo $value['id_article']; ?>" class="btn btn-primary">Modifier</a> <a href="intranetaccueil.php?supprimer=<?php echo $value['id_article']; ?>" class="btn btn-danger">Supprimer</a></td>
			</tr>
		</tbody>
	<?php endforeach ?>
	</table>
	</div>
	<br><br>
	<div class="container">
		<h1 style="color:#cf1717">Ajouter des articles</h1>
		
			<form method="POST">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="form-group">
					<label for="title">Titre de l'article</label>
					<input class="form-control" type="text" name="titre" value="<?php if(isset($titre)) echo $titre; ?>"/>
				</div>
				<div class="form-group">
					<label for="description">Description de l'article</label>
					<textarea class="form-control" type="text" name="description" value="<?php if(isset($description)) echo $description; ?>"></textarea> 
				</div>
				<?php if ($update==true) : ?>
		        <button type="submit" class="btn btn-info" name="update">Modifier</button>
		      	<?php else : ?>
		        <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
		      	<?php endif ?>
			</form>
	</div>
</body>
</html>