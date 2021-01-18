<?php
if(!isset($_SESSION['user'])){
	header("Location:index.php?page=Erreur");
	exit();
}
function affichage_confirme(){
	$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "SELECT * FROM cscc_membres M,cscc_confirme C where C.id_cscc = M.id_cscc order by note_confirme DESC";
	$query = $bdd->prepare($sql);
	$query->execute();
	$result = array();
	while($row = $query->fetch()){
		$result[] = $row;
	}
	return $result;
}
$result = affichage_confirme();
?>
<br>
<div class="row">
<div class="col-md-4">
<a href="index.php?page=administration" style="text-decoration:none;" class="metal"><i class="fa fa-forward"></i> Retour a la Liste des membres</a>
</div>
<div class="col-md-1">
<img src="cscc.png" width="50" height="50" />
</div>
<div class="col-md-3">
<center><b>CSCC - Liste Des membres <br> Université Saad Dahleb Blida </b></center>
</div>
</div>
<div class="row">
<table class="table table-hover">
<th>ID</th>
<th>Nom</th>
<th>Prénom</th>
<th>Note</th>
<th>Remarque</th>
<th>Recruteur</th>
<?php foreach($result as $res){?>
<tr>
<td><?php echo htmlentities($res["id_cscc"]); ?></td>
<td><?php echo htmlentities($res["nom_cscc"]); ?></td>
<td><?php echo htmlentities($res["prenom_cscc"]); ?></td>
<td><?php echo htmlentities($res["note_confirme"]); ?></td>
<td><?php echo htmlentities($res["remarque_confirme"]); ?></td>
<td><?php echo htmlentities($res["recruteur_confirme"]); ?></td>
</tr>
<?php } ?>
</table>
</div>