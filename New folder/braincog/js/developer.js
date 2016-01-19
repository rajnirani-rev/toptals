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