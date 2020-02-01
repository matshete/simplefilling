<aside class="main-sidebar">

	<section class="sidebar">
		
		<ul class="sidebar-menu">

			<?php

			if ($_SESSION["profile"] == "administrator") {
				
				echo '

				
					<li class="active">

						<a href="home">

							<i class="fa fa-home"></i>

							<span>Home</span>

						</a>

					</li>

					<li>

						<a href="users">

							<i class="fa fa-user"></i>

							<span>User management</span>

						</a>

					</li>
					
					<li>

						<a href="customers">

							<i class="fa fa-user"></i>

							<span>Customers</span>

						</a>

					</li>';
					
					echo'
					
					<li class="treeview">
					
					<a href="#">
							<i class="fa fa-list-ul"></i>
							<span>CIPC Annual Returns</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
					</a>
					
						<ul class="treeview-menu">
						
						
						
							<li>

								<a href="cipc-annual-returns">

									<i class="fa fa-user"></i>

									<span>CIPC Annual Returns</span>

								</a>

							</li>
							<li>

								<a href="due">

									<i class="fa fa-user"></i>

									<span>CIPC Due Returns</span>

								</a>

							</li>
						</ul>
					</li>';
					
					echo'
					
					<li class="treeview">
					
					<a href="#">
							<i class="fa fa-list-ul"></i>
							<span>Employee Tax</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
					</a>
					
					<ul class="treeview-menu">
						<li>

							<a href="emp201">

								<i class="fa fa-user"></i>

								<span>Employee Tax Emp201</span>

							</a>

						</li>
						
						
						<li>

							<a href="emp501">

								<i class="fa fa-user"></i>

								<span>Employee Tax Emp501</span>

							</a>

						</li>
						
						
					
				</ul>
				</li>
					
					
					
					
					
					
					
					<li class="treeview">
					
					<a href="#">
							<i class="fa fa-list-ul"></i>
							<span>Income Tax</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
					</a>
					
				<ul class="treeview-menu">
					<li>

						<a href="it12">

							<i class="fa fa-user"></i>

							<span>	(ITR14/ITR12T/IT12EI)</span>

						</a>

					</li>
										

					<li>

						<a href="irp6">

							<i class="fa fa-user"></i>

							<span>Provisional Tax IRP6</span>

						</a>

					</li>
										
					
				</li>
				</ul>

					
						<li>
					<a href="it14sd">

							<i class="fa fa-user"></i>

							<span>IT14SD</span>

						</a>

					</li>
					
					
					
					
					
					
				<li class="treeview">
					
					<a href="#">
							<i class="fa fa-list-ul"></i>
							<span>Value Added Tax</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
					</a>
					
				<ul class="treeview-menu">
					<li>

						<a href="vatA">

							<i class="fa fa-user"></i>

							<span>(VAT201)CAT A</span>

						</a>

					</li>
										

					<li>

						<a href="vatB">

							<i class="fa fa-user"></i>

							<span>(VAT201)CAT B</span>

						</a>

					</li>
										
					<li>
					<a href="vatC">

							<i class="fa fa-user"></i>

							<span>(VAT201)CAT C</span>

						</a>

					</li>
				</li>
				</ul>
				
				
				
				
				
				
				
				
				
				
				<li class="treeview">
					
					<a href="#">
							<i class="fa fa-list-ul"></i>
							<span>Objections</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
					</a>
					
				<ul class="treeview-menu">
					<li>

						<a href="objemptax201">

							<i class="fa fa-user"></i>

							<span>Income Tax Objections</span>

						</a>

					</li>
										

					
										
				
				
					<li>
					<a href="objit12">

							<i class="fa fa-user"></i>

							<span>PAYE Objections</span>

						</a>

					</li>
				</li>
				
				
				
				
					<li>

						<a href="objvat">

							<i class="fa fa-user"></i>

							<span>VAT Objections</span>

						</a>

				</li>
				
				
				
				
				
				</ul>
				

				
					<li>

						<a href="taxclearance">

							<i class="fa fa-user"></i>

							<span>Tax Clearance</span>

						</a>

				</li>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<li>

						<a href="cidb">

							<i class="fa fa-user"></i>

							<span>CIDB</span>

						</a>

				</li>
				
				<li>

						<a href="coida">

							<i class="fa fa-user"></i>

							<span>COIDA</span>

						</a>

				</li>

				';
			}

		?>
			
		</ul>

	</section>
	
</aside>