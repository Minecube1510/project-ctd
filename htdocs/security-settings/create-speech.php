<?php
/* [create-speech.php] */


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


/* Sistem: [Add Translate] - CREATE */
// Mengambil & escape input (escape untuk keamanan)
$tl_bgn = ucwords(strtolower(trim(($_GET['trenslet_from']) ?? (''))));
$tl_end = ucwords(strtolower(trim(($_GET['trenslet_into']) ?? (''))));
$sp_bgn = ucwords(strtolower(trim(($_GET['speechin_from']) ?? (''))));
$sp_end = ucwords(strtolower(trim(($_GET['speechas_into']) ?? (''))));
///
// Validasi awal
if (empty($tl_bgn) || empty($tl_end) || empty($sp_bgn) || empty($sp_end)) {
    echo ("Semua kolom wajib diisi!");
    exit;
}

/// Tes ///
//echo ($by_trenslet);
//echo (('<br>').('<br>'));
///
//echo (($tl_bgn).('<br>'));
//echo (($tl_end).('<br>'));
//echo (($sp_bgn).('<br>'));
//echo (($sp_end).('<br>'));
/// Tes ///

// Query //
$add_trenslet = ("
	INSERT INTO translator_ctd 
    (speeching, transpeech, communic_source, communic_target, translate_by) 
    VALUES
    (?, ?, ?, ?, ?)
");
$bikin_tl = (($konek) -> prepare($add_trenslet));
($bikin_tl) -> bind_param(("sssss"),
($tl_bgn), ($tl_end), ($sp_bgn), ($sp_end), ($by_trenslet));
// Query //

// Eksekusi //
if (($bikin_tl) -> execute()) {
    ///
    echo ('<script>');
    echo (('alert').('('));
    ///
    echo ('"
    Successfully adding your translation!
    "');
    ///
    echo ((');').('</script>'));
    ///
    header("Location: ../");
    exit ();
} else {
    echo (("Failed saving data").(": ").(($bikin_tl) -> error));
}
// Eksekusi //
/* Sistem: [Add Translate] - CREATE */
//

?>
