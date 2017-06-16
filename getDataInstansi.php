
<?php
include_once("koneksi/conn.php");
$id = $_POST['id'];

$rs=$koneksi->Execute("select id_instansi, tipe_instansi from instansi where id_instansi = '$id' limit 1");
	if ($rs->RecordCount() > 0)
	{
		while(!$rs->EOF)
		{
			$idinstansi = $rs->fields[0];
			//$nama = $rs->fields[1];
			//$idkaryawan = $rs->fields[2];
			$tipeinstansi = $rs->fields[1];
			
			
				echo"$tipeinstansi";
				
		$rs->MoveNext();
		}
	}

?>