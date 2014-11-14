<style>
    #slider-map img { max-width: none; }
</style>
<?php $curr_lang = ($this->uri->segment(1) != '') ? $this->uri->segment(1) : 'en'; ?>

<script type="text/javascript">
    $(document).ready(function() {

        var iconBase = '<?php echo theme_url(); ?>/assets/images/map-icons/';
        var myLatitude = parseFloat('<?php echo get_settings('banner_settings', 'map_latitude', 37.2718745); ?>');
        var myLongitude = parseFloat('<?php echo get_settings('banner_settings', 'map_longitude', -119.2704153); ?>');
        var zoomLevel = parseInt('<?php echo get_settings('banner_settings', 'map_zoom', 8); ?>');
        var map_data = jQuery.parseJSON('<?php echo json_encode(get_all_properties_map_data($curr_lang)); ?>');


        function initialize() {
            var myLatlng = new google.maps.LatLng(myLatitude, myLongitude);
            var mapOptions = {
                zoom: zoomLevel,
                center: myLatlng,
                scrollwheel: false,
            }
            var map = new google.maps.Map(document.getElementById('slider-map'), mapOptions);

            var infowindow = new google.maps.InfoWindow({
                content: "Hello World"
            });


            var marker, i;
            var markers = [];
            var infoContentString = [];

            for (i = 0; i < map_data.estates.length; i++) {

                if (map_data.estates[i].estate_type == 'DBC_TYPE_COMSPACE') {
                    var icon_path = iconBase + 'office.png';
                }
                else if (map_data.estates[i].estate_type == 'DBC_TYPE_HOUSE' || map_data.estates[i].estate_type == 'DBC_TYPE_VILLA') {
                    var icon_path = iconBase + 'bighouse.png';
                }
                else if (map_data.estates[i].estate_type == 'DBC_TYPE_LAND') {
                    var icon_path = iconBase + 'land.png';
                }
                else {
                    var icon_path = iconBase + 'apartment.png';
                }


                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(map_data.estates[i].latitude, map_data.estates[i].longitude),
                    map: map,
                    title: map_data.estates[i].estate_title,
                    icon: icon_path
                });
                infoContentString[i] = '<div class="thumbnail thumb-shadow map-thumbnail">' + '<div class="property-header">'
                        + '<a href="' + map_data.estates[i].detail_link + '"></a>' + '<img class="property-header-image" src="' + map_data.estates[i].featured_image_url + '" alt="" style="width:100%">'
                        + '<span class="property-contract-type sale">' + '<span>فروش</span>' + '</span>'
                        // + '<div class="property-thumb-meta">' + '<span class="property-price">قیمت فروش ' + map_data.estates[i].sale_price + '</span>' + '<span class="property-price"> رهن' + map_data.estates[i].rent_pricerahn + '</span>' + '<span class="property-price"> قیمت اجاره' + map_data.estates[i].rent_price + '</span>' + '</div></div>'
                        + '<div class="caption">' + '<h4>' + map_data.estates[i].estate_title + '</h4>' + '<p>' + map_data.estates[i].estate_short_address + '</p>' + '</div></div>';

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(infoContentString[i]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
                markers.push(marker);
//                infoContentString.push(contentString);
            }
            var markerCluster = new MarkerClusterer(map, markers);

        }

        google.maps.event.addDomListener(window, 'load', initialize);


    });
</script>
<?php $search_box_position = get_settings('banner_settings', 'search_box_position', 'bottom'); ?>
<div id="slider-map" class="slider-map-holder" style=""></div>
<!-- Header -->
<header id="head">
    <div class="container">
        <div class="row">
            <?php if ($search_box_position == 'ontop') { ?>
                <div class="search-box">
                    <div style="height:20px"></div>
                    <form action="<?php echo site_url('show/advfilter'); ?>" method="post" style="">
                        <label><i class="fa fa-home"></i> <?php echo lang_key('DBC_FIND_YOUR_PLACE'); ?> : </label>
                        <div class="input-group">
                            <input type="text" id="search_input" name="plainkey" class="form-control" style="height:40px;" placeholder="<?php echo lang_key('DBC_SEARCH_TEXT'); ?>">
                            <span class="input-group-btn">
                                <button class="btn btn-warning" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <div class="search_results"></div>
                    </form>
                    <div class="search-divider">یا</div>
                    <div class="clearfix"></div>
                    <a href="<?php echo site_url('show/search'); ?>" class="btn btn-info"><?php echo lang_key('DBC_ADVANCED_SEARCH'); ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</header>

<?php if ($search_box_position == 'bottom') { ?>    
    <div  class="map-search hidden" data-stellar-background-ratio="0.5" style="margin:0;width:100%;padding:50px 0;text-align:center;background: url(<?php echo base_url('uploads/banner/' . get_settings('banner_settings', 'search_bg', 'skyline.jpg')); ?>)">
        <div class="row" style="margin:0;padding:0;">
            <div class="search-box">
                <form action="<?php echo site_url('show/advfilter'); ?>" method="post" style="">
                    <label class="search-label"><i class="fa fa-home"></i> <?php echo lang_key('DBC_FIND_YOUR_PLACE'); ?> : </label>
                    <div class="input-group">
                        <input type="text" id="search_input" name="plainkey" class="form-control" style="height:40px;" placeholder="<?php echo lang_key('DBC_SEARCH_TEXT'); ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-warning" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <div id="search_results"></div>
                </form>
                <div class="search-divider">یا</div>
                <div class="clearfix"></div>
                <a href="<?php echo site_url('show/search'); ?>" class="btn btn-info"><?php echo lang_key('DBC_ADVANCED_SEARCH'); ?></a>
            </div>
        </div>
    </div>
    <div class="homemarinholder">

    </div>

    </div>
<?php } ?>
<!-- /Header -->
<script type="text/javascript">
    jQuery(document).ready(function() {

        // jQuery('#search_input').bind('keyup', function() {

        //     if(jQuery('#search_input').val().length>3) {
        //         jQuery.post(
        //             "<?php echo site_url('show/instant_search_ajax'); ?>/",
        //             {query: jQuery('#search_input').val()},
        //             function(response){
        //                 if(response == 'hide')
        //                     $("#search_results").hide();
        //                 else {

        //                     $("#search_results").show();
        //                     jQuery('#search_results').html(response);
        //                 }
        //             }
        //         );
        //     }
        //     else {
        //         $("#search_results").hide();
        //     }

        // });

        // //hide results when clicked outside of search field
        // $("body").click(function() {
        //     $("#search_results").hide();
        // });
    });
</script>