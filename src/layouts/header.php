<?php include_once('./src/layouts/metas.php'); ?>
<body>
<div class="main-top" id="home">
		<!-- header -->
		<header>
			<div class="container-fluid">
				<div class="header d-lg-flex justify-content-between align-items-center py-3 px-sm-3">
					<!-- logo -->
					<div id="logo">
						<h1><a href="./"><span class="fa fa-linode mr-2"></span>Startup</a></h1>
					</div>
					<!-- //logo -->
					<!-- nav -->
					<div class="nav_w3ls">
						<nav>
							<label for="drop" class="toggle">Menu</label>
							<input type="checkbox" id="drop" />
							<ul class="menu">
								<li><a href="./" class="<?=($this->request->opt->url == '/') ? 'active' : '' ?>">Home</a></li>
								<li><a href="./about" class="<?=($this->request->opt->url == '/about') ? 'active' : '' ?>">About Us</a></li>
								<li><a href="./pricing" class="<?=($this->request->opt->url == '/pricing') ? 'active' : '' ?>">Pricing</a></li>
								<li>
									<!-- First Tier Drop Down -->
									<label for="drop-2" class="toggle toogle-2">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span>
									</label>
									<a href="#">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span></a>
									<input type="checkbox" id="drop-2" />
									<ul>
										<li><a href="#services" class="drop-text">Services</a></li>
										<li><a href="faq.html" class="drop-text">Faq's</a></li>
										<li><a href="404.html" class="drop-text">404</a></li>
										<li><a href="#stats" class="drop-text">Statistics</a></li>
										<li><a href="./about" class="drop-text">Why Choose Us?</a></li>
										<li><a href="./about" class="drop-text">Our Team</a></li>
										<li><a href="#partners" class="drop-text">Partners</a></li>
									</ul>
								</li>
								<li><a href="./contact">Contact Us</a></li>
							</ul>
						</nav>
					</div>
					<!-- //nav -->
					<div class="d-flex mt-lg-1 mt-sm-2 mt-3 justify-content-center">
						<!-- search -->
						<div class="search-w3layouts mr-3">
							<form action="#" method="post" class="search-bottom-wthree d-flex">
								<input class="search" type="search" placeholder="Search Here..." required="">
								<button class="form-control btn" type="submit"><span class="fa fa-search"></span></button>
							</form>
						</div>
						<!-- //search -->
						<!-- download -->
						<a class="dwn-w3ls btn" href="http://w3layouts.com/" target="_blank">
							<span class="fa fa-cloud-download"></span>
						</a>
						<!-- //download -->
					</div>
				</div>
			</div>
		</header>
		<!-- //header -->