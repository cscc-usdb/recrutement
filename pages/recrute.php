<div class="row">
<div class="col-md-4"><br>
<a style="color:#8D90A1;" href="https://www.facebook.com/cscclub"><i class="fa fa-facebook"></i> https://www.facebook.com/cscclub</a><br>
<a style="color:#8D90A1;" href="https://www.youtube.com/cscclub"><i class="fa fa-youtube"></i> https://www.youtube.com/cscclub</a><br>
<a style="color:#8D90A1;" href="https://www.instagram.com/cscclub"><i class="fa fa-instagram"></i> https://www.instagram.com/cscclub</a><br>
</div>
<div class="col-md-8"><img src="cscc.png" width="60" height="60" /><span style="font-size:17px;"><b><span style="position:relative;top:-10px;">Formulaire de Recrutement au CSCClub</span><span style="position:relative;top:20px;left:-230px;">2018/2019</span></b></span></div>
</div><hr></hr>
<?php
function inscription($nom,$prenom,$dns,$email,$facebook,$tlf,$niveau,$autre,$branche,$arabe,$francais,$anglais,$create,$autre_cmpt,$rec){
	$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "INSERT INTO cscc_membres(nom_cscc,prenom_cscc,date_cscc,email_cscc,facebook_cscc,tlf_cscc,niveau_cscc,autre_cscc,branche_cscc,arabe_cscc,francais_cscc,anglais_cscc,creativite_cscc,autre_cmpt,recrute_cscc) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$query = $bdd->prepare($sql);
	$query->bindValue(1,$nom,PDO::PARAM_STR);
	$query->bindValue(2,$prenom,PDO::PARAM_STR);
	$query->bindValue(3,$dns,PDO::PARAM_STR);
	$query->bindValue(4,$email,PDO::PARAM_STR);
	$query->bindValue(5,$facebook,PDO::PARAM_STR);
	$query->bindValue(6,$tlf,PDO::PARAM_STR);
	$query->bindValue(7,$niveau,PDO::PARAM_STR);
	$query->bindValue(8,$autre,PDO::PARAM_STR);
	$query->bindValue(9,$branche,PDO::PARAM_STR);
	$query->bindValue(10,$arabe,PDO::PARAM_STR);
	$query->bindValue(11,$francais,PDO::PARAM_STR);
	$query->bindValue(12,$anglais,PDO::PARAM_STR);
	$query->bindValue(13,$create,PDO::PARAM_STR);
	$query->bindValue(14,$autre_cmpt,PDO::PARAM_STR);
	$query->bindValue(15,$rec,PDO::PARAM_STR);
	return $query->execute();
	$query->closeCursor();
}
function inscription_cmpt($nom_cmpt){
		$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "INSERT INTO cmpt_membres(nom_cmpt,id_cscc) VALUES(?,(SELECT id_cscc from cscc_membres where id_cscc = (SELECT max(id_cscc) from cscc_membres)))";
	$query = $bdd->prepare($sql);
	$query->bindValue(1,$nom_cmpt,PDO::PARAM_STR);
	return $query->execute();
	$query->closeCursor();
}
function inscription_disp($nom_disp){
		$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "INSERT INTO disponible_membres(jour_dispo,id_cscc) VALUES(?,(SELECT id_cscc from cscc_membres where id_cscc = (SELECT max(id_cscc) from cscc_membres)))";
	$query = $bdd->prepare($sql);
	$query->bindValue(1,$nom_disp,PDO::PARAM_STR);
	return $query->execute();
	$query->closeCursor();
}
	$recruteurs = array();
    $recruteurs[0] = "FETHI";
	$recruteurs[1] = "INIESTA";
	$recruteurs[2] = "BESBASA";
if(isset($_POST['submit'])){
	$k = rand(0,2);
	$rec = $recruteurs[$k];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$dns = $_POST['dns'];
	$email = $_POST['email'];
	$facebook = $_POST['fb'];
	$tlf = $_POST['tlf'];
	$niveau = $_POST['optradio'];
	$autre = $_POST['autre'];
	$branche = $_POST['branche'];
	$arabe = $_POST['rate'];
	$francais = $_POST['rate2'];
	$anglais = $_POST['rate3'];
	$create = $_POST['create'];
	$disponible = $_POST['disponible'];
	$cmpt_autre = $_POST['comp_autre'];
	if(inscription($nom,$prenom,$dns,$email,$facebook,$tlf,$niveau,$autre,$branche,$arabe,$francais,$anglais,$create,$cmpt_autre,$rec)){
	foreach($_POST['cmpt'] as $cm){
	inscription_cmpt($cm);
	}
	foreach($_POST['disponible'] as $dis){
	inscription_disp($dis);
	}
	echo "<div class='alert alert-success'>Inscription Avec Succés ! <b>Vous etes sur le Poste ".($k+1)."-".$rec."</b></div>";
	}
	else {
		echo "<div class='alert alert-danger'>Erreur !</div>";
	}
	unset($_POST);
}
?>
<form method="post" name="form1">
<div class="row">
<div class="col-md-6">
<span>(*)  <i class="fa fa-user"></i>Nom </span><input type="text" class="form-control" placeholder="Nom .." name="nom" style="height:32px;" required />
</div>
<div class="col-md-6">
<span>(*)  <i class="fa fa-check"></i> Prénom </span><input type="text" class="form-control" placeholder="Prénom .." id="prenom" name="prenom" style="height:32px;" required />
</div>
</div><br>
<div class="row">
<div class="col-md-10">
<span>(*)  <i class="fa fa-birthday-cake"></i> Date de Naissance </span><input type="date" class="form-control" placeholder="Date de Naissance .." id="dns" name="dns" style="height:32px;" required />
</div>
</div><hr></hr>
<div class="row">
<div class="col-md-6">
<span>(*)  <i class="fa fa-envelope"></i> Email </span><input type="email" class="form-control" placeholder="Email .." name="email" style="height:32px;" required />
</div>
<div class="col-md-6">
<span>(*)  <i class="fa fa-facebook"></i> Facebook </span><input type="text" class="form-control" placeholder="Facebook .." id="fb" name="fb" style="height:32px;" />
</div>
</div><br>
<div class="row">
<div class="col-md-10">
<span>(*)  <i class="fa fa-phone"></i> Téléphone </span><input type="text" class="form-control" placeholder="Téléphone .." name="tlf" style="height:32px;" required />
</div>
</div><hr></hr>
<div class="row">
<div class="col-md-10">
<span>(*)  <i class="fa fa-graduation-cap"></i> Niveau </span><div class="radio">
  <label><input type="radio" name="optradio" value="L1">L1</label>
  <label><input type="radio" name="optradio" value="L2">L2</label>
  <label><input type="radio" name="optradio" value="L3">L3</label>
  <label><input type="radio" name="optradio" value="M1">M1</label>
  <label><input type="radio" name="optradio" value="M2">M2</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<span><i class="fa fa-edit"></i> Autre </span><input type="text" class="form-control" placeholder="Autre .." name="autre" style="height:32px;" />
</div>
<div class="col-md-6">
<span><i class="fa fa-code"></i> Branche </span><input type="text" class="form-control" placeholder="Branche .." id="branche" name="branche" style="height:32px;" required />
</div>
</div><hr></hr>
 <div class="row">
    <div class="col-md-10">
	 <span>(*)  <i class="fa fa-language"></i> Niveau Langue</span><br><br>
	 <div class="row">
	 <div class="col-md-1">Arabe</div>
	 <div class="col-md-10">
      <div class="star-rating1 star-rating">
	  
        <span class="fa fa-star-o" data-rating="1"></span>
        <span class="fa fa-star-o" data-rating="2"></span>
        <span class="fa fa-star-o" data-rating="3"></span>
        <span class="fa fa-star-o" data-rating="4"></span>
        <span class="fa fa-star-o" data-rating="5"></span>
        <input type="hidden" name="rate" class="rating-value" value="2.56">
      </div>
	  </div>
    </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-10">
	<div class="row">
	<div class="col-md-1">Francais</div>
	<div class="col-md-10">
      <div class="star-rating2 star-rating">
	  
        <span class="fa fa-star-o" data-rating="1"></span>
        <span class="fa fa-star-o" data-rating="2"></span>
        <span class="fa fa-star-o" data-rating="3"></span>
        <span class="fa fa-star-o" data-rating="4"></span>
        <span class="fa fa-star-o" data-rating="5"></span>
        <input type="hidden" name="rate2" class="rating-value" value="2">
      </div>
	  </div>
    </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-10">
		<div class="row">
	<div class="col-md-1">Anglais</div>
	<div class="col-md-10">
      <div class="star-rating3 star-rating">
        <span class="fa fa-star-o" data-rating="1"></span>
        <span class="fa fa-star-o" data-rating="2"></span>
        <span class="fa fa-star-o" data-rating="3"></span>
        <span class="fa fa-star-o" data-rating="4"></span>
        <span class="fa fa-star-o" data-rating="5"></span>
        <input type="hidden" name="rate3" class="rating-value" value="1">
      </div>
    </div>
  </div>
  </div>
  </div>
 <hr></hr>
   <div class="row">
    <div class="col-md-10">
	<span>(*)  <i class="fa fa-magic"></i> Créativité</span><br><br>
		<div class="row">
	<div class="col-md-1">Créativité</div>
	<div class="col-md-10">
      <div class="star-rating4 star-rating">
        <span class="fa fa-star-o" data-rating="1"></span>
        <span class="fa fa-star-o" data-rating="2"></span>
        <span class="fa fa-star-o" data-rating="3"></span>
        <span class="fa fa-star-o" data-rating="4"></span>
        <span class="fa fa-star-o" data-rating="5"></span>
        <input type="hidden" name="create" class="rating-value" value="1">
      </div>
    </div>
  </div>
  </div>
  </div><hr></hr>
  <div class="row">
  <div class="col-md-10">
  <span>(*)  <i class="fa fa-html5"></i> Compétences </span>
  <div class="checkbox">
  <label><input type="checkbox" name="cmpt[]" value="Developpement Ex : (C++ , Java , Python , etc ..)">Développement Ex : (C++ , Java , Python , etc ..)</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="cmpt[]" value="Design Ex : (Photoshop , Illustrator , After Efect , etc ..)">Design Ex : (Photoshop , Illustrator , After Efect , etc ..)</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="cmpt[]" value="Web Ex : (DreamWeaver , Codeur , WebDesing , etc ..)">Web Ex : (DreamWeaver , Codeur , WebDesing , etc ..)</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="cmpt[]" value="System , Réseaux et Sécurité">System , Réseaux et Sécurité </label>
</div>
<input type="ext" name="comp_autre" class="form-control" placeholder ="Autre .." style="height:32px;">
  </div>
  </div><hr></hr>
  <div class="row">
  <div class="col-md-10">
  <span>(*)  <i class="fa fa-calendar"></i> Disponibilité</span><br><br>
  <label class="checkbox-inline"><input name="disponible[]" type="checkbox" value="Samedi">Samedi</label>
<label class="checkbox-inline"><input name="disponible[]" type="checkbox" value="Dimanche">Dimanche</label>
<label class="checkbox-inline"><input name="disponible[]" type="checkbox" value="Lundi">Lundi</label>
<label class="checkbox-inline"><input name="disponible[]" type="checkbox" value="Mardi">Mardi</label>
<label class="checkbox-inline"><input name="disponible[]" type="checkbox" value="Mercredi">Mercredi</label>
<label class="checkbox-inline"><input name="disponible[]" type="checkbox" value="Jeudi">Jeudi</label>
  </div>
  </div><hr></hr>
  <button type="submit" class="metal" name="submit">Valider <i class="fa fa-sign-in"></i></button><br><br>
</form>
<footer>&copy; Powered By <b>Mohamed Iniesta 2019</b></footer><br>