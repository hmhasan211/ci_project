<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Tenant Page</h1>
	<a href="<?=base_url();?>add-house" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add </a>
</div>

<!-- Content Row -->
<div class="row">
	<div class="col-sm-6 col-sm-offset-3" style="margin: 0 auto; ">
		<?php if ($this->session->flashdata('msg')) echo $this->session->flashdata('msg');  ?>
		<div class="card ">

			<div class="card-header">
				<h4> Houses  </h4><hr/>
			</div>

			<div class="card-body ">
				<table class="table table-bordered table-striped text-center">
					<tr class="text-center">
						<th>Sl.</th>
						<th> House No</th>
						<th>Action</th>
					</tr>

					<?php if($data){ foreach ($data as $i=>$d){ ?>
						<tr>
							<td><?= $i+1 ?></td>
							<td><?= $d->name ?></td>
							<td>
								<a href="<?=base_url()?>edit-house/<?= $d->id ?>" class="btn btn-success btn-xs" title="Edit">
									Edit
								</a>

								<a href="<?=base_url()?>House_Controller/deleteInfo/<?= $d->id ?>" onClick="return confirm('Are sure want to delete?') "; class="btn btn-danger btn-xs" title="Delete">
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
