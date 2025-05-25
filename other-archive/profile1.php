
<html>

<?php
/* profile1.php */

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
<?php require_once ("security-settings/koneksi-db.php");
$konek = db_connect();  // Hubungkan koneksi ?>
<?php //include ('namafile.php'); ?>


<!--[Judul . WAJIB]-->
<title><?php
/* Penjudulan */
require('style-css/generate-title.php');
$judul = ucwords(strtolower('Edit Profile'));  // [UBAH DISINI]

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
    /* width: max-content; */
    pointer-events: none;
    user-select: none;
}

.ngedit-pribadi {
    display: flex;
    flex-direction: row;
    align-items: center; /* Memastikan elemen sejajar */
    margin: 2% auto;
    width: 100%;
}
.ngedit-pribadi label {
    flex: 1;  /* Label mengambil ruang sesuai proporsi */
    text-align: right;  /* Supaya lebih rapi jika perlu */
    margin-right: 10px;  /* Jarak antara label dan input */
}
.ngedit-pribadi input,
.ngedit-pribadi textarea {
    flex: 2;  /* Input lebih besar dibanding label */
    width: auto;  /* Pastikan ukurannya fleksibel */
    text-align: left;
}
.ngedit-pribadi input {
    transition: 0.3s;
}
.ngedit-pribadi textarea {
    transition: 0.3s;
}

.isi-profilan {
    display: flex;
    flex-direction: column;  /* Menyusun elemen secara vertikal */
    justify-content: center;  /* Memusatkan elemen secara vertikal */
    align-items: center;  /* Memusatkan elemen secara horizontal */
    background: white;
    padding: 20px;
    width: 85%;  /* Lebar container tetap */
    gap: 15px;  /* Jarak antar elemen di dalam container */
}
.ubah-profil {
    display: flex;  /* Use flexbox for alignment */
    flex-direction: column;  /* Menyusun elemen secara vertikal */
    align-items: center;  /* Align items vertically in the middle */
    margin-bottom: 15px;  /* Add some space between groups */
    width: 100%;  /* Ensure the group takes full width within its parent */
    justify-content: center;  /* Center the label and input horizontally */
}
.ubah-profil label {
    display: flex;
    width: 25%;
    font-size: 20px;
    font-weight: bold;
    margin: auto auto auto 1%;
}
.ubah-profil input,
.ubah-profil textarea {
    flex: 2;
    width: 70%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.ngubah-profil {
    background-color: #007bff;  /* Warna: Biru */
    color: #ffffff;  /* Warna: Putih perfect */

    /* background-color: #656565;  /* <<*/

    display: flex;
    flex-direction: column; /* Susun input & button secara vertikal */
    justify-content: center;  /* Pusatkan button */
    width: 20%;  /* Biarkan ukurannya mengikuti kontennya */
    padding: 10px 20px;  /* Atur padding sesuai kebutuhan */
    margin: 0 auto; /* Pusatkan button dalam form */
    border: none;
    border-radius: 5px;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}
.ngubah-profil:hover {
    background-color: #0056b3;  /* Warna: Biru lebih gelap */
    /* background-color: #474747;  /**/

    /* color: #ffffff;  /* <<*/
    color: #000000;  /* <<*/
}
.ngubah-profil:active {
    color: #ffffff;  /* <<*/

    transform: scale(1.1);
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
        function bekUser() {
            window.location.href = ("user");
        }

        function konfirmEdit() {

            let userChoice = confirm("Are you sure editing this account?");
            
            if (userChoice) {

                //alert ("Oke! Terpilih!");

               // function formatDate(getDate) {
                 //   let [year, month, day] = getDate.split('-');
                 //   if (year || month || day) {
                 //       alert("Format tanggal salah! Pastikan formatnya 'dd-mm-yyyy'.");
                  //      return "";
                  //  }
                   // return (`${day}-${month}-${year}`);
               // }

                // Ambil nilai input baru
                var edit_name = (document.getElementById("name_edit").value.trim());
                var edit_numb = (document.getElementById("numb_edit").value.trim());
                var edit_desc = (document.getElementById("desc_edit").value.trim());
                var edit_date = (document.getElementById("date_edit").value.trim());
                var edit_mail = (document.getElementById("mail_edit").value.trim());
                var edit_pass = (document.getElementById("pass_edit").value.trim());
                //
                var fixx_date = formatDate(edit_date);

                // Ambil nilai input lama
                var prev_name = (document.getElementById("prev_username").value.trim());
                var prev_numb = (document.getElementById("prev_numphone").value.trim());
                var prev_desc = (document.getElementById("prev_descript").value.trim());
                var prev_date = (document.getElementById("prev_bdate").value.trim());
                var prev_mail = (document.getElementById("prev_email").value.trim());
                var prev_pass = (document.getElementById("prev_sandi").value.trim());

                // Periksa apakah ada input yang kosong
                if ([edit_name, edit_numb, edit_desc, edit_date, edit_mail, edit_pass].some(value => !value)) {
                    alert ("Fill 'em all!");
                    return;
                }

                // Periksa apakah ada perubahan dibandingkan dengan data sebelumnya
                //if ([edit_name, edit_numb, edit_desc, edit_date, edit_mail, edit_pass]
                //.every((value, index) => value === [prev_name, prev_numb, prev_desc, prev_date, prev_mail, prev_pass][index])) {
                    //alert ("Choose something that you wanted to edit!");
                    //return;
                //}
                //return;

                // Redirect jika semua input terisi dan ada perubahan
                //window.location.href = (("user"));
            }
            else {
                //alert ("Membatalkan...");
                return;
            }
            //alert ("Memastikan...");
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
<div class="konten"><h1 class="ngeblok">
Change Profile
</h1><!-- h1 class="ngeblok"><i>
!!![ Under Maintenance ]!!!
</i></h1 -->

<!-- [Form mengubah profi;] --><?php

/* Initialize from: Email */
$get_email = ($_GET['email']);
// Get Data: from Email //
$sql_getall = ("
SELECT * FROM ctd_account 
WHERE email = ?
");
$show_alldata = (($konek) -> prepare($sql_getall));
$show_alldata -> bind_param(("s"), ($get_email));  // "s", meaning 'string'
// Eksekusi //
$show_alldata -> execute();
// Ambil hasil //
$alldata = (($show_alldata) -> get_result());
while ($letget = (($alldata) -> fetch_assoc())):
    // [Tanggal] //
    $cenji_birth = ($letget['datebirth']);
    $fix_birth = date(("d-m-Y"), strtotime($cenji_birth));
    ///
    $cut_birth = explode(("-"), ($fix_birth));
    $get_dd = ($cut_birth[(1)-(1)]);
    $get_mm = ($cut_birth[(2)-(1)]);
    $get_year = ($cut_birth[(3)-(1)]);
    ///
    $comb_birth = [($get_dd), ($get_mm), ($get_year)];
    $morfix_birth = implode(("/"), ($comb_birth));
    ///
    $struct_date = (DateTime::createFromFormat(("d/m/Y"), ($morfix_birth)));
    $format_date = (($struct_date) -> format("d-m-Y"));  // Format yang bisa dipakai di input date
    // [Tanggal] //
    //|//
    $def_descript = ucwords(strtolower('Add Your Desc'));
    //|//
    // [Nomor Telpon] //
    $cenji_phone = ($letget['nophone']);
    $cut_phone = str_split(($cenji_phone), (4));
    $fix_phone1 = implode(("-"), ($cut_phone));
    $fix_phone2 = implode((" - "), ($cut_phone));
    ///
    $region_code = ('+62');
    $morcut_phone = substr(($fix_phone1), (1));
    $comb_phone = [($region_code), ($morcut_phone)];
    $morfix_phone = implode((' '), ($comb_phone));
    // [Nomor Telpon] //

    // [Tes] //
    echo (htmlspecialchars($letget['forename']));
    echo (htmlspecialchars($letget['backname']));
    // [Tes] //

?><div class="isi-profilan">
<form action="security-settings/edit-profile" class="ubah-profil" method="get">

    <!-- [Nilai Tersembunyi] -->
    <input type="hidden" name="initial_acc" id="initial_acc"
    value="<?php echo (htmlspecialchars($letget['id_acc'])); ?>">
    <!-- [//] -->
    <input type="hidden" name="prev_username" id="prev_username"
    value="<?php echo (htmlspecialchars($letget['name'])); ?>">
    <input type="hidden" name="prev_numphone" id="prev_numphone"
    value="<?php echo (htmlspecialchars($letget['nophone'])); ?>">
    <input type="hidden" name="prev_descript" id="prev_descript"
    value="<?php echo (htmlspecialchars($letget['user_desc'])); ?>">
    <input type="hidden" name="prev_bdate" id="prev_bdate"
    value="<?php echo ($format_date); ?>">
    <input type="hidden" name="prev_email" id="prev_email"
    value="<?php echo (htmlspecialchars($letget['email'])); ?>">
    <input type="hidden" name="prev_sandi" id="prev_sandi"
    value="<?php echo (htmlspecialchars($letget['password'])); ?>">
    <!-- [//] -->
    <input type="hidden" name="prev_fornem" id="prev_fornem"
    value="<?php echo (htmlspecialchars($letget['forename'])); ?>">
    <input type="hidden" name="prev_beknem" id="prev_beknem"
    value="<?php echo (htmlspecialchars($letget['backname'])); ?>">
    <!-- [Nilai Tersembunyi] -->

    <div class="ngedit-pribadi" style=""><label class="ngeblok" for="nama">
    Name Identity
    </label><input type="text" id="name_edit" name="name_edit"
    value="<?php echo (htmlspecialchars($letget['name'])); ?>"
    placeholder="<?php echo (htmlspecialchars($letget['name'])); ?>"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok" for="nomor">
    Phone Number
    </label><input type="tel" id="numb_edit" name="numb_edit"
    value="<?php echo (htmlspecialchars($letget['nophone'])); ?>"
    placeholder="<?php echo ($morfix_phone); ?>"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok" for="deskripsi">
    Description
    </label><textarea id="desc_edit" name="desc_edit" style="resize: none;"
    placeholder="<?php echo ($def_descript); ?>"
    rows="8" value="A" required><?php
    echo (htmlspecialchars($letget['user_desc']));
    ?></textarea></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok" for="tanggal">
    Birth Date
    </label><input type="date" id="date_edit" name="date_edit" onclick=""
    value="<?php echo ($format_date); ?>"
    placeholder="<?php echo (('XX-XX-XXXX')); ?>"
    title="<?php echo (('Your Date Saved Before').(': ').($format_date)); ?>"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok" for="email">
    Email
    </label><input type="email" id="mail_edit" name="mail_edit"
    value="<?php echo (htmlspecialchars($letget['email'])); ?>"
    placeholder="<?php echo (htmlspecialchars($letget['email'])); ?>"
    required></div>

    <div class="ngedit-pribadi" style=""><label class="ngeblok" for="password">
    Password
    </label><input type="password" id="pass_edit" name="pass_edit"
    value="<?php echo (htmlspecialchars($letget['password'])); ?>"
    placeholder="<?php echo (str_repeat('*', strlen(htmlspecialchars($letget['password'])))); ?>"
    required></div>

    <button type="submit" class="ngubah-profil"
    style="user-select: none;"
    title="Editing Profile" onclick="return konfirmEdit()" >
    Change
    </button><?php
    endwhile;
    ?></form>
</div></div>
</main>

<!-- [Tentang Projek] -->
<footer><?php
require ('about.php');
?></footer>

</html>
