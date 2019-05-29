<?php
$kelas = $_POST['kelas'];
$individu = $_POST['individu'];

$count = 3;
$pass = "['".$kelas."','".$individu."']";

$command = escapeshellcmd("C:\\Users\\ASUS\\AppData\\Local\\Programs\\Python\\Python36\\python.exe C:\\xampp\\htdocs\\foody\\insert.py \"$pass\" \"$count\" ");
exec($command, $output);

?>