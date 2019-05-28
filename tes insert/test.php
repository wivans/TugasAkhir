<?php
$nama_makanan = $_POST['nama_makanan'];
$deskripsi_makanan = $_POST['deskripsi_makanan'];
$jumlah_porsi = $_POST['jumlah_porsi'];
$alamat = $_POST['lokasi'];
$kota = $_POST['kota'];
$tanggal = $_POST['tanggal'];

$count = 3;
$pass = "['".$nama_makanan."','".$deskripsi_makanan."','".$jumlah_porsi."','".$alamat."','".$kota."','".$tanggal."']";

$command = escapeshellcmd("C:\\Python27\\python.exe C:\\xampp7\\htdocs\\TA\\insert.py \"$pass\" \"$count\" ");
exec($command, $output);

?>