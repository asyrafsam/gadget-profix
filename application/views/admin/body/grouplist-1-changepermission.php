<table style="margin-bottom: 10px;margin-left: 370px;">
  <thead>
    <tr>
      <th>General Users (Members) Group Permissions</th>
    </tr>
  </thead>
</table>
<form action="<?php echo base_url('func_setting/changepermission'); ?>" method="post" enctype="multipart/form-data">
<table class="table table-striped table-bordered"  width="50%" cellspacing="0" style=" font-size: 13px;color: #000;">
  <thead>
    <tr>
      <th>Activity</th>
      <th>View</th>
      <th>Add</th>
      <th>Edit</th>
      <th>Delete</th>
      <th style="width:600px;">-----</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>Activity</th>
      <th>View</th>
      <th>Add</th>
      <th>Edit</th>
      <th>Delete</th>
      <th style="width:600px;">-----</th>
    </tr>
  </tfoot>
  <tbody>
      <tr style="background-color: #e3e6f0;">
          <td>Reparations</td>
          <td><input type="checkbox" class="preference" name="repairview" id="repairview"></td>
          <td><input type="checkbox" class="preference" name="repairadd" id="repairadd"></td>
          <td><input type="checkbox" class="preference" name="repairedit" id="repairedit"></td>
          <td><input type="checkbox" class="preference" name="repairdelete" id="repairdelete"></td>
          <td><input type="hidden" name="groupId" id="groupId"></td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>Clients</td>
          <td><input type="checkbox" class="preference" name="clientview" id="clientview"></td>
          <td><input type="checkbox" class="preference" name="clientadd" id="clientadd"></td>
          <td><input type="checkbox" class="preference" name="clientedit" id="clientedit"></td>
          <td><input type="checkbox" class="preference" name="clientdelete" id="clientdelete"></td>
          <td></td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>Stock/Inventory</td>
          <td><input type="checkbox" class="preference" name="stockview" id="stockview"></td>
          <td><input type="checkbox" class="preference" name="stockadd" id="stockadd"></td>
          <td><input type="checkbox" class="preference" name="stockedit" id="stockedit"></td>
          <td><input type="checkbox" class="preference" name="stockdelete" id="stockdelete"></td>
          <td></td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>Suppliers</td>
          <td><input type="checkbox" class="preference" name="supplierview" id="supplierview"></td>
          <td><input type="checkbox" class="preference" name="supplieradd" id="supplieradd"></td>
          <td><input type="checkbox" class="preference" name="supplieredit" id="supplieredit"></td>
          <td><input type="checkbox" class="preference" name="supplierdelete" id="supplierdelete"></td>
          <td></td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>Models</td>
          <td><input type="checkbox" class="preference" name="modelview" id="modelview"></td>
          <td><input type="checkbox" class="preference" name="modeladd" id="modeladd"></td>
          <td><input type="checkbox" class="preference" name="modeledit" id="modeledit"></td>
          <td><input type="checkbox" class="preference" name="modeldelete" id="modeldelete"></td>
          <td></td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>View Purchases</td>
          <td><input type="checkbox" class="preference" name="purchaseview" id="purchaseview"></td>
          <td><input type="checkbox" class="preference" name="purchaseadd" id="purchaseadd"></td>
          <td><input type="checkbox" class="preference" name="purchaseedit" id="purchaseedit"></td>
          <td><input type="checkbox" class="preference" name="purchasedelete" id="purchasedelete"></td>
          <td></td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>Users</td>
          <td><input type="checkbox" class="preference" name="userview" id="userview"></td>
          <td><input type="checkbox" class="preference" name="useradd" id="useradd"></td>
          <td><input type="checkbox" class="preference" name="useredit" id="useredit"></td>
          <td><input type="checkbox" class="preference" name="userdelete" id="userdelete"></td>
          <td></td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>User Groups</td>
          <td><input type="checkbox" class="preference" name="groupview" id="groupview"></td>
          <td><input type="checkbox" class="preference" name="groupadd" id="groupadd"></td>
          <td><input type="checkbox" class="preference" name="groupedit" id="groupedit"></td>
          <td><input type="checkbox" class="preference" name="groupdelete" id="groupdelete"></td>
          <td></td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>Tax Rates</td>
          <td><input type="checkbox" class="preference" name="taxview" id="taxview"></td>
          <td><input type="checkbox" class="preference" name="taxadd" id="taxadd"></td>
          <td><input type="checkbox" class="preference" name="taxedit" id="taxedit"></td>
          <td><input type="checkbox" class="preference" name="taxdelete" id="taxdelete"></td>
          <td></td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>Categories</td>
          <td><input type="checkbox" class="preference" name="categoryview" id="categoryview"></td>
          <td><input type="checkbox" class="preference" name="categoryadd" id="categoryadd"></td>
          <td><input type="checkbox" class="preference" name="categoryedit" id="categoryedit"></td>
          <td><input type="checkbox" class="preference" name="categorydelete" id="categorydelete"></td>
          <td></td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>Manufacturers</td>
          <td><input type="checkbox" class="preference" name="manufacturerview" id="manufacturerview"></td>
          <td><input type="checkbox" class="preference" name="manufactureradd" id="manufactureradd"></td>
          <td><input type="checkbox" class="preference" name="manufactureredit" id="manufactureredit"></td>
          <td><input type="checkbox" class="preference" name="manufacturerdelete" id="manufacturerdelete"></td>
          <td></td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>Reports</td>
          <td colspan="5" style="color: #000000;font-weight: bold;">
            <input type="checkbox" class="preference" name="reportstock" id="reportstock">Stock Chart&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="preference" name="reportfinance" id="reportfinance">Finance Chart&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="preference" name="reportquantity" id="reportquantity">Quantity Alert&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="preference" name="reportsales" id="reportsales">Sales&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="preference" name="reportdrawer" id="reportdrawer">Drawer Report&nbsp;&nbsp;&nbsp;
          </td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>Database Utilities</td>
          <td colspan="5" style="color: #000000;font-weight: bold;">
            <input type="checkbox" class="preference" name="databaseview" id="databaseview">View&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="preference" name="databasebackup" id="databasebackup">Backup&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="preference" name="databaserestore" id="databaserestore">Restore&nbsp;&nbsp;&nbsp;
            <input type="checkbox" class="preference" name="databaseremove" id="databaseremove">Remove&nbsp;&nbsp;&nbsp;
          </td>
      </tr>
      <tr style="background-color: #e3e6f0;">
          <td>Miscellanous</td>
          <td colspan="6" style="color: #000000;font-weight: bold;">
            <input type="checkbox" class="preference" name="miscellanousemail" id="miscellanousemail">Quick Email&nbsp;&nbsp;&nbsp;
          </td>
      </tr>
  </tbody>
</table>
<button class="btn btn-primary" type="submit">Save Changes</button>
</form>
<script type="text/javascript">
  $("[name='repairview']").click(function() {
      var id = $("#repairview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#repairview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#repairview").val(value2);
      }
  });
  $("[name='repairadd']").click(function() {
      var id = $("#repairadd").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#repairadd").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#repairadd").val(value2);
      }
  });
  $("[name='repairedit']").click(function() {
      var id = $("#repairedit").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#repairedit").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#repairedit").val(value2);
      }
  });
  $("[name='repairdelete']").click(function() {
      var id = $("#repairdelete").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#repairdelete").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#repairdelete").val(value2);
      }
  });
  $("[name='clientview']").click(function() {
      var id = $("#clientview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#clientview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#clientview").val(value2);
      }
  });
  $("[name='clientadd']").click(function() {
      var id = $("#clientadd").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#clientadd").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#clientadd").val(value2);
      }
  });
  $("[name='clientedit']").click(function() {
      var id = $("#clientedit").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#clientedit").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#clientedit").val(value2);
      }
  });
  $("[name='clientdelete']").click(function() {
      var id = $("#clientdelete").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#clientdelete").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#clientdelete").val(value2);
      }
  });
  $("[name='stockview']").click(function() {
      var id = $("#stockview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#stockview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#stockview").val(value2);
      }
  });
  $("[name='stockadd']").click(function() {
      var id = $("#stockadd").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#stockadd").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#stockadd").val(value2);
      }
  });
  $("[name='stockedit']").click(function() {
      var id = $("#stockedit").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#stockedit").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#stockedit").val(value2);
      }
  });
  $("[name='stockdelete']").click(function() {
      var id = $("#stockdelete").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#stockdelete").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#stockdelete").val(value2);
      }
  });
  $("[name='supplierview']").click(function() {
      var id = $("#supplierview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#supplierview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#supplierview").val(value2);
      }
  });
  $("[name='supplieradd']").click(function() {
      var id = $("#supplieradd").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#supplieradd").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#supplieradd").val(value2);
      }
  });
  $("[name='supplieredit']").click(function() {
      var id = $("#supplieredit").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#supplieredit").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#supplieredit").val(value2);
      }
  });
  $("[name='supplierdelete']").click(function() {
      var id = $("#supplierdelete").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#supplierdelete").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#supplierdelete").val(value2);
      }
  });

  $("[name='modelview']").click(function() {
      var id = $("#modelview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#modelview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#modelview").val(value2);
      }
  });
  $("[name='modeladd']").click(function() {
      var id = $("#modeladd").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#modeladd").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#modeladd").val(value2);
      }
  });
  $("[name='modeledit']").click(function() {
      var id = $("#modeledit").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#modeledit").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#modeledit").val(value2);
      }
  });
  $("[name='modeldelete']").click(function() {
      var id = $("#modeldelete").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#modeldelete").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#modeldelete").val(value2);
      }
  });

  $("[name='purchaseview']").click(function() {
      var id = $("#purchaseview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#purchaseview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#purchaseview").val(value2);
      }
  });
  $("[name='purchaseadd']").click(function() {
      var id = $("#purchaseadd").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#purchaseadd").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#purchaseadd").val(value2);
      }
  });
  $("[name='purchaseedit']").click(function() {
      var id = $("#purchaseedit").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#purchaseedit").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#purchaseedit").val(value2);
      }
  });
  $("[name='purchasedelete']").click(function() {
      var id = $("#purchasedelete").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#purchasedelete").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#purchasedelete").val(value2);
      }
  });

  $("[name='userview']").click(function() {
      var id = $("#userview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#userview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#userview").val(value2);
      }
  });
  $("[name='useradd']").click(function() {
      var id = $("#useradd").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#useradd").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#useradd").val(value2);
      }
  });
  $("[name='useredit']").click(function() {
      var id = $("#useredit").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#useredit").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#useredit").val(value2);
      }
  });
  $("[name='userdelete']").click(function() {
      var id = $("#userdelete").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#userdelete").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#userdelete").val(value2);
      }
  });

  $("[name='groupview']").click(function() {
      var id = $("#groupview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#groupview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#groupview").val(value2);
      }
  });
  $("[name='groupadd']").click(function() {
      var id = $("#groupadd").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#groupadd").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#groupadd").val(value2);
      }
  });
  $("[name='groupedit']").click(function() {
      var id = $("#groupedit").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#groupedit").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#groupedit").val(value2);
      }
  });
  $("[name='groupdelete']").click(function() {
      var id = $("#groupdelete").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#groupdelete").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#groupdelete").val(value2);
      }
  });

  $("[name='taxview']").click(function() {
      var id = $("#taxview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#taxview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#taxview").val(value2);
      }
  });
  $("[name='taxadd']").click(function() {
      var id = $("#taxadd").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#taxadd").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#taxadd").val(value2);
      }
  });
  $("[name='taxedit']").click(function() {
      var id = $("#taxedit").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#taxedit").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#taxedit").val(value2);
      }
  });
  $("[name='taxdelete']").click(function() {
      var id = $("#taxdelete").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#taxdelete").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#taxdelete").val(value2);
      }
  });

  $("[name='categoryview']").click(function() {
      var id = $("#categoryview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#categoryview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#categoryview").val(value2);
      }
  });
  $("[name='categoryadd']").click(function() {
      var id = $("#categoryadd").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#categoryadd").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#categoryadd").val(value2);
      }
  });
  $("[name='categoryedit']").click(function() {
      var id = $("#categoryedit").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#categoryedit").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#categoryedit").val(value2);
      }
  });
  $("[name='categorydelete']").click(function() {
      var id = $("#categorydelete").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#categorydelete").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#categorydelete").val(value2);
      }
  });

  $("[name='manufacturerview']").click(function() {
      var id = $("#manufacturerview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#manufacturerview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#manufacturerview").val(value2);
      }
  });
  $("[name='manufactureradd']").click(function() {
      var id = $("#manufactureradd").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#manufactureradd").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#manufactureradd").val(value2);
      }
  });
  $("[name='manufactureredit']").click(function() {
      var id = $("#manufactureredit").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#manufactureredit").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#manufactureredit").val(value2);
      }
  });
  $("[name='manufacturerdelete']").click(function() {
      var id = $("#manufacturerdelete").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#manufacturerdelete").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#manufacturerdelete").val(value2);
      }
  });

  $("[name='reportstock']").click(function() {
      var id = $("#reportstock").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#reportstock").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#reportstock").val(value2);
      }
  });
  $("[name='reportfinance']").click(function() {
      var id = $("#reportfinance").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#reportfinance").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#reportfinance").val(value2);
      }
  });
  $("[name='reportquantity']").click(function() {
      var id = $("#reportquantity").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#reportquantity").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#reportquantity").val(value2);
      }
  });
  $("[name='reportsales']").click(function() {
      var id = $("#reportsales").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#reportsales").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#reportsales").val(value2);
      }
  });
  $("[name='reportdrawer']").click(function() {
      var id = $("#reportdrawer").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#reportdrawer").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#reportdrawer").val(value2);
      }
  });

  $("[name='databaseview']").click(function() {
      var id = $("#databaseview").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#databaseview").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#databaseview").val(value2);
      }
  });
  $("[name='databasebackup']").click(function() {
      var id = $("#databasebackup").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#databasebackup").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#databasebackup").val(value2);
      }
  });
  $("[name='databaserestore']").click(function() {
      var id = $("#databaserestore").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#databaserestore").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#databaserestore").val(value2);
      }
  });
  $("[name='databaseremove']").click(function() {
      var id = $("#databaseremove").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#databaseremove").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#databaseremove").val(value2);
      }
  });
  $("[name='miscellanousemail']").click(function() {
      var id = $("#miscellanousemail").val();
      var checked = $(this).is(':checked');
      if (checked) {
          var value1 = 1;
          var change1 = $("#miscellanousemail").val(value1);

      } else {
          var value2 = 0;
          var change2 = $("#miscellanousemail").val(value2);
      }
  });
</script>
<input type="hidden" id="id_sales" name="id_sales">