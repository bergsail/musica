/*
$(document).ready(function(){
    
    $.ajaxSetup({
        cache: false
    });
    
    $('.links').bind("click", function(e){
        
        var attribute = $(this).attr('href');
        $('#content').load(attribute + ' #content .container');
        
        e.preventDefault();
    });
    
});
*/