
<?php
include_once("koneksi/conn.php");
$par = $_POST['par'];
$sts = $_POST['sts'];
if($sts=='daerah'){
	$rs=$koneksi->Execute("select kode_daerah, nama_daerah from daerah where nama_daerah LIKE '%$par%' order by 1");
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
}
else if($sts=='kota'){
	$rs=$koneksi->Execute("select daerah.nama_daerah, kota.id_kota, kota.nama_kota, daerah.kode_daerah from daerah join kota on daerah.kode_daerah=kota.kode_daerah where  kota.nama_kota LIKE '%$par%' order by 1");
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
}

?>
