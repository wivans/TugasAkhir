<?php
$individu = $_POST['individu'];
$individu2 = $_POST['individu2'];

$count = 3;
$pass = "['".$individu."','".$individu2."']";
//echo $pass;

$command = escapeshellcmd("C:\\Users\\ASUS\\AppData\\Local\\Programs\\Python\\Python36\\python.exe C:\\xampp\\htdocs\\foody\\update.py \"$pass\" \"$count\" ");
exec($command, $output);

header('Location: index.php');


?>