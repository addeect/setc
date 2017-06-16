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
<title>Operator SETC | Input</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link href="css/table-responsive.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
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
        <li><a href="beranda2.php" > Home</a></li>
        <li><a href="#" class="active"> Input</a></li>
        <li><a href="statistik1.php"> Detail Report</a></li>
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
		            
					<table border="0" align="center" width="100%" style="text-align:left;padding-left:10px;">
						
						<tr>
							<td colspan="4" class="font-black" style="text-align:center;">
							<h2>Kunjungan SETC</h2>
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
								<font color="black">Nama Instansi</font>
							</td>
							<td>
								<input type="text" class="form-body-control" placeholder="Nama Instansi" autofocus>
		            		</td>
							
							
							<td >
								<font color="black">Jumlah Pengunjung</font>
							</td>
							<td>
								<input type="text" class="form-body-control" placeholder="Jumlah Pengunjung" autofocus>
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
									echo "<select class='myform-body-control' name='idtipe' id='idtipe'>";
									
									$tampil=mysql_query("SELECT id_user, namauser FROM user ORDER BY 1");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[id_user] >$w[namauser]</option>";        
									}
									echo "<option value='belum pilih' selected>Tipe Instansi</option>";
									 echo "</select>";
								?>
								
							</td>
							
							<td>
								<font color="black">Nama Contact Person</font>
							</td>
							<td>
								<input type="text" class="form-body-control" placeholder="Nama Contact Person" autofocus>
		            		</td>
						
							
						</tr>
						
						<tr>
							<td>
								<font color="black">Daerah Kunjungan</font>
							</td>
							<td>
								<!--input type="text" class="form-body-control" placeholder="Daerah Kunjungan" autofocus-->
								<?php
									echo "<select class='myform-body-control' name='iddaerah' id='iddaerah'>";
									
									$tampil=mysql_query("SELECT id_user, namauser FROM user ORDER BY 1");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[id_user] >$w[namauser]</option>";        
									}
									echo "<option value='belum pilih' selected>Nama Daerah / Provinsi</option>";
									 echo "</select>";
								?>
		            		</td>
							
							<td>
								<font color="black">Telp Contact Person</font>
							</td>
							<td>
								<input type="text" class="form-body-control" placeholder="Telp Contact Person" autofocus>
		            		</td>
						
							
						</tr>
						
						<tr>
							<td>
								<font color="black">Kabupaten / Kota</font>
							</td>
							<td>
								<!--input type="text" class="form-body-control" placeholder="Kabupaten / Kota" autofocus-->
		            		
							<?php
									echo "<select class='myform-body-control' name='idkota' id='idkota'>";
									
									$tampil=mysql_query("SELECT id_user, namauser FROM user ORDER BY 1");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[id_user] >$w[namauser]</option>";        
									}
									echo "<option value='belum pilih' selected>Nama Kabupaten / Kota</option>";
									 echo "</select>";
								?>
							
							</td>
							
							<td>
								<font color="black">To Follow Up</font>
							</td>
							<td>
								<font color="black"><div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
						    Yes
							
							<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked>
						    No
						  </label>
						  </font>
						</div>
						<!--div class="radio">
						  <label>
						    
						  </label>
						</div-->
		            		</td>
						
							
						</tr>
						
						<tr >
							<td height="10px">
								<font color="black">Keperluan</font>
							</td>
							<td>
								
								<!--select class="myform-body-control" placeholder="Keperluan">
								<option>Visitation</option>
								<option>Training</option>
								<option>Meeting</option>
								</select-->
								
								<?php
									echo "<select class='myform-body-control' name='idkeperluan' id='idkeperluan'>";
									
									$tampil=mysql_query("SELECT id_user, namauser FROM user ORDER BY 1");

									while($w=mysql_fetch_array($tampil))
									{
										echo "<option value=$w[id_user] >$w[namauser]</option>";        
									}
									echo "<option value='belum pilih' selected>Keperluan</option>";
									 echo "</select>";
								?>
								
							</td>
							
							<td >
								<font color="black">Brief Remarks</font>
							</td>
							<td rowspan="3">
								<!--input type="text" class="form-body-control" placeholder="User ID" autofocus-->
								<textarea class="Area-body-control "name="message" rows="5" cols="15" placeholder="Brief Remarks" autofocus>
								
								</textarea>
		            		</td>
						
							
						</tr>

						<tr>
						<td colspan="3">
						<br>
						</td>
						
						</tr>												
						
						
						<tr>
						<td colspan="3">
						<br>
						</td>
						
						</tr>						
						
						
						
						<tr>
						<td colspan="4">
						<br>
						</td>
						</tr>
						
						<tr>
						<td colspan="2">
						<button class="btn btn-theme btn-block" href="index.html" type="submit">Submit</button>
		            
						</td>
						
						<td colspan="2">
						<button class="btn btn-theme btn-block" href="index.html" type="submit">Cancel</button>
		            
						</td>
						
						</tr>
						
						
						
						
						
						
					</table>
					<br>
					<!--div class="font-black" style="float:left;" width="25%">
					Daftar Kunjungan
					</div>					
					
					<div class="font-black" style="float:center;" width="50%">
					
					Search					
					</div-->					
					
					<div class="font-black" style="float:right;" width="25%">
					
							<br>
					</div>
					
					<table border="0" class="font-black" align="center">
					<tr>
					
					<td width="80%" align="right" style="padding-right:130px"><h2>Daftar Kunjungan</h2>
					</td>
					
					<td align="right" style="padding-right:10px">Search
					</td >
					<td>
					<input type="text" class="form-body-control" placeholder="Search Data Buku Tamu" autofocus>
		           	
					
					</td>
					</tr>
					</table>
					
					<br>
					<!-- Gridview Buku Tamu -->
					
					   	<table class="table table-bordered table-striped table-condensed cf font-black">
                                  <thead class="cf">
                                  <tr>
                                      <th>Tanggal Kunjungan</th>
                                      <th>Nama Instansi</th>
                                      <th>Tipe Instansi</th>
                                      <th>Daerah Kunjungan</th>
                                      <th>Kabupaten / Kota</th>
                                      <th>Keperluan</th>
                                      <th>Jumlah Personel</th>
                                      <th>Nama CP</th>
                                      <th>Telp CP</th>
                                      <th>Brief Remarks</th>
                                      <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
                                      <td>Tanggal</td>
                                      <td>Instansi ABC</td>
                                      <td>Tipe ABC</td>
                                      <td>Provinsi ABC</td>
                                      <td>Kab. ABC</td>
                                      <td>Keperluan ABC</td>
                                      <td>Jumlah ABC</td>
                                      <td>Nama ABC</td>
                                      <td>Telp ABC</td>
                                      <td>Brief Remarks ABC</td>
                                      <td><a href="#">Edit</a></td>
                                  </tr>
                                  <tr>
										<td>Tanggal</td>
										<td>Instansi ABC</td>
                                      <td>Tipe ABC</td>
                                      <td>Provinsi ABC</td>
                                      <td>Kab. ABC</td>
                                      <td>Keperluan ABC</td>
                                      <td>Jumlah ABC</td>
                                      <td>Nama ABC</td>
                                      <td>Telp ABC</td>
                                      <td>Brief Remarks ABC</td>
									  <td><a href="#">Edit</a></td>
                                  </tr>
                                  <tr>
                                      <td>Tanggal</td>
                                      <td>Instansi ABC</td>
                                      <td>Tipe ABC</td>
                                      <td>Provinsi ABC</td>
                                      <td>Kab. ABC</td>
                                      <td>Keperluan ABC</td>
                                      <td>Jumlah ABC</td>
                                      <td>Nama ABC</td>
                                      <td>Telp ABC</td>
                                      <td>Brief Remarks ABC</td>
									  <td><a href="#">Edit</a></td>
                                  </tr>
                                  <tr>
                                      <td>Tanggal</td>
                                      <td>Instansi ABC</td>
                                      <td>Tipe ABC</td>
                                      <td>Provinsi ABC</td>
                                      <td>Kab. ABC</td>
                                      <td>Keperluan ABC</td>
                                      <td>Jumlah ABC</td>
                                      <td>Nama ABC</td>
                                      <td>Telp ABC</td>
                                      <td>Brief Remarks ABC</td>
									  <td><a href="#">Edit</a></td>
                                  </tr>
                                  <tr>
                                      <td>Tanggal</td>
                                      <td>Instansi ABC</td>
                                      <td>Tipe ABC</td>
                                      <td>Provinsi ABC</td>
                                      <td>Kab. ABC</td>
                                      <td>Keperluan ABC</td>
                                      <td>Jumlah ABC</td>
                                      <td>Nama ABC</td>
                                      <td>Telp ABC</td>
                                      <td>Brief Remarks ABC</td>
									  <td><a href="#">Edit</a></td>
                                  </tr>
                                  <tr>
                                      <td>Tanggal</td>
                                      <td>Instansi ABC</td>
                                      <td>Tipe ABC</td>
                                      <td>Provinsi ABC</td>
                                      <td>Kab. ABC</td>
                                      <td>Keperluan ABC</td>
                                      <td>Jumlah ABC</td>
                                      <td>Nama ABC</td>
                                      <td>Telp ABC</td>
                                      <td>Brief Remarks ABC</td>
									  <td><a href="#">Edit</a></td>
                                  </tr>
                                  <tr>
                                      <td>Tanggal</td>
                                      <td>Instansi ABC</td>
                                      <td>Tipe ABC</td>
                                      <td>Provinsi ABC</td>
                                      <td>Kab. ABC</td>
                                      <td>Keperluan ABC</td>
                                      <td>Jumlah ABC</td>
                                      <td>Nama ABC</td>
                                      <td>Telp ABC</td>
                                      <td>Brief Remarks ABC</td>
									  <td><a href="#">Edit</a></td>
                                  </tr>
                                  <tr>
                                      <td>Tanggal</td>
                                      <td>Instansi ABC</td>
                                      <td>Tipe ABC</td>
                                      <td>Provinsi ABC</td>
                                      <td>Kab. ABC</td>
                                      <td>Keperluan ABC</td>
                                      <td>Jumlah ABC</td>
                                      <td>Nama ABC</td>
                                      <td>Telp ABC</td>
                                      <td>Brief Remarks ABC</td>
									  <td><a href="#">Edit</a></td>
                                  </tr>
                                  <tr>
                                     <td>Tanggal</td>
                                      <td>Instansi ABC</td>
                                      <td>Tipe ABC</td>
                                      <td>Provinsi ABC</td>
                                      <td>Kab. ABC</td>
                                      <td>Keperluan ABC</td>
                                      <td>Jumlah ABC</td>
                                      <td>Nama ABC</td>
                                      <td>Telp ABC</td>
                                      <td>Brief Remarks ABC</td>
									  <td><a href="#">Edit</a></td>
                                  </tr>
                                  <tr>
                                      <td>Tanggal</td>
                                      <td>Instansi ABC</td>
                                      <td>Tipe ABC</td>
                                      <td>Provinsi ABC</td>
                                      <td>Kab. ABC</td>
                                      <td>Keperluan ABC</td>
                                      <td>Jumlah ABC</td>
                                      <td>Nama ABC</td>
                                      <td>Telp ABC</td>
                                      <td>Brief Remarks ABC</td>
									  <td><a href="#">Edit</a></td>
                                  </tr>
                                  <tr>
                                     <td>Tanggal</td>
                                      <td>Instansi ABC</td>
                                      <td>Tipe ABC</td>
                                      <td>Provinsi ABC</td>
                                      <td>Kab. ABC</td>
                                      <td>Keperluan ABC</td>
                                      <td>Jumlah ABC</td>
                                      <td>Nama ABC</td>
                                      <td>Telp ABC</td>
                                      <td>Brief Remarks ABC</td>
									  <td><a href="#">Edit</a></td>
                                  </tr>
                                  </tbody>
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
</html>
