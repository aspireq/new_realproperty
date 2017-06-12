<?php echo $header; ?>

<section class="content">
    <div class="container">
        <center><h3 class="maintitle">Find <span class="red">Property</span></h3></center>
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h5></h5>
                </center>
            </div>
            <div class="col-md-12">
                <div class="row property"> 
                    <?php foreach ($result as $property) { ?>
                        <div class="col-md-3">                        
                            <div class="card">                           
                                <div class="view">
                                    <div class="caption">
                                        <h3><?php echo $property->project_name; ?></h3>
<!--                                        <a href="<?php echo base_url(); ?>index/propertydetails/<?php echo $property->id; ?>" rel="tooltip" title="Add to Favorites"><span class="fa fa-heart-o fa-2x"></span></a>-->
                                        <a href="<?php echo base_url(); ?>index/propertydetails/<?php echo $property->id; ?>" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                                    </div>
                                    <img src="<?php echo base_url(); ?>includes/properties_img/<?php echo (isset($property->property_image) && $property->property_image != "" && (file_exists(FCPATH . 'includes/properties_img/' . $property->property_image))) ? $property->property_image : 'no_image.jpg'; ?>" class="img-responsive">                                    
                                    <div class="propertyType house"><?php echo $property->property_type_name; ?></div>
                                </div>
                                <a href="<?php echo base_url(); ?>index/propertydetails/<?php echo $property->id; ?>">
                                    <div class="info">
                                        <h5 style="text-overflow: ellipsis"><?php echo $property->property_configuration .' in '. $property->area_name; ?></h5>
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
                                        <h5 style="text-overflow: ellipsis"><?php echo $property->availability; ?></h5>
                                    </div>
                                </a>
                                <div class="stats green-bg">
                                    <span><?php echo "Posted On " . date('d-m-Y', strtotime($property->created_date)); ?></span>
                                    <?php if($this->flexi_auth->is_logged_in() && !empty($userinfo) && $userinfo['uacc_group_fk'] == 3) { ?>
                                    <button class="btn btn-primary pull-right" type="button" name="edit_proeprty" id="edit_proeprty" onclick="window.location.href = '<?php echo base_url(); ?>auth/add_property/<?php echo $property->id; ?>'">Edit</button>
                                    <?php } ?>
                                </div>
                            </div>                        
                        </div>
                    <?php } ?>
                    <!--                     <div class="col-md-3">
                                            
                                               <div class="card">
                                                  <div class="view">
                                                     <div class="caption">
                                                        <h3>Wiseberry</h3>
                                                        <a href="" rel="tooltip" title="Add to Favorites"><span class="fa fa-heart-o fa-2x"></span></a>
                                                        <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                                                     </div>
                                                     <img src="<?php echo base_url(); ?>includes/img/property.jpg" class="img-responsive">
                                                     <div class="propertyType commercial">Commercial</div>
                                                  </div>
                                                  <a href="<?php echo base_url(); ?>index/properydetaiils">
                                                  <div class="info">
                                                     <h5 style="text-overflow: ellipsis">CASTLE HILL</h5>
                                                     <ul class="list-inline">
                                                        <li>
                                                           <span rel="tooltip" title="Sq Ft"><img src="<?php echo base_url(); ?>includes/img/area.png" width="18" /> 123 </span>
                                                        </li>
                                                        <li>
                                                           <span rel="tooltip" title="Unit"><img src="<?php echo base_url(); ?>includes/img/building.png"  width="18"/> 2 BHK </span>
                                                        </li>
                                                        <li>
                                                           <span rel="tooltip" title="Type"><img src="<?php echo base_url(); ?>includes/img/billboard.png"  width="18"/> Sale </span>
                                                        </li>
                                                     </ul>
                                                  </div>
                                                  <div class="stats green-bg">
                                                     <span>$123465</span>
                                                     <span class="fa fa-building pull-right" rel="tooltip" title="Location"> <strong>Maninagar</strong></span>
                                                  </div>
                                                   </a>
                                               </div>
                                           
                                         </div>
                                         <div class="col-md-3">
                                            
                                            <div class="card">
                                               <div class="view">
                                                  <div class="caption">
                                                     <h3>Wiseberry</h3>
                                                     <a href="" rel="tooltip" title="Add to Favorites"><span class="fa fa-heart-o fa-2x"></span></a>
                                                     <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                                                  </div>
                                                  <img src="<?php echo base_url(); ?>includes/img/property.jpg" class="img-responsive">
                                                  <div class="propertyType house">House</div>
                                               </div>
                                               <a href="detailpage/detail.php">
                                               <div class="info">
                                                  <h5 style="text-overflow: ellipsis">CASTLE HILL</h5>
                                                  <ul class="list-inline">
                                                     <li>
                                                        <span rel="tooltip" title="Sq Ft"><img src="<?php echo base_url(); ?>includes/img/area.png" width="18" /> 123 </span>
                                                     </li>
                                                     <li>
                                                        <span rel="tooltip" title="Unit"><img src="<?php echo base_url(); ?>includes/img/building.png"  width="18"/> 2 BHK </span>
                                                     </li>
                                                     <li>
                                                        <span rel="tooltip" title="Type"><img src="<?php echo base_url(); ?>includes/img/billboard.png"  width="18"/> Sale </span>
                                                     </li>
                                                  </ul>
                                               </div>
                                               <div class="stats green-bg">
                                                  <span>$123465</span>
                                                  <span class="fa fa-building pull-right" rel="tooltip" title="Location"> <strong>Paldi</strong></span>
                                               </div>
                                               </a>
                                            </div>
                                            
                                         </div>
                                         <div class="col-md-3">
                                            
                                            <div class="card">
                                               <div class="view">
                                                  <div class="caption">
                                                     <h3>Wiseberry</h3>
                                                     <a href="" rel="tooltip" title="Add to Favorites"><span class="fa fa-heart-o fa-2x"></span></a>
                                                     <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                                                  </div>
                                                  <img src="<?php echo base_url(); ?>includes/img/property.jpg" class="img-responsive">
                                                  <div class="propertyType unit">Unit</div>
                                               </div>
                                               <a href="detailpage/detail.php">
                                               <div class="info">
                                                  <h5 style="text-overflow: ellipsis">CASTLE HILL</h5>
                                                  <ul class="list-inline">
                                                     <li>
                                                        <span rel="tooltip" title="Sq Ft"><img src="<?php echo base_url(); ?>includes/img/area.png" width="18" /> 123 </span>
                                                     </li>
                                                     <li>
                                                        <span rel="tooltip" title="Unit"><img src="<?php echo base_url(); ?>includes/img/building.png"  width="18"/> 2 BHK </span>
                                                     </li>
                                                     <li>
                                                        <span rel="tooltip" title="Type"><img src="<?php echo base_url(); ?>includes/img/billboard.png"  width="18"/> Sale </span>
                                                     </li>
                                                  </ul>
                                               </div>
                                               <div class="stats green-bg">
                                                  <span>$123465</span>
                                                  <span class="fa fa-building pull-right" rel="tooltip" title="Location"> <strong>S.G. Highway</strong></span>
                                               </div>
                                               </a>
                                            </div>
                                            </div>-->
                </div>
            </div>
        </div>
    </div>
</section>      
<?php echo $footer; ?>