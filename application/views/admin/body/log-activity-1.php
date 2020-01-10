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
    <h1 class="h3 mb-2 text-gray-800">Activity Log <i class="fas fa-clipboard-list"></i></h1>
    <!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="header-card col-md-3 py-2" style="float: left; width: 500px;" style="text-decoration: none;">
          <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
          <!-- </a> -->
        </div>
        <div class="container">
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <hr>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;color: #000;">
              <thead>
                <tr>
                  <th>Log Activity</th>
                  <th>Log Module</th>
                  <th>Log ID</th>
                  <th>User ID</th>
                  <th>Log User</th>
                  <th>Log Branch</th>
                  <th>Log Date</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Log Activity</th>
                  <th>Log Module</th>
                  <th>Log ID</th>
                  <th>User ID</th>
                  <th>Log User</th>
                  <th>Log Branch</th>
                  <th>Log Date</th>
                </tr>
              </tfoot>
              <tbody>

              <?php 
                $test = '1';
                foreach ($viewactivity as $act) {
              ?>
                <tr style="background-color: #e3e6f0;">
                    
                    <td><?php echo $act->log_activity?></td>
                    <td><?php echo $act->log_module?></td>
                    <td><?php echo $act->id ?></td>
                    <td><?php echo $act->log_id?></td>
                    <td><?php echo $act->log_user?></td>
                    <td><?php echo $act->u_branch ?></td>
                    <td><?php echo $act->log_date?></td>
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
  $(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [6,'desc']
        
        });
    });
</script>
<input type="hidden" id="id_sales" name="id_sales">