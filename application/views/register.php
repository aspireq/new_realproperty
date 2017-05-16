<?php echo $header; ?> 
<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-5 center-block register-block">
                <div class="row">
                    <h3 class="block-title">Registeration</h3>
                    <form data-toggle="validator" role="form" method="post" id="register">
                        <div class="col-md-12">
                            <?php
                            if ($message != "") {
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $message; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group radio-group">
                                <div class="radio radio-danger">
                                    <input type="radio" name="user_type" id="exibitors" value="exhibitors" checked="">
                                    <label for="exibitors">
                                        Are You Exibitors?
                                    </label>
                                </div>
                                <div class="radio radio-danger">
                                    <input type="radio" name="user_type" id="visitors" value="visitor">
                                    <label for="visitors">
                                        Are You Visitors?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="icon-addon addon-lg">
                                    <input type="text" placeholder="UserName" class="form-control" id="register_username" name="register_username" required onchange="checkusername()">
                                    <label for="register_username" class="fa fa-user control-label"  title="UserName"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="icon-addon addon-lg">
                                    <input type="email" placeholder="Email" class="form-control" id="register_email_address" name="register_email_address" data-error="please enter valid email address" required>
                                    <label for="register_email_address" class="fa fa-search control-label" title="email"></label>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="icon-addon addon-lg">
                                    <input type="password" data-minlength="6" class="form-control" id="register_password" name="register_password" placeholder="Password" required>
                                    <label for="register_password" class="fa fa-lock control-label" rel="tooltip" title="password"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="icon-addon addon-lg">
                                    <input type="password" class="form-control" id="inputPasswordConfirm" name="inputPasswordConfirm" data-match="#register_password" data-match-error="Whoops, these don't match" placeholder="Re-Enter Password" required>
                                    <label for="inputPasswordConfirm" class="fa fa-lock control-label" rel="tooltip" title="password"></label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="terms" name="terms"> I have READ and AGREED with the <a href="#">Terms & Conditions.</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-main">Create Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $footer; ?>
<script>
$(document).ready(function(){ 
});
function checkusername() {
    var username = $('login_ident')
}
</script>
