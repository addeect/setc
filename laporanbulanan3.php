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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin SETC | Laporan Bulanan</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link href="css/table-responsive.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
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
	<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Rainfall'
        },
        subtitle: {
            text: 'Source: WorldClimate.com'
        },
        xAxis: {
            categories: [
                <?php 

                $V=mysql_query(" SELECT
                DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
                
                FROM
                kunjungan join keperluan on kunjungan.id_keperluan=keperluan.id_keperluan
                WHERE
                keperluan.jenis_keperluan = 'Visitation'
                GROUP BY
                DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
                ORDER BY
                kunjungan.tanggal_kunjungan ASC");

                while($w=mysql_fetch_array($V))
                  {
                    //$arr = array('Hello','World!','Beautiful','Day!');
                    //implode("|",$type);
                    
                    
                    //echo $w[0];        

                    echo "'".$w[0]."',";
                  }





                 ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
        series: [{
            name: 'Visitation',
            data: [<?php 

                $V=mysql_query(" SELECT
                Sum(kunjungan.jumlah_pengunjung) as X
                
                FROM
                kunjungan join keperluan on kunjungan.id_keperluan=keperluan.id_keperluan
                WHERE
                keperluan.jenis_keperluan = 'Visitation'
                GROUP BY
                DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
                ORDER BY
                kunjungan.tanggal_kunjungan ASC");

                while($w=mysql_fetch_array($V))
                  {
                    //$arr = array('Hello','World!','Beautiful','Day!');
                    //implode("|",$type);
                    
                    
                    //echo $w[0];        

                    echo "'".$w[0]."',";
                  }





                 ?>]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
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
</script>  
        <li><a href="statistik.php" class="active"> Detail Report</a></li>
        <li><a href="index.html"> Log Out</a></li>
      </ul>
      <div class="nav-collapse collapse"></div>
  </div>
</div>
<div style="float:right; padding-right:48px; padding-top:10px">
	
	Selamat Datang, <a href="#"><font color="#fff"><?php echo $_SESSION["sess_namauser"] ?></font></a> | Anda login sebagai <a href="#"><font color="#fff"><?php echo $_SESSION["sess_role"] ?></font></a> 
	</div>


	
			<form class="form-body" >
		        <!--h2 class="form-login-heading">Log In</h2-->
		        <div class="body-wrap">
		            
					
							<h2 ><font color="dimgrey">
							Monthly Report</font>
							</h2>
							<br>
              <select class="myform-body-control" placeholder="Tahun" width="255px">
                <option>2006</option>
                <option>2007</option>
                <option>2008</option>
                <option>2009</option>
                <option>2010</option>
                <option>2011</option>
                <option>2012</option>
                <option>2013</option>
                <option>2014</option>
                <option>2015</option>
                <option>2016</option>
                </select
                <br><br>
							<table class="table table-bordered table-striped table-condensed cf font-black" style="width:200px ">
                                  <thead class="cf" >
                                  <tr align="center">
                                      <th rowspan="2"  ></th>
                                      <!-- <th colspan="3">Keperluan</th> -->
                                      <!-- <th colspan="3">2007</th>
                                      <th colspan="3">2008</th>
                                      <th colspan="3">2009</th>
                                      <th colspan="3">2010</th>
                                      <th colspan="3">2011</th>
                                      <th colspan="3">2012</th>
                                      <th colspan="3">2013</th>
                                      <th colspan="3">2014</th>
									  <th colspan="3">2015</th>
                                      <th colspan="3">2016</th>
                                      <th colspan="3">2017</th>
                                      <th colspan="3">2018</th>
                                      <th colspan="3">2019</th>
                                      <th colspan="3">2020</th>
                                      <th colspan="3">2021</th>
                                      <th colspan="3">2022</th>
                                      <th colspan="3">2023</th>
									  <th colspan="3">2024</th>
                                      <th colspan="3">2025</th>
                                      <th colspan="3">2026</th>
                                      <th colspan="3">2027</th>
                                      <th colspan="3">2028</th>
                                      <th colspan="3">2029</th>
                                      <th colspan="3">2030</th> -->
                                      
                                  </tr>
								  <tr>
                                      <th>Visitation</th>
                                      <th>Training</th>
                                      <th>Meeting</th>
									 <!--  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th> -->
                                      
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
									<th>January
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td><!-- 
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td> -->
									
                                  </tr>
                                 <tr>
                                    <th>February
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td><!-- 
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th>March
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td> -->
                                  </tr>
                                  <tr>
                                    <th>April
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td><!-- 
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td> -->
                                  </tr>
                                  <tr>
                                    <th>May
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td><!-- 
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td> -->
                                  </tr>
                                  <tr>
                                    <th>June
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td><!-- 
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td> -->
                                  </tr>
                                 <tr>
                                    <th>July
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td><!-- 
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td> -->
                                  </tr>
                                  <tr>
                                    <th>August
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td><!-- 
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td> -->
                                  </tr>
                                  <tr>
                                    <th>September
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td><!-- 
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td> -->
                                  </tr>
                                  <tr>
                                    <th>October
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td><!-- 
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td> -->
                                  </tr>
                                  <tr>
                                    <th>November
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td><!-- 
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td> -->
                                  </tr>
								  <tr>
                                    <th>December
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td><!-- 
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
                                  </tr>
								  <tr>
                                    <th>TOTAL
									</th>
                                    <td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
									<td>
                                    </td>
                                  </tr>
								  <tr>
                                    <th>SUB TOTAL
									</th>
                                    <td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
                                  </tr>
								  <tr>
                                    <th>GRAND TOTAL
									</th>
                                    <td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td>
									<td colspan="3">
                                    </td> -->
                                  </tr>
								  
                                  </tbody>
                              </table>
							  
							  <div style="float:right; padding-right:10px;" align="right">
							  <a href="#" > <img src="img\save.png" alt="Save report" width="2%" ></a>
							  <font class="font-black" style="padding-right:10px">Save</font>
							  <a href="#"> <img src="img\printer.png" alt="Save report" width="2%" ></a>
							  <font class="font-black" >Print</font>							  
							  </div>
							  
						<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


					<br>
					<!--div class="font-black" style="float:left;" width="25%">
					Daftar Kunjungan
					</div>					
					
					<div class="font-black" style="float:center;" width="50%">
					
					Search					
					</div>					
					
					<div class="font-black" style="float:right;" width="25%">
					
							<br>
					</div-->
					<!--br>
					<div align="center">
					
					</div>
					<br>
					<!-- Gridview Buku Tamu -->
					<div align="center">
					   	
					 		
						
</div>
		            <!--br>
		            <input type="password" class="form-control" placeholder="Password"-->
		            <!--label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>
					<br-->
		            <!--hr-->
		            
		            <!--div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div-->
		            <!--div align="center" style="padding:10px;">
		                <font color="black" align="center">Don't have an account yet?</font><br/>
		                <a class="" href="#">
		                    Create an account
		                </a>
		            </div-->
		
		        </div>
		
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
