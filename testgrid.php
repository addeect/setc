<?php
				include_once("koneksi/conn.php");


// select t.ticketid,
//   date_format(r.datenew, '%Y-%m-%d') datenew,
//   c.name,
//   p.payment,
//   r.total
// from tickets t
// left join RECEPTS r
//   on t.id = r.id
// left join CUSTOMERS c
//   on t.customer = c.id
// left join payments p 
//   on t.id = p.RECEIPT
//   and r.id = p.RECEIPT

// <th width="600px" scope="col"><center>ID Kegiatan</center></th>
// <th width="102" scope="col"><center>Admin</center></th>
// <th width="102" scope="col"><center>Tanggal Kegiatan</center></th>
// <th width="102" scope="col"><center>Nama Instansi</center></th>
// <th width="102" scope="col"><center>Tipe Instansi</center></th>
// <th width="102" scope="col"><center>Daerah / Provinsi</center></th>
// <th width="102" scope="col"><center>Kabupaten / Kota</center></th>
// <th width="102" scope="col"><center>Tipe Keperluan</center></th>
// <th width="102" scope="col"><center>Jumlah Pengunjung</center></th>
// <th width="102" scope="col"><center>Nama Kontak Panitia</center></th>
// <th width="102" scope="col"><center>Nomor Kontak Panitia</center></th>
// <th width="102" scope="col"><center>Tindak Lanjut</center></th>
// <th width="102" scope="col"><center>Detil Acara</center></th>

$rs=$koneksi->Execute("SELECT k.id_kunjungan, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara
                FROM KUNJUNGAN k
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

?>

