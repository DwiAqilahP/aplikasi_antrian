<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
?>
<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // panggil file "database.php" untuk koneksi ke database
  require_once "../config/database.php";
  $id_pelayanan = $_SESSION['id_pelayanan'];
  // mengecek data post dari ajax
  if (isset($_POST['id_antrian'])) {
    // ambil data hasil post dari ajax
    $id = mysqli_real_escape_string($conn, $_POST['id_antrian']);
    // tentukan nilai status
    $status = "1";
    // ambil tanggal dan waktu update data
    $updated_date = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

    // sql statement untuk update data di tabel "tbl_antrian" berdasarkan "id"
    $update = mysqli_query($conn, "UPDATE antrian
                                     SET status='$status', update_date='$updated_date'
                                     WHERE id_antrian='$id' and id_pelayanan='$id_pelayanan'")
                                     or die('Ada kesalahan pada query update : ' . mysqli_error($conn));
  }
}
