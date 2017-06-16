<?php
	include_once("koneksi/conn.php");
	$sts = $_POST['sts'];
	if($sts == 'simpankunjungan')
	{

	
		$sess_namauser = $_POST['sess_namauser'];		
		$popupDatepicker = $_POST['popupDatepicker'];
		$namainstansi = $_POST['namainstansi'];
		$jumlahpengunjung = $_POST['jumlahpengunjung'];
		$idtipe = $_POST['idtipe'];
		$namapanitia = $_POST['namapanitia'];
		$tipeinstansi = $_POST['tipeinstansi'];
		$nomorpanitia = $_POST['nomorpanitia'];
		$kodedaerah = $_POST['kodedaerah'];
		$tindaklanjut = $_POST['tindaklanjut'];
		$idkota = $_POST['idkota'];
		$detailacara = $_POST['detailacara'];
		$idkeperluan = $_POST['idkeperluan'];
		$save = "insert into kunjungan (id_user, tanggal_kunjungan,nama_instansi,
		id_instansi, id_daerah, id_kota, id_keperluan, jumlah_pengunjung,
		nama_cp, no_cp, id_tindaklanjut, detil_acara) values('$sess_namauser','$popupDatepicker','$namainstansi','$idtipe','$kodedaerah','$idkota','$idkeperluan','$jumlahpengunjung','$namapanitia','$nomorpanitia','$tindaklanjut','$detailacara')";
		$koneksi->Execute($save);
		$result = $koneksi->Affected_Rows();
	}
	else if($sts == 'editkunjungan'){
		$sess_namauser = $_POST['sess_namauser'];		
		$popupDatepicker = $_POST['popupDatepicker'];
		$namainstansi = $_POST['namainstansi'];
		$jumlahpengunjung = $_POST['jumlahpengunjung'];
		$idtipe = $_POST['idtipe'];
		$namapanitia = $_POST['namapanitia'];
		$tipeinstansi = $_POST['tipeinstansi'];
		$nomorpanitia = $_POST['nomorpanitia'];
		$kodedaerah = $_POST['kodedaerah'];
		$tindaklanjut = $_POST['tindaklanjut'];
		$idkota = $_POST['idkota'];
		$detailacara = $_POST['detailacara'];
		$idkeperluan = $_POST['idkeperluan'];
		$idkunjungan = $_POST['idkunjungan'];
		$save = "update kunjungan set tanggal_kunjungan ='$popupDatepicker',
		nama_instansi = '$namainstansi', id_instansi = '$idtipe', id_daerah = '$kodedaerah',
		id_kota = '$idkota', id_keperluan = '$idkeperluan', jumlah_pengunjung = '$jumlahpengunjung',
		nama_cp =  '$namapanitia', no_cp = '$nomorpanitia', id_tindaklanjut = '$tindaklanjut', detil_acara = '$detailacara'
		where id_kunjungan = '$idkunjungan'";
		$koneksi->Execute($save);
		$result = $koneksi->Affected_Rows();
		//header('Location: kunjungan.php');
	}
	else if($sts == 'ubahdaerah')
	{
		$kodedaerah = $_POST['kodedaerah'];
		//$idkaryawan = $_POST['idkaryawan'];
		//$password = $_POST['password'];
		$update = "update daerah set kode_daerah ='$kodedaerah', nama_daerah ='$namadaerah'  where kode_daerah='$kodedaerah'";
		$koneksi->Execute($update);
		$result = $koneksi->Affected_Rows();
	}
?>
<div class="portlet" >
        <div class="portlet-header fixed"><img src="images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Laporan Kegiatan SETC-SARTC </div>
		<div class="portlet-content nopadding">
        <form action="" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr>
                <th width="600px" scope="col"><center>ID Kegiatan</center></th>
                <th width="102" scope="col"><center>Admin</center></th>
                <th width="102" scope="col"><center>Tanggal Kegiatan</center></th>
                <th width="102" scope="col"><center>Nama Instansi</center></th>
                <th width="102" scope="col"><center>Tipe Instansi</center></th>
                <th width="102" scope="col"><center>Daerah / Provinsi</center></th>
                <th width="102" scope="col"><center>Kabupaten / Kota</center></th>
                <th width="102" scope="col"><center>Tipe Keperluan</center></th>
                <th width="102" scope="col"><center>Jumlah Pengunjung</center></th>
                <th width="102" scope="col"><center>Nama Kontak Panitia</center></th>
                <th width="102" scope="col"><center>Nomor Kontak Panitia</center></th>
                <th width="102" scope="col"><center>Tindak Lanjut</center></th>
                <th width="102" scope="col"><center>Detil Acara</center></th>
				<?php
	$rs=$koneksi->Execute("SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara
		                FROM KUNJUNGAN k
		left join user u
		on k.id_user=u.id_user
		left join daerah d
		on k.id_daerah=d.kode_daerah
		left join Instansi i
		on k.id_instansi=i.id_instansi
		left join kota kt
		on k.id_kota=kt.id_kota
		left join Keperluan kp
		on k.id_keperluan=kp.id_keperluan
		                ");
	if ($rs->RecordCount() > 0)
	{
		while(!$rs->EOF)
		{
			$id_kunjungan = $rs->fields[0];
			$namauser = $rs->fields[1];
            $tanggal_kunjungan = $rs->fields[2];
            $nama_instansi = $rs->fields[3];
            $tipe_instansi = $rs->fields[4];
            $namadaerah = $rs->fields[5];
            $nama_kota = $rs->fields[6];
            $jenis_keperluan = $rs->fields[7];
            $jumlah_pengunjung = $rs->fields[8];
            $nama_cp = $rs->fields[9];
            $no_cp = $rs->fields[10];
            $id_tindaklanjut = $rs->fields[11];
            $detil_acara = $rs->fields[12];
			
			echo"<tr>";
				echo"<td>$id_kunjungan</td>";
				echo"<td>$namauser</td>";
				echo"<td>$tanggal_kunjungan</td>";
				echo"<td>$nama_instansi</td>";
				echo"<td>$tipe_instansi</td>";
				echo"<td>$namadaerah</td>";
				echo"<td>$nama_kota</td>";
				echo"<td>$jenis_keperluan</td>";
				echo"<td>$jumlah_pengunjung</td>";
				echo"<td>$nama_cp</td>";
				echo"<td>$no_cp</td>";
				echo"<td>$id_tindaklanjut</td>";
				echo"<td>$detil_acara</td>";
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
              </tr>
            </thead>
          </table>
        </form>
		</div>
      </div>
<!--/table-->