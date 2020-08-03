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
              <label for="posisi" class="">Posisi</label>
              <input class="form-control" id="posisi" name="posisi" type="text" value="<?php echo $loker->posisi; ?>">

              <label for="kategori" class="">Kategori</label>
              <input class="form-control" id="kategori" name="kategori" type="text" value="<?php echo $loker->kategori; ?>">

              <label for="tanggal_berakhir" class="">Tanggal Berakhir</label>
              <input class="form-control" id="tanggal_berakhir" class="datepicker" name="tanggal_berakhir" type="text" value="<?php echo $loker->tanggal_berakhir; ?>">

              <label for="deskripsi" class="">Deskripsi</label>
              <textarea class="texteditor" id="deskripsi" name="deskripsi" type="text"><?php echo $loker->deskripsi; ?></textarea>

              <button type="submit" name="submit" value="<?php echo $loker->id; ?>" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>