   <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <!--  <h1 class="h3 mb-0 text-gray-800">Add Tenant</h1> -->
            <div class="alert alert-warning">Please input valid information!!!</div>
            <a href="<?=base_url();?>rents" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Back</a>
          </div>

          <!-- Content Row -->
          <div class="row">
          
            


    <div class="col-sm-6  " style="margin: 0 auto; ">

      <div class="card ">

        <div class="card-header">
          <h4>Add Rent  </h4>
        </div>

        <div class="card-body ">
        <?php echo form_open('Rent_Controller/saveRent'); ?>

			<div class="form-group row">
				<label for="cat_name" class="col-sm-3 control-label"> Tenant name </label>
				<div class="col-sm-9">
					<select name="t_id" class="form-control" >
						<option >--Select--</option>
						<?php foreach($tenantNames as $tname): ?>
							<option value="<?=$tname->id; ?>"><?= $tname->name;?></option>
						<?php  endforeach; ?>
					</select>
					<?php echo form_error('t_id','<div class="text-danger">', '</div>' );?>
				</div>
			</div>


			<div class="form-group row">
				<label for="house_no" class="col-sm-3 control-label"> House No </label>
				<div class="col-sm-9">
					<select name="house_no" class="form-control" >
						<option >--Select--</option>
						<?php foreach($houses as $house){ ?>
							<option value="<?= $house->id; ?>"><?= $house->name; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('house_no','<div class="text-danger">', '</div>' );?>
				</div>
			</div>


          <div class="form-group row">
            <label for="cat_name" class="col-sm-3 control-label"> Type </label>
            <div class="col-sm-9">
              <select name="type" class="form-control" >
                <option >--Select--</option>
                <?php foreach($types as $type): ?>
                <option value="<?= $type->id; ?>"><?= $type->type; ?></option>
                <?php endforeach; ?>
              </select>
              <?php echo form_error('type','<div class="text-danger">', '</div>' );?>
            </div>
          </div>


			<div class="form-group row">
				<label for="cat_name" class="col-sm-3 control-label"> Month </label>
				<div class="col-sm-9">
					<select name="month" class="form-control" >
						<option >--Select--</option>
							<option value="Jan">January</option>
							<option value="Feb">February</option>
							<option value="Mar">March</option>
							<option value="Apr">April</option>
							<option value="May">May</option>
							<option value="Jun">June</option>
							<option value="Jul">July</option>
							<option value="Aug">August</option>
							<option value="Sep">September</option>
							<option value="Oct">October</option>
							<option value="Nov">November</option>
							<option value="Dec">December</option>
					</select>
					<?php echo form_error('t_id','<div class="text-danger">', '</div>' );?>
				</div>
			</div>



			<div class="form-group row">
            <label for="cat_name" class="col-sm-3">Year</label>
            <div class="col-sm-9">
              <?php echo form_input(['name'=>'year','class'=>'form-control','value'=>set_value('year')]); ?>
              <?php echo form_error('year','<div class="text-danger">', '</div>');?>
            </div>
          </div>




          <div class="form-group row">
            <label for="cat_name" class="col-sm-3"> Rent </label>
            <div class="col-sm-9">
              <?php echo form_input(['name'=>'rent','class'=>'form-control','value'=>set_value('rent')]); ?>
              <?php echo form_error('rent','<div class="text-danger">', '</div>' );?>
            </div>
          </div>

           <div class="form-group row">
            <label for="cat_name" class="col-sm-3"> Electric_bill </label>
            <div class="col-sm-9">
              <?php echo form_input(['name'=>'elc_bill','class'=>'form-control','value'=>set_value('elc_bill')]); ?>
              <?php echo form_error('elc_bill','<div class="text-danger">', '</div>' );?>
            </div>
          </div>

           <div class="form-group row">
            <label for="cat_name" class="col-sm-3"> Gas_bill </label>
            <div class="col-sm-9">
              <?php echo form_input(['name'=>'gass_bill','class'=>'form-control','value'=>set_value('gass_bill')]); ?>
              <?php echo form_error('gass_bill','<div class="text-danger">', '</div>' );?>
            </div>
          </div>

            <div class="form-group row">
        <label class="control-label col-md-3"> Status </label>
        <div class="col-md-9">
          <label><input type="radio"  name="status" value="1"> Active</label>
          <label><input type="radio"  name="status" checked value="0"> Deactive</label>
        </div>
      </div>



          <div class="form-group row">
            <label  class="col-sm-3"></label>
            <div class="col-sm-9">
              <button type="submit" class="btn btn-success btn-block">Save </button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>

    </div>


</div>
<!-- /.container-fluid -->
