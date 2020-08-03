<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<table class="table table-bordered" border="1" id="dataTable" width="100%" cellspacing="0" data-nama="$detail->posisi">
			<tr>
				<th width="35%">Nama</th>
				<td><?php echo $detail->nama_pelamar ?></td>
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
			</table>
		<script type="text/javascript">
			window.print();
		</script>
	</body>
</html>
