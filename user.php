
<html>

<?php
/* user.php */

//
// Memulai SESSION
session_start();

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
<?php require ('security-settings/user-translate.php'); ?>
<?php require ('security-settings/profile-account.php'); ?>
<?php //include ('namafile.php'); ?>


<!--[Judul . WAJIB]-->
<title><?php
/* Penjudulan */
require('style-css/generate-title.php');
$judul = ucwords(strtolower('User'));  // [UBAH DISINI]

/* Pembentukan */
$generaTitle = join(($renketsu), array(($judul), ($app_name)));
echo ($generaTitle);  // Generate!
?></title>


<style>
main {
    margin: 0;
    padding-top: 7%;  /* Menyesuaikan dengan tinggi dari Navbar */
}

th {
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

.konten-user {
    padding-top: 3%;
    width: 90%;
    display: flex;
    flex-direction: column;
    align-items: center;  /* Memusatkan elemen secara horizontal */
    margin: 0 auto;  /* Memusatkan container di halaman */
    padding: 1rem;
}

.batas-tabel {
    border: 1px solid #000000;
    border-top: 1px solid #000000;
    border-right: 1px solid #000000;
    border-bottom: 1px solid #000000;
    border-left: 1px solid #000000;
}
th {
    border: 1px solid #000000;
}

.konten-perbaik {
    margin: 0 auto;
    width: 70%;
}
.kotak-trenslet td {
    border: 1px solid #000000;
}

.meng-laku {
    width: 45%;
    padding: 10px 15px;
    margin: 1% 2.5%;
    border: none;
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
    border-radius: 5px;
    transition: 0.3s;
}
.meng-edit {
    background-color: #2993E0;  /* Blue */
    /* background-color: #7C7C7C;  /* <<*/
    color: #ffffff;  /* Putih perfect */
    /* color: #ffffff;  /* <<*/
}
.meng-edit:hover {
    background-color: #05385C;  /* Dark Blue */
    /* background-color: #2D2D2D;  /* <<*/
    color: #000000; /**/
    opacity: 0.8;  /**/
}
.meng-edit:active {
    transform: scale(0.9);  /* Memperkecil elemen */
}

.meng-erase {
    background-color: #F44336; /* Red */
    /* background-color: #767676;  /* <<*/
    color: #ffffff;  /* Putih perfect */
    /* color: #ffffff;  /* <<*/
}
.meng-erase:hover {
    background-color: #8A2619;  /* Dark Red */
    /* background-color: #424242;  /* <<*/
    color: #000000;  /**/
    opacity: 0.8;  /**/
}
.meng-erase:active {
    transform: scale(0.9);  /* Memperkecil elemen */
}

.edit-profil {
    background-color: #007bff;  /* Warna: Biru */
    color: #ffffff;  /* Warna: Putih Perfect */

    /* background-color: #656565;  /* <<*/
    /* color: #CACACA;  /* <<*/

    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s ease;
}
.edit-profil:hover {
    background-color: #0056b3;  /* Warna: Biru Gelap */
    /* background-color: #474747;  /* <<*/
}
.edit-profil:active {
    background-color: #00408a;  /* Warna: Biru Lebih Gelap */
    color: #000000;  /* Warna: Hitam Perfect */

    /* background-color: #353535;  /* <<*/
    /* color: #171717;  /* <<*/
}

.sikret-jabat {
    color: #000000;
    text-decoration: none;
    user-select: none;
    cursor: default;
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

        function ubahAkun() {
            //let idSpeech = (button.getAttribute("data-id"));
          //  dirubah duku keprofile1
            //window.location.href = ("profile");
            //window.location.href = ("profile1");
            //window.location.href = (("profile?id_user=") + ('ComingSoon'));
        }
        function ubahKamus(button) {
            let idSpeech = (button.getAttribute("data-id"));  // Mengambil ID dari atribut tombol

            if (confirm((`Are you sure to edit this translation?`) + (`\n`) +
            (`Editing to Translation ID: ${idSpeech}`))) {
                //window.location.href = (("translate?id=")+(idSpeech));
                window.location.href = (("translate") + ("?") + ("tlid") + ("=") + (idSpeech));
            } else {
                //console.log("User menekan Cancel!");
            }
        }

        function hapusAkun() {
            window.location.href = ("maintenance");
        }
        function hapusKamus(button) {
            let idSpeech = button.getAttribute("data-id");  // Mengambil ID dari atribut tombol

            if (confirm((`Are you sure to erasing this translation?`) + (`\n`) +
            (`Erasing for Translation ID: ${idSpeech}`))) {
                //window.location.href = (("translate?id=")+(idSpeech));
                window.location.href = (("security-settings/erase-speech") + ("?") + ("tlid") + ("=") + (idSpeech));
            } else {
                //console.log("User menekan Cancel!");
            }
        }
    </script>
    <h1 onclick="bekMenu()" class="start-comp"
    title="Back to the Dashboard"
    style="cursor: pointer;"><?php
    echo (("Hello").(", ").($username_ctd).("!"));
    ?></h1><div class="final-comp"><!-- a href="maintenance">
    Progress
    </a --><button id="brekuki" name="" class="butan" onclick="return logOut()">
    Log Out
    </button></div>
</header>

<main>
<div class="konten">
<a class="sikret-jabat" href="change-role"><h1 class="sikret-jabat">
Profile Account
</h1></a><table class="identic">

<tr>
<th rowspan="2" class="batas-tabel">
Identity Name 
</th><td colspan="3"><p class="ngopas" style="text-align: center; margin: 0 auto;"><b><?php
$identity_first = ($profil_data['name']);
echo ($identity_first);
?></b></p></td></tr>

<tr><td colspan="3"><!--

//<p class="ngopas" style="width: max-content; margin: 0% auto;"><i><?php
//echo ($profil_data['forename']);
//?></i></p>
//<p class="ngopas" style="width: max-content; margin: 0% auto;"><i><?php
//echo ($profil_data['backname']);
//?></i></p>

--><div style="display: flex; justify-content: center; gap: 5px;"><?php
if (!(empty($identity_first))) {
    $long_nem = explode((" "), ($identity_first));
    if ((count($long_nem)) > (1)) {
        echo (("<p class='ngopas' style='text-align: center; margin: 0 auto;'>").("<i>"));
        echo ($profil_data['forename']);
        echo ("</i></p>");
        echo (("<p class='ngopas' style='text-align: center; margin: 0 auto;'>").("<i>"));
        echo ($profil_data['backname']);
        echo ("</i></p>");
    } else {
        echo (("<p class='ngopas' style='text-align: center; margin: 0 auto;'>").("<i>"));
        echo ("$identity_first");
        echo ("</i></p>");
    }
} else {
    echo ("<p class='ngopas' style='text-align: center; margin: 0 auto;'><i>");
    echo ("Data is not found...");
    echo ("</i></p>");
}
?></div></td></tr>
</tr>

<tr><th style="border: none;">
User Role
</th><td class="ngeblok" style="font-size: 20px" colspan="3"><b><?php
echo ($profil_data['roleuser']);
echo (" - ");
echo (("<i>").($profil_data['level']).("</i>"));
?></b></td></tr>

<tr><th style="border: none;">
Description
</th><td class="ngeblok" colspan="3"><?php
$descdef = ucwords('Add Your Desc');
$isi_desc = ($profil_data['user_desc']);
$isi_descomp = ucwords($profil_data['user_desc']);

if (($isi_descomp) === ($descdef)) {
    echo (("<i>").($isi_descomp).("</i>"));
} else {
    echo ($isi_desc);
}
?></td></tr>

<tr><th rowspan="2" class="batas-tabel">
Birth Date
</th><td class="ngeblok" colspan="3"><?php
$lahirDate = ($profil_data['datebirth']);
$showBDate = date(("d - m - Y"), strtotime($lahirDate));
///
$separe_BDate = (" - ");
$get_BDate = explode(($separe_BDate), ($showBDate));
///
echo ($showBDate);
?></td></tr>
<tr><td class="ngeblok" style="width: 17.5%"><?php
echo ($get_BDate[(1)-(1)]);
?></td><td class="ngeblok" style="width: 17.5%"><?php
$bulan = [
    "Januari", "Februari", "Maret", "April",
    "Mei", "Juni", "Juli", "Agustus",
    "September", "Oktober", "November", "Desember"
];
$pilih_bulan = ($get_BDate[(2)-(1)]);
$memilih_bulan = intval($pilih_bulan);
///
echo ($bulan[($memilih_bulan)-(1)]);
?></td><td class="ngeblok" style="width: 17.5%"><?php
echo ($get_BDate[(3)-(1)]);
?></td></tr>

<tr><th style="border: none;">
Phone Number
</th><td colspan="3"><?php
$dpt_phone = ($profil_data['nophone']);
$strak_phone = [
    (substr(($dpt_phone), ((1)-(1)), (4))),
    (substr(($dpt_phone), ((5)-(1)), (4))),
    (substr(($dpt_phone), ((9)-(1)), (4)))
];
$liat_phone = implode((" - "), ($strak_phone));
///
///
$ngr_phone = ('+62');
$com_phone = substr(($liat_phone), (1));
$sip_phone = (("<i>").($com_phone).("</i>"));
///
$phonefy = implode((" "), [($ngr_phone), ($sip_phone)]);
///
echo ($phonefy);
?></td></tr>

<tr><th style="border: none;">
Email
</th><td colspan="3"><?php
$identity_khusus = ($profil_data['email']);
echo ($identity_khusus);
?></td></tr>

<tr><th style="border: none;">
Password
</th><td class="ngeblok" colspan="3"><?php
$inSandi = ($profil_data['password']);
$tutupSandi = ("■");
$showSandi = str_repeat(($tutupSandi), (strlen($inSandi)));
///
echo ($showSandi);
?></td></tr>
</table><div style="margin-top: 1%; gap: 3%;">
<a href="<?php echo (('profile-user').('?').('email=').($identity_khusus)); ?>"
style="text-decoration: none;"><button class="edit-profil" id="" name="" onclick=""
style="user-select: none;">
Edit Profile
</button></a><!-- a href="maintenance" style="text-decoration: none;">
<button class="edit-profil" id="" name="" onclick=""
style="user-select: none;">
Progress Maintenance
</button></a --></div></div>

<div class="konten"><h1 class="ngeblok">
Translator List
</h1><table class="trenslet">
    <!-- [Baris Header] -->  <tr><th>
    No List
    </th><th>
    TL From
    </th><th>
    TL Into
    </th><th>
    Speech From
    </th><th>
    Speech Into
    </th><th>
    Edit or Erase
    </th></tr>  <!-- [Baris Header] -->


    <!-- [Baris Showing] --> <?php
    $nolist = (1);  // Inisialisasi nomor urut
    if (mysqli_num_rows($tampil_tl) == 0): ?><tr>
    <td colspan="6" class="ngeblok">
    Let's make the tranlastions!
    </td></tr><?php else:
        while ($row = mysqli_fetch_assoc($tampil_tl)): ?>
        <tr class="kotak-trenslet"><td class="ngeblok"
            data-id="<?php echo htmlspecialchars($row['id_speech']); ?>"><?php
                echo ($nolist);
            ?></td>
            <td class="ngeblok"><?php
            echo (htmlspecialchars($row['speeching']));
            ?></td><td class="ngeblok"><?php
            echo (htmlspecialchars($row['transpeech']));
            ?></td><td class="ngeblok"><?php
            echo (htmlspecialchars($row['communic_source']));
            ?></td><td class="ngeblok"><?php
            echo (htmlspecialchars($row['communic_target']));
            ?></td><td><?php
                echo ("<button class='meng-laku meng-edit' style='user-select: none;' data-id='")
                .(htmlspecialchars($row['id_speech']))
                .("' onclick='ubahKamus(this)'>")
                .("Edit")  // [Edit / Update]
                .("</button>");
                ///
                echo ("<button class='meng-laku meng-erase' style='user-select: none;' data-id='")
                .(htmlspecialchars($row['id_speech']))
                .("' onclick='hapusKamus(this)'>")
                .("Erase")  // [Erase / Delete]
                .("</button>");
                ///
                $nolist++;
            ?></td></tr><?php endwhile;
        endif; ?><!-- [Baris Showing] -->
    </table></div>
</main>

<!-- [Tentang Projek] -->
<footer><?php
require ('about.php');
?></footer>

</html>
