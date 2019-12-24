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
button{
  font-size: 13px;
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
    flex-wrap: wrap;
  }
  .flex-row{
    display: flex;
    flex-flow: row;
    flex-wrap: wrap;
  }
  .span-modal{
    height: 38px;
  }
  .table-border-custom, td{
    border:1px solid #fff;
  }
  .text-area{
    margin-top: 10%;
  }
  .testing{
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
  }
  #datepicker{
    z-index:1151 !important;
  }
  #signature {
    width: 100%;
    height: auto;
    border: 1px solid black;
}
</style>
<div class="container-fluid">
<?php 
    $random = rand();
     echo $hold_value = '<input type="hidden" id="hold_value" value="'.$random.'">'
  ?>
<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-clipboard-list"></i>List of Users </h1>
    <!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="container">
          <a href="<?php echo base_url(). 'admin/userlist_add/'; ?>"><button class="btn btn-default" style="float:right;text-align: center;height: 33px" data-toggle="modal" data-target="#reparationModal"><h6 class="font-weight-bold center">+ Add New Users</h6></button></a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <hr>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;color: #000;">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody id="tablereportsales">

              <?php 
                $test = '1';
                foreach ($userdetails as $p) {
              ?>
                <tr style="background-color: #e3e6f0;">
                    <td><?php echo $p->u_name ?></td>
                    <td><?php echo $p->ul_name?></td>
                    <td><?php echo $p->u_email?></td>
                    <td><?php echo $p->u_role?></td>
                    <td>
                      <?php if($p->u_status == 'Active'){?>
                      <button class="btn btn-success"><?php echo $p->u_status?></button>
                      <?php }else{?>
                      <button class="btn btn-danger"><?php echo $p->u_status?></button>
                      <?php }?>
                    </td>
                    <td>
                      <a href="<?php echo base_url(). 'admin/userlist_update/'.$p->id; ?>"><button class="btn btn-warning"><i class="fa fa-fw fa-pen"></i></button></a>
                      <a href="<?php echo base_url(). 'func_setting/userlist_delete/'.$p->id; ?>"><button class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></button></a>
                    </td>
                </tr>
              <?php
                }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">

</script>
<input type="hidden" id="id_sales" name="id_sales">