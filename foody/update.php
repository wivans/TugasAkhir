<?php
$individu = $_POST['individu'];

$count = 3;
$pass = "['".$individu."']";

$command = escapeshellcmd("C:\\Users\\ASUS\\AppData\\Local\\Programs\\Python\\Python36\\python.exe C:\\xampp\\htdocs\\foody\\update.py \"$pass\" \"$count\" ");
exec($command, $output);

header('Location: index.php');

?>