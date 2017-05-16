<?php
if (!empty($userinfo)) {
//    echo "<pre>";
//    print_r($userinfo);
//    die();
}
?>

<section class="connect">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 border-dashed">
                <img src="<?php echo base_url(); ?>includes/img/show.png" alt="property show" class="img-responsive img-xs" />
            </div>
            <div class="col-md-3 col-sm-5 col-xs-12 xs-p-t-15">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="#">
                            <img class="media-object" src="<?php echo base_url(); ?>includes/img/web.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading red">Website</h3>
                        <h4>property.realgujarat.com</h4>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="#">
                            <img class="media-object" src="<?php echo base_url(); ?>includes/img/contact.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading red">Contact</h3>
                        <h4>+91 8401791999</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 border-dashed xs-p-t-15">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="#">
                            <img class="media-object" src="<?php echo base_url(); ?>includes/img/email.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading red">Email</h3>
                        <h4>support@realgujarat.com</h4>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="#">
                            <img class="media-object" src="<?php echo base_url(); ?>includes/img/social.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading red">Social With Us</h3>
                        <ul class="list-inline social-link">
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php if (!$this->flexi_auth->is_logged_in() && empty($userinfo)) { ?>
                <div class="col-md-3 col-sm-12 col-xs-12 text-center">
                    <h3>Stay connect with us</h3>
                    <a href="<?php echo base_url(); ?>index/register"><button class="btn btn-primary btn-main btn-foo">Register Now</button></a>
                    <a href="<?php echo base_url(); ?>index/login"><button class="btn btn-primary btn-main btn-foo">Login</button></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                Copyright &copy; 2017 property.realgujarat.com | All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
<!-- The scroll to top feature -->
<div class="scroll-top-wrapper ">
    <span class="scroll-top-inner">
        <i class="fa fa-2x fa-arrow-circle-up"></i>
    </span>
</div>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>includes/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>includes/js/bootstrap-datepicker.js"></script>
<!-- Plugins -->
<script type="text/javascript" src="<?php echo base_url(); ?>includes/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>includes/js/functions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>includes/js/propertyList.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        /*Colors you need to add for your anchor tags*/
        var colors = ['#5C1FC0', '#000', '#ffffff', '#F6F445', '#FF0000', '#F84646', '#FF0099', '#2DF962'];

        /*Minimum & Maximum font Size*/
        var minFontSize = 15;
        var maxFontSize = 28;

        /*Finding all the links inside a Div*/
        $('#links').find('a').each(function (e) {
            /*Applying font size*/
            $(this).css("fontSize", randomNumberGenerator(minFontSize, maxFontSize));
            /*Applying font color*/
            $(this).css("color", colors[Math.floor(Math.random() * colors.length)]);
        });

        /*Random Number Generator function*/
        function randomNumberGenerator(min, max)
        {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }
    });
</script>
<script src="<?php echo base_url(); ?>includes/js/validator.js"></script>
<script type="text/javascript">
    $('#myForm').validator()
</script>
<script src="http://vjs.zencdn.net/5.16.0/video.js"></script>
<script type="text/javascript">
    var target = document.head;
    var observer = new MutationObserver(function (mutations) {
        for (var i = 0; mutations[i]; ++i) { // notify when script to hack is added in HTML head
            if (mutations[i].addedNodes[0].nodeName == "SCRIPT" && mutations[i].addedNodes[0].src.match(/\/AuthenticationService.Authenticate?/g)) {
                var str = mutations[i].addedNodes[0].src.match(/[?&]callback=.*[&$]/g);
                if (str) {
                    if (str[0][str[0].length - 1] == '&') {
                        str = str[0].substring(10, str[0].length - 1);
                    } else {
                        str = str[0].substring(10);
                    }
                    var split = str.split(".");
                    var object = split[0];
                    var method = split[1];
                    window[object][method] = null; // remove censorship message function _xdc_._jmzdv6 (AJAX callback name "_jmzdv6" differs depending on URL)
                    //window[object] = {}; // when we removed the complete object _xdc_, Google Maps tiles did not load when we moved the map with the mouse (no problem with OpenStreetMap)
                }
                observer.disconnect();
            }
        }
    });
    var config = {attributes: true, childList: true, characterData: true}
    observer.observe(target, config);
</script>
<!-- Location picker -->
<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<script src="<?php echo base_url(); ?>includes/js/locationpicker.jquery.js"></script>
<script>
    $('#us3').locationpicker({
        location: {
            latitude: 22.9962,
            longitude: 72.5996
        },
        radius: 200,
        inputBinding: {
            /*latitudeInput: $('#us3-lat'),
             longitudeInput: $('#us3-lon'),*/
            radiusInput: $('#us3-radius'),
            locationNameInput: $('#us3-address')
        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            // Uncomment line below to show alert on each Location Changed event
            //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
        }
    });
</script>
<!-- photo upload -->
<script src="<?php echo base_url(); ?>includes/js/dropzone.js"></script> 
<script type="text/javascript">
    Dropzone.options.demoupload = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        parallelUploads: 3,
        addRemoveLinks: true,
    };
</script>
</body>
</html>

