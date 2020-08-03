<div class="row">
    <div class="container-fluid">
    <div class="card" style="margin-top: 10px">
        <div class="card-header light-blue lighten-1 white-text">
          <h1><center>Data Lowongan Kerja</center></h1>
        </div>
        <div class="card-body">
            <a href="<?php echo base_url('loker/add'); ?>" class="btn btn-primary" data-tooltip="Tambah Data" style="margin-top: 0px">Tambah</a>
          <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <table class="table table-bordered" id="tabel-loker" ">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Nama Perusahaan</th>
                      <th>Contact</th>
                      <th>Posisi</th>
                      <th class="center-align">Tgl. Berakhir</th>
                      <th class="center-align">Action</th>
                
                  </tr>
              </thead>
              <tbody>
                <?php if($loker): ?>
                  <?php $no = $this->uri->segment(3); foreach($loker as $row): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->nama; ?></td>
                      <td><?php echo $row->contact; ?></td>
                      <td><?php echo $row->posisi; ?></td>
                      <td class="center-align"><?php echo $row->tanggal_berakhir; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('loker/detail/' . $row->id); ?>" class='btn btn-sm btn-warning' data-position="top" data-tooltip="Detail">Detail</a>
                        <a href="<?php echo base_url('loker/edit/' . $row->id); ?>" class='btn btn-sm btn-info' data-position="top" data-tooltip="Edit Data">Edit</a>
                        <a href="<?php echo base_url('loker/delete/' . $row->id); ?>" class='btn btn-sm btn-danger' data-position="top" data-tooltip="Delete Data">Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td class="center-align" colspan="7">Belum ada data lowongan kerja</td>
                  </tr>
                <?php endif; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

