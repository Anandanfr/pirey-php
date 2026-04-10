<center><h2>Form Jadwal Praktikum</h2></center>

<form action="insertp.php" method="post">
    <table>
        <tr>
                <td><label for="nama_praktikum">Nama Praktikum:</label></td>
                <td><input type="text" id="nama_praktikum" name="nama_praktikum" required></td>
            </tr>
        <tr>
                <td><label for="tanggal">Tanggal:</label></td>
                <td><input type="date" id="tanggal" name="tanggal" required></td>
            </tr>
            <tr>
                <td><label for="waktu_mulai">Waktu Mulai:</label></td>
                <td><input type="time" id="waktu_mulai" name="waktu_mulai" required></td>
            </tr>
            <tr>
                <td><label for="waktu_selesai">Waktu Selesai:</label></td>
                <td><input type="time" id="waktu_selesai" name="waktu_selesai" required></td>
            </tr>
            <tr>
        <td><label for="lokasi">Lokasi:</label></td>
                <td><input type="text" id="lokasi" name="lokasi" required></td>
            </tr>
            <tr>
                <td><label for="nama_dosen">Nama Dosen:</label></td>
                <td><input type="text" id="nama_dosen" name="nama_dosen" required></td>
            </tr>
            <tr>
                <td><label for="nama_asisten">Nama Asisten Lab:</label></td>
                <td><input type="text" id="nama_asisten" name="nama_asisten" required></td>
            </tr>
        <! tombol submit >
            <tr>
                    <td colspan='2'><input type='submit' value='Simpan'></td>
            </tr>
    </table>
</form>
<?php
include 'konek.php'; // koneksi ke database praktikum_db

$sql = "SELECT * FROM jadwal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2 style='text-align:center;'>Daftar Jadwal Praktikum</h2>";
    echo "<table border='1' cellspacing='0' cellpadding='8' style='margin:auto;'>";
    echo "<div style='text-align:center; margin-top:15px;'>
            <a href='laporan_pdf.php' target='_blank'>Download Laporan PDF</a>
          </div>";
    echo "<tr>
            <th>ID</th>
            <th>Nama Praktikum</th>
            <th>Tanggal</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Lokasi</th>
            <th>Nama Dosen</th>
            <th>Nama Asisten</th>
            <th>Aksi</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama_praktikum"] . "</td>";
        echo "<td>" . $row["tanggal"] . "</td>";
        echo "<td>" . $row["waktu_mulai"] . "</td>";
        echo "<td>" . $row["waktu_selesai"] . "</td>";
        echo "<td>" . $row["lokasi"] . "</td>";
        echo "<td>" . $row["nama_dosen"] . "</td>";
        echo "<td>" . $row["nama_asisten"] . "</td>";
        echo "<td>
                <a href='editp.php?id=" . $row['id'] . "'>Edit</a> ||
                <a href='deletep.php?id=" . $row['id'] . "' onclick=\"return confirm('Hapus data?')\">Delete</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
    
} else {
    echo "<p style='text-align:center;'>Tidak ada data jadwal praktikum.</p>";
}

$conn->close();
?>


<style>
        body { font-family: Arial; margin: 20px; background: #f9f9f9; }
        table { border-collapse: collapse; margin: auto; }
        td { padding: 8px; }
        input, select { padding: 6px; width: 250px; }
        input[type=submit] { width: 100%; background: #28a745; color: white; border: none; cursor: pointer; }
        input[type=submit]:hover { background: #218838; }
        h2 { text-align: center; }
        .list { margin-top: 30px; }
        th, td { border: 1px solid #ccc; text-align: center; }
        th { background: #007bff; color: white; }
        tr:nth-child(even) { background: #f2f2f2; }
    </style>