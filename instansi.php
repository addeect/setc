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
<title>Admin SETC | Setting Tipe Instansi</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link href="css/table-responsive.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="js/proses.js"></script>
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
    <div class="container">
      <ul class="nav nav-collapse pull-right">
        <li><a href="beranda.php" > Home</a></li>
        <li><a href="kunjungan.php" > Input</a></li>
        <li><a href="#" class="active dropbtnme" onclick="myFunction()" > Setting</a>
		
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
	  
	
	  <!--ul>
			 <li><a href="instansi.php">Tipe Instansi</a></li>
			 <li><a href="daerah.php">Daerah / Provinsi</a></li>
			 <li><a href="kota.php">Kota / Kabupaten</a></li>
			 <li><a href="keperluan.php">Keperluan</a></li>
			 <li><a href="user.php">User</a></li>
			 </ul-->	
      <div class="nav-collapse collapse"></div>
  </div>
</div>
<div style="float:right; padding-right:48px; padding-top:10px">
	
	Selamat Datang, <a href="#"><font color="#fff"><?php echo $_SESSION["sess_namauser"] ?></font></a> | Anda login sebagai <a href="#"><font color="#fff"><?php echo $_SESSION["sess_role"] ?></font></a> 
	</div>


	
			<form class="form-body" >
		        <!--h2 class="form-login-heading">Log In</h2-->
		        <div class="body-wrap">
		            
					<table border="0" width="100%">
					<tr>
					<td valign="top" align="right" rowspan="2" width="48%" >
					<table border="0" align="center" width="100%" style="text-align:left;padding-left:10px;">
						
						<tr>
							<td colspan="2" class="font-black" style="text-align:center;">
							<h2>Tipe Instansi</h2>
							</td>
						</tr>
						
						<tr>
							<td colspan="2" style="text-align:center;">
							<br>
							<br>
							</td>
						</tr>
						
						<!-- <tr>
							<td width="150px">
								<font color="black">ID Instansi</font>
							</td>
							<td>
								<input type="text" id="idinstansi" class="form-body-control" placeholder="Kode Tipe Instansi" autofocus>
		            		</td>
							
							
						</tr> -->
						
						<tr>
							<td>
								<font color="black">Tipe Instansi</font>
							</td>
							<td>
								<input type="text" id="tipeinstansi" class="form-body-control" placeholder="Tipe Instansi" autofocus>
								<input type="hidden" id="id_instansi" value="" name="id_instansi"/>
							</td>						
						</tr>
						
						
					</table>
					
					<table width="88%" border="0" align="left">
					<tr>
					<tr>
						<td width="50%" style="padding-left:10px">
						<input class="btn btn-theme btn-block" type="button" id="simpaninstansi" name="simpaninstansi" onclick="inputinstansi()" value="Submit">
						</td>
						
						<td width="50%" style="padding-right:10px">
						<input class="btn btn-theme btn-block" id="editInstansi_btn" onclick="editInstansi()" type="button" value="Edit"/>
		            
						</td>
						
						</tr>
					</tr>
					</table>
					
					</td>
					
					<td>
					<table border="0" class="font-black">
					<tr>
					
					<td width="80%" align="left"><b>Daftar Tipe Instansi</b>
					</td>
					
					
					</tr>
					</table>
					</td>
					
					</tr>
					
					<tr>
					
					<td valign="top" colspan="2">
					<!--table class="table-bordered table-striped table-condensed cf font-black" width="100%" >
                                  <thead class="cf">
                                  <tr>
                                      <th>ID Tipe Instansi</th>
                                      <th>Tipe Instansi</th>
                                      <th>Action</th>
								  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  <tr>
                                      <td>ID ABC</td>
                                      <td>Tipe Instansi ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
								  
								 
                                  </tbody>
                              </table-->

                              <table  cellpadding="0" cellspacing="0" id="box-table-a" class="table-bordered table-striped table-condensed cf font-black"  style="display: block; width:400px; height: 280px; overflow-y: scroll">
											<thead>
											  <tr align="center">
												<th width="136" scope="col"><!--input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" /--><center>ID Instansi</center></th>
												<!--th width="136" scope="col">Nama Pengguna</th>
												<th width="136" scope="col">ID Karyawan</th-->
												<th width="102" scope="col"><center>Tipe Instansi</center></th>
												<th width="102" scope="col"><center>Action</center></th>
												<!--th width="102" scope="col">Ubah</th-->
											   
											  </tr>
											</thead>
											<tbody id="table">
												<?php
									$rs=$koneksi->Execute("select id_instansi, tipe_instansi from instansi order by 1");
									if ($rs->RecordCount() > 0)
									{
										while(!$rs->EOF)
										{
											$idinstansi = $rs->fields[0];
											//$nama = $rs->fields[1];
											//$idkaryawan = $rs->fields[2];
											$tipeinstansi = $rs->fields[1];
											
											echo"<tr>";
												echo"<td>$idinstansi</td>";
												echo"<td>$tipeinstansi</td>";
												echo'<td><input class="btn btn-theme btn-block" onclick="setDataInstansi(\''.$idinstansi.'\')" type="button" value="Edit"/></td>';
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
												//echo"<td><a href=\"Javascript:par2('$iduser','$jnspengguna');\" class=\"edit_icon\" title=\"Edit\"></a></td>";
												
											echo"</tr>";
										$rs->MoveNext();
										}
									}
								?>
											</tbody>
										  </table>
					</td>
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
</body>
</html>
