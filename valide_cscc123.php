<?php
function verifie($data){
$conn = new PDO('mysql:host=localhost;dbname=recrutement','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
$sql="select * from presence_cscc where code_cscc = ?";
$query= $conn->prepare($sql);
$query->bindValue(1,$data,PDO::PARAM_STR);
$query->execute();
return $query->rowCount();
}
if(isset($_POST['data'])){
if(verifie($_POST['data'])<1){
try {
$conn = new PDO('mysql:host=localhost;dbname=recrutement','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
$sql="insert into presence_cscc(code_cscc,nom_cscc) VALUES (?,?)";
$query= $conn->prepare($sql);
$query->bindValue(1,$_POST['data'],PDO::PARAM_STR);
$query->bindValue(2,$_POST['nom'],PDO::PARAM_STR);
$query->execute();
}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
}
}
?>