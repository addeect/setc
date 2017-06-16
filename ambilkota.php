<?php
mysql_connect("localhost","root","");
mysql_select_db("setc");
$kodedaerah = $_GET['kodedaerah'];
$idkota = mysql_query("SELECT id_kota,nama_kota FROM kota WHERE kode_daerah='$kodedaerah' order by nama_kota");
echo "<option value='belum pilih' selected hidden>Nama Kabupaten / Kota</option>";
while($k = mysql_fetch_array($idkota)){
echo "<option value=\"".$k['id_kota']."\">".$k['nama_kota']."</option>\n";
}
?>