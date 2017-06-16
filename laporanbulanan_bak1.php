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
  $q1=mysql_query("SELECT DISTINCT
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan
          FROM
          kunjungan");
  $v1=mysql_query("SELECT
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan,
          Count(kunjungan.jumlah_pengunjung) as Visitation
          FROM
          kunjungan join keperluan on kunjungan.id_keperluan=keperluan.id_keperluan
          WHERE
          keperluan.jenis_keperluan = 'Visitation'
          GROUP BY
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
          ORDER BY
          kunjungan.tanggal_kunjungan ASC");

        $k1=mysql_query("SELECT
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan,
          Count(kunjungan.jumlah_pengunjung) as Training
          FROM
          kunjungan join keperluan on kunjungan.id_keperluan=keperluan.id_keperluan
          WHERE
          keperluan.jenis_keperluan = 'Training'
          GROUP BY
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
          ORDER BY
          kunjungan.tanggal_kunjungan ASC");
        
        $m1=mysql_query("SELECT
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan,
          Count(kunjungan.jumlah_pengunjung) as Meeting
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
<title>Admin SETC | Laporan Bulanan</title>
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
      var dev_width = $(window).width();
      if(dev_width<1023){
        $('#container1').css("width","415px");
        $('#container2').css("width","415px");
      }
      else{
        $('#container1').css("width","420px");
        $('#container2').css("width","420px");
      }
			$('#container1').highcharts({
				chart: {
					type: 'column'
				},
				title: {
					text: 'Jumlah Pengunjung'
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
                text: ''
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
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
$('#container2').highcharts({
        chart: {
          type: 'column'
        },
        title: {
          text: 'Jumlah Kegiatan'
        },
        xAxis: {
      title: {
                text: 'Bulan'
            },
            categories: [<?php while($r=mysql_fetch_array($q1)){ echo "'".$r["bulan"]."',";}?>]
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
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
            data: [<?php while($t=mysql_fetch_array($v1)){ echo $t["Visitation"].",";}?>]
        },
                {name: 'Training ',
            data: [<?php while($t=mysql_fetch_array($k1)){ echo $t["Training"].",";}?>]
        },{name: 'Meeting ',
            data: [<?php while($t=mysql_fetch_array($m1)){ echo $t["Meeting"].",";}?>]
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
};

function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show");
};

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
};
</script>  
        <li><a href="#" class="dropbtnme" onclick="myFunction1()" class="active"> Detail Report</a>
    
    <div id="myDropdown1" class="dropdownme-content" >
    <a href="laporanbulanan.php">Laporan Bulanan</a>
    <a href="laporantahunan.php">Laporan Tahunan</a>
    <a href="laporantipegrup.php">Laporan Per Group</a>
  </div>
  </li>
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
							Monthly Report</font>
							 </h2>
              <br>
              
                <?php
                  echo "<select class='myform-body-control' name='idtahun' id='idtahun' style='margin: 0 auto'>";
                  
                  $tampil=mysql_query("SELECT DISTINCT
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%x') as tahun
          FROM
          kunjungan");

                  while($w=mysql_fetch_array($tampil))
                  {
                    echo "<option value=$w[tahun] >$w[tahun]</option>";        
                  }
                  echo "<option value='belum pilih' selected disabled hidden>Tahun Kunjungan</option>";
                   echo "</select>";
                ?>
                <br><br>
                

              <table>
              <tr>
              <td width="300px"></td>
              <td>
              <font color="dimgrey">JUMLAH PENGUNJUNG</font>   
              <table class="table table-bordered table-striped table-condensed cf font-black" style="width:200px ">
                                  
              <tr>
                <td>
                  Bulan
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
              </tr>

              <tr>
                

                <?php
                 for ($x = 1; $x <= 12; $x++) {
                  //$monthNum  = $x;
                  $monthName = date('M', mktime(0, 0, 0, $x, 10)); // March
                      $rs=$koneksi->Execute("select (select sum(jumlah_pengunjung) from kunjungan where id_keperluan='1' And MONTH(tanggal_kunjungan)=".$x.") as Visitation, (select sum(jumlah_pengunjung) from kunjungan where id_keperluan='2' And MONTH(tanggal_kunjungan)=".$x.") as Training, (select sum(jumlah_pengunjung) from kunjungan where id_keperluan='3' And MONTH(tanggal_kunjungan)=".$x.") as Meeting");

                      if ($rs->RecordCount() > 0)
                        {
                          while(!$rs->EOF)
                          {

                            $Visitation = $rs->fields[0];
                            $Training = $rs->fields[1];
                            $Meeting = $rs->fields[2];
                            //$Visitation = $rs->fields[1];
                            if($Visitation!='' || $Training!='' || $Meeting!=''){
                              echo"<tr>";
                              echo"<td>$monthName</td>";
                              echo"<td>$Visitation</td>";
                              echo"<td>$Training</td>";
                              echo"<td>$Meeting</td>";
                             echo"</tr>";
                            }
                            
                          $rs->MoveNext();
                          }
                        }
                  } 
                
                ?>

                </tr>
              </table>
              </td>
              <td width="50px"></td>
              <td width="50px"></td>
              <td>   
              <font color="dimgrey" class="font-black">JUMLAH KEGIATAN</font> 
              <table class="table table-bordered table-striped table-condensed cf font-black" style="width:200px ">
                                  
              <tr>
                <td>
                  Bulan
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
              </tr>

              <tr>
                

                <?php
                  
                $rs=$koneksi->Execute("SELECT DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan, sum(kunjungan.id_keperluan=1) AS Visitation, Sum(kunjungan.id_keperluan=2) AS Training, Sum(kunjungan.id_keperluan=3) AS Meeting
                from kunjungan LEFT JOIN keperluan
                on kunjungan.id_keperluan=keperluan.id_keperluan
                GROUP BY DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
                ORDER BY kunjungan.tanggal_kunjungan ASC");

                if ($rs->RecordCount() > 0)
                  {
                    while(!$rs->EOF)
                    {

                      $id_bulan = $rs->fields[0];
                      $Visitation = $rs->fields[1];
                      $Training = $rs->fields[2];
                      $Meeting = $rs->fields[3];

                      echo"<tr>";
                      echo"<td>$id_bulan</td>";
                      echo"<td>$Visitation</td>";
                      echo"<td>$Training</td>";
                      echo"<td>$Meeting</td>";
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
							  
							  <!-- <div style="float:right; padding-right:10px;" align="right">
							  <a href="#" > <img src="img\save.png" alt="Save report" width="2%" ></a>
							  <font class="font-black" style="padding-right:10px">Save</font>
							  <a href="#"> <img src="img\printer.png" alt="Save report" width="2%" ></a>
							  <font class="font-black" >Print</font>							  
							  </div> -->
							  
						<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<table width="100%">
  <tr>
    <td ><div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto;width:415px"></div></td>
    <td ><div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto;width:415px"></div></td>
  </tr>
</table>



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
<script type="text/javascript">
function rekapTahun(tahun){
  var request = $.ajax({
    url: "getLaporanTahun.php",
    method: "POST",
    data: { id : menuId },
    dataType: "html"
  });
   
  request.done(function( msg ) {
    $( "#log" ).html( msg );
  });
   
  request.fail(function( jqXHR, textStatus ) {
    alert( "Request failed: " + textStatus );
  });
};
</script>
</body>
</html>
