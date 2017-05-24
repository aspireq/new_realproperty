<?php echo $header; ?>
<section class="register">
    <div class="container">
        <button class="btn btn-primary btn-main btn-foo pull-right" name="add_new_property" id="add_new_property" onclick="window.location.href='<?php echo base_url();?>auth/add_property'">Post New Property</button>
        <form method="post" name="op_ad" id="op_ad" action="<?php echo base_url(); ?>auth/property_operation">
            <input type="hidden" name="record_change_type" id="record_change_type">
            <input type="hidden" name="table_name" id="table_name">
            <input type="hidden" name="record_id" id="record_id">
            <input type="hidden" name="page_url" id="page_url">
            <input type="hidden" name="image_folder" id="image_folder">
            <input type="hidden" name="table_names" id="table_names">
        </form>
        <div class="row">            
            <div class="col-md-8 col-sm-12 col-lg-8 col-md-offset-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Type</th>
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
                                    <td><?php echo $data->project_name; ?></td>
                                    <td><?php echo $data->property_type . '(' . $data->property_type_name . ')' ?></td>                                    
                                    <td><?php echo $data->created_date; ?></td>
                                    <td>
                                        <a class="teal-text" onclick="window.location.href='<?php echo base_url();?>index/propertydetails/<?php echo $data->id;?>'"><i class="fa fa-eye-slash"></i></a>
                                        <a class="teal-text" onclick="window.location.href='<?php echo base_url();?>auth/add_property/<?php echo $data->id;?>'"><i class="fa fa-pencil"></i></a>
                                        <a class="red-text" onclick="delete_property(<?php echo $data->id; ?>);"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td>
                                        <input type="checkbox" <?php echo ($data->status == 1) ? 'checked' : ''; ?> onclick="change_property_status(<?php echo $data->id; ?>);">
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
<?php echo $footer; ?>