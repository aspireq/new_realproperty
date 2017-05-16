<?php echo $header; ?> 
      <section>
         <div class="container-fluid p-0 videobanner">
            <div class="livevideo-wrapper playing">
               <!-- <video class="livevideo-timelapse" autoplay="" muted="" controls loop style="display: block; width: 1349px; height: 758.813px; left: 0px; top: 0px;">
                  <source src="video/great_wall_of_china.mp4" type="video/mp4">
               </video> -->
                 <video id="my-video" class="video-js livevideo-timelapse" autoplay="" muted="" controls loop preload="auto" style="display: block; width: 1349px; height: 758.813px; left: 0px; top: 0px;" poster="img/hero_bg_desktop.jpg" data-setup="{}">
                   <source src="<?php echo base_url(); ?>includes/video/great_wall_of_china.mp4" type='video/mp4'>
                   <source src="<?php echo base_url(); ?>includes/video/great_wall_of_china.webm" type='video/webm'>
                   <p class="vjs-no-js">
                     To view this video please enable JavaScript
                     </p>
                 </video>
               <div class="vr-actor"></div>
               <div class="vrshowroom-download-header">
                  <h1>Thousands of experiences.</h1>
                  <a href="#" class="playstore"></a>
                  <a href="#" class="appstore"></a>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="container">
            <div class="row card p-b-20">
               <div class="col-md-12">
                  <h2><b>360 &deg; Virtual tour Demo:</b></h2>
                  <!-- <a href="http://www.youtube.com/watch_popup?v=dBgC6fXCilI" target="_blank">Click Here</a> -->
                  <div class="row">
                     <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="hovereffect">
                           <img class="img-responsive" src="<?php echo base_url(); ?>includes/img/property1.jpg" alt="">
                           <div class="pro-overlay">
                              <h2>Iscon Platinum</h2>
                              <p class="info">
                                 <span class="infobox">
                                 <a data-toggle="modal" data-target="#comingsoon">
                                    <img src="<?php echo base_url(); ?>includes/img/virtualreality.png" class="img-responsive" />
                                    <br><span>Virtual Reality</span>
                                 </a>
                                 <a data-toggle="modal" data-target="#virtualtour">
                                    <img src="<?php echo base_url(); ?>includes/img/360p.png" class="img-responsive"/>
                                    <br><span>360&deg; Tour</span>
                                 </a>
                                 </span>
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="hovereffect">
                           <img class="img-responsive" src="img/property2.jpg" alt="">
                           <div class="pro-overlay">
                              <h2>Sky Lights, Bopal</h2>
                              <p class="info">
                                 <span class="infobox">
                                 <a data-toggle="modal" data-target="#comingsoon">
                                    <img src="<?php echo base_url();?>includes/img/virtualreality.png" class="img-responsive" />
                                    <br><span>Virtual Reality</span>
                                 </a>
                                 <a data-toggle="modal" data-target="#virtualtour">
                                    <img src="<?php echo base_url();?>includes/img/360p.png" class="img-responsive"/>
                                    <br><span>360&deg; Tour</span>
                                 </a>
                                 </span>
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="hovereffect">
                           <img class="img-responsive" src="<?php echo base_url();?>includes/img/property3.jpg" alt="">
                           <div class="pro-overlay">
                              <h2>Sky Park</h2>
                              <p class="info">
                                 <span class="infobox">
                                 <a data-toggle="modal" data-target="#comingsoon">
                                    <img src="<?php echo base_url();?>includes/img/virtualreality.png" class="img-responsive" />
                                    <br><span>Virtual Reality</span>
                                 </a>
                                 <a data-toggle="modal" data-target="#virtualtour">
                                    <img src="<?php echo base_url();?>includes/img/360p.png" class="img-responsive"/>
                                    <br><span>360&deg; Tour</span>
                                 </a>
                                 </span>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--comingsoon Modal -->
      <div class="modal fade" id="comingsoon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-hand-o-right"></i> 360 &deg; Tour</h4>
               </div>
               <div class="modal-body">
                  <h3 class="comingsoonpopup">360 &deg; Tour Coming Soon</h3>
               </div>
            </div>
         </div>
      </div>
      <!-- virtualtour Modal -->
      <div class="modal fade" id="virtualtour" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-hand-o-right"></i> Virtual Reality Tour</h4>
               </div>
               <div class="modal-body text-center">
                  <h3>Do You Have a Virtual Reality Headset?</h3>
                  <h4 class="popup-grey">Enter the link below in your mobile browser to view in virtual reality</h4>
                  <h3 class="comingsoonpopup">Virtual Reality Tour Coming Soon</h3>
                  <h4 class="popup-grey">View with <a href="http://property.realgujarat.com/">Realgujarat.com</a> </h4>
               </div>
            </div>
         </div>
      </div>
     
<?php echo $footer; ?>     
