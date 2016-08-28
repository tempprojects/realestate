jQuery(document).ready(function($){
	var scroll = $(window).scrollTop(),
	ww = $(window).width(),
	header = $('header'),
	clone = header.find('nav').clone();

	clone.insertAfter(header);
	clone.addClass('sticky-nav');

	if (scroll > 20 && ww > 768) {
		header.addClass('sticky');
		$('.height_block').addClass('scroll');
	} else {
		header.removeClass('sticky');
		$('.height_block').removeClass('scroll');
	}

	// sticky menu
	var click = 1;
	$('.burger').on({
		click: function () {
			if (click) {
				$('.sticky-nav').css({
					opacity: 1,
					visibility: "visible"
				});
				click = 0;
			} else {
				$('.sticky-nav').css({
					opacity: 0,
					visibility: "hidden"
				});
				click = 1;
			}

		}
	});

	$(window).on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll > 20) {
			header.addClass('sticky');
			$('.height_block').addClass('scroll');
		} else {
			header.removeClass('sticky');
			$('.sticky-nav').css({
				opacity: 0,
				visibility: "hidden"
			});
			$('.height_block').removeClass('scroll');
			click = 1;
		}
	})
	//end menu


	//slider
	if ($('.gall_in').length) {
		$('.gall_in').each(function() {

			var $gallery = $(this),
			$thumbnails = $(this).parent().find('.thumb');

			$gallery.owlCarousel({
				navigation: true,
				pagination: false,
				slideSpeed: 600,
				paginationSpeed: 800,
				singleItem: true,
				navigationText: false,
				addClassActive: true,
				autoPlay: true,

				afterMove: function () {
					var activeItem = $('.owl-item.active'),
					indexThis = activeItem.index();

					$thumbnails.removeClass('active');
					$thumbnails.eq(indexThis).addClass('active');
				}
			});
			
			$thumbnails.eq(0).addClass('active');

			$thumbnails.find('img').on({

				mousedown: function (event) {
					var index = $thumbnails.find('img').index(this);

					$thumbnails.removeClass('active');
					$thumbnails.eq(index).addClass('active');
					$gallery.trigger('owl.goTo', [index, 300, true]);
				}
			});
		});

	}
	// .gall_in

	

	/*goomap*/
	if ($('#contact_map').length ) {
		google.maps.event.addDomListener(window, 'load', init);

		function init() {
			/*map latitude and longitude*/
			var contactLatlng = {lat: 32.054180, lng: 34.786508};

			/*map style*/
			var styleMap = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"administrative.province","elementType":"labels.icon","stylers":[{"hue":"#ff0000"},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}];
			/*map options*/

	
			/*map options*/
			var contactOptions = {
				zoom: 11,	
				center: contactLatlng, 
				styles: styleMap
			}
			/*map options*/
	





			if( $('#contact_map').length ){
				var contact = document.getElementById('contact_map');
				var contact_map = new google.maps.Map(contact, contactOptions);
				var markerContact = new google.maps.Marker({
					position: contactLatlng,
					map: contact_map,			
					title: 'Tel Aviv',
					icon: directory_uri.stylesheet_directory_uri + '/img/geol.png'
				});

			}


		}
	}



	$(document).mouseup(function (e) {
		var wrapp_form = $(".wrapp_form");

		if (!wrapp_form.is(e.target) && wrapp_form.has(e.target).length === 0) {
			wrapp_form.hide();
		}

		var time_container = $('.time-container');

		if (!time_container.is(e.target) && time_container.has(e.target).length === 0) {
			time_container.hide();
		}
	});



	if($('.datepicker').length) {
		$.datepicker.setDefaults( $.datepicker.regional[ "he" ] );
		$( ".datepicker" ).each(function() {
			var date = $(this),
			time_cont = date.siblings('.time-container');

			date.datepicker({

				showOtherMonths: true,
				selectOtherMonths: true,
				minDate: 0
			});
		});
	}



	/*set height map*/
	if(ww>991 && $('#appart_map').length) {		
		setMapHeight();
	} else if (ww<992 && ww>768 && $('#appart_map').length) {
		$('#appart_map').height(250);
	}

	;
}); /*end document ready*/	


jQuery(window).resize(function(event) {
	var ww = jQuery(window).width();
	
	if(ww>991 && jQuery('#appart_map').length) {		
		setMapHeight();
	} else if (ww<992 && ww>768 && jQuery('#appart_map').length) {
		jQuery('#appart_map').height(250);
	}
})

function setMapHeight() {
	var slider_h = jQuery('.appart_slider').height();
	jQuery('#appart_map').height(slider_h);
return 1;
}