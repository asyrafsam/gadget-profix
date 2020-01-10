
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GADGET PROFIX</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://gadgettrading.net/repairs/themes/adminlte/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gadgettrading.net/repairs/themes/adminlte/assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="https://gadgettrading.net/repairs/themes/adminlte/assets/dist/css/custom/home.css">
    <link rel="stylesheet" href="https://gadgettrading.net/repairs/themes/adminlte/assets/dist/css/custom/custom.css">
    <!-- <link rel="stylesheet" href="https://gadgettrading.net/repairs/themes/adminlte/assets/bower_components/font-awesome/css/font-awesome.min.css"> -->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ;?>" rel="stylesheet">
    <script src="https://gadgettrading.net/repairs/themes/adminlte/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://gadgettrading.net/repairs/themes/adminlte/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://gadgettrading.net/repairs/themes/adminlte/assets/plugins/toastr/toastr.min.js"></script>
    <script>var base_url = "https://gadgettrading.net/repairs/";</script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>

    // jQuery(document).ready(function () {
    // var postJSON;
    // postJSON = 'aa'

    // toastr.options = {
    //     "closeButton": true,
    //     "debug": false,
    //     "progressBar": true,
    //     "positionClass": "toast-bottom-right",
    //     "onclick": null,
    //     "showDuration": "300",
    //     "hideDuration": "1000",
    //     "timeOut": "5000",
    //     "extendedTimeOut": "1000",
    //     "showEasing": "swing",
    //     "hideEasing": "linear",
    //     "showMethod": "fadeIn",
    //     "hideMethod": "fadeOut"
    // }

    // jQuery(document).on("click", "#submit", function () {
    //         $('#loadingmessage').show();  // show the loading message.

    //         var code = jQuery('#code').val();
    //         var url = "";
    //         var dataString = "";
    //         url = "welcome/status";
    //         dataString = "code=" + code;
    //         jQuery.ajax({
    //             type: "POST",
    //             url: url,
    //             data: dataString,
    //             cache: false,
    //             dataType: "json",
    //             success: function (data) {
    //         $('#loadingmessage').hide();
    //                 if(isEmpty(data)) {toastr['error']("Error", "Invalid Reparation Code");}
    //                 else {
    //                     var status = "<span class='label' style='background-color:"+data.bg_color+"; color:"+data.fg_color+"'>"+data.status+"</span>";
    //                     toastr['success']("Success", "Reparation")
    //                     jQuery('#client_name').html(data.name);
    //                     jQuery('#status').html(status);
    //                     jQuery('#date_opening').html(data.date_opening);
    //                     jQuery('#defect').html(data.defect);
    //                     jQuery('#model_name').html(data.model_name);

             
    //                     jQuery('#grand_total').html("RM "+(parseFloat(data.grand_total)).toFixed(2));
    //                     jQuery('#advance').html("RM "+data.advance);
    //                     jQuery('#result').fadeIn(1000);
    //         jQuery('#comment').html(data.comment);
    //         jQuery('#diagnostics').html(data.diagnostics);

    //         if(data.date_closing == null) {
    //           jQuery('.centre_box div.date_closing_div').hide();
    //         } else {
    //           jQuery('.centre_box div.date_closing_div').fadeIn();
    //           jQuery('#date_closing').html(data.date_closing)
    //         }
    //                 }
    //             }
    //         });
    //     });

    // });

    // function isEmpty(obj) {
    //     return Object.keys(obj).length === 0;
    // }
    </script>
    <style type="text/css">
    .label{
      white-space: inherit;
      display: block;
    }
      .loader {
          color: white;
          top: 0;
          right: 0;
          position: fixed;
          width: 106px;
          height: 106px;
          background: url('https://gadgettrading.net/repairs/assets/dist/img/loading-page.gif') no-repeat center;
          z-index: 4;
      }
      .bio-row p span.bold{
        width: 100%;
      }

      body, html {
        height: 100%;
        margin: 0;
        font: 400 15px/1.8 "Lato", sans-serif;
        color: #777;
      }


    </style>
    <div id='loadingmessage' class="loader" style='display:none'></div>

  </head>

  <body class="">


    <div class="container ">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
             <li role="presentation">
                
            </li> 
            <li role="presentation"><a href="<?php echo base_url('Main/adminlogin');?>">Login</a></li>
           
          </ul>
        </nav>
        <img height="90" src="https://gadgettrading.net/repairs/assets/uploads/logos/3a6460ef42df0a8e23debadefd2770cd.png">
      </div>

      <div class="jumbotron">
        <h1>GADGET PROFIX</h1>
        <div class="pull-left">
            <label>REPARATION CODE</label>
            <small>Please enter your reparation code.</small>
        </div>
        <input type="text" id="code" name="code" class="form-control" ><br>
        <button class="btn btn-primary" id="submit" onclick="searchcode();">Submit</button>
      </div>
	    <div class="marketing" id="searchresult">
	        
	    </div>
      <footer class="footer">
        <p>&copy; 2020 GADGET PROFIX</p>
      </footer>
    </div> <!-- /container -->
  </body>
  <script type="text/javascript">
  	function searchcode(){
  		var code = document.getElementById("code").value;
  		// alert(code);
  		if(!code){
  			alert('empty');
  		}else{
  			var data = {'repairno':code}
		    $.ajax({
		                    url: '<?= base_url() ?>M_function/searchrepair',
		                    type: 'POST',
		                    dataType: 'html',
		                    data: data,
		                    beforeSend: function() {

		                    },
		                    success: function(response){

		                        $('#searchresult').html(response);
		                    }
		            });
  		}
  		
  	}
  </script>
</html>