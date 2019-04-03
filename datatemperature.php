<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=gaugechart;host=localhost","root","");
switch($_GET['q']){
		
		case 1:
		    $statement=$pdo->prepare("SELECT temperature FROM gauge ORDER BY id DESC LIMIT 0,1");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break; 
		
		default:
			
			$statement=$pdo->prepare("SELECT temperature FROM gauge ORDER BY id ASC");
			$statement->execute();
			$results=$statement->fetchAll(PDO::FETCH_ASSOC);
			$json=json_encode($results);
			echo $json;
		break;

}
?>