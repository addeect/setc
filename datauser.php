<?php
	include_once("koneksi/conn.php");
	$sts = $_POST['sts'];
	if($sts == 'simpanuser')
	{
		$iduser = $_POST['iduser'];
		$namauser = $_POST['namauser'];
		$passworduser = $_POST['passworduser'];
		$jenisuser = $_POST['jenisuser'];
		$idjenisuser='';

		if ($jenisuser == 'Operator')
				{
					$idjenisuser = '1';
				}
				else if ($jenisuser == 'Admin')
				{
					$idjenisuser = '2';
				}
				else if ($jenisuser == 'Manajemen')
				{
					$idjenisuser = '3';
				}

		$save = "insert into user (id_user, namauser,password, jenis_user) values('$iduser','$namauser','$passworduser','$idjenisuser')";
		$koneksi->Execute($save);
		$result = $koneksi->Affected_Rows();
	}
	else if($sts == 'ubahuser')
	{
		$iduser = $_POST['iduser'];
		$namauser = $_POST['namauser'];
		$passworduser = $_POST['passworduser'];
		$jenisuser = $_POST['jenisuser'];
		$idjenisuser='';

		if ($jenisuser == 'Operator')
				{
					$idjenisuser = '1';
				}
				else if ($jenisuser == 'Admin')
				{
					$idjenisuser = '2';
				}
				else if ($jenisuser == 'Manajemen')
				{
					$idjenisuser = '3';
				}
		//$idkaryawan = $_POST['idkaryawan'];
		//$password = $_POST['password'];
		$update = "update user set id_user ='$iduser', password ='$passworduser', jenis_user ='$idjenisuser', namauser ='$namauser'  where id_user='$iduser'";
		$koneksi->Execute($update);
		$result = $koneksi->Affected_Rows();
	}
?>
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
<!--/table-->