<div class="row">
  <div class="container-fluid">
    <div class="card" style="margin-top: 10px">
      <div class="card-header light-blue lighten-1 white-text">
        <h1><center>List Lamaran</center></h1>
      </div>
      <div class="card-body">
        <?php if($message = $this->session->flashdata('message')): ?>
          <div class="col s12">
            <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
              <span class="white-text"><?php echo $message['message']; ?></span>
            </div>
          </div>
        <?php endif; ?>
        <table class="table table-bordered" id="tabel-lamaran">
          <thead>
            <tr>
              <th>No</th>
              <th>Perusahaan</th>
              <th>Posisi</th>
              <th>Nama</th>
              <th>TTL</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($result as $row){?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->posisi; ?></td>
            <td><?php echo $row->nama_pelamar; ?></td>
            <td><?php echo $row->ttl; ?></td>
            <td><?php echo $row->alamat; ?></td>
            <td>
              <a href="<?php echo base_url('lamaran/detail/'.$row->id_lamaran); ?>" class="'btn btn-sm btn-warning">Detail</a>
              <a href="<?php echo base_url('lamaran/print/' .$row->id_lamaran); ?>" class="btn btn-sm btn-secondary">Print</a>
            </td>
          </tr>
            <?php $no++; }?>
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>