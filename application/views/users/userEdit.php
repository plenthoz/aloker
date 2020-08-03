<div class="row">
    <div class="container-fluid">
    <div class="card" style="margin-top: 10px">
      <div class="card-header light-blue lighten-1 white-text">
        <h3><center><?php echo $pageTitle; ?></center></h3>
      </div>
      <div class="card-body">
        <form class="row" id="edit-user-form" method="post" action="">
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
              <input class="form-control" id="username" disabled name="username" type="text" value="<?php echo $user->username; ?>">

              <label for="password" class="">Password</label>
              <input class="form-control" id="password" name="password" type="password" value="">

              <label>Pilih Level</label>
              <select class="form-control" id="level" name="level">
                  <option <?php echo ($user->level === 'Administrator') ? 'selected' : ''; ?> value="administrator">Administrator</option>
                  <option <?php echo ($user->level === 'Perusahaan') ? 'selected' : ''; ?> value="Perusahaan">Perusahaan</option>
                  <option <?php echo ($user->level === 'Pelamar') ? 'selected' : ''; ?> value="Pelamar">Pelamar</option>
              </select>

              <label>Active</label>
              <select class="form-control" id="active" name="active">
                  <option <?php echo ($user->active === '0') ? 'selected' : ''; ?> value="0">Tidak</option>
                  <option <?php echo ($user->active === '1') ? 'selected' : ''; ?> value="1">Ya</option>
              </select>
              
              <button type="submit" name="submit" value="<?php echo $user->id; ?>" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>