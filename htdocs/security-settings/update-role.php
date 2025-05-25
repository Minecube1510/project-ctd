
<?php
/* update-role.php */

///
/* Masukkan koneksi, menyambungkan ke 'MySQL-PHPMyAdmin' */
require ("koneksi-db.php");
$konek = db_connect();  // Hubungkan koneksi
///
$db_account = ('ctd_account');
///


// Memulai SESSION
session_start();
// Periksa apakah session ada
if ((!(isset($_SESSION['userctd_name']))) && (!(isset($_SESSION['userctd_role']))) &&
    (!(isset($_SESSION['userctd_lvl'])))) {
    // Jika tidak ada session, redirect ke login
    header("Location: /");
    exit;
}
///
$si_jabat = ($_SESSION['userctd_name']);
$prev_jabat = ($_SESSION['userctd_role']);
$guna_jabat = ($_SESSION['userctd_lvl']);
///
$kini_jabat = ($_GET['ubah-role']);
///


// [Inisialisasi] //

// [Inisialisasi] //


// [Tes] //
echo (('Name (Forename)').(': '));
echo (($si_jabat).('<br>'));
///
echo (('Prev Role').(': '));
echo (($prev_jabat).('<br>'));
///
echo (('Now Role').(': '));
echo (($kini_jabat).('<br>'));
///
echo (('Role Level').(': '));
echo ($guna_jabat);
// [Tes] //


// [Query] //
$sqling = ("
UPDATE ctd_account 
SET roleuser = ?
WHERE forename = ?
");
///
$sambung_jabat = (($konek) -> prepare($sqling));
($sambung_jabat) -> bind_param(("ss"),
($kini_jabat), ($si_jabat));
// [Query] //


// [Execution] //
$ubah_jabat = (($sambung_jabat) -> execute());
if ($ubah_jabat) {
    echo ("Role has been changed!");
    ///
    header ('Location: ../admin');
    exit;
} else {
    echo (("Error changing the role").(": ").(($ubah_jabat) -> error));
}
// [Execution] //

// [Tutup] //
($konek) -> close();

?>
