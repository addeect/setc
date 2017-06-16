<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');
require_once('koneksi/conn.php');

$tahun=$_GET['tahun'];
// $bulan=$_GET['bulan'];
// $konfig=$_GET['konfig'];

// $setting='';
// if($konfig==='0'){
//     $setting='YEAR(DT.WAKTU_MULAI) = YEAR(CURRENT_DATE) AND MONTH(DT.WAKTU_MULAI) = MONTH(CURRENT_DATE)';
// }
// elseif($konfig==='1'){
//     $setting='YEAR(DT.WAKTU_MULAI) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(DT.WAKTU_MULAI) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)';
// }
/*$nama_lokasi=$_GET['nama_lokasi'];
$witel=$_GET['witel'];*/
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
                // Logo
                $image_file = K_PATH_IMAGES.'sampoerna-logo.jpg';
                $this->Image($image_file, 15, 12, 39, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
                // Set font
                $this->SetFont('helvetica', 'B', 12);

                $this->MultiCell(95, 5, 'PT. HM SAMPOERNA Tbk.', 0, 'L', 0, 1, '55', '14', true);
                //$pdf->MultiCell(55, 5, '[RIGHT] '.$txt, 1, 'R', 0, 1, '', '', true);
                $this->MultiCell(109, 5, 'Jl. Rungkut Industri Raya No.18, Kali Rungkut, Rungkut, Kota SBY, Jawa Timur 60293', 0, 'L', 0, 0, '55', '', true);
                //$this->Ln(2);
                $this->Line(15, 39, 195, 39, '');
                // Title
                // $this->Cell(68, 7, 'RADIO REPUBLIK INDONESIA', 0, false, 'C', 0, '', 0, false, 'T', 'B');
                // $this->Cell(0, 15, 'JL. Pemuda No. 72 Surabaya - Jawa Timur', 0, false, 'C', 0, '', 0, false, 'T', 'B');
                //$this->Cell(0, 30, 'Laporan MTTR WITEL '.$_GET['witel'], 1, false, 'R', 0, '', 0, false, 'T', 'B');
            }

            // Page footer
            public function Footer() {
                // Position at 15 mm from bottom
                $this->SetY(-15);
                // Set font
                $this->SetFont('helvetica', 'I', 8);
                // Page number
                //$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
            }
}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('AddeectCodeWorks');
$pdf->SetTitle('Laporan Bulanan');
$pdf->SetSubject('PT. HM Sampoerna');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Laporan Bulanan', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 43, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(50);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// add a page
$pdf->AddPage();
// Print a table
//$style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(255, 0, 0));
$pdf->Line(15, 39, 195, 39, '');


// create some HTML content
$html = '<table align="center"><tr><td><span style="font-weight:bold">LAPORAN BULANAN PERIODE TAHUN '.$tahun.'</span></td></tr></table><br/><br/>';
$html .= '<table align="center"><tr><td><span style="font-weight:normal">JUMLAH PENGUNJUNG</span></td></tr></table><br/><br/>';
// $html = '<span style="font-weight: bold;">PERIODE TAHUN '.strtoupper($tahun).'</span><br/><br/>';
/*$query1 = "SELECT NAMA_LOKASI, WITEL FROM master_access_point WHERE ID_LOKASI='".$id_lokasi."'";
$result1 = mysql_query($query1);
while($row1 = mysql_fetch_array($result1)){
    $nama_lokasi = $row1[0];
    $witel = $row1[1];
    $html .= '<span style="font-weight: normal;">ID Lokasi : '.$id_lokasi.' </span><br/>';
    $html .= '<span style="font-weight: normal;">Nama Lokasi : '.$nama_lokasi.' </span><br/>';
    $html .= '<span style="font-weight: normal;">Witel : '.$witel.' </span><br/><br/>';
}*/

$html .='<table align="center"><tr><td width="80px"></td><td width="500px"><table cellpadding="1" cellspacing="1" border="1" style="text-align:center;" >
<tr style="background-color:#f0f8ff"><td width="100px">BULAN</td><td>VISITATION</td><td>TRAINING</td><td>MEETING</td></tr>';

$query = "select MONTHNAME(kunjungan.tanggal_kunjungan) as bulan,sum(IF(`id_keperluan`=1,jumlah_pengunjung,NULL)) Visit, sum(IF(`id_keperluan`=2,jumlah_pengunjung,NULL)) Train, sum(IF(`id_keperluan`=3,jumlah_pengunjung,NULL)) Meet from kunjungan where YEAR(tanggal_kunjungan) ='".$tahun."' group by MONTH(tanggal_kunjungan) ASC";
//$html .= '<span>'.$query.'</span><br/>';
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
    $bulan = $row[0];
    $visit = $row[1];
    $train= $row[2];
    $meet = $row[3];
    
    $html .='<tr>';
    $html .='<td>'.$bulan.'</td>';
    if($visit!=null){
      $html .= "<td>".$visit."</td>";
    }
    else{
      $html .= "<td>0</td>";
    }
    if($train!=null){
      $html .= "<td>".$train."</td>";
    }
    else{
      $html .= "<td>0</td>";
    }
    if($meet!=null){
      $html .= "<td>".$meet."</td>";
    }
    else{
      $html .= "<td>0</td>";
    }
    
    // $html .='<td>'.$visit.'</td>';
    // $html .='<td>'.$train.'</td>';
    // $html .='<td>'.$meet.'</td>';
    
    $html .='</tr>';
}

$html .= '</table></td><td width="10px"></td></tr></table><br/><br/><br/>';
$html .= '<table align="center"><tr><td><span style="font-weight:normal">JUMLAH KEGIATAN</span></td></tr></table><br/><br/>';
// $html = '<span style="font-weight: bold;">PERIODE TAHUN '.strtoupper($tahun).'</span><br/><br/>';
/*$query1 = "SELECT NAMA_LOKASI, WITEL FROM master_access_point WHERE ID_LOKASI='".$id_lokasi."'";
$result1 = mysql_query($query1);
while($row1 = mysql_fetch_array($result1)){
    $nama_lokasi = $row1[0];
    $witel = $row1[1];
    $html .= '<span style="font-weight: normal;">ID Lokasi : '.$id_lokasi.' </span><br/>';
    $html .= '<span style="font-weight: normal;">Nama Lokasi : '.$nama_lokasi.' </span><br/>';
    $html .= '<span style="font-weight: normal;">Witel : '.$witel.' </span><br/><br/>';
}*/

$html .='<table align="center"><tr><td width="80px"></td><td width="500px"><table cellpadding="1" cellspacing="1" border="1" style="text-align:center;" >
<tr style="background-color:#f0f8ff"><td width="100px">BULAN</td><td>VISITATION</td><td>TRAINING</td><td>MEETING</td></tr>';

$query1 = "SELECT monthname(kunjungan.tanggal_kunjungan) as bulan, sum(kunjungan.id_keperluan=1) AS Visitation, Sum(kunjungan.id_keperluan=2) AS Training, Sum(kunjungan.id_keperluan=3) AS Meeting
                from kunjungan LEFT JOIN keperluan
                on kunjungan.id_keperluan=keperluan.id_keperluan
                where year(tanggal_kunjungan)='".$tahun."'
                GROUP BY DATE_FORMAT(kunjungan.tanggal_kunjungan, '%b')
                ORDER BY kunjungan.tanggal_kunjungan ASC";
//$html .= '<span>'.$query.'</span><br/>';
$result1 = mysql_query($query1);
while($row1 = mysql_fetch_array($result1)){
    $bulan1 = $row1[0];
    $visit1 = $row1[1];
    $train1= $row1[2];
    $meet1 = $row1[3];
    
    $html .='<tr>';
    $html .='<td>'.$bulan1.'</td>';
    
    
    $html .='<td>'.$visit1.'</td>';
    $html .='<td>'.$train1.'</td>';
    $html .='<td>'.$meet1.'</td>';
    
    $html .='</tr>';
}

$html .= '</table></td><td width="10px"></td></tr></table><br/>';
// $html .= '<br/><span style="font-weight: bold;">REKOMENDASI</span><br/>';
// $html .= '<span style="font-weight: normal;">Lakukan Pergantian SHIFT KERJA PADA TEKNISI LAPANGAN  :</span><br/>';
// $html .= '<span style="font-weight: normal;">Tiket Open : '; 

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print all HTML colors



// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan-Bulanan-Tahun-'.$tahun.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+