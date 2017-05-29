<?php
$newdata = array(
    'property_unique_no' => mt_rand()
);
$this->session->set_userdata('property_data', $newdata);
?>
<?php echo $header; ?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="barWrapper">
                <span class="progressText"> 
                </span>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="5">
                        <span id="prg" class="popOver" data-toggle="tooltip" data-placement="top" title="0%"></span>
                    </div>
                </div>  
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 bhoechie-tab-container">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 bhoechie-tab-menu">
                        <ul class="list list-group" role="tablist">
                            <li role="presentation" class="active"><a href="#basicdetail" aria-controls="basicdetail" role="tab" data-toggle="tab" data-step="1" class="list-group-item"><i class="fa fa-file-o"></i> Basic Detail <i class="fa fa-exclamation-circle fa-yellow"></i></a></li>

                            <li role="presentation" class="disabled"><a href="#location" aria-controls="location" role="tab" data-toggle="tab" data-step="2" class="list-group-item"><i class="fa fa-map-marker"></i> Location <i class="fa fa-exclamation-circle fa-yellow"></i></a></li>

                            <li role="presentation" class="disabled"><a href="#propertydetail" aria-controls="propertydetail" role="tab" data-step="3" data-toggle="tab" class="list-group-item"><i class="fa fa-building-o"></i> Property Detail <i class="fa fa-exclamation-circle fa-yellow"></i></a></li>

                            <li role="presentation" class="disabled">
                                <a href="#pricing" aria-controls="pricing" role="tab" data-toggle="tab" data-step="4" class="list-group-item">
                                    <i class="fa fa-money"></i> Pricing <i class="fa fa-exclamation-circle fa-yellow"></i></a>
                            </li>

                            <li role="presentation" class="disabled"><a href="#view" aria-controls="view" role="tab" data-toggle="tab" data-step="5" class="list-group-item"><i class="fa fa-street-view"></i> 360&deg; View<i class="fa fa-exclamation-circle fa-yellow"></i></a></li>

                            <li role="presentation" class="disabled"><a href="#features" aria-controls="features" role="tab" data-step="6" data-toggle="tab" class="list-group-item"><i class="fa fa-magic"></i> Features<i class="fa fa-exclamation-circle fa-yellow"></i></a></li>

                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 bhoechie-tab-content">
                        <?php
                        if ($message != "") {
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $message; ?>
                            </div>
                        <?php } ?>
                        <form method="post" id="add_property" role="form" enctype="multipart/form-data">
                            <input type="hidden" name='edit_id' id="edit_id" value="<?php echo (!empty($propertyinfo) && $propertyinfo->id != "") ? $propertyinfo->id : ''; ?>">
                            <input type="hidden" name="user_type" id="user_type" value="owner" > 
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="basicdetail">                                    
                                    <div class="adform">
                                        <div class="form-group">
                                            <label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Are You ?<sup>*</sup></label>
                                            <div class="input-group">
                                                <div id="radioBtn" class="btn-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a class="btn btn-primary btn-sm <?php echo (!empty($propertyinfo) && $propertyinfo->added_as == "owner") ? 'active' : 'notActive' ?>  user_type" onclick="set_usertype('owner');" data-toggle="fun" data-title="Y"><h4><img src="<?php echo base_url(); ?>includes/img/owner.png" width="30" />&nbsp;Owner</h4></a>
                                                    <a class="btn btn-primary btn-sm <?php echo (!empty($propertyinfo) && $propertyinfo->added_as == "dealer") ? 'active' : 'notActive' ?> user_type" onclick="set_usertype('dealer');" data-toggle="fun" data-title="X"><h4><img src="<?php echo base_url(); ?>includes/img/dealer.png" width="30" />&nbsp;Dealer</h4></a>
                                                    <a class="btn btn-primary btn-sm <?php echo (!empty($propertyinfo) && $propertyinfo->added_as == "builder") ? 'active' : 'notActive' ?> user_type" onclick="set_usertype('builder');" data-toggle="fun" data-title="N"><h4><img src="<?php echo base_url(); ?>includes/img/worker.png" width="30" />&nbsp;Builder</h4></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="property_type" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">List property for: </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="property_type" id="property_type" onchange="set_propery_types();">
                                                    <option value="Sell" <?php echo (!empty($propertyinfo) && $propertyinfo->property_type == "Sell") ? 'selected' : ''; ?>>Sell</option>
                                                    <option value="Rent/Lease" <?php echo (!empty($propertyinfo) && $propertyinfo->property_type == "Rent/Lease") ? 'selected' : ''; ?>>Rent/Lease</option>
                                                    <option value="PayingGuest" <?php echo (!empty($propertyinfo) && $propertyinfo->property_type == "Paying Guest") ? 'selected' : ''; ?>>Paying Guest</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" id="property_types">
                                            <label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Property Type: </label>                                           
                                        </div>
                                        <div class="form-group" id="property_error">
                                            <label for='' generated='true' class='col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label has-error' style='color:red;'>Please select the type of Property you wish to Advertise.</label>
                                        </div>
                                        <div id="resengital_options">
                                        </div>
                                        <div id="rent_options">
                                        </div>
                                        <div id="sell_options">
                                        </div>                                 
                                        <div class="form-group" id="property_unit_error">
                                            <label for='' generated='true' class='col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label has-error' style='color:red;'>Please specify the number of Property Units available</label>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="button" class="btn btn-success pull-right" id="btn_step1" name="btn_step1">LET'S GET STARTED&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Location section -->
                                <div role="tabpanel" class="tab-pane" id="location">
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label for="project_name" class="col-sm-3 control-label">Project Name:<sup>*</sup></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project Name" value="<?php echo (!empty($propertyinfo) && $propertyinfo->project_name != "") ? $propertyinfo->project_name : ''; ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="property_location" class="col-sm-3 control-label">Location:<sup>*</sup></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="us3-address" name="property_location"  value="<?php echo (!empty($propertyinfo) && $propertyinfo->property_location != "") ? $propertyinfo->property_location : ''; ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="property_address" class="col-sm-3 control-label">Address:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="property_address" name="property_address" placeholder="type here.." value="<?php echo (!empty($propertyinfo) && $propertyinfo->property_address != "") ? $propertyinfo->property_address : ''; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="area_name" class="col-sm-3 control-label">Area Name:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="area_name" name="area_name" placeholder="type here.." value="<?php echo (!empty($propertyinfo) && $propertyinfo->area_name != "") ? $propertyinfo->area_name : ''; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city_name" class="col-sm-3 control-label">City Name:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="city_name" name="city_name" placeholder="type here.." value="<?php echo (!empty($propertyinfo) && $propertyinfo->city_name != "") ? $propertyinfo->city_name : ''; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="property_zone" class="col-sm-3 control-label">Zone: </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="property_zone" id="property_zone">
                                                    <?php
                                                    $name = "";
                                                    foreach ($ablums as $key => $values) {
                                                        if ($name != $values['city_name']) {
                                                            echo '<optgroup label="' . $values['city_name'] . '">';
                                                        }
                                                        echo '<option value="' . $values['area_id'] . '">' . $values['name'] . '</option>';
                                                        if ($name != $values['city_name']) {
                                                            echo '</optgroup>';
                                                        }
                                                        $name = $values['city_name'];
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="property_neardesc" class="col-sm-3 control-label">About Near By Area:<sup>*</sup></label>
                                            <div class="col-sm-9">
                                                <textarea name="property_neardesc" id="property_neardesc" class="form-control" placeholder="Write about near by places like railway station,hospital etc."><?php echo (!empty($propertyinfo) && $propertyinfo->property_neardesc != "") ? $propertyinfo->property_neardesc : ''; ?></textarea>
                                            </div>
                                        </div>                                        
                                        <div id="us3" style=""></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right">
                                                <button class="btn btn-default prev-step" type="button"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;PREVIOUS</button>
                                                <button class="btn btn-success" type="submit" name="btn_step2" id="btn_step2">NEXT&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Property Detail search -->
                                <div role="tabpanel" class="tab-pane" id="propertydetail">
                                    <h4><b>Area Detail</b></h4>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Configuration: </label>                                           
                                            <select class="form-control" name="propery_configuration" id="propery_configuration">
                                                <option value="2 BHK" <?php echo (!empty($propertyinfo) && $propertyinfo->property_configuration == "2 BHK") ? 'selected' : ''; ?>>2 BHK</option>
                                                <option value="3 BHK" <?php echo (!empty($propertyinfo) && $propertyinfo->property_configuration == "3 BHK") ? 'selected' : ''; ?>>3 BHK</option>
                                                <option value="4 BHK" <?php echo (!empty($propertyinfo) && $propertyinfo->property_configuration == "4 BHK") ? 'selected' : ''; ?>>4 BHK</option>
                                                <option value="5 BHK" <?php echo (!empty($propertyinfo) && $propertyinfo->property_configuration == "5 BHK") ? 'selected' : ''; ?>>5 BHK</option>
                                                <option value="6 BHK" <?php echo (!empty($propertyinfo) && $propertyinfo->property_configuration == "6 BHK") ? 'selected' : ''; ?>>6 BHK</option>
                                                <option value="7 BHK" <?php echo (!empty($propertyinfo) && $propertyinfo->property_configuration == "7 BHK") ? 'selected' : ''; ?>>7 BHK</option>
                                                <option value="Other" <?php echo (!empty($propertyinfo) && $propertyinfo->property_configuration == "Other") ? 'selected' : ''; ?>>Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Plot Area: </label>
                                            <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input class="form-control" type="text" name="plot_area" id="plot_area" value="<?php echo (!empty($propertyinfo) && $propertyinfo->plot_area != "0") ? $propertyinfo->plot_area : ''; ?>">
                                                <span class="input-group-btn">
                                                    <select class="btn btn-default" name="plot_area_unit" id="plot_area_unit">
                                                        <?php
                                                        foreach ($unitsinfo as $unit) {
                                                            ?>
                                                            <option value="<?php echo $unit->id ?>" <?php echo (!empty($propertyinfo) && $propertyinfo->plot_area_unit == $unit->id) ? 'selected' : ''; ?>><?php echo $unit->short_name; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Built Up Area: </label>
                                            <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input class="form-control" type="text" name="builtuparea" id="builtuparea" value="<?php echo (!empty($propertyinfo) && $propertyinfo->build_up_area != "0") ? $propertyinfo->build_up_area : ''; ?>">
                                                <span class="input-group-btn">
                                                    <select class="btn btn-default" name="builtuparea_unit" id="builtuparea_unit">
                                                        <?php
                                                        foreach ($unitsinfo as $unit) {
                                                            ?>
                                                            <option value="<?php echo $unit->id ?>" <?php echo (!empty($propertyinfo) && $propertyinfo->build_up_area_unit == $unit->id) ? 'selected' : ''; ?>><?php echo $unit->short_name; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Carpet Area: </label>
                                            <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input class="form-control" type="text" name="carpet_area" id="carpet_area" value="<?php echo (!empty($propertyinfo) && $propertyinfo->carpet_area != "0") ? $propertyinfo->carpet_area : ''; ?>">
                                                <span class="input-group-btn">
                                                    <select class="btn btn-default" name="carpet_area_unit" id="carpet_area_unit">
                                                        <?php
                                                        foreach ($unitsinfo as $unit) {
                                                            ?>
                                                            <option value="<?php echo $unit->id ?>" <?php echo (!empty($propertyinfo) && $propertyinfo->carpet_area_unit == $unit->id) ? 'selected' : ''; ?>><?php echo $unit->short_name; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="extra_detail" class="checkbox-inline">
                                                <input type="checkbox" id="extra_detail" name="extra_detail" value="1"> Add more details floors
                                            </label>
                                        </div>
                                        <div id="addition_floorinfo">
                                            <div class="form-group col-md-6">
                                                <label>Total Floors: </label>
                                                <select class="form-control" name="total_floor" id="total_floor">
                                                    <option value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "1") ? 'selected' : ''; ?>>1</option>
                                                    <option value="2" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "2") ? 'selected' : ''; ?>>2</option>
                                                    <option value="3" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "3") ? 'selected' : ''; ?>>3</option>
                                                    <option value="4" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "4") ? 'selected' : ''; ?>>4</option>
                                                    <option value="5" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "5") ? 'selected' : ''; ?>>5</option>
                                                    <option value="6" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "6") ? 'selected' : ''; ?>>6</option>
                                                    <option value="7" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "7") ? 'selected' : ''; ?>>7</option>
                                                    <option value="8" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "8") ? 'selected' : ''; ?>>8</option>
                                                    <option value="9" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "9") ? 'selected' : ''; ?>>9</option>
                                                    <option value="10" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "10") ? 'selected' : ''; ?>>10</option>
                                                    <option value="11" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "11") ? 'selected' : ''; ?>>11</option>
                                                    <option value="12" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "12") ? 'selected' : ''; ?>>12</option>
                                                    <option value="13" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "13") ? 'selected' : ''; ?>>13</option>
                                                    <option value="14" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "14") ? 'selected' : ''; ?>>14</option>
                                                    <option value="15" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "15") ? 'selected' : ''; ?>>15</option>
                                                    <option value="16" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "16") ? 'selected' : ''; ?>>16</option>
                                                    <option value="17" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "17") ? 'selected' : ''; ?>>17</option>
                                                    <option value="18" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "18") ? 'selected' : ''; ?>>18</option>
                                                    <option value="19" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "19") ? 'selected' : ''; ?>>19</option>
                                                    <option value="20" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "20") ? 'selected' : ''; ?>>20</option>
                                                    <option value="21" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "21") ? 'selected' : ''; ?>>21</option>
                                                    <option value="22" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "22") ? 'selected' : ''; ?>>22</option>
                                                    <option value="23" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "23") ? 'selected' : ''; ?>>23</option>
                                                    <option value="24" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "24") ? 'selected' : ''; ?>>24</option>
                                                    <option value="25" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "25") ? 'selected' : ''; ?>>25</option>
                                                    <option value="26" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "26") ? 'selected' : ''; ?>>26</option>
                                                    <option value="27" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "27") ? 'selected' : ''; ?>>27</option>
                                                    <option value="28" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "28") ? 'selected' : ''; ?>>28</option>
                                                    <option value="29" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "29") ? 'selected' : ''; ?>>29</option>
                                                    <option value="30" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "30") ? 'selected' : ''; ?>>30</option>
                                                    <option value="31" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "31") ? 'selected' : ''; ?>>31</option>
                                                    <option value="32" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "32") ? 'selected' : ''; ?>>32</option>
                                                    <option value="33" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "33") ? 'selected' : ''; ?>>33</option>
                                                    <option value="34" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "34") ? 'selected' : ''; ?>>34</option>
                                                    <option value="35" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "35") ? 'selected' : ''; ?>>35</option>
                                                    <option value="36" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "36") ? 'selected' : ''; ?>>36</option>
                                                    <option value="37" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "37") ? 'selected' : ''; ?>>37</option>
                                                    <option value="38" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "38") ? 'selected' : ''; ?>>38</option>
                                                    <option value="39" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "39") ? 'selected' : ''; ?>>39</option>
                                                    <option value="40" <?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "40") ? 'selected' : ''; ?>>40</option>
                                                    <option value="40+"<?php echo (!empty($propertyinfo) && $propertyinfo->total_floor == "40+") ? 'selected' : ''; ?>>40+</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Propery on Floor: </label>
                                                <select class="form-control" name="property_on_floor " id="property_on_floor">
                                                    <option value="Basement" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "Basement") ? 'selected' : ''; ?>>Basement</option>
                                                    <option value="Lower Ground" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "Lower Ground") ? 'selected' : ''; ?>>Lower Ground</option>
                                                    <option value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "1") ? 'selected' : ''; ?>>1</option>
                                                    <option value="2" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "2") ? 'selected' : ''; ?>>2</option>
                                                    <option value="3" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "3") ? 'selected' : ''; ?>>3</option>
                                                    <option value="4" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "4") ? 'selected' : ''; ?>>4</option>
                                                    <option value="5" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "5") ? 'selected' : ''; ?>>5</option>
                                                    <option value="6" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "6") ? 'selected' : ''; ?>>6</option>
                                                    <option value="7" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "7") ? 'selected' : ''; ?>>7</option>
                                                    <option value="8" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "8") ? 'selected' : ''; ?>>8</option>
                                                    <option value="9" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "9") ? 'selected' : ''; ?>>9</option>
                                                    <option value="10" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "10") ? 'selected' : ''; ?>>10</option>
                                                    <option value="11" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "11") ? 'selected' : ''; ?>>11</option>
                                                    <option value="12" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "12") ? 'selected' : ''; ?>>12</option>
                                                    <option value="13" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "13") ? 'selected' : ''; ?>>13</option>
                                                    <option value="14" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "14") ? 'selected' : ''; ?>>14</option>
                                                    <option value="15" <?php echo (!empty($propertyinfo) && $propertyinfo->property_on_floor == "15") ? 'selected' : ''; ?>>15</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <hr/>
                                        </div>
                                    </div>
                                    <h4><b>Room Detail</b></h4>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Bedrooms:</label>
                                            <select class="form-control" name="bedrooms" id="bedrooms">
                                                <option value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->bedrooms == "1") ? 'selected' : ''; ?>>1</option>
                                                <option value="2" <?php echo (!empty($propertyinfo) && $propertyinfo->bedrooms == "2") ? 'selected' : ''; ?>>2</option>
                                                <option value="3" <?php echo (!empty($propertyinfo) && $propertyinfo->bedrooms == "3") ? 'selected' : ''; ?>>3</option>
                                                <option value="4" <?php echo (!empty($propertyinfo) && $propertyinfo->bedrooms == "4") ? 'selected' : ''; ?>>4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Bathrooms:</label>
                                            <select class="form-control" name="bathrooms" id="bathrooms">
                                                <option value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->bathrooms == "1") ? 'selected' : ''; ?>>1</option>
                                                <option value="2" <?php echo (!empty($propertyinfo) && $propertyinfo->bathrooms == "1") ? 'selected' : ''; ?>>2</option>
                                                <option value="3" <?php echo (!empty($propertyinfo) && $propertyinfo->bathrooms == "1") ? 'selected' : ''; ?>>3</option>
                                                <option value="4" <?php echo (!empty($propertyinfo) && $propertyinfo->bathrooms == "1") ? 'selected' : ''; ?>>4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Balconies:</label>
                                            <select class="form-control" name="balconies" id="balconies">
                                                <option value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->balconies == "1") ? 'selected' : ''; ?>>1</option>
                                                <option value="2" <?php echo (!empty($propertyinfo) && $propertyinfo->balconies == "2") ? 'selected' : ''; ?>>2</option>
                                                <option value="3" <?php echo (!empty($propertyinfo) && $propertyinfo->balconies == "3") ? 'selected' : ''; ?>>3</option>
                                                <option value="4" <?php echo (!empty($propertyinfo) && $propertyinfo->balconies == "4") ? 'selected' : ''; ?>>4</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="pooja_room" name="pooja_room" value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->pooja_room == "1") ? 'checked' : ''; ?>> Pooja Room
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="study_room " name="study_room" value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->study_room == "1") ? 'checked' : ''; ?>> Study Room
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="servent_room" name="servent_room" value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->servent_room == "1") ? 'checked' : ''; ?>> Servant Room
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="store_room" name="store_room" value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->store_room == "1") ? 'checked' : ''; ?>> Store Room
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="other_room" name="other_room" value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->other_room == "1") ? 'checked' : ''; ?>> Other Room
                                            </label>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <hr/>
                                        </div>
                                    </div>
                                    <h4><b>Parking Detail</b></h4>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="no_parking" name="no_parking" value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->no_parking == "1") ? 'checked' : ''; ?>> None
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="covered_parking" name="covered_parking" value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->covered_parking == "1") ? 'checked' : ''; ?> > Covered
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="open_parking" name="open_parking" value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->open_parking == "1") ? 'checked' : ''; ?>> Open
                                            </label>
                                        </div>      
                                        <div class="form-group col-md-4" id="parking_options_covered">
                                            <label>No of covered parking:</label>
                                            <select class="form-control" name="covered_parking_count" id="covered_parking_count">
                                                <option value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->covered_parking == '1' && $propertyinfo->covered_parking_count == "1") ? 'selected' : ''; ?>>1</option>
                                                <option value="2" <?php echo (!empty($propertyinfo) && $propertyinfo->covered_parking == '1' && $propertyinfo->covered_parking_count == "2") ? 'selected' : ''; ?>>2</option>
                                                <option value="3" <?php echo (!empty($propertyinfo) && $propertyinfo->covered_parking == '1' && $propertyinfo->covered_parking_count == "3") ? 'selected' : ''; ?>>3</option>
                                                <option value="4" <?php echo (!empty($propertyinfo) && $propertyinfo->covered_parking == '1' && $propertyinfo->covered_parking_count == "4") ? 'selected' : ''; ?>>4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4" id="parking_options_open">
                                            <label>No of open parking:</label>
                                            <select class="form-control" name="open_parking_count" id="open_parking_count">
                                                <option value="1" <?php echo (!empty($propertyinfo) && $propertyinfo->open_parking_count == '1' && $propertyinfo->open_parking_count == "1") ? 'selected' : ''; ?>>1</option>
                                                <option value="2" <?php echo (!empty($propertyinfo) && $propertyinfo->open_parking_count == '1' && $propertyinfo->open_parking_count == "2") ? 'selected' : ''; ?>>2</option>
                                                <option value="3" <?php echo (!empty($propertyinfo) && $propertyinfo->open_parking_count == '1' && $propertyinfo->open_parking_count == "3") ? 'selected' : ''; ?>>3</option>
                                                <option value="4" <?php echo (!empty($propertyinfo) && $propertyinfo->open_parking_count == '1' && $propertyinfo->open_parking_count == "4") ? 'selected' : ''; ?>>4</option>
                                            </select>
                                        </div>                                    
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <hr/>
                                        </div>
                                    </div>
                                    <div id="furnishing_info">
                                        <h4><b>Furnishing Detail</b></h4>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Furnishing:</label>
                                                <select class="form-control" name="furnishing" id="furnishing">
                                                    <option value="Furnished">Furnished</option>
                                                    <option value="Semifurnished">Semifurnished</option>
                                                    <option value="Unfurnished">Unfurnished</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="simpleradio">
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="checkbox" id="wardrobe" name="wardrobe" value="Wardrobe"/>
                                                        <label for="wardrobe">Wardrobe</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="checkbox" id="beds" name="beds" value="Beds"/>
                                                        <label for="beds">Beds</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="checkbox" id="fans" name="fans" value="Fans"/>
                                                        <label for="fans">Fans</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="checkbox" id="light" name="light" value="Light"/>
                                                        <label for="light">Light</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="fridge" id="fridge" value="Fridge"/>
                                                        <label for="fridge">Fridge</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="ac" id="ac" value="AC"/>
                                                        <label for="ac">AC</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="stove" id="stove" value="Stove"/>
                                                        <label for="stove">Stove</label>
                                                    </div>
                                                    <!--                                            <div class="simpleradio-danger">
                                                                                                    <button class="btn btn-default btn-more" id="add_more_info" name="add_more_info">Add More +</button>
                                                                                                </div>-->
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="washingmachine" id="washingmachine" value="Washing Machine"/>
                                                        <label for="washingmachine">Washing Machine</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="waterpurifier" id="waterpurifier" value="Water Purifier"/>
                                                        <label for="waterpurifier">Water Purifier</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="microwave" id="microwave" value="Microwave"/>
                                                        <label for="microwave">Microwave</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="curtains" id="curtains" value="Curtains"/>
                                                        <label for="curtains">Curtains</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="chimney" id="chimney" value="Chimney"/>
                                                        <label for="chimney">Chimney</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="exhaustfan" id="exhaustfan" value="Exhaust Fan"/>
                                                        <label for="exhaustfan">Exhaust Fan</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="sofa" id="sofa" value="Sofa"/>
                                                        <label for="sofa">Sofa</label>
                                                    </div>
                                                    <div class="simpleradio-danger">
                                                        <input type="checkbox" name="dining_table" id="dining_table" value="Dining Table"/>
                                                        <label for="dining_table">Dining Table</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="available_from">
                                        <label for="available_from_value" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Available From<sup>*</sup></label>
                                        <div class="col-md-4">
                                            <input type="text" name="available_from_value" id="available_from_value" class="form-control date"  placeholder="yyyy-mm-dd" value="<?php echo (!empty($propertyinfo) && $propertyinfo->available_from != "") ? $propertyinfo->available_from : ''; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right">
                                                <button class="btn btn-default prev-step" type="button"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;PREVIOUS</button>
                                                <button class="btn btn-success next-step" type="button" name="btn_step3" id="btn_step3">NEXT&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- pricing detail -->
                                <div role="tabpanel" class="tab-pane" id="pricing">
                                    <h4>Property Detail:</h4>
                                    <div class="form-horizontal">                                    
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Expected Price:<sup>*</sup></label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="expected_price" id="expected_price" value="<?php echo (!empty($propertyinfo) && $propertyinfo->price != "") ? $propertyinfo->price : ''; ?>">
                                                    <span class="input-group-btn">
                                                        <select class="btn btn-default" name="expected_price_type" id="expected_price_type">
                                                            <option value="Thausand" <?php echo (!empty($propertyinfo) && $propertyinfo->expected_price_type == 'Thausand' ) ? 'selected' : ''; ?>>Thausand</option>
                                                            <option value="Lacks" <?php echo (!empty($propertyinfo) && $propertyinfo->expected_price_type == 'Lacks' ) ? 'selected' : ''; ?>>Lacks</option>
                                                            <option value="Crore" <?php echo (!empty($propertyinfo) && $propertyinfo->expected_price_type == 'Crore' ) ? 'selected' : ''; ?>>Crore</option>                                                        
                                                        </select>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Price Per Sq. Ft:<sup>*</sup></label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="squrefeet_price" id="squrefeet_price" value="<?php echo (!empty($propertyinfo) && $propertyinfo->price_per_sqft != "") ? $propertyinfo->price_per_sqft : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Maintenance: </label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" name="maintenance_amount" id="maintenance_amount" value="<?php echo (!empty($propertyinfo) && $propertyinfo->maintenance_amount != "") ? $propertyinfo->maintenance_amount : ''; ?>">
                                                    <span class="input-group-btn">
                                                        <select class="btn btn-default" name="maintenance_type" id="maintenance_type">
                                                            <option value="Monthly" <?php echo (!empty($propertyinfo) && $propertyinfo->maintenance_type == 'Monthly' ) ? 'selected' : ''; ?>>Monthly</option>
                                                            <option value="Annually" <?php echo (!empty($propertyinfo) && $propertyinfo->maintenance_type == 'Annually' ) ? 'selected' : ''; ?>>Annually</option>
                                                            <option value="One Time" <?php echo (!empty($propertyinfo) && $propertyinfo->maintenance_type == 'One Time' ) ? 'selected' : ''; ?>>One Time</option>
                                                        </select>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="security_depisit_info">
                                            <label class="col-md-4 control-label">Security Deposit:</label>
                                            <div class="col-md-4">
                                                <div class="input-group">                                                
                                                    <span class="input-group-btn">
                                                        <select class="btn btn-default" name="security_deposit_type" id="security_deposit_type" style="width: 98px;"> 
                                                            <option value="Fixed" <?php echo (!empty($propertyinfo) && $propertyinfo->security_deposit_type == 'Fixed' ) ? 'selected' : ''; ?>>Fixed</option>
                                                            <option value="Multiple of Rent" <?php echo (!empty($propertyinfo) && $propertyinfo->security_deposit_type == 'Multiple of Rent' ) ? 'selected' : ''; ?>>Multiple of Rent</option>
                                                        </select>
                                                    </span>
                                                    <input type="text" class="form-control" id="security_deposit_amount" name="security_deposit_amount" value="<?php echo (!empty($propertyinfo) && $propertyinfo->security_deposit_amount != "") ? $propertyinfo->security_deposit_amount : ''; ?>">
                                                </div>                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Availability:<sup>*</sup></label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="availability" id="availability">
                                                    <option value="Under Construction" <?php echo (!empty($propertyinfo) && $propertyinfo->availability == 'Under Construction' ) ? 'selected' : ''; ?>>Under Construction</option>
                                                    <option value="Ready to Move" <?php echo (!empty($propertyinfo) && $propertyinfo->availability == 'Ready to Move' ) ? 'selected' : ''; ?>>Ready to Move</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Booking Amount:</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="booking_amount" name="booking_amount" value="<?php echo (!empty($propertyinfo) && $propertyinfo->booking_amount != "") ? $propertyinfo->booking_amount : ''; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Age of Property:<sup>*</sup></label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="property_age" id="property_age">
                                                    <option value="0-1 year old property" <?php echo (!empty($propertyinfo) && $propertyinfo->property_age == '0-1 year old property' ) ? 'selected' : ''; ?>>0-1 year old property</option>
                                                    <option value="1-5 year old property" <?php echo (!empty($propertyinfo) && $propertyinfo->property_age == '1-5 year old property' ) ? 'selected' : ''; ?>>1-5 year old property</option>
                                                    <option value="5-10 year old property" <?php echo (!empty($propertyinfo) && $propertyinfo->property_age == '5-10 year old property' ) ? 'selected' : ''; ?>>5-10 year old property</option>
                                                    <option value="By 2016" <?php echo (!empty($propertyinfo) && $propertyinfo->property_age == 'By 2016' ) ? 'selected' : ''; ?>>By 2016</option>
                                                    <option value="By 2017" <?php echo (!empty($propertyinfo) && $propertyinfo->property_age == 'By 2017' ) ? 'selected' : ''; ?>>By 2017</option>
                                                    <option value="By 2018" <?php echo (!empty($propertyinfo) && $propertyinfo->property_age == 'By 2018' ) ? 'selected' : ''; ?>>By 2018</option>
                                                    <option value="By 2019" <?php echo (!empty($propertyinfo) && $propertyinfo->property_age == 'By 2019' ) ? 'selected' : ''; ?>>By 2019</option>
                                                    <option value="By 2020" <?php echo (!empty($propertyinfo) && $propertyinfo->property_age == 'By 2020' ) ? 'selected' : ''; ?>>By 2020</option>
                                                    <option value="By 2021" <?php echo (!empty($propertyinfo) && $propertyinfo->property_age == 'By 2021' ) ? 'selected' : ''; ?>>By 2021</option>
                                                    <option value="By 2022" <?php echo (!empty($propertyinfo) && $propertyinfo->property_age == 'By 2022' ) ? 'selected' : ''; ?>>By 2022</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>Bank Detail:</h4>
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <?php if (empty($bank_offers)) { ?>
                                                <div id="sample_bank_offer">
                                                    <label class="col-md-4 control-label" for="bank_name">Bank :</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control" name="bank_name[]" id="bank_name"  onblur='this.size = 1;' onchange='this.size = 1; this.blur();'>
                                                            <?php foreach ($banks as $bank) { ?>
                                                                <option value="<?php echo $bank->id; ?>" ><?php echo $bank->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="">Interest Rate:</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" id="bank_interest" name="bank_interest[]" value="1" >
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <?php foreach ($bank_offers as $offer) { ?>
                                                    <label class="col-md-4 control-label" for="bank_name">Bank :</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control" name="bank_name[]" id="bank_name"  onblur='this.size = 1;' onchange='this.size = 1; this.blur();'>
                                                            <?php foreach ($banks as $bank) { ?>
                                                                <option value="<?php echo $bank->id; ?>" <?php echo ($offer->bank_id == $bank->id) ? 'selected' : ''; ?>><?php echo $bank->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="">Interest Rate:</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control" id="bank_interest" name="bank_interest[]" value="<?php echo ($offer->interest_rate != "") ? $offer->interest_rate : ''; ?>">
                                                    </div>
                                                <?php } ?>                                                
                                            <?php } ?>
                                            <div id="new_offers">                                                    
                                            </div>
                                            <a href="#" onclick="add_more_offers()">Add More</a>       
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right">
                                                <button class="btn btn-default prev-step" type="button"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;PREVIOUS</button>
                                                <button class="btn btn-success next-step" name="btn_step4" id="btn_step4" type="button">NEXT&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- video upload -->
                                <div role="tabpanel" class="tab-pane" id="view">
                                    <h5><b>Upload Video:</b></h5>
                                    <div class="row oldimage">
                                        <?php foreach ($property_videos as $image) { ?>
                                            <div class="col-md-3">
                                                <div class="thumbnail">
                                                    <a class="old_property_video" href="#"><i class="fa fa-times-circle"></i></a>
                                                    <input type="hidden" name="old_property_videos[]" id="<?php echo $image->video; ?>" value="<?php echo $image->video; ?>">
                                                    <img src="<?php echo base_url(); ?>includes/properties_videos/default_video.jpg">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div id="dropzone">
                                        <div id="demo-upload" class="dropzone dz-clickable" action="<?php echo base_url(); ?>auth/properties_videos">                                            
                                            <div class="dz-default dz-message">
                                                <span>Drop files here to upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right">
                                                <button class="btn btn-default prev-step" type="button"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;PREVIOUS</button>
                                                <button class="btn btn-success next-step" name="btn_step5" id="btn_step5" type="button">NEXT&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature -->
                                <div role="tabpanel" class="tab-pane " id="features">
                                    <h5><b>Upload Project Photos:</b></h5>
                                    <div class="form-group">
                                        <label for="property_image" class="control-label">Property Image [Standard : 1024 * 800]</label>
                                        <?php if (!empty($propertyinfo) && $propertyinfo->property_image != "") { ?>
                                            <div class="form-group">
                                                <img style="width: 150px; height: 100px;" src="<?php echo base_url(); ?>includes/properties_img/<?php echo $propertyinfo->property_image; ?>">                                        
                                            </div>
                                        <?php } ?>
                                        <input type="file" id="property_image" name="property_image">
                                    </div>
                                    <input type="hidden" name="old_property_image" id="old_property_image" value="<?php echo (!empty($propertyinfo) && $propertyinfo->property_image != "") ? $propertyinfo->property_image : ''; ?>">
                                    <div class="row oldimage">
                                        <?php foreach ($property_images as $image) { ?>
                                            <div class="col-md-3">
                                                <div class="thumbnail">
                                                    <a class="old_property_image" href="#"><i class="fa fa-times-circle"></i></a>
                                                    <input type="hidden" name="old_property_images[]" id="<?php echo $image->image; ?>" value="<?php echo $image->image; ?>">
                                                    <img src="<?php echo base_url(); ?>includes/properties_images/<?php echo $image->image; ?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div id="dropzone">
                                        <div id="demoupload" class="dropzone dz-clickable" action="<?php echo base_url(); ?>auth/properties_images" method="post">                                            
                                            <div class="dz-default dz-message">
                                                <span>Drop files here to upload</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="valid_image_error" id="valid_image_error" value="<?php echo (!empty($propertyinfo)) ? '1' : '0'; ?>"/>
                                        </div>                                        
                                    </div>
                                    <h5><hr/><b>Upload Nearby Area Photos:</b></h5>
                                    <div class="row oldimage">
                                        <?php foreach ($property_nearby as $image) { ?>
                                            <div class="col-md-3">
                                                <div class="thumbnail">
                                                    <a class="old_nearby_image" href="#"><i class="fa fa-times-circle"></i></a>
                                                    <input type="hidden" name="old_nearby_images[]" id="<?php echo $image->image; ?>" value="<?php echo $image->image; ?>">
                                                    <img src="<?php echo base_url(); ?>includes/property_nearby/<?php echo $image->image; ?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div id="dropzone">
                                        <div id="demoupload" class="dropzone dz-clickable" action="<?php echo base_url(); ?>auth/properties_nearby" method="post">                                            
                                            <div class="dz-default dz-message">
                                                <span>Drop files here to upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <hr/>
                                    </div>                                   
                                    <h5><b>Project Amenities:</b></h5>
                                    <div class="simpleradio">
                                        <?php foreach ($project_amenities as $key => $project_amenity) { ?>  
                                            <div class="simpleradio-danger">
                                                <input class="project_amenities_check" type="checkbox" name="project_amenities[]" id="<?php echo $project_amenity->id; ?>" value="<?php echo $project_amenity->id; ?>" <?php echo (!empty($propertyinfo) && in_array($project_amenity->id, explode(',', $propertyinfo->project_amenities))) ? 'checked' : ''; ?> />
                                                <label for="<?php echo $project_amenity->id; ?>"><?php echo $project_amenity->name; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="project_amenities_error" id="project_amenities_error"/>
                                    </div>
                                    <h5><b>Flat Amenities:</b></h5>
                                    <div class="simpleradio">
                                        <?php foreach ($flat_amenities as $key => $flat_amenity) { ?>  
                                            <div class="simpleradio-danger">
                                                <input class="flat_amenities_check" type="checkbox" name="flat_amenities[]" id="<?php echo $flat_amenity->id . 'flat'; ?>" value="<?php echo $flat_amenity->id; ?>" <?php echo (!empty($propertyinfo) && in_array($flat_amenity->id, explode(',', $propertyinfo->flat_amenities))) ? 'checked' : ''; ?>/>
                                                <label for="<?php echo $flat_amenity->id . 'flat'; ?>"><?php echo $flat_amenity->name; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="flat_amenities_error" id="flat_amenities_error"/>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <hr/>
                                    </div>
                                    <div class="form-group">
                                        <label for="final_description" class="control-label">Description<sup>*</sup></label>
                                        <textarea class="form-control" rows="2" name="final_description" id="final_description"><?php echo (!empty($propertyinfo) && $propertyinfo->property_description != "") ? $propertyinfo->property_description : ''; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="builder_name" class="control-label">Builder Name<sup>*</sup></label>
                                        <input type="text" class="form-control" id="builder_name" name="builder_name" value="<?php echo (!empty($propertyinfo) && $propertyinfo->builder_name != "") ? $propertyinfo->builder_name : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="builder_company_name" class="control-label">Builder Company Name<sup>*</sup></label>
                                        <input type="text" class="form-control" id="builder_company_name" name="builder_company_name" value="<?php echo (!empty($propertyinfo) && $propertyinfo->builder_company_name != "") ? $propertyinfo->builder_company_name : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="builder_contact_no" class="control-label">Builder Contact No.</label>
                                        <input type="text" class="form-control" id="builder_contact_no" name="builder_contact_no" value="<?php echo (!empty($propertyinfo) && $propertyinfo->builder_contact_no != "") ? $propertyinfo->builder_contact_no : ''; ?>">
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="total_projects" class="control-label">Total Projects</label>
                                        <input type="text" class="form-control"  id="total_projects" name="total_projects" value="<?php echo (!empty($propertyinfo) && $propertyinfo->total_projects != "") ? $propertyinfo->total_projects : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="establishment_year" class="control-label">Establishment Year</label>
                                        <input type="text" class="form-control" id="establishment_year" name="establishment_year" value="<?php echo (!empty($propertyinfo) && $propertyinfo->establishment_year != "") ? $propertyinfo->establishment_year : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="builder_email" class="control-label">Builder's Email</label>
                                        <input type="text" class="form-control" id="builder_email" name="builder_email" value="<?php echo (!empty($propertyinfo) && $propertyinfo->builder_email != "") ? $propertyinfo->builder_email : ''; ?>">
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="builder_image" class="control-label">Builder Logo</label>
                                        <input type="file" id="builder_image" name="builder_image">
                                    </div>
                                    <?php if (!empty($propertyinfo) && $propertyinfo->builder_image != "") { ?>
                                        <div class="form-group">
                                            <img style="width: 150px; height: 100px;" src="<?php echo base_url(); ?>includes/builder_images/<?php echo $propertyinfo->builder_image; ?>">                                        
                                        </div>
                                    <?php } ?>
                                    <input type="hidden" name="old_builder_image" id="old_builder_image" value="<?php echo (!empty($propertyinfo) && $propertyinfo->builder_image != "") ? $propertyinfo->builder_image : ''; ?>">
                                    <div class="form-group">
                                        <label for="builder_description" class="control-label">Builder Description</label>
                                        <textarea class="form-control" rows="2" name="builder_description" id="builder_description"><?php echo (!empty($propertyinfo) && $propertyinfo->builder_description != "") ? $propertyinfo->builder_description : ''; ?></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right">
                                                <button class="btn btn-default prev-step" type="button"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;PREVIOUS</button>
                                                <button class="btn btn-success" name="btn_step6" id="btn_step6" type="submit">SUBMIT&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs hidden-sm help-text">
                    <p>
                        <a href="">Login</a> to post your property faster.
                    </p>
                    <p>
                        If you're stuck on the form and don't know what to do next, you can email us at support@realgujarat.com or call us at 8401791999. 
                    </p>
                    <p>
                        Get your property verified. Verified properties get 80% more responses from interested and genuine buyers.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $footer; ?>
