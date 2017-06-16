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
								                <th width="102" scope="col"><center>Ubah</center></th>
									
								                </thead>
								                
								                <tr>
									<?php		   
											include_once("koneksi/conn.php");
									//$rs=$koneksi->Execute("select id_kunjungan, id_user, tanggal_kunjungan, nama_instansi, id_instansi, id_daerah, id_kota, id_keperluan, jumlah_pengunjung, nama_cp, no_cp, id_tindaklanjut, detil_acara from kunjungan order by 1"
									// 	);
									// AddeectCodeWorks 2016-06-21 20:01 PM
									// SET SEARCH METHOD
									$sts = $_POST['sts'];
									$parameter1 = $_POST['par1'];
									$parameter2 = $_POST['par2'];
									$search_query ='';
									if($sts == '1'){// Date Based
										$search_query = "SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara, i.id_instansi, d.kode_daerah, kt.id_kota, kp.id_keperluan
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
									WHERE
									DATE(k.tanggal_kunjungan) between '".$parameter1."' AND '".$parameter2."'
									order by k.tanggal_kunjungan ASC ";
										//$search_query = 'DATE(k.tanggal_kunjungan)';
									}
									else if($sts == '2'){// Month Based
										$search_query = "SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara, i.id_instansi, d.kode_daerah, kt.id_kota, kp.id_keperluan
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
									WHERE
									MONTH(k.tanggal_kunjungan) = '".$parameter1."' AND YEAR(k.tanggal_kunjungan) = '".$parameter2."'
									order by k.tanggal_kunjungan ASC ";
										//$search = 'MONTH(k.tanggal_kunjungan)';
									}
									else if($sts == '3'){// Year Based
										$search_query = "SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara, i.id_instansi, d.kode_daerah, kt.id_kota, kp.id_keperluan
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
									WHERE
									YEAR(k.tanggal_kunjungan) = '".$parameter1."'
									order by k.tanggal_kunjungan ASC ";
										//$search = 'YEAR(k.tanggal_kunjungan)';
									}
									else if($sts == '4'){// Name Based
										$search_query = "SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara, i.id_instansi, d.kode_daerah, kt.id_kota, kp.id_keperluan
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
									WHERE
									k.nama_cp LIKE '%".$parameter1."%'
									order by k.nama_cp ASC ";
										//$search = 'k.nama_cp';
									}
									else if($sts == '5'){// type Based
										$search_query = "SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara, i.id_instansi, d.kode_daerah, kt.id_kota, kp.id_keperluan
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
									WHERE
									k.id_instansi = '".$parameter1."'
									order by k.tanggal_kunjungan ASC ";
										//$search = 'i.tipe_instansi';
									}
									else if($sts == '6'){// area Based
										$search_query = "SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara, i.id_instansi, d.kode_daerah, kt.id_kota, kp.id_keperluan
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
									WHERE
									k.id_daerah = '".$parameter1."'
									order by k.tanggal_kunjungan ASC ";
										//$search = 'd.nama_daerah';
									}
									else if($sts == '7'){// city Based
										$search_query = "SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara, i.id_instansi, d.kode_daerah, kt.id_kota, kp.id_keperluan
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
									WHERE
									k.id_kota = '".$parameter1."'
									order by k.tanggal_kunjungan ASC ";
										//$search = 'kt.nama_kota';
									}
									else if($sts == '8'){// needs Based
										$search_query = "SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara, i.id_instansi, d.kode_daerah, kt.id_kota, kp.id_keperluan
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
									WHERE
									k.id_keperluan = '".$parameter1."'
									order by k.tanggal_kunjungan ASC ";
										//$search = 'kp.jenis_keperluan';
									}
									else if($sts == '9'){// needs Based
										$search_query = "SELECT k.id_kunjungan, u.namauser, k.tanggal_kunjungan, k.nama_instansi, i.tipe_instansi, d.nama_daerah, kt.nama_kota, kp.jenis_keperluan, k.jumlah_pengunjung, k.nama_cp, k.no_cp, k.id_tindaklanjut, k.detil_acara, i.id_instansi, d.kode_daerah, kt.id_kota, kp.id_keperluan
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
									WHERE
									k.no_cp LIKE '%".$parameter1."%'
									order by k.tanggal_kunjungan ASC ";
										//$search = 'k.no_cp';
									}
									else{
										//$search = '';
									}

									$rs=$koneksi->Execute($search_query);

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
						                    $id_instansi =$rs->fields[13];
						                    $kode_daerah =$rs->fields[14];
						                    $kode_kota =$rs->fields[15];
						                    $id_keperluan =$rs->fields[16];
											
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
												echo"<td>$role</td>";


												<a href='Javascript:par('$id_kunjungan', '$tanggal_kunjungan', '$nama_instansi','$tipe_instansi', '$namadaerah', '$nama_kota', '$jenis_keperluan', '$jumlah_pengunjung', '$nama_cp', '$no_cp', '$id_tindaklanjut', '$detil_acara');\'>

												*/
												echo"<td>
												
												<a href=\"Javascript:par('".$id_kunjungan."','".$nama_instansi."','".$tanggal_kunjungan."','".$id_instansi."','".$kode_daerah."','".$kode_kota."','".$id_keperluan."','".$jumlah_pengunjung."','".$nama_cp."','".$no_cp."','".$id_tindaklanjut."','".$detil_acara."');\">
												<img height='25px' src='img/edit.png'>
												</a>

												<img height='25px' src=img/delete.png hspace='15'></a></td>";
												
											echo"</tr>";
										$rs->MoveNext();
										}
									}
								?>
											  </tr>
											