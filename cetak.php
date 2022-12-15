<?Php
require('fpdf/fpdf.php');
session_start();
require "koneksi.php"; //connection to database
//SQL to get 10 records
// $sql = "select * from produk LIMIT 0,10";

$pdf = new FPDF();
$pdf->AddPage();

$width_cell = array(20, 50, 40, 40, 40);
$pdf->SetFont('Arial', 'B', 16);

//Background color of header//
$pdf->SetFillColor(193, 229, 252);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0], 10, 'Nomor', 1, 0, 'C', true);
//Second header column//
$pdf->Cell($width_cell[1], 10, 'Nama Pesanan', 1, 0, 'C', true);
//Third header column//
$pdf->Cell($width_cell[2], 10, 'Harga', 1, 0, 'C', true);
//Fourth header column//
$pdf->Cell($width_cell[3], 10, 'Jumlah', 1, 0, 'C', true);
//Third header column//
$pdf->Cell($width_cell[4], 10, 'Subharga', 1, 1, 'C', true);
//// header ends ///////

$pdf->SetFont('Arial', '', 14);
//Background color of header//
$pdf->SetFillColor(235, 236, 236);
//to give alternate background fill color to rows// 
$fill = false;
$nomor = 1;
$total = 0;
/// each record is one row  ///

foreach ($_SESSION["pesanan"] as $id_menu => $jumlah) {
    $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
    $pecah = $ambil->fetch_assoc();
    $subharga = $pecah["harga"] * $jumlah;
    $pdf->Cell($width_cell[0], 10, $nomor++, 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[1], 10, $pecah['nama_menu'], 1, 0, 'L', $fill);
    $pdf->Cell($width_cell[2], 10, 'Rp.' . number_format($pecah["harga"]), 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[3], 10, $jumlah, 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[4], 10, 'Rp.' . number_format($subharga), 1, 1, 'C', $fill);
    $total += $subharga;
    $fill = !$fill;
}
$pdf->Cell($width_cell[0], 10, '', 0, 0,);
$pdf->Cell($width_cell[1], 10, '', 0, 0,);
$pdf->Cell($width_cell[2], 10, '', 0, 0,);
$pdf->Cell($width_cell[3], 10, 'Total', 1, 0,'C');
$pdf->Cell($width_cell[4], 10, 'Rp.' . number_format($total), 1, 1, 'C', $fill);

$pdf->Output();
