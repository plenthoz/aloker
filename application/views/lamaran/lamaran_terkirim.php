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
              <th>Contact Perusahaan</th>
              <th>Alamat Perusahaan</th>
              <th>Status</th>
              <!-- <th>Action</th> -->
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($result as $row){?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->posisi; ?></td>
            <td><?php echo $row->contact; ?></td>
            <td><?php echo $row->alamat; ?></td>
            <td><?php echo $row->status; ?></td>
            <!-- <td>
              <a href="<?php echo base_url('Lamaran/detail/'.$row->id_lamaran); ?>" class="btn btn-success btn-sm">Detail</a>
              <a href="<?php echo base_url('Lamaran/print/' .$row->id_lamaran); ?>" class="btn btn-danger btn-sm">Print</a>
            </td> -->
          </tr>
            <?php $no++; }?>
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>