<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tenant Management</title>
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
              <h4>Admin Login  </h4>
            </div>

            <div class="card-body ">
            <?php if ($msg = $this->session->flashdata('message')):  ?>
              <div class=" alert alert-success alert-dissmissible">
                <?php echo $msg; ?>
              </div>
            <?php endif; ?>

              <?php echo form_open("Auth_Controller/adminLogin") ?>


                <div class="form-group row">
                  <label for="cat_name" class="col-sm-4">Email </label>
                  <div class="col-sm-8">
                    <?php echo form_input(['name'=>'email','class'=>'form-control','value'=>'hamidhasan66@gmail.com']); ?>
                    <?php echo form_error('email','<div class="text-danger">', '</div>');?>
                  </div>
                </div>
             

              <div class="form-group row">
                <label for="cat_name" class="col-sm-4">Password </label>
                <div class="col-sm-8">
                  <?php echo form_password(['name'=>'password','class'=>'form-control','value'=>'12345678']); ?>
                  <?php echo form_error('password','<div class="text-danger">', '</div>' );?>
                </div>
              </div>

             

                <div class="form-group row">
                  <label  class="col-sm-4"></label>
                  <div class="col-sm-8">
                    <button type="submit"  class="btn badge-success btn-block">LogIn</button>
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

