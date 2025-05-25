<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    if (!isset($_SESSION['userctd_name'])) {
        header("Location: /");
        exit;
    }
    $username_ctd = $_SESSION['userctd_name'];

    require('style-css/main-setup.php');
    require_once("security-settings/koneksi-db.php");
    $konek = db_connect();

    require('style-css/generate-title.php');
    $judul = ucwords(strtolower('Edit Profile'));
    $generaTitle = join($renketsu, [$judul, $app_name]);
    ?>
    <title><?php echo htmlspecialchars($generaTitle); ?></title>
    <style>
        main { margin: 0; padding-top: 7%; }
        .ngopas { width: max-content; pointer-events: auto; user-select: text; cursor: text; }
        .ngeblok { pointer-events: none; user-select: none; }
        .ngedit-pribadi { display: flex; flex-direction: row; align-items: center; margin: 2% auto; width: 100%; }
        .ngedit-pribadi label { flex: 1; text-align: right; margin-right: 10px; }
        .ngedit-pribadi input, .ngedit-pribadi textarea { flex: 2; width: auto; text-align: left; transition: 0.3s; }
        .isi-profilan { display: flex; flex-direction: column; justify-content: center; align-items: center; background: white; padding: 20px; width: 85%; gap: 15px; }
        .ubah-profil { display: flex; flex-direction: column; align-items: center; margin-bottom: 15px; width: 100%; justify-content: center; }
        .ubah-profil label { display: flex; width: 25%; font-size: 20px; font-weight: bold; margin-left: 1%; }
        .ubah-profil input, .ubah-profil textarea { flex: 2; width: 70%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; }
        .ngubah-profil { background-color: #007bff; color: #fff; display: flex; flex-direction: column; justify-content: center; width: 20%; padding: 10px 20px; margin: 0 auto; border: none; border-radius: 5px; font-size: 24px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .ngubah-profil:hover { background-color: #0056b3; color: #000; }
        .ngubah-profil:active { color: #fff; transform: scale(1.1); }
    </style>
</head>
<body>
<?php require('resource-asset/comp-header.php'); ?>

<header class="heading-con">
    <script>
        function bekMenu() { window.location.href = "../"; }
        function bekUser() { window.location.href = "user"; }
        function konfirmEdit() {
            if (!confirm("Are you sure editing this account?")) return false;

            let fields = ['name_edit', 'numb_edit', 'desc_edit', 'date_edit', 'mail_edit', 'pass_edit'];
            for (let id of fields) {
                if (!document.getElementById(id).value.trim()) {
                    alert("Fill 'em all!");
                    return false;
                }
            }
            return true;
        }
    </script>
    <h1 onclick="bekMenu()" class="start-comp" title="Back to the Dashboard" style="cursor: pointer;">
        <?php echo "Hello, " . htmlspecialchars($username_ctd) . "!"; ?>
    </h1>
    <div class="final-comp">
        <button class="butan" onclick="bekUser()">Back</button>
        <button class="butan" onclick="logOut()">Log Out</button>
    </div>
</header>

<main>
    <div class="konten">
        <h1 class="ngeblok">Change Profile</h1>
        <?php
        $get_email = $_GET['email'] ?? '';
        $sql_getall = "SELECT * FROM ctd_account WHERE email = ?";
        $show_alldata = $konek->prepare($sql_getall);
        $show_alldata->bind_param("s", $get_email);
        $show_alldata->execute();
        $alldata = $show_alldata->get_result();
        while ($letget = $alldata->fetch_assoc()):
            $format_date = date("Y-m-d", strtotime($letget['datebirth']));
            $morfix_phone = '+62 ' . substr(chunk_split($letget['nophone'], 4, '-'), 1);
            $def_descript = ucwords(strtolower('Add Your Desc'));
        ?>
        <div class="isi-profilan">
            <form action="security-settings/edit-profile" class="ubah-profil" method="get" onsubmit="return konfirmEdit()">
                <input type="hidden" name="initial_acc" value="<?php echo htmlspecialchars($letget['id_acc']); ?>">
                <input type="hidden" name="prev_username" value="<?php echo htmlspecialchars($letget['name']); ?>">
                <input type="hidden" name="prev_numphone" value="<?php echo htmlspecialchars($letget['nophone']); ?>">
                <input type="hidden" name="prev_descript" value="<?php echo htmlspecialchars($letget['user_desc']); ?>">
                <input type="hidden" name="prev_bdate" value="<?php echo $format_date; ?>">
                <input type="hidden" name="prev_email" value="<?php echo htmlspecialchars($letget['email']); ?>">
                <input type="hidden" name="prev_sandi" value="<?php echo htmlspecialchars($letget['password']); ?>">

                <div class="ngedit-pribadi"><label>Name Identity</label><input type="text" id="name_edit" name="name_edit" value="<?php echo htmlspecialchars($letget['name']); ?>" required></div>
                <div class="ngedit-pribadi"><label>Phone Number</label><input type="tel" id="numb_edit" name="numb_edit" value="<?php echo htmlspecialchars($letget['nophone']); ?>" placeholder="<?php echo $morfix_phone; ?>" required></div>
                <div class="ngedit-pribadi"><label>Description</label><textarea id="desc_edit" name="desc_edit" rows="8" required><?php echo htmlspecialchars($letget['user_desc']); ?></textarea></div>
                <div class="ngedit-pribadi"><label>Birth Date</label><input type="date" id="date_edit" name="date_edit" value="<?php echo $format_date; ?>" required></div>
                <div class="ngedit-pribadi"><label>Email</label><input type="email" id="mail_edit" name="mail_edit" value="<?php echo htmlspecialchars($letget['email']); ?>" required></div>
                <div class="ngedit-pribadi"><label>Password</label><input type="password" id="pass_edit" name="pass_edit" value="<?php echo htmlspecialchars($letget['password']); ?>" required></div>

                <button type="submit" class="ngubah-profil">Change</button>
            </form>
        </div>
        <?php endwhile; ?>
    </div>
</main>

<footer>
    <?php require('about.php'); ?>
</footer>
</body>
</html>
