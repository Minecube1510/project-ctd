<?php
/* [edituser-profile.php] */


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
if (!(isset($_SESSION['userctd_name']))) {
    // Jika tidak ada session, redirect ke login
    header("Location: /");
    exit;
}
///
$by_trenslet = ($_SESSION['userctd_name']);
///


/* Sistem: [Edit Profile] - UPDATE */
$init_acc = ($_GET['initial_acc']);  // [ID]
// Mengambil nilai sebelumnya //
$prev_jabat = ($_GET['prev_rolevel']);  // [Jabatan]
$prev_desct = ($_GET['prev_descript']);  // [Deskripsi]
$prev_sandi = ($_GET['prev_sandi']);  // [Sandi]
// Mengambil nilai sebelumnya //
// Mengambil nilai editan saat ini //
$get_jabat = ($_GET['jabat_edit']);  // [Jabatan]
$get_desct = ($_GET['desc_edit']);  // [Deskripsi]
$get_sandi = ($_GET['pass_edit']);  // [Sandi]
// Mengambil nilai editan saat ini //
//
// Fixing pendetilan //
$a = ( ($get_jabat));
$b = ( ($get_desct));
$c = ( ($get_sandi));
// Fixing pendetilan //

/* Tes */
echo (("ID").(": ").($init_acc));
echo (('<br>').('<br>'));
///
echo (("Now Role").(": ").($get_jabat).('<br>'));
echo (("Now Description").(": ").($get_desct).('<br>'));
echo (("Now Password").(": ").($get_sandi));
///
echo (('<br>').('<br>'));
///
echo (("Prev Role").(": ").($prev_jabat).('<br>'));
echo (("Prev Description").(": ").($prev_desct).('<br>'));
echo (("Prev Password").(": ").($prev_sandi));
///
echo (('<br>').('<br>'));
/* Tes */

// Validasi //
// Periksa apakah ada input yang kosong
/*
((empty($get_usnem)) || (empty($get_phone)) || (empty($get_desct)) ||
(empty($get_bdate)) || (empty($get_email)) || (empty($get_sandi)))

((empty($get_desct)) || (empty($get_sandi))
*/
if ((empty($get_jabat)) || (empty($get_desct)) || (empty($get_sandi))) {
    ///
    //echo ("<script>");
    ///
    //echo (("alert").("('"));
    echo ("Fill 'em all!");
    //echo ("');");
    ///
    //echo ("</script>");

    //header (("Location: ../user"));
    //exit ();
}
else {
    // Jika semua input terisi dan ada perubahan, arahkan ke halaman user atau lakukan update ke database
    //header (("Location: ../user").("?").("empty"));
    //exit ();
}
// Periksa apakah ada perubahan dari data sebelumnya
/*
((($get_usnem) === ($prev_usnem)) && (($get_phone) === ($prev_phone)) &&
(($get_desct) === ($prev_desct)) && (($show_bdate) === ($prev_bdate)) &&
(($get_email) === ($prev_email)) && (($get_sandi) === ($prev_sandi)))

((($get_desct) === ($prev_desct)) && (($get_sandi) === ($prev_sandi)))
*/
if ((($get_jabat) === ($prev_jabat)) && (($get_desct) === ($prev_desct)) &&
    (($get_sandi) === ($prev_sandi))) {
    ///
    echo ("<script>");
    ///
    echo (("alert").("('"));
    echo ("Choose one of profile that wanna be edited!");
    echo ("');");
    ///
    echo ("</script>");

    echo (("It's Same!").("<br>"));
    echo ("Change something!");
    echo ("<br>");

    header (("Location: ../user").("?").("not-changed-one"));
    exit;
}
else {
    echo (("Not Same...").("<br>"));
    echo ("Something is changed...");
    echo ("<br>");

    // Jika semua input terisi dan ada perubahan, arahkan ke halaman user atau lakukan update ke database
    //header (("Location: ../user").("?").("changed-somes"));
    //exit;
}
// Validasi //
/*
UPDATE ctd_account 
SET name = ?, 
forename = ?, backname = ?, 
user_desc = ?, 
datebirth = ?, nophone = ?, 
email = ?, password = ? 
WHERE id_acc = ?;

UPDATE ctd_account SET 
user_desc = ?, password = ? 
WHERE id_acc = ?;
*/
// Query //
$sql_ngubah = ("
UPDATE ctd_account SET 
level = ?, user_desc = ?, 
password = ? 
WHERE id_acc = ?;
");
// Query //
///
// Laksana Eksekusi //
/*
($fixget_usnem), ($def_fornem), ($def_beknem),
($get_desct),
($get_bdate), ($fix_phone),
($get_email), ($get_sandi),
($init_acc)

($get_desct), ($get_sandi),
($init_acc)
*/
/// Siapkan
$dochange_acc = (($konek) -> prepare($sql_ngubah));
$dochange_acc -> bind_param(("sssi"),
($get_jabat), ($get_desct),
($get_sandi),
($init_acc));
///
/// Eksekusi
$ngubah = (($dochange_acc) -> execute());
///
if ($ngubah) {
    /* Menuju Berhasil */
    header (("Location: ../user").("?").("succesfully-edited"));  // Redirect jika berhasil
    exit;
    /* Menuju Berhasil */
    ///
} else {
    echo ("Invalid, or Error, or something Wrong...");  // Pesan jika gagal
}
// Laksana Eksekusi //
/* Sistem: [Edit Profile] - UPDATE */


// Tutup Statement dan Koneksi //
//($stmt) -> close();
($konek) -> close();
// Tutup Statement dan Koneksi //

?>
