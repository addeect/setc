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

else if($_SESSION['sess_role'] == 'Operator')
{
	
	echo '<script language="javascript">';
	echo 'alert("Anda Tidak Memiliki Otorisasi")';
	echo ' </script>';
	header ("Location: 404.php");
}
?>

<?php
				include_once("koneksi/conn.php");
                $v=mysql_query("SELECT
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan,
          Sum(kunjungan.jumlah_pengunjung) as Visitation
          FROM
          kunjungan join keperluan on kunjungan.id_keperluan=keperluan.id_keperluan
          WHERE
          keperluan.jenis_keperluan = 'Visitation'
          GROUP BY
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
          ORDER BY
          kunjungan.tanggal_kunjungan ASC");

                $k=mysql_query("SELECT
                    DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan,
                    Sum(kunjungan.jumlah_pengunjung) as Training
                    FROM
                    kunjungan join keperluan on kunjungan.id_keperluan=keperluan.id_keperluan
                    WHERE
                    keperluan.jenis_keperluan = 'Training'
                    GROUP BY
                    DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
                    ORDER BY
                    kunjungan.tanggal_kunjungan ASC");
        
        $m=mysql_query("SELECT
                    DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan,
                    Sum(kunjungan.jumlah_pengunjung) as Meeting
                    FROM
                    kunjungan join keperluan on kunjungan.id_keperluan=keperluan.id_keperluan
                    WHERE
                    keperluan.jenis_keperluan = 'Meeting'
                    GROUP BY
                    DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
                    ORDER BY
                    kunjungan.tanggal_kunjungan ASC");
    $q=mysql_query("SELECT DISTINCT
                    DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan
                    FROM
                    kunjungan");
    $v_rev1=mysql_query("SELECT DATE_FORMAT(kunjungan.tanggal_kunjungan, '%Y') as Tahun, sum(kunjungan.id_keperluan=1) AS Visitation, Sum(kunjungan.id_keperluan=2) AS Training, Sum(kunjungan.id_keperluan=3) AS Meeting, Count(kunjungan.id_keperluan) AS Total
from kunjungan LEFT JOIN keperluan
on kunjungan.id_keperluan=keperluan.id_keperluan
GROUP BY DATE_FORMAT(kunjungan.tanggal_kunjungan, '%Y')
ORDER BY kunjungan.tanggal_kunjungan ASC");

        $k_rev1=mysql_query("select (select sum(jumlah_pengunjung) from kunjungan where id_keperluan='1' And YEAR(tanggal_kunjungan)=2015) as Visitation, 
(select sum(jumlah_pengunjung) from kunjungan where id_keperluan='2' And YEAR(tanggal_kunjungan)=2015) as Training, 
(select sum(jumlah_pengunjung) from kunjungan where id_keperluan='3' And YEAR(tanggal_kunjungan)=2015) as Meeting,
sum(jumlah_pengunjung) as Total from kunjungan where YEAR(tanggal_kunjungan)=2015");
        $k1_rev1=mysql_query("select (select sum(jumlah_pengunjung) from kunjungan where id_keperluan='1' And YEAR(tanggal_kunjungan)=2016) as Visitation, 
(select sum(jumlah_pengunjung) from kunjungan where id_keperluan='2' And YEAR(tanggal_kunjungan)=2016) as Training, 
(select sum(jumlah_pengunjung) from kunjungan where id_keperluan='3' And YEAR(tanggal_kunjungan)=2016) as Meeting,
sum(jumlah_pengunjung) as Total from kunjungan where YEAR(tanggal_kunjungan)=2016");
?>

			
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin SETC | Beranda</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link href="css/table-responsive.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/Chart.js"></script>

	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
<script type="text/javascript">
$(function () {
    $('#container3').highcharts({
        title: {
            text: 'Grafik Jumlah Pengunjung dan Jumlah Kegiatan',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: ['2015','2016']
        },
        yAxis: {
            title: {
                text: ''
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Total Jumlah Pengunjung',
            data: [<?php while($t=mysql_fetch_array($k_rev1)){ echo $t["Total"]."";}?>,<?php while($t=mysql_fetch_array($k1_rev1)){ echo $t["Total"]."";}?>]
        },{
            name: 'Total Jumlah Kegiatan',
            data: [<?php while($t=mysql_fetch_array($v_rev1)){ echo $t["Total"].",";}?>]
        }]
    });

    // # CHART-2
    // Build the chart
        $('#chart_tipe_grup').highcharts({
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

    // # CHART-3
    $('#chart_bulanan').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Laporan Bulanan'
                },
                xAxis: {
            title: {
                text: 'Bulan'
            },
            categories: [<?php while($r=mysql_fetch_array($q)){ echo "'".$r["bulan"]."',";}?>]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Pengunjung'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{name: 'Visitation ',
            data: [<?php while($t=mysql_fetch_array($v)){ echo $t["Visitation"].",";}?>]
        },
                {name: 'Training ',
            data: [<?php while($t=mysql_fetch_array($k)){ echo $t["Training"].",";}?>]
        },{name: 'Meeting ',
            data: [<?php while($t=mysql_fetch_array($m)){ echo $t["Meeting"].",";}?>]
        }]
    });
});
		</script>
<!--link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" /> 
<link type="text/css" href="css/colorbox.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.colorbox.js"></script-->
	<!--script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script-->
    <!--script type="text/javascript" src="js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="js/ui.core.js"></script>
	<script type="text/javascript" src="js/ui.sortable.js"></script>    
    <script type="text/javascript" src="js/ui.dialog.js"></script>
    <script type="text/javascript" src="js/ui.datepicker.js"></script>
    <script type="text/javascript" src="js/effects.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pack.js"></script>
	<script type="text/javascript" src="js/proses1.js"></script-->
    <!--[if IE]>
    <script language="javascript" type="text/javascript" src="js/flot/excanvas.pack.js"></script>
    <![endif]-->
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="css/iefix.css" />
	<script src="js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('#menu ul li a span span');
    </script>        
    <![endif]-->
    <!--script id="source" language="javascript" type="text/javascript" src="js/graphs.js"></script>
	  <link rel="stylesheet" href="css/jquery-ui-1.10.4.custom.css">
	  <script src="js/jquery-1.10.2.js"></script>
	  <script src="js/jquery-ui-1.10.4.custom.js"></script>
	  <script>
		  $(function() {
			$( "#datepicker" ).datepicker();
			 $( "#tabs1" ).tabs();
		  });
	</script-->

	</head>

<body>
<div class="navbar">
  <div align="center" class="navbar-inner">
    <div class="container" style="color:#203748;">
	
      <ul class="nav nav-collapse pull-right" >

        <!--li>	  <img src="img\logo PPKS.png" alt="" width="200px"></li-->
        <li><a href="beranda.php" class="active"> Home</a></li>
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
</script>  		
  
        <li><a href="laporanbulanan.php"> Detail Report</a></li>
        <li><a href="index.html"> Log Out</a></li>
      </ul>
      <div class="nav-collapse collapse"></div>
  </div>
</div>
<div style="float:right; padding-right:48px; padding-top:10px">
	
	Selamat Datang, <a href="#"><font color="#fff"><?php echo $_SESSION["sess_namauser"] ?></font></a> | Anda login sebagai <a href="#"><font color="#fff"><?php echo $_SESSION["sess_role"] ?></font></a> 
	</div>

	
	
	 
	
<!--ul>
				
				<li><a href="#">Master Keperluan</a></li>
				<li><a href="#">Master Provinsi</a></li>
				<li><a href="#">Master Sub Provinsi</a></li>
				<li><a href="#">Master Tipe Instansi</a></li>
				<li><a href="#">Master User</a></li>
				
			</ul-->
	
			<form class="form-body-beranda" style="width: 100%" >
		        <!--h2 class="form-login-heading">Log In</h2-->
		        
		        
				<!--img src="img\logo PPKS.png" alt="Logo PPK" height="40%" width="45%"-->
		<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto;width: 800px"></div>
<div id="chart_tipe_grup"  style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<div id="chart_bulanan"  style="min-width: 310px; height: 400px; margin: 0 auto" ></div>
    



		        
		
		          <!-- Modal >
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>
	
  
<div href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" align="center">
  <div class="container" >
    <!--p class="pull-left"><a href="http://dzyngiri.com">www.dzyngiri.com</a></p>
    <p class="pull-right"><a href="#myModal" role="button" data-toggle="modal"> <i class="icon-mail"></i> CONTACT</a></p-->
	Copyright &copy; 2016 PT HM Sampoerna Tbk. All Right Reserved
	
  </div>
</div>


</body>
</html>
