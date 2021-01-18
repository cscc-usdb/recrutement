<?php
function login_cscc($user,$password){
	$bdd = new PDO("mysql:host=localhost;dbname=recrutement;charset=utf8","root","");
	$sql = "SELECT * FROM recruteur_cscc where username_recrute = ? and password_recrute = ?";
	$query = $bdd->prepare($sql);
	$query->bindValue(1,$user,PDO::PARAM_STR);
	$query->bindValue(2,sha1($password),PDO::PARAM_STR);
	$query->execute();
    return $query->rowCount();
	$query->closeCursor();
}
?>
<style>
		fieldset {
      display: block;
      margin: 20px 1%;
      margin-bottom: 20px;
      padding: 0 auto;
      padding: 25px 0;
      border: 1px solid #5DA493;
      border-top: 1px solid #5DA493;
      width: 100%;
	  
}

legend {
     display: table; 
     min-width: 0px;
     max-width: 60%;
     position: relative;

     color: #eee8aa;
     font-size: 20px;
     text-align: center;
}
</style>
<div class="row"><br><br><br>
<div class="col-md-3"></div>
<div class="col-md-6">
<fieldset>
	<legend class="scheduler-border"><center class="alert alert-info"><img src="cscc.png" width="30" height="30" /> &nbsp;Authenitification</center></legend>
<form method="post" name="form4">

<?php
if(isset($_POST['connect'])){
	$user = $_POST['user'];
	$password = $_POST['pass'];
	$cn = login_cscc($user,$password);
	if($cn>0){
		$_SESSION['user'] = strtoupper($user);
		header("Location:index.php?page=administration");
		exit();
	}
	else{
		echo "<div class='alert alert-danger'>Nom Utilisateur ou Mot de Passe Incorrect !</div>";
	}
}
?>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-8">
<img src="cscc.png" class="img-fluid" width="150" height="150" />
</div>
</div>

<br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<input type="text" class="form-control" name="user" placeholder="Nom Utilisateur .." /><hr></hr>
</div>
</div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<input type="password" class="form-control" name="pass" placeholder="Mot de Passe .." /><br>
</div>
</div>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-8">
<button type="submit" name="connect" class="metal">Se Connecter <i class="fa fa-sign-in"></i></button>
</div>
</div>
<br>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-8">
<b>&copy; </b>Copyright Mohamed Iniesta 2019
</div>
</div>

</form>
</div>
</fieldset>
</div>