
<html>

<?php
/* dashboard-user.php */

/* Sebelumnya: index.php */
// Intinya, inilah halaman utamanya. (Setelah Login)
// Kemudian, akan menuju seperti sistem CRUD (Login atau Register, masukin akun atau bikin akun).
// Ataupun langsung saja berinteraksi sedemikian rupa.


// Memulai SESSION
session_start();

// Periksa apakah session ada
if (!(isset($_SESSION['userctd_name']))) {
    // Jika tidak ada session, redirect ke login
    header("Location: login");
    exit;
}
///
$username_ctd = ($_SESSION['userctd_name']);
?>


<!--[Ambil File]-->
<?php require ('style-css/main-setup.php'); ?>
<?php require ('security-settings/show-speech.php'); ?>
<?php //include ('namafile.php'); ?>


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
th {
    width: max-content;
    pointer-events: none;
    user-select: none;
}

.kotak-kamus {
    padding-top: 3%;
    width: 90%;
    display: flex;
    flex-direction: column;
    align-items: center;  /* Memusatkan elemen secara horizontal */
    margin: 0 auto;  /* Memusatkan container di halaman */
    padding: 1rem;
}
.baris-kamus {
    display: flex;
    align-items: center;  /* Perataan vertikal agar label dan input sejajar */
    gap: 1rem;  /* Jarak antar elemen (label dan input) */
    width: 100%;  /* Memastikan baris mengambil lebar penuh */
    margin-bottom: 1rem;  /* Jarak antar baris */
}

/* Styling untuk label agar lebarnya konsisten */
.baris-kamus label {
    flex: 0 0 150px;  /* Lebar tetap untuk label */
    font-weight: bold;
    text-align: center;  /* Label rata kanan untuk keselarasan */
    font-size: 24px;
}
.baris-kamus p {
    text-align: center;
}
/* Styling untuk input dan select agar rapi */
.baris-kamus input {
    width: 92.5%;  /* Input memenuhi lebar container */
    height: 50px;
    padding: 0.5rem;
    margin: -2.5% auto auto auto;
    border: 2px solid #000000;
    border-radius: 4px;
    text-align: center;
    font-size: 18px;
    box-sizing: border-box;  /* Pastikan padding tidak menambah lebar */
}
.kamus-tulis {
    width: 80%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    font-size: 20px;
    margin: 0 auto;
}
.isi-kamus {
    height: 30%;
}

/* Styling tombol membuat translator */
.tombol-kamus {
    display: flex;
    justify-content: center;  /* Memusatkan tombol secara horizontal */
    width: 100%;  /* Memastikan container tombol penuh */
    margin-top: 1rem;  /* Jarak dari baris terakhir */
}
.buat-kamus {
    padding: 0.5rem 1rem;
    align-items: center;
    font-weight: bold;
    font-size: 22px;
    color: #ffffff;
    background-color: #0FA702;  /* Warna: Hijau */
    /* background-color: #676767;  /* <<*/
    border: 3px solid #262626;
    border-radius: 4px;
    cursor: pointer;
    transition: 0.4s;
}
.buat-kamus:hover {
    color: #000000;
    background-color: #086000;  /* Warna: Hijau Gelap */
    /* background-color: #3B3B3B;  /* <<*/
    border: 3px solid #A9A9A9;
}
.buat-kamus:active {
    transform: scale(0.9);
}
/* Styling tombol membuat translator */

/* Kontenan untuk refresh */
.segar-ulang {
    display: flex;
    justify-content: space-between;
    align-items: center;  /* atau align-items: flex-start/flex-end tergantung kebutuhan */
    width: 90%;
    gap: 10%;
}
/* Kontenan untuk refresh */

/* Styling tombol untuk refresh */
.tombol-rifres {
    padding: 0.5rem 1rem;
    align-items: center;
    font-weight: bold;
    font-size: 22px;
    color: #ffffff;
    background-color: #0FA702;
    border: 3px solid #262626;
    border-radius: 4px;
    cursor: pointer;
    transition: 0.4s;
}
.tombol-rifres:hover {
    color: #000000;
    background-color: #086000;
    border: 3px solid #A9A9A9;
}
/* Styling tombol untuk refresh */
.titled {
    flex: 1;  /* Membuat elemen fleksibel mengisi ruang */
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
    <h1 class="start-comp"><?php
    echo (("Hello").(", ").($username_ctd).("!"));
    ?></h1><div class="final-comp">
        <button id="profile-user" name="" class="butan" onclick="return userProfile()">
        Profile
        </button><button id="brekuki" name="" class="butan" onclick="return logOut()">
        Log Out
    </button></div>
</header>

<main><?php
//$from_teel = (('<span style="user-select: none;">').('Type the vocabulary that will be translated').('</span>'));
//$into_teel = (('<span style="user-select: none;">').('Type the vocabulary that will be translated').('</span>'));

//Write your Dictionary Translator
//Write your Glossarium

    ?><div class="konten" style=""><a href="../" style="text-decoration: none; color: black;"><h1>
    Write your Dictionary Translator
    </h1></a>
    <form class="kotak-kamus" action="security-settings/create-speech.php" id="kotakamus" name="kotakamus" method="GET">

        <div class="baris-kamus">
        <!-- [] -->
        <div class="kamus-tulis">
        <p><label class="ngeblok" for="trenslet_from">Vocabulary From</label>
        </p><input type="text" class="isi-kamus" name="trenslet_from" id="trenslet_from"
        placeholder="Type the vocabulary that will be translated"
        title="Vocabulary From"
        required></div>
        <!-- [] -->

        <!-- [] -->
        <div class="kamus-tulis">
        <p><label class="ngeblok" for="trenslet_into">Vocabulary Into</label>
        </p><input type="text" class="isi-kamus" name="trenslet_into" id="trenslet_into"
        placeholder="Type the Vocabulary that gonna be translated"
        title="Vocabulary Into"
        required></div>
        <!-- [] --></div>

        <div class="baris-kamus">
        <!-- [] -->
        <div class="kamus-tulis">
        <p><label class="ngeblok" for="speech_from">Speeching From</label>
        </p><input type="text" class="isi-kamus" name="speechin_from" id="speech_from"
        placeholder="Type the Language of the Vocabulary will be translated"
        title="Speeching From"
        required></div>
        <!-- [] -->

        <!-- [] -->
        <div class="kamus-tulis">
        <p><label class="ngeblok" for="speech_into">Speeching Into</label>
        </p><input type="text" class="isi-kamus" name="speechas_into" id="speech_into"
        placeholder="Type the Language of the Vocabulary gonna be translated"
        title="Speeching Into"
        required></div>
        <!-- [] --></div>

        <!-- [] -->
        <div class="tombol-kamus">
        <button class="buat-kamus" type="submit"
        style="user-select: none;">
        Writing the Translation
        </button></div>
        <!-- [] -->

    </form></div>

<?php
// Writing the Translation
// Writing the Glossarium
////
// List Dictionary
// List Glossarium
?>

    <div class="konten">
    <div class="segar-ulang" id="speech-table-container"><h1 class="titled">
    List Dictionary Translation
    </h1>
     <!-- <button class="tombol-rifres" id="refresh" name="refresh" onclick="loadSpeechTable()">
    Refresh
    </button> -->
    </div><table class="trenslet">
        <!-- [Baris Header] -->
        <tr>
            <th>TL From</th>
            <th>TL Into</th>
            <th>Speech From</th>
            <th>Speech Into</th>
            <th>Translator</th>
        </tr>
        <!-- [Baris Header] -->


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

    <script>
    document
        .getElementById('refresh')
        .addEventListener(('click'), () => {
            // reload seluruh halaman
            window.location.reload();
    });
    </script>
</main>

<footer><?php
require ('about.php');
?></footer>

</html>
