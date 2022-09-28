<div class="topbar">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-12 col-12">
				<!-- Top Left -->
				<div class="top-left">
					<ul class="list-main">
						<li><i class="ti-headphone-alt"></i> +84 981 617 653</li>
						<li><i class="ti-email"></i> support@shophub.com</li>
					</ul>
				</div>
				<!--/ End Top Left -->
			</div>
			<div class="col-lg-8 col-md-12 col-12">
				<!-- Top Right -->
				<div class="right-content">
					<ul class="list-main">
						<li><i class="ti-user"></i> <a href="#"><?php if($customerName == ''){echo '';}
						else{echo 'Wellcome'.$customerName;}  ?></a></li>
						<li><i class="ti-power-off"></i><?php if($customerName!=''){
							echo "<a href=\"".$path."logout"."\">Logout</a>";
						}
							else{echo "<a href=\"".$path."login"."\">Login</a>";}
							?>
						 </li>
					</ul>
				</div>
				<!-- End Top Right -->
			</div>
		</div>
	</div>
</div>