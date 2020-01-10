
<table class="table table-striped table-bordered" id="dataTableselected" width="100%" cellspacing="0" style="font-size: 13px;color: #000;">
  <thead>
    <tr>
      <th>ID</th>
      <th>Opened By</th>
      <th>Open Time</th>
      <th>Cash in Hand</th>
      <th>Closed By</th>
      <th>Close Time</th>
      <th>Closing Cash</th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th>ID</th>
      <th>Opened By</th>
      <th>Open Time</th>
      <th>Cash in Hand</th>
      <th>Closed By</th>
      <th>Close Time</th>
      <th>Closing Cash</th>
    </tr>
  </tfoot>
  <tbody>
  	<!-- Jika nak ubah, disini asalnya -->
  	<?php 

		foreach ($drawerselect as $d) 
		{
	?>
	<tr style="background-color: #e3e6f0;">
	    <td><?php echo $d->id ?></td>
	    <td><?php echo $d->openBy?></td>
	    <td><?php echo $d->closedTime?></td>
	    <td><?php echo $d->openingCash?></td>
	    <td><?php echo $d->closedBy?></td>
	    <td><?php echo $d->closedTime?></td>
	    <td><?php echo $d->closingCash ?></td>
	</tr>

	<?php 
		}
	?>
  </tbody>

</table>

<script type="text/javascript">
$(document).ready(function() {
  $('#dataTableselected').DataTable( {
      "order": [2,'asc'],
      "dom": 'Bfrtip',
            "buttons": [
                        {
                           extend: 'pdf',
                           text: '<i class="fa fa-file-pdf"></i> PDF',
                           title: $('h1').text(),
                           orientation: 'landscape',
                           exportOptions: {
                           columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                            //Your Colume value those you want
                           }

                         },
                         {
                            extend: 'excel',
                            text: '<i class="fa fa-file-excel"></i> EXCEL',
                           	title: $('h1').text(),
                            exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ] //Your Colume value those you want
                         }
                       },
                     ],   

            "pageLength": 100,
            "processing": false,     
      });
  });
</script>