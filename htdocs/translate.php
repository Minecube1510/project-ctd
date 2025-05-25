
<html>

<?php
/* translate.php */

//
// Memulai SESSION
session_start();


/* Masukkan koneksi, menyambungkan ke 'MySQL-PHPMyAdmin' */
require ('security-settings/koneksi-db.php');
$konek = db_connect();  // Hubungkan koneksi


// Periksa apakah session ada
if (!(isset($_SESSION['userctd_name']))) {
    // Jika tidak ada session, redirect ke login
    header("Location: /");
    exit;
}
///
$username_ctd = ($_SESSION['userctd_name']);
?>

<!--[Ambil File]-->
<?php require ('style-css/main-setup.php'); ?>
<?php //include ('namafile.php'); ?>
<?php //include ('namafile.php'); ?>


<!--[Judul . WAJIB]-->
<title><?php
/* Penjudulan */
require('style-css/generate-title.php');
$judul = ucwords(strtolower('Edit Translation'));  // [UBAH DISINI]

/* Pembentukan */
$generaTitle = join(($renketsu), array(($judul), ($app_name)));
echo ($generaTitle);  // Generate!
?></title>


<style>
main {
    margin: 0;
    padding-top: 7%;  /* Menyesuaikan dengan tinggi dari Navbar */
}

.konten-edit {
    width: 70%;
    margin: 2rem auto;
}

/* Label: tampil sebagai block element pada baris tersendiri */
.konten-edit label {
    font-weight: bold;  /* Bold untuk label */
    pointer-events: none;
    user-select: none;
    display: inline-block;
    width: 40%;  /* Sesuaikan dengan kebutuhan */
    font-size: 20px;
    margin-right: 10px;
    font-size: 1rem;
    color: #000000;
}

/* Input, Textarea, Select:
   - Tidak memakai border sekeliling, hanya garis bawah sebagai indicator */
.konten-edit input,
.konten-edit textarea,
.konten-edit select {
    display: block;
    width: 100%;
    font-size: 1rem;
    padding: 0.5rem 0;
    margin-bottom: 1rem;
    background: none;
    border: none;
    border-bottom: 1px solid #ccc;
    transition: 0.3s;
}

/* Fokus pada elemen: garis bawah berubah warna saat aktif */
.konten-edit input:focus,
.konten-edit textarea:focus,
.konten-edit select:focus {
    outline: none;
    border-bottom: 1px solid #007BFF;
}

.tombol-ngedit {
    background-color: #4CAF50; /* Warna hijau */
    color: #ffffff;  /* Warna: Putih perfect */

    /* background-color: #868686; /* <<*/
    /* color: #000000;  /* <<*/

    display: block;
    margin: auto;
    padding: 10px 20px;
    border: none;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    font-size: 20px;
    transition: background-color 0.3s, transform 0.2s, color 0.3s;
}
.tombol-ngedit:hover {
    background-color: #45a049;  /* Warna lebih gelap saat hover */

    /* background-color: #7B7B7B;  /* <<*/

    transform: scale(1.05);
}
.tombol-ngedit:active {
    background-color: #3e8e41;  /* Warna lebih gelap saat diklik */
    color: #000000;  /* Warna: Hitam perfect */

    /* background-color: #6D6D6D;  /* <<*/
    /* color: #ffffff;  /* <<*/

    transform: scale(0.95);
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
    <script>
        function bekMenu() {
            window.location.href = ("../");
        }

        function cekEdit() {
            let tlChoice = confirm("Are you sure want to edit this translation?");

            if (tlChoice) {
                //alert ("Selected");

                var emptyNess = ("");
                var aidiSpik = (document.getElementById('id_speech').value.trim());

                //var getValue = (id) => document.getElementById(id)?.value.trim() || ("");

                var oldFromSpeech = (document.getElementById('prev_from_speech').value.trim());
                var oldIntoSpeech = (document.getElementById('prev_into_speech').value.trim());
                var oldFromSource = (document.getElementById('prev_from_source').value.trim());
                var oldIntoSource = (document.getElementById('prev_into_source').value.trim());
                //
                var fromSpeech = (document.getElementById('from_speech').value.trim());
                var intoSpeech = (document.getElementById('into_speech').value.trim());
                var fromSource = (document.getElementById('from_source').value.trim());
                var intoSource = (document.getElementById('into_source').value.trim());

                console.log ("ID Speech:", aidiSpik);
                console.log ("New Values:", fromSpeech, intoSpeech, fromSource, intoSource);
                console.log ("Old Values:", oldFromSpeech, oldIntoSpeech, oldFromSource, oldIntoSource);

                // Cek apakah isinya kosong
                if (((fromSpeech) == (emptyNess)) ||
                    ((intoSpeech) == (emptyNess)) ||
                    ((fromSource) == (emptyNess)) ||
                    ((intoSource) == (emptyNess))) {
                    alert ("Fill 'em all!");
                    return (false);  // Keluar dari fungsi jika tidak ada perubahan
                }

                // Cek apakah isinya sama dengan sebelumnya
                if (((fromSpeech) == (oldFromSpeech)) &&
                    ((intoSpeech) == (oldIntoSpeech)) &&
                    ((fromSource) == (oldFromSource)) &&
                    ((intoSource) == (oldIntoSource))) {
                    alert ("Choose the translation wanted be changed!");
                    return (false);  // Keluar dari fungsi jika tidak ada perubahan
                }

                //window.location.href = (("security-settings/change-speech") + ("?") + ("id_speech") + ("=") + (aidiSpik));
                return (true);
            } //else {
                //alert ("Canceling...");
                //console.log ("Doing canceling...");
                //return (true);  // Keluar dari fungsi jika pengguna batal
            //}
            ///
            //return (true);
        }

        function bekUser() {
            window.location.href = ("user");
        }
        function bekX() {
            window.location.href = ("../");
        }
    </script>
    <h1 onclick="bekMenu()" class="start-comp"
    title="Back to the Dashboard"
    style="cursor: pointer;"><?php
    echo (("Hello").(", ").($username_ctd).("!"));
    ?></h1><div class="final-comp"><button class="butan" onclick="return bekUser()">
    Back
    </button><button id="brekuki" name="" class="butan" onclick="return logOut()">
    Log Out
    </button></div>
</header>

<main>
<div class="konten"><h1>
Translator Editing
</h1><?php
if (isset($_GET['non-edit'])) {
    $not_edited = ($_GET['non-edit']);
    echo ('<h2><i>');
    echo (preg_replace(
        ('/[_\.\-]/'),
        (' '), ($not_edited)));
    echo ('</i></h2>');
} else {
    echo ('');
}
?>

<!-- [Dari sebelumnya] --><?php
if (isset($_GET['tlid'])) {
    $id_tl = ($_GET['tlid']);
    //echo ($id_tl);
    //echo (('<br>').('<br>'));

    $sql = ("SELECT * FROM translator_ctd WHERE id_speech = ?");
    $stmt = mysqli_prepare(($konek), ($sql));

    mysqli_stmt_bind_param(($stmt), ("i"), ($id_tl));
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt) or die("Query execution failed!");

    $getdata = (mysqli_fetch_assoc($result)) or (die (("<i>").("No data translation found!").("</i>")));

    $dari_koskat = ($getdata['speeching']);
    $pada_koskat = ($getdata['transpeech']);
    $dari_bahasa = ($getdata['communic_source']);
    $pada_bahasa = ($getdata['communic_target']);
} else {
    echo ("ID not available!");
    exit;
}
//echo ($dari_koskat);
//echo ($pada_koskat);
//echo ($dari_bahasa);
//echo ($pada_bahasa);
?><form action="security-settings/change-speech" class="konten-edit" method="get">
    <input type="hidden" id="id_speech" name="id_speech" value="<?php echo ($id_tl); ?>">

    <div><label>
    From Speeching:
    </label><input type="hidden" name="prev_from_speech" id="prev_from_speech"
    value="<?php echo $dari_koskat; ?>"><input type="text" name="from_speech" id="from_speech"
    placeholder="<?php echo ($dari_koskat); ?>"
    value="<?php echo ($dari_koskat); ?>" required></div>

    <div><label>
    Into Speeching:
    </label><input type="hidden" name="prev_into_speech" id="prev_into_speech"
    value="<?php echo $pada_koskat; ?>"><input type="text" name="into_speech" id="into_speech"
    placeholder="<?php echo ($pada_koskat); ?>"
    value="<?php echo ($pada_koskat); ?>" required></div>

    <div><label>
    From Language:
    </label><input type="hidden" name="prev_from_source" id="prev_from_source"
    value="<?php echo $dari_bahasa; ?>"><input type="text" name="from_source" id="from_source"
    placeholder="<?php echo ($dari_bahasa); ?>"
    value="<?php echo ($dari_bahasa); ?>" required></div>

    <div><label>
    Into Language:
    </label><input type="hidden" name="prev_into_source" id="prev_into_source"
    value="<?php echo $pada_bahasa; ?>"><input type="text" name="into_source" id="into_source"
    placeholder="<?php echo ($pada_bahasa); ?>"
    value="<?php echo ($pada_bahasa); ?>" required></div>

    <button type="submit" class="tombol-ngedit"
    style="user-select: none;"
    onclick="return cekEdit()">
    Update
    </button>
</form>
</div>
</main>

<!-- [Tentang Projek] -->
<footer><?php
require ('about.php');
?></footer>

</html>
