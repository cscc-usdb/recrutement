<?php
if(!isset($_SESSION['user'])){
	header("Location:index.php?page=Erreur");
	exit();
}
function competences($id){
	$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "SELECT * FROM cmpt_membres where id_cscc = ?";
	$query = $bdd->prepare($sql);
	$query->bindValue(1,$id,PDO::PARAM_STR);
	$query->execute();
	$result = array();
	while($row = $query->fetch()){
		$result[] = $row;
	}
	return $result;
}
function disponible($id){
	$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "SELECT * FROM disponible_membres where id_cscc = ?";
	$query = $bdd->prepare($sql);
	$query->bindValue(1,$id,PDO::PARAM_STR);
	$query->execute();
	$result = array();
	while($row = $query->fetch()){
		$result[] = $row;
	}
	return $result;
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
$cmpt = competences($_GET['id']);
$dispo = disponible($_GET['id']);
if($_SESSION['user'] !== $result[0]['recrute_cscc']){
	header("Location:index.php?page=administration");
	exit();
}
?>
<div class="row">
<div class="col-md-12">
<center><img src="cscc.png" width="50" height="50" /><span style="font-size:17px;"><span>Profile <?php echo htmlentities($result[0]['nom_cscc'])." ".htmlentities($result[0]['prenom_cscc']); ?></span><hr></hr></center>
<div class="row">
<div class="col-md-8">
<div class="row">
<div class="col-md-3">
<img src="profile.png" width="150" height="150" />
</div>
<div class="col-md-6"><br>
<span style="color:#50BFE6"><i class="fa fa-user"></i> Nom : </span><span><?php echo htmlentities($result[0]['nom_cscc']); ?></span><br><br>
<span style="color:#50BFE6"><i class="fa fa-check"></i> Prénom : </span><span><?php echo htmlentities($result[0]['prenom_cscc']); ?></span><br><br>
<span style="color:#50BFE6"><i class="fa fa-birthday-cake"></i> Date de Naissance : </span><span><?php echo htmlentities($result[0]['date_cscc']); ?></span>
</div>
</div>
<hr></hr>
<div class="row">
<div class="col-md-5">
<span style="color:#50BFE6"><i class="fa fa-envelope"></i> Email : </span><span><?php echo htmlentities($result[0]['email_cscc']); ?></span>
</div>
<div class="col-md-4">
<span style="color:#50BFE6"><i class="fa fa-facebook"></i> Facebook : </span><span><?php echo htmlentities($result[0]['facebook_cscc']); ?></span>
</div>
<div class="col-md-3">
<span style="color:#50BFE6"><i class="fa fa-phone"></i> Téléphone : </span><span><?php echo htmlentities($result[0]['tlf_cscc']); ?></span>
</div>
</div>
<hr></hr>
<div class="row">
<div class="col-md-5">
<span style="color:#50BFE6"><i class="fa fa-graduation-cap"></i> Niveau : </span><span><?php echo htmlentities($result[0]['niveau_cscc']); ?></span>
</div>
<div class="col-md-4">
<span style="color:#50BFE6"><i class="fa fa-edit"></i> Autre : </span><span><?php echo htmlentities($result[0]['autre_cscc']); ?></span>
</div>
<div class="col-md-3">
<span style="color:#50BFE6"><i class="fa fa-code"></i> Branche : </span><span><?php echo htmlentities($result[0]['branche_cscc']); ?></span>
</div>
</div>
<hr></hr>
<div class="row">
<div class="col-md-5">
<span style="color:#50BFE6"><i class="fa fa-language"></i> Arabe : </span><span><?php echo (intval($result[0]['arabe_cscc'])*2)." / 10"; ?></span>
</div>
<div class="col-md-4">
<span style="color:#50BFE6"><i class="fa fa-language"></i> Francais : </span><span><?php echo (intval($result[0]['francais_cscc'])*2)." / 10"; ?></span>
</div>
<div class="col-md-3">
<span style="color:#50BFE6"><i class="fa fa-language"></i> Anglais : </span><span><?php echo (intval($result[0]['anglais_cscc'])*2)." / 10"; ?></span>
</div>
</div><hr></hr>
<div class="row">
<div class="col-md-12">
<span style="color:#50BFE6"><i class="fa fa-html5"></i> Compétences : </span>
<br>
<?php foreach($cmpt as $c){ ?>
<span><?php echo htmlentities($c['nom_cmpt']); ?><br></span>
<?php } ?>
</div>
</div><hr></hr>
<div class="row">
<div class="col-md-12">
<span style="color:#50BFE6"><i class="fa fa-html5"></i> Autres Compétences : </span><span><?php echo htmlentities($result[0]['autre_cmpt']); ?></span>
</div>
</div>
<div class="row"><br><br>
<div class="col-md-12">
<a href="index.php?page=administration" style="text-decoration:none;" class="metal"><i class="fa fa-forward"></i> Retour a la Liste des membres</a><br><br>
</div>
</div>
</div>
<div class="col-md-4">
<hr></hr>
<div class="row">
<span style="color:#50BFE6"><i class="fa fa-magic"></i> Créativité : </span><span><?php echo (intval($result[0]['creativite_cscc'])*2)." / 10"; ?></span>
</div><hr></hr>
<div class="row">
<span style="color:#50BFE6"><i class="fa fa-calendar"></i> Disponibilité : </span>
<br>
<?php foreach($dispo as $d){ ?>
<span><?php echo htmlentities($d['jour_dispo']); ?></span><br>
<?php } ?>
</div><br><hr></hr>
<div class="row">
<center><h4>Evaluation du Membre</h4></center>
<?php
if(isset($_POST['confirme'])){
	$note = $_POST['note'];
	if(intval($note)<=10){
	$rq = $_POST['rq'];
	$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "INSERT INTO cscc_confirme(note_confirme,remarque_confirme,id_cscc,recruteur_confirme) VALUES(?,?,(SELECT id_cscc from cscc_membres where id_cscc = ? ),?)";
	$query = $bdd->prepare($sql);
	$query->bindValue(1,$note,PDO::PARAM_STR);
	$query->bindValue(2,$rq,PDO::PARAM_STR);
	$query->bindValue(3,$_GET['id'],PDO::PARAM_STR);
	$query->bindValue(4,$_SESSION['user'],PDO::PARAM_STR);
	if($query->execute()){
		echo "<div class='alert alert-success'>Evaluation Avec Succées !</div>";
	}
	$query->closeCursor();
	}
	else {
		echo "<div class='alert alert-danger'><b>Erreur </b>La note est superieur a 10 !</div>";
	}
}
?>
<form method="post" name="form3">
<input type="number" class="form-control" name="note" placeholder="Note /10 .." required /><br>
<textarea class="form-control" name="rq" placeholder="Remarque .. " style="height:100px" required></textarea><br>
<button class="metal" name="confirme" type="submit">Valider <i class="fa fa-check"></i></button>
</form>
</div>
</div>
</div>
</div>
</div>