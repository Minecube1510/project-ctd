Project - 03
"Custom Translator Dictionary"
As Shorted: "CTD"

Made by:
- Aditya Rahman

Deskripsi:
---
Web Custom Translator Dictionary adalah website yang berbasis utama bahasa pemrograman PHP, yang
mana ini adalah web untuk menjadi translator, berisikan terjemahan-terjemahan yang bisa dikostumisasi
bahasa-bahasa terjemahan-terjemahannya.
---

Halaman:
> Dasbor: Sebagai peranan Halaman Utama web ini.
Ini adalah 'Dasbor pertama' atau 'Dasbor Guest': (dashboard-first.php)
Ini adalah 'Dasbor default' atau 'Dasbor User': (dashboard.php)

> Login (Masuk) / Register (Daftar)
- (login.php)
 Hanya berisi [niknem/email/nomor] dan [sandi].
- (register.php)
 Berisikan [niknem/nama-lengkap], [3-waktu-lahir], [notelp], [email], [sandi].

> User: Halaman pribadi milik User. (user.php)
- (translate.php)
 Halaman ini tentang ngedit hasil translate-an orang.
- (profile.php)
 Halaman ini tentang edit data-data pribadi si user/admin.

> Kredit Projek: Tentang kita, tentang project ini.
(about.php)

Database:
---
# (Sistem CRUD) [ctd_account]
name (Niknem-nya juga boleh, tapi gak disarankan)
forename ([name], Yang paling awal)  <-- Ini ada kalo mau naro 2 kata
backname ([name], Yang paling akhir)  <-- Ini ada kalo mau naro 2 kata (INI YG PENTING UNTUK ITU)
desc (Deskripsi dari si niknem/name)
daydate (Tanggal lahir)
monthdate (Bulan lahir)
yeardate (Tahun lahir)
nophone (Nomor Telpon)
email (Yang ada, 'dot-dot'-nya)
password (Kunci yang bersifat rahasia)

    id_acc INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name VARCHAR(150) NOT NULL,
    forename VARCHAR(50),
    backname VARCHAR(50),
    roleuser ENUM('User', 'Admin') NOT NULL,
    desc TEXT,
    <<datebirth DATE(10) NOT NULL,>>
    >>daydate INT(2) NOT NULL,<<
    >>monthdate INT(2) NOT NULL,<<
    >>yeardate INT(4) NOT NULL,<<
    nophone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL

Contoh:
name: Orang Bumi
forename: Orang
backname: Bumi
desc: Hanya makhluk yang tinggal di planet bumi.
daydate: 22
monthdate: 10/October/Oktober
yeardate: 2000
nophone: 0835-3509-3053
email: BimaSakti69@angkasa.com
password: g4l4x1_s3m3sta
---
|
---
# (Sistem Pengucapan) [translator_ctd]
speeching (apa yang dikatakannya)
transpeech (terjemahan dari kataannya)
communic_source (kata dari bahasa apakah itu)
communic_target (kata tadi, diartiin ke bahasa apakah itu)
byname (si niknem/forename-nya yang trenslet)

    id_speech INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    speeching TEXT NOT NULL,
    transpeech TEXT NOT NULL,
    communic_source VARCHAR(50) NOT NULL,
    communic_target VARCHAR(50) NOT NULL,
    translate_by VARCHAR(150) NOT NULL
    |
    +--> translate_by+ [FOREIGN KEY] dari 'forename.ctd_account'

Contoh:
speeching: What
transpeech: Apa
communic_source: Inggris
communic_target: Indonesia
byname: Orang Bumi (Yang diambil terutama adalah pafa [forename], yakni nama depan-nya)
---

---
Sekitar [7] Halaman:
A1. [dashboard-first]
A2a. [register]
A2b. [login]

B1. [dashboard]
B2. [user]
B3a. [translate]
B3b. [profile]
---
