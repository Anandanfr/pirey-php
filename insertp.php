<?php
include 'konek.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $nama_praktikum = $_POST['nama_praktikum'];
    $tanggal = $_POST['tanggal'];
    $waktu_mulai = $_POST['waktu_mulai'];
    $waktu_selesai = $_POST['waktu_selesai'];
    $lokasi = $_POST['lokasi'];
    $nama_dosen = $_POST['nama_dosen'];
    $nama_asisten = $_POST['nama_asisten'];

    $sql = "INSERT INTO jadwal (id, nama_praktikum, tanggal, waktu_mulai, waktu_selesai, lokasi, nama_dosen, asisten)
            VALUES ('$id', '$nama_praktikum', '$tanggal', '$waktu_mulai', '$waktu_selesai', '$lokasi', '$nama_dosen', '$nama_asisten')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br />" . $conn->error;
    }
}

$conn->close();
?>