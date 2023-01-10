(function ($) {   
    $(document).ready(function () {

        // Animácie ___________________________________________________________________
        // Animácie navigácie 
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
        
        // Tooltip mesagge __________________________________________________________________

        if ($('.galeria').length){

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
                    butout = $('<button id="butout"><i class="fa-solid fa-xmark"></i></button>');
                    
                event.preventDefault();
                
                if (!$('#gallery-overlay').length){
                    lay.appendTo("body").hide();
                    $('<i class="fa-solid fa-chevron-left"></i>').appendTo(previousone);
                    $('<i class="fa-solid fa-chevron-right"></i>').appendTo(nextone);
                    image.appendTo(holder);
                    butout.appendTo(holder);
                    lay.html(holder).fadeIn(1000);
                    previousone.prependTo(lay);
                    nextone.appendTo(lay);
                    textarea.appendTo(lay);
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
                alergenbutton = $(alergensection).find('a');

            $(alergenbutton).on('click', function(){
                $(alergenlist).toggle();
            });

            $(alergenlist).hide();

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
        
        var buttons = $(".sticky-nav .wp-block-button a"),
            sections = $(".ponuka h3");

        $(buttons).on("click", function(event){
            event.preventDefault();

            var index = $(buttons).index(this),
                scrlposition = $(sections[index]).offset().top,
                stickyheight = $(".sticky-nav").height();
            
            $("html, body").animate({scrollTop: (scrlposition - stickyheight - 25)}, 500);
        });
        
    });
})(jQuery);