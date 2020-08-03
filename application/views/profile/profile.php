<div class="row">
    <div class="container-fluid">
    <div class="card" style="margin-top: 10px">
      <div class="card-header light-blue lighten-1 white-text">
        <h1><center><?php echo $pageTitle; ?></center></h1>
      </div>
      <div class="card-body">
        <!-- <div class="row"> -->
          <div id="basic-tab" class="col s12">
            <?php if ($this->session->userdata('level') != 'Administrator'): ?>
            <?php if($message = $this->session->flashdata('message_profile')): ?>
                <div class="col s12">
                  <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                    <span class="white-text"><?php echo $message['message']; ?></span>
                  </div>
                </div>
              <?php endif; ?>  
            <h4 style="background-color: #054373; margin-right: 13px; margin-left: -15px; text-align: center; color: #fff;">Informasi Umum</h4>
            <?php endif?>
            <form class="row" id="basic-form" method="post" action="" style="margin-top: 20px;" enctype="multipart/form-data">
              <?php if(validation_errors()): ?>
                <div class="col s12">
                  <div class="card-panel red">
                    <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
                  </div>
                </div>
              <?php endif; ?>
              <?php if($this->session->userdata('level') == 'Pelamar') : ?>
                <?php $this->load->view('profile/profilePelamar') ?>
              <?php endif?>

              <?php if($this->session->userdata('level') == 'Perusahaan') : ?>
                <?php $this->load->view('profile/profilePerusahaan') ?>
              <?php endif?>
            </form>
          </div>
          <div id="avatar-tab" class="col s12">
              <h4 style="background-color: #054373; margin-right: 13px; margin-left: -15px; text-align: center; color: #fff;">Upload File</h4>
              <form class="col" id="avatar-form" method="post" action="" style="margin-top: 20px;" enctype="multipart/form-data">
               <?php if($message = $this->session->flashdata('message_avatar')): ?>
                <div class="col s12">
                  <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                    <span class="white-text"><?php echo $message['message']; ?></span>
                  </div>
                </div>
              <?php endif; ?>
              <div>
                <label>Upload Avatar</label><br>
                <input type="file" name="avatar"><br>
                <button type="submit" name="submit-avatar" value="true" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <?php if($this->session->userdata('level') == 'Pelamar') : ?>
            <div id="avatar-tab" class="col s12">
              <form class="col" id="avatar-form" method="post" action="" style="margin-top: 20px;" enctype="multipart/form-data">
                 <?php if($message = $this->session->flashdata('message_avatar')): ?>
                  <div class="col s12">
                    <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                      <span class="white-text"><?php echo $message['message']; ?></span>
                    </div>
                  </div>
                <?php endif; ?>
                <div>
                  <label>Upload CV</label><br>
                  <input type="file" name="CV"><br>
                  <button type="submit" name="submit-CV" value="true" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          <?php endif; ?>
         <div id="password-tab" class="col s12">
            <form class="row" id="password-form" method="post" action="" style="margin-top: 20px;">
              <?php if(validation_errors()): ?>
                <div class="col s12">
                  <div class="card-panel red">
                    <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
                  </div>
                </div>
              <?php endif; ?>
              <?php if($message = $this->session->flashdata('message_password')): ?>
                <div class="col s12">
                  <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                    <span class="white-text"><?php echo $message['message']; ?></span>
                  </div>
                </div>
              <?php endif; ?>
              <div class="input-field col s12">
                  <h4 style="background-color: #054373; margin-right: 13px; margin-left: -15px; text-align: center; color: #fff;">Ubah Password</h4>
                  <label for="password_lama" class="">Password Lama</label>
                    <input class="form-control" id="password_lama" name="password_lama" type="password">

                  <label for="password_baru" class="">Password Baru</label>
                    <input class="form-control" id="password_baru" name="password_baru" type="password">

                  <label for="konfirmasi_password" class="">Konfirmasi Password</label>
                    <input class="form-control" id="konfirmasi_password" name="konfirmasi_password" type="password">

                  <button type="submit" name="submit-password" value="true" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>

