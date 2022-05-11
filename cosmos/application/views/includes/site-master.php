<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<?php
$page_title = empty($site_content['page_title']) ? $site_settings->site_name : $site_content['page_title'].' - '.$site_settings->site_name;
$meta_description = empty($site_content['meta_description']) ? $site_settings->site_meta_desc : $site_content['meta_description'];
$meta_keywords = empty($site_content['meta_keywords']) ? $site_settings->site_meta_keyword : $site_content['meta_keywords'];
$meta_image = empty($site_content['meta_image']) ? SITE_IMAGES.'/images/'.$site_settings->site_thumb.'?v-'.$site_settings->site_version : $site_content['meta_image'];
?>

<meta name="title" content="<?= $page_title ?>">
<meta name="description" content="<?= $meta_description ?>">
<meta name="keywords" content="<?= $meta_keywords ?>">

<meta property="og:type" content="website">
<meta property="og:url" content="<?= currentURL()?>">
<meta property="og:title" content="<?= $page_title ?>">
<meta property="og:description" content="<?= $meta_description ?>">
<meta property="og:image" content="<?= $meta_image?>">
<meta property="twitter:card" content="thumbnail">
<meta property="twitter:url" content="<?= currentURL()?>">
<meta property="twitter:title" content="<?= $page_title ?>">
<meta property="twitter:description" content="<?= $meta_description ?>">
<meta property="twitter:image" content="<?= $meta_image?>">


<!-- Css files -->
<!-- Bootstrap Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css?v-'.$site_settings->site_version)?>">
<!-- Main Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/main.css?v-'.$site_settings->site_version)?>">
<!-- Custom Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/custom.css?v-'.$site_settings->site_version)?>">
<!-- Media-Query Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/responsive.css?v-'.$site_settings->site_version)?>">
<!-- Font-Awesome Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css?v-'.$site_settings->site_version)?>">
<!-- Font-Icon Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/font-icon.min.css?v-'.$site_settings->site_version)?>">

<!-- Owl Carousel Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css?v-'.$site_settings->site_version)?>">
<!-- Owl Theme Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/owl.theme.min.css?v-'.$site_settings->site_version)?>">
<!-- Select Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/select.min.css?v-'.$site_settings->site_version)?>">

<!-- Datepicker Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/datepicker.min.css?v-'.$site_settings->site_version)?>">
<!-- Timepicker Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/timepicker.min.css?v-'.$site_settings->site_version)?>">
<!-- Switcher Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/switcher.css?v-'.$site_settings->site_version)?>">
<!-- Light Slider Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/lightslider.min.css?v-'.$site_settings->site_version)?>">
<!-- Light Gallery Css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/lightgallery.min.css?v-'.$site_settings->site_version)?>">

<!-- JS Files -->
<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery-ui.min.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/functions.js') ?>"></script>
<script type="text/javascript"> var base_url = "<?= base_url()?>";</script>
<!-- psstrength Js -->
<link rel="stylesheet" href="<?= base_url('assets/passtrength/passtrength.css') ?>" media="screen" title="no title">
<script type="text/javascript" src="<?= base_url('assets/passtrength/jquery.passtrength.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function($) {
        $('.pwstrnt').passtrength();
    });
</script>
<!-- Owl Carousel Js -->
<script type="text/javascript" src="<?= base_url('assets/js/owl.carousel.min.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript">
    $(window).on('load', function(){
        $('#owl-folio').owlCarousel({
            loop: true,
            margin: 10,
            autoHeight: false,
            smartSpeed: 2000,
            autoplayTimeout: 12000,
            autoplayHoverPause: true,
            items: 1,
            responsive: {
                0:{
                    autoHeight: false
                },
                480:{
                    autoHeight: false
                }
            }
        });
        $('#owl-similar').owlCarousel({
            autoplay: false,
            nav: true,
            navText: ['<i class="fi-arrow-left"></i>','<i class="fi-arrow-right"></i>'],
            loop: true,
            margin: 30,
            autoHeight: true,
            smartSpeed: 1000,
            autoplayTimeout: 12000,
            autoplayHoverPause: true,
            responsive: {
                0:{
                    items: 1
                },
                480:{
                    items: 2
                },
                991:{
                    items: 3
                },
                1200:{
                    items: 4
                }
            }
        });
    });
</script>
<!-- Timepicker Js -->
<script type="text/javascript" src="<?= base_url('assets/js/timepicker.min.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.timepicker').timepicki({
            reset: true,
            step_size_minutes: 30,
            overflow_minutes:true,
            start_time: ["12", "00", "AM"],
            disable_keyboard_mobile: true
        });
    });
</script>
<!-- Select Js -->
<script type="text/javascript" src="<?= base_url('assets/js/select.min.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript">
    $(function(){
        $('.selectpicker').selectpicker();
    });
</script>
<!-- Datepicker Js -->
<script type="text/javascript" src="<?= base_url('assets/js/datepicker.min.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript">
    $(window).on('load', function(){
        $('.monthpicker').datepicker({
            multidate: false,
            format: "mm/yyyy",
            startView: "months", 
            minViewMode: "months",
            orientation: 'bottom auto',
            templates : {
                leftArrow: '<i class="fi-arrow-left"></i>',
                rightArrow: '<i class="fi-arrow-right"></i>'
            }
        });
        $('.datepicker').datepicker({
            multidate: false,
            // format: 'mm-dd-yyyy',
            orientation: 'bottom auto',
            dateFormat: 'mm/dd/yy',
            todayHighlight: true,
            // multidateSeparator: ',  ',
            templates : {
                leftArrow: '<i class="fi-arrow-left"></i>',
                rightArrow: '<i class="fi-arrow-right"></i>'
            }
        });
        $('.multidatepicker').datepicker({
            multidate: true,
            // format: 'mm-dd-yyyy',
            orientation: 'bottom auto',
            dateFormat: 'mm/dd/yy',
            todayHighlight: true,
            multidateSeparator: ',  ',
            templates : {
                leftArrow: '<i class="fi-arrow-left"></i>',
                rightArrow: '<i class="fi-arrow-right"></i>'
            }
        });
    });
</script>
<!-- Rateyo Js -->
<script type="text/javascript" src="<?= base_url('assets/js/jquery.rateyo.min.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript">
    $(function(){
        $('.rateYo').rateYo({
            // rating: 4.0,
            fullStar: true,
            // readOnly: true,
            normalFill: '#ddd',
            ratedFill: '#f6a623',
            starWidth: '14px',
            spacing: '2px'
        });
    });
</script>
<!-- Light Gallery Js -->
<script type="text/javascript" src="<?= base_url('assets/js/lightslider.min.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/lightgallery-all.min.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.mousewheel.min.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript">
    $(window).on('load', function(){
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            auto: true,
            loop: true,
            speed: 2500,
            pause: 8000,
            slideMargin: 0,
            // vertical: true,
            enableDrag: false,
            thumbMargin: 4,
            thumbItem: 5,
            currentPagerPosition:'center',
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#lightSlider .lslide',
                    hideBarsDelay: 1000
                });
            },
            responsive: [
                {
                    breakpoint: 580,
                    settings: {
                        thumbItem: 4
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        thumbItem: 3
                    }
                }
            ]
        });
        $('#zoomBtn').on('click', function() {
           $('#lightSlider .lslide').trigger('click');
        });
        $('.gallery').lightGallery({
            thumbnail: true,
        });
        'use strict';
        $('.miniSlider').delay(300).css('opacity', '1');
    });
</script>
<!-- Telphone Js -->
<script type="text/javascript" src="<?= base_url('assets/intltelinput/intlTelInput.js?v-'.$site_settings->site_version)?>"></script>
<script type="text/javascript" src="<?= base_url('assets/intltelinput/utils.js?v-'.$site_settings->site_version)?>"></script>
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/intltelinput/intlTelInput.css?v-'.$site_settings->site_version)?>">

<!-- Favicon -->
<link type="image/png" rel="icon" href="<?= SITE_IMAGES.'/images/'.$site_settings->site_icon.'?v-'.$site_settings->site_version?>">
