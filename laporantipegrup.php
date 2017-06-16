<?PHP

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: index.html");
}
if($_SESSION['sess_role'] == 'Manajemen')
{
  
  echo '<script language="javascript">';
  echo 'alert("Anda Tidak Memiliki Otorisasi")';
  echo ' </script>';
  header ("Location: 404.php");
}
?>

<?php
        include_once("koneksi/conn.php");
        // CEK TAHUN
        $tahun ='2015';
        if (isset($_GET['tahun'])){
          $tahun = $_GET['tahun'];
        }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin SETC | Laporan Tipe Grup</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link href="css/table-responsive.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">

  <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
  <style type="text/css">
${demo.css}
    </style>
    <script type="text/javascript">
$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Group Type Report'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Group Type',
                colorByPoint: true,
                data: [
                <?php 
                  $rs1=$koneksi->Execute("SELECT (instansi.tipe_instansi) as Tipe_Instansi, sum(kunjungan.id_keperluan=1) AS Visitation, Sum(kunjungan.id_keperluan=2) AS Training, Sum(kunjungan.id_keperluan=3) AS Meeting, count(kunjungan.id_kunjungan) AS Jumlah
                  from kunjungan LEFT JOIN instansi
                  on kunjungan.id_instansi=instansi.id_instansi
                  WHERE YEAR(kunjungan.tanggal_kunjungan)='".$tahun."'
                  GROUP BY (kunjungan.id_instansi)
                  ORDER BY kunjungan.id_instansi ASC");

                if ($rs1->RecordCount() > 0)
                  {
                    while(!$rs1->EOF)
                    {

                      $id_instansi = $rs1->fields[0];
                      $Jumlah = $rs1->fields[4];

                      echo"{";
                      echo"name: '$id_instansi',";
                      echo"y: $Jumlah";
                     echo"},";
                    $rs1->MoveNext();
                    }
                  }
                ?>
                ]
            }]
        });
    });
});
    </script>
</head>

<body>
<div class="navbar">
  <div align="center" class="navbar-inner">
    <div class="container">
      <ul class="nav nav-collapse pull-right">
        <li><a href="beranda.php" > Home</a></li>
        <li><a href="kunjungan.php" > Input</a></li>
        <li><a href="#" class="dropbtnme" onclick="myFunction()" > Setting</a>
    
    <div id="myDropdown" class="dropdownme-content" >
    <a href="instansi.php">Tipe Instansi</a>
    <a href="daerah.php">Daerah</a>
    <a href="kota.php">Kota</a>
    <a href="keperluan.php">Keperluan</a>
    <a href="user.php">User</a>
  </div>
  </li>
    
  <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}


function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

</script>  
        <li><a href="#" class="dropbtnme" onclick="myFunction1()" class="active"> Detail Report</a>
    
    <div id="myDropdown1" class="dropdownme-content" >
    <a href="laporanbulanan.php">Laporan Bulanan</a>
    <a href="laporantahunan.php">Laporan Tahunan</a>
    <a href="laporantipegrup.php">Laporan Per Grup</a>
  </div>
  </li>
        <li><a href="index.html"> Log Out</a></li>
      </ul>
      <div class="nav-collapse collapse"></div>
  </div>
</div>
<div style="float:right; padding-right:48px; padding-top:10px">
  
  Selamat Datang, <a href="#"><font color="#fff"><?php echo $_SESSION["sess_namauser"] ?></font></a> | Anda login sebagai <a href="#"><font color="#fff"><?php echo $_SESSION["sess_role"] ?></font></a> 
  </div>
</div>

<!-- PAGE CONTENT -->
<form class="form-body" >
            <!--h2 class="form-login-heading">Log In</h2-->
            <div class="body-wrap">
              
              <h2 ><font color="dimgrey">
              Group Report</font>
               </h2>
              <br>
              
                <?php
                  echo "<select onchange='rekapTahun(this.value)' class='myform-body-control' name='idtahun' id='idtahun' style='margin: 0 auto;width:120px'>";
                  
                  $tampil=mysql_query("SELECT DISTINCT
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%x') as tahun
          FROM
          kunjungan");

                  while($w=mysql_fetch_array($tampil))
                  {
                    echo "<option value=$w[tahun] >$w[tahun]</option>";        
                  }
                  // echo "<option value='belum pilih' selected disabled hidden>Tahun Kunjungan</option>";
                   echo "</select>";
                ?>
                <a target="_blank" style="text-decoration:none;width:95px;margin:10px auto" href="pdf-laporan-tipegrup.php?tahun=<?php echo $tahun ?>" class="btn btn-theme btn-block">Export PDF</a>
          <!-- Gridview Buku Tamu -->
          <div align="center">
              <table class="table table-bordered table-striped table-condensed cf font-black" style="margin-top:30px;width:200px ">
                                  
              <tr>
                <td>
                  Group Type
                </td>

                <td>
                  Visitation
                </td>
                <td>
                  Training
                </td>
                <td>
                  Meeting
                </td>
                <td>
                  Jumlah
                </td>
              </tr>

              <tr>
                

               <?php
                  
                $rs=$koneksi->Execute("SELECT (instansi.tipe_instansi) as Tipe_Instansi, sum(kunjungan.id_keperluan=1) AS Visitation, Sum(kunjungan.id_keperluan=2) AS Training, Sum(kunjungan.id_keperluan=3) AS Meeting, count(kunjungan.id_kunjungan) AS Jumlah
                  from kunjungan LEFT JOIN instansi
                  on kunjungan.id_instansi=instansi.id_instansi
                  WHERE YEAR(kunjungan.tanggal_kunjungan)='".$tahun."'
                  GROUP BY (kunjungan.id_instansi)
                  ORDER BY kunjungan.id_instansi ASC");

                if ($rs->RecordCount() > 0)
                  {
                    while(!$rs->EOF)
                    {

                      $id_instansi = $rs->fields[0];
                      $Visitation = $rs->fields[1];
                      $Training = $rs->fields[2];
                      $Meeting = $rs->fields[3];
                      $Jumlah = $rs->fields[4];

                      echo"<tr>";
                      echo"<td>$id_instansi</td>";
                      echo"<td>$Visitation</td>";
                      echo"<td>$Training</td>";
                      echo"<td>$Meeting</td>";
                      echo"<td>$Jumlah</td>";
                     echo"</tr>";
                    $rs->MoveNext();
                    }
                  }
                ?>

                </tr>
              </table>
          </div>
          <div align="center">
            <div id="container" style="width:500px;height: 400px;float:none;"></div>
          </div>
            </div>
    
          </form>
  
  
<div href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" align="center">
  <div class="container" >
    <!--p class="pull-left"><a href="http://dzyngiri.com">www.dzyngiri.com</a></p>
    <p class="pull-right"><a href="#myModal" role="button" data-toggle="modal"> <i class="icon-mail"></i> CONTACT</a></p-->
  Copyright &copy; 2016 PT HM Sampoerna Tbk. All Right Reserved
  
  </div>
</div>
  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  <?php 
  if (isset($_GET['tahun'])){
    echo '$("#idtahun").val("'.$_GET['tahun'].'");';
  }
  else{
    echo '$("#idtahun").val("2015");';
  }
  ?>
});

function rekapTahun(tahun){
  var url = tahun;
  window.location.replace("<?php echo 'http://'; echo $_SERVER['HTTP_HOST']; echo $_SERVER['PHP_SELF']; ?>?tahun="+url);
};
</script>
</body>
</html>
