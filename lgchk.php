<?php

include "configuration/connection.php";
include "configuration/function.php";

$name=mysql_real_escape_string($_POST['uword']);
$pass=mysql_real_escape_string(md5($_POST['pword']));

$qry = "SELECT * FROM users WHERE username='$name' AND password='$pass'";
$login = mysql_query($qry);
$login or die(errorhandler($query, mysql_error()));
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
	session_start(); //untuk memulai session
	  
// isi dari variabel session
  $_SESSION['namauser']	= $r['username'];
  $_SESSION['passuser']	= $r['password'];
  $_SESSION['accesslevel']= explode("-",$r['access']);
  
date_default_timezone_set("Asia/Bangkok");
$date = date('Y-m-d H:i:s');
$update=mysql_query("UPDATE users SET last_login ='$date' WHERE username='$r[username]'");

  header('location:admin.php');
}
else{
  header('location:index.php?message=gagal');
}
?>
