<?php
date_default_timezone_set('Asia/Jakarta');

// mysql_connect($server,$username,$password);
// mysql_select_db($database);

function dblink()
{
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "ootara_akd";
	return mysqli_connect($server, $username, $password, $database);
}

function anti_injection($data){
  $filter = mysqli_real_escape_string(dblink(), stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

function average($arr){
   if (!is_array($arr)) return false;
   return array_sum($arr)/count($arr);
}

function cek_session_admin(){
	$level = $_SESSION['level'];
	if ($level != 'superuser' AND $level != 'kepala'){
		echo "<script>document.location='index.php';</script>";
	}
}

function cek_session_guru(){
	$level = $_SESSION['level'];
	if ($level != 'guru' AND $level != 'superuser' AND $level != 'kepala'){
		echo "<script>document.location='index.php';</script>";
	}
}

function cek_session_siswa(){
	$level = $_SESSION['level'];
	if ($level == ''){
		echo "<script>document.location='index.php';</script>";
	}
}

?>