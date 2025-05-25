<?
/* [func-execute.php] */


/* Membawa file */
// Membawa Query-Account //
require("central-account.php");
// Membawa Query-Translator //
///require("central-account.php");
/* Membawa file */


/* Query: Account */
$bikin_akun_kueri = mysqli_query(($hubungkan), ($kret_akaun));
$bikin_akun_siapkan = ($hubungkan) -> prepare($kret_akaun);
//
/* Query: Account */


/* Query: Translator */
///
//
/* Query: Translator */

?>
