<?php  
function bcrypt($password)
{
	return password_hash($password,PASSWORD_BCRYPT);
}
function tgl_indo($date)
{
	$Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	$Bulan = array("Januari","Februari","Maret","April","Mei","Juni",
		"Juli","Agustus","September","Oktober","November","Desember");
	$tahun = substr($date,0,4);
	$bulan = substr($date,5,2);
	$tgl = substr($date,8,2);
	$waktu = substr($date,11,5);
	$hari = date("w",strtotime($date));
	$result = "".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun."";
	return $result;
}
?>