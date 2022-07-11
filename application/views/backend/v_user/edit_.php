<?php echo $judul . '<small> >> ' . $sub . '</small><br><br>' ?>
<!--Form-->
<form method="post" action="<?php echo site_url('admin/update/' . $edit['kd_admin']) ?>">

  <label>Kode Admin</label><br>
  <input type="text" class="" disabled name="kd_admin" placeholder="Masukan Nama admin" value="<?php echo $edit['kd_admin'] ?>" required oninvalid="this.setCustomValidity('Kode admin Harus Di Isi')" oninput="setCustomValidity('')">
  <p></p>

  <label>Nama</label><br>
  <input type="text" class="" name="nama_admin" placeholder="Masukan Nama admin" value="<?= $edit['email_user'] ?>" required oninvalid="this.setCustomValidity('Nama admin Harus Di Isi')" oninput="setCustomValidity('')">
  <p></p>

  <label>HP</label><br>
  <input type="text" class="" name="hp_admin" placeholder="Masukan HP admin" value="<?php echo $edit['hp_admin'] ?>" required oninvalid="this.setCustomValidity('HP admin Harus Di Isi')" oninput="setCustomValidity('')">
  <p></p>

  <label>Email</label><br>
  <input type="text" class="" name="email_admin" placeholder="Masukan Email admin" value="<?php echo $edit['email_admin'] ?>" required oninvalid="this.setCustomValidity('Email admin Harus Di Isi')" oninput="setCustomValidity('')">
  <p></p>

  <button class="" type="submit" style="background-color: blue;color:white;">Perbaharui</button>
  <a href="<?php echo site_url('admin') ?>" title="Kembali"><button class="" type="button" style="background-color: red;color:white;">Batal</button></a>

</form>
<!--EndForm-->