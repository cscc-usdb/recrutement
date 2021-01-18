<!DOCTYPE html>
<html>
<head>
<title>
Plateforme de Recrutement
</title>
<link rel="icon" href="cscc.png">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>

<script language="javascript" src="js/jquery-1.11.1.min.js"></script>
<script language="javascript" src="js/script.js"></script>
<!--<script language="javascript" src="js/jquery-3.3.1.js" ></script>-->

<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>

</head>
<body>

<div class="container">
<?php 
session_start();
ini_set('display_errors', 0);
$pages = scandir('pages');
if(in_array($_GET['page'].'.php',$pages)){
	$contenu = $_GET['page'].'.php';
}
else {
	$contenu = 'Erreur.php';
}
if(isset($_GET['page'])){
include('pages/'.$contenu);
}
else {
	header("Location:index.php?page=recrute");
	exit();
}
?>
</div>
</body>
</html>