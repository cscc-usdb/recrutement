<?php
if(!isset($_SESSION['user'])){
	header("Location:index.php?page=Erreur");
	exit();
}
function affichage(){
	$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	if(isset($_POST['search'])){
	$sql = "SELECT * FROM cscc_membres where nom_cscc LIKE '".$_POST['search']."%'";
	}
    else {
    $sql = "SELECT * FROM cscc_membres where id_cscc not in (SELECT id_cscc from cscc_confirme)";	
	}
	$query = $bdd->prepare($sql);
	$query->execute();
	$result = array();
	while($row = $query->fetch()){
		$result[] = $row;
	}
	return $result;
}
function count_membre(){
	$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "SELECT * FROM cscc_membres";
	$query = $bdd->prepare($sql);
	$query->execute();
	return $query->rowCount();
}
function count_confirme(){
	$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "SELECT * FROM cscc_confirme";
	$query = $bdd->prepare($sql);
	$query->execute();
	return $query->rowCount();
}
$result = affichage();
$cnt = count_membre();
$cnt_confirme = count_confirme();
?>

<div class="row"><br>
<form method="post" name="form2">
<div class="col-md-3"><span style="color:#50BFE6"><i class="fa fa-user"></i> Connécté en tant que <?php echo $_SESSION['user']; ?></span></div>
<div class="col-md-6">
<input type="text" class="form-control" name="search" placeholder="Rechercher un membre inscris .." />
</div>
<div class="col-md-2"><button type="submit" name="sub" class="metal">Recherche <i class="fa fa-search"></i></button></div>
</div>
<div class="row"><br>
<div class="col-md-8">
<table class="table table-hover" id="example">
<thead>
<th>ID</th>
<th>Nom</th>
<th>Prénom</th>
<th>Niveau</th>
<th><center>Consultation</center></th>
<th></th>
</thead>
<tbody>
<?php foreach($result as $res) { ?>
<tr>
<td><?php echo htmlentities($res['id_cscc']); ?></td>
<td><?php echo htmlentities($res['nom_cscc']); ?></td>
<td><?php echo htmlentities($res['prenom_cscc']); ?></td>
<td><?php echo htmlentities($res['niveau_cscc']); ?></td>
<td><center>
<?php if($_SESSION['user']===$res['recrute_cscc']) { ?>
<a href="index.php?page=profile&id=<?php echo $res['id_cscc']; ?>" style="text-decoration:none;" class="metal">Consulter <i class="fa fa-check"></i></a>
<?php } 
else {
?>
<span style="color:#a94442;">Par <?php echo $res['recrute_cscc']; ?> </span>
<?php 
}
?>
</center>
</td>
<td>

<?php if($_SESSION['user']===$res['recrute_cscc']) { ?>
<a href="index.php?page=recruteur&id=<?php echo $res['id_cscc']; ?>"><i style='color:#0A7E8C;' class="fa fa-users"></i></a>
<?php } ?>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="col-md-4"><br>
<div class="row">
<center><span style="color:#50BFE6"><i class="fa fa-magic"></i> Membres Inscris : </span><span><?php echo $cnt; ?></span></center>
</div><hr></hr>
<div class="row">
<center><span style="color:#50BFE6"><i class="fa fa-magic"></i> Membres Consultée : </span><span><?php echo $cnt_confirme; ?></span>
</center></div><hr></hr>
<div class="row">
<center><a href="index.php?page=confirmation" style="text-decoration:none;" class="metal"><i class="fa fa-users"></i> Liste des Membres Confirmés</a></center>
</div><br><br>
<div class="row">
<center><a href="index.php?page=presence" style="text-decoration:none;" class="metal"><i class="fa fa-qrcode"></i>&nbsp;&nbsp;&nbsp;&nbsp; Liste des Membres Présent</a></center>
</div><br><br><br>
<div class="row">
<center><a href="index.php?page=logout" style="text-decoration:none;" class="metal"><i class="fa fa-sign-out"></i> Se Déconnecter</a></center>
                <script>
                $('#example').DataTable({
                    "ordering": false
                });
                </script>

</div>
</div>
</div>
</form>