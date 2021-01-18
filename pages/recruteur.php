<?php
if(!isset($_SESSION['user'])){
	header("Location:index.php?page=Erreur");
	exit();
}
function affichage($id){
	$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "SELECT * FROM cscc_membres where id_cscc = ?";
	$query = $bdd->prepare($sql);
	$query->bindValue(1,$id,PDO::PARAM_STR);
	$query->execute();
	if($query->rowCount() < 1){
		die("<br>Utilisateur Existe pas ! <a href='index.php?page=administration'> Retour a la page d'administration</a>");
	}
	$result = array();
	while($row = $query->fetch()){
		$result[] = $row;
	}
	return $result;
}
$result = affichage($_GET['id']);
if($_SESSION['user'] !== $result[0]['recrute_cscc']){
	header("Location:index.php?page=administration");
	exit();
}
if(isset($_POST['change'])){
	$rec = $_POST['recruteur'];
    $bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "UPDATE cscc_membres set recrute_cscc = ? where id_cscc = ?";
	$query = $bdd->prepare($sql);
	$query->bindValue(1,$rec,PDO::PARAM_STR);
	$query->bindValue(2,$_GET['id'],PDO::PARAM_STR);
	if($query->execute()){
		echo "<div class='alert alert-success'>Changement Avec Succées !</div>";
	}
	$query->closeCursor();
	unset($_POST);
	
}
?>
<div class="row">
<div class="col-md-12">
<center><img src="cscc.png" width="50" height="50" /><span style="font-size:17px;"><span>Recruteur de <?php echo htmlentities($result[0]['nom_cscc'])." ".htmlentities($result[0]['prenom_cscc']); ?></span><hr></hr></center>

<form method="post" name="form3">
<select name="recruteur" class="form-control">
<option value="INIESTA">Iniesta</option>
<option value="FETHI">Fethi</option>
<option value="BESBASA">Bessbassa</option>
</select>
<br>
<button class="metal" name="change" type="submit">Valider <i class="fa fa-check"></i></button>
</form>
<br><br><br>
<a href="index.php?page=administration" style="text-decoration:none;" class="metal"><i class="fa fa-forward"></i> Retour a la Liste des membres</a><br><br>
</div>
</div>
