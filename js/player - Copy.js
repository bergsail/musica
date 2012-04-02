init();

var links;
var list;
var player;
var play;
var pause;
var vol;
var seekbar;



function init(){
    
    links = document.getElementsByClassName('song');
    list = new Array();
    seekbar.value = 0;
    for (var i=0; i < links.length; i++) {
      links[i].addEventListener('click', hijack, false);
      list[i] = links[i].getAttribute('href');
    };
    
    player = document.getElementById('player1');
    play = document.getElementById('playbutton');
    pause = document.getElementById('pausebutton');
    vol = document.getElementById('volumebutton');
    seekbar = document.getElementById('seekbar');
    
    play.addEventListener('click', played, false);
    pause.addEventListener('click', paused, false);
	player.addEventListener('durationchange', setupSeekbar, false);
	player.addEventListener('timeupdate', updateUI, false);
	seekbar.addEventListener('change', seekAudio, false);
}

function click(){
    
}

function hijack(e){
    e.preventDefault();
    song = this.getAttribute('href');
    player.src = song;
    player.play();
    console.log(this.getAttribute('href'));
}

console.log(list);

function played(){
    player.play();
    console.log('playing');
}

function paused(){
    player.pause();
    console.log('paused');
}

function setupSeekbar(){
	seekbar.min = player.startTime;
	seekbar.max = player.startTime + player.duration;
}

function seekAudio(){
	player.currentTime = seekbar.value;
}

function updateUI(){
	var lastBuffered = player.buffered.end(player.buffered.length-1);
	seekbar.min = player.startTime;
	seekbar.max = lastBuffered;
	seekbar.value = player.currentTime;
}

