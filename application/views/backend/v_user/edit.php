<?php echo $judul . '<small> >> ' . $sub . '</small><br><br>' ?>
<!--Form-->
<form method="post" action="<?= site_url('User/edit/' . $edit['kd_user']) ?>" enctype="multipart/form-data">

    <label>Kode</label>
    <?= form_error('kd_user', '<small class="text-danger">', '</small>'); ?><br>
    <input type="text" disabled class="form-control" name="kd_user" value="<?= $edit['kd_user'] ?>" placeholder="Masukkan Kode User">
    <p></p>

    <label>Nama</label>
    <?= form_error('nm_user', '<small class="text-danger">', '</small>'); ?><br>
    <input type="text" class="form-control" name="nm_user" value="<?= $edit['nm_user'] ?>" placeholder="Masukkan Nama User">
    <p></p>

    <label>HP</label>
    <?= form_error('hp_user', '<small class="text-danger">', '</small>'); ?><br>
    <input type="text" class="form-control" name="hp_user" value="<?= $edit['hp_user'] ?>" placeholder="Masukkan Nomor HP">
    <p></p>

    <img src="<?php echo base_url('assets/img_user/' . $edit['img_user']) ?>" width="300"><br>
    <label>Ganti Foto</label><br>
    <input type="file" name="img_user" class="">
    <p></p>


    <button type="submit" class="" style="background-color: blue;color:white;">Perbaharui</button>
    <a href="<?= site_url('User') ?>"><button type="button" class="" style="background-color: red;color:white;">Kembali</button></a>

</form>
<!--EndForm-->