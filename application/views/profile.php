<?php echo $header; ?>
<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-5 center-block register-block">
                <div class="row">
                    <h3 class="block-title">User Profile</h3>                     
                    <form data-toggle="validator" role="form" method="post" id="user_profile">                                                
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
                                    <label for="uacc_username" class="control-label">Username</label>
                                    <input type="text" placeholder="" class="form-control" id="uacc_username" name="uacc_username" readonly="" value="<?php echo $userinfo['uacc_username']; ?>">                                    
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="icon-addon addon-lg">
                                    <label for="uacc_email" class="control-label" title="email/username">Email</label>
                                    <input type="text" class="form-control" id="uacc_email" name="uacc_email" readonly="" value="<?php echo $userinfo['uacc_email']; ?>">                                    
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="icon-addon addon-lg">
                                    <label for="descrption" class="control-label">Description</label>                                    
                                    <textarea name="descrption" class="form-control"></textarea>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="icon-addon addon-lg">
                                    <label for="establishment_year" class="control-label" title="establishment_year">Establishment Year</label>
                                    <input type="text" class="form-control" id="establishment_year" name="establishment_year">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-main">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $footer; ?>