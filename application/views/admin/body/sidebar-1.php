<body id="page-top">
  <div id="wrapper">
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="box-shadow:inset 0 0 10px #000000;">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text mx-1"><img src="<?php echo base_url('images/ProfixLogin.png') ;?>" width="200" height="50"> </div>
  </a>
  <!-- Divider -->
  <li class="nav-item active">
    <div class="nav-link">
      <i class="fas fa-fw fa-search"></i>
      <input type="text" name="search" placeholder="Search Reparation" class="col-md-10">
    </div>
  </li>

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
  <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('admin/reparation') ;?>">
      <i class="fas fa-fw fa-tools"></i>
      <span>Reparation</span></a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('admin/client') ;?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Client</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages-1" aria-expanded="true" aria-controls="collapsePages-1">
      <i class="fas fa-fw fa-list"></i>
      <span>Stock/Inventory</span>
    </a>
    <div id="collapsePages-1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Stock</h6>
        <a class="collapse-item" href="<?php echo base_url('admin/stock') ;?>">View Stock</a>
        <a class="collapse-item" href="<?php echo base_url('admin/add_stock') ;?>">Add Stock/Product</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Others:</h6>
        <a class="collapse-item" href="<?php echo base_url('admin/suppliers') ;?>">Suppliers</a>
        <a class="collapse-item" href="<?php echo base_url('admin/manufacturers') ;?>">Manufacturers</a>
        <a class="collapse-item" href="<?php echo base_url('admin/models') ;?>">Models</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('admin/pos') ;?>">
      <i class="fas fa-fw fa-cash-register"></i>
      <span>POS</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages-2" aria-expanded="true" aria-controls="collapsePages-2">
      <i class="fas fa-fw fa-shopping-cart"></i>
      <span>Purchase</span>
    </a>
    <div id="collapsePages-2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?php echo base_url('admin/view_purchase') ;?>">View Purchase</a>
        <a class="collapse-item" href="<?php echo base_url('admin/add_purchase') ;?>">Add Purchase</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages-3" aria-expanded="true" aria-controls="collapsePages-1">
      <i class="fas fa-fw fa-chart-line"></i>
      <span>Sales Record</span></a>
    </a>
    <div id="collapsePages-3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Chart</h6>
        <a class="collapse-item" href="stock-1.php">Stock Chart</a>
        <a class="collapse-item" href="<?php echo base_url('admin/finance_chart') ;?>">Finance Chart</a>
        <a class="collapse-item" href="<?php echo base_url('admin/reportstock') ;?>">Quantity Alert</a>
        <a class="collapse-item" href="add-stock-1.php">Sales</a>
        <a class="collapse-item" href="add-stock-1.php">Drawer Report</a>
      </div>
    </div>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="tables.html">
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
      <span>User Settings</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">User (Review/Update):</h6>
        <a class="collapse-item" href="buttons.html">User Profile</a>
        <a class="collapse-item" href="cards.html">User Qualifications</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
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
  </li>
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>