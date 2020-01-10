<div class="mothergrid">
<div class="container">
		<div class="header">
			<div class="logo">
				<a href="index.html"><img width="150" height="50" src="<?php echo base_url('images/ProfixLogin.png');?>" alt=""/> </a>
			</div>
			<span class="menu"> <img src="./assetpublic/web/images/icon.png" alt=""/></span>
			<div class="clear"> </div>
			<div class="navg">
				<ul class="res">
					<li><a href="index.php">HOME</a></li>
					<!-- <li><a href="">ABOUT US</a></li> -->
					<li><a href="activitypagepublic.php">ACTIVITY</a></li>
					<!-- <li><a href="">CONTACT US</a></li> -->
					<li><a href="registerpage.php">SIGN UP</a></li>
					<li><a href="applicationregistration.php">APPLICATION</a></li>
					<li><button type="button" class="loginmodal" onclick="document.getElementById('id01').style.display='block'">LOG IN</button>
					</li>
				</ul>
				 <script>
                      $( "span.menu").click(function() {
                        $(  "ul.res" ).slideToggle("slow", function() {
                         // Animation complete.
                         });
                         });
                 </script>
			</div>
		<div class="clearfix"> </div>
		</div>
	</div>
	</div>