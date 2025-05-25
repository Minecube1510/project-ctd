<?php
/* [add-account.php] */
// Memulai SESSION
//session_start();


///
/* Masukkan koneksi, menyambungkan ke 'MySQL-PHPMyAdmin' */
require ("koneksi-db.php");
$konek = db_connect();  // Hubungkan koneksi
///
/* Database */
$db_account = ('ctd_account');
///
/* Menambahkan peraturan query */
require_once ("law-query.php");
///


/* Sistem: Register - CREATE */
// Mengambil & escape input (escape untuk keamanan)
// Menggunakan GET, karena itulah aturan dari Hostingan-nya //
$deskrip = ucfirst('Add Your Desc');
///
$namae = trim(($_GET['name_plus']) ?? (''));
$jabat = trim(($_GET['opsi_role']) ?? (''));
$level = trim(($_GET['lvl_jabat']) ?? (''));
$phone = trim(($_GET['numb_plus']) ?? (''));
$skrip = trim(($_GET['desc_plus']) ?? ($deskrip));
$birth = trim(($_GET['date_plus']) ?? (''));
$email = trim(($_GET['mail_plus']) ?? (''));
$sandi = trim(($_GET['pass_plus']) ?? (''));
///
// Validasi awal
if ((empty($namae)) || (empty($jabat)) || (empty($level)) || (empty($phone)) ||
    (empty($skrip)) || (empty($birth)) || (empty($email)) || (empty($sandi))) {
    echo ("Semua kolom wajib diisi!");
    exit;
}
///
/* Sanitasi dan proteksi tambahan */
$namae_add = ucwords(htmlspecialchars(($namae), (ENT_QUOTES), ('UTF-8')));
$birth_add = date(('Y-m-d'), strtotime($birth));
$phone_add = htmlspecialchars(($phone), (ENT_QUOTES), ('UTF-8'));
$email_add = filter_var(($email), (FILTER_SANITIZE_EMAIL));
$sandi_add = htmlspecialchars(($sandi), (ENT_QUOTES), ('UTF-8'));
///
$cutnem = explode((" "), ($namae_add));
if ((count($cutnem)) > (1)) {
    $fornem = ($cutnem[(1)-(1)]);
    $beknem = end($cutnem);
} else {
    $fornem = ($namae_add);
    $beknem = ("-");
}
/* Sanitasi dan proteksi tambahan */

// [Tes] //
echo (('Nama Identitas').(': '));
echo (($namae_add).("<br>"));
///
echo (('Nama Depan').(': '));
echo (($fornem).("<br>"));
///
echo (('Nama Belakang').(': '));
echo (($beknem).("<br>"));
///
echo (('Peran Jabatan').(': '));
echo (($jabat).("<br>"));
///
echo (('Level Jabatan').(': '));
echo (($level).("<br>"));
///
echo (('Deskripsi').(': '));
echo (($skrip).("<br>"));
///
echo (('Tanggal Lahir').(': '));
echo (($birth).("<br>"));
///
echo (('Nomor Ponsel').(': '));
echo (($phone_add).("<br>"));
///
echo (('Email').(': '));
echo (($email_add).("<br>"));
///
echo (('Sandi').(': '));
echo (($sandi_add).("<br>"));
// [Tes] //

/* Sistem: Register - CREATE */
// Ini adalah bagian untuk bikin akunnya. Dengan [Create].

/* Query : Bikin Akun */
$bikin_akun = (($konek) -> prepare("
    INSERT INTO ctd_account 
    (name, forename, backname, roleuser, level, user_desc, datebirth, nophone, email, password) 
    VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    "));
///
($bikin_akun) -> bind_param(("ssssssssss"),
    ($namae_add), ($fornem), ($beknem),
    ($jabat), ($level),
    ($skrip), ($birth_add),
    ($phone_add), ($email_add), ($sandi_add)
);

/* Eksekusi : Bikin Akun */
$lakukan_add = (($bikin_akun) -> execute());
///
if ($lakukan_add) {
    ///
    echo ('Succesfully!');
    ///
    header (("Location: ../admin").('?').("added-successfully"));
    exit;
} else {
    echo (("Failed saving data").(": ").(($bikin_akun) -> error));
}
/* Sistem: Register - CREATE */


/* Tutup koneksi */
db_disconnect($konek);
/* Tutup koneksi */

?>
