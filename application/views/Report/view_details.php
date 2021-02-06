<!-- Content Row -->
<div class="row">
  <div class="col-sm-12" style="margin: 0 auto; ">
    <div class="card ">

      <div class="card-header">
        <h4> <?= $data->name ?> Rent Report  </h4> <hr>
      </div>

      <div class="card-body ">
        <table class="table table-bordered table-striped text-center">
          <tr class="text-center">
            <th>Sl.</th>
            <th>Year</th>
            <th>Month</th>
            <th>Rent</th>
            <th>Elebill</th>
            <th>gas</th>
            <th>Status</th>
          </tr>

          <?php 
                $total=0;
                $paid=0;
                foreach($rents as $i=>$d){
                  $total+=$d->rent+$d->elc_bill+$d->gass_bill;
           ?>
            <tr>
              <td><?= ++$i; ?></td>
              <td><?= $d->year; ?></td>
              <td><?= $d->month; ?></td>
              <td><?= $d->rent; ?></td>
              <td><?= $d->elc_bill; ?></td>
              <td><?= $d->gass_bill; ?></td>
              <td>
                <?php if($d->status==1){ $paid+=$d->rent+$d->elc_bill+$d->gass_bill; ?>
                  Paid
                <?php }else{ ?>
                  Not Paid
                <?php } ?>

              </td>
            </tr>
          <?php } ?>
          <tr class="text-center">
            <th>Total:</th>
            <th class="text-primary"><?= $total ?>Tk</th>
            <th>Paid</th>
            <th class="text-success"><?= $paid ?>Tk</th>
            <th>Due</th>
            <th class="text-danger"><?= $total-$paid ?>Tk</th>
            <th></th>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- /.container-fluid -->