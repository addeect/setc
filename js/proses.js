function cariDaerah(){
	var par = document.getElementById("search_parameter").value;
	var sts = 'daerah';
	//var idkaryawan = document.getElementById("idkaryawan").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "getDataMaster.php";
	var params1 = "par="+par+"&sts="+sts;
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	//alert("Pencarian Data Sedang di Proses");
	document.getElementById("cari").value = "";
	document.getElementById("cari").autofocus;
}
function cariKota(){
	var par = document.getElementById("search_parameter").value;
	var sts = 'kota';
	//var idkaryawan = document.getElementById("idkaryawan").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "getDataMaster.php";
	var params1 = "par="+par+"&sts="+sts;
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	//alert("Pencarian Data Sedang di Proses");
	document.getElementById("cari").value = "";
	document.getElementById("cari").autofocus;
}
function editUser(){
	var iduser = document.getElementById("iduser").value;
	var namauser = document.getElementById("namauser").value;
	var passworduser = document.getElementById("passworduser").value;
	var repassworduser = document.getElementById("repassworduser").value;
	var jenisuser = document.getElementById("jenisuser").value;
	
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "datauser.php";
	var params1 = "iduser="+iduser+"&namauser="+namauser+"&passworduser="+passworduser+"&repassworduser="+repassworduser+"&jenisuser="+jenisuser+"&sts=ubahuser";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Edit Data User "+namauser+" Berhasil");
	// document.getElementById("idinstansi").value = "";
	// document.getElementById("idinstansi").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("iduser").value = "";
	document.getElementById("namauser").value = "";
	document.getElementById("passworduser").value = "";
	document.getElementById("repassworduser").value = "";
	document.getElementById("jenisuser").value = "Operator";
	document.getElementById("simpanuser").disabled = false;
	document.getElementById("editUser_btn").disabled = true;
}
function setDataUser(id){
	//var tipeinstansi = document.getElementById("tipeinstansi").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "getDataUser.php";
	var params1 = "id="+id;
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var data = xmlhttp.responseText;
			var explode = data.split('[split]');
			document.getElementById("namauser").value=explode[0];
			document.getElementById("passworduser").value=explode[2];
			document.getElementById("repassworduser").value=explode[2];
			document.getElementById("jenisuser").value=explode[1];
		}
	}
	xmlhttp.send(params1);
	//alert("Simpan Tipe Instansi Baru "+tipeinstansi+" Berhasil");
	// document.getElementById("idinstansi").value = "";
	// document.getElementById("idinstansi").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("iduser").value = id;
	document.getElementById("simpanuser").disabled = true;
	document.getElementById("editUser_btn").disabled = false;

	//document.getElementById("tipeinstansi").autofocus;
}
function editKeperluan(){
	var jeniskeperluan = document.getElementById("jeniskeperluan").value;
	var id_keperluan = document.getElementById("id_keperluan").value;
	
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "datakeperluan.php";
	var params1 = "jeniskeperluan="+jeniskeperluan+"&id="+id_keperluan+"&sts=ubahkeperluan";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Edit Data Keperluan "+jeniskeperluan+" Berhasil");
	// document.getElementById("idinstansi").value = "";
	// document.getElementById("idinstansi").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("jeniskeperluan").value = "";
	document.getElementById("jeniskeperluan").autofocus;
	document.getElementById("id_keperluan").value = "";
	document.getElementById("simpankeperluan").disabled = false;
	document.getElementById("editKeperluan_btn").disabled = true;
}
function setDataKeperluan(id){
	//var tipeinstansi = document.getElementById("tipeinstansi").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "getDataKeperluan.php";
	var params1 = "id="+id;
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("jeniskeperluan").value=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	//alert("Simpan Tipe Instansi Baru "+tipeinstansi+" Berhasil");
	// document.getElementById("idinstansi").value = "";
	// document.getElementById("idinstansi").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("id_keperluan").value = id;
	document.getElementById("simpankeperluan").disabled = true;
	document.getElementById("editKeperluan_btn").disabled = false;

	//document.getElementById("tipeinstansi").autofocus;
}
function editKota(){
	var namakota = document.getElementById("namakota").value;
	var id_daerah = document.getElementById("kodedaerah").value;
	var id_kota = document.getElementById("id_kota").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "datakota.php";
	var params1 = "namakota="+namakota+"&id="+id_daerah+"&id_kota="+id_kota+"&sts=ubahkota";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Edit Data Kota "+namakota+" Berhasil");
	// document.getElementById("idinstansi").value = "";
	// document.getElementById("idinstansi").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("namakota").value = "";
	document.getElementById("namakota").autofocus;
	document.getElementById("id_kota").value = "";
	document.getElementById("kodedaerah").value = "belum pilih";
	document.getElementById("simpankota").disabled = false;
	document.getElementById("editKota_btn").disabled = true;
}
function setDataKota(id,id_daerah){
	//var tipeinstansi = document.getElementById("tipeinstansi").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "getDataKota.php";
	var params1 = "id="+id;
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("namakota").value=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	//alert("Simpan Tipe Instansi Baru "+tipeinstansi+" Berhasil");
	// document.getElementById("idinstansi").value = "";
	// document.getElementById("idinstansi").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("id_kota").value = id;
	document.getElementById("kodedaerah").value = id_daerah;
	document.getElementById("simpankota").disabled = true;
	document.getElementById("editKota_btn").disabled = false;

	//document.getElementById("tipeinstansi").autofocus;
}
function carilaporan(search_method){
	//var new_par = value;
	//alert(new_par);
	//var par = document.getElementById("search_parameter").value;
	//var sts = document.getElementById("search_method").value;
	//var idkaryawan = document.getElementById("idkaryawan").value;
	var method = search_method;
	var sts,par1,par2 = '';
	if(method==='tanggal'){
		sts = '1';
		par1 = $('#tgl_awal').val();
		par2 = $('#tgl_akhir').val();
	}
	else if(method==='bulan'){
		sts = '2';
		par1 = $('#bulan_pilihan').val();
		par2 = $('#bulan_pilihan1').val();
	}
	else if(method==='tahun'){
		sts = '3';
		par1 = $('#tahun_pilihan').val();
	}
	else if(method==='nama_panitia'){
		sts = '4';
		par1 = $('#nama_panitia_input').val();
	}
	else if(method==='tipe_instansi'){
		sts = '5';
		par1 = $('#idtipe_input').val();
	}
	else if(method==='provinsi_daerah'){
		sts = '6';
		par1 = $('#provinsi_daerah_input').val();
	}
	else if(method==='kabupaten_kota'){
		sts = '7';
		par1 = $('#kabupaten_kota_input').val();
	}
	else if(method==='tipe_keperluan'){
		sts = '8';
		par1 = $('#tipe_keperluan_input').val();
	}
	else if(method==='nomor_kontak'){
		sts = '9';
		par1 = $('#nomor_kontak_input').val();
	}
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "getDataKunjungan.php";
	var params1 = "sts="+sts+"&par1="+par1+"&par2="+par2;
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("grid").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Pencarian Data Sedang di Proses");
	//document.getElementById("cari").value = "";
	//document.getElementById("cari").autofocus;
}
function editInstansi(){
	var tipeinstansi = document.getElementById("tipeinstansi").value;
	var idinstansi = document.getElementById("id_instansi").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "datainstansi.php";
	var params1 = "tipeinstansi="+tipeinstansi+"&id="+idinstansi+"&sts=ubahinstansi";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Edit Tipe Instansi Baru "+tipeinstansi+" Berhasil");
	// document.getElementById("idinstansi").value = "";
	// document.getElementById("idinstansi").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("tipeinstansi").value = "";
	document.getElementById("tipeinstansi").autofocus;
	document.getElementById("id_instansi").value = "";
	document.getElementById("simpaninstansi").disabled = false;
	document.getElementById("editInstansi_btn").disabled = true;
}
function setDataInstansi(id){
	//var tipeinstansi = document.getElementById("tipeinstansi").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "getDataInstansi.php";
	var params1 = "id="+id;
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("tipeinstansi").value=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	//alert("Simpan Tipe Instansi Baru "+tipeinstansi+" Berhasil");
	// document.getElementById("idinstansi").value = "";
	// document.getElementById("idinstansi").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("id_instansi").value = id;
	document.getElementById("simpaninstansi").disabled = true;
	document.getElementById("editInstansi_btn").disabled = false;

	//document.getElementById("tipeinstansi").autofocus;
}
function editDaerah(){
	var namadaerah = document.getElementById("namadaerah").value;
	var id_daerah = document.getElementById("id_daerah").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "datadaerah.php";
	var params1 = "namadaerah="+namadaerah+"&id="+id_daerah+"&sts=ubahdaerah";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Edit Data Daerah "+namadaerah+" Berhasil");
	// document.getElementById("idinstansi").value = "";
	// document.getElementById("idinstansi").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("namadaerah").value = "";
	document.getElementById("namadaerah").autofocus;
	document.getElementById("id_daerah").value = "";
	document.getElementById("simpandaerah").disabled = false;
	document.getElementById("editDaerah_btn").disabled = true;
}
function setDataDaerah(id){
	//var tipeinstansi = document.getElementById("tipeinstansi").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "getDataDaerah.php";
	var params1 = "id="+id;
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("namadaerah").value=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	//alert("Simpan Tipe Instansi Baru "+tipeinstansi+" Berhasil");
	// document.getElementById("idinstansi").value = "";
	// document.getElementById("idinstansi").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("id_daerah").value = id;
	document.getElementById("simpandaerah").disabled = true;
	document.getElementById("editDaerah_btn").disabled = false;

	//document.getElementById("tipeinstansi").autofocus;
}
function inputdaerah(){
	// var kodedaerah = document.getElementById("kodedaerah").value;
	//var idkaryawan = document.getElementById("idkaryawan").value;
	var namadaerah = document.getElementById("namadaerah").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "datadaerah.php";
	var params1 = "namadaerah="+namadaerah+"&sts=simpandaerah";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Simpan Data Daerah Baru "+namadaerah+" Berhasil");
	// document.getElementById("kodedaerah").value = "";
	// document.getElementById("kodedaerah").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("namadaerah").value = "";
}


function inputinstansi(){
	// var idinstansi = document.getElementById("idinstansi").value;
	//var idkaryawan = document.getElementById("idkaryawan").value;
	var tipeinstansi = document.getElementById("tipeinstansi").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "datainstansi.php";
	var params1 = "tipeinstansi="+tipeinstansi+"&sts=simpaninstansi";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Simpan Tipe Instansi Baru "+tipeinstansi+" Berhasil");
	// document.getElementById("idinstansi").value = "";
	// document.getElementById("idinstansi").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("tipeinstansi").value = "";
	document.getElementById("tipeinstansi").autofocus;
}


function inputkeperluan(){
	// var idkeperluan = document.getElementById("idkeperluan").value;
	//var idkaryawan = document.getElementById("idkaryawan").value;
	var jeniskeperluan = document.getElementById("jeniskeperluan").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "datakeperluan.php";
	var params1 = "jeniskeperluan="+jeniskeperluan+"&sts=simpankeperluan";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Simpan Jenis Keperluan Baru "+jeniskeperluan+" Berhasil");
	// document.getElementById("idkeperluan").value = "";
	// document.getElementById("idkeperluan").autofocus;
	//document.getElementById("idkaryawan").value = "";
	document.getElementById("jeniskeperluan").value = "";
	document.getElementById("idkeperluan").autofocus;
}


function cekpassword(){
	var passworduser = document.getElementById("passworduser").value;
	var repassworduser = document.getElementById("repassworduser").value;
	
	if(passworduser == repassworduser)
	{
		inputuser();
	}
	else
	{
		alert("Password Tidak Sama");
	}
	
}


function inputuser(){
	var iduser = document.getElementById("iduser").value;
	var namauser = document.getElementById("namauser").value;
	var passworduser = document.getElementById("passworduser").value;
	var jenisuser = document.getElementById("jenisuser").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "datauser.php";
	var params1 = "iduser="+iduser+"&namauser="+namauser+"&passworduser="+passworduser+"&jenisuser="+jenisuser+"&sts=simpanuser";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Simpan User Baru "+namauser+" Berhasil");
	document.getElementById("iduser").value = "";
	document.getElementById("iduser").autofocus;
	document.getElementById("namauser").value = "";
	document.getElementById("passworduser").value = "";
	document.getElementById("repassworduser").value = "";
	document.getElementById("jenisuser").value = 'Operator';
}


function inputkota(){
	var kodedaerah = document.getElementById("kodedaerah").value;
	// var idkota = document.getElementById("idkota").value;
	var namakota = document.getElementById("namakota").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "datakota.php";
	var params1 = "kodedaerah="+kodedaerah+"&namakota="+namakota+"&sts=simpankota";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("table").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Simpan Data Kota Baru "+namakota+" Berhasil");
	document.getElementById("kodedaerah").value = 'belum pilih';
	document.getElementById("kodedaerah").autofocus;
	// document.getElementById("idkota").value = "";
	document.getElementById("namakota").value = "";
}


function inputkunjungan(){

	var sess_namauser = document.getElementById("sess_namauser").value;	
	var popupDatepicker = document.getElementById("popupDatepicker").value;
	var namainstansi = document.getElementById("namainstansi").value;
	var jumlahpengunjung = document.getElementById("jumlahpengunjung").value;
	var namapanitia = document.getElementById("namapanitia").value;
	var idtipe = document.getElementById("idtipe").value;
	var nomorpanitia = document.getElementById("nomorpanitia").value;
	var kodedaerah = document.getElementById("kodedaerah").value;

	// var tindaklanjut = document.getElementById('tindaklanjut').value;
	var tindaklanjut = $('input[name="tindaklanjut"]:checked').val()


	var idkota = document.getElementById("idkota").value;
	var detailacara = document.getElementById("detailacara").value;
	var idkeperluan = document.getElementById("idkeperluan").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}

	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}



	

	var url1 = "datakunjungan.php";
	var params1 = "sess_namauser="+sess_namauser+"&popupDatepicker="+popupDatepicker+"&namainstansi="+namainstansi+"&jumlahpengunjung="+jumlahpengunjung+"&namapanitia="+namapanitia+"&idtipe="+idtipe+"&nomorpanitia="+nomorpanitia+"&kodedaerah="+kodedaerah+"&tindaklanjut="+tindaklanjut+"&idkota="+idkota+"&detailacara="+detailacara+"&idkeperluan="+idkeperluan+"&sts=simpankunjungan";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("grid").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.send(params1);
	alert("Simpan Kunjungan "+namainstansi+" Berhasil");
	
	document.getElementById("popupDatepicker").value = "";
	document.getElementById("namainstansi").value = "";
	document.getElementById("jumlahpengunjung").value = "";
	document.getElementById("namapanitia").value = "";
	document.getElementById("idtipe").value = 'belum pilih';
	document.getElementById("nomorpanitia").value = "";
	document.getElementById("kodedaerah").value = 'belum pilih';
	document.getElementById("idkota").value = 'belum pilih';
	document.getElementById("detailacara").value = "";
	document.getElementById("idkeperluan").value = 'belum pilih';
	
}


function hapusIsian(){

	alert("Hapus isian");
	document.getElementById("popupDatepicker").value = "";
	document.getElementById("namainstansi").value = "";
	document.getElementById("jumlahpengunjung").value = "";
	document.getElementById("namapanitia").value = "";
	document.getElementById("idtipe").value = 'belum pilih';
	document.getElementById("nomorpanitia").value = "";
	document.getElementById("kodedaerah").value = 'belum pilih';
	document.getElementById("idkota").value = 'belum pilih';
	document.getElementById("detailacara").value = "";
	document.getElementById("idkeperluan").value = 'belum pilih';
	
}



// id_kunjungan, tanggal_kunjungan, nama_instansi, tipe_instansi, nama_daerah, nama_kota, jenis_keperluan,
// 	jumlah_pengunjung, nama_cp, no_cp, id_tindaklanjut, detil_acara

function par(id_kunjungan, nama_instansi,tanggal_kunjungan,id_instansi,kode_daerah,kode_kota,id_keperluan,jumlah_pengunjung,nama_cp,no_cp,id_tindaklanjut,detil_acara){
	
	document.getElementById("namainstansi").value = nama_instansi;
	document.getElementById("popupDatepicker").value = tanggal_kunjungan;
	document.getElementById("idtipe").value = id_instansi;
	$('#kodedaerah').val(kode_daerah).change();
	
	//document.getElementById("kodedaerah").value = kode_daerah;
	//document.getElementById("idkota").value = kode_kota;
	document.getElementById("idkeperluan").value = id_keperluan;
	document.getElementById("jumlahpengunjung").value = jumlah_pengunjung;
	document.getElementById("namapanitia").value = nama_cp;
	document.getElementById("nomorpanitia").value = no_cp;
	$('textarea#detailacara').html(detil_acara);
	if(id_tindaklanjut == '1'){
		document.getElementById("tindaklanjut1").checked;
		//document.getElementById("tindaklanjut2").checked = unchecked;
	}
	else if(id_tindaklanjut == '2'){
		//document.getElementById("tindaklanjut1").checked = unchecked;
		document.getElementById("tindaklanjut2").checked;
	}
	//document.getElementById("detailacara").value = detil_acara;
	
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url1 = "Kunjungan.php";
	var params1 = "id_kunjungan="+id_kunjungan+"&namainstansi="+nama_instansi;
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			//document.getElementById("id_kunjungan").innerHTML=xmlhttp.responseText;
			$('#idkota').val(kode_kota).change();
			$('input#editkunjungan').attr('onclick','editKunjungan("'+id_kunjungan+'")');
			document.getElementById("editkunjungan").disabled = false;

		}
	}
	xmlhttp.send(params1);
	//document.getElementById("simpankunkungan").disabled = true;
	//document.getElementById("editkunjungan").disabled = false;
}

function editKunjungan(id){

	var sess_namauser = document.getElementById("sess_namauser").value;	
	var popupDatepicker = document.getElementById("popupDatepicker").value;
	var namainstansi = document.getElementById("namainstansi").value;
	var jumlahpengunjung = document.getElementById("jumlahpengunjung").value;
	var namapanitia = document.getElementById("namapanitia").value;
	var idtipe = document.getElementById("idtipe").value;
	var nomorpanitia = document.getElementById("nomorpanitia").value;
	var kodedaerah = document.getElementById("kodedaerah").value;

	// var tindaklanjut = document.getElementById('tindaklanjut').value;
	var tindaklanjut = $('input[name="tindaklanjut"]:checked').val()


	var idkota = document.getElementById("idkota").value;
	var detailacara = document.getElementById("detailacara").value;
	var idkeperluan = document.getElementById("idkeperluan").value;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}

	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}



	

	var url1 = "datakunjungan.php";
	var params1 = "sess_namauser="+sess_namauser+"&idkunjungan="+id+"&popupDatepicker="+popupDatepicker+"&namainstansi="+namainstansi+"&jumlahpengunjung="+jumlahpengunjung+"&namapanitia="+namapanitia+"&idtipe="+idtipe+"&nomorpanitia="+nomorpanitia+"&kodedaerah="+kodedaerah+"&tindaklanjut="+tindaklanjut+"&idkota="+idkota+"&detailacara="+detailacara+"&idkeperluan="+idkeperluan+"&sts=editkunjungan";
	xmlhttp.open("POST", url1, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			//document.getElementById("grid").innerHTML=xmlhttp.responseText;
			window.location.href = 'kunjungan.php';
		}
	}
	xmlhttp.send(params1);
	alert("Edit Kunjungan "+namainstansi+" Berhasil");
	
	document.getElementById("popupDatepicker").value = "";
	document.getElementById("namainstansi").value = "";
	document.getElementById("jumlahpengunjung").value = "";
	document.getElementById("namapanitia").value = "";
	document.getElementById("idtipe").value = 'belum pilih';
	document.getElementById("nomorpanitia").value = "";
	document.getElementById("kodedaerah").value = 'belum pilih';
	document.getElementById("idkota").value = 'belum pilih';
	document.getElementById("detailacara").value = "";
	document.getElementById("idkeperluan").value = 'belum pilih';
	
}