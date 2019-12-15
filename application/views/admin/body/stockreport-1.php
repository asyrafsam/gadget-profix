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
</style>
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quantity Alert <i class="fas fa-clipboard-list"></i></h1>
    <!-- <p class="mb-4">Reparation Table <a target="_blank" href="https://datatables.net">Order & Reparation Record</a>.</p> -->
    <hr>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px;color: #000;">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Alert Quantity</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Alert Quantity</th>
                </tr>
              </tfoot>
              <?php 
                $test = '1';
                foreach ($product as $p) {
                  
                  if ($test % 2 == 0){
                     $test1 ="even";
                  }else{
                     $test1 = "odd";
                  }
              ?>
              <tbody>
                <?php if($test1 == 'odd'){?>
                <tr style="background-color: #e3e6f0;">
                <?php }else{?>
                <tr style="background-color: #fdfafa;">
                <?php }?>
                  <td><?php echo $p->p_code?></td>
                  <td><?php echo $p->p_name?></td>
                  <td><?php echo $p->p_quantity?></td>
                  <td><?php echo $p->p_alertQuantity?></td>
                </tr>
              </tbody>
              <?php
                  $test++;
                }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
