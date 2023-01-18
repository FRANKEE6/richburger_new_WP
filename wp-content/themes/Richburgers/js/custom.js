(function ($) {   
    $(document).ready(function () {
        // Funkcia pre identifikáciu desktop zariadení ________________________________
        function isDesktopDevice(){
            let actDevWidth = $('body, html').width();

            if (actDevWidth >= 781.1 ){
                return true;
            }
            else {
                return false;
            }
        }

        // Animácie ___________________________________________________________________
        // Animácie navigácie 

        if($('.home').length){
            (function(){
                var mainElementy = $("#mainNav li"),
                    altElementy = $("#altNav li");

                $.each(mainElementy, (function(index) {
                    $(this).hide().delay( 250 + index * 40).show(1200).css({"animationName": "flyBaby"});
                }));

                $.each(altElementy, (function(index) {
                    $(this).hide().delay( 250 + index * 40).show(1000).css({"animationName": "flyBaby"});
                }));

                var delay = 6000;
                setTimeout(() => {
                    $(mainElementy).css({"animationName": "none"});
                    $(altElementy).css({"animationName": "none"});
                }, delay);
            })(window);
        }

        // Animácie pre dotykové zariadenia
        if (!isDesktopDevice()){
            var contactIcons = $('.contact-social-flex .contact a .fa-solid'),
                socialIcons = $('.contact-social-flex .socialIcons i'),
                footerLinks = $('.footer-flex .address ul li a');

            $(contactIcons).each(function(index){
                let startDelay = (index * 2.5) + 's';

                $(this).css({
                    "animation-name": "shaker",
                    "animation-duration": "5s",
                    "animation-iteration-count": "infinite",
                    "animation-delay": startDelay
                });
            })

            $(socialIcons).each(function(index){
                let iconClass = $(this).attr('class'),
                    startDelay = (index * 2) + "s",
                    displayColor = "",
                    animationColorSlug = "";

                switch (iconClass){
                    case "fa-brands fa-facebook":
                        displayColor = "rgba(26, 110, 216, 1)";
                        animationColorSlug = "FB";
                        break;
                    case "fa-brands fa-instagram":
                        displayColor = "rgba(225, 48, 108, 1)";
                        animationColorSlug = "IG";
                        break;
                    case "fa-solid fa-t":
                        displayColor = "rgba(0, 175, 135, 1)";
                        animationColorSlug = "TA";
                        break;
                }
                
                $(this).css({
                    "box-shadow": "0 0 0 0 " + displayColor,
                    "border-radius": "50%",
                    "animation-name": "pulse-" + animationColorSlug,
                    "animation-duration": "6s",
                    "animation-delay": startDelay,
                    "animation-iteration-count": "infinite"
                });
            });

            $(footerLinks).css({
                "animation-name": "breathe",
                "animation-duration": "5s",
                "animation-iteration-count": "infinite"
            });
        }
        
        // Tooltip mesagge __________________________________________________________________

        if ($('.galeria').length && isDesktopDevice()){

            var ttipholder = $('#tooltip'),
                collection = $(".main-gallery img");
            
            collection.mouseenter(function(){
                if(! ttipholder.length){
                    ttipholder = $('<div id="tooltip"><p> </p></div>').appendTo('body');
                }
                $(ttipholder).show();
                $(this).mouseleave(function(){
                    $(ttipholder).hide();
                })
            });
            
            $(collection).mouseenter(function(){

                let currentImage = $(this),
                    positionLeft = $(currentImage).offset().left,
                    offsetFromTop = $(currentImage).offset().top,
                    imgHeight = $(currentImage).height(),
                    positionTop = offsetFromTop + imgHeight,
                    alttext = $(this).attr("alt"),
                    ttip = $("#tooltip p");
                        
                ttipholder.css({"left": positionLeft , "top": positionTop});
                
                if (alttext !== ttip.text()){
                    $(ttip).text(alttext);
                }
                else return;
            });
        }
        // Lightbox
        //________________________________________________________________

        if ($('.galeria').length){

            var galleryImages = $(".galeria a").has("img");
                
            $(galleryImages).on("click", function(event){
                let href = $(this).attr("href"),
                    alttext = $(this).find("img").attr("alt"),
                    image = $("<img>", {src: href, alt: alttext}),
                    textarea = $("<p/>").text(alttext),
                    previousone = $('<div class="previous"/>'),
                    nextone = $('<div class="next"/>'),
                    holder = $('<div id="holder"/>'),
                    lay = $('<div id="gallery-overlay"/>'),
                    butout = $('<i id="butout" class="fa-solid fa-xmark"></i>');
                    
                event.preventDefault();
                
                if (!$('#gallery-overlay').length){
                    lay.appendTo("body").hide();
                    $('<i class="fa-solid fa-chevron-left"></i>').appendTo(previousone);
                    $('<i class="fa-solid fa-chevron-right"></i>').appendTo(nextone);
                    image.appendTo(holder);
                    lay.html(holder).fadeIn(1000);
                    previousone.prependTo(lay);
                    nextone.appendTo(lay);
                    textarea.appendTo(lay);
                    butout.appendTo(lay);
                }
                else {
                    $('#gallery-overlay').fadeIn(1000);
                    $('#holder img').replaceWith(image);
                    $('#gallery-overlay p').replaceWith(textarea);
                    $('.fa-chevron-left, .fa-chevron-right').show();
                }


                var actimg = $("#holder img"),
                    clickedimg = $(this);

                if (!$(clickedimg).parent().prev().length){
                    $(".fa-chevron-left").fadeOut(0);
                }
                if (!$(clickedimg).parent().next().length){
                    $(".fa-chevron-right").fadeOut(0);
                } 

                $(".previous").click(function(){
                    if (!$(clickedimg).parent().prev().length){
                        $(".fa-chevron-left").fadeOut(0);
                    }
                    else {
                        $(".fa-chevron-right").fadeIn(500);
                    }

                    if ($(".fa-chevron-left").is(":hidden")) return;

                    var predosle = $(clickedimg).parent().prev(".wp-block-image").find('a'),
                        newalt = $(predosle).find("img").attr("alt");

                    $(actimg).attr("src", $(predosle).attr("href"));
                    $("#gallery-overlay p").text(newalt);
                    clickedimg = predosle;

                    if (!$(clickedimg).parent().prev().length) {
                        $(".fa-chevron-left").fadeOut(0);
                    }
                    else {
                        $(".fa-chevron-right").fadeIn(500);
                    }
                });

                $(".next").click(function(){
                    if (!$(clickedimg).parent().next().length) {
                        $(".fa-chevron-right").fadeOut(0);
                    }
                    else {
                        $(".fa-chevron-left").fadeIn(500);
                    }

                    if ($(".fa-chevron-right").is(":hidden")) return;

                    var nasledovne = $(clickedimg).parent().next(".wp-block-image").find('a'),
                        newalt = $(nasledovne).find("img").attr("alt");

                    $(actimg).attr("src", $(nasledovne).attr("href"));
                    $("#gallery-overlay p").text(newalt);
                    clickedimg = nasledovne;

                    if (!$(clickedimg).parent().next().length) {
                        $(".fa-chevron-right").fadeOut(0);
                    }
                    else {
                        $(".fa-chevron-left").fadeIn(500);
                    }
                });

                butout.on("click", function (){
                    $(lay).fadeOut(1000);
                })
    
                $(document).on("keyup", function(event){
                    if (event.which == 27) lay.fadeOut(1000);
                });
            });
        }
        // Alergens tittle __________________________________________________________________
        
        var alergensection = $('.alergens');

        if($(alergensection).length){

            let alergenlist = $(".alergens ol li"),
                alergenalert = $(".alergen-info"),
                alergenbutton = $(alergensection).find('#show-hide-button');

            $(alergenbutton).on('click', function(){
                let buttonStatus = $(alergenbutton).attr('aria-pressed');

                if ( buttonStatus == 'true' ){
                    $(alergenbutton).attr({
                        "aria-pressed": "false",
                        "aria-expanded": "false"
                    });
                }
                else {
                    $(alergenbutton).attr({
                        "aria-pressed": "true",
                        "aria-expanded": "true"
                    });
                }
                if(isDesktopDevice()){
                    $(alergenlist).toggle();
                }
                else {
                    if ($(alergenlist).css("display") == "none"){
                        $(alergenbutton).css({"background-position": "95%"});
                        $(alergenlist).slideToggle(200, function(){});
                    }
                    else {
                        $(alergenbutton).css({"background-position": "0%"});
                        $(alergenlist).slideToggle(200, function(){});
                    }
                }
            });

            $(alergenlist).hide();

            if (isDesktopDevice()){
                alergenalert.on("mouseenter", function(){
                    if($(this).attr("title")) return;
                    $(this).attr("title", " ");

                    var that = $(this);

                    $(alergenlist).each(function(index){;
                        if($(that).text().search(index + 1) !== -1){
                            $(that).attr("title", $(that).attr("title") + "\n" + $(alergenlist[index]).text().trim());
                        }
                    });
                });
            }
        }
        
        // Offer scroll functions __________________________________________

        // Scroll UP

        var scrlup = $(".scrlup");

        if($(scrlup).length){
            $(scrlup).hide();
        
            $(document).on("scroll", function(){
                if($(this).scrollTop() > 400){
                    $(scrlup).fadeIn();
                }
                else $(scrlup).fadeOut();
            });

            $(scrlup).on("click", function(){
                var body = $("html, body")
                $(body).animate({scrollTop: 0}, 500, 'swing', function(){$(scrlup).fadeOut()});
            });
        }

        // Offer scrolls
        
        var buttons = $(".sticky-nav .wp-block-button"),
            sections = $(".ponuka h3");

        $(buttons).on("click", function(event){
            event.preventDefault();

            var index = $(buttons).index(this),
                scrlposition = $(sections[index]).offset().top,
                stickyheight = $(".sticky-nav").height();
            
            $("html, body").animate({scrollTop: (scrlposition - stickyheight - 25)}, 500);
        });

        // Offer buttons zmena pozadia podľa scrollovanej pozície

        if(!isDesktopDevice() && $('.ponuka').length){
            $(window).on('scroll', function(){
                let actualScrlPosition = $(window).scrollTop();

                $(sections).each(function(){

                    let thisOffset = $(this).offset().top,
                        thisID = $(this).attr('ID');
                    
                    if (thisOffset < actualScrlPosition) {
                        $(buttons).find("a[href='#"+ thisID +"']").css({
                            "background-position": "95%"
                        });
                    }
                    else {
                        $(buttons).find("a[href='#"+ thisID +"']").css({
                            "background-position": "5%"
                        });
                    }
                })
            })
        }

        // Offer buttons rovnaká šírka podľa najširšieho
        var buttonContainers = $(".sticky-nav .wp-block-button");

        if ($(buttonContainers).length){

            function resizeStickyButtons(){
                var currentWidest = 0;

                $(buttonContainers).each(function(){

                    let currentElementWidth = $(this).width();

                    if (currentElementWidth >= currentWidest){
                        currentWidest = currentElementWidth;
                    }
                    else return;

                })
                $(buttonContainers).css({
                    "min-width": currentWidest + 'px'
                });
            }
            resizeStickyButtons();

            $(window).resize(function(){
                resizeStickyButtons();
            });
        }

        // Responsive embeds ________________________________________________

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