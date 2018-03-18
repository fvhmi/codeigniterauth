	<h2>User List</h2>
    <hr>	
    <a class="btn btn-success" title="add" href="<?= base_url('user/add') ?>">
		<i class="ace-icon fa fa-plus"></i>
	</a>
	<br><br>

	<?php
	    if($this->session->flashdata('success')==TRUE):
		    echo'<div class="alert alert-success" role="alert">';
		    echo $this->session->flashdata('success');
		    echo "</div>";
	    endif;
    ?>

	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover" >
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody id="showdata">
				<?php 
					foreach ($users as $key => $user){
				?>
				<tr>
					<td><?= $user->id ?></td>
					<td><?= $user->nama ?></td>
					<td><?= $user->email ?></td>
					<td>
						<a class="btn btn-success" title="edit" href="<?= base_url('user/edit') ?>/<?= $user->id ?>">
							<i class="ace-icon fa fa-pencil-square-o"></i>
						</a>

						<button class="btn btn-info detail" title="detail" data-toggle="modal" data-target="#exampleModal" data="<?php echo $user->id ?>">
							<i class="ace-icon fa fa-info-circle"></i>
						</button>

						<a class="btn btn-danger" title="delete" href="<?= base_url('user/delete') ?>/<?= $user->id ?>">
							<i class="ace-icon fa fa-trash-o"></i>
						</a>
					</td>
				</tr>
				<?php 
					}
				?>
			</tbody>
		</table>
	</div>

	<style type="text/css">
		.modal-lg {
		    max-width: 80% !important;
		}
	</style>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table id="records_table" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama</th>
								<th>Email</th>
								<th>HP</th>
								<th>Alamat</th>
								<th>Hobi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td id="id"></td>
								<td id="nama"></td>
								<td id="email"></td>
								<td id="hp"></td>
								<td id="alamat"></td>
								<td id="hobi"></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$('#showdata').on('click', '.detail', function(){
	    var id = $(this).attr('data');
	    $('#exampleModal').modal('show');

	    $.ajax({
	        type: 'ajax',
	        method: 'get',
	        url: '<?= base_url() ?>user/getById',
	        data: {id: id},
	        dataType: 'json',
	        success: function(data){
	            document.getElementById("id").innerHTML = data.id;
	            document.getElementById("nama").innerHTML = data.nama;
	            document.getElementById("email").innerHTML = data.email;
	            document.getElementById("hp").innerHTML = data.hp;
	            document.getElementById("alamat").innerHTML = data.alamat;
	            document.getElementById("hobi").innerHTML = data.hobi;
	        },
	        error: function(){
	            alert('Could not displaying data');
	        }           
	    });
	});
	</script>