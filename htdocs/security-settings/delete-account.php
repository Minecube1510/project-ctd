<?php
/* [delete-account.php] */


///
/* Masukkan koneksi, menyambungkan ke 'MySQL-PHPMyAdmin' */
require ("koneksi-db.php");
$konek = db_connect();  // Hubungkan koneksi
///
$db_account = ('ctd_account');
///

//echo ('Hapus Akun');


/* Sistem: [Erase Translate] - DELETE */
// Mengambil & escape input (escape untuk keamanan)
$id_teel = ($_GET['id_us']);
/// Tes ///
//echo ($id_teel);
/// Tes ///

if ($id_teel) {
    echo $id_teel; // Tes

    // Query
    $hapus_tl = (($konek) -> prepare("
        DELETE FROM ctd_account 
        WHERE id_acc = ?
    "));
    $hapus_tl -> bind_param(("i"), $id_teel);
    $menghapus_tl = (($hapus_tl) -> execute());

    // Eksekusi
    if ($menghapus_tl) {
        echo ("<script>");
        echo (("alert(").("'"));
        ///
        echo ("Successfully deleted account!");
        ///
        echo (("'").(");"));
        echo ("</script>");

        //echo ($id_teel);

        header ("Location: ../admin-control?deleting-success");
        exit();
    } else {
        echo (("Failed deleting user").(": ").(($menghapus_tl) -> error));
        echo ("An error occurred. Please try again.");
    }
}

// Eksekusi //
//if (($menghapus_tl) -> execute()) {
    ///
    //echo ('<script>');
    //echo (('alert').('('));
    ///
    //echo ('"
    //Successfully adding your translation!
    //"')
    ///
    //echo ((');').('</script>'));
    ///
    //header("Location: ../login.php");
    //exit ();
//} else {
    //echo (("Failed saving data").(": ").(($add_trenslet) -> error));
//}
// Eksekusi //
/* Sistem: [Changing Translate] - UPDATE */
//

//

?>
