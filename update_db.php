<?php
include("connection.php");
$db=$conn;
$c1 = $_POST["c1"];
$c2 = $_POST["c2"];
$amount = $_POST["amount"];

$sql1 = "UPDATE customers SET balance = balance - '{$amount}'  WHERE name = '{$c1}';";
$sql2 = "UPDATE customers SET balance = balance + '{$amount}'  WHERE name = '{$c2}';";
if(mysqli_query($db,$sql1) && mysqli_query($db,$sql2)){
	echo json_encode(array('update' => 'success'));
	$sql3 = "insert into transaction(c1, c2, Amount) values('{$c1}', '{$c2}', {$amount}) ";
	mysqli_query($db,$sql3);
}else{
	echo json_encode(array('update' => 'failed'));
}

?>