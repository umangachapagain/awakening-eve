<!--Form-->
jQuery(document).ready(function() {
/*Multi Step Form*/
	$('.msf-form form fieldset:first-child').fadeIn('slow');
	
	// next step
	$('.msf-form form .btn-next').on('click', function() {
		$(this).parents('fieldset').fadeOut(400, function() {
	    	$(this).next().fadeIn();
			scroll_to_class('.msf-form');
	    });
	});
	
	// previous step
	$('.msf-form form .btn-previous').on('click', function() {
		$(this).parents('fieldset').fadeOut(400, function() {
			$(this).prev().fadeIn();
			scroll_to_class('.msf-form');
		});
	});	
	
});
function scroll_to_class(chosen_class) {
	var nav_height = $('nav').outerHeight();
	var scroll_to = $(chosen_class).offset().top - nav_height;

	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 1000);
	}
}
<!--Social-->
$(document).ready(function(){
$("#shareRoundIcons").jsSocials({
    showLabel: false,
    showCount: false,
    shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
});
$("#shareArticles").jsSocials({
    showLabel: false,
    showCount: false,
    shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
});

$("#shareArticles .jssocials-share-link").css("border-radius",0);

<!--Animation Triggers-->
   new WOW().init();
});
<!--Slick slider-->
$(document).ready(function(){
  $('.autoplay').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});

$('.single-item').slick({
  autoplay:true,
 });

$('.slick-slide').css('height','auto');
$('.slick-slider').css('margin-bottom',0);

});
<!--Smooth scroll-->
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
<!--Modal Notification-->

<!--Text editor-->
$(document).ready(function(){
tinymce.init({ selector:'.editor' });
});

<!--Tracker-->
$(document).ready(function () {
  $.get("http://ipinfo.io", function(response) {
  $("#ip").html(response.ip);
  $("#address").html("Location: "+response.city + ", " + response.region);
}, "jsonp");
});


<!--Google Charts-->
$(document).ready(function(){
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);
	   google.charts.setOnLoadCallback(drawChart2);
	   google.charts.setOnLoadCallback(drawChart3);

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Incidences of crimes'],
          ['2001',  9819],
          ['2002',  10047],
          ['2003',  10376],
          ['2004',  9154],
		   ['2005',  10590],
		   ['2006',  11035],
          ['2007',  11302],
          ['2008',  12780],
          ['2009',  13941],
		   ['2010',  15179],
		   ['2011',  16084],
		   ['2012',  16680],
		   ['2013', 15000],
		   ['2014', 13914]
		   
        ]);

        var options = {
          title: 'Total Crime Against Women in Karnataka',
		  height:200,
          //curveType: 'function',
		  animation:{
	    //startup:"true",
        duration: 2000,
        easing: 'linear',
      },
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_canvas_1'));

        chart.draw(data, options);
      }
	  
	        function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Gender gap percentage'],
          ['1981',  26.6],
          ['1991',  24.8],
          ['2001',  21.6],
          ['2011',  16.7]
		   		   
        ]);

        var options = {
          title: 'Gender Gap Percentage',
		  height:200,
          //curveType: 'function',
		  animation:{
	    //startup:"true",
        duration: 2000,
        easing: 'linear',
      },
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_canvas_2'));

        chart.draw(data, options);
      }
	  
	  function drawChart3() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Male literacy rate', 'Female literacy rate'],
          ['2001', 76.10, 56.87],
          ['2011', 82.47 ,68.06]
		   		   
        ]);

        var options = {
          title: 'Literacy Rate in Percentage',
		  height:200,
          //curveType: 'function',
		  animation:{
	    //startup:"true",
        duration: 2000,
        easing: 'linear',
      },
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_canvas_3'));

        chart.draw(data, options);
      }
});

