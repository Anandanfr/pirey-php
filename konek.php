<?php
// Konfigurasi koneksi ke database MySQL.
$servername = "localhost";
$username = "root"; // Ganti jika perlu.
$password = "";     // Ganti jika perlu.
$dbname = "praktikum_db";

// Membuat koneksi.
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>