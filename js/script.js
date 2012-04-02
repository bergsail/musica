/* 
 *  Document   : index.php
    Created on : 20-Feb-2012, 00:10:45
    Author     : ignatius fernandes
    Description: Script for the interaction on the  page
 */

/*Interaction*/
$(document).ready(function(){
	
	$('#login').click(function(){
	    $('#register-form').hide();
	    $('#login-form').fadeIn(1000);
	    $("#r").text("or Login with");
	    $(this).hide();
	    $('#register').show();
	    
	});

	$('#register').click(function(){
	    $('#login-form').hide();
	    $('#register-form').fadeIn(1000);
	    $("#r").text("or Register with");
	    $(this).hide();
	    $('#login').show();
	    
	});
	
})

$(".art").each(function(index){
    $(this).delay(150*index).fadeIn(300);
});


// $(".facebook, .twitter").bind("click", function(e){
    // e.preventDefault();
    // var href = $(this).attr("href");
    // console.log(href);
    // window.open(href, "Social", "resizable=yes,scrollbars=yes,status=yes,innerwidth=auto,innerheight=auto")
// });

/*$('.navbar li').click(function(e) {
    
    $('.navbar li').removeClass('active');
        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
    e.preventDefault();
});*/

$('.dropdown-toggle').dropdown();
