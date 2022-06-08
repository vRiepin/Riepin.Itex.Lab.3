<?php
include "db.php";
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');
$chief = $_REQUEST['chiefValue'];
$sqlSelect = $dbh->prepare(
    "SELECT * FROM $db.worker  
    join $db.department on $db.worker.FID_DEPARTMENT = $db.department.ID_DEPARTMENT 
    WHERE $db.department.chief = :chief");
$sqlSelect->execute(array('chief' => $chief));
$cell = $sqlSelect->fetchAll(PDO::FETCH_OBJ);
echo json_encode($cell);
?>