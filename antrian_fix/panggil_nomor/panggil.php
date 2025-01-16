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
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
      <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

    <style type="text/css">
        .dataTables_paginate .paging_simple_numbers {
             display: inline-block;
        }
        .table {
          --bs-table-striped-bg: transparent;
          vertical-align: middle;
        }

        .table>:not(:last-child)>:last-child>* {
          border-bottom-color: #dee2e6;
        }

        tbody, td, tfoot, th, thead, tr {
          border-color: #ebedf2 !important;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
          margin: 20px 0 2px;
          white-space: nowrap;
          justify-content: flex-end;
        }

        div.dataTables_wrapper div.dataTables_info {
          padding-top: 1.8em;
        }

        table.table-bordered.dataTable th {
          border-bottom-width: 2px;
          font-weight: 600;
        }


    </style>
</head>
<body>
    <?php include "../config/database.php"; ?>
    <div class="main-content">     
        <main>
            <?php 
            $id_pelayanan = $_SESSION['id_pelayanan'];
            $query = mysqli_query($conn, "SELECT * FROM pelayanan WHERE id_pelayanan='$id_pelayanan'");
            while ($tmpl = mysqli_fetch_array($query) ){
            ?>
            <div class="page-header">
                <h1>Panggil Nomor Antrian <?php echo $tmpl['nama_pelayanan'] ?></h1>
            </div>
            <?php } ?>

             <div class="page-content">
            
                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <h2 id="jumlah-antrian"></h2>
                            <span><img src="data:image/png;base64,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"></span>
                        </div>
                        <div class="card-progress">
                            <small>Jumlah Antrian</small>
                    
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2 id="antrian-sekarang"></h2>
                            <span><img src="data:image/png;base64,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"></span>
                        </div>
                        <div class="card-progress">
                            <small>Nomor Antrian Sekarang</small>
                          
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2 id="antrian-selanjutnya"></h2>
                            <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAESklEQVR4nO2cT4hVVRzHP05WCIJWkFkt01ZB6WoWLkIhTSiLcEYQDNKKVFqUaLTxz2YYNF25sk3gTugPlLM3GxWUVjFmu5ah5v+cpvnFoZ8wDe89773v3nt+75zfB74wvLnv/M77fe87795zfvdAHJYBo8AxYAK4DFwD7quu6WsTesyovsfpgyeBXcAFQCpoFjivbYS2nII8BxwFbldMvHRQaOsL4Fl3oTsLgY+BmzUmXubpDrAfeMyN+D8rgUsNJl7mKcRa4Sb8x1sNn/XSRSHmptxNeBf4O0LyRTUDfECmvB8x8TJPu8lw2JkxkHiZ8014k0x4AbhhIOkyT7eAF0mcR1u+2pGSuqR9TJa9BpIsD9GnJHyHW+fdrTQ4FC0nQY4aSK4U1GES46kBOftFdVv7nAy7DSRVSmonCVF1SjmmzpEIT+vcvAyYZlNZ1NliIJlSUSMkwDEDiZSKClduA8+EgURKRf1AAvxmIJFSUVdIgKsGEikV9QcJcN9AIqWi/iIB3IDI+BAUmSsGhhLJ+UfYL0Mj4zdikRk1MJRIRW0mAXwyzgDnDZzNUlKTJMSuHh90Y8R+bezRr4/IZEny10jVyo9r7CyWJNH6/G5n23iE/hzOaVEefTjiVo/Vp7db7Ms7PVbpQtX0MyTKnh5nXfjav9pCH9Y+pELjEzIuTbwLbGgw/usao1v8i6mXJhYpzg1DwxjwSI0xh7Qscib34twHbCpQnv4TMFxDrGFtq1es0Jc3yIwdBcpVwv+/Bl7Ts7go4duzHvimYIzQlyzZUeJBjd+BE8B7wCrgeWCRKvy9GtgOfKnHFmlzJufkzx2OYjywcSPHYacbK1p+cOOiXgw4c/AHtY0QHo440sBWBUdSvsNtcrOOcxWLe2d1SjmUmftmHTUs6oxoreZpYEqrLR5sV3NVXzutx4zoexzHcRzH6cITwFbgFPAdsKaFTK3RWKc09tIc3RnWBEx3uHyc1MeaFtcYb7G2Odkh3rT2pY6ZV/OsA84WvI6/B3wLbNOpiqEScYb0Pdt0RvRewZhntY/JEe5AT/Z5N3sTOKMzomHBZh/woWqfvnZCj+l3B66TqTwhie7Dc73FiTapSddTmC0NuyD+YyCZUlGzusviwLEAOG4ggVKTjutnGhgOGkia1KwDDAjbDSRLGlLZetH9HdoIO0U2xiuRt6GUhjWtn9GkAQt1qU8S188lirdaNeBzA8mRlvSZNQOWl7jbTEF3C+4r15oB4waSIi1rzIoBS4A/DSREItQVLbVgQE5jv5T8LWjFgCkDiZBIuhzbgJcNJEEi66WYBhwykAAxPEXRuAG/GEiARNZUTAOc3rgBkXEDIuMG1MC6PvRVh9+A8T7bzA4xpuwQY8oOMabsEGPKjrE+9GOHBH7fZ5tOCfwyNDJuQGTcgMi4AZFxAyLjBkTGDYiMGxAZNyAybkBk3IDIuAGRcQMi4waQmAH/Agx3W8h1iqpjAAAAAElFTkSuQmCC"></span>
                        </div>
                        <div class="card-progress">
                            <small>Nomor Antrian Selanjutnya</small>
                        
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2 id="sisa-antrian"></h2>
                            <span><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAAEAElEQVR4nO2dS4hURxSGv4xREYREhahJljFZCT5Ws3AhCmqExIg4ExAU1FF8kIUJUdyYuBGZUVeuzNKdkMSFzj7oaGDEVfC1cym+3+NkTig8wmSYbm/fubfrdNX54Ifhzu17qv+6XX2r6lQ1xGE+0AucAgaBm8AD4LXqgR4b1HN69TXOFJgL7AP+BqSExoCreo1wLacgnwEngWcljZdJFK51AvjUa6ExHwI/AE8qNF4m6DlwBJjhFfF/vgSu1Wi8TFCItcgr4S3f1XzXSwOFmBtyr4RtwJsI5otqFNhFpvRFNF4maD8ZNjujBoyXcZ+Eb8mEL4DHBkyXCXoKfEXiTG/z0460qGtaxmT52YDJ8h79SMI93Cp7t1JjU7SQBDlpwFwpqH4SY16H3P2ieqZlTob9BkyVFrWXhCg7pBxTV0iET3RsXjpMY6lM6nxvwEwpqR4S4JQBI6WkwpNbxzNowEgpqQskwB0DRkpJ3SYB7hswUkrqHgnw2oCRUlKvSACvgMh4ExSZ2waaEsn5S9gfQyPjHbHI9BpoSqSkNpMAPhhngKsG7mZpUUMkxL4mb3R9xHKtb1KuPWQyJXkrUrbyTI2dxZQkmp/f6G47HqE8/TlNyqOLI542mX3a2MaybGoySxeypheQKD81uevCx35lG8qw6j0ZGgfIODXxBbCuxvhfa4xG8YdTT00skpwbmoZjwLQKY3ZpWuRo7sm579hQID39MtBdQaxuvVazWKEs35AZOwukq4T//w6s0bu4KOHTsxb4o2CMUJYs2dnCQo27wBlgO7AM+ByYpQp/Lwd2AL/puUWuOZqz+eOboxgLNh7n2Ow0YlGbF24M68OAMw5fqG2EsDhioIatCgZS7uHWuVnHlZLJvWM6pBzSzH2zjgomdXo0V/MicEOzLd5tV3Nfj13Uc3r0NY7jOI7jNGAOsAU4B5wHVrTBqRUa65zG/jjH2ulWA0YmeXwc0mVNsyuMN1uvOTRJvBEtSxUjr+ZZDVwq+Bz/EvgT2KpDFV0txOnS12zVEdGXBWNe0jImR+iBnp1ib/YJ8JeOiIYJm4PAbtVBPXZGz5nqDlxnU1khie7D87CNA21SkR6mMFoadkH814CZUlJjustix/EBcNqAgVKRTut76hh+NWCaVKxf6BB2GDBLapL5fNGlkbehlJo1ou/R7IzWsAGTpGZdt5q8ddiAOdImHcLgNGLR3mYKemFtX7njBkyRNiv0vE3wEfDIgCESIa/IxEhqTm2/WPwuuGHACImk8Ls1UVliwASJrMUxK+CoAQMk5yGKfwwYIJEVmmDHcRwn3d+66TOk7BBjyg4xpuwQY8oOMabs6DMmx3Ecx3Ecx3Ecx3Ecx3Ecx6Fm/gPPSsQchbg7mgAAAABJRU5ErkJggg=="></span>
                        </div>
                        <div class="card-progress">
                            <small>Sisa Antrian</small>
                            
                        </div>
                    </div>

                </div>
            <div>
                <table width="100%" border="1" id="tabel-antrian" style="text-align: center;" class="table table-bordered table-striped table-hover"  >
                  <thead>
                    <tr>
                      <th style="text-align: center; border: 1;">Nomor Antrian</th>
                      <th>Status</th>
                      <th style="text-align: center;">Panggil</th>
                    </tr>
                  </thead>
                </table>
            </div>
            
        </main> 
    </div>
    <!-- load file audio bell antrian -->
  <audio id="tingtung" src="../audio/tingtung.mp3"></audio>

  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <!-- DataTables -->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <!-- Responsivevoice -->
  <!-- Get API Key -> https://responsivevoice.org/ -->
  <script src="https://code.responsivevoice.org/responsivevoice.js?key=jQZ2zcdq"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      // tampilkan informasi antrian
      $('#jumlah-antrian').load('get_jumlah_antrian.php');
      $('#antrian-sekarang').load('get_antrian_sekarang.php');
      $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php');
      $('#sisa-antrian').load('get_sisa_antrian.php');

      // menampilkan data antrian menggunakan DataTables
      var table = $('#tabel-antrian').DataTable({
        "lengthChange": false,              // non-aktifkan fitur "lengthChange"
        "searching": false,                 // non-aktifkan fitur "Search"
        "ajax": "get_antrian.php",          // url file proses tampil data dari database
        // menampilkan data
        "columns": [{
            "data": "no_antrian",
            "width": '250px',
            "className": 'text-center'
          },
          {
            "data": "status",
            "visible": false
          },
          {
            "data": null,
            "orderable": false,
            "searchable": false,
            "width": '100px',
            "className": 'text-center',
            "render": function(data, type, row) {
              // jika tidak ada data "status"
              if (data["status"] === "") {
                // sembunyikan button panggil
                var btn = "-";

              } 
              // jika data "status = 0"
              else if (data["status"] === "0") {
                // tampilkan button panggil
                var btn = "<button style=\"display: inline-block;padding: 15px 20px;font-size: 15px;cursor: pointer;text-align: center;text-decoration: none;outline: none;color: #fff;background-color: #4CAF50;border: none;border-radius: 50%;\"><i> <img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABSElEQVR4nN2VMUpDQRCGP6zVNKZW8AKSysLGNFok5DSKjYqF4AlS6RHUWqMmQTyEHkElAZPOYmXhDyyP99zZZEHwhylm5p/5386+3QU7OsAAmMr6QJvMuABchZ3nEumo4TdwAKwBdeBQMZ9r5RAaqJlvXMSRck85hCbBmJ6D+EsQ/8ohFO6HX11xpU6WTWjevBnOMDqXW+j/jc79Ysl4AHoLCD2qRxTFwlQhZ13hVMSVkgNbZZ/irsr3NVG8ibwlv28Quhe3If/VInQl8rH8tkFoX9xT+ZcWoabI7xoFegqqRM7EqQEfiu1ixFAF18CSYi3d0hPZHbCnnOfclhzqKDaBcSDmv7YKNeBG3LFqk7ANjNTAj+REm72sP7Kh2GxcI9XMhQ0dvtjP0APWyYAdoFsi0FUuOxa+3/5caJhw14WPYjKsItEV/gCRwdgC/nuYQQAAAABJRU5ErkJggg==\"></i></button>";
              } 
              // jika data "status = 1"
              else if (data["status"] === "1") {
                // tampilkan button ulangi panggilan
                var btn = "<button style=\"display: inline-block;padding: 15px 20px;font-size: 15px;cursor: pointer;text-align: center;text-decoration: none;outline: none;color: #fff;background-color: grey;border: none;border-radius: 50%;\" ><i ><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABSElEQVR4nN2VMUpDQRCGP6zVNKZW8AKSysLGNFok5DSKjYqF4AlS6RHUWqMmQTyEHkElAZPOYmXhDyyP99zZZEHwhylm5p/5386+3QU7OsAAmMr6QJvMuABchZ3nEumo4TdwAKwBdeBQMZ9r5RAaqJlvXMSRck85hCbBmJ6D+EsQ/8ohFO6HX11xpU6WTWjevBnOMDqXW+j/jc79Ysl4AHoLCD2qRxTFwlQhZ13hVMSVkgNbZZ/irsr3NVG8ibwlv28Quhe3If/VInQl8rH8tkFoX9xT+ZcWoabI7xoFegqqRM7EqQEfiu1ixFAF18CSYi3d0hPZHbCnnOfclhzqKDaBcSDmv7YKNeBG3LFqk7ANjNTAj+REm72sP7Kh2GxcI9XMhQ0dvtjP0APWyYAdoFsi0FUuOxa+3/5caJhw14WPYjKsItEV/gCRwdgC/nuYQQAAAABJRU5ErkJggg==\"></i></button>";
              };
              return btn;
            }
          },
        ],
        "order": [
          [0, "desc"]             // urutkan data berdasarkan "no_antrian" secara descending
        ],
        "iDisplayLength": 10,     // tampilkan 10 data per halaman
      });

      // panggilan antrian dan update data
      $('#tabel-antrian tbody').on('click', 'button', function() {
        // ambil data dari datatables 
        var data = table.row($(this).parents('tr')).data();
        // buat variabel untuk menampilkan data "id"
        var id_antrian = data["id_antrian"];
        // buat variabel untuk menampilkan audio bell antrian
        var bell = document.getElementById('tingtung');

        // mainkan suara bell antrian
        bell.pause();
        bell.currentTime = 0;
        bell.play();

        // set delay antara suara bell dengan suara nomor antrian
        durasi_bell = bell.duration * 770;

        // mainkan suara nomor antrian
        setTimeout(function() {
          responsiveVoice.speak("Nomor Antrian, " + data["no_antrian"] + ", menuju, loket, 1", "Indonesian Female", {
            rate: 0.9,
            pitch: 1,
            volume: 1
          });
        }, durasi_bell);

        // proses update data
        $.ajax({
          type: "POST",               // mengirim data dengan method POST
          url: "update.php",          // url file proses update data
          data: { id_antrian: id_antrian }            // tentukan data yang dikirim
        });
      });

      // auto reload data antrian setiap 1 detik untuk menampilkan data secara realtime
      setInterval(function() {
        $('#jumlah-antrian').load('get_jumlah_antrian.php').fadeIn("slow");
        $('#antrian-sekarang').load('get_antrian_sekarang.php').fadeIn("slow");
        $('#antrian-selanjutnya').load('get_antrian_selanjutnya.php').fadeIn("slow");
        $('#sisa-antrian').load('get_sisa_antrian.php').fadeIn("slow");
        table.ajax.reload(null, false);
      }, 1000);
    });
  </script>
</body>
</html>