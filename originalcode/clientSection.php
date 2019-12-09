<style type="text/css">

  .navbar-findcond { background: #fff; border-color: #ccc; box-shadow: 0 0 2px 0 #ccc; }
.navbar-findcond a { color: #f14444; }
.navbar-findcond ul.navbar-nav a { color: #f14444; border-style: solid; border-width: 0 0 2px 0; border-color: #fff; }
.navbar-findcond ul.navbar-nav a:hover,
.navbar-findcond ul.navbar-nav a:visited,
.navbar-findcond ul.navbar-nav a:focus,
.navbar-findcond ul.navbar-nav a:active { background: #fff; }
.navbar-findcond ul.navbar-nav a:hover { border-color: #f14444; }
.navbar-findcond li.divider { background: #ccc; }
.navbar-findcond button.navbar-toggle { background: #f14444; border-radius: 2px; }
.navbar-findcond button.navbar-toggle:hover { background: #999; }
.navbar-findcond button.navbar-toggle > span.icon-bar { background: #fff; }
.navbar-findcond ul.dropdown-menu { border: 0; background: #fff; border-radius: 4px; margin: 4px 0; box-shadow: 0 0 4px 0 #ccc; }
.navbar-findcond ul.dropdown-menu > li > a { color: #444; }
.navbar-findcond ul.dropdown-menu > li > a:hover { background: #f14444; color: #fff; }
.navbar-findcond span.badge { background: #f14444; font-weight: normal; font-size: 11px; margin: 0 4px; }
.navbar-findcond span.badge.new { background: rgba(255, 0, 0, 0.8); color: #fff; }

thead, tfoot{
  color: #000;
  font-weight: bold;
}
.header-card{
  padding: 0px;
}
  .flex-reparation{
    display: flex;
    flex-flow: row;
    /*height: 400px;
    overflow-x: auto;*/
  }
  .flex-child{
    display: flex;
    flex-flow: row;
    /*height: 300px;*/
  }
  .flex-row{
    display: flex;
    flex-flow: row;
    flex-wrap: wrap;
  }
  .span-modal{
    height: 38px;
  }
  label{
    text-align: right;
  }
</style>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Customer</h1>
  <!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
  <hr>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="header-card col-md-3 py-2" style="float: left; width: 500px;">
        <button class="btn btn-dark" style="text-align: center;height: 33px" data-toggle="modal" data-target="#clientModal"><h6 class="font-weight-bold center">+ New Client</h6></button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
    <div class="container">
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i><i class="fas fa-fw fa-print"></i> Export <span class="badge"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-word"></i> <span class="badge">WORD</a></li>
              <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-excel"></i> <span class="badge">EXCEL</a></li>
              <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-fw fa-file-pdf"></i> <span class="badge">PDF</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <hr>
        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
          <thead>
            <tr>
              <th>Client Name</th>
              <th>Company</th>
              <th>Address</th>
              <th>Email</th>
              <th>Telephone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Client Name</th>
              <th>Company</th>
              <th>Address</th>
              <th>Email</th>
              <th>Telephone</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php 
              foreach ($client as $c) {
            ?>
            <tr>
              <td><?php echo $c->c_name?></td>
              <td><?php echo $c->c_company?></td>
              <td><?php echo $c->c_address?></td>
              <td><?php echo $c->c_email?></td>
              <td><?php echo $c->c_telephone?></td>
              <td>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle text-success" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button class="btn btn-primary" style="font-size: 12px">Action</button>
                  </a>
                  <div class="dropdown-menu dropdown-menu-left shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Action :</div>
                    <a class="dropdown-item" href="#" onclick="view_client(<?php echo $c->c_id; ?>)"><i class="fa fa-fw fa-eye"> &nbsp;View Client</i></a>
                    <a class="dropdown-item" href="#" onclick="view_clientRepair(<?php echo $c->c_id; ?>)"><i class="fa fa-fw fa-print"> &nbsp;&nbsp;View Client Repairs</i></a>
                    <a class="dropdown-item" href="#" onclick="edit_client(<?php echo $c->c_id; ?>)"><i class="fa fa-fw fa-cloud"> &nbsp;Edit Client</i></a>
                    <a class="dropdown-item" href="<?php echo base_url(). 'func_client/deleteClient/'.$c->c_id; ?>" onclick="return confirm('Confirm delete client?');"><i class="fa fa-fw fa-clipboard"> &nbsp;Delete Client</i></a>
                    <a class="dropdown-item" href="#" onclick="view_clientProfile(<?php echo $c->c_id; ?>)"><i class="fa fa-fw fa-money-bill-alt"> &nbsp;View Image</i></a>
                  </div>
                </div>
              </td>
            </tr>
            <?php
              }
            ?>


            <!-- Modal Update -->
            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-custom-2" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Client Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form action="<?php echo base_url(). 'func_client/updateClient'; ?>" method="post" id="formX" enctype="multipart/form-data" >
                    <div class="modal-body">
                      <div class="flex-reparation col-lg-12">
                        <div class="flex-child col-lg-6">
                          <div class="flex-row">
                            <input type="hidden" name="cid-1" id="cid-1" class="form-control" value="">
                            <div class="col-lg-12">
                              <label>Name</label>
                            </div>
                            <div class="form-group input-group col-lg-12">
                              <div class="input-group-prepend">
                                <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                              </div>
                                <input type="text" name="cname-1" id="cname-1" class="form-control" placeholder="Client" >
                            </div>
                            <div class="col-lg-12">
                              <label>Geo Location</label>
                            </div>
                            <div class="form-group input-group col-lg-12">
                              <div class="input-group-prepend">
                                <span class="input-group-text span-modal"> <i class="fas fa-fw fa-map-marker-alt"></i> </span>
                              </div>
                                <input type="text" name="clocate-1" id="clocate-1" class="form-control" placeholder="Geo Locate">
                            </div>
                            <div class="col-lg-12">
                              <label>City</label>
                            </div>
                            <div class="form-group input-group col-lg-12">
                              <div class="input-group-prepend">
                                <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe-asia"></i> </span>
                              </div>
                                <input type="text" name="ccity-1" id="ccity-1" class="form-control" placeholder="City">
                            </div>
                            <div class="col-lg-12">
                              <label>Telephone</label>
                            </div>
                            <div class="form-group input-group col-lg-12">
                              <div class="input-group-prepend">
                                <span class="input-group-text span-modal"> <i class="fas fa-fw fa-mobile-alt"></i> </span>
                              </div>
                                <input type="text" name="ctelephone-1" id="ctelephone-1" class="form-control" placeholder="Telephone" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                            </div>
                            <div class="col-lg-12">
                              <label>VAT</label>
                            </div>
                            <div class="form-group input-group col-lg-12">
                              <div class="input-group-prepend">
                                <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                              </div>
                                <input type="text" name="cvat-1" id="cvat-1" class="form-control" placeholder="VAT">
                            </div>
                            <div class="col-lg-12">
                              <label>Profile</label>
                            </div>
                            <div class="form-group input-group col-lg-12">
                              <div class="input-group-prepend" id="cfileicon-1">
                                <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file"></i> </span>
                              </div>
                                <input type="file" name="cfile-1" id="cfile-1" class="form-control" placeholder="Select File">
                            </div>
                          </div>
                        </div>
                        <div class="flex-child col-lg-6" style="height: 200px;">
                          <div class="flex-row">
                            <div class="col-lg-12">
                              <label>Company</label>
                            </div>
                            <div class="form-group input-group col-lg-12">
                              <div class="input-group-prepend">
                                <span class="input-group-text span-modal"> <i class="fas fa-fw fa-building"></i> </span>
                              </div>
                                <input type="text" name="ccompany-1" id="ccompany-1" class="form-control" placeholder="Company">
                            </div>
                            <div class="col-lg-12">
                              <label>Address</label>
                            </div>
                            <div class="form-group input-group col-lg-12">
                              <div class="input-group-prepend">
                                <span class="input-group-text span-modal"> <i class="fas fa-fw fa-road"></i> </span>
                              </div>
                                <input type="text" name="caddress-1" id="caddress-1" class="form-control" placeholder="Address">
                            </div>
                            <div class="col-lg-12">
                              <label>Postal Code</label>
                            </div>
                            <div class="form-group input-group col-lg-12">
                              <div class="input-group-prepend">
                                <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe"></i> </span>
                              </div>
                                <input type="text" name="cpostal-1" id="cpostal-1" class="form-control" placeholder="Postal Code">
                            </div>
                            <div class="col-lg-12">
                              <label>Email</label>
                            </div>
                            <div class="form-group input-group col-lg-12">
                              <div class="input-group-prepend">
                                <span class="input-group-text span-modal"> <i class="fas fa-fw fa-envelope"></i> </span>
                              </div>
                                <input type="text" name="cemail-1" id="cemail-1" class="form-control" placeholder="Email" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                            </div>
                            <div class="col-lg-12">
                              <label>SSN</label>
                            </div>
                            <div class="form-group input-group col-lg-12">
                              <div class="input-group-prepend">
                                <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                              </div>
                                <input type="text" name="cssn-1" id="cssn-1" class="form-control" placeholder="SSN">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="flex-reparation col-lg-12">
                        <div class="form-group input-group col-lg-12">
                            <textarea name="ccomment-1" id="ccomment-1" class="form-control" placeholder="Comment" style="height: 150px;"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <button class="btn btn-primary" type="submit">Update Client</button>
                    </div>
                  </form>      
                </div>
              </div>
            </div>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Modal Add New Client -->
    <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="<?php echo base_url('func_client/add_client'); ?>" method="post" id="form" enctype="multipart/form-data" >
            <div class="modal-body">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-6">
                  <div class="flex-row">
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                      </div>
                        <input type="text" name="cname" id="cname" class="form-control" placeholder="Client">
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-map-marker-alt"></i> </span>
                      </div>
                        <input type="text" name="clocate" id="clocate" class="form-control" placeholder="Geo Locate">
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe-asia"></i> </span>
                      </div>
                        <input type="text" name="ccity" id="ccity" class="form-control" placeholder="City">
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-mobile-alt"></i> </span>
                      </div>
                        <input type="text" name="ctelephone" id="ctelephone" class="form-control" placeholder="Telephone" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                      </div>
                        <input type="text" name="cvat" id="cvat" class="form-control" placeholder="VAT">
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file"></i> </span>
                      </div>
                        <input type="file" name="cfile" id="cfile" class="form-control" placeholder="Select File">
                    </div>
                  </div>
                </div>
                <div class="flex-child col-lg-6" style="height: 200px;">
                  <div class="flex-row">
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-building"></i> </span>
                      </div>
                        <input type="text" name="ccompany" id="ccompany" class="form-control" placeholder="Company">
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-road"></i> </span>
                      </div>
                        <input type="text" name="caddress" id="caddress" class="form-control" placeholder="Address">
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe"></i> </span>
                      </div>
                        <input type="text" name="cpostal" id="cpostal" class="form-control" placeholder="Postal Code">
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-envelope"></i> </span>
                      </div>
                        <input type="text" name="cemail" id="cemail" class="form-control" placeholder="Email" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                      </div>
                        <input type="text" name="cssn" id="cssn" class="form-control" placeholder="SSN">
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex-reparation col-lg-12">
                <div class="form-group input-group col-lg-12">
                    <textarea name="ccomment" id="ccomment" class="form-control" placeholder="Comment" style="height: 150px;"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button class="btn btn-primary" type="button" id="btn_submit">Add Client</button>
            </div>      
          </form>
        </div>
      </div>
    </div>

    <!-- Modal View Client -->
    <div class="modal fade" id="viewClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-custom-2" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Client Details</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="<?php echo base_url(). 'func_client/updateClient'; ?>" method="post" id="formXY" enctype="multipart/form-data" >
            <div class="modal-body">
              <div class="flex-reparation col-lg-12">
                <div class="flex-child col-lg-6">
                  <div class="flex-row">
                    <input type="hidden" name="cid-3" id="cid-3" class="form-control" value="">
                    <div class="col-lg-12">
                      <label>Name</label>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-users"></i> </span>
                      </div>
                        <input type="text" name="cname-3" id="cname-3" class="form-control" placeholder="Client" >
                    </div>
                    <div class="col-lg-12">
                      <label>Geo Location</label>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-map-marker-alt"></i> </span>
                      </div>
                        <input type="text" name="clocate-3" id="clocate-3" class="form-control" placeholder="Geo Locate">
                    </div>
                    <div class="col-lg-12">
                      <label>City</label>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe-asia"></i> </span>
                      </div>
                        <input type="text" name="ccity-3" id="ccity-3" class="form-control" placeholder="City">
                    </div>
                    <div class="col-lg-12">
                      <label>Telephone</label>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-mobile-alt"></i> </span>
                      </div>
                        <input type="text" name="ctelephone-3" id="ctelephone-3" class="form-control" placeholder="Telephone" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                    </div>
                    <div class="col-lg-12">
                      <label>VAT</label>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                      </div>
                        <input type="text" name="cvat-3" id="cvat-3" class="form-control" placeholder="VAT">
                    </div>
                    <div class="col-lg-12">
                      <label>Profile</label>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend" id="cfileicon-3">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file"></i> </span>
                      </div>
                        <input type="file" name="cfile-3" id="cfile-3" class="form-control" placeholder="Select File">
                    </div>
                  </div>
                </div>
                <div class="flex-child col-lg-6" style="height: 200px;">
                  <div class="flex-row">
                    <div class="col-lg-12">
                      <label>Company</label>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-building"></i> </span>
                      </div>
                        <input type="text" name="ccompany-3" id="ccompany-3" class="form-control" placeholder="Company">
                    </div>
                    <div class="col-lg-12">
                      <label>Address</label>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-road"></i> </span>
                      </div>
                        <input type="text" name="caddress-3" id="caddress-3" class="form-control" placeholder="Address">
                    </div>
                    <div class="col-lg-12">
                      <label>Postal Code</label>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-globe"></i> </span>
                      </div>
                        <input type="text" name="cpostal-3" id="cpostal-3" class="form-control" placeholder="Postal Code">
                    </div>
                    <div class="col-lg-12">
                      <label>Email</label>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-envelope"></i> </span>
                      </div>
                        <input type="text" name="cemail-3" id="cemail-3" class="form-control" placeholder="Email" style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;">
                    </div>
                    <div class="col-lg-12">
                      <label>SSN</label>
                    </div>
                    <div class="form-group input-group col-lg-12">
                      <div class="input-group-prepend">
                        <span class="input-group-text span-modal"> <i class="fas fa-fw fa-file-archive"></i> </span>
                      </div>
                        <input type="text" name="cssn-3" id="cssn-3" class="form-control" placeholder="SSN">
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex-reparation col-lg-12">
                <div class="form-group input-group col-lg-12">
                    <textarea name="ccomment-3" id="ccomment-3" class="form-control" placeholder="Comment" style="height: 150px;"></textarea>
                </div>
              </div>
              <div class="flex-reparation col-lg-12">
                <div class="form-group input-group col-lg-12" style="height: 200px;">
                  <div class="table-responsive">
                    <hr>
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;">
                      <thead>
                        <tr>
                          <th>Reparation Code</th>
                          <th>IMEI</th>
                          <th>Defect</th>
                          <th>Model</th>
                          <th>Opened At</th>
                          <th>Status</th>
                          <th>Created By</th>
                          <th>Last Modified</th>
                          <th>Grand Total</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Reparation Code</th>
                          <th>IMEI</th>
                          <th>Defect</th>
                          <th>Model</th>
                          <th>Opened At</th>
                          <th>Status</th>
                          <th>Created By</th>
                          <th>Last Modified</th>
                          <th>Grand Total</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <!-- <tr>
                          <td><input type="checkbox" name=""></td>
                          <td>Image</td>
                          <td>Battery Mi2 (BM41)</td>
                          <td>0.00</td>
                          <td>80.00</td>
                          <td>0.00</td>
                          <td>0.00</td>
                          <td></td>
                          <td><button type="" name="" class="btn btn-warning" style="width: 35px;height: 35px;font-size: 11px;text-align: center;"><i class="fa fa-fw fa-pen"></i></button></td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">

            </div>
          </form>      
        </div>
      </div>
    </div>

    <!-- Modal View Client Repair -->
    <div class="modal fade" id="viewClientModalReparation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-custom-2" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Show Client Repair</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="#" method="post" id="formXYZ" enctype="multipart/form-data" >
            <div class="modal-body">
              <div class="flex-reparation col-lg-12">
                <div class="form-group input-group col-lg-12">
                  <div class="table-responsive">
                  <hr>
                    <table class="table table-striped table-bordered" id="dataTable-1" width="100%" cellspacing="0" style="font-size: 13px;">
                      <thead>
                        <tr>
                          <th>Reparation Code</th>
                          <th>IMEI</th>
                          <th>Defect</th>
                          <th>Model</th>
                          <th>Opened At</th>
                          <th>Status</th>
                          <th>Created By</th>
                          <th>Last Modified</th>
                          <th>Grand Total</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Reparation Code</th>
                          <th>IMEI</th>
                          <th>Defect</th>
                          <th>Model</th>
                          <th>Opened At</th>
                          <th>Status</th>
                          <th>Created By</th>
                          <th>Last Modified</th>
                          <th>Grand Total</th>
                        </tr>
                      </tfoot>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>     
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal View Client Repair -->
    <div class="modal fade" id="viewClientModalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-custom-2" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Show Client Profile</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="#" method="post" id="formXYZZ" enctype="multipart/form-data" >
            <div class="modal-body">
              <div class="flex-reparation col-lg-12">
                <div class="form-group input-group col-lg-12">
                  <div id="preview">
                    
                  </div>
                </div>
              </div>     
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Ending -->
  </div>
</div>



<script type="text/javascript">
      $("#btn_submit").click(function (){
          var cname = $("#cname").val();
          var clocate = $("#clocate").val();
          var ccity = $("#ccity").val();
          var ctelephone = $("#ctelephone").val();
          var cvat = $("#cvat").val();
          var cfile = $("#cfile").val();
          var ccompany = $("#ccompany").val();
          var caddress = $("#caddress").val();
          var cpostal = $("#cpostal").val();
          var cemail = $("#cemail").val();
          var cssn = $("#cssn").val();
          var ccomment = $("#ccomment").val();

          // validation 
          if((cname=='')||(clocate=='')||(ccity=='')||(ctelephone=='')||(cvat=='')||(cfile=='')||(ccompany=='')||(caddress=='')||(cpostal=='')||(cemail=='')||(cssn=='')||(ccomment=='')){
            alert('Please fill in the field');
          }else{

            $("#clientModal").modal('hide');
            alert('Add New Client Success');
            $("#form").trigger('submit');
          }
      });

        var save_method;
        var table;

      function edit_client(id){
        save_method = 'update';
        $('#formX')[0].reset();

        /*load data dari ajax sama macam concept atas*/
        $.ajax({
          url:"<?php echo site_url('func_client/edit_client/') ;?>" + id,
          type: "GET",
          dataType:"JSON",
          success: function(data){
            /*cara nak tarik value form data menggunakan name*/
            $('[name="cid-1"]').val(data.c_id);
            $('[name="cname-1"]').val(data.c_name);
            $('[name="clocate-1"]').val(data.c_geolocate);
            $('[name="ccity-1"]').val(data.c_city);
            $('[name="ctelephone-1"]').val(data.c_telephone);
            $('[name="cvat-1"]').val(data.c_vat);
            $('[name="ccompany-1"]').val(data.c_company);
            $('[name="caddress-1"]').val(data.c_address);
            $('[name="cpostal-1"]').val(data.c_postal);
            $('[name="cemail-1"]').val(data.c_email);
            $('[name="cssn-1"]').val(data.c_ssn);
             $('[name="ccomment-1"]').val(data.c_comment);

            /*ajax panggil modal dan text*/
            $('#updateModal').modal('show');
            $('.modal_title').text('Edit Client');
          },
          error: function (jqXHR, textStatus, errorThrown){
                        alert('error at get data from ajax');
                    }
        });
      }

      /*Ajax Update to Database*/

      function update_client(){

        var url;

            url = '<?php echo site_url('func_client/update_client') ;?>';

            $.ajax({
                          url : url,
                          type : "POST",
                          data : $('#formX').serialize(),
                          dataType : "JSON",
                          success: function(data){
                                $('#updateModal').modal('hide');
                                location.reload();

                          },
                            error: function (jqXHR, textStatus, errorThrown){
                              alert('error at adding data to ajax');
                          }
                    

              });
      }

      // View Client
      function view_client(id){
          $('#formXY')[0].reset();
          document.getElementById("cname-3").readOnly = true;
          document.getElementById("clocate-3").readOnly = true;
          document.getElementById("ccity-3").readOnly = true;
          document.getElementById("ctelephone-3").readOnly = true;
          document.getElementById("cvat-3").readOnly = true;
          document.getElementById("ccompany-3").readOnly = true;
          document.getElementById("caddress-3").readOnly = true;
          document.getElementById("cpostal-3").readOnly = true;
          document.getElementById("cemail-3").readOnly = true;
          document.getElementById("cssn-3").readOnly = true;
          document.getElementById("ccomment-3").readOnly = true;
          document.getElementById("cfile-3").hidden = true;
          document.getElementById("cfileicon-3").hidden = true;
          
          /*load data dari ajax sama macam concept atas*/
          $.ajax({
            url:"<?php echo site_url('func_client/edit_client/') ;?>" + id,
            type: "GET",
            dataType:"JSON",
            success: function(data){
              /*cara nak tarik value form data menggunakan name*/
              $('[name="cid-3"]').val(data.clientt.c_id);
              $('[name="cname-3"]').val(data.clientt.c_name);
              $('[name="clocate-3"]').val(data.clientt.c_geolocate);
              $('[name="ccity-3"]').val(data.clientt.c_city);
              $('[name="ctelephone-3"]').val(data.clientt.c_telephone);
              $('[name="cvat-3"]').val(data.clientt.c_vat);
              $('[name="ccompany-3"]').val(data.clientt.c_company);
              $('[name="caddress-3"]').val(data.clientt.c_address);
              $('[name="cpostal-3"]').val(data.clientt.c_postal);
              $('[name="cemail-3"]').val(data.clientt.c_email);
              $('[name="cssn-3"]').val(data.clientt.c_ssn);
              $('[name="ccomment-3"]').val(data.clientt.c_comment);


              // $('#dataTable tbody').append('<tr><td>' + data.clientreparation.r_code + '</td><td>' + data.clientreparation.r_imei + '</td><td>' + data.clientreparation.r_defect + '</td><td>' + data.clientreparation.r_model + '</td><td>' + data.clientreparation.r_opened + '</td><td>' + data.clientreparation.r_status + '</td><td>' + data.clientreparation.r_created + '</td><td>' + data.clientreparation.r_lastmodified + '</td><td>' + data.clientreparation.r_total + '</td></tr>');
              /*ajax panggil modal dan text*/
              $('#viewClientModal').modal('show');
              $('.modal_title').text('Edit Client');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('error at get data from ajax');
            }
        });
      }

      // View Client Repair
      function view_clientRepair(id){
          $('#formXYZ')[0].reset();
          
          /*load data dari ajax sama macam concept atas*/
          $.ajax({
            url:"<?php echo site_url('func_client/edit_client/') ;?>" + id,
            type: "GET",
            dataType:"JSON",
            success: function(data){
              /*cara nak tarik value form data menggunakan name*/
              // $('#dataTable-1 tbody').append('<tr><td>' + data.clientreparation.r_code + '</td><td>' + data.clientreparation.r_imei + '</td><td>' + data.clientreparation.r_defect + '</td><td>' + data.clientreparation.r_model + '</td><td>' + data.clientreparation.r_opened + '</td><td>' + data.clientreparation.r_status + '</td><td>' + data.clientreparation.r_created + '</td><td>' + data.clientreparation.r_lastmodified + '</td><td>' + data.clientreparation.r_total + '</td></tr>');
              /*ajax panggil modal dan text*/
              $('#viewClientModalReparation').modal('show');
              $('.modal_title').text('Edit Client');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('error at get data from ajax');
            }
        });
      }

      // View Client Profile
      function view_clientProfile(id){
          $('#formXYZZ')[0].reset();
          
          /*load data dari ajax sama macam concept atas*/
          $.ajax({
            url:"<?php echo site_url('func_client/edit_client/') ;?>" + id,
            type: "GET",
            dataType:"JSON",
            success: function(data){
              /*cara nak tarik value form data menggunakan name*/
              $("#preview").html('');

              $("#preview").append("<img src='../uploads/"+data.c_file+"' class='contentimg'>");
              /*ajax panggil modal dan text*/
              $('#viewClientModalProfile').modal('show');
              $('.modal_title').text('Edit Client');
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('error at get data from ajax');
            }
        });
      }
</script>