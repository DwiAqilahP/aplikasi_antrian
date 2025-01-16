<?php 
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<?php
include "../config/database.php";
require_once '../phpqrcode/qrlib.php'; // Sesuaikan dengan jalur file qrlib.php
$id_pelayanan = $_SESSION['id_pelayanan'];
// URL halaman formulir dengan parameter ID antrian
$id_antrian = mysqli_query($conn, "SELECT id_antrian,no_antrian FROM antrian WHERE id_pelayanan = '$id_pelayanan' ORDER BY id_antrian DESC LIMIT 1");
$tampil = mysqli_fetch_assoc($id_antrian);

$id_antrian = $tampil['id_antrian']; // Sesuaikan dengan logika bisnis Anda
$formulirURL = 'http://apkantrian.com/user/formulir.php?id_antrian=' . $id_antrian;

// Membuat barcode menggunakan library PHPQRCode
QRcode::png($formulirURL, 'barcode1.png', QR_ECLEVEL_L, 10);

// Menampilkan gambar barcode
echo '<img src="barcode1.png" alt="Barcode">';
?>
