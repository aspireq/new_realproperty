/*scroll*/
$(document).ready(function () {

    $(function () {

        $(document).on('scroll', function () {

            if ($(window).scrollTop() > 100) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });

        $('.scroll-top-wrapper').on('click', scrollToTop);
    });

    function scrollToTop() {
        verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
        element = $('body');
        offset = element.offset();
        offsetTop = offset.top;
        $('html, body').animate({
            scrollTop: offsetTop
        }, 500, 'linear');
    }

});

/*carousel*/

$(document).ready(function () {
    $('.carousel').carousel({
        interval: 7000,
        pause: false
    });

    $('.carousel').carousel('cycle');
});

/*carousel height*/
if ($(window).width() > 767) {
    $(document).ready(function () {

        var $header = $('header');
        var ans = $(window).height() - $header.height() + 30;
        $(".slider-img").css("height", ans);
    });
}
if ($(window).width() > 767) {
    $(document).ready(function () {
        var ans = $(window).height();
        $(".subsliderimg").css("height", ans);
    });
}


/*step active*/
/*$(document).ready(function() {
 $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
 $(this).siblings('a.active').removeClass("active");
 $(this).addClass("active");
 var index = $(this).index();
 $("div.bhoechie-tab div.bhoechie-tab-content").removeClass("active");
 $("div.bhoechie-tab div.bhoechie-tab-content").eq(index).addClass("active");
 });
 });*/

/*progressbar*/
$(function () {
    $('[data-toggle="tooltip"]').tooltip({trigger: 'manual'}).tooltip('show');
});

$(window).load(function () {
    $(".progress-bar").each(function () {
        each_bar_width = $(this).attr('aria-valuenow');
        $(this).width(each_bar_width + '%');
    });
});


//function show_progress() {
//    each_bar_width = $(".progress-bar").attr('aria-valuenow');
//    each_bar_width = parseInt(each_bar_width) + parseInt(20);
// $(".progress-bar").width(each_bar_width + '%');
//$('span.className').attr('title','New Title');​
//$('.popOver').find("span").attr("title", 'Some_text');
//}
/*radio*/

$('#radioBtn a').on('click', function () {
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#' + tog).prop('value', sel);

    $('a[data-toggle="' + tog + '"]').not('[data-title="' + sel + '"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="' + tog + '"][data-title="' + sel + '"]').removeClass('notActive').addClass('active');
})

/* Time Countdown 
 -------------------------------------------------------------------*/




/*wizard*/
$(document).ready(function () {
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var $target = $(e.target);
        if ($target.parent().hasClass('disabled')) {
            return false;
        } else {
            var step = $(e.target).data('step');
            var percent = (parseInt(step) / 6) * 100;
            percent = parseInt(percent);
            $('.progress-bar').css({width: percent + '%'});
            $('.tooltip-inner').text(percent + '%');
        }
    });
    $("#btn_step1").click(function (e) {
        e.preventDefault();
        var submit_false;
        var checked = $("input[name=residentialpropery]:checked").length;
        //var available_for = $('#available_from_value').val();
        var selected_pro = $("input[name=property_unit_value]:checked").val();
        var propery_units = $('#property_count_value').val();
        if (checked == 0) {
            $('#property_error').show();
            submit_false = 1;
        } else {
            $('#property_error').hide();
            submit_false = (submit_false == 1) ? 1 : 0;
        }
//        if (available_for == "") {
//            $('#avail_date_error').show();
//            submit_false = 1;
//        } else {
//            $('#avail_date_error').hide();
//            submit_false = (submit_false == 1) ? 1 : 0;
//        }
        if (selected_pro == 1 && propery_units == "") {
            $('#property_unit_error').show();
            submit_false = 1;
        } else if (selected_pro == 1 && propery_units != "" && !$.isNumeric(propery_units)) {
            $('#property_unit_error').show();
            submit_false = 1;
        } else {
            $('#property_unit_error').hide();
            submit_false = (submit_false == 1) ? 1 : 0;
        }
        if (submit_false == 0) {
            // show_progress();
            var $active = $('.list-group li.active');
            $active.next().removeClass('disabled');
            $('.list-group li.active a i:nth-child(2)').removeClass('fa fa-exclamation-circle fa-yellow');
            $('.list-group li.active a i:nth-child(2)').addClass('fa fa-check-circle fa-green');
            nextTab($active);
        }
    });
    $("#btn_step2").click(function (e) {
        e.preventDefault();
        $("label.has-error").remove();
        var submit_false;
        var project_name = $("#project_name").val();
        var property_location = $('#us3-address').val();
        var property_address = $("#property_address").val();
        var property_neardesc = $("#property_neardesc").val();
        if (project_name == "") {
            call_error("project_name", "Please enter project name.");
            submit_false = 1;
        } else {
            submit_false = (submit_false == 1) ? 1 : 0;
        }
        if (property_location == "") {
            call_error("us3-address", "Please enter property location.");
            submit_false = 1;
        } else {
            submit_false = (submit_false == 1) ? 1 : 0;
        }
        if (property_address == "") {
            call_error("property_address", "Please enter property address.");
            submit_false = 1;
        } else {
            submit_false = (submit_false == 1) ? 1 : 0;
        }
        if (property_neardesc == "") {
            call_error("property_neardesc", "Please enter property address.");
            submit_false = 1;
        } else {
            submit_false = (submit_false == 1) ? 1 : 0;
        }
        if (submit_false == 0) {
            //show_progress();
            var $active = $('.list-group li.active');
            $active.next().removeClass('disabled');
            $('.list-group li.active a i:nth-child(2)').removeClass('fa fa-exclamation-circle fa-yellow');
            $('.list-group li.active a i:nth-child(2)').addClass('fa fa-check-circle fa-green');
            nextTab($active);
        }
    });
    $("#btn_step3").click(function (e) {
        e.preventDefault();
        $("label.has-error").remove();
        var submit_false;
        var available_from_value = $("#available_from_value").val();
        if (!$('#available_from').is(':hidden') && available_from_value == "") {
            call_error_step4("available_from_value", "Please select availability from of the property.");
            submit_false = 1;
        } else {
            submit_false = (submit_false == 1) ? 1 : 0;
        }
        if (submit_false == 0) {
            //show_progress();
            var $active = $('.list-group li.active');
            $active.next().removeClass('disabled');
            $('.list-group li.active a i:nth-child(2)').removeClass('fa fa-exclamation-circle fa-yellow');
            $('.list-group li.active a i:nth-child(2)').addClass('fa fa-check-circle fa-green');
            nextTab($active);
        }
    });
    $("#btn_step4").click(function (e) {
        e.preventDefault();
        $("label.has-error").remove();
        var submit_false;
        var expected_price = $("#expected_price").val();
        var bank_interest = $("#bank_interest").val();
        var squrefeet_price = $("#squrefeet_price").val();
        if (expected_price == "" || !$.isNumeric(expected_price)) {
            call_error_step4("expected_price", "Please enter valid price.");
            submit_false = 1;
        } else {
            submit_false = (submit_false == 1) ? 1 : 0;
        }
        if (bank_interest == "" || !$.isNumeric(bank_interest)) {
            call_error_step4("bank_interest", "Please enter bank interest.");
            submit_false = 1;
        } else {
            submit_false = (submit_false == 1) ? 1 : 0;
        }
        if (squrefeet_price == "" || !$.isNumeric(squrefeet_price)) {
            call_error_step4("squrefeet_price", "Please enter price per squre feet.");
            submit_false = 1;
        } else {
            submit_false = (submit_false == 1) ? 1 : 0;
        }
        if (submit_false == 0) {
            //show_progress();
            var $active = $('.list-group li.active');
            $active.next().removeClass('disabled');
            $('.list-group li.active a i:nth-child(2)').removeClass('fa fa-exclamation-circle fa-yellow');
            $('.list-group li.active a i:nth-child(2)').addClass('fa fa-check-circle fa-green');
            nextTab($active);
        }
    });

    $("#btn_step5").click(function (e) {
        e.preventDefault();
//        $("label.has-error").remove();
//        var submit_false;
//        var expected_price = $("#expected_price").val();
//        var bank_interest = $("#bank_interest").val();
//        if (expected_price == "" || !$.isNumeric(expected_price)) {
//            call_error_step4("expected_price", "Please enter valid price.");
//            submit_false = 1;
//        } else {
//            submit_false = (submit_false == 1) ? 1 : 0;
//        }
//        if (bank_interest == "" || !$.isNumeric(bank_interest)) {
//            call_error_step4("bank_interest", "Please enter bank interest.");
//            submit_false = 1;
//        } else {
//            submit_false = (submit_false == 1) ? 1 : 0;
//        }
        //if (submit_false == 0) {
        // show_progress();
        var $active = $('.list-group li.active');
        $active.next().removeClass('disabled');
        $('.list-group li.active a i:nth-child(2)').removeClass('fa fa-exclamation-circle fa-yellow');
        $('.list-group li.active a i:nth-child(2)').addClass('fa fa-check-circle fa-green');
        nextTab($active);
        //}
    });
    $("#btn_step6").click(function (e) {
        e.preventDefault();
        $("label.has-error").remove();
        var submit_false;
        var final_description = $("#final_description").val();
        if (final_description == "") {
            call_error_step6("final_description", "Please write something.");
            submit_false = 1;
        } else {
            submit_false = (submit_false == 1) ? 1 : 0;
        }
        if (submit_false == 0) {
            $("#add_property").submit();
        }
    });
    $(".prev-step").click(function (e) {
        e.preventDefault();
        var $active = $('.list-group li.active');
        prevTab($active);
    });
});

function call_error(attrib_text, message) {
    $("#" + attrib_text).closest('.form-group > .col-sm-9').append("<label for='" + $("#" + attrib_text).attr("id") + "' generated='true' class='has-error' style='color:red;'>" + message + "</label>");
}

function call_error_step4(attrib_text, message) {
    $("#" + attrib_text).closest('.form-group > .col-md-4').append("<label for='" + $("#" + attrib_text).attr("id") + "' generated='true' class='has-error' style='color:red;'>" + message + "</label>");
}

function call_error_step6(attrib_text, message) {
    $("#" + attrib_text).closest('.form-group').append("<label for='" + $("#" + attrib_text).attr("id") + "' generated='true' class='has-error' style='color:red;'>" + message + "</label>");
}

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}