<!-- struct-request.php -->

<?php
    header("Content-type: text/css");
    $def_input = ('100');  // Diubah dari '50' menjadi '100'
?>

.kotak-data {
    color: #ffffff; /* Text color */
    border: 2px solid #000000; /* Border */
    box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Shadow */
    padding: 1rem; /* Padding */
    max-width: 600px; /* Maksimal lebar yang diizinkan */
    margin: 0 auto; /* Memusatkan kotak data */
}

.daftar-data {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 2rem;
    border-radius: 8px;
    background-color: #F2F2F2;
    width: <?php echo ($def_input); ?>%; /* Sekarang 100% */
    box-sizing: border-box;
    border: 1px solid #000000; /* Border */
    box-shadow: 4px 4px rgba(0, 0, 0, 0.2);
}
.daftar-data label {
    display: block;
    font-weight: bold;
    margin-top: 1%;
    color: #000000; /* Label color */
}
.daftar-data .isi-data {
    display: block;
    padding: 0.8rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 3%;
    box-shadow: 4px 4px rgba(0, 0, 0, 0.2);
    font-size: 1rem;
    width: 100%; /* Agar input mengisi lebar penuh */
    box-sizing: border-box;
}

.kirim-daftar {
    display: block;
    width: <?php echo ($def_input); ?>%; /* Sekarang 100% */
    background-color: #4CAF50; /* Button color */
    color: white; /* Text color */
    padding: 1rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: bold;
}
.kirim-daftar:hover {
    background-color: #45a049; /* Hover effect */
}

.kotak-data {
    width: 100%; /* Lebar penuh */
    max-width: 400px; /* Atur lebar maksimum */
    margin: 0 auto; /* Memusatkan kotak data */
}

.cookie-set {
    display: flex;
    flex-direction: row; /* Menampilkan elemen secara horizontal */
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
    margin: 0; /* Tambahkan margin atas dan bawah untuk jarak */
    padding: 0; /* Menghapus padding default */
}
.cookie-set p {
    margin-left: 10px; /* Tambahkan jarak antara checkbox dan teks */
}

.ceklis {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 3px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
/* Hide the browser's default checkbox */
.ceklis input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
  transition: 0.3s;
}
/* Create a custom checkbox */
.cektang {
  position: absolute;
  top: 0%;
  left: 0%;
  transform: translate(15%, 10%);
  height: 25px;
  width: 25px;
  border: 1px solid #000000;
  background-color: #ffffff;
}
/* On mouse-over, add a grey background color */
.ceklis:hover input ~ .cektang {
  background-color: #ccc;
}
/* When the checkbox is checked, add a blue background */
.ceklis input:checked ~ .cektang {
  background-color: #2196F3;
}
/* Create the checkmark/indicator (hidden when not checked) */
.cektang:after {
  content: "";
  position: absolute;
  display: none;
}
/* Show the checkmark when checked */
.ceklis input:checked ~ .cektang:after {
  display: block;
}
/* Style the checkmark/indicator */
.ceklis .cektang:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
.kirim-data {
    background-color: #00768f;  /**/
    color: #d3d3d3;  /**/
    border: 2px solid #0a0a0a;

    /* background-color: #ffffff; */
    /* color: #000000; */

    display: inline-block;
    width: auto;
    padding: 3%;
    font-size: 24px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    border-radius: 15px;
    transition: 0.3s;
}
.kirim-data:hover {
    background-color: #119fbd;  /**/
    color: #979797;  /**/
    border: 2px solid #fafafa;

    /* background-color: #000000;  /**/
    /* color: #ffffff;  /**/
}
.kirim-data:active {
    background-color: #3e6a73;  /**/
    color: #3d3d3d;  /**/
    border: 2px solid #141414;  /**/

    /* background-color: #ffffff;  /**/
    /* color: #000000;  /**/
    /* border: 2px solid #c7c7c7;  /**/

    transform: scale(0.9);
}

.linker {
    color: #000000;
    text-decoration: none;  /* Menghilangkan garis bawah */
    font-weight: bold;  /* Membuat teks lebih tebal */
    margin: 5px;  /* Memberikan jarak */
    transition: 0.3s;
}
.linker:hover {
    color: #5c5c5c;
    transform: scale(1.1);
}
