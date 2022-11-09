<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'surat';
// error_reporting(0);

// $koneksi = mysqli_connect($hostname, $username, $password, $database);
$koneksi = new mysqli($hostname, $username, $password, $database);
// $koneksi = new PDO("mysql:host=localhost;dbname=surat","root","");
// if($koneksi->connect_error){
//     echo 'Koneksi Database Salah.';
//     exit();
// }

?>