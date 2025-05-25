<?php
/* [user-translate.php] */


///
/* Masukkan koneksi, menyambungkan ke 'MySQL-PHPMyAdmin' */
require ("koneksi-db.php");
$konek = db_connect();  // Hubungkan koneksi
///
$db_account = ('translator_ctd');
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


/* Sistem: [Show Translate] - READ */
// Query //
// [id_speech, speeching, transpeech, communic_source, communic_target] //
$show_trenslet = ("
    SELECT id_speech, speeching, transpeech, communic_source, communic_target 
    FROM translator_ctd 
    WHERE translate_by = ?
");
// Pastikan prepare statement berhasil
$daftar_tl = (($konek) -> prepare($show_trenslet));
if (!$daftar_tl) {
    die(("Error pada prepare statement").(": ").(($konek) -> error));
}
// Bind parameter
$daftar_tl -> bind_param(("s"), ($by_trenslet));

$liat_akun = ("
    SELECT name, forename, backname, roleuser, user_desc, datebirth, nophone, email, password 
    FROM ctd_account
");
$liat_profil = mysqli_query(($konek), ($liat_akun));
// Query //

// Eksekusi //
// Eksekusi query
$daftar_tl -> execute();

// Ambil hasil
$tampil_tl = $daftar_tl -> get_result();
// Eksekusi //
/* Sistem: [Show Translate] - READ */
//

//

?>
