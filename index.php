<?php
queue_css_url('//cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.css');
queue_js_url('//cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.js');
queue_js_string('
    jQuery(document).ready(function(){
      jQuery("#featured").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        arrows: false,
        centerMode: true,
        fade: true,
        dots: true
      });
    });
');
?>
<?php echo head(array('bodyid'=>'home')); ?>

<!-- Featured Item -->
<div id="featured">
    <?php if (get_theme_option('Display Featured Item') !== '0' && count(get_random_featured_items()) > 0): ?>
    <?php echo random_featured_items(3); ?>
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Collection') !== '0' && get_random_featured_collection()): ?>
    <?php echo random_featured_collection(); ?>
    <?php endif; ?>
    <?php if ((get_theme_option('Display Featured Exhibit') !== '0')
            && plugin_is_active('ExhibitBuilder')
            && function_exists('centerrow_display_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo centerrow_display_featured_exhibit(); ?>
    <?php endif; ?>
</div><!--end featured-item-->

<?php if (get_theme_option('Homepage Text')): ?>
<div id="homepage-text"><?php echo get_theme_option('Homepage Text'); ?></div>
<?php endif; ?>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
