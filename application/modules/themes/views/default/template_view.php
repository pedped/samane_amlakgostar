<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta charset="utf-8">

        <?php
        $page = get_current_page();



        if (!isset($sub_title))
            $sub_title = (isset($page['title'])) ? $page['title'] : 'املاک خود را اضافه نمایید';


        if (isset($seo) == FALSE)
            $seo = (isset($page['seo_settings']) && $page['seo_settings'] != '') ? (array) json_decode($page['seo_settings']) : array();

        if (!isset($meta_desc))
            $meta_desc = (isset($seo['meta_description'])) ? $seo['meta_description'] : get_settings('site_settings', 'meta_description', 'realcon property listing');

        if (!isset($key_words))
            $key_words = (isset($seo['key_words'])) ? $seo['key_words'] : get_settings('site_settings', 'key_words', 'real estate,property,listing, house');

        if (!isset($crawl_after))
            $crawl_after = (isset($seo['crawl_after'])) ? $seo['crawl_after'] : get_settings('site_settings', 'crawl_after', 3);
        ?>

        <?php echo (isset($post)) ? social_sharing_meta_tags_for_post($post) : ''; ?>

        <title><?php echo translate(get_settings('site_settings', 'site_title', 'املاک گستر')); ?> | <?php echo translate($sub_title); ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="<?php echo $meta_desc; ?>">

        <meta name="keywords" content="<?php echo $key_words; ?>" />

        <meta name="revisit-after" content="<?php echo $crawl_after; ?> days">

        <?php require_once'includes_top.php'; ?>

        <?php
        $bg_color = get_settings('banner_settings', 'menu_bg_color', 'rgba(241, 89, 42, .8)');

        $text_color = get_settings('banner_settings', 'menu_text_color', '#ffffff');
        ?>

        <style>

            .navbar-inverse{

                background:<?php echo $bg_color; ?>;

                color: <?php echo $text_color; ?>;

            }

            @media (max-width: 767px) {

                .navbar-inverse {  background:<?php echo $bg_color; ?>;color: <?php echo $text_color; ?>; }

            }

            .navbar-nav .dropdown-menu{

                background-color: <?php echo $bg_color; ?>;

                color: <?php echo $text_color; ?>;

            }

        </style>

    </head>


    <?php
    $CI = get_instance();
    $curr_lang = $CI->uri->segment(1);
    if ($curr_lang == 'ar' || $curr_lang == 'fa' || $curr_lang == 'he' || $curr_lang == 'ur') {
        ?>
        <body class="home" dir="rtl">
            <?php
        } else {
            ?>
        <body class="home" dir="<?php echo get_settings('site_settings', 'site_direction', 'ltr'); ?>">
            <?php
        }
        ?>





        <?php require_once'header.php'; ?>

        <?php
        if (isset($alias) && $alias == 'dbc_home') {
            ?>
            <script src="<?php echo theme_url(); ?>/assets/js/jquery.stellar.min.js"></script>

            <script type="text/javascript">

                $(function() {

                    $.stellar({
                        horizontalScrolling: false,
                        verticalOffset: 40

                    });

                });

            </script>
            <?php
            if (get_settings('banner_settings', 'banner_type', 'Slider') == 'Slider')
                require_once'slider_view.php';
            else
                require_once'slidermap_view.php';
        } else
            echo '<div class="clear-fix"></div>';
        ?>





        <div class="clearfix"></div>

        <!-- container -->

        <div class="container my-bg">

            <?php render_widgets('content_top'); ?>

            <?php echo (isset($content)) ? $content : ''; ?>

            <?php render_widgets('content_bottom'); ?>

        </div>  

        <!-- /container -->





        <?php require_once'footer.php'; ?>  



        <?php require_once'includes_bottom.php'; ?>

    </body>

</html>