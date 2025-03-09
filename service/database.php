<?php
$servername = "localhost";
$database = "scroll";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi Gagal : " . mysqli_connect_error);
}

?>