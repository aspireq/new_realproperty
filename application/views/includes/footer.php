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
                    <a href="<?php echo base_url(); ?>register"><button class="btn btn-primary btn-main btn-foo">Register Now</button></a>
                    <a href="<?php echo base_url(); ?>login"><button class="btn btn-primary btn-main btn-foo">Login</button></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center copyright">
                Copyright &copy; 2017 <a href="http://property.realgujarat.com/">property.realgujarat.com</a> | All Rights Reserved.
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

<script src="<?php echo base_url(); ?>includes/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>includes/js/dropzone.js"></script> 
<script src="<?php echo base_url(); ?>includes/js/bootstrap-datepicker.js"></script>
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
    function add_exclusive_ad() {
        $('#post_ad')[0].reset();
        $('#add_exclusive_ads').modal('show');
    }
    function delete_ad(id) {
        var r = confirm("Are you sure you want to delete this ad");
        if (r == true) {
            $('#record_id').val(id);
            $('#record_change_type').val('Delete');
            $('#table_name').val('advertizement');
            $('#page_url').val('advertizement');
            $('#image_folder').val('exclusive_ad');
            $("#op_ad").submit();
        }
    }
    function delete_property(id) {
        var r = confirm("Are you sure you want to delete this property");
        if (r == true) {
            $('#record_id').val(id);
            $('#record_change_type').val('Delete');
            $('#table_name').val('properties');
            $('#page_url').val('properties');
            $('#image_folder').val('properties_images,properties_videos,property_nearby');
            $('#table_names').val('property_images,property_videos,property_nearby');
            $("#op_ad").submit();
        }
    }
    function change_status(id) {
        var r = confirm("Are you sure you want to update status");
        if (r == true) {
            $('#record_id').val(id);
            $('#record_change_type').val('Status');
            $('#table_name').val('advertizement');
            $('#page_url').val('advertizement');
            $("#op_ad").submit();
        }
    }
    function change_property_status(id) {
        var r = confirm("Are you sure you want to update status");
        if (r == true) {
            $('#record_id').val(id);
            $('#record_change_type').val('Status');
            $('#table_name').val('properties');
            $('#page_url').val('properties');
            $("#op_ad").submit();
        }
    }
    function edit_ad(id) {
        $.ajax({
            url: "<?php echo base_url(); ?>auth/get_record/",
            type: "POST",
            data: {table_name: 'advertizement', id: id},
            dataType: "JSON",
            success: function (response)
            {
                $('#post_ad')[0].reset();
                $('#edit_id').val(id);
                $('#name').val(response.name);
                $('#old_image').val(response.image);
                if (response.ad_type == 1) {
                    $("#property").prop("checked", true);
                } else if (response.ad_type == 2) {
                    //$("#exclusive_ad").prop("checked", true);
                    $('#exclusive_ad_type').attr("checked", "checked");
                }
                $('#add_exclusive_ads').modal('show');
            }
        });
    }
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
<script type="text/javascript">
//    Dropzone.options.demoupload = {
//        paramName: "file", // The name that will be used to transfer the file
//        maxFilesize: 2, // MB
//        parallelUploads: 3,
//        addRemoveLinks: true,
//    };
</script>
<script>
    $(document).ready(function () {
        $('.old_property_image').click(function () {
            $(this).parents('.oldimage .col-md-3').remove();
            $(this).closest('input').remove();
        });
        $('.old_nearby_image').click(function () {
            $(this).parents('.oldimage .col-md-3').remove();
            $(this).closest('input').remove();
        });
        $('.old_property_video').click(function () {
            $(this).parents('.oldimage .col-md-3').remove();
            $(this).closest('input').remove();
        });
        set_usertype('<?php echo (!empty($propertyinfo) && $propertyinfo->added_as != "") ? $propertyinfo->added_as : 'owner'; ?>');
        // var property_units_opt = '<?php echo (!empty($propertyinfo) && $propertyinfo->multiple_property_units != "") ? $propertyinfo->multiple_property_units : ''; ?>';
        //  if (property_units_opt == 1) {
        //      set_propery_counts();
        //  }
        commercial_property();
        $('#property_error').hide();
        //$('#avail_date_error').hide();
        $('#property_unit_error').hide();
        $('#pg_avail_error').hide();
        $('#pg_suitable_error').hide();
        $('#resengital_options').empty();
        $('#rent_options').empty();
        $('#sell_options').empty();
        $('#resengital_options').empty();
        $('#available_from_value').datepicker({format: 'yyyy-mm-dd'});
        $('#parking_options_open').hide();
        $('#parking_options_covered').hide();
        $('#addition_floorinfo').hide();
        $('#security_depisit_info').hide();
        $('#furnishing_info').hide();
        $('#available_from').hide();
        set_propery_types();
        $('#extra_detail').click(function () {
            var checked = $("input[id=extra_detail]:checked").length;
            if (checked) {
                $('#addition_floorinfo').show();
            } else {
                $('#addition_floorinfo').hide();
            }
        });
        $('#no_parking').click(function () {
            var checked = $("input[id=no_parking]:checked").length;
            if (checked) {
                $('#open_parking').prop('disabled', true);
                $('#covered_parking').prop('disabled', true);
                $('#parking_options_open').hide();
                $('#parking_options_covered').hide();
                $('#open_parking').attr('checked', false);
                $('#covered_parking').attr('checked', false);
            } else {
                $('#open_parking').prop('disabled', false);
                $('#covered_parking').prop('disabled', false);
            }
        });
        $('#open_parking').click(function () {
            var checked = $("input[id=open_parking]:checked").length;
            if (checked) {
                $('#parking_options_open').show();
            } else {
                $('#parking_options_open').hide();
            }
        });
        $('#covered_parking').click(function () {
            var checked = $("input[id=covered_parking]:checked").length;
            if (checked) {
                $('#parking_options_covered').show();
            } else {
                $('#parking_options_covered').hide();
            }
        });
        $("ul#list_t_railway li").on("click", function () {
            alert($("ul#list_t_railway").text());
        });
    });
    $(function () {
        $('.info_link').click(function () {
            alert($(this).attr('href'));
            // or alert($(this).hash();
        });
    });
    function set_usertype(user_type) {
        $('#user_type').val(user_type);
        var data = $('#user_type').val();
    }
    function set_propery_types() {
        var listed_propery = $('#property_type').val();
        var selected_propery = $("input[name=residentialpropery]:checked").val();
        if (listed_propery == "Rent/Lease") {
            $('#available_from').show();
            $('#security_depisit_info').show();
        } else {
            $('#available_from').hide();
            $('#security_depisit_info').hide();
        }
        var property_type_name = '<?php echo (!empty($propertyinfo) && $propertyinfo->property_type_name != "") ? $propertyinfo->property_type_name : ''; ?>';
        $.ajax({
            url: "<?php echo base_url(); ?>auth/list_properties/",
            type: "POST",
            data: {property_type: listed_propery, property_type_name: property_type_name},
            dataType: "JSON",
            success: function (response)
            {
                $('#property_types').html(response);
                $('#resengital_options').empty();
                $('#rent_options').empty();
                $('#sell_options').empty();
            }
        });
//        if (property_type_name != "") {
//            $("input[value='" + property_type_name + "']").prop('checked', true);
//        }
    }
    function set_info(info_type) {
        //alert(info_type);
        //$("select[name=property_type] option:last").remove();        
        $('#resengital_options').empty();
        $('#rent_options').empty();
        $('#sell_options').empty();
        if (info_type == "residential") {
            $('#furnishing_info').show();
        } else {
            $('#furnishing_info').hide();
        }
    }
    function residential_propery() {
        var listed_propery = $('#property_type').val();
        if (listed_propery == "Rent/Lease") {
            $.ajax({
                url: "<?php echo base_url(); ?>auth/residential_propery/",
                type: "POST",
                data: {},
                dataType: "JSON",
                success: function (response)
                {
                    $('#resengital_options').html(response);
                }
            });
        } else if (listed_propery == "PayingGuest") {
            $.ajax({
                url: "<?php echo base_url(); ?>auth/rent_options/",
                type: "POST",
                data: {},
                dataType: "JSON",
                success: function (response)
                {
                    $('#rent_options').html(response);
                }
            });
        } else {
            $('#resengital_options').empty();
            $('#rent_options').empty();
            $('#sell_options').empty();
        }
    }
    function set_propery_counts() {
        var selected_pro = $("input[name=property_unit_value]:checked").val();
        if (selected_pro == 1) {
            $('#property_count').show();
        } else {
            $('#property_count').hide();
        }
    }
    function commercial_property() {
        var listed_propery = $('#property_type').val();
        var multiple_property_units = '<?php echo (!empty($propertyinfo) && $propertyinfo->multiple_property_units != "") ? $propertyinfo->multiple_property_units : ''; ?>';
        var no_of_units = '<?php echo (!empty($propertyinfo) && $propertyinfo->no_of_units != "") ? $propertyinfo->no_of_units : ''; ?>';

        if (listed_propery == "Sell") {
            $.ajax({
                url: "<?php echo base_url(); ?>auth/sell_options/",
                type: "POST",
                data: {multiple_property_units: multiple_property_units, no_of_units: no_of_units},
                dataType: "JSON",
                success: function (response)
                {
                    $('#sell_options').html(response);
                    set_propery_counts();
                }
            });
        }
    }
</script>
<script>
    var uploadedfiles = [];
    var uploadedfilesmenu = [];
    Dropzone.options.demoupload = {
        addRemoveLinks: true,
        thumbnailWidth: "100",
        thumbnailHeight: "100",
        init: function () {
            thisDropzone = this;
            this.on("addedfile", function (file) {
            });
            //$.get('<?php echo base_url(); ?>auth/property_images/', function (data) {                          
            // $.each(data, function (key, value) {
            //     alert(value);
//                    var mockFile = {name: value.name, size: value.size};
//                    thisDropzone.options.addedfile.call(thisDropzone, mockFile);
//                    thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "uploads/" + value.name);
            // });
            //});
        },
        success: function (file, response) {
            $('#btn_step6').prop('disabled', false);
            $('#btn_step5').prop('disabled', false);
            files = JSON.parse(response);
            fileobj = [files['filename'], file.name];
            uploadedfiles.push(fileobj);
            if (files['got_image'] == true) {
                $('#valid_image_error').val('1');
            }
        },
        error: function (response) {
            $('#btn_step6').prop('disabled', false);
            $('#btn_step5').prop('disabled', false);
            alert(response.xhr.responseText);
        },
        removedfile: function (file) {
            $('#btn_step6').prop('disabled', false);
            $('#btn_step5').prop('disabled', false);
        },
        uploadprogress: function (file) {
            $('#btn_step6').prop('disabled', true);
            $('#btn_step5').prop('disabled', true);
        },
    };
//    Dropzone.on("error", function (file, errormessage, xhr) {
//        if (xhr) {
//            var response = JSON.parse(xhr.responseText);
//            alert(response.message);
//            var element = file.previewElement;
//            $("img[alt='" + file.name + "']").parent().parent().remove();
//        }
//    });
    function delete_property_image(filename) {
        var filename = file.name;
        if (uploadedfiles.length > 0) {
            $.each(uploadedfiles, function (key, value) {
                var fileid = jQuery.inArray(file.name, value);
                if (fileid != -1) {
                    filename = value[0];
                }
            });
        }
        $.ajax({
            url: "<?php echo base_url(); ?>auth/delete_property_image/",
            type: "POST",
            data: {filename: filename},
            dataType: "JSON",
            success: function (data)
            {
                var element = file.previewElement;
                $("img[alt='" + file.name + "']").parent().parent().remove();
            }
        });
    }
</script>
</body>
</html>

