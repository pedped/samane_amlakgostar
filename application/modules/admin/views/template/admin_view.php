<?php
$file = './dbc_config/config.xml';

$xmlstr = file_get_contents($file);

$xml = simplexml_load_string($xmlstr);

$config = $xml->xpath('//config');

$current_version = $config[0]->version;

$current_version = explode('.', $current_version);

if ($config[0]->is_installed == 'yes' && $this->uri->segment(2) != 'complete')
    $status = json_decode(@file_get_contents(get_author_url() . 'admin/verify/checkversion/realcon'));



if (isset($status->version)) {

    $version = $status->version;

    $avl_version = explode('.', $version);



    if ($avl_version[0] > $current_version[0] || ($avl_version[0] == $current_version[0] && $avl_version[1] > $current_version[1]) ||
            ($avl_version[0] == $current_version[0] && $avl_version[1] == $current_version[1] && $avl_version[2] > $current_version[2])) {

        echo '<div class="alert alert-info">Version ' . $version . ' is now available.

				Get it <a href="' . $status->update_url . '">اینجا</a></div>';
    }
}
?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&language=fa"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/markercluster.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/sample_map_data.json"></script>
<?php $curr_lang = ($this->uri->segment(1) != '') ? $this->uri->segment(1) : 'en'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        
        var iconBase = '<?php echo base_url(); ?>assets/admin/img/map-icons/';
        var myLatitude = parseFloat('<?php echo get_settings('banner_settings', 'map_latitude', 37.2718745); ?>');
        var myLongitude = parseFloat('<?php echo get_settings('banner_settings', 'map_longitude', -119.2704153); ?>');
        var zoomLevel = parseInt('<?php echo get_settings('banner_settings', 'map_zoom', 8); ?>');
        var map_data = jQuery.parseJSON('<?php echo json_encode(get_all_properties_map_data($curr_lang)); ?>');
        
        function initialize() {
            var myLatlng = new google.maps.LatLng(myLatitude, myLongitude);
            var mapOptions = {
                zoom: zoomLevel,
                center: myLatlng
            }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            
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
                        + '<div class="property-thumb-meta">' + '<span class="property-price">' + map_data.estates[i].estate_price + '</span>' + '</div></div>'
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















<div class="page-title">

    <div>

        <h1><i class="fa fa-file-o"></i> داشبورد</h1>

        <h4>بنگاه در یک نگاه</h4>

    </div>

</div>



<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>مشاهده املاک در نقشه</h3>
                <div class="box-tool">
                    <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

                </div>
            </div>
            <div class="box-content">
                <div id="map-canvas" style="width: 100%; height: 400px"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">


    <div class="col-md-4">

        <div class="row">
            <div class="col-md-12">

                <div class="row">

                    <div class="col-md-12 tile-active">

                        <div class="tile tile-magenta">

                            <div class="img img-center">

                                <i class="fa fa-desktop"></i>

                            </div>

                            <p class="title text-center">

                                مدیریت بنگاه

                            </p>

                        </div>

                        <div class="tile tile-blue">

                            <p class="title">

                                مدیریت بنگاه

                            </p>

                            <p>
                                بنگاه شما هم اکنون در وضعیت فعال قرار دارد
                            </p>

                            <div class="img img-bottom">

                                <i class="fa fa-desktop"></i>

                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="tile tile-green">

            <div class="img">

                <i class="fa fa-envelope"></i>

            </div>

            <div class="content">

                <p class="big">

                    <?php

                    function getPhoneS($name) {
                        $CI = get_instance();
                        $row = $CI->db->get_where("phonesetting", array("name" => $name))->row_array();
                        return $row["value"];
                    } 

                    try {
                        $soapClient = new SoapClient("http://login.irpayamak.com/API/Send.asmx?wsdl");
                        $info = $soapClient->Credit(array(
                            "username" => getPhoneS("username"),
                            "password" => getPhoneS("password"),
                        ));

                        echo (intval($info->CreditResult));
                    } catch (Exception $exc) {
                        echo 0;
                    }
                    ?>

                </p>

                <p class="title">
                    پیامک قابل ارسال 
                </p>
            </div>

        </div>

    </div>

    <div class="col-md-5">

        <div class="row">

            <div class="col-md-6">

                <div class="tile tile-orange">

                    <div class="img">

                        <i class="fa fa-users"></i>

                    </div>

                    <div class="content">

                        <p class="big">

                            <?php
                            $CI = get_instance();
                            $CI->load->database();
                            $query = $CI->db->get_where('users', array('status' => 1));
                            echo $query->num_rows();
                            ?>

                        </p>

                        <p class="title">

                            عامل

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="tile tile-dark-blue">

                    <div class="img">

                        <i class="fa fa-bars"></i>

                    </div>

                    <div class="content">
                        <p class="big">
                            <?php
                            $query = $CI->db->get_where('posts', array('status' => 1));
                            echo $query->num_rows();
                            ?>
                        </p>
                        <p class="title">
                            ملک
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

