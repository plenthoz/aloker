<div class="row">
    <div class="container-fluid">
    <div class="card" style="margin-top: 10px">
      <div class="card-header light-blue lighten-1 white-text">
        <h3><center><?php echo $pageTitle; ?></center></h3>
      </div>
      <div class="card-body">
        <form class="row" id="add-user-form" method="post" action="">
          <?php if(validation_errors()): ?>
            <div class="col s12">
              <div class="card-panel red">
                <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
              </div>
            </div>
          <?php endif; ?>
          <?php if($message = $this->session->flashdata('message')): ?>
            

            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <div class="input-field col s12 m6">
            <label for="username" class="">Username</label>
              <input class="form-control" id="username" name="username" type="text" value="<?php echo set_value('username'); ?>">
            <label for="password" class="">Password</label>
              <input class="form-control" id="password" name="password" type="password" value="<?php echo set_value('password'); ?>">
            <label for="nama_perusahaan" class="">Nama</label>
              <input class="form-control" id="nama" name="nama" type="text" value="<?php echo set_value('nama'); ?>">
            <label for="contact" class="">Contact</label>
              <input class="form-control" id="contact" name="contact" type="text" value="<?php echo set_value('contact'); ?>">
            <label>Pilih Level</label>
              <select class="form-control" id="level" name="level">
                <option value="Administrator">Administrator</option>
                <option value="Perusahaan">Perusahaan</option>
                <option value="Pelamar">Pelamar</option>
              </select>
            <label>Active</label>
              <select class="form-control" id="active" name="active">
                  <option value="0">Tidak</option>
                  <option value="1">Ya</option>
              </select>
            <button type="submit" name="submit" value="add_user" class="btn btn-primary" data-target="#popup-status">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>