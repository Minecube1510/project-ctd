
<html>

<?php
/* dashboard.php */

/* Sebelumnya: index.php */
// Intinya, inilah halaman utamanya.
// Kemudian, akan menuju seperti sistem CRUD (Login atau Register, masukin akun atau bikin akun).
// Ataupun langsung saja berinteraksi sedemikian rupa.
?>

<!--[Ambil File]-->
<?php require ('style-css/main-setup.php'); ?>
<?php require ('security-settings/show-speech.php'); ?>
<?php //include('namafile.php'); ?>


<!--[Judul . WAJIB]-->
<title><?php
/* Penjudulan */
require('style-css/generate-title.php');
$judul = ucwords(strtolower('Home'));  // [UBAH DISINI]

/* Pembentukan */
$generaTitle = join(($renketsu), array(($judul), ($app_name)));
echo ($generaTitle);  // Generate!
?></title>

<style>
main {
    margin: 0;
    padding-top: 7%;  /* Menyesuaikan dengan tinggi dari Navbar */
}

th h1 {
    pointer-events: none;
    user-select: none;
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


<!--[Header . WAJIB]-->
<?php
require('resource-asset/comp-header.php');

/* PERINGATAN */
// Penjelasan lebih lanjut, tuju saja file-nya.
?>


<!--[Main Content . WAJIB]-->
<header class="heading-con">
    <?php
        // Pastikan session sudah dimulai; jika belum, mulai session
        //if (session_status() === PHP_SESSION_NONE) {
            //session_start();
        //}
    ?><h1 class="start-comp"><?
    echo ("Welcome, Guest!");
    ?></h1><div class="final-comp">
        <button id="login" name="" class="butan" onclick="return reqLogin()">
        Login
        </button><button id="regup" name="" class="butan" onclick="return reqRegister()">
        Register
    </button></div>
</header>

<?php
// List Dictionary
// List Glossarium
?>

<main>
    <div class="konten" style=""><a href="../" style="text-decoration: none; color: black;"><h1>
    Write your Dictionary Translator
    </h1></a><table class="trenslet">
        <!-- [Baris Header] -->  <tr><th class="ngeblok">
        TL From
        </th><th class="ngeblok">
        TL Into
        </th><th class="ngeblok">
        Speech From
        </th><th class="ngeblok">
        Speech Into
        </th><th class="ngeblok">
        Translator
        </th></tr>  <!-- [Baris Header] -->


        <!-- [Baris Showing] -->  <?php
        if ((mysqli_num_rows($tampil_tl)) > (0)) {
            // Data tabel //
            while ($row = (mysqli_fetch_assoc($tampil_tl))) {
                echo ("<tr>");
                foreach ($row as $data) {
                    echo (("<td>").(htmlspecialchars($data)).("</td>"));
                }
                echo ("</tr>");
            }
        } else {
            echo ("Tidak ada data ditemukan.");
        } ?>  <!-- [Baris Showing] -->
        </table>
    </div>
</main>

<footer><?php
require ('about.php');
?></footer>

</html>
