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

              <label for="tanggal_berakhir" class="">Tanggal Berakhir (Tahun-Bulan-Tanggal)</label>
              <input class="form-control" id="tanggal_berakhir" class="datepicker" name="tanggal_berakhir" type="text" value="<?php echo set_value('tanggal_berakhir'); ?>">

              <label for="posisi" class="">Posisi</label>
              <input class="form-control" id="posisi" name="posisi" type="text" value="<?php echo set_value('posisi'); ?>">

              <label for="kategori" class="">Kategori</label>
              <select class="form-control" id="kategori" name="kategori">
                <option value="Akuntansi/Keuangan">Akuntansi/Keuangan</option>
                <option value="Administrasi">Administrasi</option>
                <option value="Seni/Media/Komunikasi">Seni/Media/Komunikasi</option>
                <option value="Bangunan/Konstruksi">Bangunan/Konstruksi</option>
                <option value="Komputer/IT">Komputer/IT</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Teknik">Teknik</option>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Hotel/Restoran">Hotel/Restoran</option>
                <option value="Manufaktur">Manufaktur</option>
                <option value="Marketing">Marketing</option>
                <option value="Lainnya">Lainnya</option>
              </select>

              <label for="deskripsi">Deskripsi</label>
              <textarea class="texteditor" id="deskripsi" name="deskripsi" type="text" value="<?php echo set_value('deskripsi'); ?>"></textarea>

              <button type="submit" name="submit" value="add_event" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>