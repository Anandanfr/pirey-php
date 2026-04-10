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

    $sql = "UPDATE jadwal SET 
                nama_praktikum='$nama_praktikum',
                tanggal='$tanggal',
                waktu_mulai='$waktu_mulai',
                waktu_selesai='$waktu_selesai',
                lokasi='$lokasi',
                nama_dosen='$nama_dosen',
                nama_asisten='$nama_asisten'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: indexp.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Ambil ID dari URL
$id = $_GET['id'];
$sql = "SELECT * FROM jadwal WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head><title>Edit Jadwal Praktikum</title></head>
<body>
    <h2>Edit Jadwal Praktikum</h2>
    <!-- action diarahkan ke file yang sama -->
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="text" name="nama_praktikum" value="<?= $row['nama_praktikum'] ?>"><br>
        <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>"><br>
        <input type="time" name="waktu_mulai" value="<?= $row['waktu_mulai'] ?>"><br>
        <input type="time" name="waktu_selesai" value="<?= $row['waktu_selesai'] ?>"><br>
        <input type="text" name="lokasi" value="<?= $row['lokasi'] ?>"><br>
        <input type="text" name="nama_dosen" value="<?= $row['nama_dosen'] ?>"><br>
        <input type="text" name="nama_asisten" value="<?= $row['nama_asisten'] ?>"><br>
        <button type="submit">Update</button>
    </form>
    <a href="indexp.php">Kembali ke Daftar Praktikum</a>
</body>
</html>
