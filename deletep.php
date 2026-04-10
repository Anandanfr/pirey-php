<?php
include 'konek.php'; // koneksi database

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM jadwal WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil dihapus'); window.location='indexp.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
