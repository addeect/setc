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
        $q=mysql_query("SELECT DISTINCT
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan
          FROM
          kunjungan");
        $v=mysql_query("SELECT DATE_FORMAT(kunjungan.tanggal_kunjungan, '%Y') as Tahun, sum(kunjungan.id_keperluan=1) AS Visitation, Sum(kunjungan.id_keperluan=2) AS Training, Sum(kunjungan.id_keperluan=3) AS Meeting, Count(kunjungan.id_keperluan) AS Total
from kunjungan LEFT JOIN keperluan
on kunjungan.id_keperluan=keperluan.id_keperluan
GROUP BY DATE_FORMAT(kunjungan.tanggal_kunjungan, '%Y')
ORDER BY kunjungan.tanggal_kunjungan ASC");

        $k=mysql_query("select (select sum(jumlah_pengunjung) from kunjungan where id_keperluan='1' And YEAR(tanggal_kunjungan)=2015) as Visitation, 
(select sum(jumlah_pengunjung) from kunjungan where id_keperluan='2' And YEAR(tanggal_kunjungan)=2015) as Training, 
(select sum(jumlah_pengunjung) from kunjungan where id_keperluan='3' And YEAR(tanggal_kunjungan)=2015) as Meeting,
sum(jumlah_pengunjung) as Total from kunjungan where YEAR(tanggal_kunjungan)=2015");
        $k1=mysql_query("select (select sum(jumlah_pengunjung) from kunjungan where id_keperluan='1' And YEAR(tanggal_kunjungan)=2016) as Visitation, 
(select sum(jumlah_pengunjung) from kunjungan where id_keperluan='2' And YEAR(tanggal_kunjungan)=2016) as Training, 
(select sum(jumlah_pengunjung) from kunjungan where id_keperluan='3' And YEAR(tanggal_kunjungan)=2016) as Meeting,
sum(jumlah_pengunjung) as Total from kunjungan where YEAR(tanggal_kunjungan)=2016");
        
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin SETC | Laporan Tahunan</title>
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
            data: [<?php while($t=mysql_fetch_array($k)){ echo $t["Total"]."";}?>,<?php while($t=mysql_fetch_array($k1)){ echo $t["Total"]."";}?>]
        },{
            name: 'Total Jumlah Kegiatan',
            data: [<?php while($t=mysql_fetch_array($v)){ echo $t["Total"].",";}?>]
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


	
			<form class="form-body" >
		        <!--h2 class="form-login-heading">Log In</h2-->
		        <div class="body-wrap">
		            
					
							<h2 ><font color="dimgrey">
							Annual Report </font>
							</h2>
							<br>
              <a target="_blank" style="text-decoration:none;width:95px;margin:10px auto" href="pdf-laporan-tahunan.php" class="btn btn-theme btn-block">Export PDF</a>
							<center>

                <table>
              <tr>
              <td width="300px"></td>
              <td style="text-align:center">
              <font color="black">JUMLAH PENGUNJUNG</font>   
              <table class="table table-bordered table-striped table-condensed cf font-black" style="width:200px ">
                                  
              <tr>
                <td>
                  Tahun
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
                <td>Total</td>
              </tr>

              <tr>
                

                <?php
                 $rs=$koneksi->Execute("select YEAR(kunjungan.tanggal_kunjungan) as tahun,sum(IF(`id_keperluan`=1,jumlah_pengunjung,NULL)) Visit, sum(IF(`id_keperluan`=2,jumlah_pengunjung,NULL)) Train, sum(IF(`id_keperluan`=3,jumlah_pengunjung,NULL)) Meet, sum(jumlah_pengunjung) Total from kunjungan group by YEAR(tanggal_kunjungan) ASC");

                      if ($rs->RecordCount() > 0)
                        {
                          while(!$rs->EOF)
                          {

                            $bulan=$rs->fields[0];
                            $visit=$rs->fields[1];
                            $train=$rs->fields[2];
                            $meet=$rs->fields[3];
                            $total=$rs->fields[4];
                            echo "<tr>";
                            echo "<td>$bulan</td>";
                            if($visit!=null){
                              echo "<td>$visit</td>";
                            }
                            else{
                              echo "<td>0</td>";
                            }
                            if($train!=null){
                              echo "<td>$train</td>";
                            }
                            else{
                              echo "<td>0</td>";
                            }
                            if($meet!=null){
                              echo "<td>$meet</td>";
                            }
                            else{
                              echo "<td>0</td>";
                            }
                            if($total!=null){
                              echo "<td>$total</td>";
                            }
                            else{
                              echo "<td>0</td>";
                            }
                             echo"</tr>";
                             $rs->MoveNext();
                            }
                            
                          
                          }
                         
                
                ?>

                </tr>
              </table>
              </td>
              <td width="50px"></td>
              <td width="50px"></td>
              <td style="text-align:center">   
              <font color="black">JUMLAH KEGIATAN</font> 
              <table class="table table-bordered table-striped table-condensed cf font-black" style="width:200px ">
                                  
              <tr>
                <td>
                  Tahun
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
                <td>Total</td>
              </tr>

              <tr>
                

                <?php
                  
                $rs=$koneksi->Execute("SELECT DATE_FORMAT(kunjungan.tanggal_kunjungan, '%Y') as Tahun, sum(kunjungan.id_keperluan=1) AS Visitation, Sum(kunjungan.id_keperluan=2) AS Training, Sum(kunjungan.id_keperluan=3) AS Meeting, Count(kunjungan.id_keperluan) AS Total
                from kunjungan LEFT JOIN keperluan
                on kunjungan.id_keperluan=keperluan.id_keperluan
                GROUP BY DATE_FORMAT(kunjungan.tanggal_kunjungan, '%Y')
                ORDER BY kunjungan.tanggal_kunjungan ASC");

                if ($rs->RecordCount() > 0)
                  {
                    while(!$rs->EOF)
                    {

                      $id_tahun = $rs->fields[0];
                      $Visitation = $rs->fields[1];
                      $Training = $rs->fields[2];
                      $Meeting = $rs->fields[3];
                      $Total = $rs->fields[4];

                      echo"<tr>";
                      echo"<td>$id_tahun</td>";
                      echo"<td>$Visitation</td>";
                      echo"<td>$Training</td>";
                      echo"<td>$Meeting</td>";
                      echo"<td>$Total</td>";
                     echo"</tr>";
                    $rs->MoveNext();
                    }
                  }
                ?>

                </tr>
              </table>
              </td>
              <td width="300px"></td>
              </tr>
              </table>
							  </center>
							  <!-- <div style="float:right; padding-right:360px;" align="right">
							  <a href="#" > <img src="img\save.png" alt="Save report" width="2%" ></a>
							  <font class="font-black" style="padding-right:10px">Save</font>
							  <a href="#"> <img src="img\printer.png" alt="Save report" width="2%" ></a>
							  <font class="font-black" >Print</font>							  
							  </div> -->
							  <br>
							  <br>
						<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


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
