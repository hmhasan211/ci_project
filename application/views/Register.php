<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>College Management</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
  <script src="<?php echo base_url('assets/js/jquery-3.2.1.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>

</head>
<body>
<div class="container-fluid" >
  <div class="container">
    <div class="row">
        <div class="col-sm-6  " style="margin: 0 auto; margin-top: 50px;">

          <div class="card ">

            <div class="card-header">
              <h4>Admin Registration  </h4>
            </div>

            <div class="card-body ">
            <?php if ($msg = $this->session->flashdata('message')):  ?>
              <div class=" alert alert-success alert-dissmissible">
                <?php echo $msg; ?>
              </div>
            <?php endif; ?>


              <?php echo form_open("Auth_Controller/adminSignUP") ?>


                <div class="form-group row">
                  <label for="cat_name" class="col-sm-3">First Name </label>
                  <div class="col-sm-9">
                    <?php echo form_input(['name'=>'f_name','class'=>'form-control','value'=>set_value('f_name')]); ?>
                    <?php echo form_error('f_name','<div class="text-danger">', '</div>' );?>
                  </div>
                </div>


                <div class="form-group row">
                  <label for="cat_name" class="col-sm-3">Last Name </label>
                  <div class="col-sm-9">
                    <?php echo form_input(['name'=>'l_name','class'=>'form-control','value'=>set_value('l_name')]); ?>
                    <?php echo form_error('l_name','<div class="text-danger">', '</div>' );?>
                  </div>
                </div>


                <div class="form-group row">
                  <label for="cat_name" class="col-sm-3">Username </label>
                  <div class="col-sm-9">
                    <?php echo form_input(['name'=>'username','class'=>'form-control','value'=>set_value('username')]); ?>
                    <?php echo form_error('username','<div class="text-danger">', '</div>' );?>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="cat_name" class="col-sm-3">Email </label>
                  <div class="col-sm-9">
                    <?php echo form_input(['name'=>'email','class'=>'form-control','value'=>set_value('email')]); ?>
                    <?php echo form_error('email','<div class="text-danger">', '</div>');?>
                  </div>
                </div>
             

              <div class="form-group row">
                <label for="cat_name" class="col-sm-3">Password </label>
                <div class="col-sm-9">
                  <?php echo form_password(['name'=>'password','class'=>'form-control']); ?>
                  <?php echo form_error('password','<div class="text-danger">', '</div>' );?>
                </div>
              </div>

             



                <div class="form-group row">
                  <label  class="col-sm-3"></label>
                  <div class="col-sm-6">
                    <button type="submit"  class="btn badge-success btn-block">Register</button>
                  </div>
                  <div class="col-sm-3">
                    <?= anchor('Auth_Controller','Back',['class'=>'btn btn-primary']) ?>
                  </div>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</body>
</html>

