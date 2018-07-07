<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td>No</td>
			<td>Nama Mapel</td>
			<td>Tugas</td>
			<td>Deadline</td>
			<td>Status</td>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1;
			foreach ($tugas as $data) {

		?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $data->nama?></td>
			<td><?= $data->tugas?></td>
			<td><?= $data->deadline?></td>
			<td><?= $data->status?></td>
		</tr>
		<?php
				}
				
		?>
	</tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable();
  });
</script>