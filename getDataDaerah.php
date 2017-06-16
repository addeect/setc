
<?php
include_once("koneksi/conn.php");
$id = $_POST['id'];

$rs=$koneksi->Execute("select kode_daerah, nama_daerah from daerah where kode_daerah='$id' limit 1");
	if ($rs->RecordCount() > 0)
	{
		while(!$rs->EOF)
		{
			$kodedaerah = $rs->fields[0];
			//$nama = $rs->fields[1];
			//$idkaryawan = $rs->fields[2];
			$namadaerah = $rs->fields[1];
				echo"$namadaerah";
				
		$rs->MoveNext();
		}
	}

?>