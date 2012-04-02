var player = document.getElementById('player');
var status = "stopped";
var songs = Array();
var playlist = Array();
var songs = document.getElementsByClassName('song');

function getSongs(){
    

    for(var i = 0; i < songs.length; i++){
        playlist[i] = songs[i].getAttribute('href');
    }
    console.log(playlist);
    
}

function init(){
    
    for (var i=0; i < songs.length; i++) {
      songs[i].addEventListener('click', hijack, false);
    };
    
    
}

function hijack(e){
    
    e.preventDefault();
    
}
document.ready = getSongs();
