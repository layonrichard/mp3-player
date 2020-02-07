import audios from "./data.js";
import { path, secondsToMinutes } from "./utils.js";
import elements from "./playerElements.js";

export default {
  audioData: audios,
  currentAudio: {},
  currentPlaying: 0,
  isPlaying: false,
  start() {
    elements.get.call(this);
    this.update();
  },

  play() {
    this.isPlaying = true;
    this.audio.play();
    this.playPause.innerText = "pause";
  },

  pause() {
    this.isPlaying = false;
    this.audio.pause();
    this.playPause.innerText = "play_arrow";
  },

  togglePlayPause() {
    if (this.isPlaying) {
      this.pause();
    } else {
      this.play();
    }
  },
  before(){
    this.currentPlaying++;
    if (this.currentPlaying == this.audioData.length) this.restart();
    this.pause();
    this.update();
    this.play();
  },

  next() {
    this.currentPlaying++;
    if (this.currentPlaying == this.audioData.length) this.restart();
    this.pause();
    this.update();
    this.play();
  },

  setVolume(value) {
    this.audio.volume = value / 100;
    console.log(this.audio.muted);
    this.audio.muted = !this.audio.muted;
    if (this.audio.muted) this.mute.innerText = "volume_mute";
    else if(value > 50) this.mute.innerText = "volume_up";
    else if(value <= 50 && value > 0) this.mute.innerText = "volume_down";
    else this.mute.innerText = "volume_mute";
  },

  setSeek(value) {
    this.audio.currentTime = value;
  },

  timeUpdate() {
    this.currentDuration.innerText = secondsToMinutes(this.audio.currentTime);
    this.seekbar.value = this.audio.currentTime;
  },

  list(){
    for (var i = 0; i < this.audioData.length; i++) {
      //console.log(this.audioData[i].title);
      var newElement = document.createElement("p");
      var newText = document.createTextNode(this.audioData[i].title); 
      newElement.appendChild(newText);
      var actual = this.showList;
      console.log(childNodes);
      actual.insertBefore(newElement, actual);
    }
  },

  update() {
    this.currentAudio = this.audioData[this.currentPlaying];
    this.cover.style.background = `url('${path(
      this.currentAudio.cover,
      console.log(this.currentAudio.cover)
    )}') no-repeat center center / cover`;
    this.title.innerText = this.currentAudio.title;
    this.artist.innerText = this.currentAudio.artist;
    elements.createAudioElement.call(this, path(this.currentAudio.file));

    this.audio.onloadeddata = () => {
      elements.actions.call(this);
    };
  },

  restart() {
    this.currentPlaying = 0;
    this.pause();
    this.update();
  }
};