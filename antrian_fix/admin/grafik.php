<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>
<?php include "../config/database.php"; 

$result = mysqli_fetch_array(mysqli_query($conn,"SELECT count(rating) as jumlah from tanggapan where rating='sangat puas'"));
$sp = $result['jumlah'];
$result1 = mysqli_fetch_array(mysqli_query($conn,"SELECT count(rating) as jumlah from tanggapan where rating='puas'"));
$p = $result1['jumlah'];
$result2 = mysqli_fetch_array(mysqli_query($conn,"SELECT count(rating) as jumlah from tanggapan where rating='cukup puas'"));
$cp = $result2['jumlah'];
$result3 = mysqli_fetch_array(mysqli_query($conn,"SELECT count(rating) as jumlah from tanggapan where rating='tidak puas'"));
$tp = $result3['jumlah'];
?>
<canvas id="myChart1" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Sangat Puas", "Puas", "Cukup Puas", "Tidak Puas"];
var yValues = [<?php 
                echo $sp;
                ?>, 
                <?php 
                echo $p;
                ?>, 
                <?php 
                echo $cp;
                ?>, 
                <?php 
                echo $tp;
            ?>];
var barColors = ["red", "green","blue","orange"];

new Chart("myChart1", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "World Wine Production 2018"
    }
  }
});
</script>

</body>
</html>
