<?php
require('fpdf/fpdf.php');
include 'konek.php'; // file koneksi database

class PDF extends FPDF {
    // Header
    function Header() {
        // Logo (opsional)
        // $this->Image('logo.png',10,6,30);

        // Judul
        $this->SetFont('Arial','B',16);
        $this->Cell(0,10,'Laporan Jadwal Praktikum',0,1,'C');
        $this->Ln(5);
    }

    // Footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF('L','mm','A4'); // Landscape, ukuran A4
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

// Header tabel
$pdf->Cell(10,10,'ID',1,0,'C');
$pdf->Cell(50,10,'Nama Praktikum',1,0,'C');
$pdf->Cell(30,10,'Tanggal',1,0,'C');
$pdf->Cell(30,10,'Waktu Mulai',1,0,'C');
$pdf->Cell(30,10,'Waktu Selesai',1,0,'C');
$pdf->Cell(40,10,'Lokasi',1,0,'C');
$pdf->Cell(40,10,'Nama Dosen',1,0,'C');
$pdf->Cell(40,10,'Nama Asisten Lab',1,1,'C');

// Ambil data dari database
$sql = "SELECT * FROM jadwal";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pdf->Cell(10,10,$row['id'],1,0,'C');
        $pdf->Cell(50,10,$row['nama_praktikum'],1,0,'L');
        $pdf->Cell(30,10,$row['tanggal'],1,0,'C');
        $pdf->Cell(30,10,$row['waktu_mulai'],1,0,'C');
        $pdf->Cell(30,10,$row['waktu_selesai'],1,0,'C');
        $pdf->Cell(40,10,$row['lokasi'],1,0,'L');
        $pdf->Cell(40,10,$row['nama_dosen'],1,0,'L');
        $pdf->Cell(40,10,$row['nama_asisten'],1,1,'L');
    }
} else {
    $pdf->Cell(0,10,'Tidak ada data jadwal',1,1,'C');
}

$conn->close();

// Output PDF
$pdf->Output();
?>
