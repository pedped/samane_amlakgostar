<!--Rickh Text Editor-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

<style type="text/css">
    .file-upload{
        margin:0 !important;
        padding:0 !important;
        list-style: none;
    }
    .file-upload li{
        clear: both;
    }
    .facilities{
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .facilities li{
        float: left;
        margin-right: 10px;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&language=fa"></script>
<script type="text/javascript">
    var markers = [];
//    var map;
    var Ireland = "Dhaka, Bangladesh";
    function initialize() {
        geocoder = new google.maps.Geocoder();
        var mapOptions = {
            center: new google.maps.LatLng(-34.397, 150.644),
            zoom: 13
        };
        map = new google.maps.Map(document.getElementById("map-canvas"),
                mapOptions);
//        codeAddress();//call the function
        var ex_latitude = $('#latitude').val();
        var ex_longitude = $('#longitude').val();

        if (ex_latitude != '' && ex_longitude != '') {
            map.setCenter(new google.maps.LatLng(ex_latitude, ex_longitude));//center the map over the result
            var marker = new google.maps.Marker(
                    {
                        map: map,
                        draggable: true,
                        animation: google.maps.Animation.DROP,
                        position: new google.maps.LatLng(ex_latitude, ex_longitude)
                    });

            markers.push(marker);
            google.maps.event.addListener(marker, 'dragend', function()
            {
                var marker_positions = marker.getPosition();
                $('#latitude').val(marker_positions.lat());
                $('#longitude').val(marker_positions.lng());
//                        console.log(marker.getPosition());
            });

        }

    }

    function codeAddress()
    {
        var main_address = $('#address').val();
        var country = $('#country').val();
        var state = $('#state').val();
        var city = $('#city').val();

        var address = [main_address, city, state, country].join();

        if (country != '' && city != '')
        {


            setAllMap(null); //Clears the existing marker

            geocoder.geocode({address: address}, function(results, status)
            {
                if (status == google.maps.GeocoderStatus.OK)
                {
//                    console.log(results[0].geometry.location.lat());
                    $('#latitude').val(results[0].geometry.location.lat());
                    $('#longitude').val(results[0].geometry.location.lng());
                    map.setCenter(results[0].geometry.location);//center the map over the result


                    //place a marker at the location
                    var marker = new google.maps.Marker(
                            {
                                map: map,
                                draggable: true,
                                animation: google.maps.Animation.DROP,
                                position: results[0].geometry.location
                            });

                    markers.push(marker);


                    google.maps.event.addListener(marker, 'dragend', function()
                    {
                        var marker_positions = marker.getPosition();
                        $('#latitude').val(marker_positions.lat());
                        $('#longitude').val(marker_positions.lng());
//                        console.log(marker.getPosition());
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });

        }
        else {
            alert('You must enter at least country and city');
        }

    }

    function setAllMap(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div class="row">
    <div class="col-md-12">
        <?php echo $this->session->flashdata('msg'); ?>
        <form class="form-horizontal" id="addpackage" action="<?php echo site_url('admin/realestate/addestate'); ?>" method="post">

            <div class="box">

                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>اطلاعات اصلی</h3>
                    <div class="box-tool">
                        <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                    </div>
                </div>

                <div class="box-content">

                    <?php
                    $CI = get_instance();
                    $CI->load->model('admin/system_model');
                    $query = $CI->system_model->get_all_langs();
                    $active_languages = $query->result();
                    ?>
                    <div class="tabbable">
                        <ul class="nav nav-tabs" id="myTab1">
                            <?php
                            $flag = 1;
                            foreach ($active_languages as $lang) {
                                ?>
                                <li class="<?php echo ($flag == 1) ? 'active' : ''; ?>"><a data-toggle="tab" href="#<?php echo $lang->short_name; ?>"><i class="fa fa-home"></i> <?php echo $lang->short_name; ?></a></li>
                                <?php
                                $flag++;
                            }
                            ?>
                        </ul>
                        <div class="tab-content" id="myTabContent1">
                            <?php
                            $flag = 1;
                            foreach ($active_languages as $lang) {
                                ?>
                                <div id="<?php echo $lang->short_name; ?>" class="tab-pane fade in <?php echo ($flag == 1) ? 'active' : ''; ?>">

                                    <div class="form-group">
                                        <label class="col-sm-3 col-lg-2 control-label">تیتر:</label>
                                        <div class="col-sm-4 col-lg-5 controls">
                                            <input type="text" name="title<?php echo $lang->short_name; ?>" value="<?php echo(set_value('title' . $lang->short_name) != '') ? set_value('title' . $lang->short_name) : ''; ?>" placeholder="تیتر ملک" class="form-control input-sm" >
                                            <span class="help-inline">&nbsp;</span>
                                            <?php echo form_error('title' . $lang->short_name); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 col-lg-2 control-label">توضیحات:</label>
                                        <div class="col-sm-7 col-lg-7 controls">
                                            <textarea  style="min-height:200px" class="form-control wysihtml5" name="description<?php echo $lang->short_name; ?>"><?php echo(set_value('description' . $lang->short_name) != '') ? set_value('description' . $lang->short_name) : ''; ?></textarea>
                                            <span class="help-inline">&nbsp;</span>
                                            <?php echo form_error('description' . $lang->short_name); ?>
                                        </div>
                                    </div>

                                </div>
                                <?php
                                $flag++;
                            }
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">منظور :</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <?php $purposes = array("DBC_PURPOSE_SALE", "DBC_PURPOSE_RENT", "DBC_PURPOSE_BOTH"); ?>
                            <select id="purpose-select" name="purpose" class="form-control input-sm">
                                <?php
                                foreach ($purposes as $purpose) {
                                    $sel = ($purpose == set_value('purpose')) ? 'selected="selected"' : '';
                                    ?>
                                    <option value="<?php echo $purpose; ?>" <?php echo $sel; ?>><?php echo lang_key($purpose); ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('purpose'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">نوع:</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <?php $types = array("DBC_TYPE_APARTMENT", "DBC_TYPE_HOUSE", "DBC_TYPE_LAND", "DBC_TYPE_COMSPACE", "DBC_TYPE_CONDO", "DBC_TYPE_VILLA"); ?>
                            <select id="type-select" name="type" class="form-control input-sm">
                                <option value="">نوع را انتخاب نمایید</option>
                                <?php
                                foreach ($types as $type) {
                                    $sel = ($type == set_value('type')) ? 'selected="selected"' : '';
                                    ?>
                                    <option value="<?php echo $type; ?>" <?php echo $sel; ?>><?php echo lang_key($type); ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('type'); ?>
                        </div>
                    </div>

                    <div id="sales-price-holder">
                        <div class="form-group">
                            <label id="sales-label" class="col-sm-3 col-lg-2 control-label">قیمت فروش:</label>
                            <div class="col-sm-4 col-lg-5 controls">
                                <div class="input-group">
                                    <input type="text" id="total_price" name="total_price" value="<?php echo(set_value('total_price') != '') ? set_value('total_price') : ''; ?>" placeholder="مجموع هزینه" class="form-control input-sm" >
                                    <span class="input-group-addon"><?php echo get_settings('site_settings', 'default_currency', 'میلیون تومان'); ?></span>
                                </div>
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('total_price'); ?>
                            </div>
                        </div>











                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">قیمت برای هر واحد:</label>
                            <div class="col-sm-4 col-lg-3 controls">
                                <div class="input-group">
                                    <input type="text" id="price_per_unit" name="price_per_unit" value="<?php echo(set_value('price_per_unit') != '') ? set_value('price_per_unit') : ''; ?>" placeholder="قیمت برای هر واحد" class="form-control input-sm" >
                                    <span class="input-group-addon">میلیون تومان</span>
                                </div>
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('price_per_unit'); ?>
                            </div>
                            <div class="col-sm-4 col-lg-2 controls">
                                <select name="price_unit" class="form-control input-sm">
                                    <?php
                                    $units = array('sqmeter' => 'متر مربع', 'hector' => 'هکتار');
                                    foreach ($units as $val => $unit) {
                                        $sel = ($val == set_value('price_unit')) ? 'selected="selected"' : '';
                                        ?>
                                        <option value="<?php echo $val; ?>" <?php echo $sel; ?>><?php echo $unit; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('price_unit'); ?>
                            </div>
                        </div>
                    </div>


                    <div id="rent-price-holder" class="form-group">

                        <label class="col-sm-3 col-lg-2 control-label">رهن:</label>
                        <div class="col-sm-4 col-lg-3 controls">
                            <div class="input-group">
                                <input type="text" id="rent_pricerahn" name="rent_pricerahn" value="<?php echo(set_value('rent_pricerahn') != '') ? set_value('rent_pricerahn') : ''; ?>" placeholder="قیمت رهن" class="form-control input-sm" >
                                <span class="input-group-addon">میلیون تومان</span>
                            </div>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('rent_pricerahn'); ?>
                        </div>
                        <div class="clearfix"></div>

                        <label class="col-sm-3 col-lg-2 control-label">قیمت اجاره:</label>
                        <div class="col-sm-4 col-lg-3 controls">
                            <div class="input-group">
                                <input type="text" id="rent_price" name="rent_price" value="<?php echo(set_value('rent_price') != '') ? set_value('rent_price') : ''; ?>" placeholder="قیمت اجاره" class="form-control input-sm" >
                                <span class="input-group-addon">میلیون تومان</span>
                            </div>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('rent_price'); ?>
                        </div>
                        <div class="col-sm-4 col-lg-2 controls">
                            <select name="rent_price_unit" class="form-control input-sm">
                                <?php
                                $units = array('DBC_PER_MONTH' => 'DBC_PER_MONTH', 'DBC_PER_QUARTER' => 'DBC_PER_QUARTER', 'DBC_PER_YEAR' => 'DBC_PER_YEAR');
                                foreach ($units as $val => $unit) {
                                    $sel = ($val == set_value('rent_price_unit')) ? 'selected="selected"' : '';
                                    ?>
                                    <option value="<?php echo $val; ?>" <?php echo $sel; ?>><?php echo lang_key($unit); ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('rent_price_unit'); ?>
                        </div>
                        <div class="clearfix"></div>

                        <label class="col-sm-3 col-lg-2 control-label hidden">فرمت تاریخ:</label>
                        <div class="col-sm-4 col-lg-3 controls hidden">
                            <select name="date_format" class="form-control" id="format">
                                <option value="mm/dd/yy">Default - mm/dd/yy</option>
                                <option value="yy-mm-dd">ISO 8601 - yy-mm-dd</option>
                                <option value="d M, y">Short - d M, y</option>
                                <option value="d MM, y">Medium - d MM, y</option>
                                <option value="DD, d MM, yy">Full - DD, d MM, yy</option>
                                <option value="&apos;day&apos; d &apos;of&apos; MM &apos;in the year&apos; yy">With text - 'day' d 'of' MM 'in the year' yy</option>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('date_format'); ?>
                        </div>

                        <div class="clearfix"></div>
                        <label class="col-sm-3 col-lg-2 control-label hidden">از تاریخ:</label>
                        <div class="col-sm-4 col-lg-3 controls hidden">
                            <input type="text"  name="from_date" value="<?php echo(set_value('from_date') != '') ? set_value('from_date') : '08/05/2014'; ?>" placeholder="از زمان " class="form-control input-sm my-date-picker" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('from_date'); ?>
                        </div>

                        <div class="clearfix"></div>
                        <label class="col-sm-3 col-lg-2 control-label hidden">تا تاریخ:</label>
                        <div class="col-sm-4 col-lg-3 controls hidden">
                            <input type="text"  name="to_date" value="<?php echo(set_value('to_date') != '') ? set_value('to_date') : '08/05/2014'; ?>" placeholder="تا زمان " class="form-control input-sm my-date-picker" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('to_date'); ?>
                        </div>

                    </div>

                    <div id="home-size-holder" class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">زیربنا</label>
                        <div class="col-sm-4 col-lg-3 controls">
                            <input type="text" id="home_size" name="home_size" value="<?php echo(set_value('home_size') != '') ? set_value('home_size') : ''; ?>" placeholder="زیربنا" class="form-control input-sm" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('home_size'); ?>
                        </div>
                        <div class="col-sm-4 col-lg-2 controls">
                            <select name="home_size_unit" class="form-control input-sm">
                                <?php
                                $units = array('sqmeter' => 'متر مربع');
                                foreach ($units as $val => $unit) {
                                    $sel = ($val == set_value('home_size_unit')) ? 'selected="selected"' : '';
                                    ?>
                                    <option value="<?php echo $val; ?>" <?php echo $sel; ?>><?php echo $unit; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('home_size_unit'); ?>
                        </div>
                    </div>

                    <div id="lot-size-holder" class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">سایز زمین:</label>
                        <div class="col-sm-4 col-lg-3 controls">
                            <input type="text" id="lot_size" name="lot_size" value="<?php echo(set_value('lot_size') != '') ? set_value('lot_size') : ''; ?>" placeholder="سایز زمین" class="form-control input-sm" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('lot_size'); ?>
                        </div>
                        <div class="col-sm-4 col-lg-2 controls">
                            <select name="lot_size_unit" class="form-control input-sm">
                                <?php
                                $units = array('sqmeter' => 'متر مربع');
                                foreach ($units as $val => $unit) {
                                    $sel = ($val == set_value('lot_size_unit')) ? 'selected="selected"' : '';
                                    ?>
                                    <option value="<?php echo $val; ?>" <?php echo $sel; ?>><?php echo $unit; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('lot_size_unit'); ?>
                        </div>
                    </div>



                    <div id="bedroom-holder" class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">اتاق خوب:</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <input type="text" id="bedroom" name="bedroom" value="<?php echo(set_value('bedroom') != '') ? set_value('bedroom') : ''; ?>" placeholder="اتاق خواب" class="form-control input-sm" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('bedroom'); ?>
                        </div>
                    </div>

                    <div id="bath-holder" class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">حمام و دستشویی:</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <input type="text" id="bath" name="bath" value="<?php echo(set_value('bath') != '') ? set_value('bath') : ''; ?>" placeholder="حمام و دستشویی" class="form-control input-sm" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('bath'); ?>
                        </div>
                    </div>

                    <div id="year-built-holder" class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">سال ساخت:</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <input type="text" id="year_built" name="year_built" value="<?php echo(set_value('year_built') != '') ? set_value('year_built') : ''; ?>" placeholder="سال ساخت" class="form-control input-sm" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('year_built'); ?>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">وضعیت فعلی :</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <?php $conditions = array("DBC_CONDITION_AVAILABLE", "DBC_CONDITION_SOLD"); ?>
                            <select name="condition" class="form-control input-sm">
                                <?php
                                foreach ($conditions as $status) {
                                    $sel = ($status == set_value('condition')) ? 'selected="selected"' : '';
                                    ?>
                                    <option value="<?php echo $status; ?>" <?php echo $sel; ?>><?php echo lang_key($status); ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('condition'); ?>
                        </div>
                    </div>
                    <?php if (is_admin()) { ?>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">عامل :</label>
                            <div class="col-sm-4 col-lg-5 controls">
                                <?php
                                $CI = get_instance();
                                $CI->load->model('show/show_model');
                                $agents = $CI->show_model->get_users_by_range('all', '', 'first_name');
                                ?>
                                <select name="created_by" class="form-control input-sm">
                                    <?php $v = (set_value('created_by') != '') ? set_value('created_by') : $CI->session->userdata('user_id'); ?>
                                    <?php
                                    foreach ($agents->result() as $agent) {
                                        $sel = ($agent->id == $v) ? 'selected="selected"' : '';
                                        ?>
                                        <option value="<?php echo $agent->id; ?>" <?php echo $sel; ?>><?php echo $agent->first_name . ' ' . $agent->last_name; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="help-inline">&nbsp;</span>
                                <?php echo form_error('condition'); ?>
                            </div>
                        </div>
                    <?php } ?>

                    <div id="year-built-holder" class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">تگ ها:</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <textarea class="form-control" name="tags"><?php echo set_value('tags'); ?></textarea>
                            <span class="help-inline">برچسب های مربوط به ملک را توسط یک کاما لیست نماید</span>
                            <?php echo form_error('tags'); ?>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Etelate Khososi Melk -->
            <div class="box">

                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>اطلاعات خصوصی ملک</h3>
                    <div class="box-tool">
                        <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                    </div>
                </div>

                <div class="box-content">

                    <p class="alert alert-info">برای جلوگیری از انتشار اطلاعات ملک، تمامی فیلد های این بخش تنها برای بنگاه دار قابل نمایش می باشید و برای کاربران قابل مشاهده نمی باشد</p>
                    <div id="year-built-holder" class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">شماره تلفن:</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <input type="text" id="private_phone" name="private_phone" value="<?php echo(set_value('private_phone') != '') ? set_value('private_phone') : ''; ?>" placeholder="" class="form-control input-sm" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('private_phone'); ?>
                        </div>
                    </div>

                    <div id="year-built-holder" class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">شماره موبایل:</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <input type="text" id="private_mobile" name="private_mobile" value="<?php echo(set_value('private_mobile') != '') ? set_value('private_mobile') : ''; ?>" placeholder="" class="form-control input-sm" >
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('private_mobile'); ?>
                        </div>
                    </div>


                    <div id="year-built-holder" class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">آدرس دقیق ملک:</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <textarea type="text" id="private_address" name="private_address" placeholder="" class="form-control input-sm" ><?php echo(set_value('private_address') != '') ? set_value('private_address') : ''; ?></textarea>
                            <span class="help-inline">&nbsp;</span>
                            <?php echo form_error('private_address'); ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>    
                </div>
            </div>

 
            <!-- facilities box start -->
            <div class="box">

                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>امکانات کلی</h3>
                    <div class="box-tool">
                        <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                    </div>
                </div>

                <div class="box-content">
                    <ul class="facilities">
                        <?php
                        $facilities = get_all_facilities();
                        if ($facilities->num_rows() <= 0) {
                            echo 'No feature list found';
                        } else {
                            foreach ($facilities->result() as $facility) {
                                $v = (is_array($this->input->post('facilities'))) ? $this->input->post('facilities') : array();
                                $sel = (in_array($facility->id, $v)) ? 'checked="checked"' : '';
                                ?>
                                <li>
                                    <label>
                                        <img style="width:20px" src="<?php echo base_url('uploads/thumbs/' . $facility->icon); ?>">
                                        <input type="checkbox" name="facilities[]" value="<?php echo $facility->id; ?>" <?php echo $sel; ?>>
                                        <?php echo lang_key($facility->title); ?>
                                    </label>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                    <div class="clearfix"></div>    
                </div>
            </div>

            <!-- end facilities box -->
            <div class="row">
                <div class="col-md-7">
                    <!-- address box start -->
                    <div class="box">

                        <div class="box-title">
                            <h3><i class="fa fa-bars"></i>آدرس</h3>
                            <div class="box-tool">
                                <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>

                        <div class="box-content">

                            <div class="form-group">
                                <label class="col-sm-4 col-lg-3 control-label">آدرس</label>
                                <div class="col-sm-7 col-lg-8 controls">
                                    <input type="text" id="address" name="address" value="<?php echo(set_value('address') != '') ? set_value('address') : ''; ?>" placeholder="آدرس" class="form-control input-sm" >
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('address'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-lg-3 control-label">کشور:</label>
                                <div class="col-sm-7 col-lg-8 controls">
                                    <select name="country" id="country" class="form-control">
                                        <?php
                                        foreach (get_all_countries()->result() as $row) {
                                            $sel = ($row->id == set_value('country')) ? 'selected="selected"' : '';
                                            ?>
                                            <option value="<?php echo $row->id; ?>" <?php echo $sel; ?>><?php echo $row->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('country'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-lg-3 control-label">استان:</label>
                                <div class="col-sm-7 col-lg-8 controls">
                                    <input type="hidden" name="selected_state" id="selected_state" value="<?php echo(set_value('selected_state') != '') ? set_value('selected_state') : ''; ?>">
                                    <input type="text" id="state" name="state" value="<?php echo(set_value('state') != '') ? set_value('state') : ''; ?>" placeholder="استان" class="form-control input-sm" >
                                    <span class="help-inline state-loading">&nbsp;</span>
                                    <?php echo form_error('state'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-lg-3 control-label">شهر:</label>
                                <div class="col-sm-7 col-lg-8 controls">
                                    <input type="hidden" name="selected_city" id="selected_city" value="<?php echo(set_value('selected_city') != '') ? set_value('selected_city') : ''; ?>">
                                    <input type="text" id="city" name="city" value="<?php echo(set_value('city') != '') ? set_value('city') : ''; ?>" placeholder="شهر" class="form-control input-sm" >
                                    <span class="help-inline city-loading">&nbsp;</span>
                                    <?php echo form_error('city'); ?>
                                </div>
                            </div>

                            <div class="form-group hidden">
                                <label class="col-sm-4 col-lg-3 control-label">کد پستی:</label>
                                <div class="col-sm-7 col-lg-8 controls">
                                    <input type="text" name="zip_code" value="<?php echo(set_value('zip_code') != '') ? set_value('zip_code') : '99999'; ?>" placeholder="کد پستی" class="form-control input-sm" >
                                    <span class="help-inline">&nbsp;</span>
                                    <?php echo form_error('zip_code'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-lg-3 control-label">&nbsp;</label>
                                <div class="col-sm-7 col-lg-8 controls">
                                    <a href="#" class="btn btn-danger" onclick="codeAddress()"><i class="fa fa-map-marker"></i> مشاهده بر روی نقشه</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-lg-3 control-label">عرض جغرافیایی:</label>
                                <div class="col-sm-7 col-lg-8 controls">
                                    <input type="text" id="latitude" name="latitude" value="<?php echo(set_value('latitude') != '') ? set_value('latitude') : ''; ?>" placeholder="عرض جغرافیایی" class="form-control input-sm" >

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 col-lg-3 control-label">طول جغرافیایی:</label>
                                <div class="col-sm-7 col-lg-8 controls">
                                    <input type="text" id="longitude" name="longitude" value="<?php echo(set_value('longitude') != '') ? set_value('longitude') : ''; ?>" placeholder="طول جغرافیایی" class="form-control input-sm" >

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- end addess box -->
                </div>
                <div class="col-md-5">
                    <div class="box">

                        <div class="box-title">
                            <h3><i class="fa fa-bars"></i>نقشه</h3>
                            <div class="box-tool">
                                <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                            </div>
                        </div>

                        <div class="box-content">

                            <div id="map-canvas" style="height: 400px; width:100%;"></div>
                        </div></div>
                </div>
            </div>



            <!-- image box start -->
            <div class="box">

                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>تصاویر</h3>
                    <div class="box-tool">
                        <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>
                    </div>
                </div>

                <div class="box-content">


                    <h4>تصویر برجسته :</h4>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">&nbsp;</label>
                        <div class="col-sm-4 col-lg-5 controls">
                            <img class="thumbnail" id="featured_photo" src="<?php echo get_featured_photo_by_id(''); ?>" style="width:256px;">
                        </div>
                        <div class="clearfix"></div>                   
                        <span id="featured-photo-error"></span> 
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">تصویر برجسته:</label>
                        <div class="col-sm-4 col-lg-5 controls">                    
                            <input type="hidden" name="featured_img" id="featured_photo_input" value="<?php echo(set_value('featured_img') != '') ? set_value('featured_img') : ''; ?>">                    
                            <iframe src="<?php echo site_url('admin/realestate/featuredimguploader'); ?>" style="border:0;margin:0;padding:0;height:130px;"></iframe>
                            <span class="help-inline">&nbsp;</span>
                        </div>          
                    </div>
                    <div class="clearfix"></div>

                    <h4>گالری تصاویر :</h4>
                    <div class="alert alert-danger">بعد از اضافه کردن ملک خواهید توانست تصاویر خود را اضافه نمایید</div> 

                </div>
            </div>

            <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i> ایجاد</button>
            <div class="clearfix"></div>

            <!-- end image box -->
        </form>

    </div>
</div>
<!--Rich text editor-->
<script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
<script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<script type="text/javascript">
                                        var no_of_images = 2;
                                        $(document).ready(function() {
                                            jQuery(".my-date-picker").datepicker();
                                            jQuery("#format").change(function() {
                                                jQuery(".my-date-picker").datepicker("option", "dateFormat", $(this).val());
                                            });

                                            jQuery('#country').change(function() {
                                                jQuery('#state').val('');
                                                jQuery('#selected_state').val('');
                                                jQuery('#city').val('');
                                                jQuery('#selected_city').val('');
                                            });

                                            jQuery('#state').change(function() {
                                                jQuery('#city').val('');
                                                jQuery('#selected_city').val('');
                                            });

                                            jQuery("#state").bind("keydown", function(event) {
                                                if (event.keyCode === jQuery.ui.keyCode.TAB &&
                                                        jQuery(this).data("ui-autocomplete").menu.active) {
                                                    event.preventDefault();
                                                }
                                            })
                                                    .autocomplete({
                                                        source: function(request, response) {

                                                            jQuery.post(
                                                                    "<?php echo site_url('admin/realestate/get_states_ajax'); ?>/",
                                                                    {term: request.term, country: jQuery('#country').val()},
                                                            function(responseText) {
                                                                response(responseText);
                                                                jQuery('#selected_state').val('');
                                                                jQuery('.state-loading').html('');
                                                            },
                                                                    "json"
                                                                    );
                                                        },
                                                        search: function() {
                                                            // custom minLength
                                                            var term = this.value;
                                                            if (term.length < 2) {
                                                                return false;
                                                            }
                                                            else
                                                            {
                                                                jQuery('.state-loading').html('Loading...');
                                                            }
                                                        },
                                                        focus: function() {
                                                            // prevent value inserted on focus
                                                            return false;
                                                        },
                                                        select: function(event, ui) {
                                                            this.value = ui.item.value;
                                                            jQuery('#selected_state').val(ui.item.id);
                                                            jQuery('.state-loading').html('');
                                                            return false;
                                                        }
                                                    });


                                            jQuery("#city").bind("keydown", function(event) {
                                                if (event.keyCode === jQuery.ui.keyCode.TAB &&
                                                        jQuery(this).data("ui-autocomplete").menu.active) {
                                                    event.preventDefault();
                                                }
                                            })
                                                    .autocomplete({
                                                        source: function(request, response) {

                                                            jQuery.post(
                                                                    "<?php echo site_url('admin/realestate/get_cities_ajax'); ?>/",
                                                                    {term: request.term, state: jQuery('#selected_state').val()},
                                                            function(responseText) {
                                                                response(responseText);
                                                                jQuery('#selected_city').val('');
                                                                jQuery('.city-loading').html('');
                                                            },
                                                                    "json"
                                                                    );
                                                        },
                                                        search: function() {
                                                            // custom minLength
                                                            var term = this.value;
                                                            if (term.length < 2 || jQuery('#selected_state').val() == '') {
                                                                return false;
                                                            }
                                                            else
                                                            {
                                                                jQuery('.city-loading').html('Loading...');
                                                            }
                                                        },
                                                        focus: function() {
                                                            // prevent value inserted on focus
                                                            return false;
                                                        },
                                                        select: function(event, ui) {
                                                            this.value = ui.item.value;
                                                            jQuery('#selected_city').val(ui.item.id);
                                                            jQuery('.city-loading').html('');
                                                            return false;
                                                        }
                                                    });

                                            var base_url = "<?php echo base_url(); ?>";

                                            jQuery('.gallery').change(function() {
                                                var val = jQuery(this).val();
                                                var src = base_url + 'uploads/thumbs/' + val;
                                                var preview = jQuery(this).attr('preview');
                                                jQuery('.' + preview).attr('src', src);
                                            });

                                            jQuery('#featured_photo_input').change(function() {
                                                var val = jQuery(this).val();
                                                if (val != '')
                                                {
                                                    var src = base_url + 'uploads/thumbs/' + val;
                                                }
                                                else
                                                {
                                                    var src = base_url + 'assets/admin/img/preview.jpg'
                                                }
                                                jQuery('#featured_photo').attr('src', src);
                                            }).change();

                                            jQuery('.add-another').click(function(e) {
                                                e.preventDefault();
                                                var length = no_of_images++;
                                                var html = '<li>' +
                                                        '<div class="form-group">' +
                                                        '<label class="col-sm-3 col-lg-2 control-label">' +
                                                        '<img class="thumbnails thumb' + length + '" src="<?php echo base_url("assets/admin/img/gallery-preview.jpg"); ?>" style="width:80px;">' +
                                                        '</label>' +
                                                        '<div class="col-sm-2 col-lg-3 controls">' +
                                                        '<input type="hidden" name="gallery[]" class="gallery_photo' + length + ' gallery" preview="thumb' + length + '" value="">                    ' +
                                                        '<iframe src="<?php echo site_url("admin/realestate/galleryimguploader"); ?>/' + length + '" style="border:0;margin:0;padding:0;height:130px;"></iframe>' +
                                                        '<span class="help-inline gallery-error' + length + '"></span>' +
                                                        '</div>' +
                                                        '<div class="col-sm-2 col-lg-1 controls">' +
                                                        ' <a href="javascript:void(0);" style="color:red" onclick="jQuery(this).parent().parent().parent().remove();">X حذف</a>' +
                                                        '</div>' +
                                                        '</div>' +
                                                        '</li>';
                                                jQuery('.file-upload').append(html);

                                                jQuery('.gallery').change(function() {
                                                    var val = jQuery(this).val();
                                                    var src = base_url + 'uploads/thumbs/' + val;
                                                    var preview = jQuery(this).attr('preview');
                                                    jQuery('.' + preview).attr('src', src);
                                                });

                                            });



                                            var estate_type = $('#type-select').val();
                                            $('#home-size-holder').hide();
                                            $('#lot-size-holder').hide();
                                            $('#bedroom-holder').hide();
                                            $('#bath-holder').hide();
                                            $('#year-built-holder').hide();

                                            if (estate_type == 'DBC_TYPE_APARTMENT' || estate_type == 'DBC_TYPE_HOUSE' || estate_type == 'DBC_TYPE_COMSPACE' || estate_type == "DBC_TYPE_CONDO" || estate_type == "DBC_TYPE_VILLA") {
                                                $('#home-size-holder').show();
                                                $('#year-built-holder').show();
                                            }

                                            if (estate_type == 'DBC_TYPE_APARTMENT' || estate_type == 'DBC_TYPE_HOUSE' || estate_type == "DBC_TYPE_CONDO" || estate_type == "DBC_TYPE_VILLA") {
                                                $('#bedroom-holder').show();
                                                $('#bath-holder').show();
                                            }


                                            if (estate_type == 'DBC_TYPE_HOUSE' || estate_type == 'DBC_TYPE_LAND' || estate_type == "DBC_TYPE_VILLA") {
                                                $('#lot-size-holder').show();
                                            }

                                            $('#type-select').change(function() {
                                                var estate_type = $('#type-select').val();
                                                if (estate_type == 'DBC_TYPE_APARTMENT' || estate_type == 'DBC_TYPE_HOUSE' || estate_type == 'DBC_TYPE_COMSPACE' || estate_type == "DBC_TYPE_CONDO" || estate_type == "DBC_TYPE_VILLA") {
                                                    $('#home-size-holder').show('slow');
                                                    $('#year-built-holder').show('slow');
                                                }
                                                else {
                                                    $('#home-size-holder').hide('slow');
                                                    $('#year-built-holder').hide('slow');
                                                }

                                                if (estate_type == 'DBC_TYPE_HOUSE' || estate_type == 'DBC_TYPE_LAND' || estate_type == "DBC_TYPE_VILLA") {
                                                    $('#lot-size-holder').show('slow');
                                                }
                                                else {
                                                    $('#lot-size-holder').hide('slow');
                                                }

                                                if (estate_type == 'DBC_TYPE_APARTMENT' || estate_type == 'DBC_TYPE_HOUSE' || estate_type == "DBC_TYPE_CONDO" || estate_type == "DBC_TYPE_VILLA") {
                                                    $('#bedroom-holder').show('slow');
                                                    $('#bath-holder').show('slow');
                                                }
                                                else {
                                                    $('#bedroom-holder').hide('slow');
                                                    $('#bath-holder').hide('slow');
                                                }

                                            });

                                            var estate_purpose = $('#purpose-select').val();
                                            $('#sales-price-holder').hide();
                                            $('#rent-price-holder').hide();

                                            if (estate_purpose == 'DBC_PURPOSE_BOTH') {
                                                $('#sales-price-holder').show();
                                                $('#rent-price-holder').show();

                                            }
                                            else if (estate_purpose == 'DBC_PURPOSE_SALE') {
                                                $('#sales-price-holder').show();
                                                $('#rent-price-holder').hide();
                                            }
                                            else {
                                                $('#sales-price-holder').hide();
                                                $('#rent-price-holder').show();
                                            }

                                            $('#purpose-select').change(function() {
                                                var estate_purpose = $('#purpose-select').val();
                                                if (estate_purpose == 'DBC_PURPOSE_BOTH') {
                                                    $('#sales-price-holder').show('slow');
                                                    $('#rent-price-holder').show('slow');

                                                }
                                                else if (estate_purpose == 'DBC_PURPOSE_SALE') {
                                                    $('#sales-price-holder').show('slow');
                                                    $('#rent-price-holder').hide('slow');
                                                }
                                                else {
                                                    $('#sales-price-holder').hide('slow');
                                                    $('#rent-price-holder').show('slow');
                                                }
                                            });

                                        });
</script>
