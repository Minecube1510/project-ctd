<?php
/* [create-account.php] */
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
$namae = trim(($_GET['nama_ctd']) ?? (''));
$birth = trim(($_GET['lahir_ctd']) ?? (''));
$phone = trim(($_GET['phone_ctd']) ?? (''));
$email = trim(($_GET['email_ctd']) ?? (''));
$sandi = trim(($_GET['sandi_ctd']) ?? (''));
///
// Validasi awal
if (empty($namae) || empty($birth) || empty($phone) || empty($email) || empty($sandi)) {
    echo ("Semua kolom wajib diisi!");
    exit;
}
///
/* Sanitasi dan proteksi tambahan */
$namae_ctd = ucwords(htmlspecialchars(($namae), (ENT_QUOTES), ('UTF-8')));
$birth_ctd = date(('Y-m-d'), strtotime($birth));
$phone_ctd = htmlspecialchars(($phone), (ENT_QUOTES), ('UTF-8'));
$email_ctd = filter_var(($email), (FILTER_SANITIZE_EMAIL));
$sandi_ctd = htmlspecialchars(($sandi), (ENT_QUOTES), ('UTF-8'));
///
$cutnem = explode((" "), ($namae_ctd));
if ((count($cutnem)) === (1)) {
    $fornem = ($namae_ctd);
    $beknem = ("-");
} else {
    $fornem = ($cutnem[0]);
    $beknem = end($cutnem);
}
///
$deskrip = ('Add Your Desc');
/* Sanitasi dan proteksi tambahan */

/* Sistem: Register - CREATE */
// Ini adalah bagian untuk bikin akunnya. Dengan [Create].

/* Query : Bikin Akun */
$bikin_akun = (($konek) -> prepare("
    INSERT INTO ctd_account 
    (name, forename, backname, level, user_desc, datebirth, nophone, email, password) 
    VALUES 
    (?, ?, ?, 'Translator', ?, ?, ?, ?, ?)
    "));
///
($bikin_akun) -> bind_param(("ssssssss"),
($namae_ctd), ($fornem), ($beknem), ($deskrip), ($birth_ctd), ($phone_ctd), ($email_ctd), ($sandi_ctd));

///
//echo ('<div style="text-align: center;">');
//echo (("Nama: ").($namae_ctd).("<br>"));
//echo (("Tanggal lahir: ").($birth_ctd).("<br>"));
//echo (("Nomor Telpon: ").($phone_ctd).("<br>"));
//echo (("Email: ").($email_ctd).("<br>"));
//echo (("Sandi: ").($sandi_ctd).("<br>"));
//echo ('</div>');
///

/* Eksekusi : Bikin Akun */
if (($bikin_akun) -> execute()) {
    ///
    //
    ///
    header("Location: ../login.php");
    exit ();
} else {
    echo (("Failed saving data").(": ").(($bikin_akun) -> error));
}
/* Sistem: Register - CREATE */


/* Tutup koneksi */
db_disconnect($konek);
/* Tutup koneksi */

?>
