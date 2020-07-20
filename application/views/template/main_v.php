<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>ECOMMERCE</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
    <?php $this->load->view('template/css') ?>
    <?php $this->load->view('template/js') ?>
</head>

<body>
	<!-- top-header -->
	<div class="header-most-top">
		<p>Grocery Offer Zone Top Deals & Discounts</p>
	</div>
    <!-- //top-header -->
    
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="index.html">
						<span>G</span>rocery
						<span>S</span>hoppy
						<img src="<?=base_url()?>resource/images/logo2.png" alt=" ">
					</a>
				</h1>
            </div>
            
			<!-- header-bot -->
			<div class="col-md-8 header">
				<ul>
					<li><span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678</li>
					<li><a href="#" data-toggle="modal" data-target="#myModal1"><span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a></li>
					<li><a href="#" data-toggle="modal" data-target="#myModal2"><span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a></li>
                </ul>
                
				<!-- search -->
				<div class="agileits_search">
					<form action="#" method="post">
						<input name="Search" type="search" placeholder="How can we help you today?" required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>
                <!-- //search -->
                
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<form action="#" method="post" class="last">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="display" value="1">
							<button class="w3view-cart" type="submit" name="submit">
								<i class="fa fa-cart-arrow-down fa-fw" aria-hidden="true"></i>
							</button>
						</form>
					</div>
				</div>
				<!-- //cart details -->
				<div class="clearfix"></div>
            </div>
            
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- shop locator (popup) -->
 
    <!--modal login & register -->
    
    
	<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			<div class="col-md-12">
				<form action="<?=base_url()?>Customer/Home/index" method="post">
					<select id="agileinfo-nav_search" onchange="this.form.submit()" name="kategori" required="" >
                        <option disabled selected value="">Semua Kategori</option>
                        <?php foreach(kategori_produk()->result() as $k){ ?>
						<option value="<?=$k->id_kategori?>" <?php if($this->session->userdata('sess_id_kategori')==$k->id_kategori){ echo "selected"; } ?> ><?=$k->kategori_produk?></option>
                        <?php } ?>
					</select>
				</form>
			</div>
		</div>
	</div>
    <!-- //navigation -->
    
	<!-- banner -->
	<?php $this->load->view('template/banner')?>
	<!-- //banner -->

	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Our Top Products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
            </h3>
            
			<div class="agileinfo-ads-display col-md-12">
				<div class="wrapper">
                    <?php $this->load->view($content) ?>
				</div>
			</div>

        </div>
    </div>
    
    <?php $this->load->view('template/special') ?>
    
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© 2017 Grocery Shoppy. All rights reserved | Design by
				<a href="http://w3layouts.com"> W3layouts.</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->


	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
    </script>
    
    <!--script>
		paypalm.minicartk.render(); //use only unique class names other than paypalm.minicartk.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
    </script-->
    
    <script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
    </script>
    
    <script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- password-script -->
	

	<!--script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<script>
		$(document).ready(function () {
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
		});
	</script-->

</body>

</html>