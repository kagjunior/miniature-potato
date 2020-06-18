<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php


			try{
				

				session_start();
					
					$pdo = new PDO('mysql:host=localhost;dbname=news','root','root');
					$titre = '';
					$description = '';
					
					$update = false;
					$id = 0;

			if (isset($_POST['envoyer'])) {

				//$success = "Félicitations! Vous avez bien ajouté un client";


				if (empty($_POST['titre']) || empty($_POST['description'])) 

				{
					//$message = "Il y'a un champ qui n'a pas été rempli";


				} else 

					{
				    	

						$titre = $_POST['titre'];
						$description = $_POST['description'];
						
						$insertion = "INSERT INTO articles(titre,description) VALUES(:titre, :description)";
						$requete = $pdo->prepare($insertion);
						$requete->bindParam(':titre',$titre);
						$requete->bindParam(':description',$description);
						$requete->execute();

					

					header("location: intranetaccueil.php");

					}

				}

				if (isset($_GET['supprimer'])) 
				{

					$id = $_GET['supprimer'];

					$sql = "DELETE FROM articles WHERE id_article=$id";

					$sqlsup = $pdo->query($sql);

					/*$_SESSION['message'] = 'Vous avez bien été supprimés';
					$_SESSION['msg_type'] = 'danger';*/

					header("location: intranetaccueil.php");
				}

				if (isset($_GET['modifier'])) 
				{
					$titre = "";
					$description = "";
					$update = true;
					$id = $_GET['modifier'];
					$mod = "SELECT * FROM articles WHERE id_article=$id";
					$sqlmod = $pdo->query($mod);

					if (count($sqlmod)==1) {
						$valu = $sqlmod->fetch();
						$titre = $valu['titre'];
						$description = $valu['description'];

					}
				}

				if (isset($_POST['update'])) 
				{
					
					$id  = $_POST['id'];
					$titre = $_POST['titre'];
					$description = $_POST['description'];
					$sqmo = "UPDATE articles SET titre = '$titre', description = '$description' WHERE id_article = $id";
					$pdo->query($sqmo);
					/*$_SESSION['message'] = 'Vous avez été modifiés';
					$_SESSION['msg_type'] = 'warning';*/

					header("location: intranetaccueil.php");


				}







		}catch(Exception $e){
			die($e->getMessage());
		}
		
?>

</body>
</html>