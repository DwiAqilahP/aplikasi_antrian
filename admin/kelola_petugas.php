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
    <link rel="stylesheet" href="../css/style_dsb.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
   <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title> Home/Kelola Petugas </title>
    <style type="text/css">
        table {
            margin: auto;
            font-family: "Arial";
            font-size: 12px;
         
        }
        .table {
            border-collapse: collapse;
            font-size: 13px;
            color: black;
        }
        .table th, 
        .table td {
            border-bottom: 1px solid #cccccc;
            border-left: 1px solid #cccccc;
            padding: 9px 21px;
            width: 150px;
        }
        .table th, 
        .table td:last-child {
            border-right: 1px solid #cccccc;
        }
        .table td:first-child {
            border-top: 1px solid #cccccc;
        }
        caption {
            caption-side: top;
            margin-bottom: 10px;
            font-size: 16px;
            color: black;
        }
         
        /* Table Header */
        .table thead th {
            background-color: lightgrey;
            color: black;
            text-align: center;
        }
         
        /* Table Body */
        .table tbody td {
            color: white;
            background-color: transparent;
            text-align: center;
        }

        /Tabel Responsive 1/
        .table-container {
            overflow: auto;
            color: black;
        }
        .daftar{
            color: white;
            text-align: center;
        }
        /* Penomoran otomatis pada baris */
        .table {
            counter-reset: serial-number;  /* Atur penomoran ke 0 */
        }
        .table a{
            color: white;
        }
        .table td:first-child:before {
            counter-increment: serial-number;  /* Kenaikan penomoran */
            content: counter(serial-number);  /* Tampilan counter */
        }
        .cari{
              margin-left: 55px;
            margin-top: 15px;
            color: white;
        }
        .button{
            position:relative;
            padding:6px 30px;
            left:-8px;
            border:2px solid #53bd84;
            background-color:#53bd84;
            color:#fafafa;
            text-decoration: none;
            margin-top: 10px;

        }
        .button:hover  {
            background-color:#fafafa;
            color:#207cca;
        }
    </style>
<?php include "../config/database.php"; ?>
</head>
<body>
   <input type="checkbox" id="menu-toggle">
   <input type="checkbox" id="menu-toggle">
      <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>A<span>dmin</span></h3>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <?php
                $id_profil = $_SESSION['id_profil'];
                $data = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
                while ($tampil = mysqli_fetch_array($data) ){ ?>
                <div class="profile-img bg-img" style="background-image: url('../admin/file/profil.jpg'); "> </div>
                <h4>Admin <?php echo $tampil['nama_instansi'];?></h4>
            </div>
            <?php } ?>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="dashboard.php" >
                            <span> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA+0lEQVR4nO3TIUsEYRSF4QfDslgWcQ2CBptRBIObbCZ/gMWm2WQx+wM2brBYjeatCoJgMRkMsmFxi10dGbgjyzguM462OfDCcL97z/m4M0OjP9Zc8C/awE2QPueVBJXVQR9jHAbjqHXqBuxjhHN0sRV0ozaKnsoB6xjiHj0sYoD3YBC1XvQMywbM4wwvOEYLR5hMGWRM4qwVva9RTz0KtYcnXGEVm7guMM5zh20s4wLPOJg2XsElHrGLhXiBbyXMMz7CfAk7eIiLrqUBJzhFe8Y6kpJka2uHZ+r9pdsaxkmO1OubZg38pEozTUDSrKhIzVekzt9caZ+/DvgEd/8Ok+Fl/gAAAAAASUVORK5CYII="></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                       <a href="kelola_petugas.php" class="active">
                            <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAmUlEQVR4nN3VsQ2DMBSE4b+iTU0GYAeUFcIcYQ+KmHnoM0HYAkidkupFkVxQWBTJ2Ypz0hV+zSf5STYkiO20iw2sQBUTMGCIDdiXTQeoYz8FFEAPLMAMOD+TAS5wt04JLAHgoQTmADApAQdcNucWuCqBwiM3X/mSj8AZOPg2QKkCTsAzsIP3rFYA484zcFcAn+YPAcv2P8g7L3oF1m/BIptYAAAAAElFTkSuQmCC"></span>
                            <small>Kelola Petugas</small>
                        </a>
                    </li>
                    <li>
                       <a href="hasil_rating.php">
                            <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAApklEQVR4nM3VMQrCMBjF8f8VOrTUuzh4GsFewNXZzaGncfAKYgeP8xUhYAmpTfmemgdZUvL9yOsQeMecazE/A9bGigcqYAvsgQtwBe4fzs2Ccx+Oib5vSuCVcwT0CIEaeERApwIaYAj7w+QmOwUQD2/C/incyg1Mq3kCm9Qhb0V1BiIFWiWQM9wFdIkfjLqiw8JwN5CT8gBzPjj2N0AVKwYwUWXfBUbf9+m5b/IQlwAAAABJRU5ErkJggg=="></span>
                            <small>Hasil Rating</small>
                        </a>
                    </li>
                    <li>
                       <a href="settings.php">
                            <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAACAElEQVR4nK2WzU5UQRCFP8MOuAPKBl5BfAUSf9A1YcRo2BvNEInOaiIsEDcsCC/AEyCJbnkDMI6aAZPZKAnsjOKMkPizGEmT06ZSNJeJ3koquemqPqfvqeq6F7qzMeAz8AP4BXwB7lKgLQF/nK8VSfAuQXAA9Pwv8BSwlQCPvgmUuwW7Lm3XgfvAK4E0gFlgFOiTj2ptWzkh9ypQAzaAmx48bPrkTvcTeAiMAM8l05H8LbAIDAMVFd7u3RXmX5tPgF+TRN9zJAqx23p7TzJnT99ywQcC7+SAR++IZCbRBKVIsmICDcliT76nYmbyCaBp4m3JtWPWXiv3xC4AqwrMSnMLfinRFBcVi3nPgMd6fgMM+g1lBS8D783G8jltHPNC4a/oeTqVHNkzJ0+WQ1ByBc/0XE0lV/+BYMDVIRKEw56yaSORHQ0TOQR3zpDolKyDKkws8qLZ2FRBvQ0B+yZvwci8qsY5sUwtFRO31XK+TaekeUknt+At7flg1lZsoQ7cJano8nS6vGiTwCO3/g3ojSRzLhiu/Q2RtHPAWwIfB3672FOrZ58GlCeZ0auHS1QHDuV1aT6sk3vwj37YBbulUVvT6I3jekfFCx3SLw/PT4zmLzXi1zXyw/6urKyPSiEfnLOsB/iaAA/jpDB7kSBYLpLgnrQNhQ+/LuEXJnxkzrVjxqAG8qJ7duAAAAAASUVORK5CYII="></span>
                            <small>Settings</small>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                <div class="header-menu"> 
                 <?php 
                  include "../config/database.php";
                  $data = mysqli_query($conn, "SELECT * FROM profil WHERE id_profil='$id_profil'");
                  while ($tampil = mysqli_fetch_array($data) ){
                  ?> 
                    <div class="user">
                        <div class="bg-img" style="background-image: url(../admin/file/<?php echo $tampil['logo2']?>)"></div>
                    
                        <a href="../logout.php">
                        <span class="las la-power-off"></span>
                        <span>Logout</span></a>

                  <?php } ?>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="main-content">     
        <main>
            <div class="page-header">
                <h1>KELOLA PETUGAS</h1>
                <small> Home/Kelola Petugas </small>
            </div>
        </main>
        <div class="cari">
            <a class="button" href="tambah_petugas.php">Tambah Petugas</a>
        </div>
        <div class="table-container">

             
    <table class="table" style="width: 95%;">
        <br>
        <thead>
            <tr>
                <th>NO</th>
                <th>Petugas</th>
                <th>Username</th>
                <th>Password</th>
                <th>Nama File Video</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $data_rating = mysqli_query($conn, "select * from login RIGHT JOIN pelayanan ON login.id_pelayanan = pelayanan.id_pelayanan where login.id_profil='$id_profil' and nama_pelayanan != 'admin'; ");
                while ($data = mysqli_fetch_assoc($data_rating)) {
                    ?>
                    <tr>
                        <td></td>
                        <td><?php echo  $data['nama_pelayanan']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['pw']; ?></td>
                        <td><?php echo $data['video_pelayanan']; ?></td>
                        <td>
                            <a href='delete_petugas.php?id_pelayanan=<?php echo $data['id_pelayanan']; ?>'>
                                <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAfUlEQVR4nO2TOwqAMBAFV8QD2HlGEewsBAsP4ekCVh5CsBhRUoQIJn4Igpkq2SVvYNmIOAAqYOTIBDRA4so4Cy9xUz8RKB3SAplRT4FO95Rv2KtIcEEweE7xI4EYd59zFEgc0U7cIuJH2zCX4ZMjmq0HV8ldgv6mZAEGO3AFubXkJdYsP0MAAAAASUVORK5CYII="></i></a>
                            </a>&nbsp; &nbsp; &nbsp;
                             <a href='edit.php?id_pelayanan=<?php echo $data['id_pelayanan']; ?>'>
                                <i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA9UlEQVR4nO3VMUrEQBTG8V1LBUtt7D2Ape4B1gvsVcRmA1oIFmLhWUQQ9AYuCDYqeAFrK/3J4AsMYQXXPMXCrxnmJfl/881LJoPBXxemmOEQ69nwxoeKwSueMc6GNzHfwHkYjbPgV536UqlFkrW+cHWC6vom3nCQAf/M5BY3WXCdXrT3TTPhra7nJcqC+8mVt/qH99+WkcXUfBkeBid4wCTGVPgQTziO+SouU+AB3IqHt6vaSnz2/eABKz+MFyx36ru94QG6C8hFrHwHR7hf+G2ZAy9HbK2SRPSkNH70bXgY7FfwR5xGgmEvcGVwhr2SJAX4m3oHlx4dUBV5vYAAAAAASUVORK5CYII="></i>
                            </a>
                        </td>
                    <?php } ?>
                    </tr>
        </tbody>
    </div>
</body>
</html>