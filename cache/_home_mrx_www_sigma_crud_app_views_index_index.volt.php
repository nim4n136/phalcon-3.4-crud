<div class="row mt-4">
	<div class="col-12">
		<button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#exampleModal">Baru</button>

		<table class="table table-hover ">
			<thead>
				<tr>
					<th scope="col">Nama Lengkap</th>
					<th scope="col">Nama Panggilan</th>
					<th scope="col">Alamat Email</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($emp as $r) { ?>
				<tr>
					<td><?= $this->escaper->escapeHtml($r->fullname) ?></td>
					<td><?= $this->escaper->escapeHtml($r->nickname) ?></td>
					<td><?= $this->escaper->escapeHtml($r->email) ?></td>
					<td>
						<a href='#exampleModal' class='btn btn-info mr-1 btn-sm' id='editId' data-toggle='modal'
							data-id="<?= $r->id ?>">Edit</a>
						<a href='#deleteModal' class='btn btn-danger btn-sm' id='deleteId' data-toggle='modal'
							data-id="<?= $r->id ?>">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form</h4>
			</div>
			<div class="modal-body">
				<form id="frmEmployee">
					<div class="form-group">
						<label for="InputName">Nama Lengkap <span class="text-danger">*</span></label>
						<input type="hidden" id="id" name="id">
						<input type="text" class="form-control" id="fullname" name="InputName"
							placeholder="Masukkan Nama Lengkap">
					</div>
					<div class="form-group">
						<label for="InputNick">Nama Panggilan <span class="text-danger">*</span></label>
						<input type="email" class="form-control" id="nickname" name="InputNick"
							placeholder="Masukkan Nama Pangilan">
					</div>
					<div class="form-group">
						<label for="InputEmail">Alamat Email <span class="text-danger">*</span></label>
						<input type="email" class="form-control" id="email" name="InputEmail"
							placeholder="Masukkan Email">
					</div>

					<div class="form-group">
						<label for="InputEmail">Alamat Rumah <span class="text-danger">*</span></label>
						<textarea name="InputAddress" class="form-control" id="address" cols="30" rows="5"
							placeholder="Masukkan Alamat rumah"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="saveEmployee()" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="deleteModal" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Warning !</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id_d" name="id_d">
				<p>Kamu yakin ingin menghapusnya ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
				<button type="button" onclick="deleteEmployee()" class="btn btn-primary">Yups!</button>
			</div>
		</div>
	</div>
</div>