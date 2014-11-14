<div class="recent-grid"><i class="fa fa-puzzle-piece"></i>&nbsp;<?php echo lang_key('DBC_TYPE_FILTERS'); ?></div>
            <div class="well">
                <ul class="nav nav-pills nav-stacked">
                    <?php 
                    $filter_options = array('DBC_TYPE_APARTMENT'=>'type',
                                            'DBC_TYPE_HOUSE'=>'type',
                                            'DBC_TYPE_LAND'=>'type',
                                            'DBC_TYPE_COMSPACE'=>'type',
                                            'DBC_TYPE_CONDO'=>'type',
                                            'DBC_TYPE_VILLA'=>'type');
                    foreach ($filter_options as $k=>$v) {
                    ?>
                    <li class="<?php echo is_active_menu('show/'.$v.'/'.$k);?>">
                        <a href="<?php echo site_url('show/'.$v.'/'.$k);?>">
                            <i class="fa fa-indent"></i>&nbsp;<?php echo lang_key($k);?>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div style="clear:both"></div>