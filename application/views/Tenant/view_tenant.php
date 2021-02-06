<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Tenant Page</h1>
	<a href="<?=base_url();?>add-tenant" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add </a>
</div>

<!-- Content Row -->
<div class="row">
	<div class="col-sm-12" style="margin: 0 auto; ">
		<?php if ($this->session->flashdata('msg')) echo $this->session->flashdata('msg');  ?>
		<div class="card ">

			<div class="card-header">
				<h4> Tenants  </h4> <hr>
			</div>

			<div class="card-body ">
				<table class="table table-bordered table-striped text-center">
					<tr class="text-center">
						<th>Sl.</th>
						<th> Name</th>
						<th>Permanent Address</th>
						<th>Contact</th>
						<th>Gender</th>
						<th>NID</th>
						<th>Amount </th>
						<th>Rent</th>
						<th>Status</th>
<!--						<th> Photo </th>-->
						<th>Action</th>
					</tr>

					<?php if($data){ foreach ($data as $i=>$d){ ?>
						<tr>
							<td><?= $i+1 ?></td>
							<td><?= $d->name ?></td>
							<td><?= $d->p_address ?></td>
							<td><?= $d->contact ?></td>
							<td><?= $d->gender ?></td>
							<td><?= $d->nid ?></td>
							<td><?= $d->amount ?></td>
							<td><?= $d->rent ?></td>
							<td><?= $d->status==1?"<btn class=\"btn btn-sm btn-success btn-circle-round \"></btn>":"<btn class=\"btn btn-sm btn-danger btn-round-circle\"></btn>"; ?></td>
							<td>

								<a href="<?=base_url()?>edit-tenant/<?= $d->id ?>" class="btn btn-success btn-xs" title="Edit">
									Edit
								</a>

								<a href="<?=base_url()?>Tenant_Controller/deleteInfo/<?= $d->id ?>" onClick="return confirm('Are sure want to delete?') "; class="btn btn-danger btn-xs" title="Delete">
									Delete
								</a>

							</td>
						</tr>
					<?php } ?>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- /.container-fluid -->
