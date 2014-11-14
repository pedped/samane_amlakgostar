<?php $search_box_position =  get_settings('banner_settings','search_box_position','bottom');?>

<!-- Header -->

    <header id="head">

        <div class="container">

            <div class="row">

                <?php if( $search_box_position=='ontop'){?>

                <div class="search-box">

                    <div style="height:20px"></div>

                    <form action="<?php echo site_url('show/advfilter');?>" method="post" style="">

                        <label><i class="fa fa-home"></i> <?php echo lang_key('DBC_FIND_YOUR_PLACE'); ?> : </label>

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

                    <a href="<?php echo site_url('show/search');?>" class="btn btn-info"><?php echo lang_key('DBC_ADVANCED_SEARCH'); ?></a>

                </div>

                <?php }?>

            </div>

        </div>

    </header>

    <!-- /Header -->



<?php if( $search_box_position=='bottom'){?>    

<div  class="map-search hidden" data-stellar-background-ratio="0.5" style="margin:0;width:100%;padding:50px 0;text-align:center;background: url(<?php echo base_url('uploads/banner/'.get_settings('banner_settings','search_bg','skyline.jpg'));?>)">

            <div class="row" style="margin:0;padding:0;">

                <div class="search-box">

                    <form action="<?php echo site_url('show/advfilter');?>" method="post" style="">

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

                    <a href="<?php echo site_url('show/search');?>" class="btn btn-info"><?php echo lang_key('DBC_ADVANCED_SEARCH'); ?></a>

                </div>

            </div>

    </div>
    
    <div class="homemarinholder">
        
    </div>

</div>

<?php }?>



        <script type="text/javascript">

        

            

            var i =0;

            var speed = <?php echo get_settings('banner_settings','slider_speed','3000')?>;

            var banner_url = '<?php echo base_url("uploads/banner/");?>'+'/';

           // var images = ['<?php echo theme_url();?>/assets/images/bg2.png','<?php echo theme_url();?>/assets/images/bg1.jpg'];

            var images = jQuery.parseJSON('<?php echo get_settings("banner_settings","sliders","[\"bg1.jpg\",\"bg2.png\"]")?>');

            var image = $('#head');

            //Initial Background image setup

            image.css('background-image', 'url('+banner_url+images [images.length-1]+')');

            //Change image at regular intervals

            setInterval(function(){  

                image.fadeTo("slow",.5, function () {

                    if(i == images.length)

                    i = 0;

                    image.css('background-image', 'url(' + banner_url+images [i++] +')');

                    image.fadeTo( "slow" ,1);

                    // image.fadeIn(500);

                });



                

            }, speed);     



            // jQuery('#search_input').bind('keyup', function() {

                                                           

            //     if(jQuery('#search_input').val().length>3) {

            //         jQuery.post(

            //             "<?php echo site_url('show/instant_search_ajax');?>/",

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

            // jQuery("body").click(function() {

            //     jQuery("#search_results").hide();

            // });








        </script>