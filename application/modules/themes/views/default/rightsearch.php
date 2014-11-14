<div class="col-md-3">

    <form action="<?php echo site_url('show/advfilter'); ?>" method="post"> 

        <div class="search-bar">

            <div class="detail-title"><i class="fa fa-search"></i>&nbsp;<?php echo lang_key('DBC_ADVANCED_SEARCH'); ?></div>

        </div>

        <!--            <div  class="orange-border panel panel-primary effect-helix in" id="plain_box">
        
                        <div class="panel-heading orange"><?php echo lang_key('DBC_PLAIN_SEARCH'); ?><a class="up" style="float:right" data-action="collapse" href="#plain_box"><i class="fa fa-chevron-up"></i></a></div>
        
                        <div class="panel-body">
        
        <?php $chk = (isset($data['ignor_plain'])) ? 'checked="checked"' : ''; ?>
        
                            <input <?php echo $chk; ?> target="#plain_container" type="checkbox" name="ignor_plain" id="ignor_plain" value="yes">
        
                            <label for="ignor_plain"><?php echo lang_key('DBC_IGNORE_THIS_SECTION'); ?></label>
        
                            <span id="plain_container">
        
                                <div class="info_list">                      
        
                                    <input class="form-control" type="text" value="<?php echo (isset($data['plainkey'])) ? rawurldecode($data['plainkey']) : ''; ?>" name="plainkey">
        
                                </div>
        
                                <button type="submit" class="btn btn-info  btn-labeled" style="margin:10px 0 10px 0">
        
                                    Search
        
                                    <span class="btn-label btn-label-right">
        
                                        <i class="fa fa-search"></i>
        
                                    </span>
        
                                </button>
        
                            </span>  
        
                        </div>
        
                    </div>       -->






        <div  class="orange-border panel panel-primary effect-helix in" id="advance_box">

            <div class="panel-heading orange">فیلتر پیشرفته<a class="up" style="float:right" data-action="collapse" href="#advance_box"><i class="fa fa-chevron-up"></i></a></div>

            <div class="panel-body">

                <?php $chk = (isset($data['ignor_adv'])) ? 'checked="checked"' : ''; ?>

                <input <?php echo $chk; ?> target="#adv_container" type="checkbox" name="ignor_adv" id="ignor_adv" value="yes">

                <label for="ignor_adv"><?php echo lang_key('DBC_IGNORE_THIS_SECTION'); ?></label>

                <span id="adv_container">

                    <div class="info_list">

                        <h5>منظور</h5>



                        <select id="purpose_sale" name="purpose_sale" class="form-control input-sm chzn-select" data-placeholder="انتخاب نوع واحد">

                            <option value="">انتخاب</option>

                            <?php $options = array('DBC_PURPOSE_SALE', 'DBC_PURPOSE_RENT', 'DBC_PURPOSE_BOTH'); ?>

                            <?php $v = (isset($data['purpose_sale'])) ? $data['purpose_sale'] : ''; ?>

                            <?php
                            foreach ($options as $value) {

                                $sel = ($v == $value) ? 'selected="selected"' : '';
                                ?>

                                <option value="<?php echo $value; ?>" <?php echo $sel; ?>><?php echo lang_key($value); ?></option>                              

                            <?php }
                            ?>

                        </select>



                        <!--                           <?php $chk = (isset($data['purpose_sale']) && $data['purpose_sale'] == "DBC_PURPOSE_SALE") ? 'checked="checked"' : ''; ?>
                        
                                                  <input <?php echo $chk; ?> type="radio" value="DBC_PURPOSE_SALE" name="purpose_sale" id="purpose_sale" class="filter-checkbox">
                        
                                                  <label for="purpose_sale"><?php echo lang_key('DBC_PURPOSE_SALE'); ?></label>
                        
                        
                        
                                                  <div class="clearfix"></div>
                        
                        <?php $chk = (isset($data['purpose_sale']) && $data['purpose_sale'] == "DBC_PURPOSE_RENT") ? 'checked="checked"' : ''; ?>
                        
                                                  <input <?php echo $chk; ?> type="radio" value="DBC_PURPOSE_RENT" name="purpose_sale" id="purpose_rent" class="board-filter-checkbox">
                        
                                                  <label for="purpose_rent"><?php echo lang_key('DBC_PURPOSE_RENT'); ?></label>
                        
                        
                        
                                                  <div class="clearfix"></div>
                        
                        <?php $chk = (isset($data['purpose_sale']) && $data['purpose_sale'] == "DBC_PURPOSE_BOTH") ? 'checked="checked"' : ''; ?>
                        
                                                  <input <?php echo $chk; ?> type="radio" value="DBC_PURPOSE_BOTH" name="purpose_sale" id="purpose_both" class="board-filter-checkbox">
                        
                                                  <label for="purpose_both"><?php echo lang_key('DBC_PURPOSE_BOTH'); ?></label> -->

                    </div>

                    <div class="divider"></div>



                    <div class="info_list">

                        <h5>نوع</h5>

                        <?php $types = array("DBC_TYPE_APARTMENT", "DBC_TYPE_HOUSE", "DBC_TYPE_LAND", "DBC_TYPE_COMSPACE", "DBC_TYPE_CONDO", "DBC_TYPE_VILLA"); ?>

                        <select multiple="multiple" id="type-select" name="type[]" class="form-control input-sm chzn-select" data-placeholder="انتخاب نوع">

                            <?php $v = (isset($data['type'])) ? $data['type'] : array(); ?>

                            <?php
                            foreach ($types as $type) {

                                $sel = (in_array($type, $v)) ? 'selected="selected"' : '';
                                ?>

                                <option value="<?php echo $type; ?>" <?php echo $sel; ?>><?php echo lang_key($type); ?></option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="divider"></div>



                    <!--                        <div class="info_list">
                    
                                                <h5><?php echo lang_key('DBC_PRICE'); ?></h5>
                    
                                                <div id="slider-range-price" style="margin-top: 6px"></div>
                    
                                                <input id="price_min" class="form-control board-filter-input-slider" type="text" name="price_min" value="<?php echo (isset($data['price_min'])) ? $data['price_min'] : ''; ?>">
                    
                                                <p class="slider-input-text-middle">تومان</p>
                    
                                                <input id="price_max" class="form-control board-filter-input-slider" type="text" name="price_max" value="<?php echo (isset($data['price_max'])) ? $data['price_max'] : ''; ?>">
                    
                                            </div>
                    
                    
                    
                                            <div class="divider"></div>
                    
                    
                    
                                            <div class="info_list">
                    
                                                <h5><?php echo lang_key('DBC_PRICE'); ?> در واحد</h5>
                    
                                                <div id="slider-range-price-per-unit" style="margin-top: 6px"></div>
                    
                                                <input id="price_per_unit_min" class="form-control board-filter-input-slider" type="text" name="price_per_unit_min" value="<?php echo (isset($data['price_per_unit_min'])) ? $data['price_per_unit_min'] : ''; ?>">
                    
                                                <p class="slider-input-text-middle">تومان</p>
                    
                                                <input id="price_per_unit_max" class="form-control board-filter-input-slider" type="text" name="price_per_unit_max" value="<?php echo (isset($data['price_per_unit_max'])) ? $data['price_per_unit_max'] : ''; ?>">
                    
                    
                    
                                                <select id="price_unit" name="price_unit" class="form-control input-sm chzn-select" data-placeholder="واحد خود را انتخاب نمایید">
                    
                                                    <option value="">انتخاب</option>
                    
                    <?php $options = array('sqmeter' => 'متر مربع', 'hector' => 'هکتار'); ?>
                    
                    <?php $v = (isset($data['price_unit'])) ? $data['price_unit'] : ''; ?>
                    
                    <?php
                    foreach ($options as $key => $value) {

                        $sel = ($v == $key) ? 'selected="selected"' : '';
                        ?>
                                    
                                                                        <option value="<?php echo $key; ?>" <?php echo $sel; ?>><?php echo $value; ?></option>                              
                                    
                    <?php }
                    ?>
                    
                                                </select>
                    
                                            </div>
                    
                    
                    
                                            <div class="divider"></div>
                    
                    
                    
                                            <div class="info_list">
                    
                                                <h5><?php echo lang_key('DBC_PURPOSE_RENT'); ?> <?php echo lang_key('DBC_PRICE'); ?></h5>
                    
                                                <div id="slider-range-rent-price" style="margin-top: 6px"></div>
                    
                                                <input id="rent_price_min" class="form-control board-filter-input-slider" type="text" name="rent_price_min" value="<?php echo (isset($data['rent_price_min'])) ? $data['rent_price_min'] : ''; ?>">
                    
                                                <p class="slider-input-text-middle">تومان</p>
                    
                                                <input id="rent_price_max" class="form-control board-filter-input-slider" type="text" name="rent_price_max" value="<?php echo (isset($data['rent_price_max'])) ? $data['rent_price_max'] : ''; ?>">
                    
                    
                    
                                                <select id="rent_price_unit" name="rent_price_unit" class="form-control input-sm chzn-select" data-placeholder="واحد اجاره">
                    
                                                    <option value="">انتخاب</option>
                    
                    <?php $options = array('DBC_PER_MONTH' => 'DBC_PER_MONTH', 'DBC_PER_QUARTER' => 'DBC_PER_QUARTER', 'DBC_PER_YEAR' => 'DBC_PER_YEAR'); ?>
                    
                    <?php $v = (isset($data['rent_price_unit'])) ? $data['rent_price_unit'] : ''; ?>
                    
                    <?php
                    foreach ($options as $key => $value) {

                        $sel = ($v == $key) ? 'selected="selected"' : '';
                        ?>
                                    
                                                                        <option value="<?php echo $key; ?>" <?php echo $sel; ?>><?php echo lang_key($value); ?></option>
                                    
                    <?php }
                    ?>
                    
                                                </select>
                    
                                            </div>
                    
                    
                    
                                            <div class="divider"></div>-->

                    <div class="info_list">

                        <h5><?php echo lang_key('DBC_BEDROOM'); ?></h5>

                        <div id="slider-bedroom" style="margin-top: 6px"></div>

                        <input id="bedroom_min" class="form-control board-filter-input-slider" type="text" name="bedroom_min" value="<?php echo (isset($data['bedroom_min'])) ? $data['bedroom_min'] : '0'; ?>">

                        <p class="slider-input-text-middle">بین</p>

                        <input id="bedroom_max" class="form-control board-filter-input-slider" type="text" name="bedroom_max" value="<?php echo (isset($data['bedroom_max'])) ? $data['bedroom_max'] : '3'; ?>">

                    </div>



                    <div class="divider"></div>

                    <div class="info_list">

                        <h5><?php echo lang_key('DBC_BATHROOM'); ?></h5>

                        <div id="slider-bath" style="margin-top: 6px"></div>

                        <input id="bath_min" class="form-control board-filter-input-slider" type="text" name="bath_min" value="<?php echo (isset($data['bath_min'])) ? $data['bath_min'] : '0'; ?>">

                        <p class="slider-input-text-middle">بین</p>

                        <input id="bath_max" class="form-control board-filter-input-slider" type="text" name="bath_max" value="<?php echo (isset($data['bath_max'])) ? $data['bath_max'] : '3'; ?>">

                    </div>



                    <div class="divider"></div>

                    <div class="info_list">

                        <h5>وضعیت</h5>

                        <?php $conditions = array("DBC_CONDITION_AVAILABLE", "DBC_CONDITION_SOLD"); ?>

                        <select id="condition-select" name="condition[]" class="form-control input-sm chzn-select" data-placeholder="انتخاب وضعیت" multiple="multiple">

                            <?php $v = (isset($data['condition'])) ? $data['condition'] : array(); ?>

                            <?php
                            foreach ($conditions as $status) {

                                $sel = (in_array($status, $v)) ? 'selected="selected"' : '';
                                ?>

                                <option value="<?php echo $status; ?>" <?php echo $sel; ?>><?php echo lang_key($status); ?></option>

                            <?php } ?>

                        </select>

                    </div>

                    <div class="divider"></div>

                    <button type="submit" class="btn btn-info  btn-labeled" style="margin:10px 0 10px 0">

                        جستجو

                        <span class="btn-label btn-label-right">

                            <i class="fa fa-search"></i>

                        </span>

                    </button>

                </span>

            </div>

        </div>

        <div  class="orange-border panel panel-primary effect-helix in" id="location_box">

            <div class="panel-heading orange"><?php echo lang_key('DBC_LOCATION_SEARCH'); ?><a class="up" style="float:right" data-action="collapse" href="#location_box"><i class="fa fa-chevron-up"></i></a></div>

            <div class="panel-body">

                <?php $chk = (isset($data['ignor_location'])) ? 'checked="checked"' : ''; ?>

                <input <?php echo $chk; ?> target="#location_container" type="checkbox" name="ignor_location" id="ignor_location" value="yes">

                <label for="ignor_location"><?php echo lang_key('DBC_IGNORE_THIS_SECTION'); ?></label>

                <span id="location_container">

                    <div class="info_list">  

                        <h5><?php echo lang_key('DBC_LOCATION_SEARCH'); ?></h5>

                        <?php $countries = get_all_countries(); ?>

                        <select name="country" id="country" class="form-control input-sm chzn-select">

                            <option value="">انتخاب</option>

                            <?php $v = (isset($data['country'])) ? $data['country'] : ''; ?>

                            <?php
                            foreach ($countries->result() as $country) {

                                $sel = ($country->id == $v) ? 'selected="selected"' : '';
                                ?>

                                <option value="<?php echo $country->id; ?>" <?php echo $sel; ?>><?php echo $country->name; ?></option>

                            <?php } ?>

                        </select>



                        <div class="info_list"> 

                            <h5><?php echo lang_key('DBC_STATE_PROVINCE'); ?></h5>

                            <input type="hidden" name="selected_state" id="selected_state" value="<?php echo (isset($data['selected_state'])) ? $data['selected_state'] : ''; ?>">

                            <input class="form-control" type="text" name="state" value="<?php echo (isset($data['state'])) ? $data['state'] : ''; ?>" id="state">

                        </div>



                        <div class="info_list"> 

                            <h5><?php echo lang_key('DBC_CITY'); ?></h5>

                            <input type="hidden" name="selected_city" id="selected_city" value="<?php echo (isset($data['selected_city'])) ? $data['selected_city'] : ''; ?>">                     

                            <input class="form-control" type="text" name="city" value="<?php echo (isset($data['city'])) ? $data['city'] : ''; ?>" id="city">

                        </div>

                        <div class="info_list"> 

                            <h5><?php echo lang_key('DBC_RADIUS'); ?></h5>

                            <input placeholder="حداکثر شعاع" class="form-control" type="text" name="radius" value="<?php echo (isset($data['radius'])) ? $data['radius'] : ''; ?>">

                        </div>

                    </div>

                    <button type="submit" class="btn btn-info  btn-labeled" style="margin:10px 0 10px 0">

                        جستجو

                        <span class="btn-label btn-label-right">

                            <i class="fa fa-search"></i>

                        </span>

                    </button>

                </span>  

            </div>

        </div>  







    </form>  

</div>

<script type="text/javascript">



    function updown()

    {

        $('.up').click(function(e) {

            e.preventDefault();

            var panel = $(this).attr('href');

            $(panel + ' > .panel-body').hide();

            $(panel + ' .fa-chevron-up').addClass('fa-chevron-down');

            $(panel + ' .fa-chevron-up').removeClass('fa-chevron-up');

            $(this).addClass('down');

            $(this).removeClass('up');

            updown();

        });



        $('.down').click(function(e) {

            e.preventDefault();

            var panel = $(this).attr('href');

            $(panel + ' > .panel-body').show();

            $(panel + ' .fa-chevron-down').addClass('fa-chevron-up');

            $(panel + ' .fa-chevron-down').removeClass('fa-chevron-down');

            $(this).addClass('up');

            $(this).removeClass('down');

            updown();

        });

    }

    $(function() {



        updown();



        $('#ignor_plain').change(function() {

            if ($(this).is(":checked")) {

                // var returnVal = confirm("Are you sure?");

                // $(this).attr("checked", returnVal);

                var panel = jQuery(this).attr('target');

                jQuery(panel).hide();

            }

            else

            {

                var panel = jQuery(this).attr('target');

                jQuery(panel).show();

            }

        }).change();



        $('#ignor_location').change(function() {

            if ($(this).is(":checked")) {

                // var returnVal = confirm("Are you sure?");

                // $(this).attr("checked", returnVal);

                var panel = jQuery(this).attr('target');

                jQuery(panel).hide();

            }

            else

            {

                var panel = jQuery(this).attr('target');

                jQuery(panel).show();

            }

        }).change();



        $('#ignor_adv').change(function() {

            if ($(this).is(":checked")) {

                // var returnVal = confirm("Are you sure?");

                // $(this).attr("checked", returnVal);

                var panel = jQuery(this).attr('target');

                jQuery(panel).hide();

            }

            else

            {

                var panel = jQuery(this).attr('target');

                jQuery(panel).show();

            }

        }).change();



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
                                "<?php echo site_url('show/get_states_ajax'); ?>/",
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
                                "<?php echo site_url('show/get_cities_ajax'); ?>/",
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



        $(".chzn-select").chosen();



        var start_range = 10000;

        var end_range = 50000;

        $("#slider-range-price").slider({
            range: true,
            min: 0,
            max: 100000,
            values: [start_range, end_range],
            slide: function(event, ui) {

                $("#price_min").val(ui.values[ 0 ]);

                $("#price_max").val(ui.values[ 1 ]);

            }

        });



        var start_range = 5000;

        var end_range = 30000;

        $("#slider-range-price-per-unit").slider({
            range: true,
            min: 0,
            max: 40000,
            values: [start_range, end_range],
            slide: function(event, ui) {

                $("#price_per_unit_min").val(ui.values[ 0 ]);

                $("#price_per_unit_max").val(ui.values[ 1 ]);

            }

        });



        var start_range = 5000;

        var end_range = 10000;

        $("#slider-range-rent-price").slider({
            range: true,
            min: 0,
            max: 20000,
            values: [start_range, end_range],
            slide: function(event, ui) {

                $("#rent_price_min").val(ui.values[ 0 ]);

                $("#rent_price_max").val(ui.values[ 1 ]);

            }

        });



        var start_range = 0;

        var end_range = 3;

        $("#slider-bedroom").slider({
            range: true,
            min: 0,
            max: 10,
            values: [start_range, end_range],
            slide: function(event, ui) {

                $("#bedroom_min").val(ui.values[ 0 ]);

                $("#bedroom_max").val(ui.values[ 1 ]);

            }

        });



        var start_range = 0;

        var end_range = 3;

        $("#slider-bath").slider({
            range: true,
            min: 0,
            max: 10,
            values: [start_range, end_range],
            slide: function(event, ui) {

                $("#bath_min").val(ui.values[ 0 ]);

                $("#bath_max").val(ui.values[ 1 ]);

            }

        });



        var start_range = 1980;

        var end_range = 2005;

        $("#slider-year").slider({
            range: true,
            min: 1900,
            max: 2020,
            values: [start_range, end_range],
            slide: function(event, ui) {

                $("#year_min").val(ui.values[ 0 ]);

                $("#year_max").val(ui.values[ 1 ]);

            }

        });



    });



</script>