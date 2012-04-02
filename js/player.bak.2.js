/*
 * Author: Ignatius Fernandes
 * Description: Main Player of the Musica Project.
 *  
 */
function cat(){
    
    var player = $('#player');
    var status = "stopped";
    var songs = Array();
    
    
    $('.song').each(function(i){
        songs[i] = $(this).attr('href');
    });
    
    $('.song').bind("click", function(e){
        
        e.preventDefault();
        var info = $(this).attr("href");
        player.attr("src", info);
        player.trigger("play");
        status = "playing";
        
    });
    
    $("#pause").bind("click", function(e){
        
        e.preventDefault();
        if(status == "playing"){
            player.trigger("pause");
            status = "paused";
        }
        
    });
    
    $("#play").bind("click", function(e){
        
        e.preventDefault();
        if(status == "paused"){
            player.trigger("play");
            status = "playing";
        }
        
    });
    
}

cat();
