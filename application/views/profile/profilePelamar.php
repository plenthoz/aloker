<div class="input-field col s12 m6">
  <!-- <h4>Informasi Umum</h4> -->
  <label for="nama" class="">Nama</label>
    <input class="form-control" id="nama" name="nama" type="text" required="required" value="<?php echo $this->session->userdata('nama'); ?>">

  <label for="alamat" class="">Alamat</label>
    <input class="form-control" id="alamat" name="alamat" type="text" required="required" value="<?php echo $this->session->userdata('alamat'); ?>">

  <label for="telp" class="">No. Telepon</label>
    <input class="form-control" id="telp" name="telp" type="number" required="required" value="<?php echo $this->session->userdata('telp'); ?>">

  <label for="email" class="">Email</label>
    <input class="form-control" id="email" name="email" type="text" required="required" value="<?php echo $this->session->userdata('email'); ?>">

</div>
<div class="input-field col s12 m6">
  <label for="nik" class="">NIK</label>
    <input class="form-control" id="nik" name="nik" type="text" required="required" value="<?php echo $this->session->userdata('nik'); ?>">
  <label for="ttl" class="">Tempat, Tanggal Lahir</label>
    <input class="form-control" id="ttl" name="ttl" type="text" required="required" value="<?php echo $this->session->userdata('ttl'); ?>">

  <label for="status" class="">Status</label>
    <input class="form-control" id="status" name="status" type="text" required="required" value="<?php echo $this->session->userdata('status'); ?>">

  <label for="pendidikan" class="">Pendidikan</label>
    <input class="form-control" id="pendidikan" name="pendidikan" type="text" required="required" value="<?php echo $this->session->userdata('pendidikan'); ?>">

  <button type="submit" name="submit-information" value="true" class="btn btn-primary">Simpan</button>
</div>
