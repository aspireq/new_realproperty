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
            <img src="img/slider2.jpg" alt="Chania" class="slider-img">
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

<?php echo $footer; ?>

