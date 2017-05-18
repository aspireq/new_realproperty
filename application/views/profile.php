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
                                <label for="uacc_username" class="control-label">Username</label>
                                <input type="text" placeholder="" class="form-control" id="uacc_username" name="uacc_username" readonly="" value="<?php echo $userinfo['uacc_username']; ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                
                                <label for="uacc_email" class="control-label" title="email/username">Email</label>
                                <input type="text" class="form-control" id="uacc_email" name="uacc_email" readonly="" value="<?php echo $userinfo['uacc_email']; ?>">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                
                                <label for="company_name" class="control-label" title="company_name">Company Name</label>
                                <input type="text" class="form-control" id="establishment_year" name="company_name" value="<?php echo ($userinfo['company_name'] != "") ? $userinfo['company_name'] : ''; ?>">  
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                
                                <label for="establishment_year" class="control-label" title="establishment_year">Establishment Year</label>
                                <input type="text" class="form-control" id="establishment_year" name="establishment_year" value="<?php echo ($userinfo['establishment_year'] != "") ? $userinfo['establishment_year'] : ''; ?>" maxlength="4">  
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                
                                <label for="total_projects" class="control-label" title="total_projects">Total Projects</label>
                                <input type="text" class="form-control" id="total_projects" name="total_projects" maxlength="5" value="<?php echo ($userinfo['total_projects'] != "") ? $userinfo['total_projects'] : ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                
                                <label for="description" class="control-label">Description</label>                                    
                                <textarea name="description" class="form-control"><?php echo ($userinfo['description'] != "") ? $userinfo['description'] : ''; ?></textarea>
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