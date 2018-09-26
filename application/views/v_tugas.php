<center><a href="#tambah" data-toggle="modal" class="btn btn-warning">Tambah Tugas</a></center>
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td>No</td>
			<td>Nama Mapel</td>
			<td>Tugas</td>
			<td>Deadline</td>
			<td>Status</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody> 
		<?php
		$no=1;
			foreach ($tugas as $data) {
				if($data->status == 'Tuntas'){


		?>
		<tr>
			<td><strike><?= $no++ ?></strike></td>
			<td><strike><?= $data->nama?></strike></td>
			<td><strike><?= $data->tugas?></strike></td>
			<td><strike><?= $data->deadline?></strike></td>
			<td><strike><?= $data->status?></strike></td>
			<td>
				<button class="btn btn-success"><a href="<?= base_url('tugas/asDone/'.$data->id_tugas)?>">Tandai Selesai</a></button>
				<button class="btn btn-warning"><a href="">Edit</a></button> 
				<button class="btn btn-danger"><a href="<?= base_url('tugas/deleteTugas/'.$data->id_tugas)?>" onclick="return confirm('Apakah anda yakin menghapus Pesanan?')">Hapus</a></button>
			</td>
		</tr>
		<?php
				}
				else{
		?>
			<tr>
			<td><?= $no++ ?></td>
			<td><?= $data->nama?></td>
			<td><?= $data->tugas?></td>
			<td><?= $data->deadline?></td>
			<td><?= $data->status?></td>
			<td>
				<button class="btn btn-success"><a href="<?= base_url('tugas/asDone/'.$data->id_tugas)?>" onclick="return confirm('Apakah anda yakin menandai sudah selesai ?')">Tandai Selesai</a></button> 
				<button class="btn btn-warning"><a href="#myModal<?=$data->id_tugas?>" data-toggle="modal">Edit</a></button> 
				<button class="btn btn-danger"><a href="<?= base_url('tugas/deleteTugas/'.$data->id_tugas)?>" onclick="return confirm('Apakah anda yakin menghapus tugas ?')">Hapus</a></button></td>
		</tr>

		<?php			
				}
			}
		?>
	</tbody>
</table>
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Tugas</h4>
      </div>
      <div class="modal-body">
       <form action="<?=base_url('tugas/addTugas')?>" method="post">
      	<table>
          <tr>
          	<td>Nama Mapel</td>
           <td>
            <select class="form-control" name="mapel">
            	<?php
            		foreach ($mapel as $pel) {
            	?>
            	<option value="<?= $pel->id_mapel ?>"><?= $pel->nama ?></option>
            	<?php
            		}
            	?>
            </select>
           </td>
          </tr>
      	  <tr>
      		<td>Tugas</td><td><input type="text" name="tugas" required class="form-control"></td>
      	  </tr>
      	  <tr>
            <td>Deadline</td><td><input type="date" name="deadline" required class="form-control"></td>
          </tr>
      	</table>
      	<input type="submit" name="tambah" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php

	foreach ($tugas as $no) {
?>
<div class="modal fade" id="myModal<?= $no->id_tugas?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        	<h4 class="modal-title" id="myModalLabel">Edit Tugas</h4>
      	</div>
      	<div class="modal-body">
       		<form method="post" action="<?= base_url('tugas/editTugas/'.$no->id_tugas)?>">
       			<table>
			        <tr>
			          	<td>Nama Mapel</td>
				        <td>
				            <select class="form-control" name="mapel">
				            	<?php
				            		foreach ($mapel as $pel) {
				            	?>
				            	<option value="<?= $pel->id_mapel ?>"><?= $pel->nama ?></option>
				            	<?php
				            		}
				            	?>
				            </select>
				        </td>
			        </tr>
			      	<tr>
			      		<td>Tugas</td><td><input type="text" name="tugas" required class="form-control" value="<?= $no->tugas?>"></td>
			      	</tr>
			      	<tr>
			        	<td>Deadline</td><td><input type="date" name="deadline" required class="form-control" value="<?= $no->deadline?>"></td>
			        </tr>
      			</table>
      			<input type="submit" value="Simpan" class="btn btn-success" name="">
       		</form>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      	</div>
    	</div>
  	</div>
</div>
<?php
	}
?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable();
  });
</script>