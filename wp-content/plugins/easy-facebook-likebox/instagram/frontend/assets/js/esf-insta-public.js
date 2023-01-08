

/**
 * Init Grid layout
 */
function esf_insta_init_grid(){
  jQuery('.esf_insta_load_more_btns_wrap').hide();
  jQuery('.esf-insta-grid-wrapper .esf_insta_feed_fancy_popup').imagesLoaded(function() {
        jQuery('.esf_insta_feeds_holder .esf-insta-load-opacity').fadeIn('slow');
        jQuery('.esf_insta_load_more_btns_wrap').slideDown();
        jQuery('.esf_insta_feeds_holder .esf-insta-load-opacity').removeClass('esf-insta-load-opacity');
  });
}




jQuery(document).ready(function($) {
  if (jQuery('.esf_insta_feeds_grid').length) {
    esf_insta_init_grid();
  }

  

});

function esf_insta_init_layouts(){
  esf_insta_init_grid();
  
}

jQuery( window ).on( 'elementor/frontend/init', function() {
  elementorFrontend.hooks.addAction( 'frontend/element_ready/shortcode.default', function(){
    esf_insta_init_layouts();
  });
  elementorFrontend.hooks.addAction( 'frontend/element_ready/esf_instagram_feed.default', function(){
    esf_insta_init_layouts();
  });
} );
