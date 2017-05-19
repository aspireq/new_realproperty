<?php echo $header; ?>
<section class="register">
    <div class="container">
        <div class="row">
            <button class="btn btn-primary btn-main btn-foo" name="exclusive_ad" id="exclusive_ad" onclick="add_exclusive_ad();">Add Exclusive Ad</button>
            <div class="col-md-5 center-block register-block">
                <div class="row">
                    <h3 class="block-title">Exclusive Ads</h3>                     
                    <form data-toggle="validator" enctype="multipart/form-data" role="form" method="post" id="user_profile">                                                
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
                                <label for="name" class="control-label">Name</label>
                                <input type="text" placeholder="" class="form-control" id="name" name="name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">                                
                                <label for="image" class="control-label" title="email/username">Email</label>
                                <input type="file" id="image" name="image">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-main">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="add_exclusive_ads" role="dialog">
    <div class="modal-dialog">
        <form method="post" name="post_ad" id="post_ad">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Exclusive Ad</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" placeholder="" class="form-control" id="name" name="name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">                                
                            <label for="image" class="control-label" title="email/username">Email</label>
                            <input type="file" id="image" name="image">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="edit_id" id="edit_id">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php echo $footer; ?>