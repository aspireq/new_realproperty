<?php echo $header; ?>
<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-5 center-block register-block">
                <div class="row">
                    <h3 class="block-title">Login</h3>                     
                    <form data-toggle="validator" role="form" method="post" id="login">                                                
                        <div class="col-md-12">
                            <?php
                            if ($message != "") {
                                ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $message; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <div class="icon-addon addon-lg">
                                    <input type="text" placeholder="Email/Username" class="form-control" id="login_identity" name="login_identity" data-error="please enter valid email address or username" required>
                                    <label for="login_identity" class="fa fa-search control-label" title="email/username"></label>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="icon-addon addon-lg">
                                    <input type="password" data-minlength="6" class="form-control" id="login_password" name="login_password" placeholder="Password" required>
                                    <label for="login_password" class="fa fa-lock control-label" rel="tooltip" title="password"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember_me" id="remember_me" value="1">Remember Me</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-main">Login</button>
                            </div>
                        </div>
                        <div class="col-md-12 text-center registerlink">
                            <a href="<?php echo base_url();?>auth/register">Are You New User? Register Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $footer; ?>