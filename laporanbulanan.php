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
  // CEK TAHUN
  $tahun ='2015';
  if (isset($_GET['tahun'])){
    $tahun = $_GET['tahun'];
  }
				include_once("koneksi/conn.php");
        $v=mysql_query("select date_format(tanggal_kunjungan, '%b') as bulan,sum(IF(`id_keperluan`=1,jumlah_pengunjung,NULL)) Visit, sum(IF(`id_keperluan`=2,jumlah_pengunjung,NULL)) Train, sum(IF(`id_keperluan`=3,jumlah_pengunjung,NULL)) Meet from kunjungan where YEAR(tanggal_kunjungan) ='".$tahun."' group by MONTH(tanggal_kunjungan) ASC");

				$k=mysql_query("select date_format(tanggal_kunjungan, '%b') as bulan,sum(IF(`id_keperluan`=1,jumlah_pengunjung,NULL)) Visit, sum(IF(`id_keperluan`=2,jumlah_pengunjung,NULL)) Train, sum(IF(`id_keperluan`=3,jumlah_pengunjung,NULL)) Meet from kunjungan where YEAR(tanggal_kunjungan) ='".$tahun."' group by MONTH(tanggal_kunjungan) ASC");
        
      	$m=mysql_query("select date_format(tanggal_kunjungan, '%b') as bulan,sum(IF(`id_keperluan`=1,jumlah_pengunjung,NULL)) Visit, sum(IF(`id_keperluan`=2,jumlah_pengunjung,NULL)) Train, sum(IF(`id_keperluan`=3,jumlah_pengunjung,NULL)) Meet from kunjungan where YEAR(tanggal_kunjungan) ='".$tahun."' group by MONTH(tanggal_kunjungan) ASC");

	$q=mysql_query("select date_format(tanggal_kunjungan, '%b') as bulan,sum(IF(`id_keperluan`=1,jumlah_pengunjung,NULL)) Visit, sum(IF(`id_keperluan`=2,jumlah_pengunjung,NULL)) Train, sum(IF(`id_keperluan`=3,jumlah_pengunjung,NULL)) Meet from kunjungan where YEAR(tanggal_kunjungan) ='".$tahun."' group by MONTH(tanggal_kunjungan) ASC");
  $q1=mysql_query("SELECT DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan, sum(kunjungan.id_keperluan=1) AS Visitation, Sum(kunjungan.id_keperluan=2) AS Training, Sum(kunjungan.id_keperluan=3) AS Meeting
                from kunjungan LEFT JOIN keperluan
                on kunjungan.id_keperluan=keperluan.id_keperluan
                where year(tanggal_kunjungan)='".$tahun."'
                GROUP BY DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
                ORDER BY kunjungan.tanggal_kunjungan ASC");
  $v1=mysql_query("SELECT DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan, sum(kunjungan.id_keperluan=1) AS Visitation, Sum(kunjungan.id_keperluan=2) AS Training, Sum(kunjungan.id_keperluan=3) AS Meeting
                from kunjungan LEFT JOIN keperluan
                on kunjungan.id_keperluan=keperluan.id_keperluan
                where year(tanggal_kunjungan)='".$tahun."'
                GROUP BY DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
                ORDER BY kunjungan.tanggal_kunjungan ASC");

        $k1=mysql_query("SELECT DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan, sum(kunjungan.id_keperluan=1) AS Visitation, Sum(kunjungan.id_keperluan=2) AS Training, Sum(kunjungan.id_keperluan=3) AS Meeting
                from kunjungan LEFT JOIN keperluan
                on kunjungan.id_keperluan=keperluan.id_keperluan
                where year(tanggal_kunjungan)='".$tahun."'
                GROUP BY DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
                ORDER BY kunjungan.tanggal_kunjungan ASC");
        
        $m1=mysql_query("SELECT DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan, sum(kunjungan.id_keperluan=1) AS Visitation, Sum(kunjungan.id_keperluan=2) AS Training, Sum(kunjungan.id_keperluan=3) AS Meeting
                from kunjungan LEFT JOIN keperluan
                on kunjungan.id_keperluan=keperluan.id_keperluan
                where year(tanggal_kunjungan)='".$tahun."'
                GROUP BY DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
                ORDER BY kunjungan.tanggal_kunjungan ASC");

        
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
            categories: [<?php 
            //$bulan_field='';
            //$bulan_field_arr[]='';
            while($r=mysql_fetch_array($q)){ 
              //echo "'".$r["bulan"]."'";
              $bulan_field="'".$r["bulan"]."'";
              $bulan_field_arr[]=$bulan_field;
            }
            echo implode(", ", $bulan_field_arr);
            ?>]
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
            data: [<?php 
            while($t=mysql_fetch_array($v)){ 
                //echo $t["Visit"].",";
                $visit_field=$t[1];
                if($visit_field!=null){
                  $visit_val=$t[1];
                }
                else{
                  $visit_val=0;
                }
                $visit_field_arr[]=$visit_val;
            }
            echo implode(", ", $visit_field_arr);
            ?>]
        },
                {name: 'Training ',
            data: [<?php 
            while($t=mysql_fetch_array($k)){ 
                //echo $t["Visit"].",";
                $train_field=$t[2];
                if($train_field!=null){
                  $train_val=$t[2];
                }
                else{
                  $train_val=0;
                }
                $train_field_arr[]=$train_val;
            }
            echo implode(", ", $train_field_arr);
            ?>]
        },{name: 'Meeting ',
            data: [<?php 
            while($t=mysql_fetch_array($m)){ 
                //echo $t["Visit"].",";
                $meet_field=$t[3];
                if($meet_field!=null){
                  $meet_val=$t[3];
                }
                else{
                  $meet_val=0;
                }
                $meet_field_arr[]=$meet_val;
            }
            echo implode(", ", $meet_field_arr);
            ?>]
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
            categories: [<?php 
            while($r=mysql_fetch_array($q1)){ 
              //echo "'".$r["bulan"]."'";
              $bulan_field1="'".$r["bulan"]."'";
              $bulan_field_arr1[]=$bulan_field1;
            }
            echo implode(", ", $bulan_field_arr1);
            ?>]
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
            data: [<?php 
            while($t=mysql_fetch_array($v1)){ 
                //echo $t["Visit"].",";
                //$visit_field=$t[1];
                $visit_val1=$t[1];
                $visit_field_arr1[]=$visit_val1;
            }
            echo implode(", ", $visit_field_arr1);
            ?>]
        },
                {name: 'Training ',
            data: [<?php 
            while($t=mysql_fetch_array($k1)){ 
                //echo $t["Visit"].",";
                //$visit_field=$t[1];
                $train_val1=$t[2];
                $train_field_arr1[]=$train_val1;
            }
            echo implode(", ", $train_field_arr1);
            ?>]
        },{name: 'Meeting ',
            data: [<?php 
            while($t=mysql_fetch_array($m1)){ 
                //echo $t["Visit"].",";
                //$visit_field=$t[1];
                $meet_val1=$t[3];
                $meet_field_arr1[]=$meet_val1;
            }
            echo implode(", ", $meet_field_arr1);
            ?>]
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
                  echo "<select onchange='rekapTahun(this.value)' class='myform-body-control' name='idtahun' id='idtahun' style='margin: 0 auto;width:120px'>";
                  
                  $tampil=mysql_query("SELECT DISTINCT
          DATE_FORMAT(kunjungan.tanggal_kunjungan, '%x') as tahun
          FROM
          kunjungan");

                  while($w=mysql_fetch_array($tampil))
                  {
                    echo "<option value=$w[tahun] >$w[tahun]</option>";        
                  }
                  //echo "<option value='belum pilih' selected disabled hidden>Tahun Kunjungan</option>";
                   echo "</select>";
                ?>
                <a target="_blank" style="text-decoration:none;width:95px;margin:10px auto" href="pdf-laporan-bulanan.php?tahun=<?php echo $tahun ?>" class="btn btn-theme btn-block">Export PDF</a>
                <!--input class="btn btn-theme btn-block" type="button"  name="cari_rekapan" onclick="cetakPDF()" value="Export PDF" style="width:120px;margin:10px auto"-->
                <br><br>
                

              <table>
              <tr>
              <td width="300px"></td>
              <td>
              <font color="dimgrey">JUMLAH PENGUNJUNG</font>   
              <table class="table table-bordered table-striped table-condensed cf font-black" style="width:200px;margin-top:5px; ">
                                  
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
                 // for ($x = 1; $x <= 12; $x++) {
                 //  //$monthNum  = $x;
                
                  
                 //  } 
                  //$monthName = date('M', mktime(0, 0, 0, $x, 10)); // March
                      $rs=$koneksi->Execute("select DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b') as bulan,sum(IF(`id_keperluan`=1,jumlah_pengunjung,NULL)) Visit, sum(IF(`id_keperluan`=2,jumlah_pengunjung,NULL)) Train, sum(IF(`id_keperluan`=3,jumlah_pengunjung,NULL)) Meet from kunjungan where YEAR(tanggal_kunjungan) ='".$tahun."' group by MONTH(tanggal_kunjungan) ASC");

                      if ($rs->RecordCount() > 0)
                        {
                          while(!$rs->EOF)
                          {

                            $bulan=$rs->fields[0];
                            $visit=$rs->fields[1];
                            $train=$rs->fields[2];
                            $meet=$rs->fields[3];
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
                            // echo "<td>$train</td>";
                            // echo "<td>$meet</td>";
                            echo "</tr>";
                            
                            $rs->MoveNext();
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
              <table class="table table-bordered table-striped table-condensed cf font-black" style="width:200px;margin-top:5px; ">
                                  
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
                where year(tanggal_kunjungan)='".$tahun."'
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
function cetakPDF(){

};
</script>
</body>
</html>
