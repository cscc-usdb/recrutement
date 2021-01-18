<?php
if(!isset($_SESSION['user'])){
	header("Location:index.php?page=Erreur");
	exit();
}
function affichage_presence(){
	$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "SELECT * FROM presence_cscc";
	$query = $bdd->prepare($sql);
	$query->execute();
	$result = array();
	while($row = $query->fetch()){
		$result[] = $row;
	}
	return $result;
}
$result = affichage_presence();
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
<center><b>CSCC - Liste Des membres Présent <br> Université Saad Dahleb Blida </b></center>
</div>
</div>
<div class="row">
<table class="table table-hover">
<th>ID</th>
<th>Nom</th>
<th>Status</th>
<?php foreach($result as $res){?>
<tr>
<td><?php echo htmlentities($res["code_cscc"]); ?></td>
<td><?php echo htmlentities($res["nom_cscc"]); ?></td>
<td>Présent</td>

</tr>
<?php } ?>
</table>
</div>