<?php
/* [change-speech.php] */

///
/* Masukkan koneksi, menyambungkan ke 'MySQL-PHPMyAdmin' */
require ("koneksi-db.php");
$konek = db_connect();  // Hubungkan koneksi
///
$db_account = ('translator_ctd');
///


/* Sistem: [Changing Translate] - UPDATE */
$id_teel = ($_GET['id_speech']);
///
// Mengambil & escape input (escape untuk keamanan)
$tl_bgn = trim(($_GET['from_speech']) ?? (''));
$tl_end = trim(($_GET['into_speech']) ?? (''));
$sp_bgn = trim(($_GET['from_source']) ?? (''));
$sp_end = trim(($_GET['into_source']) ?? (''));
///
$old_spebgn = trim(($_GET['prev_from_speech']) ?? (''));
$old_speend = trim(($_GET['prev_into_speech']) ?? (''));
$old_srcbgn = trim(($_GET['prev_from_source']) ?? (''));
$old_srcend = trim(($_GET['prev_into_source']) ?? (''));
///

/* Tes */
//echo ($id_teel);
//echo (('<br>').('<br>'));
///
//echo (($tl_bgn).('<br>'));
//echo (($tl_end).('<br>'));
//echo (($sp_bgn).('<br>'));
//echo (($sp_end).('<br>'));
///
//echo ();
//echo ();
//echo ();
//echo ();
/* Tes */

/* Validasi */
// Pastiin ini terisi //
if ((!(isset($_GET['from_speech']))) || (empty($tl_bgn)) ||
    (!(isset($_GET['into_speech']))) || (empty($tl_end)) ||
    (!(isset($_GET['from_source']))) || (empty($sp_bgn)) ||
    (!(isset($_GET['into_source']))) || (empty($sp_end))) {
    echo ("<script>");
    echo (("alert(").("'"));
    ///
    echo ("Fill 'em all!");
    ///
    echo (("'").(");"));
    echo ("</script>");

    echo ("Fill 'em all!");

    exit;
} else {
    ///echo ("Not empty...");
}
// Pastiin ini gak sama //
if ((($tl_bgn) == ($old_spebgn)) &&
    (($tl_end) == ($old_speend)) &&
    (($sp_bgn) == ($old_srcbgn)) &&
    (($sp_end) == ($old_srcend))) {
    echo ("<script>");
    echo (("alert(").("'"));
    ///
    echo ('Choose which one wanna be edited!');
    ///
    echo (("'").(");"));
    echo ("</script>");

    //echo ($id_teel);
    $_GET['none_edited'] = ('Choose-which-one-wanna-be-edited!');
    $not_edit = ($_GET['none_edited']);
    ///
    header (("Location: ../translate?").("tlid=").($id_teel).("&").("non-edit=").($not_edit));
    //echo ('Cannot same again!');

    echo ("<script>");
    echo (("alert(").("'"));
    ///
    echo ('Choose which one wanna be edited!');
    ///
    echo (("'").(");"));
    echo ("</script>");

    exit;
} else {
    ///echo ("Not same...");
}
// Validasi //

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
$edit_trenslet = ("
    UPDATE translator_ctd SET 
    speeching = ?, transpeech = ?, 
    communic_source = ?, communic_target = ? 
    WHERE id_speech = ?
");

$stmt = (($konek) -> prepare($edit_trenslet));

// Bind Parameter dengan tipe data yang benar
$stmt -> bind_param(("ssssi"),
($tl_bgn), ($tl_end), ($sp_bgn), ($sp_end), ($id_teel));
// Query //

// Eksekusi //
// Eksekusi Query
$ubah_tl = (($stmt) -> execute());
///
if ($ubah_tl) {
    echo ("<script>");
    echo (("alert(").("'"));
    ///
    echo ("Successfully changed translation!");
    ///
    echo (("'").(");"));
    echo ("</script>");

    //echo ($id_teel);

    header ("Location: ../user?update-success");
    exit;
} else {
    echo (("Failed changing translation").(": ").(($stmt) -> error));
    echo ("An error occurred. Please try again.");
}
// Eksekusi //
/* Sistem: [Changing Translate] - UPDATE */
//

//
// Tutup Statement dan Koneksi //
($stmt) -> close();
($konek) -> close();
// Tutup Statement dan Koneksi //

?>
