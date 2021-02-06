<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<!-- <h1 class="h3 mb-0 text-gray-800"> Rents</h1> -->
	
</div>

<!-- Content Row -->
<div class="row">
	<div class="col-sm-12" style="margin: 0 auto; ">
		<?php if ($this->session->flashdata('msg')) echo $this->session->flashdata('msg');  ?>
		<div class="card ">

			<div class="card-header">
				<h4> Payments  </h4> <hr>
			</div>

			<div class="card-body ">
				<table class="table table-bordered table-striped text-center">
					<tr class="text-center">
						<th>Sl.</th>
						<th>Tenant name</th>
						<th>House No</th>
						<th>Tpye</th>
						<th>Month</th>
						<th>Year</th>
						<th>Rent</th>
						<th>Electric bill </th>
						<th>Gass bill</th>
						<th>Status</th>
					</tr>

					<?php foreach ($rslts as $i=>$rslt) {?>
						<tr>
							<td><?= $i+1; ?></td>
							<td><?= $rslt->name; ?></td>
							<td><?= $rslt->room; ?></td>
							<td><?= $rslt->type; ?></td>
							<td><?= $rslt->month; ?></td>
							<td><?= $rslt->year; ?></td>
							<td><?= $rslt->rent; ?></td>
							<td><?= $rslt->elc_bill; ?></td>
							<td><?= $rslt->gass_bill; ?></td>
							<td>
								<?php if($rslt->status==1){?>
									<a href="<?=base_url()?>payment_Controller/updst/<?= $rslt->id ?>/0" class="btn btn-success btn-xs" title="Edit">
										Paid
									</a>
								<?php }else{?>
									<a href="<?=base_url()?>payment_Controller/updst/<?= $rslt->id ?>/1" class="btn btn-danger btn-xs" title="Edit">
										Not Paid
									</a>
								<?php } ?>
							</td>
						</tr>
					<?php } ?>
				
				</table>
			</div>
		</div>
	</div>
</div>

<!-- /.container-fluid -->
