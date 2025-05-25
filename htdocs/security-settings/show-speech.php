<?php
/* [show-speech.php] */


///
/* Masukkan koneksi, menyambungkan ke 'MySQL-PHPMyAdmin' */
require ("koneksi-db.php");
$konek = db_connect();  // Hubungkan koneksi
///
$db_account = ('translator_ctd');
///


/* Sistem: [Show Translate] - READ */
// Query //
// [speeching, transpeech, communic_source, communic_target, translate_by] //
$show_trenslet = ("
    SELECT speeching, transpeech, communic_source, communic_target, translate_by FROM translator_ctd
");
$tampil_tl = mysqli_query(($konek), ($show_trenslet));
// Query //

// Eksekusi //
///
// Eksekusi //
/* Sistem: [Show Translate] - READ */
//

//

?>
