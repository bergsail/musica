
function Player(l, b){
	
	var links = l;
	var a = b
	var pl;
	var ne;
	var pre;

    // var hijack = function(e){
//         
        // e.preventDefault();
        // e.stopPropagation();
        // console.log(this.getAttribute(a));
        // // playlist(a);
//         
    // }

    var playlist = function(a){
        
        var list = new Array();
        for(var i = 0; i < links.length; i++){
            list[i] = links[i].getAttribute(a);
        }
        console.log(list);
    }
        
    var nextSong = function(){
        
        // if(urls[next] != undefined){
//             
            // var player = document.getElementsByTagName('audio');
            // if(player != undefined){
                // player.src.urls[next];
//                 
            // }
//             
        // }
        
        console.log('You clicked next');
    }
    
    var prevSong = function(){
        console.log('You clicked prev');
    }
    
    var playSong = function(){
        console.log('You clicked play');
    }
    
    var fallback = function(){
        console.log('There was an error');
    }
    
    this.set = function(p, pr, n){
        
        pl = p;
        ne = n;
        pre = pr;
        
    }
    
    this.load = function(){
        
        for(var i = 0; i < links.length; i++){
            links[i].addEventListener('click', hijack, false);
        }
        
        pl.addEventListener('click', playSong, false);
        pre.addEventListener('click', prevSong, false);
        ne.addEventListener('click', nextSong, false);
        
        var player = new Audio();
        player.controls = "controls";
        player.addEventListener('ended', nextSong, false);
        player.addEventListener('error', fallback,  false);
        document.getElementById('player').appendChild(player);
        
    }
	
}

window.onload = function(){
    
    var songs = document.getElementsByClassName('song');
    var link = 'href';
    var p = document.getElementById('play');
    var pr = document.getElementById('prev');
    var n = document.getElementById('next');
	
	player = new Player(songs, link);
	player.set(p, pr, n);
	player.load();
	
}
