function start_header() {
  var $origTop;
  var initialize = function () {
      setOriginalTop();
      setPosition();
      $('#welcome').fadeIn('250').delay('500').fadeOut('250');
    }
  var setOriginalTop = function () { // Set the original top offset
      $origTop = $('header').outerHeight();
      $('.init_top').css('top', $('header').outerHeight());
      $('.top_spacer_row').css('height', $('nav').outerHeight());
    }
  var setTopBarPosition = function () {
      $('#main_links').removeClass('init_top'); // do not need after 1st time throuh setTopBar..         
      $offset = $('body').scrollTop();
      if ($offset > $origTop) {
        d3.select('header').attr('top', 0 - $origTop); //same in jQuery: $('header').css('top', '0' - $origTop);
        $('#main_links').removeClass('absolutebanner');
        $('#main_links').addClass('fixedbanner');
        $('nav#main_links').css('top', '0');
      } else {
        $('#main_links').removeClass('fixedbanner');
        $('#main_links').addClass('absolutebanner');
        $('nav#main_links').css('top', $('header').outerHeight());
        $('header').css('top', '0' - $origTop);
      }
    }
  var setPosition = function () { // Add extra observers
      $('#main_links').addClass('init_top');
      $('#main_links').addClass('absolutebanner');
    }
	var my_log = function () {
		console.log($('body').scrollTop());
	}
  initialize();
  $(document).scroll(function () {
    setTopBarPosition();
  	my_log()
	});
}