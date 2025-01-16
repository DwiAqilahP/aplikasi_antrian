<?php 
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengguna</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 50px;
            background-image: url("../admin/file/bg.png");
            font-family: arial;
            color: white
        }

        .container {
            margin-bottom: 50px;
            margin-right: 20%;
        }

        h2 {
            float: left;
        }

        .kembali {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            padding: 10px;
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pengguna</h2>
        <a href="../index.php" class="kembali">Kembali</a>
        <br><br>
        <form method="GET" action="">
            <div class="form-group" style="width: 300px;" >
                <input type="text" class="form-control" name="search" placeholder="Pencarian">
            </div>
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <br>
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>NO</th>
                    <th>ID Antrian</th>
                    <th>No. Antrian</th>
                    <th>Tanggal</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>No. NIK</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Status Perkawinan</th>
                    <th>Pekerjaan</th>
                    <th>Kewarganegaraan</th>
                    <th>Golongan Darah</th>
                    <th>Jenis Keperluan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody style="color: white">
                <?php
                // Menghubungkan ke database
                include "../config/database.php";
                $id_pelayanan = $_SESSION['id_pelayanan'];

                // Pagination
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 10; // Jumlah data per halaman
                $offset = ($page - 1) * $limit;

                // Search
                $search = isset($_GET['search']) ? $_GET['search'] : '';

                // Mendapatkan data dari tabel
                $sql = "SELECT * FROM user LEFT JOIN antrian ON antrian.id_antrian = user.id_antrian 
                        WHERE id_pelayanan = '$id_pelayanan' AND 
                              (nama LIKE '%$search%' OR 
                               alamat LIKE '%$search%' OR 
                               nik LIKE '%$search%' OR 
                               tempat_lahir LIKE '%$search%' OR 
                               tanggal_lahir LIKE '%$search%' OR 
                               jenis_kelamin LIKE '%$search%' OR 
                               agama LIKE '%$search%' OR 
                               status_perkawinan LIKE '%$search%' OR 
                               pekerjaan LIKE '%$search%' OR 
                               kewarganegaraan LIKE '%$search%' OR 
                               golongan_darah LIKE '%$search%' OR 
                               jenis_keperluan LIKE '%$search%')
                        LIMIT $offset, $limit";
                $result = $conn->query($sql);
                $no = $offset + 1;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['id_antrian'] . "</td>";
                        echo "<td>" . $row['no_antrian'] . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>" . $row['nik'] . "</td>";
                        echo "<td>" . $row['tempat_lahir'] . ", " . $row['tanggal_lahir'] . "</td>";
                        echo "<td>" . $row['jenis_kelamin'] . "</td>";
                        echo "<td>" . $row['agama'] . "</td>";
                        echo "<td>" . $row['status_perkawinan'] . "</td>";
                        echo "<td>" . $row['pekerjaan'] . "</td>";
                        echo "<td>" . $row['kewarganegaraan'] . "</td>";
                        echo "<td>" . $row['golongan_darah'] . "</td>";
                        echo "<td>" . $row['jenis_keperluan'] . "</td>";
                        echo "<td>";
                        echo "<a href='delete_user.php?id_user=" . $row['id_user'] . "' class='btn btn-danger btn-sm'>Hapus</a>";
                        echo "<a href='edit_user.php?id_user=" . $row['id_user'] . "' class='btn btn-primary btn-sm'>Edit</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='15'>Tidak ada data.</td></tr>";
                }
                ?>
            </tbody>
        </table>

       <!-- Pagination -->
        <?php
        include "../config/database.php";
        $id_pelayanan = $_SESSION['id_pelayanan'];
        $sql_count = "SELECT COUNT(id_user) AS total FROM user  LEFT JOIN antrian ON antrian.id_antrian = user.id_antrian 
                      WHERE id_pelayanan = '$id_pelayanan' AND 
                            (nama LIKE '%$search%' OR 
                             alamat LIKE '%$search%' OR 
                             nik LIKE '%$search%' OR 
                             tempat_lahir LIKE '%$search%' OR 
                             tanggal_lahir LIKE '%$search%' OR 
                             jenis_kelamin LIKE '%$search%' OR 
                             agama LIKE '%$search%' OR 
                             status_perkawinan LIKE '%$search%' OR 
                             pekerjaan LIKE '%$search%' OR 
                             kewarganegaraan LIKE '%$search%' OR 
                             golongan_darah LIKE '%$search%' OR 
                             jenis_keperluan LIKE '%$search%')";
        $result_count = $conn->query($sql_count);

        if ($result_count === false) {
            echo "Error executing query: " . $conn->error;
        } else {
            $row_count = $result_count->fetch_assoc();
            $total_pages = ceil($row_count['total'] / $limit);

            echo "<ul class='pagination'>";
            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<li class='page-item ";
                if ($i == $page) {
                    echo "active";
                }
                echo "'><a class='page-link' href='?page=$i&search=$search'>$i</a></li>";
            }
            echo "</ul>";
        }

        // Close the database connection
        $conn->close();
        ?>

    </div>
</body>
</html>
