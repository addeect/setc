<?php
	include_once("koneksi/conn.php");
	$sts = $_POST['sts'];
	if($sts == 'simpaninstansi')
	{
	// 	$idinstansi = $_POST['idinstansi'];
		//$idkaryawan = $_POST['idkaryawan'];
		$tipeinstansi = $_POST['tipeinstansi'];
		$save = "insert into instansi (tipe_instansi) values('$tipeinstansi')";
		$koneksi->Execute($save);
		$result = $koneksi->Affected_Rows();
	}
	else if($sts == 'ubahinstansi')
	{
	// 	$kodedaerah = $_POST['idinstansi'];
		//$idkaryawan = $_POST['idkaryawan'];
		//$password = $_POST['password'];
		$tipeinstansi = $_POST['tipeinstansi'];
		$idinstansi = $_POST['id'];
		$update = "update instansi set tipe_instansi ='$tipeinstansi'  where id_instansi='$idinstansi'";
		$koneksi->Execute($update);
		$result = $koneksi->Affected_Rows();
	}
?>

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
<!--/table-->