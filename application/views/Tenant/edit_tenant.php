
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Tenant Page</h1>
	<a href="<?=base_url();?>add-tenant" class="d-none d-md-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add </a>
</div>

<!-- Content Row -->
<div class="row">




	<div class="col-sm-6  " style="margin: 0 auto; ">

		<div class="card ">

			<div class="card-header">
				<h4>Edit Tenant  </h4>
			</div>

			<div class="card-body ">

				<?php echo form_open_multipart('Tenant_Controller/updateInfo'); ?>
				<input type="hidden" name="id" value="<?= $data->id ?>">

				<div class="form-group row">
					<label for="name" class="col-sm-3"> Name </label>
					<div class="col-sm-9">
						<?php echo form_input(['name'=>'name','class'=>'form-control','value'=>set_value('name',$data->name)]); ?>
						<?php echo form_error('name','<div class="text-danger">', '</div>' );?>
					</div>
				</div>

				<div class="form-group row">
					<label for="cat_name" class="col-sm-3">Parment Address </label>
					<div class="col-sm-9">
						<?php echo form_input(['name'=>'p_address','class'=>'form-control','value'=>set_value('p_address', $data->p_address)]); ?>
						<?php echo form_error('p_address','<div class="text-danger">', '</div>');?>
					</div>
				</div>


				<div class="form-group row">
					<label for="cat_name" class="col-sm-3 control-label"> Gender </label>
					<div class="col-sm-9">
						<select name="gender" class="form-control" >
							<option >--Select--</option>
							<option value="Male" <?= $data->gender=="Male"?"selected":""; ?>>Male</option>
							<option value="Female" <?= $data->gender=="Female"?"selected":""; ?>>Female</option>
						</select>
						<?php echo form_error('gender','<div class="text-danger">', '</div>' );?>
					</div>
				</div>



				<div class="form-group row">
					<label for="cat_name" class="col-sm-3">Contact</label>
					<div class="col-sm-9">
						<?php echo form_input(['name'=>'contact','class'=>'form-control','value'=>set_value('contact',$data->contact)]); ?>
						<?php echo form_error('contact','<div class="text-danger">', '</div>');?>
					</div>
				</div>



				<div class="form-group row">
					<label for="cat_name" class="col-sm-3">NID </label>
					<div class="col-sm-9">
						<?php echo form_input(['name'=>'nid','class'=>'form-control','value'=>set_value('nid',$data->nid)]); ?>
						<?php echo form_error('nid','<div class="text-danger">', '</div>');?>
					</div>
				</div>



				<div class="form-group row">
					<label for="cat_name" class="col-sm-3">Amount </label>
					<div class="col-sm-9">
						<?php echo form_input(['name'=>'amount','class'=>'form-control','value'=>set_value('amount',$data->amount)]); ?>
						<?php echo form_error('amount','<div class="text-danger">', '</div>');?>
					</div>
				</div>




				<div class="form-group row">
					<label for="cat_name" class="col-sm-3"> Rent </label>
					<div class="col-sm-9">
						<?php echo form_input(['name'=>'rent','class'=>'form-control','value'=>set_value('rent',$data->rent)]); ?>
						<?php echo form_error('rent','<div class="text-danger">', '</div>' );?>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-md-3"> Status </label>
					<div class="col-md-9">
						<label><input type="radio"  name="status" <?= $data->status==1?'checked':'';?> value="1"> Active</label>
						<label><input type="radio"  name="status" <?= $data->status==0?'checked':'';?> value="0"> Deactive</label>
					</div>
				</div>
				

				<div class="form-group row">
					<label  class="col-sm-3"></label>
					<div class="col-sm-9">
						<button type="submit" class="btn btn-success btn-block">Update info</button>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>

	</div>

</div>
<!-- /.container-fluid -->
