jQuery(document).ready(function() {
		var root = jQuery('#template').attr('href') + '/images/';
		jQuery('.lightbox').lightBox({
imageLoading: root + 'lightbox-ico-loading.gif',
			imageBtnClose: root + 'lightbox-btn-close.gif',
			imageBtnPrev: root + 'lightbox-btn-prev.gif',
			imageBtnNtext: root + 'lightbox-btn-next.gif',
			imageBlank: root + 'lightbox-blank.gif'
			});

		});
/*
$(function() {
    $("#menu li ul").hide();
    $("#menu li ul").css("left", "auto");
    $("#menu li").hover(function(event) {
    	    $(this).children("ul").fadein();
    }, function(event) {
    	    $(this).children("ul").fadeout();
    });
});
*/
