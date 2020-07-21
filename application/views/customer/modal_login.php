<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div>
	<div class="modal-body modal-body-sub_agile">
		<div class="main-mailposi">
			<span class="fa fa-envelope-o" aria-hidden="true"></span>
		</div>
		<div class="modal_body_left modal_body_left1">
			<h3 class="agileinfo_sign">Sign In </h3>
			<p>
				Sign In now, Let's start your Grocery Shopping. Don't have an account?
				<a href="#" data-toggle="modal" data-target="#myModal2">
					Sign Up Now</a>
			</p>
			<form action="<?=base_url()?>Customer/Home/sign_in" method="post">
				<div class="styled-input agile-styled-input-top">
					<input type="email" placeholder="Email" name="email" required="">
				</div>
				<div class="styled-input">
					<input type="password" placeholder="Password" name="password" required="">
				</div>
				<input type="submit" value="Sign In">
			</form>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>