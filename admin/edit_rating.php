<?php 
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title> edit rating</title>
    <style type="text/css">
        body{
            margin: 0;
            padding: 0;
            width: 100%;
            background-image: url("../admin/file/bg.png");
            font-family: arial;
        }
        .cari{
            margin-top: 50px;
            color: white;
        }
    </style>

</head>
<body>
    <?php include "../config/database.php"; ?>
        <div class="table-container">

    <table class="table" style="width: 90%;margin-left: 50px;text-align: center; ;color: white">
        <br>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Rating</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody align="center">
            <?php
                $bulan= $_GET['bln'];
                $data_rating = mysqli_query($conn, "SELECT * FROM rating where month(tgl_rating) = '$bulan'");       
                while ($data = mysqli_fetch_assoc($data_rating)) {
                    ?>
            <tr>
                <td><?php echo $data['tgl_rating']?></td>
                <td><?php echo $data['rating']; ?></td>
                <td><?php echo $data['ket']?></td>
                <td>
                    <a href='hapus_rat.php?id_rating=<?php echo $data['id_rating']; ?>'>
                        <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAfUlEQVR4nO2TOwqAMBAFV8QD2HlGEewsBAsP4ekCVh5CsBhRUoQIJn4Igpkq2SVvYNmIOAAqYOTIBDRA4so4Cy9xUz8RKB3SAplRT4FO95Rv2KtIcEEweE7xI4EYd59zFEgc0U7cIuJH2zCX4ZMjmq0HV8ldgv6mZAEGO3AFubXkJdYsP0MAAAAASUVORK5CYII="></i></a>
                    </a>&nbsp; &nbsp; &nbsp;
                    <a href='edit_rat.php?id_rating=<?php echo $data['id_rating']; ?>'>
                        <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA9UlEQVR4nO3VMUrEQBTG8V1LBUtt7D2Ape4B1gvsVcRmA1oIFmLhWUQQ9AYuCDYqeAFrK/3J4AsMYQXXPMXCrxnmJfl/881LJoPBXxemmOEQ69nwxoeKwSueMc6GNzHfwHkYjbPgV536UqlFkrW+cHWC6vom3nCQAf/M5BY3WXCdXrT3TTPhra7nJcqC+8mVt/qH99+WkcXUfBkeBid4wCTGVPgQTziO+SouU+AB3IqHt6vaSnz2/eABKz+MFyx36ru94QG6C8hFrHwHR7hf+G2ZAy9HbK2SRPSkNH70bXgY7FfwR5xGgmEvcGVwhr2SJAX4m3oHlx4dUBV5vYAAAAAASUVORK5CYII="></i>
                    </a>
                </td>
            </tr>
            <?php  }?>
        </tbody>
    </table>
</body>
</html>