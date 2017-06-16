<?php
	include_once("koneksi/conn.php");
	$sts = $_POST['sts'];
	if($sts == 'simpankeperluan')
	{
		// $idkeperluan = $_POST['idkeperluan'];
		//$idkaryawan = $_POST['idkaryawan'];
		$jeniskeperluan = $_POST['jeniskeperluan'];
		$save = "insert into keperluan (jenis_keperluan) values('$jeniskeperluan')";
		$koneksi->Execute($save);
		$result = $koneksi->Affected_Rows();
	}
	else if($sts == 'ubahkeperluan')
	{
		$idkeperluan = $_POST['id'];
		$jeniskeperluan = $_POST['jeniskeperluan'];
		//$idkaryawan = $_POST['idkaryawan'];
		//$password = $_POST['password'];
		$update = "update keperluan set id_keperluan ='$idkeperluan', jenis_keperluan ='$jeniskeperluan'  where id_keperluan='$idkeperluan'";
		$koneksi->Execute($update);
		$result = $koneksi->Affected_Rows();
	}
?>
<?php
									$rs=$koneksi->Execute("select id_keperluan, jenis_keperluan from keperluan order by 1");
									if ($rs->RecordCount() > 0)
									{
										while(!$rs->EOF)
										{
											$idkeperluan = $rs->fields[0];
											//$nama = $rs->fields[1];
											//$idkaryawan = $rs->fields[2];
											$jeniskeperluan = $rs->fields[1];
											
											echo"<tr>";
												echo"<td>$idkeperluan</td>";
												echo"<td>$jeniskeperluan</td>";
												echo'<td><input class="btn btn-theme btn-block" onclick="setDataKeperluan(\''.$idkeperluan.'\')" type="button" value="Edit"/></td>';
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