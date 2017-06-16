
<?php
include_once("koneksi/conn.php");
$id = $_POST['id'];

$rs=$koneksi->Execute("select kota.nama_kota from kota where kota.id_kota='$id' limit 1");
	if ($rs->RecordCount() > 0)
	{
		while(!$rs->EOF)
		{
			$namakota = $rs->fields[0];
			//$nama = $rs->fields[1];
				echo"$namakota";
				
		$rs->MoveNext();
		}
	}

?>