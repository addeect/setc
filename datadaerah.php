<?php
	include_once("koneksi/conn.php");
	$sts = $_POST['sts'];
	if($sts == 'simpandaerah')
	{
		// $kodedaerah = $_POST['kodedaerah'];
		//$idkaryawan = $_POST['idkaryawan'];
		$namadaerah = $_POST['namadaerah'];
		$save = "insert into daerah (nama_daerah) values('$namadaerah')";
		$koneksi->Execute($save);
		$result = $koneksi->Affected_Rows();
	}
	else if($sts == 'ubahdaerah')
	{
		$kodedaerah = $_POST['id'];
		$namadaerah = $_POST['namadaerah'];
		//$idkaryawan = $_POST['idkaryawan'];
		//$password = $_POST['password'];
		$update = "update daerah set kode_daerah ='$kodedaerah', nama_daerah ='$namadaerah'  where kode_daerah='$kodedaerah'";
		$koneksi->Execute($update);
		$result = $koneksi->Affected_Rows();
	}
?>
<?php
									$rs=$koneksi->Execute("select kode_daerah, nama_daerah from daerah order by 1");
									if ($rs->RecordCount() > 0)
									{
										while(!$rs->EOF)
										{
											$kodedaerah = $rs->fields[0];
											//$nama = $rs->fields[1];
											//$idkaryawan = $rs->fields[2];
											$namadaerah = $rs->fields[1];
											
											echo"<tr>";
												echo"<td>$kodedaerah</td>";
												echo"<td>$namadaerah</td>";
												echo'<td><input class="btn btn-theme btn-block" onclick="setDataDaerah(\''.$kodedaerah.'\')" type="button" value="Edit"/></td>';
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