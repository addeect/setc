<?php
				include_once("koneksi/conn.php");
                
$sts = $_POST['sts'];
if($sts == 'testcari')

{

$cari=$_POST['cari'];
$rs=$koneksi->Execute("select * from kunjungan where id_instansi like '%$cari%'");
if ($rs->RecordCount() > 0)
            {
                while(!$rs->EOF)
                {
                    $id_kunjungan = $rs->fields[0];
                    $tanggal_kunjungan = $rs->fields[1];
                    $nama_instansi = $rs->fields[2];
                    $tipe_instansi = $rs->fields[3];
                    $namadaerah = $rs->fields[4];
                    $nama_kota = $rs->fields[5];
                    $jenis_keperluan = $rs->fields[6];
                    $jumlah_pengunjung = $rs->fields[7];
                    $nama_cp = $rs->fields[8];
                    $no_cp = $rs->fields[9];
                    $id_tindaklanjut = $rs->fields[10];
                    $detil_acara = $rs->fields[11];

                    

                    

                    // echo "$thn"."-"."$nbln"."-"."$num_padded</br>";
                    echo "('$id_kunjungan', '$tanggal_kunjungan', '$nama_instansi','$tipe_instansi', '$namadaerah', '$nama_kota', '$jenis_keperluan', '$jumlah_pengunjung', '$nama_cp', '$no_cp', '$id_tindaklanjut', '$detil_acara'),  </br>";
                    $rs->MoveNext();
                   }


               }


}

else ($sts == '0'){
    alert("Data "+cari+" Tidak Ada");
}

?>
