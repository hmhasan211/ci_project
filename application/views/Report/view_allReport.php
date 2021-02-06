

<!-- Content Row -->
<div class="row">
	<div class="col-sm-12" style="margin: 0 auto; ">
<!-- 		<?php if ($this->session->flashdata('msg')) echo $this->session->flashdata('msg');  ?>
 -->		<div class="card ">

			<div class="card-header">
				<h4> Tenants Report  </h4> <hr>
			</div>

			<div class="card-body ">
				<table class="table table-bordered table-striped text-center">
					<tr class="text-center">
						<th>Sl.</th>
						<th>Tenant Name</th>
						<th>Address</th>
						<th>Contact</th>
						<th>House No.</th>
						<th>Type</th>
						<th>Action</th>
					</tr>

					<?php foreach($data as $i=>$d){ ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><?= $d->name; ?></td>
							<td><?= $d->p_address; ?></td>
							<td><?= $d->contact; ?></td>
							<td><?= $d->room; ?></td>
							<td><?= $d->type; ?></td>
							<td>
								<a href="<?=base_url()?>Report_Controller/details/<?= $d->id ?>" class="btn btn-outline-info btn-xs" title="Edit">
									Details
								</a>

							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- /.container-fluid -->
