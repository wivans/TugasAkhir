<?php
$entity = $_GET['entity'];

$count = 3;
$pass = "['".$entity."']";

$command = escapeshellcmd("C:\\Users\\ASUS\\AppData\\Local\\Programs\\Python\\Python36\\python.exe C:\\xampp\\htdocs\\foody\\delete.py \"$pass\" \"$count\" ");
exec($command, $output);

header('Location: index.php');

?>