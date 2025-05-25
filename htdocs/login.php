
<html>

<?php
/* login.php */
/* Silahkan masukin akun-nya disini! */

/* Meminta akses: Main */
$mains = require('style-css/main-setup.php');
?>
<link rel="stylesheet" type="text/css" href="style-css/struct-request.php">
<script src="func-js/valid-login.js"></script>

<!--[Judul . WAJIB]-->
<title><?php
/* Penjudulan */
require('style-css/generate-title.php');
$judul = ucwords(strtolower('Login'));  // [UBAH DISINI]

/* Pembentukan */
$generaTitle = join($renketsu, array($judul, $app_name));
echo ($generaTitle);  // Generate!
?></title>


<!--[Style Tambahan]-->
<style>
/* ? */
main {
    background-color: #fefefe;
    display: flex;
    flex-direction: column; /* Atur flex direction ke column untuk memusatkan secara vertikal */
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
}

.ngopas {
    width: max-content;
    pointer-events: auto;  /* Mengaktifkan interaksi */
    user-select: text;  /* Memungkinkan teks untuk diseleksi */
    cursor: text;
}
.ngeblok {
    width: max-content;
    pointer-events: none;
    user-select: none;
}
</style>


<!--[Isi Form . WAJIB]-->
<?php

    $bgn_idty = (1);
    $end_idty = (150);
    ///
    $bgn_pswd = (10);
    $end_pswd = (255);

?><main style="padding: 3% 0% 0% 0%;">
    <h1 class="" style="padding: 0% 0%; user-select: none;"><a class="linker" href="../">
    Login
    </a></h1><div class="kotak-data">
    <form class="daftar-data" action="security-settings/valid-account" method="GET" id="datakun" onsubmit="return menDaftar();">
        <label style="text-align: center; font-size: 20px; user-select: none;"><a class="linker" href="register.php"><b>
        Didn't have account?
        </b></a></label><label for="name" class="ngeblok">
        Nama Lengkap
        </label>
        <!-- Nama, Nomor Telpon, Email -->
        <input type="text" id="identy_ctd" name="identy_ctd" class="isi-data"
        minlength="<?php echo ($bgn_idty); ?>" maxlength="<?php echo ($end_idty); ?>"
        placeholder="Name, Phone, Email"
        required>
        <!-- title="Type your identity in here!" -->

        <label for="password" class="ngeblok">
        Sandi
        </label><!-- Sandi -->
        <input type="password" id="passlog_ctd" name="passlog_ctd" class="isi-data" pattern="[^ ]+"
        minlength="<?php echo ($bgn_pswd); ?>" maxlength="<?php echo ($end_pswd); ?>"
        placeholder="Password"
        required>
        <!-- title="Type your password in here!" -->


        <!-- Cookies [SAAT INI TIDAK DIBUTUHKAN] -->
        <!--
        <div class="cookie-set">
            <label class="ceklis" for="cookie"><input type="checkbox" id="cookie" name="cookie"><span
            class="cektang"></span><label style="width: 100%; margin: -1% 0% 0% 5%; padding: 0% 0% 0% 0%;"><b>
                Remember me
            </b></label>
        </label></div>
        -->
        <!-- Cookies [SAAT INI TIDAK DIBUTUHKAN] -->

        <button style="user-select: none;" class="kirim-data" id="login" name="login" type="submit" style="margin-top: 5%;"><b>
        Login
        </b></button>
    </form></div>
</main>

<footer><?php
require ('about.php');
?></footer>

</html>
