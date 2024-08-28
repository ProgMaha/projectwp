<?php
/**
 * Title: Banner Block
 * Slug: digital-online-courses/banner-block
 * Categories: banner
 * Block Types: core/template-part/banner-block
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/banner-bg.png","id":64,"dimRatio":0,"customOverlayColor":"#314db8","isUserOverlayColor":true,"minHeight":700,"contentPosition":"center center","className":"slider-cover","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-cover slider-cover" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:700px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#314db8"></span><img class="wp-block-cover__image-background wp-image-64" alt="" src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/banner-bg.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"className":"slider-content"} -->
<div class="wp-block-column slider-content"><!-- wp:heading {"level":3,"style":{"typography":{"letterSpacing":"2px","fontSize":"15px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"#ffffffd4"}}},"color":{"text":"#ffffffd4"}},"fontFamily":"saira"} -->
<h3 class="wp-block-heading has-text-color has-link-color has-saira-font-family" style="color:#ffffffd4;font-size:15px;font-style:normal;font-weight:600;letter-spacing:2px"><?php echo esc_html('Welcome to Digital Courses Website','digital-online-courses'); ?></h3>
<!-- /wp:heading -->

<!-- wp:heading {"className":"banner-title","style":{"typography":{"fontSize":"50px","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"bottom":"5px"}}},"fontFamily":"rowdies"} -->
<h2 class="wp-block-heading banner-title has-rowdies-font-family" style="padding-bottom:5px;font-size:50px;font-style:normal;font-weight:700"><?php echo esc_html('Immerse Yourself','digital-online-courses'); ?><br><?php echo esc_html('in ','digital-online-courses'); ?><span class="color-word"><?php echo esc_html('Digital ','digital-online-courses'); ?></span><?php echo esc_html('Learning','digital-online-courses'); ?></h2>
<!-- /wp:heading -->

<!-- wp:buttons {"className":"slider-button"} -->
<div class="wp-block-buttons slider-button"><!-- wp:button {"textColor":"background","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"border":{"radius":"10px"},"typography":{"letterSpacing":"1px","fontSize":"15px","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"left":"30px","right":"30px","top":"8px","bottom":"8px"}}},"fontFamily":"saira"} -->
<div class="wp-block-button has-custom-font-size is-style-outline has-saira-font-family" style="font-size:15px;font-style:normal;font-weight:500;letter-spacing:1px"><a class="wp-block-button__link has-background-color has-text-color has-link-color wp-element-button" href="#" style="border-radius:10px;padding-top:8px;padding-right:30px;padding-bottom:8px;padding-left:30px"><?php echo esc_html('View Courses','digital-online-courses'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->