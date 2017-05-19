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
                <span class="progressText"><!-- <B>Advertise your property with us in 6 simple steps. </B> -->
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

                        <form method="post" id="add_property" role="form">
                            <input type="hidden" name="user_type" id="user_type" value="owner">                            
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="basicdetail">
                                    <div class="adform">
                                        <div class="form-group">
                                            <label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Are You ?<sup>*</sup></label>
                                            <div class="input-group">
                                                <div id="radioBtn" class="btn-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a class="btn btn-primary btn-sm active user_type" onclick="set_usertype('owner');" data-toggle="fun" data-title="Y"><h4><img src="<?php echo base_url(); ?>includes/img/owner.png" width="30" />&nbsp;Owner</h4></a>
                                                    <a class="btn btn-primary btn-sm notActive user_type" onclick="set_usertype('dealer');" data-toggle="fun" data-title="X"><h4><img src="<?php echo base_url(); ?>includes/img/dealer.png" width="30" />&nbsp;Dealer</h4></a>
                                                    <a class="btn btn-primary btn-sm notActive user_type" onclick="set_usertype('worker');" data-toggle="fun" data-title="N"><h4><img src="<?php echo base_url(); ?>includes/img/worker.png" width="30" />&nbsp;Builder</h4></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="property_type" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">List property for: </label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="property_type" id="property_type" onchange="set_propery_types();">
                                                    <option value="Sell">Sell</option>
                                                    <option value="Rent/Lease">Rent/Lease</option>
                                                    <option value="PayingGuest">Paying Guest</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" id="property_types">
                                            <label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Property Type: </label>                                
                                            <!--                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                <ul class="nav nav-tabs" role="tablist">
                                                                                    <li role="presentation" class="active"><a href="#residential" aria-controls="residential" role="tab" data-toggle="tab">Residential</a></li>
                                                                                    <li role="presentation" id="commer_list"><a href="#commercial" aria-controls="commercial" role="tab" data-toggle="tab">Commercial</a></li>
                                                                                </ul>
                                                                                 Tab panes 
                                                                                <div class="tab-content">
                                                                                    <div role="tabpanel" class="tab-pane active" id="residential">
                                                                                        <div class="simpleradio">
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="residentialappratment" value="Residential Apartment" checked/>
                                                                                                <label for="residentialappratment">Residential Apartment</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="independenthouse" value="Independent House / Villa" checked/>
                                                                                                <label for="independenthouse">Independent House / Villa</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="independentfloor" value="Independent / Builder Floor" checked/>
                                                                                                <label for="independentfloor">Independent / Builder Floor</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="farmhouse" value="Farm House" checked/>
                                                                                                <label for="farmhouse">Farm House</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="studioapparment" value="Studio Apartment" checked/>
                                                                                                <label for="studioapparment">Studio Apartment</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="servicedappart" value="Serviced Apartment" checked/>
                                                                                                <label for="servicedappart">Serviced Apartment</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="other" value="Other" checked/>
                                                                                                <label for="other">Other</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div role="tabpanel" class="tab-pane" id="commercial">
                                                                                        <div class="simpleradio">
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="commeroffioce" value="Commercial Office/Space" checked/>
                                                                                                <label for="commeroffioce">Commercial Office/Space</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="commershops" value="Commercial Shops" checked/>
                                                                                                <label for="commershops">Commercial Shops</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="commershowroom" value="Commercial Showroom" checked/>
                                                                                                <label for="commershowroom">Commercial Showroom</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="industialland" value="Industrial Land" checked/>
                                                                                                <label for="industialland">Industrial Land</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="warehouse" value="Ware House" checked/>
                                                                                                <label for="warehouse">Ware House</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="hotelresorts" value="Hotel / Resorts" checked/>
                                                                                                <label for="hotelresorts">Hotel / Resorts</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="guesthouse" value="Guest House / Banquet-halls" checked/>
                                                                                                <label for="guesthouse">Guest House / Banquet-halls</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="spaceinmall" value="Space in Mall" checked/>
                                                                                                <label for="spaceinmall">Space in Mall</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="coldstorage" value="Cold Storage" checked/>
                                                                                                <label for="coldstorage">Cold Storage</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="timeshare" value="Time Share" checked/>
                                                                                                <label for="timeshare">Time Share</label>
                                                                                            </div>
                                                                                            <div class="simpleradio-danger">
                                                                                                <input type="radio" name="residentialpropery" id="other2" value="Other" checked/>
                                                                                                <label for="other2">Other</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>-->
                                        </div>

                                        <div class="form-group" id="property_error">
                                            <label for='' generated='true' class='col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label has-error' style='color:red;'>Please select the type of Property you wish to Advertise.</label>
                                        </div>
                                        <!--                                    <div class="form-group" id="available_from">
                                                                                <label for="available_from_value" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Available From<sup>*</sup></label>
                                                                                <div class="col-md-4">
                                                                                    <input type="text" name="available_from_value" id="available_from_value" class="form-control date"  placeholder="yyyy-mm-dd">
                                                                                </div>
                                                                            </div>-->
                                        <!--                                    <div class="form-group" id="avail_date_error">
                                                                                <label for='' generated='true' class='col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label has-error' style='color:red;'>Please select the date from which property is available.</label>
                                                                            </div>-->
                                        <div id="resengital_options">
                                        </div>
                                        <div id="rent_options">
                                        </div>
                                        <div id="sell_options">
                                        </div>                                 
                                        <div class="form-group" id="property_unit_error">
                                            <label for='' generated='true' class='col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label has-error' style='color:red;'>Please specify the number of Property Units available</label>
                                        </div>

                                        <!--                                    <div class="form-group" id="property_units">
                                                                                <label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Multiple Property Units<sup>*</sup></label>
                                                                                <div class="col-md-4">
                                                                                    <label class="radio-inline">
                                                                                        <input type="radio" name="property_unit_value" id="property_unit_value_yes" value="1"> Yes
                                                                                    </label>
                                                                                    <label class="radio-inline">
                                                                                        <input type="radio" name="property_unit_value" id="property_unit_value_no" value="0"> No
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group" id="property_count">
                                                                                <label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">No. Of Properies<sup>*</sup></label>
                                                                                <div class="col-md-4">
                                                                                    <input type="text" name="property_count_value" id="property_count_value" class="form-control"  placeholder="Enter No. Of Properies">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group" id="pg_avail">
                                                                                <label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">PG Available For:<sup>*</sup></label>
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <label class="radio-inline">
                                                                                        <input type="radio" name="pg_availability" id="pg_girls" value="Girls"> Girls
                                                                                    </label>
                                                                                    <label class="radio-inline">
                                                                                        <input type="radio" name="pg_availability" id="pg_boys" value="Boys"> Boys
                                                                                    </label>
                                                                                    <label class="radio-inline">
                                                                                        <input type="radio" name="pg_availability" id="pg_girlboys" value="Girls & Boys"> Girls &amp; Boys
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group" id="suitable">
                                                                                <label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Suitable For:<sup>*</sup></label>
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" value="Students" id="suitable_students" name="suitable_students">Student</label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" value="Working Professionals" id="suitable_working" name="suitable_working">Working Professionals</label>
                                                                                </div>
                                                                            </div>-->
                                        <!--                                    <div class="form-group" id="rent_type">
                                                                                <label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Willing to rent out to:<sup>*</sup></label>
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" value="Family" id="rent_single_family" name="rent_single_family">Family
                                                                                    </label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" value="Single Men" name="rent_single_men" id="rent_single_men">Single Men
                                                                                    </label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" value="Single Women" name="rent_single_women" id="rent_single_women">Single Women
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group" id="argument_type">
                                                                                <label for="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Preferred Agreement Type:<sup>*</sup></label>
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" value="Company lease Agreement" name="argument_lease" id="argument_lease">Company lease Agreement</label>
                                                                                    <label class="checkbox-inline">
                                                                                        <input type="checkbox" value="Any" name="arg_type" id="arg_type">Any</label>
                                                                                </div>
                                                                            </div>-->
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
                                                <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project Name"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="property_location" class="col-sm-3 control-label">Location:<sup>*</sup></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="us3-address" name="property_location" />
                                            </div>
                                        </div>
                                        <!--                                    <div class="form-group">
                                                                                <label for="property_radius" class="col-sm-3 control-label">Radius:</label>
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" id="us3-radius" name="property_radius" />
                                                                                </div>
                                                                            </div>-->
                                        <div class="form-group">
                                            <label for="property_address" class="col-sm-3 control-label">Address:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="property_address" name="property_address" placeholder="type here.." />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="area_name" class="col-sm-3 control-label">Area Name:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="area_name" name="area_name" placeholder="type here.." />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city_name" class="col-sm-3 control-label">City Name:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="city_name" name="city_name" placeholder="type here.." />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="property_neardesc" class="col-sm-3 control-label">About Near By Area:<sup>*</sup></label>
                                            <div class="col-sm-9">
                                                <textarea name="property_neardesc" id="property_neardesc" class="form-control" placeholder="Write about near by places like railway station,hospital etc."></textarea>
                                            </div>
                                        </div>
                                        <div id="us3" style=""></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right">
                                                <button class="btn btn-default prev-step"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;PREVIOUS</button>
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
                                                <option value="2 BHK">2 BHK</option>
                                                <option value="3 BHK">3 BHK</option>
                                                <option value="4 BHK">4 BHK</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Plot Area: </label>
                                            <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input class="form-control" type="text" name="plot_area" id="plot_area">
                                                <span class="input-group-btn">
                                                    <select class="btn btn-default" name="plot_area_unit" id="plot_area_unit ">
                                                        <?php
                                                        foreach ($unitsinfo as $unit) {
                                                            ?>
                                                            <option value="<?php echo $unit->id ?>"><?php echo $unit->short_name; ?></option>
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
                                                <input class="form-control" type="text" name="builtuparea" id="builtuparea">
                                                <span class="input-group-btn">
                                                    <select class="btn btn-default" name="builtuparea_unit" id="builtuparea_unit">
                                                        <?php
                                                        foreach ($unitsinfo as $unit) {
                                                            ?>
                                                            <option value="<?php echo $unit->id ?>"><?php echo $unit->short_name; ?></option>
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
                                                <input class="form-control" type="text" name="carpet_area" id="carpet_area">
                                                <span class="input-group-btn">
                                                    <select class="btn btn-default" name="carpet_area_unit" id="carpet_area_unit">
                                                        <?php
                                                        foreach ($unitsinfo as $unit) {
                                                            ?>
                                                            <option value="<?php echo $unit->id ?>"><?php echo $unit->short_name; ?></option>
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
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                    <option value="32">32</option>
                                                    <option value="33">33</option>
                                                    <option value="34">34</option>
                                                    <option value="35">35</option>
                                                    <option value="36">36</option>
                                                    <option value="37">37</option>
                                                    <option value="38">38</option>
                                                    <option value="39">39</option>
                                                    <option value="40">40</option>
                                                    <option value="40+">40+</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Propery on Floor: </label>
                                                <select class="form-control" name="property_on_floor " id="property_on_floor">
                                                    <option value="Basement">Basement</option>
                                                    <option value="Lower Ground">Lower Ground</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
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
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Bathrooms:</label>
                                            <select class="form-control" name="bathrooms" id="bathrooms">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Balconies:</label>
                                            <select class="form-control" name="balconies" id="balconies">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="pooja_room" name="pooja_room" value="1"> Pooja Room
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="study_room " name="study_room" value="1"> Study Room
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="servent_room" name="servent_room" value="1"> Servant Room
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="store_room" name="store_room" value="1"> Store Room
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="other_room" name="other_room" value="1"> Other Room
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
                                                <input type="checkbox" id="no_parking" name="no_parking" value="1"> None
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="covered_parking" name="covered_parking" value="1"> Covered
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="open_parking" name="open_parking" value="1"> Open
                                            </label>
                                        </div>                                   
                                        <div class="form-group col-md-4" id="parking_options_covered">
                                            <label>No of covered parking:</label>
                                            <select class="form-control" name="covered_parking_count" id="covered_parking_count">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4" id="parking_options_open">
                                            <label>No of open parking:</label>
                                            <select class="form-control" name="open_parking_count" id="open_parking_count">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
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
                                            <input type="text" name="available_from_value" id="available_from_value" class="form-control date"  placeholder="yyyy-mm-dd">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right">
                                                <button class="btn btn-default prev-step"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;PREVIOUS</button>
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
                                                <input type="text" class="form-control" name="expected_price" id="expected_price" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Price Per Sq. Ft:<sup>*</sup></label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="squrefeet_price" id="squrefeet_price" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Maintenance: </label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" name="maintenance_amount" id="maintenance_amount">
                                                    <span class="input-group-btn">
                                                        <select class="btn btn-default" name="maintenance_type" id="maintenance_type">
                                                            <option value="Monthly">Monthly</option>
                                                            <option value="Annually">Annually</option>
                                                            <option value="One Time">One Time</option>
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
                                                            <option value="Fixed">Fixed</option>
                                                            <option value="Multiple of Rent">Multiple of Rent</option>
                                                        </select>
                                                    </span>
                                                    <input type="text" class="form-control" id="security_depisit_value" name="security_depisit_value" placeholder="">
                                                </div>                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Availability:<sup>*</sup></label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="availability" id="availability">
                                                    <option value="Under Construction">Under Construction</option>
                                                    <option value="Ready to Move">Ready to Move</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Booking Amount:</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="booking_amount" name="booking_amount" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Age of Property:<sup>*</sup></label>
                                            <div class="col-md-4">
                                                <select class="form-control">
                                                    <option value="0-1 year old property">0-1 year old property</option>
                                                    <option value="1-5 year old property">1-5 year old property</option>
                                                    <option value="5-10 year old property">5-10 year old property</option>
                                                    <option value="By 2016">By 2016</option>
                                                    <option value="By 2017">By 2017</option>
                                                    <option value="By 2018">By 2018</option>
                                                    <option value="By 2019">By 2019</option>
                                                    <option value="By 2020">By 2020</option>
                                                    <option value="By 2021">By 2021</option>
                                                    <option value="By 2022">By 2022</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>Bank Detail:</h4>
                                    <div class="form-horizontal">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="bank_name">Enter Bank Name:</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="bank_name" id="bank_name"  onfocus='this.size = 10;' onblur='this.size = 1;' onchange='this.size = 1; this.blur();'>
                                                    <option value="Allahabad Bank">Allahabad Bank</option>
                                                    <option value="Andhra Bank">Andhra Bank</option>
                                                    <option value="Axis Bank">Axis Bank</option>
                                                    <option value="Bank of Baroda - Corporate Banking">Bank of Baroda - Corporate Banking</option>
                                                    <option value="Bank of India">Bank of India</option>
                                                    <option value="Bank of Maharashtra">Bank of Maharashtra</option>
                                                    <option value="Canara Bank">Canara Bank</option>
                                                    <option value="Central Bank of India">Central Bank of India</option>
                                                    <option value="City Union Bank">City Union Bank</option>
                                                    <option value="Dhanlaxmi Bank">Dhanlaxmi Bank</option>
                                                    <option value="HDFC Bank">HDFC Bank</option>
                                                    <option value="ICICI Bank">ICICI Bank</option>
                                                    <option value="IDBI Bank">IDBI Bank</option>
                                                    <option value="Indian Overseas Bank">Indian Overseas Bank</option>
                                                    <option value="Kotak Bank">Kotak Bank</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Enter Rate of Interest:</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" id="bank_interest" name="bank_interest" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right">
                                                <button class="btn btn-default"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;PREVIOUS</button>
                                                <button class="btn btn-success" name="btn_step4" id="btn_step4" type="button">NEXT&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- video upload -->
                                <div role="tabpanel" class="tab-pane" id="view">
                                    <h5><b>Upload Video:</b></h5>
                                    <div id="dropzone">
                                        <div id="demo-upload" class="dropzone dz-clickable" action="<?php echo base_url(); ?>index.php/auth/properties_videos">                                            
                                            <div class="dz-default dz-message">
                                                <span>Drop files here to upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right">
                                                <button class="btn btn-default prev-step"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;PREVIOUS</button>
                                                <button class="btn btn-success next-step" name="btn_step5" id="btn_step5" type="button">NEXT&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- feature -->
                                <div role="tabpanel" class="tab-pane " id="features">
                                    <h5><b>Upload Project Photos:</b></h5>
                                    <div id="dropzone">
                                        <div id="demoupload" class="dropzone dz-clickable" action="<?php echo base_url(); ?>index.php/auth/properties_images" method="post">                                            
                                            <div class="dz-default dz-message">
                                                <span>Drop files here to upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5><hr/><b>Upload Nearby Area Photos:</b></h5>
                                    <div id="dropzone">
                                        <div id="demoupload" class="dropzone dz-clickable" action="<?php echo base_url(); ?>index.php/auth/properties_nearby" method="post">                                            
                                            <div class="dz-default dz-message">
                                                <span>Drop files here to upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <hr/>
                                    </div>
                                    <!--                                <h5><b>Amenities:</b></h5>
                                                                    <div class="simpleradio">
                                                                        <div class="simpleradio-danger">
                                                                            <input type="checkbox" name="amenities" id="amenities1" value="Water Storage"/>
                                                                            <label for="amenities1">Water Storage</label>
                                                                        </div>
                                                                        <div class="simpleradio-danger">
                                                                            <input type="checkbox" name="amenities" id="amenities2" value="Visitor Parking"/>
                                                                            <label for="amenities2">Visitor Parking</label>
                                                                        </div>
                                                                        <div class="simpleradio-danger">
                                                                            <input type="checkbox" name="amenities" id="amenities3" value="Park"/>
                                                                            <label for="amenities3">Park</label>
                                                                        </div>
                                                                        <div class="simpleradio-danger">
                                                                            <input type="checkbox" name="amenities" id="amenities4" value="Waste Disposal"/>
                                                                            <label for="amenities4">Waste Disposal</label>
                                                                        </div>
                                                                        <div class="simpleradio-danger">
                                                                            <input type="checkbox" name="amenities" id="amenities5" value="Rain Water Harvesting"/>
                                                                            <label for="amenities5">Rain Water Harvesting</label>
                                                                        </div>
                                                                        <div class="simpleradio-danger">
                                                                            <input type="checkbox" name="amenities" id="amenities6" value="Maintanance Staff"/>
                                                                            <label for="amenities6">Maintanance Staff</label>
                                                                        </div>
                                                                        <div class="simpleradio-danger">
                                                                            <input type="checkbox" name="amenities" id="amenities7" value="Swimming Pool"/>
                                                                            <label for="amenities7">Swimming Pool</label>
                                                                        </div>
                                                                    </div>-->
                                    <h5><b>Project Amenities:</b></h5>
                                    <div class="simpleradio">
                                        <?php foreach ($project_amenities as $key => $project_amenity) { ?>  
                                            <div class="simpleradio-danger">
                                                <input type="checkbox" name="project_amenities[]" id="<?php echo $project_amenity->id; ?>" value="<?php echo $project_amenity->id; ?>"/>
                                                <label for="<?php echo $project_amenity->id; ?>"><?php echo $project_amenity->name; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <h5><b>Flat Amenities:</b></h5>
                                    <div class="simpleradio">
                                        <?php foreach ($flat_amenities as $key => $flat_amenity) { ?>  
                                            <div class="simpleradio-danger">
                                                <input class="flat_amenities_check" type="checkbox" name="flat_amenities[]" id="<?php echo $flat_amenity->id . 'flat'; ?>" value="<?php echo $flat_amenity->id; ?>"/>
                                                <label for="<?php echo $flat_amenity->id . 'flat'; ?>"><?php echo $flat_amenity->name; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
<!--                                    <div class="form-group" id="flat_amenities_error">
                                        <label for='' generated='true' class='col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label has-error' style='color:red;'>Please select flat amenities.</label>
                                    </div>-->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <hr/>
                                    </div>
                                    <div class="form-group">
                                        <label for="final_description" class="control-label">Description<sup>*</sup></label>
                                        <textarea class="form-control" rows="2" name="final_description" id="final_description"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="pull-right">
                                                <button class="btn btn-default"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;PREVIOUS</button>
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
