
<?php
include_once("koneksi/conn.php");
$id = $_POST['id'];

$rs=$koneksi->Execute("select id_keperluan, jenis_keperluan from keperluan where id_keperluan='$id' limit 1");
	if ($rs->RecordCount() > 0)
	{
		while(!$rs->EOF)
		{
			$namakeperluan = $rs->fields[1];
			//$nama = $rs->fields[1];
				echo"$namakeperluan";
				
		$rs->MoveNext();
		}
	}

?>