<style type="text/css">

  .header-card a h6 {
   display: inline;
  }
  .print {
    display: inline;
    margin: 0;
    padding: 0;
    text-decoration: none;
  }
  .print {
    display: inline-block;
    text-decoration: none;
  }
  thead, tfoot{
    color: #000;
    font-weight: bold;
  }
  .header-card{
    padding: 0px;
  }
</style>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Order & Reparation <i class="fas fa-tools"></i></h1>
  <!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
  <hr>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="header-card col-md-0" style="float: left; width: 500px;">
        <button class="btn btn-dark" style="text-align: center;height: 33px"><h6 class="font-weight-bold center">+ New Reparation</h6></button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="print">
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px;">
              <i class="fas fa-print fa-sm fa-fw text-blue-400"> Print</i>
            </a>
            <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Export in:</div>
              <a class="dropdown-item" href="#"><i class="fa fa-fw fa-file-word"> Word</i></a>
              <a class="dropdown-item" href="#"><i class="fa fa-fw fa-file-pdf"> Pdf</i></a>
              <a class="dropdown-item" href="#"><i class="fa fa-fw fa-file-excel"> Excel</i></a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
      </div>
      
      <ul class="nav nav-tabs" style="float: right;">
        <li><a href="<?php echo base_url('admin/reparation') ;?>">Pending Repairs</a></li>
        <li class="active"><a href="#">Completed Repairs</a></li>
      </ul>
    </div>
    <div class="card-body">
      <div class="table-responsive" style="width: 100%;">
        <table class="table table-striped table-bordered" id="dataTable" width="50%" cellspacing="0" style="font-size: 13px;color: #000;">
          <thead>
            <tr>
              <th>Reparation Code</th>
              <th>Name</th>
              <th>IMEI</th>
              <th>Telephone</th>
              <th>Defect</th>
              <th>Model</th>
              <th>Opened At</th>
              <th>Status</th>
              <th>Assigned To</th>
              <th>Created By</th>
              <th>Last Modified</th>
              <th>Files Attached</th>
              <th>Grand Total</th>
              <th>Paid</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Reparation Code</th>
              <th>Name</th>
              <th>IMEI</th>
              <th>Telephone</th>
              <th>Defect</th>
              <th>Model</th>
              <th>Opened At</th>
              <th>Status</th>
              <th>Assigned To</th>
              <th>Created By</th>
              <th>Last Modified</th>
              <th>Files Attached</th>
              <th>Grand Total</th>
              <th>Paid</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <?php
            $test = '1'; 
            foreach ($reparation as $r) 
            {
              if ($test % 2 == 0){
                 $test1 ="even";
              }else{
                 $test1 = "odd";
              }
              if($r->r_status == "Done"){
          ?>
          <tbody>
            <?php
              if($test1 == 'odd'){
            ?>
            <tr  style="background-color: #fdfafa;">
              <td><?php echo $r->r_code?></td>
              <td><?php echo $r->r_name?></td>
              <td><?php echo $r->r_imei?></td>
              <td><?php echo $r->r_telephone?></td>
              <td><?php echo $r->r_defect?></td>
              <td><?php echo $r->r_model?></td>
              <td><?php echo $r->r_opened?></td>
              <td><button class="btn btn-success" style="width: 80px;height: 30px;font-size: 12px;"><?php echo $r->r_status?></button></td>
              <td><?php echo $r->r_assigned?></td>
              <td><?php echo $r->r_created?></td>
              <td><?php echo $r->r_lastmodified?></td>
              <td><?php echo $r->r_file?></td>
              <td><?php echo $r->r_total?></td>
              <td><?php echo $r->r_paid?></td>
              <td>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button class="btn btn-primary" style="font-size: 12px">Action</button>
                  </a>
                  <!-- <select class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                  </select> -->
                  <!-- <button class="dropdown-toggle btn btn-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 12px">Action</button> -->
                  <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Export in:</div>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-eye"> &nbsp;View</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-print"> &nbsp;&nbsp;Invoice</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-cloud"> &nbsp;View Attachments</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-clipboard"> &nbsp;View Log</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;View Payments</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;Add Payment</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-edit"> &nbsp;Edit</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-trash"> &nbsp;Delete</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-barcode"> &nbsp;Print Barcode</i></a>
                  </div>
                </div>
              </td>
            </tr>
            <?php
              }else{
            ?>
            <tr style="background-color: #e3e6f0;">
              <td><?php echo $r->r_code?></td>
              <td><?php echo $r->r_name?></td>
              <td><?php echo $r->r_imei?></td>
              <td><?php echo $r->r_telephone?></td>
              <td><?php echo $r->r_defect?></td>
              <td><?php echo $r->r_model?></td>
              <td><?php echo $r->r_opened?></td>
              <td><button class="btn btn-success" style="width: 80px;height: 30px;font-size: 12px;"><?php echo $r->r_status?></button></td>
              <td><?php echo $r->r_assigned?></td>
              <td><?php echo $r->r_created?></td>
              <td><?php echo $r->r_lastmodified?></td>
              <td><?php echo $r->r_file?></td>
              <td><?php echo $r->r_total?></td>
              <td><?php echo $r->r_paid?></td>
              <td>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button class="btn btn-primary" style="font-size: 12px">Action</button>
                  </a>
                  <!-- <select class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                  </select> -->
                  <!-- <button class="dropdown-toggle btn btn-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 12px">Action</button> -->
                  <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Export in:</div>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-eye"> &nbsp;View</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-print"> &nbsp;&nbsp;Invoice</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-cloud"> &nbsp;View Attachments</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-clipboard"> &nbsp;View Log</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;View Payments</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;Add Payment</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-edit"> &nbsp;Edit</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-trash"> &nbsp;Delete</i></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-fw fa-barcode"> &nbsp;Print Barcode</i></a>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
          <?php
                }
              }else{
                  echo ' ';
                }
              $test++;
            }
          ?>
        </table>
      </div>
    </div>
  </div>
</div>
