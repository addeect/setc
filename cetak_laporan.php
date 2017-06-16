<?php
set_time_limit(0);
ob_start(); 
require_once('tcpdf/examples/lang/eng.php');
include_once('tcpdf/tcpdf.php');
include_once("koneksi/conn.php");

//$tgl_awal=$_POST['tanggal-awal'];
//$tgl_akhir=$_POST['tanggal-akhir'];

			//	$tgl_awal1 = str_replace('/', '-', $tgl_awal);
				//$tgl_awal2 = date('Y-m-d',strtotime($tgl_awal1));
				//$tgl_akhir1 = str_replace('/', '-', $tgl_akhir);
				//$tgl_akhir2 = date('Y-m-d',strtotime($tgl_akhir1));
//$nama=$_GET['nama'];
//$posisi=$_GET['posisi'];
//$rekomendasi=$_GET['r1'];
?>
<?php
header('Content-type: application/pdf');
//$tampil=mysql_query("SELECT pemasang.nama_pemasang 'nama_pemasang', pemasang.pic, pemasang.alamat_pemasang1, pemasang.no_telp FROM order_iklan join pemasang on order_iklan.id_pemasang=pemasang.id_pemasang where no_order ='$no_order' ");
	echo "<div align=\"center\">Tanggal :  s/d </div>";
	echo "<br/>";
	echo "<table border=\"1px\" width=\"1075px\">";	
	echo "<tr>";
	echo "<th style=\"font-weight:bold;\" align=\"center\" width=\"25px\">No.</th>";
					echo "<th style=\"font-weight:bold;\" align=\"left\" width=\"115px\"> No. Iklan</th>";
					echo "<th style=\"font-weight:bold;\" align=\"left\" width=\"75px\"> Tanggal</th>";
					echo "<th style=\"font-weight:bold;\" align=\"left\"> Paket</th>";
					echo "<th style=\"font-weight:bold;\" align=\"left\" width=\"170px\"> Username</th>";
					echo "<th style=\"font-weight:bold;\" align=\"left\"> Pemasang</th>";
					echo "<th style=\"font-weight:bold;\" align=\"left\" width=\"120px\"> No. Gambar</th>";
					echo "<th style=\"font-weight:bold;\" align=\"left\" width=\"90px\"> Iklan(DPP)</th>";
					echo "<th style=\"font-weight:bold;\" align=\"left\" width=\"80px\"> PPN(10%)</th>";
					echo "<th style=\"font-weight:bold;\" align=\"left\" width=\"90px\"> Total</th>";
					//echo "<td > $sts_tayang</td>";
										
				echo "</tr>";
				$i = 1;
	$rs = $koneksi->Execute("SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara
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
									order by 1");
	
		if ($rs->RecordCount() > 0){			
		
			while(!$rs->EOF){
				$no_order = $rs->fields[0];
				$tgl_order = $rs->fields[1];
				$nama_paket = $rs->fields[2];			
				$username = $rs->fields[3];
				$nama_pemasang = $rs->fields[4];
				$nama_gambar = $rs->fields[5];
				$biaya_paket = $rs->fields[6];
				$id_order = $rs->fields[7];
				
				//$total = $rs->fields[7];
				//$ppn = ($biaya_paket*0.10);
				//$total = (($biaya_paket*0.10)+$biaya_paket);
				//$biaya = number_format($biaya1, 2, ',', '.');
				//$sts_tayang = $rs->fields[4];
				
					//echo "No. Iklan : $no_order<br>";
					//echo "<br/><br/>";
				
				
				echo"<tr>";
					echo"<td align=\"center\"  style=\"font-size:12px;\"> ".$i."</td>";
					echo"<td align=\"left\" style=\"font-size:11px;\"> ".$no_order."</td>";
					echo"<td align=\"left\" width=\"75px\" style=\"font-size:11px;\"> ".$tgl_order."</td>";
					echo"<td align=\"left\" style=\"font-size:11px;\"> $nama_paket</td>";
					echo"<td align=\"left\" style=\"font-size:11px;\"> $username</td>";
					echo"<td align=\"left\" style=\"font-size:11px;\"> $nama_pemasang</td>";
					echo"<td align=\"left\" style=\"font-size:11px;\" width=\"120px\"> $nama_gambar</td>";
					echo"<td align=\"right\" style=\"font-size:11px;\"> ".$biaya_paket." &nbsp;</td>";
					echo"<td align=\"right\" style=\"font-size:11px;\"> ".$biaya_paket." &nbsp;</td>";
					echo"<td align=\"right\" style=\"font-size:11px;\"> ".$biaya_paket." &nbsp;</td>";
					//echo"<td align=\"center\"> Rp ".number_format($ppn,2,',','.')."</td>";
					//echo"<td align=\"center\"> Rp ".number_format($total,2,',','.')."</td>";
				echo"</tr>";
				echo "<tr>";
				echo "<td>&nbsp;</td>";
				echo "<td colspan=\"9\" style=\"font-size:11px;\"> Tgl. Muat : ";
					
					echo "</td>";
				echo "</tr>";
				/* echo"<tr>";
					echo"<td align=\"right\"colspan=\"3\" style=\"padding:30px;\">Total &nbsp;&nbsp;<br/>PPN &nbsp;&nbsp;</td>";
					echo"<td align=\"center\"> Rp ".number_format($biaya_paket,2,',','.')."<br/>Rp ".number_format($ppn,2,',','.')."</td>";
				echo"</tr>";
				echo"<tr>";
					echo"<td align=\"right\"colspan=\"3\" style=\"padding-right:30;\">Total &nbsp;&nbsp;</td>";
					echo"<td align=\"center\"> Rp ".number_format($total,2,',','.')."</td>";
				echo"</tr>"; */
		
			$rs->MoveNext(); 	
			$i++;
			}
		}		
			echo "<tr>";
			echo "<td colspan=\"8\" style=\"font-weight:bold;\" align=\"right\" height=\"25px\">";
			
			echo "Total &nbsp;";
			echo "</td>";
			
			
			
			//echo "<td>$total</td>";
			echo "</tr>";
		echo "</table>";
		echo "<br/><br/>";
		echo "<span>Nilai Penjualan</span><br/>";
		echo "<table width=\"200px\">";
		//echo "<tr>";
			
			//echo "</tr>";
			echo "</table>";
		//echo "<div><span style=\"text-weight:bold;\"></span></div>";
	//echo "</table>";
	
	
//echo "<table><tr><td> </td><td> </td><td align='center'><p >PT. Media Virtual Indonesia</p></td></tr></table>";
$contents = trim(ob_get_contents());  
ob_end_clean();
 

   $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false); 

   // set document information
   $pdf->SetCreator(PDF_CREATOR);
   $pdf->SetAuthor('PT. Media Virtual Indonesia');
   $pdf->SetTitle('');
   $pdf->SetSubject('');
   $pdf->SetKeywords('');

   // set default header data
   /* $str = "SELECT TANGGAL_MULAI 'Mulai', TANGGAL_AKHIR 'Akhir' FROM PERIODE WHERE ID_PERIODE=(SELECT MAX(ID_PERIODE))";
	$query = mysql_query($str) or die(mysql_error());
	$max = mysql_fetch_array($query); */
	$t1 = "   Daftar Penerimaan Iklan Mini Kolom";
	//$t2 = "Dengan Nilai Akhir Antara $p1 s/d $p2";
	//$t =  "<img src='images\logo%20copy.png'/>";
   $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
   
   $pdf->SetHeaderData('logo_mvi_web.jpg', '30x30', $t1, '    Biro : PT. Media Virtual Indonesia (SB909)');

   // set header and footer fonts
   
   $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
   $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

   // set default monospaced font
   $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

   //set margins
   $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
   $pdf->SetMargins('10','26','10');
   $pdf->SetHeaderMargin('7');
   $pdf->SetFooterMargin('10');

   //set auto page breaks
   $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

   //set image scale factor
   $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

   //set some language-dependent strings
   $pdf->setLanguageArray($l); 

   // ---------------------------------------------------------

   // set font
   $pdf->SetFont('arial', '', 11);
   
	$pdf->SetPrintFooter(true);
   // add a page
   $pdf->AddPage();

   // output the HTML content
   $pdf->writeHTML($contents, true, 0, true, 0);

   // reset pointer to the last page
   $pdf->lastPage();

   // ---------------------------------------------------------

   // Close and output PDF document
   $ftemp = sys_get_temp_dir() . '/' . 'foo.tmp';
   $file = $pdf->Output($ftemp, 'F');

   // We'll be outputting a PDF
   
   // header('Content-length: ' . strlen($file));

   // It will be called downloaded.pdf
   //$fname = "Invoice-".$_GET['no_order']."-".date("dmY").".pdf";
  //header('Content-Disposition: attachment; filename="'. $fname . '"');
   // The PDF source is in original.pdf

   $fp = fopen($ftemp, 'rb');
   while (!feof($fp)) {
      echo fread($fp, 512);
      ob_flush(); flush();
   }

   fclose($fp);
   @unlink($ftemp);
   exit;
   
?>