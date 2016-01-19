/* Slider on Home Page */
$(window).load(function() {
    //$("#flexiselDemo1").flexisel();
    $("#flexiselDemo1").flexisel({
        visibleItems: 4,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3
            }
        }
    });
});

/* Underline on Active link in Home Page */

$(function() {
     var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
     $("#bs-example-navbar-collapse-1 .nav.navbar-nav li a.border-bottom-white").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("nav-active");
     })
});

/* Start Javascript for toggle in Exam-setup Page */
function toggler(divId) {
    $("#" + divId).toggle();
}
/* End Javascript for toggle in Exam-setup Page */

/* Start CheckBox Color Change JavaScript */

$(document).ready(function(){
var callbacks_list = $('.demo-callbacks ul');
$('.demo-list input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){
  callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
}).iCheck({
  checkboxClass: 'icheckbox_square-blue',
  radioClass: 'iradio_square-blue',
  increaseArea: '20%'
});
});

/* End CheckBox Color Change JavaScript */

/* Start Javascript for Scrolling in About Us Page */

    $(document).ready(function() {
      $('.scroll-textBox').niceScroll({
        autohidemode: 'false',     // Do not hide scrollbar when mouse out
        cursorborderradius: '10px', // Scroll cursor radius
        background: '#C4C4C4',     // The scrollbar rail color
        cursorwidth: '5px',       // Scroll cursor width
        cursorcolor: '#ffffff'     // Scroll cursor color
      });
    });
	
/* Start Javascript for Scrolling in About Us Page */

/* Start About Us Toggle Functionality on Buttons */
function toggle_visibility(id) {
    var e = document.getElementById(id);
    var myClasses = document.querySelectorAll('.aboutus-content'),
    i = 0,
    l = myClasses.length;

for (i; i < l; i++) {
    myClasses[i].style.display = 'none';
}
    if (e.style.display == 'none') e.style.display = 'block';
}
/* End About Us Toggle Functionality on Buttons */

/* Start Google Map Javasscript on Contact Page */

      function initialize() {
        var mapCanvas = document.getElementById('contact-map-canvas');
        var mapOptions = {
          center: new google.maps.LatLng(13.0826802, 80.27071840000008),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);
		var marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(13.0826802, 80.27071840000008)});
		var infowindow = new google.maps.InfoWindow({content:"<b>toptals</b><br/><br/> chennai" });
      }
      google.maps.event.addDomListener(window, 'load', initialize);

/* End Google Map Javasscript on Contact Page */
