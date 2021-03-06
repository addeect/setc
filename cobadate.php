<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>jQuery Datepicker</title>
<link href="css/jquery.datepick.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
<script src="js/jquery.plugin.js"></script>
<script src="js/jquery.datepick.js"></script>
<script>
$(function() {
	$('#popupDatepicker').datepick();
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
$(function() {
	$('#tanggal').datepick();
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
</head>
<body>
<h1>jQuery Datepicker</h1>
<p>This page demonstrates the very basics of the
	<a href="http://keith-wood.name/datepick.html">jQuery Datepicker plugin</a>.
	It contains the minimum requirements for using the plugin and
	can be used as the basis for your own experimentation.</p>
<p>For more detail see the <a href="http://keith-wood.name/datepickRef.html">documentation reference</a> page.</p>
<p>A popup datepicker <input type="text" id="popupDatepicker"></p>
<input type="text" id="tanggal">
<p>Or inline</p>

</body>
</html>
