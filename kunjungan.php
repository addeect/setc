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
<title>Admin SETC | Buku Tamu</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link href="css/table-responsive.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<!-- <link href="css/jquery-ui.min.css" rel="stylesheet">
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.min.js"></script> -->
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.datepick.css"> 
<script type="text/javascript" src="js/jquery.plugin.js"></script> 
<script type="text/javascript" src="js/jquery.datepick.js"></script>
<script type="text/javascript" src="js/proses.js"></script>
<!--script type="text/javascript" src="js/jquery.freezeheader.js"></script-->
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

	<!-- <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script> -->
	<script type="text/javascript">
	var htmlobjek;
	$(document).ready(function(){
	//apabila terjadi event onchange terhadap object <select id=propinsi>
	$("#kodedaerah").change(function(){
	var kodedaerah = $("#kodedaerah").val();
	$.ajax({
	url: "ambilkota.php",
	data: "kodedaerah="+kodedaerah,
	cache: false,
	success: function(msg){
	//jika data sukses diambil dari server kita tampilkan
	//di <select id=kota>
	$("#idkota").html(msg);
	}
	});
	});
	});
	 

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
				};
			};
		};

		
		 // $(function(){   
		 // $( "#tanggal" ).datepicker({
   //       changeMonth:true,
   //       changeYear:true,
   //       yearRange:"-100:+0",
   //       dateFormat:"dd MM yy" });
 		//  });

		 // $(function() 
 		//  {   $( "#popupDatepicker" ).datepicker(); });

 		 

 		 $(function() {
	$('#popupDatepicker').datepick({
    dateFormat: 'yyyy-mm-dd'});
    $('#tgl_awal').datepick({
    dateFormat: 'yyyy-mm-dd'});
    $('#tgl_akhir').datepick({
    dateFormat: 'yyyy-mm-dd'});
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}


// function displaydate() {

// // document.getElementById("popupDatepicker").value=dt+"/"+mn+"/"+yy;

// var now = new Date();
// var formatedDate = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();​
// document.getElementById("popupDatepicker").value = formatedDate;
// }


function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      };


// $(document).ready(function(){ 
//     $("table").freezeHeader({top: true}); 
// }); 

	</script>

</head>

<body >
<div class="navbar">
  <div align="center" class="navbar-inner">
    <div class="container">
      <ul class="nav nav-collapse pull-right">
        <li><a href="beranda.php" > Home</a></li>
        <li><a href="kunjungan.php" class="active"> Input</a></li>
        <li><a href="#" class="dropbtnme" onclick="myFunction()" > Setting</a>
		
		<div id="myDropdown" class="dropdownme-content" >
    <a href="instansi.php">Tipe Instansi</a>
    <a href="daerah.php">Daerah</a>
    <a href="kota.php">Kota</a>
    <a href="keperluan.php">Keperluan</a>
    <a href="user.php">User</a>
  </div>
  </li>
			
<!-- 	<script>

</script>  		 -->
        <li><a href="laporanbulanan.php"> Detail Report</a></li>
        <li><a href="index.html"> Log Out</a></li>
      </ul>
      <div class="nav-collapse collapse"></div>
  </div>
</div>
<div style="float:right; padding-right:48px; padding-top:10px">
	
	Selamat Datang, <a href="#"><font color="#fff"><?php echo $_SESSION["sess_namauser"] ?></font></a> | Anda login sebagai <a href="#"><font color="#fff"><?php echo $_SESSION["sess_role"] ?></font></a> 
	</div>

<input type="hidden" class="form-body-control" id="sess_namauser" value="<?php echo $_SESSION["sess_username"]?>">
	
			<form class="form-body" >
		        <!--h2 class="form-login-heading">Log In</h2-->
		        <div class="body-wrap">
		            
					<table border="0" align="center" width="100%" style="text-align:left;padding-left:10px;">
						
						<tr>
							<td colspan="4" class="font-black" style="text-align:center;">
							<h2>SETC - SARTC DATABASE</h2>
							</td>
						</tr>
						
						<tr>
							<td colspan="4" style="text-align:center;">
							<br>
							<br>
							</td>
						</tr>
						
						<tr>
							<td width="150px">
								<font color="black">Waktu Berkunjung</font>
							</td>
							<td>
								 
								 <input type="text" class="form-body-control" id="popupDatepicker" name="tanggal"  placeholder="Tanggal Berkunjung">
								<!--  <input type="text" id="popupDatepicker"> -->
		            		</td>
							
							<!-- //////////////////////////// -->

							<td >
								<font color="black">Jumlah Pengunjung</font>
							</td>
							<td>
								<input type="text" class="form-body-control" id="jumlahpengunjung" placeholder="Jumlah Pengunjung" onkeypress="return isNumberKey(event)" >
		            		</td>
						
							
						</tr>
						
						<tr>
							<td width="150px">
								<font color="black">Nama Instansi</font>
							</td>
							<td>
								<input type="text" class="form-body-control" id="namainstansi" placeholder="Nama Instansi" autofocus>
		            		</td>
							
							<td>
								<font color="black">Nama Kontak Panitia</font>
							</td>
							<td>
								<input type="text" class="form-body-control" id="namapanitia"  placeholder="Nama Contact Person" autofocus>
		            		</td>
						
							
						</tr>
						
						<tr>
							<td>
								<font color="black">Tipe Instansi</font>
							</td>
							<td>

								<!--select class="myform-body-control" placeholder="Tipe Instansi" width="255px">
								<option>Academics</option>
								<option>Business</option>
								<option>CMS Beneficiaries</option>
								<option>Community</option>
								<option>Government</option>
								<option>HMS Employees</option>
								<option>HMS Pre-Retired</option>
								<option>Media</option>
								<option>NGOs</option>
								<option>PMI Employees</option>
								<option>SETC Internal</option>
								</select-->
								
								<?php
									echo "<select class='myform-body-control' name='idtipe' id='idtipe' >";
									
									$tampil=mysql_query("SELECT id_instansi, tipe_instansi FROM instansi ORDER BY 1");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[id_instansi] >$w[tipe_instansi]</option>";        
									}
									echo "<option value='belum pilih' selected disabled hidden>Tipe Instansi</option>";
									 echo "</select>";
								?>
								
							</td>
							
							<td>
								<font color="black">Nomor Kontak Panitia</font>
							</td>
							<td>
								<input type="text" id="nomorpanitia" class="form-body-control" onkeypress="return isNumberKey(event)"
								placeholder="Telp Contact Person" autofocus/>
		            		</td>
						
							
						</tr>
						
						<tr>
							<td>
								<font color="black">Daerah Asal Pengunjung</font>
							</td>
							<td>
								<!--input type="text" class="form-body-control" placeholder="Daerah Kunjungan" autofocus-->
								<?php
									echo "<select class='myform-body-control' name='kodedaerah' id='kodedaerah'>";
									
									$tampil=mysql_query("SELECT kode_daerah, nama_daerah FROM daerah ORDER BY 1");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[kode_daerah] >$w[nama_daerah]</option>";        
									}
									echo "<option value='belum pilih' selected disabled hidden required>Nama Daerah / Provinsi</option>";
									 echo "</select>";
								?>




		            		</td>
							
							<td>
								<font color="black">Tindak Lanjut</font>
							</td>
							<td class="font-black">
								<!-- <font color="black"><div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="tindaklanjut" value="1" >
						    Yes
							
							<input type="radio" name="optionsRadios" id="tindaklanjut" value="2" checked>
						    No
						  </label>
						  </font>
						</div>
						<!--div class="radio">
						  <label>
						    
						  </label>
						</div-->

						<input type="radio" name="tindaklanjut"	value="1" id="tindaklanjut1">Ya
						<input type="radio" name="tindaklanjut" value="2" id="tindaklanjut2" checked>Tidak

		            		</td>
						
							
						</tr>
						
						<tr >
							<td>
								<font color="black">Kabupaten / Kota</font>
							</td>
							<td>
								<!--input type="text" class="form-body-control" placeholder="Kabupaten / Kota" autofocus-->
		            		
							<!-- <?php
							/*		echo "<select class='myform-body-control' name='idkota' id='idkota'>";
									
									$tampil=mysql_query("SELECT id_user, namauser FROM user ORDER BY 1");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[id_user] >$w[namauser]</option>";        
									}
									echo "<option value='belum pilih' selected>Nama Kabupaten / Kota</option>";
									 echo "</select>";*/
								?> -->
							

							<select class='myform-body-control myplaceholder' name='idkota' id='idkota'>
							           <option value='belum pilih' selected disabled hidden>Nama Kabupaten / Kota</option>
							           <option value='belum pilih1' disabled>Pilih Daerah Terlebih Dahulu</option>
							        </select>


							</td>
							
							<td rowspan="2" valign="top">
								<font color="black">Detail Acara</font>
								
							</td>
							<td rowspan="3">
								<!--input type="text" class="form-body-control" placeholder="User ID" autofocus-->
								<textarea style="resize: none;" id="detailacara" class="Area-body-control "name="message" rows="5" cols="15" placeholder="Tujuan Acara - Konsep Acara - Tamu Yang Hadir" autofocus></textarea>
		            		</td>
						
							
						</tr>

						<tr>
						<td height="10px">
								<font color="black">Tipe Keperluan</font>
							</td>
							<td>
								
								<!--select class="myform-body-control" placeholder="Keperluan">
								<option>Visitation</option>
								<option>Training</option>
								<option>Meeting</option>
								</select-->
								
								<?php
									echo "<select class='myform-body-control' name='idkeperluan' id='idkeperluan'>";
									
									$tampil=mysql_query("SELECT id_keperluan, jenis_keperluan FROM keperluan ORDER BY 1");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[id_keperluan] >$w[jenis_keperluan]</option>";        
									}
									echo "<option value='belum pilih' selected disabled hidden>Tipe Keperluan</option>";
									 echo "</select>";
								?>
								
							</td>
						<br>
						</td>
						
						</tr>												
						
						
						<tr>
						<td colspan="3">
						<br>
						</td>
						
						</tr>						
						
						
						
						<tr>
						<td colspan="4" align="right">
						
								<font color="#ff3333" style="padding-right: 10px;">*Tujuan Acara - Konsep Acara - Tamu Yang Hadir</font>
								<br><br>
						</td>
						</tr>
						
						<tr>
						<td colspan="2">
						<input class="btn btn-theme btn-block" type="button" id="simpankunjungan" name="simpankunjungan" onclick="inputkunjungan()" value="Simpan Laporan">
						</td>
						
						<td colspan="2">
						<input class="btn btn-theme btn-block" type="button" id="editkunjungan" name="editkunjungan" onclick="editKunjungan()" value="Ubah Laporan" disabled="">
		            
						</td>

						
						
						
						</tr>
						
						
						
						
						
						
					</table>
					
					<!--div class="font-black" style="float:left;" width="25%">
					Daftar Kunjungan
					</div>					
					
					<div class="font-black" style="float:center;" width="50%">
					
					Search					
					</div-->					
					
					
					<br>
					<table width="100%" border="0" class="font-black" align="center">
						<!-- #1 TR -->
						<tr>
							<td colspan="3"><h2>LAPORAN KEGIATAN SETC - SARTC</h2></td>
						</tr>
						<!-- #2 TR -->
					</table>
					<div style="width:100%;float:left;padding:0 0 10px 0">
						<label style="color:dimgrey;float:left;padding-top:7px;padding-right:10px"><strong>Rekap Berdasarkan :</strong></label>
						<select id="search_method" class="myform-body-control" name="parameter_pencarian" style="width:200px" onchange="tampil_parameter(this.value)">
											<option value="1">Tanggal</option>
											<option value="2">Bulan</option>
											<option value="3">Tahun</option>
											<option value="4">Nama Panitia</option>
											<option value="5">Tipe Instansi</option>
											<option value="6">Provinsi / Daerah</option>
											<option value="7">Kabupaten / Kota</option>
											<option value="8">Tipe Keperluan</option>
											<option value="9">Nomor Kontak Panitia</option>
											<option selected hidden>Klik Di Sini</option>
										</select>
					</div>
					<div class="parameter_search" id="tanggal" style="width:100%;float:left;padding:10px 0 10px 0;display:none">
						<div style="width:100%;float:left;padding:0 0 10px 0">
							<div style="width:100px;float:left;">
								<label style="color:dimgrey;float:left;padding-top:7px;padding-right:10px">Tanggal Awal</label>
							</div>
							<div style="width:200px;float:left;">
								<input style="width:120px" class="form-body-control tanggal" placeholder="-- Klik Di Sini --" id="tgl_awal" name="tgl_awal"/>
							</div>
						</div>
						<div style="width:100%;float:left;padding:0 0 10px 0">
							<div style="width:100px;float:left;">
								<label style="color:dimgrey;float:left;padding-top:7px;padding-right:10px">Tanggal Akhir</label>
							</div>
							<div style="width:100px;float:left;">
								<input style="width:120px" class="form-body-control tanggal" placeholder="-- Klik Di Sini --" id="tgl_akhir" name="tgl_akhir"/>
							</div>
						</div>
						<input class="btn btn-theme btn-block" type="button"  name="cari_rekapan" onclick="carilaporan('tanggal')" value="Rekap">
					</div>
					<div class="parameter_search" id="bulan" style="width:100%;float:left;padding:10px 0 10px 0;display:none">
						<div style="width:100%;float:left;padding:0 0 10px 0">
							<div style="width:100px;float:left;">
								<label style="color:dimgrey;float:left;padding-top:7px;padding-right:10px">Bulan</label>
							</div>
							<div style="width:300px;float:left;">
								<select name="bulan" class="myform-body-control" id="bulan_pilihan" style="width:140px;float:left;">
									<option value="1">Januari</option>
									<option value="2">Februari</option>
									<option value="3">Maret</option>
									<option value="4">April</option>
									<option value="5">Mei</option>
									<option value="6">Juni</option>
									<option value="7">Juli</option>
									<option value="8">Agustus</option>
									<option value="9">September</option>
									<option value="10">Oktober</option>
									<option value="11">November</option>
									<option value="12">Desember</option>
									<option selected hidden>-- Pilih Bulan --</option>
								</select>
								<select name="bulan1" class="myform-body-control" id="bulan_pilihan1" style="width:140px;float:left;">
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option selected hidden>-- Pilih Tahun --</option>
								</select>
							</div>
						</div>
						<input class="btn btn-theme btn-block" type="button"  name="cari_rekapan" onclick="carilaporan('bulan')" value="Rekap">
					</div>
					<div class="parameter_search" id="tahun" style="width:100%;float:left;padding:10px 0 10px 0;display:none">
						<div style="width:100%;float:left;padding:0 0 10px 0">
							<div style="width:100px;float:left;">
								<label style="color:dimgrey;float:left;padding-top:7px;padding-right:10px">Tahun</label>
							</div>
							<div style="width:200px;float:left;">
								<select name="tahun" class="myform-body-control" id="tahun_pilihan" style="width:140px">
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option selected hidden>-- Pilih Tahun --</option>
								</select>
							</div>
						</div>
						<input class="btn btn-theme btn-block" type="button"  name="cari_rekapan" onclick="carilaporan('tahun')" value="Rekap">
					</div>
					<div class="parameter_search" id="nama_panitia" style="width:100%;float:left;padding:10px 0 10px 0;display:none">
						<div style="width:100%;float:left;padding:0 0 10px 0">
							<div style="width:100px;float:left;">
								<label style="color:dimgrey;float:left;padding-top:7px;padding-right:10px">Nama Panitia</label>
							</div>
							<div style="width:200px;float:left;">
								<input name="nama_panitia_input" class="form-body-control" id="nama_panitia_input" placeholder="-- Ketik Di Sini --" />
							</div>
						</div>
						<input class="btn btn-theme btn-block" type="button"  name="cari_rekapan" onclick="carilaporan('nama_panitia')" value="Rekap">
					</div>
					<div class="parameter_search" id="tipe_instansi" style="width:100%;float:left;padding:10px 0 10px 0;display:none">
						<div style="width:100%;float:left;padding:0 0 10px 0">
							<div style="width:100px;float:left;">
								<label style="color:dimgrey;float:left;padding-top:7px;padding-right:10px">Tipe Instansi</label>
							</div>
							<div style="width:200px;float:left;">
								<?php
									echo "<select class='myform-body-control' name='idtipe_input' id='idtipe_input' >";
									
									$tampil=mysql_query("SELECT id_instansi, tipe_instansi FROM instansi ORDER BY 1");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[id_instansi] >$w[tipe_instansi]</option>";        
									}
									echo "<option value='belum pilih' selected hidden>Tipe Instansi</option>";
									 echo "</select>";
								?>
							</div>
						</div>
						<input class="btn btn-theme btn-block" type="button"  name="cari_rekapan" onclick="carilaporan('tipe_instansi')" value="Rekap">
					</div>
					<div class="parameter_search" id="provinsi_daerah" style="width:100%;float:left;padding:10px 0 10px 0;display:none">
						<div style="width:100%;float:left;padding:0 0 10px 0">
							<div style="width:100px;float:left;">
								<label style="color:dimgrey;float:left;padding-top:7px;padding-right:10px">Propinsi</label>
							</div>
							<div style="width:200px;float:left;">
								<?php
									echo "<select class='myform-body-control' name='provinsi_daerah_input' id='provinsi_daerah_input'>";
									
									$tampil=mysql_query("SELECT kode_daerah, nama_daerah FROM daerah ORDER BY 1");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[kode_daerah] >$w[nama_daerah]</option>";        
									}
									echo "<option value='belum pilih' selected hidden required>Nama Daerah / Provinsi</option>";
									 echo "</select>";
								?>
							</div>
						</div>
						<input class="btn btn-theme btn-block" type="button"  name="cari_rekapan" onclick="carilaporan('provinsi_daerah')" value="Rekap">
					</div>
					<div class="parameter_search" id="kabupaten_kota" style="width:100%;float:left;padding:10px 0 10px 0;display:none">
						<div style="width:100%;float:left;padding:0 0 10px 0">
							<div style="width:100px;float:left;">
								<label style="color:dimgrey;float:left;padding-top:7px;padding-right:10px">Kota</label>
							</div>
							<div style="width:200px;float:left;">
								<?php
									echo "<select class='myform-body-control' name='kabupaten_kota_input' id='kabupaten_kota_input'>";
									
									$tampil=mysql_query("SELECT id_kota, nama_kota FROM kota ORDER BY 2 ASC");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[id_kota] >$w[nama_kota]</option>";        
									}
									echo "<option value='belum pilih' selected hidden required>Nama Kabupaten / Kota</option>";
									 echo "</select>";
								?>
							</div>
						</div>
						<input class="btn btn-theme btn-block" type="button"  name="cari_rekapan" onclick="carilaporan('kabupaten_kota')" value="Rekap">
					</div>
					<div class="parameter_search" id="tipe_keperluan" style="width:100%;float:left;padding:10px 0 10px 0;display:none">
						<div style="width:100%;float:left;padding:0 0 10px 0">
							<div style="width:100px;float:left;">
								<label style="color:dimgrey;float:left;padding-top:7px;padding-right:10px">Keperluan</label>
							</div>
							<div style="width:200px;float:left;">
								<?php
									echo "<select class='myform-body-control' name='tipe_keperluan_input' id='tipe_keperluan_input'>";
									
									$tampil=mysql_query("SELECT id_keperluan, jenis_keperluan FROM keperluan ORDER BY 1");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[id_keperluan] >$w[jenis_keperluan]</option>";        
									}
									echo "<option value='belum pilih' selected hidden>Tipe Keperluan</option>";
									 echo "</select>";
								?>
							</div>
						</div>
						<input class="btn btn-theme btn-block" type="button"  name="cari_rekapan" onclick="carilaporan('tipe_keperluan')" value="Rekap">
					</div>
					<div class="parameter_search" id="nomor_kontak" style="width:100%;float:left;padding:10px 0 10px 0;display:none">
						<div style="width:100%;float:left;padding:0 0 10px 0">
							<div style="width:100px;float:left;">
								<label style="color:dimgrey;float:left;padding-top:7px;padding-right:10px">Keperluan</label>
							</div>
							<div style="width:200px;float:left;">
								<input name="nomor_kontak_input" id="nomor_kontak_input" class="form-body-control" placeholder="-- Ketik Di Sini --" />
							</div>
						</div>
						<input class="btn btn-theme btn-block" type="button"  name="cari_rekapan" onclick="carilaporan('nomor_kontak')" value="Rekap">
					</div>
					<br>
					<!-- Gridview Buku Tamu -->
					
					   	<table width="100%" cellpadding="0" cellspacing="0" id="grid" class="table-bordered table-striped table-condensed cf font-black"  style="display: block; height: 500px; overflow-y: scroll">
											<thead>
											  <tr align="center">
												<th width="600px" scope="col"><center>ID Kegiatan</center></th>
								                <th width="102" scope="col"><center>Admin</center></th>
								                <th width="102" scope="col"><center>Tanggal Kegiatan</center></th>
								                <th width="102" scope="col"><center>Nama Instansi</center></th>
								                <th width="102" scope="col"><center>Tipe Instansi</center></th>
								                <th width="102" scope="col"><center>Daerah / Provinsi</center></th>
								                <th width="102" scope="col"><center>Kabupaten / Kota</center></th>
								                <th width="102" scope="col"><center>Tipe Keperluan</center></th>
								                <th width="102" scope="col"><center>Jumlah Pengunjung</center></th>
								                <th width="102" scope="col"><center>Nama Kontak Panitia</center></th>
								                <th width="102" scope="col"><center>Nomor Kontak Panitia</center></th>
								                <th width="102" scope="col"><center>Tindak Lanjut</center></th>
								                <th width="102" scope="col"><center>Detil Acara</center></th>
								                <th width="102" scope="col"><center>Ubah</center></th>
									
								                </thead>
								                
								                <tr>
									<?php		   
											
									//$rs=$koneksi->Execute("select id_kunjungan, id_user, tanggal_kunjungan, nama_instansi, id_instansi, id_daerah, id_kota, id_keperluan, jumlah_pengunjung, nama_cp, no_cp, id_tindaklanjut, detil_acara from kunjungan order by 1"
									// 	);
									
									
									$rs=$koneksi->Execute("SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara, i.id_instansi, d.kode_daerah, kt.id_kota, kp.id_keperluan
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
											$namauser = $rs->fields[1];
						                    $tanggal_kunjungan = $rs->fields[2];
						                    $nama_instansi = $rs->fields[3];
						                    $tipe_instansi = $rs->fields[4];
						                    $namadaerah = $rs->fields[5];
						                    $nama_kota = $rs->fields[6];
						                    $jenis_keperluan = $rs->fields[7];
						                    $jumlah_pengunjung = $rs->fields[8];
						                    $nama_cp = $rs->fields[9];
						                    $no_cp = $rs->fields[10];
						                    $id_tindaklanjut = $rs->fields[11];
						                    $detil_acara = $rs->fields[12];
						                    $id_instansi =$rs->fields[13];
						                    $kode_daerah =$rs->fields[14];
						                    $kode_kota =$rs->fields[15];
						                    $id_keperluan =$rs->fields[16];
											
											echo"<tr>";
											echo"<td>$id_kunjungan</td>";
											echo"<td>$namauser</td>";
											echo"<td>$tanggal_kunjungan</td>";
											echo"<td>$nama_instansi</td>";
											echo"<td>$tipe_instansi</td>";
											echo"<td>$namadaerah</td>";
											echo"<td>$nama_kota</td>";
											echo"<td>$jenis_keperluan</td>";
											echo"<td>$jumlah_pengunjung</td>";
											echo"<td>$nama_cp</td>";
											echo"<td>$no_cp</td>";
											echo"<td>$id_tindaklanjut</td>";
											echo"<td>$detil_acara</td>";
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
												echo"<td>$role</td>";


												<a href='Javascript:par('$id_kunjungan', '$tanggal_kunjungan', '$nama_instansi','$tipe_instansi', '$namadaerah', '$nama_kota', '$jenis_keperluan', '$jumlah_pengunjung', '$nama_cp', '$no_cp', '$id_tindaklanjut', '$detil_acara');\'>

												*/
												echo"<td>
												
												<a href=\"Javascript:par('".$id_kunjungan."','".$nama_instansi."','".$tanggal_kunjungan."','".$id_instansi."','".$kode_daerah."','".$kode_kota."','".$id_keperluan."','".$jumlah_pengunjung."','".$nama_cp."','".$no_cp."','".$id_tindaklanjut."','".$detil_acara."');\">
												<img height='25px' src='img/edit.png'>
												</a>

												<img height='25px' src=img/delete.png hspace='15'></a></td>";
												
											echo"</tr>";
										$rs->MoveNext();
										}
									}
								?>
											  </tr>
											
										  </table>
					 		
						

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
<script>
function test(){
	// var a = document.getElementById("tindaklanjut").value;
	var a = $('input[name="tindaklanjut"]:checked').val()

	alert(a);
};
function tampil_parameter(value){
	var parameter_pencarian = value;
	if(parameter_pencarian==='1'){
		$('.parameter_search').css("display","none");
		$('#tanggal').css("display","block");
	}
	else if(parameter_pencarian==='2'){
		$('.parameter_search').css("display","none");
		$('#bulan').css("display","block");
	}
	else if(parameter_pencarian==='3'){
		$('.parameter_search').css("display","none");
		$('#tahun').css("display","block");
	}
	else if(parameter_pencarian==='4'){
		$('.parameter_search').css("display","none");
		$('#nama_panitia').css("display","block");
	}
	else if(parameter_pencarian==='5'){
		$('.parameter_search').css("display","none");
		$('#tipe_instansi').css("display","block");
	}
	else if(parameter_pencarian==='6'){
		$('.parameter_search').css("display","none");
		$('#provinsi_daerah').css("display","block");
	}
	else if(parameter_pencarian==='7'){
		$('.parameter_search').css("display","none");
		$('#kabupaten_kota').css("display","block");
	}
	else if(parameter_pencarian==='8'){
		$('.parameter_search').css("display","none");
		$('#tipe_keperluan').css("display","block");
	}
	else if(parameter_pencarian==='9'){
		$('.parameter_search').css("display","none");
		$('#nomor_kontak').css("display","block");
	}
};
</script>
</html>
