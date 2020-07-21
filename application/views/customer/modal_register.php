
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body modal-body-sub_agile">
    <div class="main-mailposi">
        <span class="fa fa-envelope-o" aria-hidden="true"></span>
    </div>
    <div class="modal_body_left modal_body_left1">
        <h3 class="agileinfo_sign">Sign Up</h3>
        <p>
            Come join the Grocery Shoppy! Let's set up your Account.
        </p>
        <form action="<?=base_url()?>Customer/Home/sign_up" method="post">
            <div class="styled-input agile-styled-input-top">
                <input type="text" placeholder="Name" name="Name" required="">
            </div>
            <div class="styled-input">
                <input type="email" placeholder="E-mail" name="Email" required="">
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Password" name="password" id="password1" required="">
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Confirm Password" name="ConfirmPassword" id="password2" required="">
            </div>
            <input type="submit" value="Sign Up">
        </form>
    </div>
</div>