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
<title>Admin SETC | Setting Data User</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/font.css" rel="stylesheet">
<link href="css/table-responsive.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="js/proses.js"></script>
</head>

<body>
<div class="navbar">
  <div align="center" class="navbar-inner">
    <div class="container">
      <ul class="nav nav-collapse pull-right">
        <li><a href="beranda.php" > Home</a></li>
        <li><a href="kunjungan.php" > Input</a></li>
        <li><a href="#" class="dropbtnme active" onclick="myFunction()" > Setting</a>
		
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


	
			<form class="form-body" >
		        <!--h2 class="form-login-heading">Log In</h2-->
		        <div class="body-wrap">
		            
					<table border="0" width="100%">
					
					<tr>
					<td rowspan="2" width="48%"  valign="top" align="right">
					
					<table border="0" align="center" width="100%" style="text-align:left;padding-left:10px;">
						
						<tr>
							<td colspan="2" class="font-black" style="text-align:center;">
							<h2>Data User</h2>
							</td>
						</tr>
						
						<tr>
							<td colspan="2" style="text-align:center;">
							<br>
							<br>
							</td>
						</tr>
						
						<tr>
							<td width="150px">
								<font color="black">ID</font>
							</td>
							<td>
								<input type="text" id="iduser" class="form-body-control" placeholder="ID User" autofocus>
		            		</td>
							
							
						</tr>
						
						<tr>
							<td>
								<font color="black">Nama</font>
							</td>
							<td>
								<input type="text" id="namauser" class="form-body-control" placeholder="Nama User" autofocus>
							</td>						
						</tr>
						
						<tr>
							<td>
								<font color="black">Password</font>
							</td>
							<td>
								<input id="passworduser" class="form-body-control" placeholder="Password" type="password" autofocus>
							</td>						
						</tr>
						
						<tr>
							<td>
								<font color="black">Ulangi Password</font>
							</td>
							<td>
								<input id="repassworduser" class="form-body-control" placeholder="Ulangi Password" type="password" autofocus>
							</td>						
						</tr>
						
						<tr>
							<td>
								<font color="black">Jenis User</font>
							</td>
							<td>
								<select id="jenisuser" class="myform-body-control" placeholder="Jenis User" width="255px">
								<option value="Operator" selected>Operator</option>
								<option value="Admin">Admin</option>
								<option value="Manajemen">Manajemen</option>
								</select>
							</td>						
						</tr>
						
						
										
						
					</table>
					
					<table width="86%" border="0" align="left">
					<tr>
					
						<td width="50%" style="padding-left:10px;">
						<input class="btn btn-theme btn-block" type="button" id="simpanuser" name="simpanuser" onclick="cekpassword()" value="Submit">
						</td>
						
						<td width="50%" style="padding-right:10px">
						<input class="btn btn-theme btn-block" id="editUser_btn" onclick="editUser()" type="button" value="Edit"/>
		            
						</td>
						
					</tr>
					
					</table>
					
					</td>
					
					<td  height="10px">
					
					<table border="0" class="font-black" width="100%">
						<tr>
						
						<td width="80%" align="left"><b>Daftar User</b>
						</td>
						
						</tr>
						</table>
					
					</td>
					
					</tr>
					
					<tr>
					
					<td>
					

                              <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" class="table-bordered table-striped table-condensed cf font-black"  style="display: block; height: 300px; overflow-y: scroll">
											<thead>
											  <tr align="center">
												<th width="136" scope="col"><!--input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" /--><center>ID User</center></th>
												<!--th width="136" scope="col">Nama Pengguna</th>
												<th width="136" scope="col">ID Karyawan</th-->
												<th width="102" scope="col"><center>Nama User</center></th>
												<th width="102" scope="col"><center>Jenis Pengguna</center></th>
												<th width="102" scope="col"><center>Action</center></th>
												<!--th width="102" scope="col">Ubah</th-->
											   
											  </tr>
											</thead>
											<tbody id="table">
												<?php
									$rs=$koneksi->Execute("select id_user, namauser, jenis_user from user order by 1");
									if ($rs->RecordCount() > 0)
									{
										while(!$rs->EOF)
										{
											$iduser = $rs->fields[0];
											$namauser = $rs->fields[1];
											$jenisuser = $rs->fields[2];
											
											echo"<tr>";
												echo"<td>$iduser</td>";
												echo"<td>$namauser</td>";
												
												if ($jenisuser == 1)
												{
													$role = "Operator";
												}
												else if ($jenisuser == 2)
												{
													$role = "Admin";
												}
												else if ($jenisuser == 3)
												{
													$role = "Manajemen";
												}
												else{
													$role = "Unindentified";
												}
												echo"<td>$role</td>";
												echo'<td><input class="btn btn-theme btn-block" onclick="setDataUser(\''.$iduser.'\')" type="button" value="Edit"/></td>';
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
					<!-- Gridview Buku Tamu -->
					<div align="center">
					   	
					 		
						
</div>
		            
		        </div>
		
		
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
