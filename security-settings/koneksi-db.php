<?php
/* [koneksi-db.php] */


/* Setting Masuk */
function db_connect() {

    /* IP lokal */
    $server_db = ("sql107.infinityfree.com");
    ///
    /* Berarti dengan mau nge-root */
    $user_db = ("if0_38951505");
    ///
    /* Kosong, berarti tanpa password */
    $pass_db = ("PE5m59WuZWSS");
    ///
    /* Mau ke Database mana, kan MySQL PHPMyAdmin! */
    $konek_db = ("if0_38951505_ctd");
    ///
    // Inisialisasi
    $hubungkan = mysqli_connect(($server_db), ($user_db), ($pass_db), ($konek_db));

    /* Proses Validasi */
    $alert_wested_one = ('<div style="text-align: center; padding-top: 2%;">');
    $alert_wested_two = ('<span style="color: #ffffff;">');
    $alert_wested_y = (($alert_wested_one).($alert_wested_two));
    ///
    $alert_mid_mesej_y = ("Successfully connected!");
    $alert_mid_mesej_n = (("Failed to connecting").(": "));
    ///
    $alert_limit_mid = ('<p></p>');
    $alert_mid_y = (($alert_mid_mesej_y).($alert_limit_mid));
    ///
    $alert_easted_end = (("</span>").('</div>'));
    ///
    ///
    ///
    $js_wested = ("<script type='text/javascript'>");
    $js_easted = ("</script>");
    ///
    $alert_wested_js = (("alert(").("'"));
    $alert_easted_js = ("');");
    ///
    $alert_wested_n = (($js_wested).($alert_wested_js));
    $alert_easted_n = (($js_easted).($alert_easted_js));
    ///

    ///
    $cek_hubung_error = mysqli_connect_error();
    $tampil_error_sambung = (($alert_mid_mesej_n).($cek_hubung_error));
    ///
    $alert_connect_y = (($alert_wested_y).($alert_mid_y).($alert_easted_end));
    $alert_connect_n = (($alert_wested_n).($tampil_error_sambung).($alert_easted_n));
    /* Proses Validasi */


    /* Cek Konek Validasi */
    if (!($hubungkan)) {
        die ($alert_connect_n); // Hentikan eksekusi setelah menampilkan alert
    } else {
        //echo ($alert_connect_y);
    }
    return ($hubungkan);
    /* Cek Konek Validasi */
}
/* Setting Masuk */


/* Fungsi untuk menutup koneksi */
function db_disconnect($hubungkan) {
    /// Tutup koneksi ///
    mysqli_close($hubungkan);
}
/* Fungsi untuk menutup koneksi */

//
?>
