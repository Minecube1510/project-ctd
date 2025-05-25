<?php
/* law-query.php */


/* Koding inisialis tambahan */
$none = ('');
$spasi = (' ');
$def_blank = ('?');
$konek_komaspc = (', ');
$in_val = ("', '");
///
$nodesc_ing = ("?");
///
$next = ('INTO');
$val = ('VALUES');
$dri = ('FROM');
$doko = ('WHERE');
$set = ('SET');
///
$tabled = ('nama_tabel');
$coltab = [('nama'), ('tabel'), ('yang'), ('ada')];
///
$choose_at = [('coltab'), ('='), ('1')];
$form_chooseat = implode(($spasi), ($choose_at));
///
$tabcol_val = [('semua'), ('nilai'), ('yang'), ('tersedia')];
$in_valtab = (implode(($in_val), ($tabcol_val)));
/* Koding inisialis tambahan */


/* Ini adalah rumusan sederhana untuk nge-query CRUD */
/* [CREATE] */
// INSERT INTO users (name, email) VALUES ('Orang', 'bumi@bulan.com'); //
$create_need = ('INSERT');
$create_for = implode(($spasi), [$create_need, ($next)]);
///
$tabled = ('nama_tabel');
///
$coltab = [('nama'), ('tabel'), ('yang'), ('ada')];
$intable = implode(($konek_komaspc), ($coltab));
$form_intable = implode(($none), [('('), ($intable), (')')]);
///
$create_law = [($create_for), ($tabled), ($form_intable)];
$def_create = join(($spasi), ($create_law));
///
$form_invaltab = [("('"), ($in_valtab), ("')")];
$struct_invaltab = implode(($none), ($form_invaltab));
$compform_invaltab = implode(($spasi), [($val), ($struct_invaltab)]);
///
$create_all_order = join(($spasi), [($def_create), ($compform_invaltab)]);  /// Disini sudah lengkap
// Mendatang... //
// Mendatang... //
// Mendatang... //
/* [CREATE] */
///
/* [READ] */
// SELECT * FROM users; -- Mengambil semua data //
// SELECT name, email FROM users WHERE id = 1; -- Mengambil data spesifik //
$read_need = ('SELECT');
///
$read_all = [($read_need), ('*'), ($dri)];
$read_at = [($read_need), ($intable), ($dri)];
///
$def_readall = implode(($spasi), ($read_all));
$def_readat = implode(($spasi), ($read_at));
///
$form_readall = implode(($spasi), [($def_readall)]);
$form_readat = implode(($spasi), [($def_readat)]);
///
$db_account = ('datbes');
$read_comall = [($form_readall), ($db_account)];
$read_comat = [($form_readat), ($db_account), ($doko)];
///
$read_all_order = implode(($spasi), ($read_comall));  /// Disini sudah lengkap
///
$formread_comat = implode(($spasi), ($read_comat));
$formread_comtoat = [($formread_comat), ($form_chooseat)];
$read_at_order = implode(($spasi), ($formread_comtoat));  /// Disini sudah lengkap
/* [READ] */
///
///echo ($read_all_order);
///echo ("\n");
///echo ($read_at_order);

/* [UPDATE] */
// UPDATE users SET email = 'budi.updated@example.com' WHERE id = 1; //
$update_need = ('UPDATE');
$def_update = [($update_need), ($tabled), ($set)];
$strudef_update = implode(($spasi), ($def_update));
///
$contoh_set = [('koltep'), ('='), ('9')];
$form_atset = implode(($spasi), ($contoh_set));
$pointing_set = [($doko), ($form_chooseat)];
$change_setpoint = implode(($spasi), ($pointing_set));
///
$update_comdef = [($strudef_update), ($form_atset) , ($change_setpoint)];
$update_order = implode(($spasi), ($update_comdef));  /// Disini sudah lengkap
/* [UPDATE] */

/* [DELETE] */
// DELETE FROM users WHERE id = 1; //
$delete_need = ('DELETE');
$def_delete = implode(($spasi), [($delete_need), ($dri)]);
///
$defdel = [($def_delete), ($tabled)];
$struct_defdel = implode(($spasi), ($defdel));
///
$delete_form = [($struct_defdel), ($doko), ($form_chooseat)];
$delete_order = implode(($spasi), ($delete_form));  /// Disini sudah lengkap
/* [DELETE] */
//

?>


<!--[?]-->

