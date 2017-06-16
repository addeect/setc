<?php
				include_once("koneksi/conn1.php");


echo "INSERT INTO `kunjungan` (`tanggal_kunjungan`, `nama_instansi`, `id_instansi`, `id_daerah`, `id_kota`, `id_keperluan`, `jumlah_pengunjung`, `nama_cp`, `no_cp`, `id_tindaklanjut`, `detil_acara`) VALUES </br>";

$rs=$koneksi->Execute("SELECT DATE, MONTH, YEAR, GROUP_NAME, GROUP_TYPE, PROVINCE, CITY, REVISIT_ID, CP, CP_N, BRIEF_REMARKS
                FROM KUNJUNGAN
                WHERE DATE IS NOT NULL");
            
            if ($rs->RecordCount() > 0)
            {
                while(!$rs->EOF)
                {
                    $tgl = $rs->fields[0];
                    $bln = $rs->fields[1];
                    $thn = $rs->fields[2];
                    $gn = $rs->fields[3];
                    $gt = $rs->fields[4];
                    $pv = $rs->fields[5];
                    $cr = $rs->fields[6];
                    $id = $rs->fields[7];
                    $cp = $rs->fields[8];
                    $cpn = $rs->fields[9];
                    $br = $rs->fields[10];

                    $query = "SELECT VISITATION FROM KUNJUNGAN WHERE REVISIT_ID='$id'"; 
				    $result = mysql_query($query) or die(mysql_error() ); 

				    $row = mysql_fetch_array($result);

				    if ($row['VISITATION']!=NULL) {
				    	$id_keperluan = "1";
				    	$jumlah_pengunjung = $row['VISITATION'];
				    }
				    else {
				    	$query1 = "SELECT TRAINING FROM KUNJUNGAN WHERE REVISIT_ID='$id'"; 
					    $result1 = mysql_query($query1) or die(mysql_error() ); 

					    $row1 = mysql_fetch_array($result1);

					    if ($row1['TRAINING']!=NULL) {
					    	$id_keperluan = "2";
					    	$jumlah_pengunjung = $row1['TRAINING'];
					    }
					    else {
					    	$query2 = "SELECT MEETING FROM KUNJUNGAN WHERE REVISIT_ID='$id'"; 
						    $result2 = mysql_query($query2) or die(mysql_error() ); 

						    $row2 = mysql_fetch_array($result2);

						    $id_keperluan = "3";
					    	$jumlah_pengunjung = $row2['MEETING'];
					    }
				    }


                    if ($gt=="Academics") $ngt="1";
                    else if ($gt=="Business") $ngt="2";
                    else if ($gt=="CMS Beneficiaries") $ngt="3";
                    else if ($gt=="Community") $ngt="4";
                    else if ($gt=="Government") $ngt="5";
                    else if ($gt=="HMS Employees") $ngt="6";
                    else if ($gt=="HMS Pre-Retired") $ngt="7";
                    else if ($gt=="Media") $ngt="8";
                    else if ($gt=="NGOs") $ngt="9";

                    if ($bln=="January") $nbln = "01";
                    else if ($bln=="February") $nbln = "02";
                    else if ($bln=="March") $nbln = "03";
                    else if ($bln=="April") $nbln = "04";
                    else if ($bln=="May") $nbln = "05";
                    else if ($bln=="June") $nbln = "06";
                    else if ($bln=="July") $nbln = "07";
                    else if ($bln=="August") $nbln = "08";
                    else if ($bln=="September") $nbln = "09";
                    else if ($bln=="October") $nbln = "10";
                    else if ($bln=="November") $nbln = "11";
                    else if ($bln=="December") $nbln = "12";

                    // $num = 4;
$num_padded = sprintf("%02d", $tgl);
// echo $num_padded; // returns 04

					$full = "$thn"."-"."$nbln"."-"."$num_padded";

                    // echo "$thn"."-"."$nbln"."-"."$num_padded</br>";
                    echo "('$full', '$gn', '$ngt', '$pv', '$cr', '$id_keperluan', '$jumlah_pengunjung', '$cp', '$cpn', '2', '$br'),  </br>";
                    $rs->MoveNext();
                   }


               }

?>

