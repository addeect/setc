<?PHP

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: index.html");
}
if($_SESSION['sess_role'] == 'Admin')
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manajemen SETC | Laporan Tipe Grup</title>
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
                text: 'Browser market shares January, 2015 to May, 2015'
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
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Microsoft Internet Explorer',
                    y: 56.33
                }, {
                    name: 'Chrome',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Firefox',
                    y: 10.38
                }, {
                    name: 'Safari',
                    y: 4.77
                }, {
                    name: 'Opera',
                    y: 0.91
                }, {
                    name: 'Proprietary or Undetectable',
                    y: 0.2
                }]
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
        <li><a href="beranda2.php" > Home</a></li>
        <!--li><a href="kunjungan1.php" > Input</a></li>
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
</script-->  
        <li><a href="statistik2.php" class="active"> Detail Report</a></li>
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
							Report by Group Type </font>
							</h2>
							<br>
							<table class="table table-bordered table-striped table-condensed cf font-black" style="display: block; height:690px; width: 100%; overflow: scroll">
                                  <thead class="cf" >
                                  <tr align="center">
                                      <th rowspan="2"  >Group Type</th>
                                      <th colspan="3">2006</th>
                                      <th colspan="3">2007</th>
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
                                      <th colspan="3">2030</th>
                                      
                                  </tr>
								  <tr>
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
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
									  <th>V</th>
                                      <th>T</th>
                                      <th>M</th>
                                      
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
									<th>Academics
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
                                    <th>Business
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
                                    <th>CMS Beneficiaries
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
                                    <th>Community
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
                                    <th>Government
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
                                    <th>HMS Employees
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
                                    <th>HMS Pre-Retired
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
                                    <th>Media
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
                                    <th>NGOs
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
                                    <th>PMI Employees
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
                                    <th>SETC Internal
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
                                    </td>
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

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


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
