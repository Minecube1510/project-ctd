<?php
/* [admin-profilecontrol.php] */


/* Masalah */
//
// 1. [Kadang pas di-tes, namanya salah]
//
/* Masalah */


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
$init_acc = ($_GET['initial_acc']);  // [Nama]
// Mengambil nilai sebelumnya //
$prev_usnem = ($_GET['prev_username']);  // [Nama]
$prev_phone = ($_GET['prev_numphone']);  // [Nomor Telpon]
$prev_desct = ($_GET['prev_descript']);  // [Deskripsi][Nanti]
$prev_bdate = ($_GET['prev_bdate']);  // [Birth, Tanggal Lahir]
$prev_email = ($_GET['prev_email']);  // [Email]
$prev_sandi = ($_GET['prev_sandi']);  // [Sandi]
///
$prev_role = ($_GET['prev_userole']);  // [Jabatan, 'User'/'Admin']
$prev_hac = ($_GET['prev_lvl']);  // [Level merupakan bidangnya]
///
$prev_fornem = ($_GET['prev_fornem']);  // [Nama Depan]
$prev_beknem = ($_GET['prev_beknem']);  // [Nama Depan]
// Mengambil nilai sebelumnya //
// Mengambil nilai editan saat ini //
$get_usnem = ($_GET['name_edit']);  // [Nama]
$get_phone = ($_GET['numb_edit']);  // [Nomor Telpon]
$get_desct = ($_GET['desc_edit']);  // [Deskripsi][Nanti]
$get_bdate = ($_GET['date_edit']);  // [Birth, Tanggal Lahir]
$get_email = ($_GET['mail_edit']);  // [Email]
$get_sandi = ($_GET['pass_edit']);  // [Sandi]
///
$get_role = ($_GET['pilih-jabat']);  // [Jabatan, 'User'/'Admin']
$get_hac = ($_GET['lvl_jabat']);  // [Level merupakan bidangnya]
// Mengambil nilai editan saat ini //
//
// Fixing pendetilan //
$fixget_usnem = ucwords(strtolower($get_usnem));
$fixing_usnem = ((!(empty($fixget_usnem))) ? ($fixget_usnem) : ($get_usnem));
///
$show_bdate = date(("d-m-Y"), strtotime($get_bdate));
$fix_bdate = date(("Y-m-d"), strtotime($get_bdate));
///
echo ('');
//echo (("<br>").("<br>"));
///
function ambilNama($nem) {
    $nem = trim($nem);
    $nemget = (explode((" "), ($nem)));

    if ((count($nemget)) > (1)) {
        $fornem = ucwords(strtolower($nemget[(1)-(1)]));  // Ambil kata pertama
        $beknem = ucwords(strtolower(end($nemget)));  // Ambil kata terakhir
    } else {
        $fornem = ucwords(strtolower($nem));  // Hanya satu kata
        $beknem = ("-");  // Ganti dengan [-]
    }
    return [($fornem), ($beknem)];
}
///
list($get_fornem, $get_beknem) = ambilNama($fixing_usnem);
$fix_phone = preg_replace(("/[^0-9]/"), (""), ($get_phone));
// Fixing pendetilan //

/* Tes */
echo (("ID").(": ").($init_acc));
echo (('<br>').('<br>'));
///
echo (("Now Name").(": ").($get_usnem).('<br>'));
echo (("Now Fore Name").(": ").($get_fornem).('<br>'));
echo (("Now Back Name").(": ").($get_beknem).('<br>'));
///
echo (("Now Role").(": ").($get_role).('<br>'));
echo (("Now Level").(": ").($get_hac).('<br>'));
///
echo (("Now Phone Number").(": ").($get_phone).('<br>'));
echo (("Now Description").(": ").($get_desct).('<br>'));
echo (("Now Birth Date").(": ").($show_bdate).('<br>'));
echo (("Now Changed Birth Date").(": ").($fix_bdate).('<br>'));
echo (("Now Email").(": ").($get_email).('<br>'));
echo (("Now Password").(": ").($get_sandi));
///
echo (('<br>').('<br>'));
///
echo (("Prev Name").(": ").($prev_usnem).('<br>'));
echo (("Prev Fore Name").(": ").($prev_fornem).('<br>'));
echo (("Prev Back Name").(": ").($prev_beknem).('<br>'));
///
echo (("Prev Role").(": ").($prev_role).('<br>'));
echo (("Prev Level").(": ").($prev_hac).('<br>'));
///
echo (("Prev Phone").(": ").($prev_phone).('<br>'));
echo (("Prev Description").(": ").($prev_desct).('<br>'));
echo (("Prev Birth Date").(": ").($prev_bdate).('<br>'));
echo (("Prev Email").(": ").($prev_email).('<br>'));
echo (("Prev Password").(": ").($prev_sandi));
///
echo ('<br>');
//echo (('<br>').('<br>'));
///
//echo (('<br>').('<br>'));
/* Tes */

// Validasi //
// Periksa apakah ada input yang kosong
/*
((empty($get_usnem)) || (empty($get_phone)) || (empty($get_desct)) ||
(empty($get_bdate)) || (empty($get_email)) || (empty($get_sandi)))

((empty($get_desct)) || (empty($get_sandi))
*/
if ((empty($get_usnem)) || (empty($get_role)) || (empty($get_hac)) || (empty($get_phone)) ||
    (empty($get_desct)) || (empty($get_bdate)) || (empty($get_email)) || (empty($get_sandi))) {
    ///
    //echo ("<script>");
    ///
    //echo (("alert").("('"));
    echo ("Fill 'em all!");
    //echo ("');");
    ///
    //echo ("</script>");

    header (("Location: ../admin-control").("?").("empty"));
    exit ();
}
else {
    // Jika semua input terisi dan ada perubahan, arahkan ke halaman user atau lakukan update ke database
    //header (("Location: ../admin-control").("?").("not-empty"));
    //exit ();
}
// Periksa apakah ada perubahan dari data sebelumnya
/*
((($get_usnem) === ($prev_usnem)) && (($get_phone) === ($prev_phone)) &&
(($get_desct) === ($prev_desct)) && (($show_bdate) === ($prev_bdate)) &&
(($get_email) === ($prev_email)) && (($get_sandi) === ($prev_sandi)))

((($get_desct) === ($prev_desct)) && (($get_sandi) === ($prev_sandi)))
*/
if ((($get_usnem) === ($prev_usnem)) && (($get_role) === ($prev_role)) &&
    (($get_hac) === ($prev_hac)) && (($get_phone) === ($prev_phone)) &&
    (($get_desct) === ($prev_desct)) && (($show_bdate) === ($prev_bdate)) &&
    (($get_email) === ($prev_email)) && (($get_sandi) === ($prev_sandi))) {
    ///
    echo ("<script>");
    ///
    echo (("alert").("('"));
    echo ("Choose one of profile that wanna be edited!");
    echo ("');");
    ///
    echo ("</script>");

    //echo (("It's Same!").("<br>"));
    //echo ("Change something!");

    header (("Location: ../admin-control").("?").("not-changed-one"));
    exit;
}
else {
    //echo (("Not Same...").("<br>"));
    //echo ("Something is changed...");

    // Jika semua input terisi dan ada perubahan, arahkan ke halaman user atau lakukan update ke database
    //header (("Location: ../admin-control").("?").("changed-somes"));
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
UPDATE ctd_account 
SET name = ?, 
forename = ?, backname = ?, 
roleuser = ?, level = ?, 
user_desc = ?, 
datebirth = ?, nophone = ?, 
email = ?, password = ? 
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
$dochange_acc -> bind_param(("ssssssssssi"),
($fixget_usnem), ($get_fornem), ($get_beknem),
($get_role), ($get_hac),
($get_desct),
($get_bdate), ($fix_phone),
($get_email), ($get_sandi),
($init_acc));
///
/// Eksekusi
$ngubah = (($dochange_acc) -> execute());
///
if ($ngubah) {
    /* Menuju Berhasil */
    header (("Location: ../admin-control").("?").("succesfully-edited"));  // Redirect jika berhasil
    exit;
    /* Menuju Berhasil */
    ///
} else {
    //echo ("Invalid, or Error, or something Wrong...");  // Pesan jika gagal
}
// Laksana Eksekusi //
/* Sistem: [Edit Profile] - UPDATE */


// Tutup Statement dan Koneksi //
//($stmt) -> close();
($konek) -> close();
// Tutup Statement dan Koneksi //

?>
