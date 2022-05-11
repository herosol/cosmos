<!doctype html>
<html>
<head>
<title>Search Results – <?= $site_settings->site_name?></title>
    <?php $this->load->view('includes/site-master'); ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmqmsf3pVEVUoGAmwerePWzjUClvYUtwM&libraries=geometry,places&ext=.js"></script>
</head>
<body id="home-page">
    <?php get_header() ?>
<main>


<section id="srch">
    <?php if (!empty($city)): ?>
        <h4>Cosplayers in <?= $city?></h4>
    <?php endif?>
    <div id="layer"></div>
    <div class="topHead">
        <h1 class="secHeading">Search Result</h1>
        <ul class="sortLst flex">
            <li class="srchView active"><a href="javascript:void(0)"><i class="fi-grid"></i></a></li>
            <li class="mapView"><a href="javascript:void(0)"><i class="fi-map"></i></a></li>
        </ul>
    </div>
    <div class="internal relative">
        <div id="srchBlk">
            
            <div id="formBlk">
                <div class="inDiv scrollbar">
                    <form action="" method="" id="searchForm">
                        <input type="hidden" name="cmd" value="search">
                        <input type="hidden" name="lat" id="map_lat">
                        <input type="hidden" name="lng" id="map_lng">
                        <?php if (!empty($city)): ?>
                            <input type="hidden" name="city" id="city" value="<?= $city?>">
                        <?php endif ?>
                        <div class="formRow row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <h4>Areas of Availability</h4>
                                <select name="country" id="country" class="txtBox selectpicker" data-live-search="true">
                                    <option value="">Select</option>
                                    <?= get_countries_options('name', $post['country'])?>
                                </select>
                            </div>
                            <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <h4>Characters</h4>
                                <select name="character" id="character" class="txtBox selectpicker">
                                    <option value="">Select</option>
                                    <?php foreach ($characters as $key => $char): ?>
                                        <option value="<?= $char->id?>"<?= !empty($post['character']) && $char->id == $post['character'] ? ' selected' : '';?>><?= $char->title?></option>
                                    <?php endforeach ?>
                                </select>
                            </div> -->
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <h4>Characters</h4>
                                <input type="text" name="character" id="character" class="txtBox" placeholder="Search character" value="<?= !empty($post['character']) ? $post['character'] : '';?>">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <h4>Availability</h4>
                                <input type="text" name="date" id="date" class="txtBox datepicker" placeholder="Select" value="<?= !empty($post['date']) ? $post['date'] : '';?>">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                                <h4>Rate (€)</h4>
                                <input type="text" name="price" id="price" value="">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="appLoad"><div class="appLoader"><span class="spiner"></span></div></div>
            <div class="inDiv scrollbar" id="srchLst">
                <!--
                    <ul class="pagination">
                        <li><a href="?">1</a></li>
                        <li><a href="?" class="active">2</a></li>
                        <li><a href="?">3</a></li>
                        <li><a href="?">4</a></li>
                        <li><a href="?">5</a></li>
                    </ul>
                -->
            </div>
        </div>
        <div id="mapBlk">
            <div id="map_canvas"></div>
        </div>
    </div>
</section>
<!-- srch -->


<!-- Google Map Api -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmqmsf3pVEVUoGAmwerePWzjUClvYUtwM&libraries=geometry,places&ext=.js"></script> -->
<script type="text/javascript" src="<?= base_url('assets/js/map.api.js') ?>"></script>
<!-- Ion Slider -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/ion.slider.min.css')?>">
<script type="text/javascript" src="<?= base_url('assets/js/ion.slider.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/ion.slider.skins.js')?>"></script>
<!-- 
<style>
    div[title] {
        width: 30px;
        height: 30px;

    }
    div[title] img {
        width: 60px !important;
    }
</style>
 -->
<script type="text/javascript">
    var startLatLng, map, bounds, startLat = 41.850033, startLng = -87.6500523;
    <?php if (!empty($city)): ?>
        let srvc = $('#service option:selected').text();
        let title = `${srvc} in <?= $city?> City`;
        $('#srch h4:first').html(title);
        document.title = title+' | <?= $site_settings->site_name?>';
        $(document).on('change','#service', function(){
            srvc = $(this).find("option:selected").text();
            title = `${srvc} in <?= $city?> City`;
            $('#srch h4:first').html(title);
            document.title = title+' | <?= $site_settings->site_name?>';
        });
        $('#map_lat').val('');
        $('#map_lng').val('');
        startLat = <?= $city_lat?>;
        startLng = <?= $city_lng?>;
        startLatLng = new google.maps.LatLng(startLat, startLng);

    <?php else:?>
    $.get("https://ipinfo.io", function(response) {
        // console.log(response.loc, response.city, response.country);
        let loc = response.loc.split(',')
        $('#map_lat').val(loc[0]);
        $('#map_lng').val(loc[1]);
        startLat = loc[0];
        startLng = loc[1];
        startLatLng = new google.maps.LatLng(startLat, startLng);
    }, "jsonp");
    <?php endif?>
    var locations = []
    var markers = [];
    var infowindows = [];
    // var startLatLng = new google.maps.LatLng(startLat, startLng);
    var image = {
        url: base_url + "assets/images/map-marker.png", // url
        // url: base_url + "assets/images/marker.svg", // url
        scaledSize: new google.maps.Size(50, 50), // scaled size
        origin: new google.maps.Point(0, 0), // origin
        anchor: new google.maps.Point(25, 50) // anchor
    };
    var image1 = {
        url: base_url + "assets/images/map-marker-highlight.png", // url
        // url: base_url + "assets/images/marker.svg", // url
        scaledSize: new google.maps.Size(50, 50), // scaled size
        origin: new google.maps.Point(0, 0), // origin
        anchor: new google.maps.Point(25, 50) // anchor
    };

    function init() {
        map = new google.maps.Map(document.getElementById('map_canvas'), {
            center: startLatLng,
            zoom: 12,
            styles: grayStyles
        });
        bounds = new google.maps.LatLngBounds();
        map.addListener('dragend', function () {
            closeInfos();
        });
        searchPlayers();
        
    }

    function setMarkers() {
        console.log('here')

        closeMarks();
        closeInfos();
        markers = [];
        // infowindows = [];

        if (locations.length > 0){

            for (var i = 0; i < locations.length; i++) {

                var location = locations[i];
                // console.log(location)
                var title = location[0],
                //zindex = location[3],
                lat = location[1];
                lng = location[2];
                content = location[4];
                var latlngset = new google.maps.LatLng(lat, lng);
                markers[i] = new google.maps.Marker({
                    position: latlngset,
                    map: map,
                    icon: image,
                    title: title,
                    label: location[5],
                    customInfo: i,
                //zIndex: zindex
                });
                console.log(markers)
                google.maps.event.addListener(markers[i], 'mouseover', function(e) {
                    let index = this.customInfo;
                    $('.srchItm').removeClass('highlight').eq(index).addClass('highlight');
                    this.setIcon(image1);
                });
                google.maps.event.addListener(markers[i], 'mouseout', function(e) {
                    $('.srchItm').removeClass('highlight');
                    this.setIcon(image);
                });

                bounds.extend(markers[i].getPosition());
                //bounds.extend(markers[i].position);
                /*infowindows[i] = new google.maps.InfoWindow({
                    content: content
                });
                google.maps.event.addListener(markers[i], 'click', (function (inneri) {
                    return function () {
                        closeInfos();
                        infowindows[inneri].open(map, markers[inneri]);
                    }
                })(i));
                google.maps.event.addListener(infowindows[i], 'domready', function () {
                    var iwOuter = $('.gm-style-iw');
                    var iwBackground = iwOuter.prev();
                    // iwBackground.parent().css({'background': '#ffffff'});
                    iwBackground.children(':nth-child(2)').css({'display': 'none'});
                    iwBackground.children(':nth-child(4)').css({'display': 'none'});
                    iwBackground.children(':nth-child(3)').find('div').children().css({
                        'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index': '1'});
                    iwBackground.children(':nth-child(1)').attr('style', function (i, s) {
                        return s + 'margin-top: 2px !important;'
                    });
                    iwBackground.children(':nth-child(3)').attr('style', function (i, s) {
                        return s + 'margin-top: 2px !important;'
                    });
                    iwBackground.children(':nth-child(3)').find('div').children().css({
                        'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index': '1'});
                    var iwCloseBtn = iwOuter.next();

                    iwCloseBtn.css({
                        opacity: '1', // by default the close button has an opacity of 0.7
                        right: '4px', top: '4px', // button repositioning
                        border: '7px solid #fff', // increasing button border and new color
                        'border-radius': '13px', // circular effect
                        'padding': '6px', // padding
                        'box-shadow': '0 0 5px #3990B9', // 3D effect to highlight the button
                        'z-index': '999999', // z-index
                    });

                    iwCloseBtn.mouseout(function () {
                        $(this).css({opacity: '1'});
                    });

                });

                google.maps.event.addListener(map, 'click', function () {
                    closeInfos();
                });*/
            }
            map.fitBounds(bounds);
        }
        //map.fitBounds(bounds);
    }

    function closeInfos() {
        if (infowindows.length > 0) {
            for (var i = 0; i < infowindows.length; i++) {
                infowindows[i].close();
            }
        }
    }

    function closeMarks() {
        if (markers.length > 0) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
        }
    }

    var xhr = new window.XMLHttpRequest();
    var ajaxSearch = false;
    function searchPlayers() {

        if(xhr && xhr.readyState != 4) {
            xhr.abort();
        }
        if(ajaxSearch)
            return;
        ajaxSearch = true;
        let formData = $("#searchForm").serializeArray();
        /*
        formData.push({name:'q', value:$('#pq').val()})
        formData.push({name:'zip', value:$('#zip').val()})
        */

        $('#srchLst').html("");
        $('#layer, .appLoad').show();
        
            $.ajax({
                url: base_url + 'search',
                type: "POST",
                data: $.param(formData),
                success: function (rs) {
                    // console.log(rs);
                    $('#srchLst').html('');
                    setTimeout(function () {
                        locations = [];
                        if (rs.no_result != '' && rs.no_result != undefined) {
                            $('#srchLst').append(rs.no_result);
                        } else {
                            $.each(rs.locations, function (i, item) {
                                $('#srchLst').append(rs.player[i]);
                                locations.push(item);
                            });
                            
                            /*$.each(rs, function (i, item) {
                                $('#srchLst').append(item.player);
                                locations.push(item.locations);
                            });*/
                            
                            refresh_rateYo();
                            // refresh_datepicker();
                        }
                        setMarkers();
                        $('#layer, .appLoad').hide();
                        $('#srchLst').show();
                    }, 1500);
                },
                error: function (data) {
                    console.log(data);
                },
                complete: function (data) {
                    ajaxSearch = false;
                },
                xhr : function(){
                    return xhr;
                }
            }); 
    }

    google.maps.event.addDomListener(window, 'load', init);
    $(function(){
        $(document).on('mouseover', '.srchItm', function() {
            let index = $(this).index();
            markers[index].setIcon(image1);
        });

        $(document).on('mouseout', '.srchItm', function() {
            let index = $(this).index();
            markers[index].setIcon(image);
        });
        $('#price').ionRangeSlider({
            skin: 'square',
            from: 1,
            to: 150,
            min: 1,
            max: 150,
            type: 'double',
            prettify: function (num) {
                return '$'+num;
            },
            onFinish: function (data) {
                searchPlayers();
            },
            grid: true
        });

        $(document).on('change','#country, #character, #date', function(){
            searchPlayers();
        });

        $(document).on('click', '.selectLst > li > [data-radio].lnk', function() {
            let radio = $(this).data('radio');
            // $(this).toggleClass('active');
            $(this).parents('ul').find('.lnk').addClass('active').not($(this)).removeClass('active');
            $(this).parents('.inBlk').children('input[type="hidden"]').val(radio);
            searchPlayers();
        });
        $(document).on('click', '.sortLst > li > a', function(){
            $('.sortLst > li').removeClass('active');
            $(this).parent().addClass('active');
        });
        $(document).on('click', '.sortLst > li.fltrView', function(){
            $('#srch #formBlk').addClass('active');
        });
        $(document).on('click', '.sortLst > li.mapView', function(){
            $('#srch #srchBlk').addClass('height');
            $('#srch #mapBlk').addClass('active');
        });
        $(document).on('click', '.sortLst > li.srchView', function(){
            $('#srch #mapBlk').removeClass('active');
            $('#srch #srchBlk').removeClass('height');
        });
        $(document).on('click', '#srch .headBlk .crosBtn', function(){
            $('#srch #formBlk').removeClass('active');
        });
        
        // var startLat =0, startLng =0;
        /*
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                startLat = position.coords.latitude;
                startLng = position.coords.longitude;
                // console.log('Your latitude is :' + startLat + ' and longitude is ' + startLng);
                $('#map_lat').val(startLat);
                $('#map_lng').val(startLng);

                searchPlayers();
            }, function () {
            // Do Nothing
                searchPlayers();
            });
        }
        */

    });
</script>
</main>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>