<?php
/* test-ujicoba.php */
//require_once("../security-settings/valid-account.php");

?>


<title>Lapangan untuk Testing</title>


<style>


.tabelan {
    margin: 5% 10%;
    border: 1px solid;
    width: 80%;
    text-align: center;
    border: 1px solid #000000;
    border-collapse: collapse;
}
.tabelan th {
    padding: 2% 0%;
    border: 1px solid #000000;
    border-collapse: collapse;
}
.tabelan .for-index td {
    border-top: 1px solid #000000;
    border-bottom: 1px solid #000000;
    padding: 2% 0%;
    border-collapse: collapse;
}
.central-index td {
	border-top: 1px solid #000000;
    padding: 2% 0%;
}
.in-index td {
	border: none;
    padding: 2% 0%;
}
.end-index td {
	border-bottom: 1px solid #000000;
    padding: 2% 0%;
}

h1 {
    margin: 0% 0%;
}
h2 {
    margin: 0% 0%;
}
h3 {
    margin: 0% 0%;
}

</style>

<?php 

$undefine= ("This is Empty")

?><table class="tabelan" align="center">
    <!--[Inisialisasi ke Kolom, alias mendatar]-->
    <tr><th><h1>
    Indikasi
    </h1></th><th><h1>
    Hasilan
    </h1></th></tr>

    <!--[\/]-->
    <!--[/\]-->

    <!--[Pendata: Nama]-->
    <tr class="central-index"><td><h2>
    Nama Identitas
    </h2></td><td><h2><i><?php
    echo ((isset($name)) ?
    ($name) : ($undefine));
    ?></i></h2></td></tr><!--
    [\/]
    --><tr class="in-index"><td><b>
    Nama Depan
    </b></td><td><?php
    echo ((isset($forename)) ?
    ($forename) : ($forename));
    ?></td></tr><!--
    [\/]
    --><tr class="end-index"><td><b>
    Nama Belakang
    </b></td><td><?php
    echo ((isset($backname)) ?
    ($backname) : ($backname));
    ?></td></tr>

    <!--[Pendata: Lahiran]-->
    <tr class="central-index"><td><h2>
    Waktu Lahiran
    </h2></td><td><h2><i><?php
    echo ((isset($date)) ?
    ($date) : ($undefine));
    ?></i></td></tr><!--
    [\/]
    --><tr class="in-index"><td><b>
    Tanggal Lahir
    </b></td><td><?php
    echo ((isset($day)) ?
    ($day) : ($error));
    ?></td></tr><!--
    [\/]
    --><tr class="in-index"><td><b>
    Bulan Lahir
    </b></td><td><?php
    echo ((isset($inmonth)) ?
    ($inmonth) : ($error));
    ?></td></tr><!--
    [\/]
    --><tr class="end-index"><td><b>
    Tahun Lahir
    </b></td><td><?php
    echo ((isset($year)) ?
    ($year) : ($error));
    ?></td></tr>

    <!--[Pendata: Telpon]-->
    <tr class="central-index"><td><h2>
    Nomor Telpon
    </h2></td><td><h2><i><?php
    echo ((isset($telp)) ?
    ($telp) : ($undefine));
    ?></i><h2></td></tr><!--
    [\/]
    --><tr class="in-index"><td><b>
    Nomor Asli
    </b></td><td><?php
    echo ((isset($intphone)) ?
    ($intphone) : ($undefine));
    ?></td></tr><!--
    [\/]
    --><tr class="end-index"><td><b>
    Nomor Struktur
    </b></td><td><?php
    echo ((isset($showphone)) ?
    ($showphone) : ($undefine));
    ?></td></tr>

    <!--[Pendata: Email]-->
    <tr class="for-index"><td><h2>
    Alamat Email
    </h2></td><td><h2><i><?php
    echo ((isset($mail)) ?
    ($mail) : ($undefine));
    ?></i></h2></td></tr>

    <!--[Pendata: Sandi]-->
    <tr class="for-index"><td><h2>
    Kata Sandi
    </h2></td><td><h2><i><?php
    echo ((isset($pswd)) ?
    ($pswd) : ($undefine));
    ?></i></h2></td></tr>

</table>
