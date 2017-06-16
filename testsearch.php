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


?>
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript" src="js/proses.js"></script>


	<title></title>
</head>
<body>

<form action="testsearch.php" method="post">
<input type="text" name="cari" id="cari" placeholder="Cari Laporan" autofocus/>
<input type="submit" name="sumbit" id="submit"/>
</form>>

</body>
</html>
