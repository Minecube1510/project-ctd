<!DOCTYPE html>
<html>

<?php
/* index.php */

/* Menjelaskan */
// Jadi disini, adalah akses pertama, belum ada jalur apa-apa.
// Untuk itu, disediakan 2 jaluran.

// Main (main.php): Ini setup utama yang kecil (seperti untuk icon dan font).
// Dasbor (dashboard.php): Ini membawa halaman Dasbor.


// Memulai SESSION
session_start();

//require ("security-settings/koneksi-db.php");
//$konek = db_connect();

?>

<?php

/* Meminta akses: Main */
require ('style-css/main-setup.php');
///
//require ('dashboard-first.php');
//header ('Location: /dashboard-first');

///
$scan_role = ("
SELECT roleuser FROM ctd_account
");
///

//
/* Menuju halaman: Dasbor */
//$user_name = isset($_SESSION['userctd_name']) ?
//($_SESSION['userctd_name']) : (('<i>').strtoupper('Anonymous').('</i>'));
$user_name = isset($_SESSION['userctd_name']) ?
($_SESSION['userctd_name']) : (null);
///
$user_role = isset($_SESSION['userctd_role']) ?
($_SESSION['userctd_role']) : (('<i>').(strtoupper('NonStatus')).('</i>'));
///
$user_lvl  = isset($_SESSION['userctd_lvl']) ?
($_SESSION['userctd_lvl']) : (('<i>').(strtoupper('NonLeveled')).('</i>'));

$as_user = ucwords(strtolower('User'));
$as_admin = ucwords(strtolower('Admin'));

// [Tes] //
//echo ('Halo');
//echo (("<br>").("<br>"));
///
//echo (($user_name).("<br>"));
//echo (($user_role).("<br>"));
//echo (($user_lvl).("<br>"));
// [Tes] //

if (($user_role) === ('Admin')) {
    require ('dashboard-admin.php');
    exit;
} elseif (($user_role) === ('User')) {
    require ('dashboard-user.php');
    exit;
} else {
    //header ("Location: /dashboard-first");
    require ('dashboard-first.php');
    exit;
}

require ('dashboard-first.php');

?>

</html>
