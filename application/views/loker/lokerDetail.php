<div class="row">
    <div class="container-fluid">
    <div class="card" style="margin-top: 10px">
      <div class="card-header light-blue lighten-1 white-text">
        <h3><center><?php echo $pageTitle; ?></center></h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="input-field col s12 m6">
              <label for="nama_perusahaan" class="">Nama Perusahaan</label>
              <input class="form-control" readonly id="nama_perusahaan" name="nama_perusahaan" type="text" value="<?php echo $loker->nama; ?>">

              <label for="contact" class="">Contact Person</label>
              <input class="form-control" readonly id="contact" name="contact" type="text" value="<?php echo $loker->contact; ?>">

              <label for="tanggal_berakhir" class="">Tanggal Berakhir</label>
              <input class="form-control" readonly id="tanggal_berakhir" name="tanggal_berakhir" type="text" value="<?php echo $loker->tanggal_berakhir; ?>">

              <label for="posisi" class="">Posisi</label>
              <input class="form-control" readonly id="posisi" name="posisi" type="text" value="<?php echo $loker->posisi; ?>">
          </div>
          <div class="col s12 m12">
              <label for="deskripsi">Deskripsi</label>
              <?php echo $loker->deskripsi; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>