<div class="input-field col s12 m6">
  <label for="nama" class="">Nama</label>
    <input class="form-control" id="nama" name="nama" type="text" required="required" value="<?php echo $this->session->userdata('nama'); ?>">

  <label for="alamat" class="">Alamat</label>
    <input class="form-control" id="alamat" name="alamat" type="text" required="required" value="<?php echo $this->session->userdata('alamat'); ?>">

  <label for="telp" class="">No. Telepon</label>
    <input class="form-control" id="telp" name="telp" type="number" required="required" value="<?php echo $this->session->userdata('telp'); ?>">

  <label for="email" class="">Email</label>
    <input class="form-control" id="email" name="email" type="text" required="required" value="<?php echo $this->session->userdata('email'); ?>">

  <label for="deskripsi" class="">Deskripsi Perusahaan</label>
    <input class="form-control" id="deskripsi" name="deskripsi" type="text" required="required" value="<?php echo $this->session->userdata('deskripsi'); ?>"></input>

<!--   <div>
    <label>Upload Avatar</label><br>
    <input type="file" name="avatar">
  </div> -->
  <!--
  <div class="file-path-wrapper">
    <input class="file-path validate" type="text">
  </div>
-->
  <button type="submit" name="submit-information" value="true" class="btn btn-primary">Simpan</button>
</div>  