(function ($) {   
    $(document).ready(function () {

		function richburgerResponsiveEmbeds(){
			var footerHeight, proportion, parentWidth;

			$('iframe').each(function(index, value){

				var iframeWidth = $(this).attr('width'),
					iframeHeight = $(this).attr('height');

				if (iframeWidth > 0 && iframeHeight > 0){
					footerHeight = $('.footer-flex').height();

					// Calculate the proportion/ratio based on the width & height.
					proportion = iframeWidth / iframeHeight;

					// Get the parent element's width.
					parentWidth = $(this).parent().parent().width();

					// Set the max-width & height.
					$(this).css('maxWidth', parentWidth + 'px');
					$(this).css('maxHeight', (parentWidth / proportion) + 'px');

					console.log(parentWidth);
					console.log(index);
				}
			});
		}

		// Run on initial load.
		richburgerResponsiveEmbeds();

		// Run on resize.
		$(window).resize(function(){
			richburgerResponsiveEmbeds();
		});

	});
})(jQuery);