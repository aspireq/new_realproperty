<?php echo $header; ?> 

<section>
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo base_url(); ?>includes/img/slider1.jpg" alt="Chania" class="slider-img">
                <div class="carousel-caption">
                    <h4>Keeping Your Success First</h4>
                    <h3>01, April - 30 April 2017</h3>
                    <a href="<?php echo base_url(); ?>register"><button class="btn btn-primary btn-main">Register Now</button></a>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>includes/img/slider2.jpg" alt="Chania" class="slider-img">
                <div class="carousel-caption">
                    <h4>Keeping Your Success First</h4>
                    <h3>01, April - 30 April 2017</h3>
                    <a href="<?php echo base_url(); ?>register"><button class="btn btn-primary btn-main">Register Now</button></a>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>includes/img/slider3.jpg" alt="Flower" class="slider-img">
                <div class="carousel-caption">
                    <h4>Keeping Your Success First</h4>
                    <h3>01, April - 30 April 2017</h3>
                    <a href="<?php echo base_url(); ?>register"><button class="btn btn-primary btn-main">Register Now</button></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <center><h3 class="maintitle">Find <span class="red">Property</span></h3></center>
        <div class="col-md-2 col-sm-2 col-xs-12 logoad">
            <h4 class="text-center">Property Gallery</h4>
            <ul class="list center-block">
                <li>
                    <img src="<?php echo base_url(); ?>includes/img/logoad/1.png" alt="logoad" class="img-responsive img-center" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>includes/img/logoad/2.png" alt="logoad" class="img-responsive img-center" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>includes/img/logoad/3.png" alt="logoad" class="img-responsive img-center" />
                </li>
                <li> 
                    <img src="<?php echo base_url(); ?>includes/img/logoad/4.png" alt="logoad" class="img-responsive img-center" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>includes/img/logoad/1.png" alt="logoad" class="img-responsive img-center" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>includes/img/logoad/2.png" alt="logoad" class="img-responsive img-center" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>includes/img/logoad/3.png" alt="logoad" class="img-responsive img-center" />
                </li>
            </ul>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="filter row">
                        <form class="form-inline col-md-12 col-sm-12 col-xs-12" method="post">
                            <div class="form-group col-md-3 col-sm-3 col-xs-12">
                                <select class="form-control" name="property_type" id="property_type">
                                    <option selected="" disabled="">Property type</option>
                                    <option value="">All</option>
                                    <option disabled="">-------------------</option>
                                    <option value="Residential Apartment">Residential Apartment</option>
                                    <option value="Independent House">Independent House</option>
                                    <option value="Residential Land">Residential Land</option>
                                    <option value="Commercial Shop">Commercial Shop</option>
                                    <option value="Commercial Office">Commercial Office</option>
                                    <option value="Farm House">Farm House</option>
                                    <option value="Serviced Apartment">Serviced Apartment</option>
                                    <option value="Commercial Shops">Commercial Shops</option>
                                    <option value="Commercial Showroom">Commercial Showroom</option>
                                    <option value="Industrial Land">Industrial Land</option>
                                    <option value="Ware House">Ware House</option>
                                    <option value="Hotel / Resorts">Hotel / Resorts</option>
                                    <option value="Guest House / Banquet-halls">Guest House / Banquet-halls</option>
                                    <option value="Space in Mall">Space in Mall</option>
                                    <option value="Cold Storage">Cold Storage</option>
                                    <option value="Time Share">Time Share</option>                                    
                                </select>
                            </div> 
                            <div class="form-group col-md-3 col-sm-3 col-xs-12">
                                <select class="form-control" name="location" id="location">
                                    <option selected="" disabled="">Location</option>
                                    <option>All</option>
                                    <option disabled="">-------------------</option>
                                    <?php foreach ($locations as $location) { ?>
                                        <option value="<?php echo $location->city_name; ?>"><?php echo $location->city_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div> 
                            <div class="form-group col-md-4 col-sm-3 col-xs-12">
                                <select class="form-control" name="property_status" id="property_status">
                                    <option selected="" disabled="">Construction Status</option>
                                    <option value="">All</option>
                                    <option disabled="">-------------------</option>
                                    <option value="Under Construction">Under Construction</option>
                                    <option value="Ready to Move">Ready to Move</option>
                                </select>
                            </div> 
                            <div class="form-group col-md-2 col-sm-3 col-xs-12">
                                <button class="btn btn-primary btn-block" type="submit" name="search_data" id="search_data">Search</button>  
                            </div>                  
                        </form>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="property">
                        <?php
                        if (!empty($properties)) {
                            foreach ($properties as $property) {
                                ?>
                                <div class="col-md-4 col-sm-6 col-xs-12">                     
                                    <div class="card">                        
                                        <div class="view">
                                            <div class="caption">
                                                <h3><?php echo $property->project_name; ?></h3>
                                                <a href="" rel="tooltip" title="Add to Favorites"><span class="fa fa-heart-o fa-2x"></span></a>
                                                <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                                            </div>
                                            <img src="<?php echo base_url(); ?>includes/properties_images/<?php echo (isset($property->image) && $property->image != "" && (file_exists(FCPATH . 'includes/properties_images/' . $property->image))) ? $property->image : 'no_image.jpg'; ?>" class="img-responsive">
                                            <div class="propertyType house"><?php echo $property->property_type_name; ?></div>
                                        </div>
                                        <a href="<?php echo base_url(); ?>index/propertydetails/<?php echo $property->id; ?>">
                                            <div class="info">
                                                <h5 style="text-overflow: ellipsis"><?php echo $property->project_name; ?></h5>
                                                <ul class="list-inline">
                                                    <li>
                                                        <span rel="tooltip" title="<?php echo (isset($property->plot_area_unit_name) && $property->plot_area_unit_name != null && $property->plot_area_unit_name != "0") ? $property->plot_area_unit_name : 'N/A'; ?>"><img src="<?php echo base_url(); ?>includes/img/area.png" width="18" /> <?php echo ($property->plot_area != null && $property->plot_area != "0") ? $property->plot_area : 'N/A'; ?> </span>
                                                    </li>
                                                    <li>
                                                        <span rel="tooltip" title="Configuration"><img src="<?php echo base_url(); ?>includes/img/building.png"  width="18"/> <?php echo ($property->property_configuration != null && $property->property_configuration != "0") ? $property->property_configuration : 'N/A'; ?> </span>
                                                    </li>
                                                    <li>
                                                        <span rel="tooltip" title="Type"><img src="<?php echo base_url(); ?>includes/img/billboard.png"  width="18"/> <?php echo $property->property_type; ?> </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="stats green-bg">
                                                <span>Rs.<?php echo $property->price; ?></span>
        <!--                                            <span class="fa fa-building pull-right" rel="tooltip" title="Location"> <strong>Chandkheda</strong></span>-->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                No Records Found !
                            </div>                        
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 exclusivead">
            <h4 class="text-center">Real Gujarat Exclusive</h4>
            <ul class="list center-block">
                <li>
                    <img src="<?php echo base_url(); ?>includes/img/exclusivead/3.png" alt="logoad" class="img-responsive img-center" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>includes/img/exclusivead/1.png" alt="logoad" class="img-responsive img-center" />
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>includes/img/exclusivead/2.png" alt="logoad" class="img-responsive img-center" />
                </li>
            </ul>
        </div>
    </div>
</section>
<?php echo $footer; ?>

