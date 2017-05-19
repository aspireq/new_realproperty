<?php echo $header; ?>
<section class="register">
    <div class="container">
        <button class="btn btn-primary btn-main btn-foo pull-right" name="exclusive_ad" id="exclusive_ad" onclick="add_exclusive_ad();">Post New Ad</button>
        <form method="post" name="op_ad" id="op_ad" action="<?php echo base_url(); ?>auth/record_change">
            <input type="hidden" name="record_change_type" id="record_change_type">
            <input type="hidden" name="table_name" id="table_name">
            <input type="hidden" name="record_id" id="record_id">
            <input type="hidden" name="page_url" id="page_url">
            <input type="hidden" name="image_folder" id="image_folder">
        </form>
        <div class="row">            
            <div class="col-md-8 col-sm-12 col-lg-8 col-md-offset-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($this->uri->segment(3) != "") {
                            $record_counter = $this->uri->segment(3) + 1;
                        } else {
                            $record_counter = 1;
                        }
                        array_pop($results);
                        if (!empty($results)) {
                            foreach ($results as $data) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $record_counter; ?></th>
                                    <td><?php echo $data->name; ?></td>
                                    <?php if ($data->ad_type == 1) { ?>
                                        <td>Property Gallery</td>
                                    <?php } else if ($data->ad_type == 2) { ?>
                                        <td>Exclusive Ad</td>
                                    <?php } ?>
                                    <td><img height="100px" width="200px" src="<?php echo base_url(); ?>includes/exclusive_ad/<?php echo ($data->image != "" && (file_exists(FCPATH . 'includes/exclusive_ad/' . $data->image))) ? $data->image : 'noimage.jpg' ?>"</td>
                                    <td><?php echo $data->created_date; ?></td>
                                    <td>                   
                                        <a class="teal-text" onclick="edit_ad(<?php echo $data->id; ?>);"><i class="fa fa-pencil"></i></a>
                                        <a class="red-text" onclick="delete_ad(<?php echo $data->id; ?>);"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td>
                                        <input type="checkbox" <?php echo ($data->status == 1) ? 'checked' : ''; ?> onclick="change_status(<?php echo $data->id; ?>);">
                                    </td>
                                </tr>
                                <?php
                                $record_counter++;
                            }
                        } else {
                            echo '<tr><td>No Records Found!</td></tr>';
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination pull-right">
                        <?php
                        foreach ($links as $link) {
                            echo "<li>" . $link . "</li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="add_exclusive_ads" role="dialog">
    <div class="modal-dialog">
        <form method="post" name="post_ad" id="post_ad" enctype="multipart/form-data">
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
                            <label for="image" class="control-label" title="email/username">Image</label>
                            <input type="file" id="image" name="image">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">                                
                            <label for="ad_type" class="control-label" title="email/username">Add As</label>
                            <br><input type="radio" id="property" name="ad_type" value="1">Property
                            <input type="radio" id="exclusive_ad_type" name="ad_type" value="2">Exclusive Ad
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="edit_id" id="edit_id">
                <input type="hidden" name="old_image" id="old_image">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php echo $footer; ?>