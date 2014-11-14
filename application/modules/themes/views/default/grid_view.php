<?php
if ($query->num_rows() <= 0) {
    ?>
    <div class="alert alert-warning"><?php echo lang_key('DBC_NO_ESTATES_FOUND'); ?></div>
    <?php
} else {
    ?>
    <?php
    foreach ($query->result() as $row):

        if (get_settings('realestate_settings', 'hide_posts_if_expired', 'No') == 'Yes') {
            $is_expired = is_user_package_expired($row->created_by);
            if ($is_expired)
                continue;
        }
        ?>
        <?php $title = get_title_for_edit_by_id_lang($row->id, $curr_lang); ?>
        <div class="col-md-4 col-sm-4">
            <div class="thumbnail thumb-shadow">
                <div class="property-header">
                    <a href="<?php echo site_url('show/detail/' . $row->unique_id . '/' . url_title($title)); ?>"></a>
                    <img class="property-header-image" src="<?php echo get_featured_photo_by_id($row->featured_img); ?>" alt="" style="width:256px">
                    <?php if ($row->status == 2) { ?>
                        <span class="property-contract-type sold"><span><?php echo lang_key('DBC_CONDITION_SOLD'); ?></span>
                        <?php } elseif ($row->purpose == 'DBC_PURPOSE_SALE') { ?>
                            <span class="property-contract-type sale"><span><?php echo lang_key('DBC_PURPOSE_SALE'); ?></span>
                            <?php } else if ($row->purpose == 'DBC_PURPOSE_RENT') { ?>
                                <span class="property-contract-type rent"><span><?php echo lang_key('DBC_PURPOSE_RENT'); ?></span>
                                <?php } else if ($row->purpose == 'DBC_PURPOSE_BOTH') { ?>
                                    <span class="property-contract-type both"><span style="font-size: 11px"><?php echo lang_key('DBC_PURPOSE_BOTH'); ?></span>
                                    <?php } ?> 
                                </span>
                                <div class="property-thumb-meta">
                                    <?php if ($row->purpose == 'DBC_PURPOSE_SALE'): ?>
                                        <span class="property-price">قیمت فروش : <?php echo show_price($row->total_price); ?></span>
                                    <?php elseif ($row->purpose == 'DBC_PURPOSE_RENT') : ?>
                                        <span class="property-price">رهن: <?php echo show_price($row->rent_pricerahn); ?></span>
                                        <span class="property-price">اجاره: <?php echo show_price($row->rent_price); ?></span>
                                    <?php elseif ($row->purpose == 'DBC_PURPOSE_BOTH') : ?> 
                                        <span class="property-price">قیمت فروش : <?php echo show_price($row->total_price); ?></span>
                                        <span class="property-price">رهن: <?php echo show_price($row->rent_pricerahn); ?></span>
                                        <span class="property-price">اجاره: <?php echo show_price($row->rent_price); ?></span>
                                    <?php endif; ?>
                                </div>
                                </div>
                                <div class="caption">                            
                                    <h4><?php echo character_limiter($title, 20); ?></h4>
                                    <p style="margin-bottom: 0;" class="home-address"><?php echo get_location_name_by_id($row->city) . ',' . get_location_name_by_id($row->state) . ',' . get_location_name_by_id($row->country); ?></p>

                                    <div style="clear:both;">
                                        <span style="float: right; margin-left: 2px; font-size: 13px;"><?php echo lang_key('DBC_TYPE'); ?>:</span>
                                        <span style="float:right; "><?php echo lang_key($row->type); ?></span>
                                    </div>
                                    <div style="clear:both;">
                                        <span style="float: right; margin-left: 2px; font-size: 13px;"><?php echo lang_key('DBC_AREA'); ?>:</span>
                                        <?php if ($row->type == 'DBC_TYPE_LAND') { ?>
                                            <span style="float:right; "><?php echo $row->lot_size; ?> <?php echo $row->lot_size_unit; ?></sup></span>
                                        <?php } else { ?>
                                            <span style="float:right; "><?php echo $row->home_size; ?> متر مربع</sup></span>
                                        <?php } ?>
                                    </div>
                                    <div style="clear:both;padding-top: 15px;" class="property-utilities">
                                        <div title="Bedrooms" class="bedrooms" style="float: right; padding-top: 0px;margin-left: 10px;">
                                            <?php if ($row->type == 'DBC_TYPE_LAND') { ?>
                                                <div class="content">N/A</div>
                                            <?php } else { ?>
                                                <div class="content"><?php echo $row->bedroom; ?></div>
                                            <?php } ?>
                                        </div>
                                        <div title="Bathrooms" class="bathrooms" style="float: right;padding-top: 0px;">
                                            <?php if ($row->type == 'DBC_TYPE_LAND') { ?>
                                                <div class="content">N/A</div>
                                            <?php } else { ?>
                                                <div class="content"><?php echo $row->bath; ?></div>
                                            <?php } ?>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div style="clear:both; border-bottom:1px solid #ccc; margin:10px 0px;"></div>
                                    <a href="<?php echo site_url('show/detail/' . $row->unique_id . '/' . url_title($title)); ?>" class="btn btn-primary btn-labeled btn-readmorepoperty">
                                        <?php echo lang_key('DBC_DETAILS'); ?>
                                        <span class="btn-label btn-label-right">
                                            <i class="fa fa-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                                </div>
                                </div>
                            <?php endforeach; ?>
                            <?php
                        }
                        ?>