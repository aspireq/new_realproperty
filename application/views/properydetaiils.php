<?php echo $header ?> 
<div class="wrapper">
    <section class="basicdetail">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <ul class="list-inline breadcrum">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li>/</li>
                        <li><a href="<?php echo base_url(); ?>property">Property</a></li>
                        <li>/</li>
                        <li class="active"><a href=""><?php echo $propertyinfo->project_name ?></a></li>
                    </ul>
                    <h1><img src="<?php echo base_url(); ?>includes/properties_detail/images/show.gif" alt="Propertyshow" class="hidden-xs hidden-sm propertyshow" /><?php echo $propertyinfo->project_name ?></h1>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12 text-right">
                    <h3>Base Price : <i class="fa fa-inr"></i>&nbsp;<?php echo $propertyinfo->price ?></h3>
                    <?php if ($propertyinfo->price_per_sqft != "") { ?>
                        <h4 class="grey"><i class="fa fa-inr"></i>&nbsp;<?php echo $propertyinfo->price_per_sqft; ?> per sqft.</h4>  
                    <?php } ?>
                    <h4 class="grey"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $propertyinfo->city_name; ?>  </h4>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="demo-gallery">
                        <ul id="lightgallery" class="list-unstyled row">
                            <?php
                            if ($property_images[0]->image != "" && (file_exists(FCPATH . 'includes/properties_images/' . $property_images[0]->image))) {
                                $first_image = $property_images[0]->image;
                            } else {
                                $first_image = "no_image.jpg";
                            }
                            ?>
                            <li class="col-xs-6 col-sm-3 col-md-9 p-r-0" data-responsive="<?php echo base_url(); ?>includes/properties_images/<?php echo $first_image; ?> 375, <?php echo base_url(); ?>includes/properties_images/<?php echo $first_image; ?> 480, <?php echo base_url(); ?>includes/properties_images/<?php echo $first_image; ?> 800" data-src="<?php echo base_url(); ?>includes/properties_images/<?php echo $first_image; ?>" data-sub-html="">
                                <a href="">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>includes/properties_images/<?php echo $first_image; ?>">
                                </a>
                            </li>

                            <?php
                            foreach ($property_images as $key => $image) {
                                if ($key > 0) {
                                    if ($image->image != "" && (file_exists(FCPATH . 'includes/properties_images/' . $image->image))) {
                                        ?>
                                        <li class="col-xs-6 col-sm-3 col-md-3" data-responsive="<?php echo base_url(); ?>includes/properties_images/<?php echo $image->image; ?> 375, <?php echo base_url(); ?>includes/properties_images/<?php echo $image->image; ?> 480, <?php echo base_url(); ?>includes/properties_images/<?php echo $image->image; ?> 800" data-src="<?php echo base_url(); ?>includes/properties_images/<?php echo $image->image; ?>" data-sub-html="">
                                            <a href="">
                                                <img class="img-responsive" src="<?php echo base_url(); ?>includes/properties_images/<?php echo $image->image; ?>">
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                            ?>

                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <!-- Nav tabs -->
                            <div class="card">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                                            <img src="<?php echo base_url(); ?>includes/properties_detail/images/overview.png" width="32" /> &nbsp;Overview
                                        </a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><img src="<?php echo base_url(); ?>includes/properties_detail/images/plan.png" width="32" />&nbsp;Configurations 
                                        </a>
                                    </li>
                                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><img src="<?php echo base_url(); ?>includes/properties_detail/images/amenities.png" width="32" />&nbsp;Amenities</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home">
                                        <p><?php echo $propertyinfo->project_name; ?> project of [builder name] offers a perfect balance lifestyle, business and leisure. The lush ambience, ultra-modern design and higher recreational value makes [builder name] one of the most desirable edifices in <?php echo $propertyinfo->area_name; ?> and <?php echo $propertyinfo->city_name; ?>. Moreover, its affordability rightly fits into the budget of locals looking for contemporary spaces to fulfill their <?php echo $propertyinfo->property_type; ?> needs and investors looking for real estate profits.</p>
                                        <p><?php echo $propertyinfo->project_name; ?> is also the ideal destination for space-onlookers wanting to be a part of this amazing city.Considering to buy 2 or 3 BHK house or a workplace that symbolizes tranquility and prosperity?</p>
                                        <ul class="list list-half">
                                            <li><i class="fa fa-angle-right"></i>&nbsp;Avalability : <span><?php echo ($propertyinfo->availability != "") ? $propertyinfo->availability : 'N/A'; ?></span></li>
                                            <li><i class="fa fa-angle-right"></i>&nbsp;Possession By : <span><?php echo ($propertyinfo->available_from != "") ? $propertyinfo->available_from : 'N/A'; ?></span></li>
                                            <li><i class="fa fa-angle-right"></i>&nbsp;Property For : <span><?php echo $propertyinfo->property_type; ?></span></li>
                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile">
                                        <ul class="list list-half clearfix">
                                            <li><i class="fa fa-angle-right"></i>&nbsp;<strong>Configurations :</strong><br>&nbsp;&nbsp;<?php echo ($propertyinfo->property_configuration != null && $propertyinfo->property_configuration != "0") ? $propertyinfo->property_configuration : 'N/A'; ?></li>
                                            <li><i class="fa fa-angle-right"></i>&nbsp;<strong>Plot Area :</strong><br>&nbsp;&nbsp;<span><?php echo ($propertyinfo->plot_area != null && $propertyinfo->plot_area != 0) ? $propertyinfo->plot_area . ' ' . $propertyinfo->plot_area_unit_name : 'N/A'; ?></span> </li>
                                            <li><i class="fa fa-angle-right"></i>&nbsp;<strong>Built Up Area :</strong><br>&nbsp;&nbsp;<span><?php echo ($propertyinfo->build_up_area != null && $propertyinfo->build_up_area != 0) ? $propertyinfo->build_up_area . ' ' . $propertyinfo->build_up_area_unit_name : 'N/A'; ?></span> </li>
                                            <li><i class="fa fa-angle-right"></i>&nbsp;<strong>Carpet Area:</strong><br>&nbsp;&nbsp;<span><?php echo ($propertyinfo->carpet_area != null && $propertyinfo->carpet_area != 0) ? $propertyinfo->carpet_area . ' ' . $propertyinfo->carpet_area_unit_name : 'N/A'; ?></span> </li>
                                            <li><i class="fa fa-angle-right"></i>&nbsp;<strong>Total Floor:</strong><br>&nbsp;&nbsp;<span><?php echo ($propertyinfo->total_floor != null && $propertyinfo->total_floor != 0) ? $propertyinfo->total_floor . ' floor' : 'N/A'; ?></span> </li>
                                            <li><i class="fa fa-angle-right"></i>&nbsp;<strong>Property on floor:</strong><br>&nbsp;&nbsp;<span><?php echo ($propertyinfo->property_on_floor != null && $propertyinfo->property_on_floor != "") ? $propertyinfo->property_on_floor : 'N/A'; ?></span></li>
                                        </ul>
                                        <hr/>
                                        <p><?php echo ($propertyinfo->property_description != "") ? $propertyinfo->property_description : ''; ?></p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="messages">
                                        <div class="row m-b">
                                            <div class="col-md-12">
                                                <h4><b><img src="<?php echo base_url(); ?>includes/properties_detail/images/elevator.png" />&nbsp;Project Amenities :</b></h4>
                                                <ul class="list list-half">
                                                    <?php
                                                    if (isset($propertyinfo->project_amenities) && !empty($propertyinfo->project_amenities)) {
                                                        foreach ($propertyinfo->project_amenities as $amenities) {
                                                            echo '<li>' . $amenities['project_amenities'] . '</li>';
                                                        }
                                                    } else {
                                                        echo '<li>N/A</li>';
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row m-b">
                                            <div class="col-md-12">
                                                <h4><b><img src="<?php echo base_url(); ?>includes/properties_detail/images/pipes.png" />&nbsp;Flat Amenities :</b></h4>
                                                <ul class="list list-half">
                                                    <?php
                                                    if (isset($propertyinfo->flat_amenities) && !empty($propertyinfo->flat_amenities)) {
                                                        foreach ($propertyinfo->flat_amenities as $amenities) {
                                                            echo '<li>' . $amenities['flat_amenities'] . '</li>';
                                                        }
                                                    } else {
                                                        echo '<li>N/A</li>';
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row m-b">
                                            <div class="col-md-12">
                                                <h4><b><img src="<?php echo base_url(); ?>includes/properties_detail/images/parking.png" />&nbsp;Parking Detail :</b></h4>
                                                <ul class="list list-half">
                                                    <li>
                                                        Cover Parking : 5
                                                    </li>
                                                    <li>
                                                        Open Parking : 1
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row m-b">
                                            <div class="col-md-12">
                                                <h4><b><img src="<?php echo base_url(); ?>includes/properties_detail/images/stairs.png"/>&nbsp;Floorings :</b></h4>
                                                <ul class="list list-half">
                                                    <li><span class="maintext">Bedrooms:</span> <span class="subtext">2</span> </li>
                                                    <li><span class="maintext">Bathrooms:</span> <span class="subtext">1</span> </li>
                                                    <li><span class="maintext">Balconies:</span>&nbsp;<span class="subtext">1</span> </li>
                                                    <li><span class="maintext">Pooja Room:</span>&nbsp;<span class="subtext">Standard</span></li>
                                                    <li><span class="maintext">Study Room :</span>&nbsp;<span class="subtext">Standard</span></li>
                                                    <li><span class="maintext">Servant Room :</span>&nbsp;<span class="subtext">Standard</span></li>
                                                    <li><span class="maintext">Store Room:</span>&nbsp;<span class="subtext">Standard</span></li>
                                                    <li><span class="maintext">Other Room:</span>&nbsp;<span class="subtext">Standard</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row m-b">
                                            <div class="col-md-12">
                                                <h4><b><img src="<?php echo base_url(); ?>includes/properties_detail/images/bed.png" />&nbsp;Furnishing:</b></h4>
                                                <ul class="list list-half">
                                                    <li><span class="maintext">Wardrobe:</span> <span class="subtext">Available</span> </li>
                                                    <li><span class="maintext">Beds:</span>&nbsp;<span class="subtext">Available</span> </li>
                                                    <li><span class="maintext">Fans:</span>&nbsp;<span class="subtext">Available</span></li>
                                                    <li><span class="maintext">Light:</span>&nbsp;<span class="subtext">Available</span></li>
                                                    <li><span class="maintext">Fridge:</span>&nbsp;<span class="subtext">Available</span></li>
                                                    <li><span class="maintext">AC:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                    <li><span class="maintext">Geyser:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                    <li><span class="maintext">TV:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                    <li><span class="maintext">Stove:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                    <li><span class="maintext">Washing MAchine:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                    <li><span class="maintext">Water Purifier:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                    <li><span class="maintext">Microwave:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                    <li><span class="maintext">Curtains:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                    <li><span class="maintext">Chimney:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                    <li><span class="maintext">Exhaust Fan:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                    <li><span class="maintext">Sofa:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                    <li><span class="maintext">Dinning Table:</span>&nbsp;<span class="subtext">Not Available</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="card p-15">
                                <h3 class="detail-title"><img src="<?php echo base_url(); ?>includes/properties_detail/images/map.png" width="40" /> Locality</h3>
                                <hr/>
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Insights into Gulbai Tekra
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body"><p>Nestled in between the busy Gujarat University Road and CG Road (Chimanlal Girdharlal Road), Gulbai Tekra is one of the developing locality in Ahmedabad. Gulbai Tekra is surrounded by areas Ambavadi, Ellisbridge, Gurukul, Jodhpur Village, Juhapura, Memnagar, Naranpura, Navrangpura, Paldi and Prahlad Nagar. Gujarat University is just stone's throw away distance from here. It is a well-connected district in the city with various major roadways linking it to the neighboring major cities and beyond. The major road route is Sarkhej-Gandhinagar Highway besides which many other roads are also present that ease conveyance like Vastrapur Station Road, Vejalpur Road, Prahlad Nagar Road, Corporate Road, Ramdev Nagar Road and Jodhpur Gam Road. </p></div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Map View
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235014.2579235229!2d72.43965424025929!3d23.02018176155207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1487582266338" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="card p-15">
                                <h3 class="detail-title"><img src="<?php echo base_url(); ?>includes/properties_detail/images/nearby.png" width="38" /> Nearby Area</h3>
                                <hr/>
                                <div class="demo-gallery">
                                    <ul id="nearby" class="list-unstyled row">
                                        <li class="col-xs-6 col-sm-3 col-md-3" data-responsive="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/shop1.jpg 375, <?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/shop1.jpg 480, <?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/shop1.jpg 800" data-src="plugin/lightbox/img/shop1.jpg" data-sub-html="<h4>Front View</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                            <a href="">
                                                <img class="img-responsive" src="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/shop1.jpg">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-3 col-md-3" data-responsive="plugin/lightbox/img/shop2.jpg 375, plugin/lightbox/img/shop2.jpg 480, plugin/lightbox/img/shop2.jpg 800" data-src="plugin/lightbox/img/shop2.jpg" data-sub-html="<h4>2D View</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned ....</p>">
                                            <a href="">
                                                <img class="img-responsive" src="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/shop2.jpg">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-3 col-md-3" data-responsive="plugin/lightbox/img/shop3.jpg 375, plugin/lightbox/img/shop3.jpg 480, plugin/lightbox/img/shop3.jpg 800" data-src="plugin/lightbox/img/shop3.jpg" data-sub-html="<h4>Lorem ipsum</h4><p></p>">
                                            <a href="">
                                                <img class="img-responsive" src="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/shop3.jpg">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-3 col-md-3" data-responsive="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/shop4.jpg 375, <?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/shop4.jpg 480, <?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/shop4.jpg 800" data-src="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/shop4.jpg" data-sub-html="<h4>Bowness Bay</h4><p>....</p>">
                                            <a href="">
                                                <img class="img-responsive" src="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/shop4.jpg">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-3 col-md-3" data-responsive="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/img5.jpg 375, <?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/img5.jpg 480, <?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/img5.jpg 800" data-src="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/img5.jpg" data-sub-html="<h4>Bowness Bay</h4><p>....</p>">
                                            <a href="" class="hidden">
                                                <img class="img-responsive" src="plugin/lightbox/img/img5.jpg">
                                            </a>
                                        </li>
                                        <li class="col-xs-6 col-sm-6 col-md-3" data-responsive="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/img6.jpg 375, <?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/img6.jpg 480, <?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/img6.jpg 800" data-src="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/img6.jpg" data-sub-html="<h4>Bowness Bay</h4><p>....</p>">
                                            <a href="" class="hidden">
                                                <img class="img-responsive" src="<?php echo base_url(); ?>includes/properties_detail/plugin/lightbox/img/img6.jpg">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="card p-15">
                                <h3 class="detail-title"><img src="<?php echo base_url(); ?>includes/properties_detail/images/builder.png" width="40" /> About Developer</h3>
                                <hr/>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" src="<?php echo base_url(); ?>includes/properties_detail/images/demo-builder.png" alt="..." width="100">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Lorem ipsum company</h4>
                                        <ul class="list list-inline list-half clearfix">
                                            <li><span class="maintext">Established in</span><br><span class="subtext">1996</span></li>
                                            <li><span class="maintext">Total Projects</span><br><span class="subtext">12</span></li>
                                        </ul>
                                        <span class="more">Lorem ipsum has been dedicated to the mission of providing the people of Gujarat with quality-built, affordably priced new homes. Together with their experienced staff they encourage you to personalize your home in a way that will fit your present needs and future plans. They strive to make the home building process fun.. Choosing your home from their catalog of plans is just the beginning. They strive to reduce their costs in order to maintain reasonable prices. Customers' needs must be serviced promptly, before, during and after their purchase. After creating more than 10 Projects in Gujarat they come to know the customers need and provide them the luxurious apartments of their need with latest technologies integrated in it, which make Saikrupa Buildcon a leader in the field of building Luxurious Apartments. </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="card p-15">
                                <h3 class="detail-title"><img src="<?php echo base_url(); ?>includes/properties_detail/images/bank.png" width="40" /> Bank Offers</h3>
                                <hr/>
                                <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                                    <div class="carousel-inner">

                                        <div class="item active">
                                            <div class="col-xs-12 col-sm-6 col-md-2">
                                                <a href="#"><img src="<?php echo base_url(); ?>includes/properties_detail/images/axisbank.png" class="img-responsive center-block"></a>
                                                <h4 class="text-center">8.7% Floating</h4>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-2">
                                                <a href="#"><img src="<?php echo base_url(); ?>includes/properties_detail/images/citibank.png" class="img-responsive center-block"></a>
                                                <h4 class="text-center">8.7% Floating</h4>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-2">
                                                <a href="#"><img src="<?php echo base_url(); ?>includes/properties_detail/images/hdfc.png" class="img-responsive center-block"></a>
                                                <h4 class="text-center">8.7% Floating</h4>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-2">
                                                <a href="#"><img src="<?php echo base_url(); ?>includes/properties_detail/images/iifl.png" class="img-responsive center-block"></a><h4 class="text-center">8.7% Floating</h4>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="col-xs-12 col-sm-6 col-md-2">
                                                <a href="#"><img src="<?php echo base_url(); ?>includes/properties_detail/images/punjab.png" class="img-responsive center-block"></a><h4 class="text-center">8.7% Floating</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="slider-control">
                                        <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="<?php echo base_url(); ?>includes/properties_detail/images/arrow_left.png" alt="Left" class="img-responsive"></a>
                                        <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="<?php echo base_url(); ?>includes/properties_detail/images/arrow_right.png" alt="Right" class="img-responsive"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="sidebar">
                            <div class="col-md-12 col-sm-12 col-xs-12 card">
                                <h3 class="detail-title"><i class="fa fa-envelope"></i> Yes! I am Interested</h3>
                                <form class="inquiryform" method="post">
                                    <div class="form-group label-floating p-l-10">
                                        <label class="control-label" for="name">Name</label>
                                        <input class="form-control" id="name" name="name" type="text" required="">
                                    </div>
                                    <div class="form-group label-floating p-l-10">
                                        <label class="control-label" for="phoneno">Phone No</label>
                                        <input class="form-control" id="phoneno" name="phoneno" type="text" required="">
                                    </div>
                                    <div class="form-group label-floating p-l-10">
                                        <label class="control-label" for="emailid">Email Id</label>
                                        <input class="form-control" id="emailid" name="emailid" type="text" required="">
                                    </div>
                                    <div class="form-group label-floating p-l-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Send regular Property Alerts
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group btn-inquiry">
                                        <button type="submit" class="btn btn-warning btn-raised btn-block"><b>Send Inquiry</b></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 card">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <h3 class="detail-title">Virtual 360 &deg; View</h3>
                                    </div>
                                    <a href="" class="amenitiesview">
                                        <div class="col-md-4 col-xs-5">
                                            <img src="<?php echo base_url(); ?>includes/properties_detail/images/360.gif" alt="360 view" width="80px" />
                                        </div>
                                        <div class="col-md-8 col-xs-7">
                                            <h4>Get a Closer look with Amenities</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-center">
        <p>Copyright © 2017 <a href="http://property.realgujarat.com/">property.realgujarat.com</a> | All Rights Reserved.</p>
    </footer>  
</div>
<?php echo $footer; ?> 