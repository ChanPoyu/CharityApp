<?php
session_start();
$projectName = $_SESSION['projectName'];
$targetAmount = $_SESSION['targetAmount'];
$projectPurpose = $_SESSION['projectPurpose'];
$address = $_SESSION['address'];
$launchDate = $_SESSION['launchDate'];
$expireDate = $_SESSION['expireDate'];

$data = "this project is " . $projectName . $targetAmount. $projectPurpose . $wallet . $date;

$file = fopen("data/fundProjects.csv", "a");
flock($file, LOCK_EX);
fwrite($file, $projectName.",");
fwrite($file, $targetAmount.",");
fwrite($file, $projectPurpose.",");
fwrite($file, $address.",");
fwrite($file, $launchDate.",");
fwrite($file, $expireDate."\n");
flock($file, LOCK_UN);
fclose($file);

?>
