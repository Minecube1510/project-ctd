
<html>

<?php
/* register.php */
/* Silahkan untuk bikin akun-nya disini! */

/* Masukkan koneksi, menyambungkan ke 'MySQL-PHPMyAdmin' */
require ('security-settings/koneksi-db.php');
$konek = db_connect();  // Hubungkan koneksi
///
/* Meminta query: Query-Account */
//require_once ('security-settings/central-account.php');
///
/* Meminta akses: Main */
require ('style-css/main-setup.php');


// Memulai SESSION
//session_start();

?>
<link rel="stylesheet" type="text/css" href="style-css/struct-request.php">
<script src="func-js/valid-register.js"></script>

<!--[Judul . WAJIB]-->
<title><?php
/* Penjudulan */
require ('style-css/generate-title.php');
$judul = ucwords(strtolower('Register'));  // [UBAH DISINI]

/* Pembentukan */
$generaTitle = join(($renketsu), (array(($judul), ($app_name))));
echo ($generaTitle);  // Generate!
?></title>


<!--[Style Tambahan]-->
<style>
/* ? */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
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


<!--[Isi Form . WAJIB]--><?php
//echo ($uji_bikin_akun);
//echo ($_SERVER["REQUEST_METHOD"]);

    $bgn_name = (1);
    $end_name = (150);
    ///
    $def_date = (10);
    ///
    $bgn_telp = (4);
    $end_telp = (20);
    ///
    $bgn_mail = (10);
    $end_mail = (150);
    ///
    $bgn_pswd = (10);
    $end_pswd = (255);

    //$name = $_GET["nama_ctd"];
    //$date = $_GET['lahir_ctd'];
    //$telp = $_GET['telpon_ctd'];
    //$mail = $_GET['email_ctd'];
    //$pswd = $_GET['sandi_ctd'];

//header('Location: login.php');
//exit;

?><main style="padding: 2% 0%;">
    <h1 style="padding: 1% 0%; user-select: none;"><a class="linker" href="../">
    Register
    </a></h1><div class="kotak-data">
    <form class="daftar-data" action="security-settings/create-account.php" method="GET" id="datakun" autocomplete="on" onsubmit="return menDaftar();">
        <label style="text-align: center; font-size: 20px; user-select: none;"><a class="linker" href="login.php"><b>
        Have account already?
        </b></a></label><label for="name" class="ngeblok">
        Nama Lengkap
        </label><!-- Nama -->
        <input type="text" id="nama_ctd" name="nama_ctd" class="isi-data" pattern="[A-Za-z\s]+"
        minlength="<?php echo ($bgn_name); ?>" maxlength="<?php echo ($end_name); ?>"
        placeholder="Username or Fullname"
        required>
        <!-- title="Type your name identity in here!" -->

        <label for="date" class="ngeblok">
        Tanggal lahir
        </label><!-- Lahir: Tanggal/Bulan/Tahun -->
        <input type="date" id="lahir_ctd" name="lahir_ctd" class="isi-data" pattern="[0-9/]*"
        minlength="<?php echo ($def_date); ?>" maxlength="<?php echo ($def_date); ?>"
        placeholder="XX/XX/XXXX"
        required>
        <!-- title="Type your birth date in here!" -->

        <label for="phone" class="ngeblok">
        Nomor Telpon
        </label><!-- Nomor Telpon -->
        <input type="tel" id="phone_ctd" name="phone_ctd" class="isi-data" pattern="[0-9\-]*"
        minlength="<?php echo ($bgn_telp); ?>" maxlength="<?php echo ($end_telp); ?>"
        placeholder="Telephone Number"
        required>
        <!-- title="Type your phone number in here!" -->

        <label for="email" class="ngeblok">
        Email
        </label><!-- Email -->
        <input type="email" id="email_ctd" name="email_ctd" class="isi-data"
        minlength="<?php echo ($bgn_mail); ?>" maxlength="<?php echo ($end_mail); ?>"
        placeholder="Email"
        required>
        <!-- title="Type your email in here!" -->

        <label for="password" class="ngeblok">
        Sandi
        </label><!-- Sandi -->
        <input type="password" id="sandi_ctd" name="sandi_ctd" class="isi-data"
        minlength="<?php echo ($bgn_pswd); ?>" maxlength="<?php echo ($end_pswd); ?>"
        pattern="[^ ]+"
        placeholder="Password"
        required>
        <!-- title="Type your password in here!" -->

        <button style="user-select: none;" class="kirim-data" id="register" name="register" type="submit"><b>
        Create Account
        </b></button>
    </form></div>
</main>

<footer><?php
require ('about.php');
?></footer>

</html>
