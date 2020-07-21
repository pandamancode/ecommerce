<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>ECOMMERCE</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	
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
					<a href="<?=base_url()?>home">
						<span>G</span>rosir
						<span>I</span>D
						<img src="<?=base_url()?>resource/images/logo2.png" alt=" ">
					</a>
				</h1>
            </div>
            
			<!-- header-bot -->
			<div class="col-md-8 header">
				<ul>
					<li><span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678</li>
					<?php if($this->session->userdata('logged_in')==true){ ?>
						<li><a href="javascript:;"><span class="fa fa-user" aria-hidden="true"></span> Akun Saya </a></li>
						<li><a href="<?=base_url()?>logout"><span class="fa fa-sign-out" aria-hidden="true"></span> Logout </a></li>
					<?php }else{ ?>
						<li><a href="javascript:;" class="btn-login"><span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a></li>
						<li><a href="javascript:;" class="btn-register"><span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a></li>
					<?php } ?>
				</ul>
                
				<!-- search -->
				<div class="agileits_search">
					<form action="#" method="post">
						<input name="cari_txt" type="search" placeholder="How can we help you today?" required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<span class="fa fa-search" aria-hidden="true"> </span>
						</button>
					</form>
				</div>
                <!-- //search -->
                
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<button class="w3view-cart btn-opencart" type="button" name="submit"><i class="fa fa-cart-arrow-down fa-fw" aria-hidden="true"></i></button>
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
			<p>© 2020 Grosir ID. All rights reserved | Design by
				<a href="http://w3layouts.com"> W3layouts.</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->
	
	<div id="tempat-modal"></div>

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

	<!--modal login & register -->
	<script>
		$(document).on("click", ".btn-login", function() {
			var id = $(this).attr("data-id");
			
			$.ajax({
				method: "POST",
				url: "<?php echo base_url('Customer/Home/login'); ?>",
				data: "id=" +id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);        
				$('#md_login').modal('show');
			})
		})

		$(document).on("click", ".btn-register", function() {
			var id = $(this).attr("data-id");
			
			$.ajax({
				method: "POST",
				url: "<?php echo base_url('Customer/Home/register'); ?>",
				data: "id=" +id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);        
				$('#md_register').modal('show');
			})
		})

		$(document).on("click", ".btn-opencart", function() {
			var id = $(this).attr("data-id");
			
			$.ajax({
				method: "POST",
				url: "<?php echo base_url('Customer/Home/opencart'); ?>",
				data: "id=" +id
			})
			.done(function(data) {
				$('#tempat-modal').html(data);        
				$('#md_opencart').modal('show');
			})
		})

		<?php if ($this->session->flashdata('status')=='error'){ ?>
		swal({
			title: "Failed",
			text: "<?=$this->session->flashdata('msg')?>",
			timer: 1500,
			showConfirmButton: false,
			type: "<?=$this->session->flashdata('status')?>"
		});
		<?php }else if($this->session->flashdata('status')=='success'){ ?>
		swal({
			title: "Done",
			text: "<?=$this->session->flashdata('msg')?>",
			timer: 1500,
			showConfirmButton: false,
			type: "<?=$this->session->flashdata('status')?>"
		});
		<?php } ?>
	</script>
</body>

</html>