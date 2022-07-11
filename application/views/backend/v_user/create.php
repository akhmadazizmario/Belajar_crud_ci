<?php echo $judul . '<small> >> ' . $sub . '</small><br><br>' ?>
<!--Form-->
<form method="post" action="<?= site_url('User/create') ?>">

  <label>Kode</label>
  <?= form_error('kd_user', '<small class="text-danger">', '</small>'); ?><br>
  <input type="text" class="form-control" name="kd_user" value="<?= set_value('kd_user') ?>" placeholder="Masukkan Kode User">
  <p></p>

  <label>Nama</label>
  <?= form_error('nm_user', '<small class="text-danger">', '</small>'); ?><br>
  <input type="text" class="form-control" name="nm_user" value="<?= set_value('nm_user') ?>" placeholder="Masukkan Nama User">
  <p></p>

  <label>HP</label>
  <?= form_error('hp_user', '<small class="text-danger">', '</small>'); ?><br>
  <input type="text" class="form-control" name="hp_user" value="<?= set_value('hp_user') ?>" placeholder="Masukkan Nomor HP">
  <p></p>

  <label>Email</label>
  <?= form_error('email_user', '<small class="text-danger">', '</small>'); ?><br>
  <input type="text" class="form-control" name="email_user" value="<?= set_value('email_user') ?>" placeholder="Masukkan Email User">
  <p></p>

  <label>Password</label>
  <?= form_error('password1', '<small class="text-danger">', '</small>'); ?><br>
  <input type="password" class="form-control" name="password1" placeholder="Masukkan Password" value="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninvalid="this.setCustomValidity('Password Harus Di Isi dan password terdiri dari 8 karakter, mengandung huruf BESAR, huruf kecil dan angka')" oninput="setCustomValidity('')">
  <p></p>

  <label>Konfirmasi Password</label>
  <?= form_error('password2', '<small class="text-danger">', '</small>'); ?><br>
  <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" value="">
  <p></p>

  <button type="submit" class="" style="background-color: blue;color:white;">Simpan</button>
  <a href="<?= site_url('User') ?>"><button type="button" class="" style="background-color: red;color:white;">Kembali</button></a>

</form>
<!--EndForm-->