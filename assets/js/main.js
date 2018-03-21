
//MAIN FUNCTIONS
window.isResponsive= function(width){
	var w=window,
		d=document,
		e=d.documentElement,
		g=d.getElementsByTagName('body')[0],
		x=w.innerWidth||e.clientWidth||g.clientWidth;
	return x <= parseInt(width);
}
window.numbersFromStr = function(str){
	return parseInt(str.match(/\d/g));
}

window.isPortrait= function(){
	return ($(window).width() < $(window).height())? true : false;
}

window.api = {
    username : "safjammed",
    key:"abcdefghijklm"
};


$(document).ready(function(){
    //init
    materialKit.initFormExtendedDatetimepickers();
     $('select.form-control:not(.browser-default)').select2();
     $("select[multiple]").map(function(index, elem) {
        $(this).select2({
            placeholder: $(this).data('placeholder')
        });     
     })
    
$(".taxonomy-menu-container").on('mouseenter',function(event) {
	$(this).addClass("hover");
})
$(".taxonomy-menu-container").on('mouseleave',function(event) {
	$(this).removeClass("hover");
});
if (isPortrait() == false) {
$(".side-margin .main").css({
	marginLeft: numbersFromStr($(".main").css("marginLeft")) + $(".taxonomy-menu-container").width()+10 + "px"
});
$(window).scroll(function(){
	
	if($(window).scrollTop() >= 200){		
		$(".taxonomy-menu-container").css("marginTop", $("nav").height()+20+"px");
	}else{
		$(".taxonomy-menu-container").css("marginTop", "0px");
	}
});
$('.gallery').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
      delegate: 'a',
      type: 'image',
      gallery:{
        enabled:true
      },
      zoom: {
        enabled: true, // By default it's false, so don't forget to enable it

        duration: 300, // duration of the effect, in milliseconds
        easing: 'ease-in-out', // CSS transition easing function

        // The "opener" function should return the element from which popup will be zoomed in
        // and to which popup will be scaled down
        // By defailt it looks for an image tag:
        opener: function(openerElement) {
          // openerElement is the element on which popup was initialized, in this case its <a> tag
          // you don't need to add "opener" option if this code matches your needs, it's defailt one.
          return openerElement.is('img') ? openerElement : openerElement.find('img');
        }
      }
    });
});
}
// Sliders Init
// materialKit.initSliders();
//render rating not readonly
$('.rating:not(".readonly")').map(function(index, elem) {
  var currentRating = $(this).data('current-rating');
  $(this).barrating({
    theme: 'fontawesome-stars-o',    
    initialRating: 3.6
  });  
});

//render rating readonly
$('.rating.readonly').map(function(index, elem) {
  var currentRating = $(this).data('current-rating');
  $(this).barrating({
    theme: 'fontawesome-stars-o',    
    initialRating: currentRating,
    readonly: true
  });  
});















//send message to editor
$("#sendMsgtoEditor").submit(function(e) {
    e.preventDefault();
    var that = $(this);
    $.get('api.php',{
        username: api.username,
        key: api.key,
        action: 'sendMsgToEditor',
        data:{
            msg: that.find('textarea').val(),
            user_id: USER.id
        }
    }).done(function(data){
        swal(data.msg);
        that.find('textarea').val('');
        $('.modal').modal('hide');
    });
});

});

// tax menu
$(function($, $window, $document, globals){
"use strict";
jQuery(document).ready(function(){

    jQuery('.taxonomy-menu-container').hover(function()
        {
            if (isResponsive(980) && !isResponsive(480)) {
                jQuery('body').addClass('overflow');
                recalcHeight();
            }
        }, function() {
            if (isResponsive(980) && !isResponsive(480)) {
                jQuery('body').removeClass('overflow');
                jQuery(this).removeAttr('style');
            }
        }
    );

    jQuery('.taxonomy-menu-container').click(function() {
        if(jQuery('.taxonomy-menu-container').hasClass('hover')) {
            jQuery('body').removeClass('overflow');
            jQuery('.taxonomy-menu-container').removeAttr('style');
            jQuery('.taxonomy-menu-container').removeClass('expanded');
        }
    });

    // apply only on custom pages
    jQuery('#elm-taxonomy-menu-5 .tax-menu-filter').on('click', function(e){
        e.stopPropagation();
        jQuery(this).toggleClass('active');
        quickMapFilter();

    });

    expandTaxMenu();

});
jQuery(window).resize(function() {
    if (jQuery('.taxonomy-menu-container').hasClass('expanded')) {
        recalcHeight();
    }
});
function recalcHeight() {
    if (isResponsive(980)) {
        var taxMenu = jQuery('.taxonomy-menu-container'),
            taxMenuTop = taxMenu[0].getBoundingClientRect().top,
            windowHeight = jQuery(window).height();

        taxMenu.height(windowHeight - taxMenuTop);
    }
}

function expandTaxMenu() {
    var buttonOn = jQuery('.tax-menu-expand');
    var buttonOff = jQuery('.tax-menu-close');

    buttonOn.on('click', function() {
        if (isResponsive(480)) {
            if (jQuery('.main-nav-wrap').hasClass('hover')) {
                jQuery('.main-nav .menu-toggle').trigger('click');
            }

            jQuery('body').addClass('overflow');
            recalcHeight();
            jQuery('.taxonomy-menu-container').addClass('expanded');
        }

    });

    buttonOff.on('click', function(e) {
        e.preventDefault();
        if (isResponsive(480)) {
            jQuery('body').removeClass('overflow');
            jQuery('.taxonomy-menu-container').removeAttr('style');
            jQuery('.taxonomy-menu-container').removeClass('expanded');
            jQuery('.taxonomy-menu-container').removeClass('hover');
        }
        /*setTimeout(function() {
            jQuery('.taxonomy-menu-container').removeClass('fixed');
        }, 400);*/
    });
}



/********************************
*                               *
* CODES FOR RESTAURANT pages    *
*                               *
*********************************/
if ($("body").hasClass('restaurant-page')) {
//sharer
$(".shr").attr('href', 'https://www.facebook.com/sharer/sharer.php?u='+window.location.href);




}// end of restaurant page codes

});