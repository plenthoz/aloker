<div class="row">
    <div class="container-fluid">
    <div class="card" style="margin-top: 10px">
        <div class="card-header light-blue lighten-1 white-text">
          <h1><center>Data Admin</center></h1>
        </div>
        <div class="card-body">
          <a href="<?php echo base_url('users/add'); ?>" class="btn btn-primary" data-tooltip="Tambah Data" style="margin-top: 0px">Tambah</a>
          <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <table class="table table-bordered" id="tabel-admin">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Level</th>
                      <th class="center-align">Active</th>
                      <th class="center-align">Last Login</th>
                      <th class="center-align">Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php if($users): ?>
                  <?php $no = 0; foreach($users as $row): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->username; ?></td>
                      <td><?php echo $row->level; ?></td>
                      <td class="center-align"><?php echo $row->active; ?></td>
                      <td class="center-align"><?php echo $row->last_login; ?></td>
                      <td class="center-align">
                        <a href="<?php echo base_url('users/edit/' . $row->id); ?>"  class='btn btn-sm btn-info' data-position="top" data-tooltip="Edit Data">Edit</a>
                        <a href="<?php echo base_url('users/delete/' . $row->id); ?>" class='btn btn-sm btn-danger' data-position="top" data-tooltip="Delete Data">Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td class="center-align" colspan="6">Belum ada data user</td>
                  </tr>
                <?php endif; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
