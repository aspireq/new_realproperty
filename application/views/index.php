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
            <img src="<?php echo base_url();?>includes/img/slider1.jpg" alt="Chania" class="slider-img">
            <div class="carousel-caption">
               <h4>Keeping Your Success First</h4>
               <h3>01, April - 30 April 2017</h3>
               <a href="register.php"><button class="btn btn-primary btn-main">Register Now</button></a>
            </div>
         </div>
         <div class="item">
            <img src="<?php echo base_url();?>includes/img/slider2.jpg" alt="Chania" class="slider-img">
            <div class="carousel-caption">
               <h4>Keeping Your Success First</h4>
               <h3>01, April - 30 April 2017</h3>
               <a href="register.php"><button class="btn btn-primary btn-main">Register Now</button></a>
            </div>
         </div>
         <div class="item">
            <img src="<?php echo base_url();?>includes/img/slider3.jpg" alt="Flower" class="slider-img">
            <div class="carousel-caption">
               <h4>Keeping Your Success First</h4>
               <h3>01, April - 30 April 2017</h3>
               <a href="register.php"><button class="btn btn-primary btn-main">Register Now</button></a>
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
               <img src="<?php echo base_url();?>includes/img/logoad/1.png" alt="logoad" class="img-responsive img-center" />
            </li>
            <li>
               <img src="<?php echo base_url();?>includes/img/logoad/2.png" alt="logoad" class="img-responsive img-center" />
            </li>
            <li>
               <img src="<?php echo base_url();?>includes/img/logoad/3.png" alt="logoad" class="img-responsive img-center" />
            </li>
            <li> 
               <img src="<?php echo base_url();?>includes/img/logoad/4.png" alt="logoad" class="img-responsive img-center" />
            </li>
            <li>
               <img src="<?php echo base_url();?>includes/img/logoad/1.png" alt="logoad" class="img-responsive img-center" />
            </li>
            <li>
               <img src="<?php echo base_url();?>includes/img/logoad/2.png" alt="logoad" class="img-responsive img-center" />
            </li>
            <li>
               <img src="<?php echo base_url();?>includes/img/logoad/3.png" alt="logoad" class="img-responsive img-center" />
            </li>
         </ul>
      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
         <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="filter row">
                  <form class="form-inline col-md-12 col-sm-12 col-xs-12">
                     <div class="form-group col-md-3 col-sm-3 col-xs-12">
                        <select class="form-control">
                           <option selected="" disabled="">Property type</option>
                           <option>All</option>
                           <option disabled="">-------------------</option>
                           <option>Residential Apartment</option>
                           <option>Independent House</option>
                           <option>Residential Land</option>
                           <option>Commercial Shop</option>
                           <option>Commercial Office</option>
                        </select>
                     </div> 
                     <div class="form-group col-md-3 col-sm-3 col-xs-12">
                        <select class="form-control">
                           <option selected="" disabled="">Location</option>
                           <option>All</option>
                           <option disabled="">-------------------</option>
                           <option>Ahmedabad</option>
                           <option>Gandhinagar</option>
                           <option>Baroda</option>
                        </select>
                     </div> 
                     <div class="form-group col-md-4 col-sm-3 col-xs-12">
                        <select class="form-control">
                           <option selected="" disabled="">Construction Status</option>
                           <option>All</option>
                           <option disabled="">-------------------</option>
                           <option>Under Construction</option>
                           <option>Ready to Move</option>
                        </select>
                     </div> 
                     <div class="form-group col-md-2 col-sm-3 col-xs-12">
                        <button class="btn btn-primary btn-block">Search</button>  
                     </div>                  
                  </form>
               </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="property">
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     
                        <div class="card">
                        
                           <div class="view">
                              <div class="caption">
                                 <h3>Wiseberry</h3>
                                 <a href="" rel="tooltip" title="Add to Favorites"><span class="fa fa-heart-o fa-2x"></span></a>
                                 <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                              </div>
                              <img src="<?php echo base_url();?>includes/img/property.jpg" class="img-responsive">
                              <div class="propertyType house">House</div>
                           </div>
                           <a href="detailpage/detail.php">
                           <div class="info">
                              <h5 style="text-overflow: ellipsis">CASTLE HILL</h5>
                              <ul class="list-inline">
                                 <li>
                                    <span rel="tooltip" title="Sq Ft"><img src="<?php echo base_url();?>includes/img/area.png" width="18" /> 123 </span>
                                 </li>
                                 <li>
                                    <span rel="tooltip" title="Unit"><img src="<?php echo base_url();?>includes/img/building.png"  width="18"/> 2 BHK </span>
                                 </li>
                                 <li>
                                    <span rel="tooltip" title="Type"><img src="<?php echo base_url();?>includes/img/billboard.png"  width="18"/> Rent </span>
                                 </li>
                              </ul>
                           </div>
                           <div class="stats green-bg">
                              <span>$123465</span>
                              <span class="fa fa-building pull-right" rel="tooltip" title="Location"> <strong>Chandkheda</strong></span>
                           </div>
                           </a>
                        </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     
                        <div class="card">
                           <div class="view">
                              <div class="caption">
                                 <h3>Wiseberry</h3>
                                 <a href="" rel="tooltip" title="Add to Favorites"><span class="fa fa-heart-o fa-2x"></span></a>
                                 <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                              </div>
                              <img src="<?php echo base_url();?>includes/img/property.jpg" class="img-responsive">
                              <div class="propertyType commercial">Commercial</div>
                           </div>
                           <a href="detailpage/detail.php">
                           <div class="info">
                              <h5 style="text-overflow: ellipsis">CASTLE HILL</h5>
                              <ul class="list-inline">
                                 <li>
                                    <span rel="tooltip" title="Sq Ft"><img src="<?php echo base_url();?>includes/img/area.png" width="18" /> 123 </span>
                                 </li>
                                 <li>
                                    <span rel="tooltip" title="Unit"><img src="<?php echo base_url();?>includes/img/building.png"  width="18"/> 2 BHK </span>
                                 </li>
                                 <li>
                                    <span rel="tooltip" title="Type"><img src="<?php echo base_url();?>includes/img/billboard.png"  width="18"/> Sale </span>
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
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     
                     <div class="card">
                        <div class="view">
                           <div class="caption">
                              <h3>Wiseberry</h3>
                              <a href="" rel="tooltip" title="Add to Favorites"><span class="fa fa-heart-o fa-2x"></span></a>
                              <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                           </div>
                           <img src="<?php echo base_url();?>includes/img/property.jpg" class="img-responsive">
                           <div class="propertyType house">House</div>
                        </div>
                        <a href="detailpage/detail.php">
                        <div class="info">
                           <h5 style="text-overflow: ellipsis">CASTLE HILL</h5>
                           <ul class="list-inline">
                              <li>
                                 <span rel="tooltip" title="Sq Ft"><img src="<?php echo base_url();?>includes/img/area.png" width="18" /> 123 </span>
                              </li>
                              <li>
                                 <span rel="tooltip" title="Unit"><img src="<?php echo base_url();?>includes/img/building.png"  width="18"/> 2 BHK </span>
                              </li>
                              <li>
                                 <span rel="tooltip" title="Type"><img src="<?php echo base_url();?>includes/img/billboard.png"  width="18"/> Sale </span>
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
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     
                     <div class="card">
                        <div class="view">
                           <div class="caption">
                              <h3>Wiseberry</h3>
                              <a href="" rel="tooltip" title="Add to Favorites"><span class="fa fa-heart-o fa-2x"></span></a>
                              <a href="" rel="tooltip" title="View"><span class="fa fa-search fa-2x"></span></a>
                           </div>
                           <img src="<?php echo base_url();?>includes/img/property.jpg" class="img-responsive">
                           <div class="propertyType unit">Unit</div>
                        </div>
                        <a href="detailpage/detail.php">
                        <div class="info">
                           <h5 style="text-overflow: ellipsis">CASTLE HILL</h5>
                           <ul class="list-inline">
                              <li>
                                 <span rel="tooltip" title="Sq Ft"><img src="<?php echo base_url();?>includes/img/area.png" width="18" /> 123 </span>
                              </li>
                              <li>
                                 <span rel="tooltip" title="Unit"><img src="<?php echo base_url();?>includes/img/building.png"  width="18"/> 2 BHK </span>
                              </li>
                              <li>
                                 <span rel="tooltip" title="Type"><img src="<?php echo base_url();?>includes/img/billboard.png"  width="18"/> Sale </span>
                              </li>
                           </ul>
                        </div>
                        <div class="stats green-bg">
                           <span>$123465</span>
                           <span class="fa fa-building pull-right" rel="tooltip" title="Location"> <strong>S.G. Highway</strong></span>
                        </div>
                        </a>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
      </div>
      <div class="col-md-2 col-sm-2 exclusivead">
         <h4 class="text-center">Real Gujarat Exclusive</h4>
         <ul class="list center-block">
            <li>
               <img src="<?php echo base_url();?>includes/img/exclusivead/3.png" alt="logoad" class="img-responsive img-center" />
            </li>
            <li>
               <img src="<?php echo base_url();?>includes/img/exclusivead/1.png" alt="logoad" class="img-responsive img-center" />
            </li>
            <li>
               <img src="<?php echo base_url();?>includes/img/exclusivead/2.png" alt="logoad" class="img-responsive img-center" />
            </li>
         </ul>
      </div>
   </div>
</section>
<?php echo $footer; ?>

