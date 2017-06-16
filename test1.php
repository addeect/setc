<?php
                include_once("koneksi/conn.php");

?>
<!-- // select t.ticketid,
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
// <th width="102" scope="col"><center>Detil Acara</center></th> -->
<!DOCTYPE html>
<html>
<head>

<style>

body {
    font-family: "Lucida Grande", Helvetica, Verdana, sans-serif;
    font-size: 10pt;
    line-height: 14pt;
}

h1 {
    line-height: 30px;
}

.data-table, .data-table td, .data-table th {
    border-color: black;
    border-style: solid;
}

.data-table {
    border-width: 0 0 0px 0px;  
    border-spacing: 0;
    border-collapse: collapse; 
    margin: 0;
}

.data-table td, .data-table th {
    margin: 0px;
    padding: 6px;
    border-width: 1px;
    vertical-align: top;
}

.data-table th {
    background-color: gold; 
}


</style>

<link href="css/freeze.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
<link rel="stylesheet" id="coToolbarStyle" href="chrome-extension://cjabmdjcfcfdmffimndhafhblfmpjdpe/toolbar/styles/placeholder.css" type="text/css">


<script type="text/javascript">

$(document).ready(function(){
    $("table").freezeHeader({ top: true, left: true });
});


(function () {              var toolbarElement = {},                    parent = {},                    interval = 0,                   retryCount = 0,                 isRemoved = false;              if (window.location.protocol === 'file:') {                 interval = window.setInterval(function () {                     toolbarElement = document.getElementById('coFrameDiv');                     if (toolbarElement) {                           parent = toolbarElement.parentNode;                         if (parent) {                               parent.removeChild(toolbarElement);                             isRemoved = true;                               if (document.body && document.body.style) {                                 document.body.style.setProperty('margin-top', '0px', 'important');                              }                           }                       }                       retryCount += 1;                        if (retryCount > 10 || isRemoved) {                         window.clearInterval(interval);                     }                   }, 10);             }           })();</script><script type="text/javascript" id="waxCS">var WAX = function () { var _arrInputs; return { getElement: function (i) { return _arrInputs[i]; }, setElement: function(i){ _arrInputs=i; } } }(); function waxGetElement(i) { return WAX.getElement(i); } function coSetPageData(t, d){ if('wax'==t) { WAX.setElement(d);} }</script><script type="text/javascript" id="waxCS">var WAX = function () { var _arrInputs; return { getElement: function (i) { return _arrInputs[i]; }, setElement: function(i){ _arrInputs=i; } } }(); function waxGetElement(i) { return WAX.getElement(i); } function coSetPageData(t, d){ if('wax'==t) { WAX.setElement(d);} }

</script>
    <title></title>
</head>
<body>
<table border="1" id="maintable" class="data-table" >
                                            <thead>
                                              <tr align="center">
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
                                                <!-- <th width="102" scope="col"><center>Ubah</center></th> -->
                                    
                                                </thead>
                                                
                                                <tr>
                                    <?php          
                                            
                                    //$rs=$koneksi->Execute("select id_kunjungan, id_user, tanggal_kunjungan, nama_instansi, id_instansi, id_daerah, id_kota, id_keperluan, jumlah_pengunjung, nama_cp, no_cp, id_tindaklanjut, detil_acara from kunjungan order by 1"
                                    //  );
                                    
                                    
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
                                    order by 1 ");

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
                                                // echo"<td><a href=#('$id_kunjungan', '$tanggal_kunjungan', '$nama_instansi','$tipe_instansi', '$namadaerah', '$nama_kota', '$jenis_keperluan', '$jumlah_pengunjung', '$nama_cp', '$no_cp', '$id_tindaklanjut', '$detil_acara');><img height='20px' src=img/edit.png hspace='15'><img height='25px' src=img/delete.png hspace='15'></a></td>";
                                                
                                            echo"</tr>";
                                        $rs->MoveNext();
                                        }
                                    }
                                ?>
                                              </tr>
                                            
                                          </table>



</body>
</html>>

