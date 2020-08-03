<div class="row">
	<div class="col s12">
		<div class="card" style="margin-top: 10px">
			<div class="card-header">
				<div class="card-content light-blue lighten-1 white-text">
					<h3><?php echo $pageTitle; ?></h3>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-bordered" border="1" id="dataTable" width="100%" cellspacing="0" >
						<!-- <tr>
							<th width="35%">ID Lamaran</th>
							<td><?php echo $detail->id_lamaran ?></td>
						</tr> -->
						<tr>
							<th width="35%">Nama</th>
							<td><?php echo $detail->nama_pelamar ?></td>
						</tr>
						<tr>
							<th>Nama Perusahaan</th>
							<td><?php echo $detail->nama ?></td>
						</tr>
						<tr>
							<th>NIK</th>
							<td><?php echo $detail->NIK ?></td>
						</tr>
						<tr>
							<th>Tempat, Tanggal Lahir</th>
							<td><?php echo $detail->ttl ?></td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td><?php echo $detail->alamat ?></td>
						</tr>
						<tr>
							<th>Status</th>
							<td><?php echo $detail->status ?></td>
						</tr>
						<tr>
							<th>Posisi</th>
							<td><?php echo $detail->posisi ?></td>
						</tr>
						<tr>
							<th>Email</th>
							<td><?php echo $detail->email ?></td>
						</tr>
						<!-- <tr>
							<th>Pas Foto</th>
							<td><a href="<?php echo base_url('assets/images/') . $this->session->userdata('level').'/'.$this->session->userdata('avatar'); ; ?>">foto.jpg</a></td>
						</tr> -->
						<tr>
							<th>CV</th>
							<td><a href="<?php echo base_url('assets/files/') .$detail->id_pelamar.'_pdf.pdf'; ; ?>">CV.pdf</a></td>
						</tr>
					</table>
					<form id="pilih-status" method="post" action="">
						<label>Pilih Aksi</label>
						<select class="form-control" id="status" name="status">
							<option value="Diterima" <?php echo ($detail->statuslamaran=="Diterima") ? ' selected="selected"' : '';?>>Diterima</option>;
							<option value="Ditolak" <?php echo ($detail->statuslamaran=="Ditolak") ? ' selected="selected"' : '';?>>Ditolak</option>;
						</select>
						<button type="submit" name="submit-aksi" value="true" class="btn btn-primary" data-target="#popup-status">OKE</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
