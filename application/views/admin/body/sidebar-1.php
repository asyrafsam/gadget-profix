
<body id="page-top">
  <div id="wrapper">
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="box-shadow:inset 0 0 10px #000000;">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/index') ;?>">
    <div class="sidebar-brand-text mx-1"><img src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="200" height="50"> </div>
  </a>
  <!-- Divider -->
  <form action="<?php echo base_url('admin/reparationsearch');?>" method="post">
    <li class="nav-item active" style="margin-bottom: -5px;">
      <div class="nav-link">
        <button type="submit" style="background: transparent;border: none;"><i class="fas fa-fw fa-search"></i></button>
        <input type="text" name="searchby" placeholder="Search Reparation" class="col-md-9">
      </div>
    </li>
  </form>

  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url('admin/index') ;?>">
      <i class="fas fa-fw fa-home"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    MAIN NAVIGATION
  </div>
  <!-- Sidebar Bar -->
  <?php if($this->session->userdata('repairview') > 0){?>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('admin/reparation') ;?>">
      <i class="fas fa-fw fa-tools"></i>
      <span>Reparation</span></a>
  </li>
  <?php }?>
  <?php if($this->session->userdata('clientview') > 0){?>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('admin/client') ;?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Client</span></a>
  </li>
  <?php }?>
  <?php if($this->session->userdata('stockview') > 0){?>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages-1" aria-expanded="true" aria-controls="collapsePages-1">
      <i class="fas fa-fw fa-list"></i>
      <span>Stock/Inventory</span>
    </a>
    <div id="collapsePages-1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Stock</h6>
        <a class="collapse-item" href="<?php echo base_url('admin/stock') ;?>">View Stock</a>
        <?php if($this->session->userdata('stockadd') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/add_stock') ;?>">Add Stock/Product</a>
        <?php }?>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Others:</h6>
        <?php if($this->session->userdata('supplierview') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/suppliers') ;?>">Suppliers</a>
        <?php }?>
        <?php if($this->session->userdata('manufacturerview') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/manufacturers') ;?>">Manufacturers</a>
        <?php }?>
        <?php if($this->session->userdata('modelview') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/models') ;?>">Models</a>
        <?php }?>
      </div>
    </div>
  </li>
  <?php }?>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('admin/pos') ;?>">
      <i class="fas fa-fw fa-cash-register"></i>
      <span>POS</span></a>
  </li>
  <?php if($this->session->userdata('purchaseview') > 0){?>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages-2" aria-expanded="true" aria-controls="collapsePages-2">
      <i class="fas fa-fw fa-shopping-cart"></i>
      <span>Purchase</span>
    </a>
    <div id="collapsePages-2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?php echo base_url('admin/view_purchase') ;?>">View Purchase</a>
        <?php if($this->session->userdata('purchaseadd') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/add_purchase') ;?>">Add Purchase</a>
        <?php }?>
      </div>
    </div>
  </li>
  <?php }?>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages-3" aria-expanded="true" aria-controls="collapsePages-1">
      <i class="fas fa-fw fa-chart-line"></i>
      <span>Sales Record</span></a>
    </a>
    <div id="collapsePages-3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Chart</h6>
        <?php if($this->session->userdata('reportstock') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/stock_chart') ;?>">Stock Chart</a>
        <?php }?>
        <?php if($this->session->userdata('reportfinance') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/finance_chart') ;?>">Finance Chart</a>
        <?php }?>
        <?php if($this->session->userdata('reportquantity') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/reportstock') ;?>">Quantity Alert</a>
        <?php }?>
        <?php if($this->session->userdata('reportsale') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/viewsalesreparation') ;?>">Reparation Sales</a>
        <?php }?>
        <?php if($this->session->userdata('reportsale') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/viewsales') ;?>">POS Sales</a>
        <?php }?>
        <?php if($this->session->userdata('reportdrawer') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/viewdrawer') ;?>">Drawer Report</a>
        <?php }?>
      </div>
    </div>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('admin/logactivity') ;?>">
      <i class="fas fa-fw fa-undo-alt"></i>
      <span>Activity Log</span></a>
  </li>
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Addons
  </div>
   <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>System Settings</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">System (Review/Update):</h6>
        <a class="collapse-item" href="<?php echo base_url('admin/setting') ;?>">General Setting</a>
        <?php if($this->session->userdata('userview') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/userlist') ;?>">Users</a>
        <?php }?>
        <?php if($this->session->userdata('groupview') > 0){?>
        <a class="collapse-item" href="<?php echo base_url('admin/usergroup') ;?>">User Group</a>
        <?php }?>
        <a class="collapse-item" href="<?php echo base_url('admin/repairstatus') ;?>">Repair Statuses</a>
        <!-- <a class="collapse-item" href="cards.html">Tax Rates</a> -->
        <a class="collapse-item" href="<?php echo base_url('admin/viewdatabase') ;?>">Database Utilities</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Help Support</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Utilities:</h6>
        <a class="collapse-item" href="utilities-color.html">Colors</a>
        <a class="collapse-item" href="utilities-border.html">Borders</a>
        <a class="collapse-item" href="utilities-animation.html">Animations</a>
        <a class="collapse-item" href="utilities-other.html">Other</a>
      </div>
    </div>
  </li> -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>