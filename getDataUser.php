
<?php
include_once("koneksi/conn.php");
$id = $_POST['id'];

$rs=$koneksi->Execute("select id_user, namauser, jenis_user, password from user where id_user='$id' limit 1");
	if ($rs->RecordCount() > 0)
	{
		while(!$rs->EOF)
		{
			
			$namauser = $rs->fields[1];
			$jenis_user = $rs->fields[2];
			$password = $rs->fields[3];
			//$nama = $rs->fields[1];
				
				echo"$namauser";
				echo"[split]";
				if($jenis_user=='1'){
					echo"Operator";
				}
				elseif($jenis_user=='2'){
					echo"Admin";
				}
				elseif($jenis_user=='3'){
					echo"Manajemen";
				}
				echo"[split]";
				echo"$password";
				
		$rs->MoveNext();
		}
	}

?>