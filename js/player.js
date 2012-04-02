document.readyState = init();

var links;
var list;
var player;
var play;
var pause;
var vol;
var seekbar;
var next = 0;
var currentSelected = null;
var playing;
var paused;

function init(){
    
    links = document.getElementsByClassName('songs');
    list = new Array();
    for (var i=0; i < links.length; i++) {
      links[i].addEventListener('click', hijack, false);
      list[i] = links[i].getAttribute('href');
    };
    
    player = document.createElement('audio');
    player.setAttribute('id', 'player1');
    //player = document.getElementById('player1');
    
    play = document.getElementById('playbutton');
    pause = document.getElementById('pausebutton');
    previous = document.getElementById('previousbutton');
    next = document.getElementById('nextbutton');
    vol = document.getElementById('volumebutton');
    seekbar = document.getElementById('seekbar');
    seekbar.value = 0;
    
    play.addEventListener('click', playAud, false);
    pause.addEventListener('click', pauseAudio, false);
    next.addEventListener('click', nextSong, false);
    previous.addEventListener('click', prevSong, false);
    
	player.addEventListener('durationchange', setupSeekbar, false);
	player.addEventListener('timeupdate', updateUI, false);
	player.addEventListener('ended', nextSong, false);
	player.addEventListener('error', errorfallback, true);
	seekbar.addEventListener('change', seekAudio, false);
	
	for (var i=0; i < list.length; i++) {
	  links[i].setAttribute('id', i);
	};
}

function hijack(e){
    e.preventDefault();
    song = this.getAttribute('href');
    next = this.getAttribute('id');
    playAudio();
    //console.log(this.getAttribute('href') + ' is playing.');
}

function playAudio(){
    player.src = list[next];
    player.play();
    highlight(next);
    play.style.display = 'none';
    pause.style.display = 'inline-block';
    console.log(player.src + ' playing');
    console.log(next);
}

function highlight(n){
    var current = document.getElementById(n);
    if(currentSelected != null){
        currentSelected.setAttribute('class', 'playing');
    }
    currentSelected = current;
    current.setAttribute('class', 'selected');
}

function pauseAudio(){
    player.pause();
    play.style.display = 'inline-block';
    pause.style.display = 'none';
    console.log('paused');
}

function playAud(){
    player.play();    
    play.style.display = 'none';
    pause.style.display = 'inline-block';
    console.log('playing');
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

function nextSong(){
    console.log(next)
    if(next >= list.length){
        next = 0;
        playAudio();
    }else{
        next++;
        playAudio();
    }
}

function prevSong(){
    if(next <= 0 == false){
        next--;
        playAudio();
    }else{
        next = list.length - 1;
        playAudio();
    }
}

function errorfallback(){
    nextSong();
}

