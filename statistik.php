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
<title>Admin SETC | Setting Kota</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link href="css/table-responsive.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

</head>

<body>

	
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
    <a href="statistik.php">Laporan Daftar Kunjungan</a>
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


	
			<form class="form-body" style="max-height:1500px" >
		        <!--h2 class="form-login-heading">Log In</h2-->
		        <div class="body-wrap">
		        	<!--div class="form-group">
			        	<font color="dimgrey" class="pull-left">Pilih Jenis Laporan &nbsp;</font><br/>
			            <select onclick="jenisLaporan(this.value)" class='myform-body-control' name='jenis_laporan' id='jenis_laporan'>
			            <option value="default" selected>- Pilih Salah -</option>
			            <option value="Monthly">Bulanan</option>
			            <option value="Annually">Tahunan</option>
			            </select>
			        </div-->
		        	
					<table border="0" width="500px" align="center">
					
						
						
						<tr width="400px" >
							<td valign="top">
							<!-- <hr> -->
							<br>
							<h2 ><font color="dimgrey">
							Daftar Kunjungan SARTC - SETC</font>
							</h2>
							<br>

							<table border="0"  cellpadding="0" cellspacing="0" id="grid" class="table-bordered table-striped table-condensed cf font-black"  style="display: block; width:100%; height: 390px;  overflow-y: scroll">
								<tr><thead>
											  <tr style="text-align: right;">
												<th scope="col">ID</th>
								                <!-- <th width="102" scope="col"><center>Admin</center></th> -->
								                <th  scope="col">Tanggal Kegiatan</th>
								                <th  scope="col">Nama Instansi</th>
								                <th  scope="col">Tipe Instansi</th>
								                <th  scope="col">Daerah / Provinsi</th>
								                <th  scope="col">Kabupaten / Kota</th>
								                <th  scope="col">Tipe Keperluan</th>
								                <th  scope="col">Jumlah Pengunjung</th>
								                <!-- <th width="102" scope="col"><center>Nama Kontak Panitia</center></th>
								                <th width="102" scope="col"><center>Nomor Kontak Panitia</center></th>
								                <th width="102" scope="col"><center>Tindak Lanjut</center></th>
								                <th width="102" scope="col"><center>Detil Acara</center></th-->
								                <th  scope="col">Ubah</th>
									
								                </thead></tr>
								                <tr>
									<?php		   
											
									//$rs=$koneksi->Execute("select id_kunjungan, id_user, tanggal_kunjungan, nama_instansi, id_instansi, id_daerah, id_kota, id_keperluan, jumlah_pengunjung, nama_cp, no_cp, id_tindaklanjut, detil_acara from kunjungan order by 1"
									// 	);
									
									
									$rs=$koneksi->Execute("SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung
									                FROM KUNJUNGAN k
									left join user u
									on k.id_user=u.id_user
									left join daerah d
									on k.id_daerah=d.kode_daerah
									left join Instansi i
									on k.id_instansi=i.id_instansi
									left join kota kt
									on k.id_kota=kt.id_kota
									left join Keperluan kp
									on k.id_keperluan=kp.id_keperluan
									order by 1 ");

									if ($rs->RecordCount() > 0)
									{
										while(!$rs->EOF)
										{
											$id_kunjungan = $rs->fields[0];
											// $namauser = $rs->fields[1];
						                    $tanggal_kunjungan = $rs->fields[2];
						                    $nama_instansi = $rs->fields[3];
						                    $tipe_instansi = $rs->fields[4];
						                    $namadaerah = $rs->fields[5];
						                    $nama_kota = $rs->fields[6];
						                    $jenis_keperluan = $rs->fields[7];
						                    $jumlah_pengunjung = $rs->fields[8];
						                    // $nama_cp = $rs->fields[9];
						                    // $no_cp = $rs->fields[10];
						                    // $id_tindaklanjut = $rs->fields[11];
						                    // $detil_acara = $rs->fields[12];
											
											echo"<tr>";
											echo"<td>$id_kunjungan</td>";
											// echo"<td>$namauser</td>";
											echo"<td>$tanggal_kunjungan</td>";
											echo"<td>$nama_instansi</td>";
											echo"<td>$tipe_instansi</td>";
											echo"<td>$namadaerah</td>";
											echo"<td>$nama_kota</td>";
											echo"<td>$jenis_keperluan</td>";
											echo"<td>$jumlah_pengunjung</td>";
											// echo"<td>$nama_cp</td>";
											// echo"<td>$no_cp</td>";
											// echo"<td>$id_tindaklanjut</td>";
											// echo"<td>$detil_acara</td>";
												//echo"<td>$idkaryawan</td>";
												/*if ($jnspengguna == 1)
												{
													$role = "Admin IT";
												}
												else if ($jnspengguna == 2)
												{
													$role = "Staff Iklan";
												}
												else if ($jnspengguna == 3)
												{
													$role = "Pelanggan";
												}
												echo"<td>$role</td>";*/
												echo"<td><a href=#('$id_kunjungan', '$tanggal_kunjungan', '$nama_instansi','$tipe_instansi', '$namadaerah', '$nama_kota', '$jenis_keperluan', '$jumlah_pengunjung');><img height='20px' src=img/edit.png hspace='15'><img height='25px' src=img/delete.png hspace='15'></a></td>";
												
											echo"</tr>";
										$rs->MoveNext();
										}
									}
								?>
											  </tr>
							</table>
							
							  
							  <div style="float:right; padding-right:10px; padding-top: 10px;" align="right">
							  <a href="cetak_laporan.php" target="_blank" > <img src="img\save.png" alt="Save report" width="2%" ></a>
							  <font class="font-black" style="padding-right:10px">Save</font>
							  <a href="#"> <img src="img\printer.png" alt="Save report" width="2%" ></a>
							  <font class="font-black" >Print</font>							  
							  </div>

							 <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

							  </td>
						</tr>

							  
				</table>	
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
		          <!- modal -->
		
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
