<?php
	include_once("koneksi/conn.php");
	$sts = $_POST['sts'];
	if($sts == 'simpankota')
	{
		$kodedaerah = $_POST['kodedaerah'];
		// $idkota = $_POST['idkota'];
		$namakota = $_POST['namakota'];
		$save = "insert into kota (kode_daerah, nama_kota) values('$kodedaerah','$namakota')";
		$koneksi->Execute($save);
		$result = $koneksi->Affected_Rows();
	}
	else if($sts == 'ubahkota')
	{
		$kodedaerah = $_POST['id'];
		$idkota = $_POST['id_kota'];
		$namakota = $_POST['namakota'];
		$update = "update kota set id_kota ='$idkota', kode_daerah ='$kodedaerah', nama_kota='$namakota'  where id_kota='$idkota'";
		$koneksi->Execute($update);
		$result = $koneksi->Affected_Rows();
	}
?>
<?php
									$rs=$koneksi->Execute("select daerah.nama_daerah, kota.id_kota, kota.nama_kota, daerah.kode_daerah from daerah, kota where daerah.kode_daerah=kota.kode_daerah order by 1");
									if ($rs->RecordCount() > 0)
									{
										while(!$rs->EOF)
										{
											$namadaerah = $rs->fields[0];
											//$nama = $rs->fields[1];
											//$idkaryawan = $rs->fields[2];
											$idkota = $rs->fields[1];
											$namakota = $rs->fields[2];
											$kodedaerah = $rs->fields[3];
											
											echo"<tr>";
												echo"<td>$namadaerah</td>";
												echo"<td>$idkota</td>";
												echo"<td>$namakota</td>";
												echo'<td><input class="btn btn-theme btn-block" onclick="setDataKota(\''.$idkota.'\',\''.$kodedaerah.'\')" type="button" value="Edit"/></td>';
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